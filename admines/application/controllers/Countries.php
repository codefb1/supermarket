<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Countries extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "countries/index";
				$config['total_rows'] = $this->M_countries->count_all();
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
				$data['countries_list'] = $this->M_countries->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_countries/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			
	 	if($this->input->post('country_name')) {
			
		try {
			
			$this->form_validation->set_rules('country_name', 'country_name', 'required');
			   $add_data=array(
					                   "country_name" => $this->input->post('country_name'),
									
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
				$data['country_name'] = $this->input->post('country_name');
			
										
				$this->template->load('template','views_countries/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_countries->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$this->template->load('template','views_countries/add',$data);
				}
				
				else if($this->M_countries->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['country_name'] = $this->input->post('country_name');
				  
					$this->template->load('template','views_countries/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_countries/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['countrie'] = $this->M_countries->get_this(end($this->uri->segments));
			if($this->input->post('country_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('country_name', 'country_name', 'required');
			   $update_data=array(
					                    "country_name" => $this->input->post('country_name')
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'countries/edit/'.$data['process_status'].'/'.$this->input->post('country_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_countries->update_this($this->input->post('country_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'countries/edit/'.$data['process_status'].'/'.$this->input->post('country_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'countries/edit/'.$data['process_status'].'/'.$this->input->post('country_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_countries/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('country_id');
			if(is_numeric($data_id)){
				if($this->M_countries->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/countries/index/'.$data_id);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	
		/*** Update status Banner  Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$country_id=$this->input->post('country_id');
			if(is_numeric($data_id)){
				$update_entries=array('country_data_status'=>$data_id);
				if($this->M_countries->update_status($update_entries,$country_id)==true){
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