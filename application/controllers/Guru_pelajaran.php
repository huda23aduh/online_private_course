<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_pelajaran extends CI_Controller {

	public function __construct()
    {
         parent::__construct();
        // $this->load->model('sort_array_model');
         $this->load->model('guru_model');
         $this->load->model('les_model');
         $this->load->model('guru_pelajaran_model');
         $this->load->model('pelajaran_model');
         // Load form validation library
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        // Load session library
		$this->load->library('session');
    }



	public function create()
	{
		$idguru = $this->input->post('idguru');
		$idpelajaran = $this->input->post('idpelajaran');

		

		$is_exist = $this->guru_pelajaran_model->check_before_insert($idguru, $idpelajaran);

		if($is_exist->total == 0){

			$data = array(
				'guru_idguru' => $idguru,
				'pelajaran_idpelajaran' => $idpelajaran,
				'is_deleted' => 0,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->guru_pelajaran_model->save($data,'guru_pelajaran');

			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('BERHASIL INSERT DATA');
		    window.location.href='".base_url()."guru/home';
		    </script>");
		}
		elseif ($is_exist->total > 0) {
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('gagal insert data');
		    window.location.href='".base_url()."guru/tambah_pelajaran';
		    </script>");
		}



	}



	


}


?>