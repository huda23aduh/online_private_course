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

    public function checkPelajaran($nama_pelajaran_param) {

        $this->db->select('COUNT(*) as total');
        $this->db->from('pelajaran');
        $this->db->like('nama_pelajaran', $nama_pelajaran_param );

        $query = $this->db->get();
        return $query->row();   

        
    }
   

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pelajaran');
        $this->db->where('is_deleted', 0 );
        $query = $this->db->get();
        
        return $query->result(); 
    }
    
    public function getById($idpelajaran)
    {
        $this->db->select('*');
        $this->db->from('pelajaran');
        $this->db->where('idpelajaran', $idpelajaran );
        $this->db->where('is_deleted', 0 );
        $query = $this->db->get();
        
        return $query->result(); 
    }

    public function save($data,$table){

        $this->db->insert($table,$data);
    }

    public function updateNamaPelajaran($idpelajaran, $data,$table){

        $this->db->where("idpelajaran",$idpelajaran);
        $this->db->update($table,$data); 

        return  $idles;
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

    public function delete($idpelajaran, $data,$table){
        
        $this->db->where("idpelajaran",$idpelajaran);
        $this->db->update($table,$data); 

        return  $idles;
    }
}