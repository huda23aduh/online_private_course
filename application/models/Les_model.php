<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Les_model extends CI_Model
{
    private $table = "les";

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

    public function getDataForGuru($idguru_param)
    {
        $this->db->select('l.idles, l.waktu_mulai, l.tanggal_les, l.durasi_jam, l.tarif, l.alamat_les, m.telepon as telepon_murid,  p.nama_pelajaran, m.nama as nama_murid, l.status_les_idstatus_les ', false);
        $this->db->from('les As l');
        $this->db->join('pelajaran AS p', 'l.pelajaran_idpelajaran = p.idpelajaran');
        $this->db->join('murid AS m', 'l.murid_idmurid = m.idmurid');
        $this->db->where('idguru', $idguru_param);
        $query = $this->db->get();
        
        return $query->result(); 


          
    }

    public function getDataForMurid($idmurid_param)
    {
        $val_return;

        $this->db->select('l.idles, l.waktu_mulai, l.tanggal_les, l.durasi_jam, l.tarif, l.alamat_les,  p.nama_pelajaran, s.status_les  as status_les ', false);
        $this->db->from('les As l');
        $this->db->join('pelajaran AS p', 'l.pelajaran_idpelajaran = p.idpelajaran');
        $this->db->join('status_les AS s', 'l.status_les_idstatus_les = s.idstatus_les');
        $this->db->where('murid_idmurid', $idmurid_param );
        $query = $this->db->get();
        
        // return $query->result(); 

        // $this->db->select('*');
        // $this->db->from('les');
        // $this->db->where('murid_idmurid', $idmurid_param );
        // $query = $this->db->get();

        if($query->result() != null){
            

            $val_return = $query->result();   
        }
        
        return $val_return;
    }

    public function getAvailableLesPrivatForGuru($idguru_param)
    {
        $val_return;
        $arrTID = array();

        $this->db->select('pelajaran_idpelajaran');
        $this->db->from('guru_pelajaran');
        $this->db->where('guru_idguru', $idguru_param);
        $query = $this->db->get();



        if($query->result() != null){
            $i=0;
            foreach ($query->result() as $value) {
                $arrTID[$i] = $value->pelajaran_idpelajaran;
                $i++;
            } 

            $this->db->select('l.idles,l.tanggal_les, l.waktu_mulai, l.durasi_jam, l.tarif, l.alamat_les,  p.nama_pelajaran, m.nama as nama_murid, l.status_les_idstatus_les ', false);
            $this->db->from('les As l');
            $this->db->join('pelajaran AS p', 'l.pelajaran_idpelajaran = p.idpelajaran');
            $this->db->join('murid AS m', 'l.murid_idmurid = m.idmurid');
            $this->db->where_in('pelajaran_idpelajaran', $arrTID);
            $this->db->where('status_les_idstatus_les', 0);
            $query = $this->db->get();

            
            
            $val_return =  $query->result(); 
        }



          
        return $val_return;
    }

    public function getAvailableLesPrivatByIdLes($id_les_param)
    {
        

        $this->db->select('l.idles,l.tanggal_les, l.waktu_mulai, l.durasi_jam, l.tarif, l.alamat_les,  p.nama_pelajaran, m.nama as nama_murid, l.status_les_idstatus_les ', false);
        $this->db->from('les As l');
        $this->db->join('pelajaran AS p', 'l.pelajaran_idpelajaran = p.idpelajaran');
        $this->db->join('murid AS m', 'l.murid_idmurid = m.idmurid');
        $this->db->where('idles', $id_les_param);
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

    public function assign_les_action($idles, $data,$table){

        $this->db->where("idles",$idles);
        $this->db->update($table,$data);  



        return  $idles;
    }

    public function cancel_les_action($idles, $data,$table){

        $this->db->where("idles",$idles);
        $this->db->update($table,$data);  



        return  $idles;
    }

    
}