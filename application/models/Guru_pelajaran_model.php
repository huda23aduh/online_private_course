<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_pelajaran_model extends CI_Model
{
    private $table = "guru_pelajaran";

    public function __construct()
    {
        $this->load->database();
    }

    public function check_before_insert($idguru, $idpelajaran)
    {


        $this->db->select('COUNT(idguru_pelajaran) as total');
        $this->db->from('guru_pelajaran');
        $this->db->where('pelajaran_idpelajaran', $email );
        $this->db->where('guru_idguru', $password );

        $query = $this->db->get();
        return $query->row();    
    }

    public function check($idguru, $idpelajaran) {

        $this->db->select('*');
        $this->db->from('guru_pelajaran');
        $this->db->where('pelajaran_idpelajaran', $email );
        $this->db->where('guru_idguru', $password );
        
        $query = $this->db->get();
        
        return $query->result();    
    }
   

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('guru_pelajaran');
        
        $query = $this->db->get();
        
        return $query->result();   
    }

    public function getPelajaranByIdguru($idguru_param)
    {
        $this->db->select('p.nama_pelajaran', false);    
        $this->db->from('guru_pelajaran AS gp');
        $this->db->join('pelajaran AS p', 'p.idpelajaran = gp.pelajaran_idpelajaran');
        $this->db->where('guru_idguru', $idguru_param);
        $query = $this->db->get();

        
        return $query->result();   
    }

    public function getDataForMurid($idmurid_param)
    {
        $this->db->select('*');
        $this->db->from('les');
        $this->db->where('murid_idmurid', $idmurid_param );
        $query = $this->db->get();
        
        return $query->result();   
    }

    public function getAvailLesForGuru($idguru_param)
    {
        $this->db->select('*');
        $this->db->from('les');
        $this->db->where('status_les_idstatus_les', 0);
        $query = $this->db->get();
        
        return $query->result();   
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save($data,$table){

        $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    
}