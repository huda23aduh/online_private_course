<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran_model extends CI_Model
{
    private $table = "pelajaran";

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
        $this->db->from('pelajaran');
        $this->db->where('email', $email );
        $this->db->where('password', $password );
        
        $query = $this->db->get();
        
        return $query->result();    
    }
   

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pelajaran');
        
        $query = $this->db->get();
        
        return $query->result(); 
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save($data,$table){

        $this->db->insert($table,$data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("product_id" => $id));
    }
}