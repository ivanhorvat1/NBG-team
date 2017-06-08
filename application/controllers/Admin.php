<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id'))
            redirect('login');
        $this->load->model('newsletters_model');
        $this->load->helper('form');
        $this->load->model('User_model');
        $this->load->library('upload');
        $this->load->library('form_validation');

    }

    public function header()
    {
        $this->load->view('admin/admin_header');
    }

    public function footer()
    {
        $this->load->view('admin/admin_footer');
    }

    public function dashboard()
    {
        $this->header();
        $data['user'] = $this->User_model->get_user();
        $data['news'] = $this->newsletters_model->get_newsletters();
        $this->load->view('admin/dashboard',$data);
        $this->footer();
    }

    //add new newsletter view
    public function store_newsletter()
    {
        $this->header();
        $this->load->view('admin/add_newsletter_view');
        $this->footer();
    }

    //store newsletter
    public function add_newsletter()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        $upload_path = "uploads";

        $upPath_type = './' . $upload_path . '/';

        $data = $this->upload->data();
        //upload file to folder Document type

        //upload file
        if (!file_exists($upPath_type)) {
            mkdir($upPath_type, 0777, true);
        }
        $config = array(
            'upload_path' => $upPath_type,
            'allowed_types' => "jpg|gif|png|jpeg",
            //'overwrite' => TRUE,
            //'max_size' => "2048",
            //'max_width' => "1024",
            //'max_height' => "768",
            //'min_width' => 200,
            //'min_height' => 300

        );

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {

            $finfo = $this->upload->data();
            $image = ($finfo['file_name']);

            $upPath_type1 = $upload_path . '/' . $image;

            $data['non_xss'] = array(
                'image_path' => $upPath_type1,
                'title' => $title,
                'description' => $description
            );

            $result = $this->newsletters_model->add_newsletter($data['non_xss']);
            if ($result != FALSE) {
                $this->session->set_flashdata('news', 'Newsletter successfully added');
                $this->session->set_flashdata('classN', 'alert-success');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('news', 'Error adding Newsletter');
                $this->session->set_flashdata('classN', 'alert-danger');
                redirect('dashboard');
            }

        }
        //Ukoliko nije obavezno unasanje slike
        /*elseif (!$this->upload->do_upload('userfile')){

            $data['non_xss'] = array(
                'title' => $title,
                'description' => $description
            );

            $this->session->set_flashdata('addN', 'Newsletter successfully added');
            $this->newsletters_model->add_newsletter($data['non_xss']);
            redirect('dashboard');
        }*/
        else{
            $this->header();
            $data['error_upload'] = $this->upload->display_errors();
            $this->load->view('admin/add_newsletter_view', $data);
            $this->footer();
        }
    }

    //update newsletter
    public function update_newsletter($id)
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        $upload_path = "uploads";

        $upPath_type = './' . $upload_path . '/';

        $data = $this->upload->data();
        //upload file to folder Document type

        //upload file
        if (!file_exists($upPath_type)) {
            mkdir($upPath_type, 0777, true);
        }
        $config = array(
            'upload_path' => $upPath_type,
            'allowed_types' => "jpg|gif|png|jpeg",
            //'overwrite' => TRUE,
            'max_size' => "2048",
            //'max_width' => "1024",
            //'max_height' => "768",
            //'min_width' => 200,
            //'min_height' => 300
        );

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {

            $finfo = $this->upload->data();

            $image = ($finfo['file_name']);

            $upPath_type1 = $upload_path . '/' . $image;

            $data['non_xss'] = array(
                'image_path' => $upPath_type1,
                'title' => $title,
                'description' => $description
            );

            $old_image = $this->input->post('old_image');
            unlink($old_image);

            //$this->session->set_flashdata('updN', 'Newsletter successfully updated');
            $result = $this->newsletters_model->update_newsletter($id,$data['non_xss']);
            if ($result != FALSE) {
                $this->session->set_flashdata('news', 'Newsletter successfully updated');
                $this->session->set_flashdata('classN', 'alert-success');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('news', 'Error updating Newsletter');
                $this->session->set_flashdata('classN', 'alert-danger');
                redirect('dashboard');
            }

        }elseif (!$this->upload->do_upload('userfile')){

            $data['non_xss'] = array(
                'title' => $title,
                'description' => $description
            );

            //$this->session->set_flashdata('updN', 'Newsletter successfully updated');
            $result = $this->newsletters_model->update_newsletter($id,$data['non_xss']);
            if ($result != FALSE) {
                $this->session->set_flashdata('news', 'Newsletter successfully updated');
                $this->session->set_flashdata('classN', 'alert-success');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('news', 'Error updating Newsletter');
                $this->session->set_flashdata('classN', 'alert-danger');
                redirect('dashboard');
            }
        }
        else{
            $this->header();
            $data['error_upload'] = $this->upload->display_errors();
            $this->load->view('admin/add_newsletter_view', $data);
            $this->footer();
        }
    }

    //edit newsletter
    public function edit_newsletter($id)
    {
        $this->header();
        $data['news'] = $this->newsletters_model->find_newsletter($id);
        $this->load->view('admin/edit_newsletter_view',$data);
        $this->footer();
    }

    //delete one newsletter
    public function delete_newsletter($id)
    {
        $data = $this->newsletters_model->find_newsletter($id);
            if(!empty($data->image_path)) {
                unlink($data->image_path);
            }

        $result = $this->newsletters_model->delete_newsletter($id);
        if ($result != FALSE) {
            $this->session->set_flashdata('news', 'Newsletter successfully deleted');
            $this->session->set_flashdata('classN', 'alert-success');
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('news', 'Error deleting Newsletter');
            $this->session->set_flashdata('classN', 'alert-danger');
            redirect('dashboard');
        }
    }

    //multiple delete newsletter
    public function delete_all_newsletters()
    {
        $delete = $this->input->post('brisi');
            if (isset($delete)) {
                foreach ($delete as $id) {
                    $data = $this->newsletters_model->find_newsletter($id);
                    unlink($data->image_path);
                    $result = $this->newsletters_model->delete_newsletter($id);
                }
                if ($result != FALSE) {
                    $this->session->set_flashdata('news', 'Newsletter successfully deleted');
                    $this->session->set_flashdata('classN', 'alert-success');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('news', 'Error deleting Newsletter');
                    $this->session->set_flashdata('classN', 'alert-danger');
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('news', 'You didn\'t chose what you want to delete!');
                $this->session->set_flashdata('classN', 'alert-info');
                redirect('dashboard');
            }
    }

    //delete image
    public function delete_image($id)
    {
        $image = $this->input->post('image');

        unlink($image);

        $data = array('image_path'=>'');

        $result = $this->newsletters_model->delete_image($id,$data);
        if ($result != FALSE) {
            $this->session->set_flashdata('news', 'Newsletter successfully deleted');
            $this->session->set_flashdata('classN', 'alert-success');
            redirect('admin/edit_newsletter/'.$id);
        } else {
            $this->session->set_flashdata('news', 'Error deleting Newsletter');
            $this->session->set_flashdata('classN', 'alert-danger');
            redirect('admin/edit_newsletter/'.$id);
        }
    }

    //view selected newsletter
    public function view_newsletter($id)
    {
        $this->header();
        $data['news'] = $this->newsletters_model->find_newsletter($id);
        $this->load->view('admin/view_newsletter_view', $data);
        $this->footer();
    }
}