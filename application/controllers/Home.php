<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $m_column = 8;


	public function __construct()
    {
        parent::__construct();

        $this->load->helper('url_helper');
    }

	
	public function index()
	{
		
		$this->load->view('v_header');
		$this->load->view('v_home_user', $data);
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


}


?>