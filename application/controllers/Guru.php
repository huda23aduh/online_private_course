<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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

    public function home()
	{
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_home');
		$this->load->view('guru/v_guru_footer');


	}

	public function add_pelajaran()
	{
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_add_pelajaran');
		$this->load->view('guru/v_guru_footer');


	}

	public function list_les_privat($idguru_param)
	{
		$data = array(
			'all_les_privat_guru' => $this->les_model->getDataForGuru($idguru_param)
		);
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_list_les_privat', $data);
		$this->load->view('guru/v_guru_footer');
	}

	public function list_pelajaran_guru($idguru_param)
	{
		$data = array(
			'all_pelajaran_of_guru' => $this->guru_pelajaran_model->getPelajaranByIdguru($idguru_param)
		);
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_list_pelajaran', $data);
		$this->load->view('guru/v_guru_footer');


	}

	public function tambah_pelajaran()
	{
		$data = array(
			'all_pelajaran' => $this->pelajaran_model->getAll()
		);
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_add_pelajaran', $data);
		$this->load->view('guru/v_guru_footer');


	}

	public function available_les_privat($idguru_param)
	{
		$data = array(
			'all_available_les_privat_guru' => $this->les_model->getAvailableLesPrivatForGuru($idguru_param)
		);
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_available_les_privat', $data);
		$this->load->view('guru/v_guru_footer');


	}

	public function available_les_privat_by_id_les($idles_param)
	{
		$data = array(
			'available_les_privat_by_id_les_for_guru' => $this->les_model->getAvailableLesPrivatByIdLes($idles_param)
		);
		$this->load->view('guru/v_guru_header_sidebar');
		$this->load->view('guru/v_guru_available_les_privat', $data);
		$this->load->view('guru/v_guru_footer');


	}

	
	public function login()
	{
		$this->load->view('v_header');
		$this->load->view('guru/v_login_guru');
		$this->load->view('v_footer');


	}

	public function login_process()
	{
		$var_email = $this->input->post('txt_email');
        $var_password = $this->input->post('txt_password');

        if(is_null($var_email) || is_null($var_password))
			redirect(base_url('guru/login'));
		else{
			$data['var_result_query'] = $this->guru_model->check($var_email, $var_password);


	        if($data['var_result_query'] == null)
	        {
	        	echo ("<script LANGUAGE='JavaScript'>
			    window.alert('email / password tidak cocok');
			    window.location.href='".base_url()."guru/login';
			    </script>");
	        }
	        else if($data['var_result_query'] != null){

	        	foreach($data['var_result_query'] as $item_1) {
	        		$nama_data	= $item_1->nama ;
	        		$idguru_data	= $item_1->idguru ;
	        		$password_data	= $item_1->password ;
	        		// echo $item_1->username ;
	        		// echo "<br>";
	        		// echo $item_1->iduser ;
				}
				$session_data = array(
				'nama' => $item_1->nama,
				'idguru' => $item_1->idguru,
				'password' => $item_1->password ,
				);

				$this->session->set_userdata('logged_in', $session_data);
				redirect(base_url('guru/home'));
	        }
		}

	}


	// Logout from admin page
	public function logout() {
		

		// Removing session data
		//$sess_array = array( 'username' => '' );
		$this->session->sess_destroy();
		redirect(base_url('guru/login'));
		//$this->load->view('admin/v_admin_login', $data);
	}

	public function register()
	{
		$this->load->view('v_header');
		$this->load->view('guru/v_register_guru');
		$this->load->view('v_footer');


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

		$is_exist = $this->guru_model->get_email_by_param($email);

		if($is_exist->total == 0){

			$this->guru_model->save($data,'guru');

			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('BERHASIL INSERT DATA');
		    window.location.href='".base_url()."guru/login';
		    </script>");
		}
		elseif ($is_exist->total > 0) {
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('EMAIL SUDAH TERDAFTAR');
		    window.location.href='".base_url()."guru/register';
		    </script>");
		}



	}



	public function process_params()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $aa = "Venue List eeeeeeeeeeeeeee";

		$data = array(
		    'var_kata_kunci' =>$this->input->post('kata_kunci'),
		    'var_nama_lokasi' =>$this->input->post('nama_lokasi'),
		    'var_from_controller' => $aa );

		$this->load->view('user/v_header');
		$this->load->view('user/v_home_user', $data);
		$this->load->view('user/v_footer');


	}


}


?>