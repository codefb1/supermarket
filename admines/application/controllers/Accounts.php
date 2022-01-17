<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Accounts extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste  users */
				public function index(){
		
		
		try {
			
				$config = array();
				$config['base_url'] = base_url() . "accounts/index";
				$config['total_rows'] = $this->M_accounts->count_all();
				$config['per_page'] = 5;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '&laquo; Première';
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Dernier &raquo;';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = 'Suivant &rarr;';
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr; Pr&eacute;cédent';
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['accounts_list'] = $this->M_accounts->get_all($config['per_page'], $page);
			$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_accounts/index',$data);
	}
		/*** Add  users interface function ***/
		public function add()
		{  
			$data['process_status'] = 0;
	 	if($this->input->post('account_firstname')) {
			
		try {
		$this->form_validation->set_rules('account_lastname', 'account_lastname', 'required');
		$this->form_validation->set_rules('account_firstname', 'account_firstname', 'required');
		$this->form_validation->set_rules('account_email', 'Email', 'required');
        $this->form_validation->set_rules('account_password', 'Password', 'required');
		 $this->form_validation->set_rules('account_user', 'account_user', 'required');
			$add_data=array(
			            "account_user" => $this->input->post('account_user'),
						"account_lastname" => $this->input->post('account_lastname'),
						"account_firstname" => $this->input->post('account_firstname'),
						"account_password" =>$this->input->post('account_password'),
						"account_email" => $this->input->post('account_email'),
						"type_compte" => 1,
						
					);
					$data['account_user'] = $this->input->post('account_user');
					$data['account_lastname'] = $this->input->post('account_lastname');
					$data['account_firstname'] = $this->input->post('account_firstname');
					$data['account_email'] = $this->input->post('account_email');
					$data['account_password'] = $this->input->post('account_password');
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
								$this->template->load('template','views_accounts/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
						
							if($this->M_accounts->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_accounts/add',$data);
							}
							
							else if($this->M_accounts->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$this->template->load('template','views_accounts/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_accounts/add',$data);
		}
			
			
		}
		/*** Edit users interface function ***/
		public function edit()
		{
			$data['process_status'] = 0;
			
			$data['account'] = $this->M_accounts->get_this(end($this->uri->segments));
		
	if($this->input->post('account_id') > 0) {
				
    	try {
	
			$this->form_validation->set_rules('account_lastname', 'account_lastname', 'required');
			$this->form_validation->set_rules('account_firstname', 'account_firstname', 'required');
            $this->form_validation->set_rules('account_email', 'Email', 'required');
			$this->form_validation->set_rules('account_user', 'account_user', 'required');
			$update_data=array(
				"account_lastname" => $this->input->post('account_lastname'),
				"account_firstname" => $this->input->post('account_firstname'),
				"account_email" => $this->input->post('account_email'),
				"account_user" => $this->input->post('account_user'),
				"data_updated" => date("Y-m-d H:i:s")

				);

					if($this->input->post('account_password')) {

					$update_data['account_password'] = $this->input->post('account_password');

					}
					if 	($this->form_validation->run() == FALSE) {

					$data['process_status'] = 99;
					redirect(base_url().'accounts/edit/'.$data['process_status'].'/'.$this->input->post('account_id'), 'refresh');
					}
							
			    	if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_accounts->update_this($this->input->post('account_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'accounts/edit/'.$data['process_status'].'/'.$this->input->post('account_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'accounts/edit/'.$data['process_status'].'/'.$this->input->post('account_id'), 'refresh');
					}
				}

			} catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			}
		}
		else {
				
	$this->template->load('template','views_accounts/edit',$data);
		}
		} 
		/*** Delete users Execute function ***/
		public function delete() {  
		
		try {
			$data_id=$this->input->post('account_id');
			if(is_numeric($data_id)){
				if($this->M_accounts->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/accounts/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}

		/*** Update users  status Execute function ***/
		public function updatestatus() {

		try {		
			$us=0;
			$data_id=$this->input->post('idsatus');
			$account_id=$this->input->post('account_id');
			if(is_numeric($data_id)){
				$update_entries=array('data_status'=>$data_id);
				if($this->M_accounts->update_status($update_entries,$account_id)==true){
					echo json_encode(array('result'=>1));
				}
			}
			else {  
				 echo json_encode(array('result'=>0));

			}
			
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
	
	}
?>