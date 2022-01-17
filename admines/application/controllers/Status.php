<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Status extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "status/index";
				$config['total_rows'] = $this->M_status->count_all();
				$config['per_page'] = 20;
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
				$data['status_list'] = $this->M_status->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_status/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			
	 	if($this->input->post('status_name')) {
			
		try {
			
			$this->form_validation->set_rules('status_name', 'status_name', 'required');
			   $add_data=array(
					                   "status_name" => $this->input->post('status_name'),
									    "status_color" => $this->input->post('status_color'),
										"status_type" => $this->input->post('status_type'),
										
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
				$data['status_name'] = $this->input->post('status_name');
			    $data['status_color'] = $this->input->post('status_color');
			    $data['status_type'] = $this->input->post('status_type');					
				$this->template->load('template','views_status/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_status->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$this->template->load('template','views_status/add',$data);
				}
				
				else if($this->M_status->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['status_name'] = $this->input->post('status_name');
				    $data['status_color'] = $this->input->post('status_color');
					$data['status_type'] = $this->input->post('status_type');
					$this->template->load('template','views_status/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_status/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['status'] = $this->M_status->get_this(end($this->uri->segments));
			if($this->input->post('status_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('status_name', 'status_name', 'required');
			   $update_data=array(
					                    "status_name" => $this->input->post('status_name'),
										"status_color" => $this->input->post('status_color'),
										"status_type" => $this->input->post('status_type'),
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'status/edit/'.$data['process_status'].'/'.$this->input->post('status_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_status->update_this($this->input->post('status_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'status/edit/'.$data['process_status'].'/'.$this->input->post('status_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'status/edit/'.$data['process_status'].'/'.$this->input->post('status_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_status/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('status_id');
			if(is_numeric($data_id)){
				if($this->M_status->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/status/index/'.$data_id);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	}
		
?>