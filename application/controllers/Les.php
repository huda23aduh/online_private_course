<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Les extends CI_Controller {

	public $idmurid = 0;
	
	public function __construct()
    {
        parent::__construct();
        // $this->load->model('sort_array_model');
         $this->load->model('les_model');
         $this->load->model('murid_notification_model');
         $this->load->model('guru_notification_model');
         $this->load->model('guru_model');
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
		$this->load->view('murid/v_murid_header_sidebar');
		$this->load->view('murid/v_new_booking_les');
		$this->load->view('murid/v_murid_footer');
	}

	public function new_booking_process()
	{
		$tanggal = $this->input->post('tanggal');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$durasi = $this->input->post('durasi');
		$tarif = $this->input->post('tarif');
		$alamat = $this->input->post('alamat');
		$idpelajaran = $this->input->post('idpelajaran');
		$idmurid = $this->input->post('idmurid');
		$ket_pelajaran = $this->input->post('ket_pelajaran');

		$data = array(
			'tanggal_les' => $tanggal,
			'waktu_mulai' => $waktu_mulai,
			'durasi_jam' => $durasi,
			'tarif' => $tarif,
			'alamat_les' => $alamat,
			'pelajaran_idpelajaran' => $idpelajaran,
			'keterangan_pelajaran' => $ket_pelajaran,
			'murid_idmurid' => $idmurid,
			'status_les_idstatus_les' => 0,
			'is_deleted' => 0,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
		);

		if($tanggal != null){

			$the_id_les = $this->les_model->save($data,'les');

			$data_notif_murid = array(
				'information' => "idles=".$the_id_les,
				'is_open' => 0,
				'murid_idmurid' => $idmurid,
			'is_deleted' => 0,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
			);
			$this->murid_notification_model->save($data_notif_murid,'murid_notification');


			// broadcast notif to all guru that has same idpelajaran
			$gurus = $this->guru_model->getAllGuruByIdPelajaran($idpelajaran);
			foreach ($gurus as $value) {
				$data_notif_guru = array(
					'information' => $the_id_les,
					'guru_idguru' => $value->guru_idguru,
					'is_open' => 0,
					'is_deleted' => 0,
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => date("Y-m-d H:i:s")
				);
				$this->guru_notification_model->save($data_notif_guru,'guru_notification');
			}
			// broadcast notif to all guru that has same idpelajaran

		

			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('BERHASIL INSERT DATA');
		    window.location.href='".base_url()."murid/home';
		    </script>");
		}
		elseif ($is_exist->total > 0) {
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('gagal insert data les');
		    window.location.href='".base_url()."murid/new_booking';
		    </script>");
		}



	}

	
	public function login()
	{
		$this->load->view('v_header');
		$this->load->view('murid/v_login_murid');
		$this->load->view('v_footer');


	}

	public function create()
	{
		$tanggal = $this->input->post('tanggal');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$durasi = $this->input->post('durasi');
		$pelajaran = $this->input->post('idpelajaran');
		$alamat = $this->input->post('alamat');
		$tarif = $this->input->post('tarif');

		$data = array(
			'tanggal' => $tanggal,
			'waktu_mulai' => $waktu_mulai,
			'durasi_jam' => $durasi,
			'password' => $password,
			'alamat' => $alamat,
			'is_deleted' => 0,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
		);

		$is_exist = $this->murid_model->get_email_by_param($email);

		if($is_exist->total == 0){

			$this->murid_model->save($data,'murid');

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

	public function assign_les()
	{
		$idles =  $this->uri->segment(3);
  		$idguru =  $this->uri->segment(4);

  		$data = array(
			'idguru' => $idguru,
			'status_les_idstatus_les' => 1,
			'updated_at' => date("Y-m-d H:i:s")
		);

  		$this->les_model->assign_les_action($idles, $data, 'les');

  		echo ("<script LANGUAGE='JavaScript'>
  		window.alert('BERHASIL AMBIL TAWARAN');
		window.location.href='".base_url()."guru/home';
		</script>");

	}

	public function cancel_les()
	{
		$idles =  $this->uri->segment(3);

  		$data = array(
			'idles' => $idguru,
			'status_les_idstatus_les' => 3,
			'updated_at' => date("Y-m-d H:i:s")
		);

  		$this->les_model->cancel_les_action($idles, $data, 'les');

  		echo ("<script LANGUAGE='JavaScript'>
  		window.alert('LES DIBATALKAN');
		window.location.href='".base_url()."murid/home/';
		</script>");

	}


}


?>