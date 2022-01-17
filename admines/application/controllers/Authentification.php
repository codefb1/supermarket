<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentification extends CI_Controller {

 public function __construct()
    {
       parent::__construct();
    	 
    }   
			/*** Default controller function ***/
			public function index()
			{
			$this->load->view('views_authentifications/authentification',$data);
			}
 
	/* Check Account Authentification */

	    function checkaccount(){
		
		try {
		
				 $this->form_validation->set_rules('account_user', 'account_user', 'required');
				 $this->form_validation->set_rules('account_password', 'account_password', 'required');
		
				if ($this->form_validation->run() == FALSE) {

						$data['process_status'] = 99;
						$this->load->view('views_authentifications/authentification',$data);
						
				}	
				if ($this->form_validation->run() == TRUE) {
					
					$data['session_data']=$this->M_authentification->checkthisaccount($this->input->post('account_user'), $this->input->post('account_password'));

					if($data['session_data']) {

					   $session_array = array(
											'account_id'=>$data['session_data']->account_id,
											'account_lastname'=>$data['session_data']->account_lastname,
											'account_firstname'=>$data['session_data']->account_firstname,
											'account_email'=>$data['session_data']->account_email,
											'account_status'=>$data['session_data']->account_status,
											'account_user'=>$data['account_user']->account_user,
											'partener_id'=>$data['session_data']->partener_id,
											'account_infos'=>$data['session_data'],
											'logged_in'=>TRUE
											   );
				 $this->session->set_userdata($session_array);
						if($data['session_data']->partener_id)
						{  	
					redirect('comptedPartener/');	
						}
						
						 else {  	
					redirect('dashboard/');	
						}
					}
					else if($data['session_data'] == false ) {
						$data['process_status'] = 99;
						$this->load->view('views_authentifications/authentification',$data);
						
					}
				}
	
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
				}
	

	}
			/* Logout System Process */
			public function system_logout() {
			try {
				$this->session->set_userdata('logged_in', FALSE);
				$this->session->unset_userdata($u_session);
				$this->session->sess_destroy();
				redirect('/authentification/','refresh');
					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
				}
			}
	
}
?>