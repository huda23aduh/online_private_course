<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    private $table = "guru";

    public function __construct()
    {
        $this->load->database();
    }

    public function get_email_by_param($email)
    {


        $this->db->select('COUNT(email) as total');
        $this->db->from('guru');
        //$this->db->like('kata', $str );
        $this->db->where('email =', $email);

        $query = $this->db->get();
        //var_dump($this->db->last_query());
        return $query->row();    
    }

    public function check($email, $password) {

        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('email', $email );
        $this->db->where('password', $password );
        
        $query = $this->db->get();
        //var_dump($query->result());
        return $query->result();    
    }
   
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('is_deleted', 0 );
        
        $query = $this->db->get();
        return $query->result();    
    }

    public function getAllGuruByIdPelajaran($id_pelajaran_param)
    {
        $this->db->select('*');
        $this->db->from('guru_pelajaran');
        $this->db->where('pelajaran_idpelajaran', $id_pelajaran_param );
        
        $query = $this->db->get();
        //var_dump($query->result());
        return $query->result();    
    }
    
    public function getById($kode_guru)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('kode_guru', $kode_guru );
        $this->db->where('is_deleted', 0 );
        $query = $this->db->get();
        
        return $query->result(); 
    }

    public function save($data,$table){

        $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;

        //$this->db->insert($table,$data);
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

    public function updateKodeGuru($idguru, $data,$table){

        $this->db->where("idguru",$idguru);
        $this->db->update($table,$data); 

        return  $idles;
    }

     public function updateDataGuru($kode_guru, $data,$table){

        $this->db->where("kode_guru",$kode_guru);
        $this->db->update($table,$data); 

        return  $kode_guru;
    }

     public function delete($kode_guru, $data,$table){
        
        $this->db->where("kode_guru",$kode_guru);
        $this->db->update($table,$data); 

        return  $kode_guru;
    }
}