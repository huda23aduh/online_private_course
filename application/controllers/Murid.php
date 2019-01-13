<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();

        
         $this->load->model('murid_model');
         $this->load->model('pelajaran_model');
         $this->load->model('les_model');
         // Load form validation library
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        // Load session library
		$this->load->library('session');
    }

    public function home()
	{
		$this->load->view('murid/v_murid_header_sidebar');
		$this->load->view('murid/v_murid_home');
		$this->load->view('murid/v_murid_footer');
	}

	public function new_booking()
	{
		$data = array(
			'all_pelajaran' => $this->pelajaran_model->getAll()
		);
		// var_dump($data["all_pelajaran"]);		
		$this->load->view('murid/v_murid_header_sidebar');
		$this->load->view('murid/v_new_booking_les', $data);
		$this->load->view('murid/v_murid_footer');
	}

	
	public function login()
	{
		$this->load->view('v_header');
		$this->load->view('murid/v_login_murid');
		$this->load->view('v_footer');


	}

	public function list_les_privat($idmurid_param)
	{
		$data = array(
			'all_les_privat_murid' => $this->les_model->getDataForMurid($idmurid_param)
		);
		$this->load->view('murid/v_murid_header_sidebar');
		$this->load->view('murid/v_list_les_privat', $data);
		$this->load->view('murid/v_murid_footer');


	}

	public function login_process()
	{
		$var_email = $this->input->post('txt_email');
        $var_password = $this->input->post('txt_password');

		if(is_null($var_email) || is_null($var_password))
			redirect(base_url('murid/login'));
		else{
			$data['var_result_query'] = $this->murid_model->check($var_email, $var_password);


	        if($data['var_result_query'] == null)
	        {
	        	echo ("<script LANGUAGE='JavaScript'>
			    window.alert('email / password tidak cocok');
			    window.location.href='".base_url()."murid/login';
			    </script>");
	        }
	        else if($data['var_result_query'] != null){

	        	foreach($data['var_result_query'] as $item_1) {
	        		$name_data	= $item_1->nama ;
	        		$iduser_data	= $item_1->iduser ;
	        		$password_data	= $item_1->password ;

				}
				$session_data = array(
				'nama' => $item_1->nama,
				'idmurid' => $item_1->idmurid,
				'password' => $item_1->password ,
				);

				$this->session->set_userdata('logged_in', $session_data);
				redirect(base_url('murid/home'));
	        }
		}
	}

	// Logout from admin page
	public function logout() {
		

		// Removing session data
		//$sess_array = array( 'username' => '' );
		$this->session->sess_destroy();
		redirect(base_url('murid/login'));
		//$this->load->view('admin/v_admin_login', $data);
	}

	public function create()
	{
		$nama = $this->input->post('txt_nama');
		$telepon = $this->input->post('txt_telepon');
		$email = $this->input->post('txt_email');
		$password = $this->input->post('txt_password');
		$alamat = $this->input->post('txt_alamat');

		$data = array(
			'nama' => $nama,
			'telepon' => $telepon,
			'email' => $email,
			'password' => $password,
			'alamat' => $alamat,
			'is_deleted' => 0,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
		);

		$is_exist = $this->murid_model->get_email_by_param($email);

		if($is_exist->total == 0){

			$idmurid = $this->murid_model->save($data,'murid');

			$num = 4;
			$num_padded = sprintf("%04d", $idmurid);
			$kodemurid = 'MRD'.$num_padded;

			$data = array(
				'kode_murid' => $kodemurid,
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->murid_model->updateKodeMurid($idmurid, $data,'murid');

			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('BERHASIL INSERT DATA');
		    window.location.href='".base_url()."murid/login';
		    </script>");
		}
		elseif ($is_exist->total > 0) {
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('EMAIL SUDAH TERDAFTAR');
		    window.location.href='".base_url()."murid/register';
		    </script>");
		}



	}

	

	public function register()
	{
		$this->load->view('v_header');
		$this->load->view('murid/v_register_murid');
		$this->load->view('v_footer');


	}





}


?>