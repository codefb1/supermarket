<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Newsletters extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		     $client_email = $this->input->post('newsletter_email');
			$checkEmail = $this->M_newsletters->checkEmail($client_email);
			if($checkEmail) {
				echo json_encode(array('result'=>2));
			} else {
				
					$add_data=array(
										"client_email" => $client_email,
										
										"newsletter_created" => date("Y-m-d H:i:s")
										);
										$this->M_newsletters->add_new_entry($add_data);
										 echo json_encode(array('result'=>1));
			}
	}
		
	
	}
?>