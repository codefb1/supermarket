<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class CategoriesCouffin extends CI_Controller {
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
				$config['base_url'] = base_url() . "categoriesCouffin/index";
				$config['total_rows'] = $this->M_categories_couffin->count_all();
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
				$data['categories_list'] = $this->M_categories_couffin->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_categories_couffin/index',$data);
	}
		
		/*** Add interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
		if($this->input->post('categorie_couffin_name')) {
			
		try {
			
		
			$this->form_validation->set_rules('categorie_couffin_name', 'categorie_couffin_name', 'required');
	
	  		$add_data=array(
						"categorie_couffin_name" => $this->input->post('categorie_couffin_name'),
						"categorie_couffin_content" => $this->input->post('categorie_couffin_content'),
						"categorie_couffin_meta_description" => $this->input->post('categorie_couffin_meta_description'),
						"categorie_couffin_meta_title" => $this->input->post('categorie_couffin_meta_title'),
						"categorie_couffin_meta_keywords" => $this->input->post('categorie_couffin_meta_keywords'),
					
						
						"categorie_couffin_picture" => $this->input->post('categorie_couffin_picture')
					);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							    
								$data['categorie_couffin_name'] = $this->input->post('categorie_couffin_name');
								$data['categorie_couffin_picture'] = $this->input->post('categorie_couffin_picture');
								$data['categorie_couffin_meta_description'] = $this->input->post('categorie_couffin_meta_description');
								$data['categorie_couffin_meta_title'] = $this->input->post('categorie_couffin_meta_title');
								$data['categorie_couffin_meta_keywords'] = $this->input->post('categorie_couffin_meta_keywords');
							
								
								$this->template->load('template','views_categories_couffin/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_categories_couffin->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_categories_couffin/add',$data);
							}
							
							else if($this->M_categories_couffin->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['categorie_couffin_name'] = $this->input->post('categorie_couffin_name');
								$data['categorie_couffin_picture'] = $this->input->post('categorie_couffin_picture');
								$data['categorie_couffin_meta_description'] = $this->input->post('categorie_couffin_meta_description');
								$data['categorie_couffin_meta_title'] = $this->input->post('categorie_couffin_meta_title');
								$data['categorie_couffin_meta_keywords'] = $this->input->post('categorie_couffin_meta_keywords');
							
								$this->template->load('template','views_categories_couffin/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_categories_couffin/add',$data);
		}
			
			
		}
		/*** Edit interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['page_name'] = 'categorie';
			$data['categorie'] = $this->M_categories_couffin->get_this(end($this->uri->segments));
			
			
		  	if($this->input->post('categorie_couffin_id') > 0) {
				
				try {
					$this->form_validation->set_rules('categorie_couffin_name', 'categorie_couffin_name', 'required');
				$update_data=array(
								"categorie_couffin_name" => $this->input->post('categorie_couffin_name'),
								"categorie_couffin_content" => $this->input->post('categorie_couffin_content'),
								"categorie_couffin_picture" => $this->input->post('categorie_couffin_picture'),
								"categorie_couffin_meta_description" => $this->input->post('categorie_couffin_meta_description'),
								"categorie_couffin_meta_title" => $this->input->post('categorie_couffin_meta_title'),
								"categorie_couffin_meta_keywords" => $this->input->post('categorie_couffin_meta_keywords'),
								
										);
						

							if 	($this->form_validation->run() == FALSE) {
								
									 $data['process_status'] = 99;
									 redirect(base_url().'categoriesCouffin/edit/'.$data['process_status'].'/'.$this->input->post('categorie_couffin_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {
								
								$update_process = $this->M_categories_couffin->update_this($this->input->post('categorie_couffin_id'), $update_data);
								
								if($update_process  == true ) {

									 $data['process_status'] = 1;
									 redirect(base_url().'categoriesCouffin/edit/'.$data['process_status'].'/'.$this->input->post('categorie_couffin_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'categoriesCouffin/edit/'.$data['process_status'].'/'.$this->input->post('categorie_couffin_id'), 'refresh');
								}
							}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_categories_couffin/edit',$data);
			}
		
	
			
		} 

		
		
				/*** Update Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$categorie_couffin_id=$this->input->post('categorie_couffin_id');
			if(is_numeric($data_id)){
				$update_entries=array('data_status_categorie_couffin'=>$data_id);
				if($this->M_categories_couffin->update_status($update_entries,$categorie_couffin_id)==true){
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
			$data_id=$this->input->post('categorie_couffin_id');
			if(is_numeric($data_id)){
				if($this->M_categories_couffin->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/categoriesCouffin/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		}

  
			public function deletePicture() {  
	
			
				$update_data=array(
								
								"categorie_couffin_picture" => "",
										);
		         $update_process = $this->M_categories_couffin->update_this($this->input->post('categorie_couffin_id'), $update_data);
				  echo json_encode(array('result'=>1));
				
			
			
				
			
			
		
		}
	
	  	 public function uploadFile()
		{ 

            try {
				
				$config = array(
									'upload_path' => './medias/couffin/',
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
                                    'fileName '        => $_FILES['files']['categorie_couffin_name'],
                                    );*/
									echo ($data_image);

				}
			
			} catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			 
			}

        }
		
		
			/*** get Sub Categorie by Categ ***/
		
				
	}
?>