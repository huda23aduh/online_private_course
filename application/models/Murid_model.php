<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Murid_model extends CI_Model
{
    private $table = "murid";

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
        $this->db->from('murid');
        $this->db->where('is_deleted', 0 );
        
        $query = $this->db->get();
        return $query->result();    
    }
    
   public function getById($kode_guru)
    {
        $this->db->select('*');
        $this->db->from('murid');
        $this->db->where('kode_murid', $kode_guru );
        $this->db->where('is_deleted', 0 );
        $query = $this->db->get();
        
        return $query->result(); 
    }

    public function updateDataMurid($kode_murid, $data,$table){

        $this->db->where("kode_murid",$kode_murid);
        $this->db->update($table,$data); 

        return  $kode_murid;
    }

    public function save($data,$table){
        $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;

        //$this->db->insert($table,$data);
    }

     public function updateKodeMurid($idmurid, $data,$table){

        $this->db->where("idmurid",$idmurid);
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

    public function delete($kode_murid, $data,$table){
        
        $this->db->where("kode_murid",$kode_murid);
        $this->db->update($table,$data); 

        return  $kode_murid;
    }
}