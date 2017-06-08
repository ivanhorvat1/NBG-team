<?php

class Login_Model extends CI_Model
{
    public function login_valid($email, $password)
    {
      //$password = md5($password);

        $query = $this->db->where(['email'=>$email, 'password'=>$password])
                            ->get('users');

        if($query->num_rows())
        {

            return $query->row()->id;
            //return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function email($email){
        $query = $this->db->where('email',$email)
            ->get('users');
        if($query->num_rows()>0)
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function register($data){
        return $this->db->insert('users', $data);
    }


}