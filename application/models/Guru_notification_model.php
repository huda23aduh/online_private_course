<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_notification_model extends CI_Model
{
    private $table = "guru_notification";

    public function __construct()
    {
        $this->load->database();
    }

    public function get_email_by_param($email)
    {


        $this->db->select('COUNT(email) as total');
        $this->db->from('murid');
        //$this->db->like('kata', $str );
        $this->db->where('email =', $email);

        $query = $this->db->get();
        //var_dump($this->db->last_query());
        return $query->row();    
    }

    public function check($email, $password) {

        $this->db->select('*');
        $this->db->from('murid');
        $this->db->where('email', $email );
        $this->db->where('password', $password );
        
        $query = $this->db->get();
        
        return $query->result();    
    }
   

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('les');
        
        $query = $this->db->get();
        
        return $query->result();   
    }
    
    

    public function save($data,$table){

        $this->db->insert($table,$data);
    }

    public function getUnOpenedNotifByIdguru($idguru_param)
    {
        $this->db->select('*');
        $this->db->from('guru_notification');
        $this->db->where('is_open', 0 );
        $this->db->where('guru_idguru', $idguru_param );
        
        $query = $this->db->get();
        
        return $query->result();   
    }

    public function getTotalUnOpenedNotifByIdguru($idguru_param)
    {

        $this->db->select('COUNT(guru_idguru) as total');
        $this->db->from('guru_notification');
        //$this->db->like('kata', $str );
        $this->db->where('is_open =', 0);
        $this->db->where('guru_idguru', $idguru_param );

        $query = $this->db->get();
        //var_dump($this->db->last_query());
        return $query->row();    

        
    }
}