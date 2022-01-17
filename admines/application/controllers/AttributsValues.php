<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class AttributsValues extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		
				
				public function index(){
		
	
		try {
			
				$config = array();
				$config['base_url'] = base_url() . "attributsValues/index";
				$config['total_rows'] = $this->M_attributs_values->count_all();
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
				$data['attributs_values_list'] = $this->M_attributs_values->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_attributs_values/index',$data);
	}
		
		/*** Add interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			$data['attributs'] = $this->M_attributs->get_all_table();
		if($this->input->post('attribut_value')) {
			
		try {
			
		
			$this->form_validation->set_rules('attribut_value', 'attribut_value', 'required');
	        $this->form_validation->set_rules('attribut_id', 'attribut_id', 'required');
	  		$add_data=array(
						"attribut_value" => $this->input->post('attribut_value'),
						"attribut_id" => $this->input->post('attribut_id'),
						
					);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							    
								$data['attribut_value'] = $this->input->post('attribut_value');
								$data['attribut_id'] = $this->input->post('attribut_id');
								
								$this->template->load('template','views_attributs_values/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_attributs_values->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_attributs_values/add',$data);
							}
							
							else if($this->M_attributs_values->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['attribut_value'] = $this->input->post('attribut_value');
								$data['attribut_id'] = $this->input->post('attribut_id');
								$this->template->load('template','views_attributs_values/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_attributs_values/add',$data);
		}
			
			
		}
		/*** Edit interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['page_name'] = 'categorie';
			$data['attribut_value'] = $this->M_attributs_values->get_this(end($this->uri->segments));
			$data['attributs'] = $this->M_attributs->get_all_table();
			
		  	if($this->input->post('attribut_value_id') > 0) {
				
				try {
					$this->form_validation->set_rules('attribut_value', 'attribut_value', 'required');
					$this->form_validation->set_rules('attribut_id', 'attribut_id', 'required');
				$update_data=array(
									"attribut_value" => $this->input->post('attribut_value'),
						            "attribut_id" => $this->input->post('attribut_id'),
										);
						

							if 	($this->form_validation->run() == FALSE) {
								
									 $data['process_status'] = 99;
									 redirect(base_url().'attributsValues/edit/'.$data['process_status'].'/'.$this->input->post('attribut_value_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {
								
								$update_process = $this->M_attributs_values->update_this($this->input->post('attribut_value_id'), $update_data);
								
								if($update_process  == true ) {

									 $data['process_status'] = 1;
									 redirect(base_url().'attributsValues/edit/'.$data['process_status'].'/'.$this->input->post('attribut_value_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'attributsValues/edit/'.$data['process_status'].'/'.$this->input->post('attribut_value_id'), 'refresh');
								}
							}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_attributs_values/edit',$data);
			}
		
	
			
		} 

		
		
				/*** Update Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$attribut_value_id=$this->input->post('attribut_value_id');
			if(is_numeric($data_id)){
				$update_entries=array('attribut_value_data_status'=>$data_id);
				if($this->M_attributs_values->update_status($update_entries,$attribut_value_id)==true){
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
		
	
			/*** Delete Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('attribut_value_id');
			if(is_numeric($data_id)){
				if($this->M_attributs_values->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/attributsValues/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		}

   
				
	}
?>