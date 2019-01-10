<?php error_reporting(E_ALL & ~E_NOTICE);
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_notification extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        // $this->load->model('sort_array_model');
         $this->load->model('les_model');
         $this->load->model('murid_notification_model');
         $this->load->model('guru_notification_model');
         // Load form validation library
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        // Load session library
		$this->load->library('session');
    }

    public function home()
	{
		$this->load->view('guru/v_murid_header_sidebar');
		$this->load->view('guru/v_murid_home');
		$this->load->view('guru/v_murid_footer');
	}

	// public function getUnOpenedNotifData($idguru)
	// {
	// 	$data_notif = $this->guru_notification_model->getUnOpenedNotif($idguru);
	// 	$data = array(
	// 		'data_notif' => $data_notif,
			
	// 	);
	// 	$this->load->view('guru/v_murid_header_sidebar');
	// 	$this->load->view('guru/v_murid_notif_data', $data);
	// 	$this->load->view('guru/v_murid_footer');
	// }

	public function changeAllNotificationStatusTo1ByIdGuru($idguru){
		$data=array("is_open"=>"1");
		$this->guru_notification_model->updateAllNotifStatusTo1($idguru, $data);
	}

	public function getTotalUnOpenedNotifDataByIdguru($idguru)
	{

		$the_notif_data = array(
			'total_count' => $this->guru_notification_model->getTotalUnOpenedNotifByIdguru($idguru),
			'details' => $this->guru_notification_model->getUnOpenedNotifByIdguru($idguru)
		);

		
	   //add the header here
	    header('Content-Type: application/json');
	    echo json_encode( $the_notif_data );

	}






}


?>