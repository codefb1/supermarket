<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
	error_reporting(E_ALL);
	class Sociaux extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		
		
				public function index(){
		
		
		try {
			
				
			
				$data['sociaux'] = $this->M_sociaux->get_this(1);

				if($this->input->post('sociau_id') > 0) {
					
						$update_data=array(
										"facebook" => $this->input->post('facebook'),
										"twitter" => $this->input->post('twitter'),
										"linkedin" => $this->input->post('linkedin'),
										"instgram" => $this->input->post('instgram'),
										"google_plus" => $this->input->post('google_plus'),
										"pinterest" => $this->input->post('pinterest'),
										"youtub" => $this->input->post('youtub')

										);
				

		
	
							
			
								
								$update_process = $this->M_sociaux->update_this($this->input->post('sociau_id'), $update_data);
								
								if($update_process  == true ) {
									
									 $data['process_status'] = 1;
									 redirect(base_url().'sociaux/index/'.$data['process_status'].'/'.$this->input->post('sociau_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'sociaux/index/'.$data['process_status'].'/'.$this->input->post('sociau_id'), 'refresh');
								}
							
					}
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_sociaux/index',$data);
	}
		/*** Add interface function ***/


	
		
	}
?>