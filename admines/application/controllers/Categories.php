<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Categories extends CI_Controller {
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
				$config['base_url'] = base_url() . "categories/index";
				$config['total_rows'] = $this->M_categories->count_all($parent_id= null);
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
				$data['categories_list'] = $this->M_categories->get_all($config['per_page'], $page,$parent_id= null);
	
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_categories/index',$data);
	}
		
		/*** Add interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
		if($this->input->post('categorie_name')) {
			
		try {
			
		
			$this->form_validation->set_rules('categorie_name', 'categorie_name', 'required');
	
	  		$add_data=array(
						"categorie_name" => $this->input->post('categorie_name'),
						"categorie_content" => $this->input->post('categorie_content'),
						"categorie_meta_description" => $this->input->post('categorie_meta_description'),
						"categorie_meta_title" => $this->input->post('categorie_meta_title'),
						"categorie_meta_keywords" => $this->input->post('categorie_meta_keywords'),
						"is_show_home" => $this->input->post('is_show_home'),
						"is_show_menu" => $this->input->post('is_show_menu'),
						
						"categorie_picture" => $this->input->post('categorie_picture')
					);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							    
								$data['categorie_name'] = $this->input->post('categorie_name');
								$data['categorie_picture'] = $this->input->post('categorie_picture');
								$data['categorie_meta_description'] = $this->input->post('categorie_meta_description');
								$data['categorie_meta_title'] = $this->input->post('categorie_meta_title');
								$data['categorie_meta_keywords'] = $this->input->post('categorie_meta_keywords');
								$data['is_show_home'] = $this->input->post('is_show_home');
								$data['is_show_menu'] = $this->input->post('is_show_menu');
								
								$this->template->load('template','views_categories/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_categories->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_categories/add',$data);
							}
							
							else if($this->M_categories->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['categorie_name'] = $this->input->post('categorie_name');
								$data['categorie_picture'] = $this->input->post('categorie_picture');
								$data['categorie_meta_description'] = $this->input->post('categorie_meta_description');
								$data['categorie_meta_title'] = $this->input->post('categorie_meta_title');
								$data['categorie_meta_keywords'] = $this->input->post('categorie_meta_keywords');
								$data['is_show_home'] = $this->input->post('is_show_home');
								$data['is_show_menu'] = $this->input->post('is_show_menu');
								$this->template->load('template','views_categories/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_categories/add',$data);
		}
			
			
		}
		/*** Edit interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['page_name'] = 'categorie';
			$data['categorie'] = $this->M_categories->get_this(end($this->uri->segments));
			
			
		  	if($this->input->post('categorie_id') > 0) {
				
				try {
					$this->form_validation->set_rules('categorie_name', 'categorie_name', 'required');
				$update_data=array(
								"categorie_name" => $this->input->post('categorie_name'),
								"categorie_content" => $this->input->post('categorie_content'),
								"categorie_picture" => $this->input->post('categorie_picture'),
								"categorie_meta_description" => $this->input->post('categorie_meta_description'),
								"categorie_meta_title" => $this->input->post('categorie_meta_title'),
								"categorie_meta_keywords" => $this->input->post('categorie_meta_keywords'),
								"is_show_home" => $this->input->post('is_show_home'),
								"is_show_menu" => $this->input->post('is_show_menu'),
										);
						

							if 	($this->form_validation->run() == FALSE) {
								
									 $data['process_status'] = 99;
									 redirect(base_url().'categories/edit/'.$data['process_status'].'/'.$this->input->post('categorie_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {
								
								$update_process = $this->M_categories->update_this($this->input->post('categorie_id'), $update_data);
								
								if($update_process  == true ) {

									 $data['process_status'] = 1;
									 redirect(base_url().'categories/edit/'.$data['process_status'].'/'.$this->input->post('categorie_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'categories/edit/'.$data['process_status'].'/'.$this->input->post('categorie_id'), 'refresh');
								}
							}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_categories/edit',$data);
			}
		
	
			
		} 

		
		
				/*** Update Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$categorie_id=$this->input->post('categorie_id');
			if(is_numeric($data_id)){
				$update_entries=array('data_status_categorie'=>$data_id);
				if($this->M_categories->update_status($update_entries,$categorie_id)==true){
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
			$data_id=$this->input->post('categorie_id');
			if(is_numeric($data_id)){
				if($this->M_categories->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/categories/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		}

   public function subCategories(){
		
		
		try {
			    
				  if($this->input->get('filtercheck')){
					 $session_search_array = array(
					     
						 'keywordcategorie' => $this->input->get('keywordcategorie'),
						 'categorie_ids' => $this->input->get('categorie_ids'),
						 
						  
						 
					 );
					$this->session->set_userdata($session_search_array);
					
				} 
				($this->session->userdata('keywordcategorie') != "N" and $this->session->userdata('keywordcategorie') != '') ? $keywordcategorie = $this->session->userdata('keywordcategorie') : $keywordcategorie = "N"; 
				($this->session->userdata('categorie_ids') != "N" and $this->session->userdata('categorie_ids') != '') ? $categorie_ids = $this->session->userdata('categorie_ids') : $categorie_ids = "N";
			
				$config = array();
				$config['base_url'] = base_url() . "categories/subCategories";
				$config['total_rows'] = $this->M_categories->count_all(true,$keywordcategorie,$categorie_ids);
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
				$data['categories_list'] = $this->M_categories->get_all($config['per_page'], $page,true,$keywordcategorie,$categorie_ids);
	            $data['categories_parents'] = $this->M_categories->get_categories(false);
				$data['pagination'] = $this->pagination->create_links();
				$data['keywordcategorie'] =$keywordcategorie;
				 $data['categorie_ids'] =$categorie_ids;
			     if($categorieIds == "N"){
					 $data['categorie_ids'] ='';
					 }
					  if($keywordcategorie == "N"){
					 $data['keywordcategorie'] ='';
					 }
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_categories/subCategorie',$data);
	}
	
	public function addSubCategorie()
		{
			$data['process_status'] = 0;
			
		$data['categories'] = $this->M_categories->get_categories(false);
		if($this->input->post('categorie_name')) {
			
		try {
			
		
			$this->form_validation->set_rules('categorie_name', 'categorie_name', 'required');
			$this->form_validation->set_rules('parent_id', 'parent_id', 'required');
	
	  		$add_data=array(
						"parent_id" => $this->input->post('parent_id'),
						"categorie_name" => $this->input->post('categorie_name'),
						"categorie_content" => $this->input->post('categorie_content'),
						"categorie_meta_description" => $this->input->post('categorie_meta_description'),
						"categorie_meta_title" => $this->input->post('categorie_meta_title'),
						"categorie_meta_keywords" => $this->input->post('categorie_meta_keywords'),
						"categorie_picture" => $this->input->post('categorie_picture')
					);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							    
								$data['parent_id'] = $this->input->post('parent_id');
								$data['categorie_picture'] = $this->input->post('categorie_picture');
								$data['categorie_name'] = $this->input->post('categorie_name');
								$data['categorie_meta_description'] = $this->input->post('categorie_meta_description');
								$data['categorie_meta_title'] = $this->input->post('categorie_meta_title');
								$data['categorie_meta_keywords'] = $this->input->post('categorie_meta_keywords');
								$this->template->load('template','views_categories/addSubCategorie',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_categories->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_categories/addSubCategorie',$data);
							}
							
							else if($this->M_categories->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['categorie_name'] = $this->input->post('categorie_name');
								$data['parent_id'] = $this->input->post('parent_id');
								$data['categorie_meta_description'] = $this->input->post('categorie_meta_description');
								$data['categorie_meta_title'] = $this->input->post('categorie_meta_title');
								$data['categorie_meta_keywords'] = $this->input->post('categorie_meta_keywords');
								$this->template->load('template','views_categories/addSubCategorie',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_categories/addSubCategorie',$data);
		}
			
			
		}
		
		/*** Edit interface function ***/
		public function editSubCategorie()
		{
			
			$data['process_status'] = 0;
			$data['page_name'] = 'categorie';
			$data['categories'] = $this->M_categories->get_categories(false);
			$data['categorie'] = $this->M_categories->get_this(end($this->uri->segments));
			
			
		  	if($this->input->post('categorie_id') > 0) {
				
				try {
					$this->form_validation->set_rules('categorie_name', 'categorie_name', 'required');
					$this->form_validation->set_rules('parent_id', 'parent_id', 'required');
				$update_data=array(
								"categorie_name" => $this->input->post('categorie_name'),
								"parent_id" => $this->input->post('parent_id'),
								"categorie_content" => $this->input->post('categorie_content'),
								"categorie_meta_description" => $this->input->post('categorie_meta_description'),
								"categorie_meta_title" => $this->input->post('categorie_meta_title'),
								"categorie_meta_keywords" => $this->input->post('categorie_meta_keywords'),
								"categorie_picture" => $this->input->post('categorie_picture'),
										);
						

							if 	($this->form_validation->run() == FALSE) {
								
									 $data['process_status'] = 99;
									 redirect(base_url().'categories/editSubCategorie/'.$data['process_status'].'/'.$this->input->post('categorie_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {
								
								$update_process = $this->M_categories->update_this($this->input->post('categorie_id'), $update_data);
								
								if($update_process  == true ) {

									 $data['process_status'] = 1;
									 redirect(base_url().'categories/editSubCategorie/'.$data['process_status'].'/'.$this->input->post('categorie_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'categories/editSubCategorie/'.$data['process_status'].'/'.$this->input->post('categorie_id'), 'refresh');
								}
							}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_categories/editSubCategorie',$data);
			}
		
	
			
		} 
		
			public function deletePicture() {  
	
			
				$update_data=array(
								
								"categorie_picture" => "",
										);
		         $update_process = $this->M_categories->update_this($this->input->post('categorie_id'), $update_data);
				  echo json_encode(array('result'=>1));
				
			
			
				
			
			
		
		}
	
	  	 public function uploadFile()
		{ 

            try {
				
				$config = array(
									'upload_path' => './medias/categories/',
									'allowed_types' => '*',
									'max_size' => '6000',
									'max_width' => '2000',
									'max_height' => '2000'
									);
				

					$this->load->library('upload');
					$file_name    =  'file_'. md5(microtime());
					$config['file_name'] = $file_name;
					$this->upload->initialize($config);
					$file = $this->upload->do_upload('logo');

					if (!$file)
					{
							$errors = $this->upload->display_errors('', '');
							//$error = array('error' => $this->upload->display_errors());
							var_dump($errors);
					}
					else
					{ 

						$data_file = $this->upload->data();

						$data_image  =  $data_file['file_name'];
                    /*$data_image  = array(
                                    'fileNameServer'   => $data_file['file_name'],
                                    'extension'        => $data_file['file_ext'],
                                    'fileName '        => $_FILES['files']['categorie_name'],
                                    );*/
									echo ($data_image);

				}
			
			} catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			 
			}

        }
		
		
			/*** get Sub Categorie by Categ ***/
		public function getSubCategoriebyCateg() { 
		
		try {
			$us=0;
			
			$categorie_id=$this->input->post('categorie_id');
			$data['categories'] = $this->M_categories->get_sub_categories($categorie_id);
			 echo json_encode(array('subcategory_list'=>$data['categories']));
				
			
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
		

				
				
				 public function saveCountProduct() { 
		$categories_list = $this->M_categories->get_all_table();
		foreach($categories_list as $categories){
			if($categories->parent_id==0){
					$categorie_count=$this->M_products->count_product_by_categorie($categories->categorie_id,null);
					
					$update_data=array(
								
								"count_products" => $categorie_count,
								
										);
										$this->M_categories->update_this($categories->categorie_id, $update_data);
				} else {
							$sub_categorie_count =$this->M_products->count_product_by_categorie(null,$categories->categorie_id);
							
					
					$update_data=array(
								
								"count_products" => $sub_categorie_count,
								
										);
										$this->M_categories->update_this($categories->categorie_id, $update_data);
				}
							
				
			}
             }
				
	}
?>