<?php

class Newsletters_Model extends CI_Model
{
    //adding newsletter
   public function add_newsletter($array)
   {
       $this->db->insert('newsletters', $array);
       if($this->db->affected_rows() > 0)
       {
           return true;
       }
       else
       {
           return false;
       }
   }

   //get newsletter
   public function get_newsletters()
   {
       $query = $this->db->select('*')
                        ->from('newsletters')
                        ->get();
       return $query->result_array();
   }

   //get selected newsletter
    public function find_newsletter($id)
    {
        $query = $this->db->select('*')
            ->where('id',$id)
            ->get('newsletters');
        return $query->row();
    }

    //delete image
    public function delete_image($id,$image)
    {
        $this->db->where('id', $id)
                ->update('newsletters', $image);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //update newsletter
    public function update_newsletter($id,$data)
    {
        $this->db->where('id', $id)
                 ->update('newsletters', $data);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //delete newsletter
    public function delete_newsletter($id)
    {
        $this->db->delete('newsletters',['id'=>$id]);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}