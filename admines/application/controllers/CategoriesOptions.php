<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class CategoriesOptions extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		 public function index(){
		
		
		try {
			    
				  if($this->input->get('filtercheck')){
					 $session_search_array = array(
					     
						 'keywordoption' => $this->input->get('keywordoption'),
						 'categoriesid' => $this->input->get('categoriesid'),
						 'optionType' => $this->input->get('optionType'),
						 
						  
						 
					 );
					$this->session->set_userdata($session_search_array);
					
				} 
				($this->session->userdata('keywordoption') != "N" and $this->session->userdata('keywordoption') != '') ? $keywordoption = $this->session->userdata('keywordoption') : $keywordoption = "N"; 
				($this->session->userdata('categoriesid') != "N" and $this->session->userdata('categoriesid') != '') ? $categoriesid = $this->session->userdata('categoriesid') : $categoriesid = "N";
			     ($this->session->userdata('optionType') != "N" and $this->session->userdata('optionType') != '') ? $optionType = $this->session->userdata('optionType') : $optionType = "N";
			
				$config = array();
				$config['base_url'] = base_url() . "categoriesOptions/";
				$config['total_rows'] = $this->M_categories_options->count_all(true,$keywordoption,$categoriesid,$optionType);
				$config['per_page'] = 100;
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
				$data['categories_options_list'] = $this->M_categories_options->get_all($config['per_page'], $page,$keywordoption,$categoriesid,$optionType);
	            $data['categories'] = $this->M_categories->get_categories(true);
				$data['options_types_list'] = $this->M_options_types->get_all_table();
				$data['pagination'] = $this->pagination->create_links();
				$data['keywordoption'] =$keywordoption;
				$data['categoriesid'] =$categoriesid;
				$data['keywordoption'] =$keywordoption;
			     if($categoriesid == "N"){
					 $data['categoriesid'] ='';
					 }
					  if($keywordoption == "N"){
					 $data['keywordoption'] ='';
					 }
					  if($optionType == "N"){
					 $data['optionType'] ='';
					 }
					 
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_categories_options/index',$data);
	}
	
	public function add()
		{
			$data['process_status'] = 0;
			
		$data['categories'] = $this->M_categories->get_categories(true);
		$data['options_types_list'] = $this->M_options_types->get_all_table();
		if($this->input->post('option_name')) {
			
		try {
			
		
			$this->form_validation->set_rules('option_name', 'option_name', 'required');
			$this->form_validation->set_rules('categorie_id', 'categorie_id', 'required');
	         $this->form_validation->set_rules('option_price', 'option_price', 'required');
	  		   $this->form_validation->set_rules('option_type_id', 'option_type_id', 'required');
	  	
			$add_data=array(
						"categorie_id" => $this->input->post('categorie_id'),
						"option_name" => $this->input->post('option_name'),
						"option_type_id" => $this->input->post('option_type_id'),
						"option_price" => $this->input->post('option_price'),
					   "option_price_buying" => $this->input->post('option_price_buying'),
						
						);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							    
								$data['categorie_id'] = $this->input->post('categorie_id');
								$data['option_type_id'] = $this->input->post('option_type_id');
								$data['option_name'] = $this->input->post('option_name');
								$data['option_price'] = $this->input->post('option_price');
								$data['option_price_buying'] = $this->input->post('option_price_buying');
								$this->template->load('template','views_categories_options/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_categories_options->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_categories_options/add',$data);
							}
							
							else if($this->M_categories_options->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['option_name'] = $this->input->post('option_name');
								$data['categorie_id'] = $this->input->post('categorie_id');
								$data['option_price'] = $this->input->post('option_price');
								$data['option_type_id'] = $this->input->post('option_type_id');
								$data['option_price_buying'] = $this->input->post('option_price_buying');
								
								$this->template->load('template','views_categories_options/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_categories_options/add',$data);
		}
			
			
		}
		
		/*** Edit interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['page_name'] = 'categorie';
			$data['categories'] = $this->M_categories->get_categories(true);
			$data['categorie_option'] = $this->M_categories_options->get_this(end($this->uri->segments));
			$data['options_types_list'] = $this->M_options_types->get_all_table();
			
		  	if($this->input->post('categorie_option_id') > 0) {
				
				try {
					$this->form_validation->set_rules('option_name', 'option_name', 'required');
					$this->form_validation->set_rules('categorie_id', 'categorie_id', 'required');
				$update_data=array(
								"option_name" => $this->input->post('option_name'),
								"categorie_id" => $this->input->post('categorie_id'),
								"option_type_id" => $this->input->post('option_type_id'),
								"option_price" => $this->input->post('option_price'),
								"option_type_id" => $this->input->post('option_type_id'),
								 "option_price_buying" => $this->input->post('option_price_buying'),
						
										);
						

							if 	($this->form_validation->run() == FALSE) {
								
									 $data['process_status'] = 99;
									 redirect(base_url().'categoriesOptions/edit/'.$data['process_status'].'/'.$this->input->post('categorie_option_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {
								
								$update_process = $this->M_categories_options->update_this($this->input->post('categorie_option_id'), $update_data);
								
								if($update_process  == true ) {

									 $data['process_status'] = 1;
									 redirect(base_url().'categoriesOptions/edit/'.$data['process_status'].'/'.$this->input->post('categorie_option_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'categoriesOptions/edit/'.$data['process_status'].'/'.$this->input->post('categorie_option_id'), 'refresh');
								}
							}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_categories_options/edit',$data);
			}
		
	
			
		} 
				
				
		
		
				/*** Update Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$categorie_option_id=$this->input->post('categorie_option_id');
			if(is_numeric($data_id)){
				$update_entries=array('data_status_categorie_option'=>$data_id);
				if($this->M_categories_options->update_status($update_entries,$categorie_option_id)==true){
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
			$data_id=$this->input->post('categorie_option_id');
			if(is_numeric($data_id)){
				if($this->M_categories_options->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/categoriesOptions/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		}

  
	
				
	}
?>