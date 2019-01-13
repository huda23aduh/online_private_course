<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
         parent::__construct();

         $this->load->model('admin_model');
         $this->load->model('guru_model');
         $this->load->model('murid_model');
         $this->load->model('pelajaran_model');
         // Load form validation library
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        // Load session library
		$this->load->library('session');
    }

    public function home()
	{
		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_home');
		$this->load->view('admin/v_admin_footer');


	}

	public function login()
	{

		$this->load->view('admin/v_admin_login');
	}

	public function add_pelajaran()
	{
		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_add_pelajaran');
		$this->load->view('admin/v_admin_footer');


	}
	public function createPelajaran()
	{
		$var_nama_pelajaran = $this->input->post('txt_nama_pelajaran');

		$data['var_check_pelajaran'] = $this->pelajaran_model->checkPelajaran($var_nama_pelajaran);

		if($data['var_check_pelajaran'] == null)
		{
	    	echo ("<script LANGUAGE='JavaScript'>
			window.alert('pelajaran sudah ada');
			window.location.href='".base_url()."admin/add_pelajaran';
			</script>");
		}
	    else if($data['var_check_pelajaran'] != null){
	    	$data = array(
				'nama_pelajaran' => $var_nama_pelajaran,
				
				'is_deleted' => 0,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->pelajaran_model->save($data, 'pelajaran');
	    	echo ("<script LANGUAGE='JavaScript'>
			window.alert('pelajaran berhasil ditambahkan');
			window.location.href='".base_url()."admin/list_pelajaran';
			</script>");
	    }


	}

	public function edit_pelajaran($idpelajaran_param)
	{
		$data = array(
			'var_pelajaran' => $this->pelajaran_model->getById($idpelajaran_param)
		);

		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_edit_pelajaran', $data);
		$this->load->view('admin/v_admin_footer');


	}

	public function editPelajaran()
	{
		$var_idpelajaran = $this->input->post('txt_idpelajaran');
        $var_nama_pelajaran = $this->input->post('txt_nama_pelajaran');
		
		$data = array(
			'nama_pelajaran' => $var_nama_pelajaran,
			'updated_at' => date("Y-m-d H:i:s")
		);
		
		$this->pelajaran_model->updateNamaPelajaran($var_idpelajaran, $data,'pelajaran');

		echo ("<script LANGUAGE='JavaScript'>
			window.alert('pelajaran berhasil diubah');
			window.location.href='".base_url()."admin/list_pelajaran';
			</script>");

	}

	public function hapusPelajaran($idpelajaran_param)
	{
		$var_idpelajaran = $idpelajaran_param;
        $var_nama_pelajaran = $this->input->post('txt_nama_pelajaran');
		
		$data = array(
			'is_deleted' => 1,
			'updated_at' => date("Y-m-d H:i:s")
		);
		
		$this->pelajaran_model->delete($var_idpelajaran, $data,'pelajaran');

		echo ("<script LANGUAGE='JavaScript'>
			window.alert('pelajaran berhasil dihapus');
			window.location.href='".base_url()."admin/list_pelajaran';
			</script>");

	}

	public function list_pelajaran()
	{
		$data = array(
			'all_pelajaran' => $this->pelajaran_model->getAll()
		);

		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_list_pelajaran', $data);
		$this->load->view('admin/v_admin_footer');


	}

	public function list_guru()
	{
		$data = array(
			'all_guru' => $this->guru_model->getAll()
		);

		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_list_guru', $data);
		$this->load->view('admin/v_admin_footer');


	}

	public function list_murid()
	{
		$data = array(
			'all_murid' => $this->murid_model->getAll()
		);

		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_list_murid', $data);
		$this->load->view('admin/v_admin_footer');


	}


	public function login_process()
	{
		$var_email = $this->input->post('txt_email');
        $var_password = $this->input->post('txt_password');

        if(is_null($var_email) || is_null($var_password))
			redirect(base_url('admin/login'));
		else{
			$data['var_result_query'] = $this->admin_model->check($var_email, $var_password);

			

	        if($data['var_result_query'] == null)
	        {
	        	echo ("<script LANGUAGE='JavaScript'>
			    window.alert('email cccc / password tidak cocok');
			    window.location.href='".base_url()."admin/login';
			    </script>");
	        }
	        else if($data['var_result_query'] != null){

	        	foreach($data['var_result_query'] as $item_1) {
	        		$email	= $item_1->email ;
	        		$idadmin	= $item_1->idadmin ;
	        		$password_data	= $item_1->password ;
				}
				$session_data = array(
				'email' => $item_1->email,
				'idadmin' => $item_1->idadmin,
				'password' => $item_1->password ,
				);

				$this->session->set_userdata('logged_in', $session_data);
				redirect(base_url('admin/home'));
	        }
		}

	}


	// Logout from admin page
	public function logout() {
		

		// Removing session data
		//$sess_array = array( 'username' => '' );
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
		//$this->load->view('admin/v_admin_login', $data);
	}

	

	public function add_guru()
	{
		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_add_guru');
		$this->load->view('admin/v_admin_footer');


	}
	public function add_murid()
	{
		$this->load->view('admin/v_admin_header_sidebar');
		$this->load->view('admin/v_admin_add_murid');
		$this->load->view('admin/v_admin_footer');


	}

	public function createGuru()
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

			$idguru = $this->guru_model->save($data,'guru');

			$num = 4;
			$num_padded = sprintf("%04d", $idguru);
			$kodeguru = 'GR'.$num_padded;

			$data = array(
				'kode_guru' => $kodeguru,
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->guru_model->updateKodeGuru($idguru, $data,'guru');

			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('kode guru = ".$kodeguru."');
		    window.location.href='".base_url()."admin/home';
		    </script>");
		}
		elseif ($is_exist->total > 0) {
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('EMAIL GURU SUDAH TERDAFTAR');
		    window.location.href='".base_url()."admin/add_guru';
		    </script>");
		}



	}

	public function createMurid()
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
		    window.alert(' kodemurid = ".$kodemurid."');
		    window.location.href='".base_url()."admin/home';
		    </script>");
		}
		elseif ($is_exist->total > 0) {
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('EMAIL GURU SUDAH TERDAFTAR');
		    window.location.href='".base_url()."admin/add_murid';
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