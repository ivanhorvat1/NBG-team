<?php

class User_model extends CI_Model
{
    public function user_admin()
    {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->select('is_admin')->where('id', $user_id)
            ->get('users');
        return $query->result();
    }

    // Select all data of user from database
    public function readUserInformation($login)
    {

        $condition = "id =" . "'" . $login . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_user(){
        $id = $this->session->userdata('user_id');
        $query = $this->db-> select('*')
            ->from('users')
            ->where('id',$id)
            ->get();
        return $query->row();
    }
}
