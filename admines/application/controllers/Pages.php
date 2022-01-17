<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Pages extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
			
				$config = array();
				$config['base_url'] = base_url() . "pages/index";
				$config['total_rows'] = $this->M_pages->count_all();
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
			$data['pages_list'] = $this->M_pages->get_all($config['per_page'], $page);
			$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_pages/index',$data);
	}
		/*** Add interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
	 	if($this->input->post('page_name')) {
			
		try {
			
		
			$this->form_validation->set_rules('page_name', 'page_name', 'required');
			// $this->form_validation->set_rules('page_title_en', 'page_title_en', 'required');
			//$this->form_validation->set_rules('page_meta_title', 'page_meta_title', 'required');
			//$this->form_validation->set_rules('page_meta_description', 'page_meta_description', 'required');
			//$this->form_validation->set_rules('page_meta_keywords', 'page_meta_keywords', 'required');
			//$this->form_validation->set_rules('page_content', 'page_content', 'required');
			//$this->form_validation->set_rules('page_url', 'page_url', 'required');
			$add_data=array(
							"page_title" => $this->input->post('page_title'),
							"page_name" => $this->input->post('page_name'),
							 "page_image" => $this->input->post('page_image'),
							"page_meta_title" => $this->input->post('page_meta_title'),
							"page_description" => $this->input->post('page_description'),
							"page_meta_description" => $this->input->post('page_meta_description'),
							"page_meta_keywords" => $this->input->post('page_meta_keywords'),
							//"page_meta_title_en" => $this->input->post('page_meta_title_en'),
							//"page_meta_description_en" => $this->input->post('page_meta_description_en'),
							// "page_meta_keywords_en" => $this->input->post('page_meta_keywords_en'),
							//"data_created" => date("Y-m-d H:i:s"),
							//"data_updated" => date("Y-m-d H:i:s")
					);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							
								$this->template->load('template','views_pages/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_pages->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_pages/add',$data);
							}
							
							else if($this->M_pages->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$this->template->load('template','views_pages/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_pages/add');
		}
			
			
		}
		/*** Edit interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
				$data['page'] = $this->M_pages->get_this(end($this->uri->segments));
				if($this->input->post('page_id') > 0) {
				
				try {
					
					
						//$this->form_validation->set_rules('page_title_en', 'page_title_en', 'required');
						//$this->form_validation->set_rules('page_title ', 'page_title', 'required');
					//	$this->form_validation->set_rules('page_meta_title', 'page_meta_title', 'required');
						//$this->form_validation->set_rules('page_meta_description', 'page_meta_description', 'required');
						//$this->form_validation->set_rules('page_meta_keywords', 'page_meta_keywords', 'required');
						//$this->form_validation->set_rules('page_content', 'page_content', 'required');
						//$this->form_validation->set_rules('page_url', 'page_url', 'required');
					$update_data=array(
							"page_title" => $this->input->post('page_title'),
							"page_name" => $this->input->post('page_name'),
							"page_description" => $this->input->post('page_description'),
							
							"page_meta_title" => $this->input->post('page_meta_title'),
							"page_meta_description" => $this->input->post('page_meta_description'),
							"page_meta_keywords" => $this->input->post('page_meta_keywords'),
							"page_image" => $this->input->post('page_image'),
							//"page_meta_description_en" => $this->input->post('page_meta_description_en'),
							//"page_meta_keywords_en" => $this->input->post('page_meta_keywords_en'),
							
										);
					

							if 	($this->form_validation->run() == FALSE) {
								
									// $data['process_status'] = 99;
									// redirect(base_url().'pages/edit/'.$data['process_status'].'/'.$this->input->post('page_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {}
								
								$update_process = $this->M_pages->update_this($this->input->post('page_id'), $update_data);
								
								if($update_process  == true ) {
									
									 $data['process_status'] = 1;
									 redirect(base_url().'pages/edit/'.$data['process_status'].'/'.$this->input->post('page_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'pages/edit/'.$data['process_status'].'/'.$this->input->post('page_id'), 'refresh');
								}
							

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_pages/edit',$data);
			}
		
	
			
		} 
	

	
		/*** Delete Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('page_id');
			if(is_numeric($data_id)){
				if($this->M_pages->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/pages/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		}
		/*** Update Execute function ***/
		
		
		/*** Update Execute function ***/
		public function updatestatus() { 
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$page_id=$this->input->post('pages_id');
			if(is_numeric($data_id)){
				$update_entries=array('page_data_status'=>$data_id);
				if($this->M_pages->update_status($update_entries,$page_id)==true){
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
		
         	 public function uploadFilecss()
		{ 

            try {
					$config = array(
									'upload_path' => './assets/page_css/',
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
                                    'fileName '        => $_FILES['files']['name'],
                                    );*/
									echo ($data_image);

				}
			
			} catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			 
			}

        }
		
		  public function uploadFilejs()
    { 

            try {
					$config = array(
					'upload_path' => './assets/page_js/',
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
                                    'fileName '        => $_FILES['files']['name'],
                                    );*/
									echo ($data_image);
            }
			
		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);
		 
	    }

    }


    public function uploadFile()
    { 

            try {
			$config = array(
			'upload_path' => './medias/pages/',
			'allowed_types' => 'gif|jpg|jpeg|png',
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
                                    'fileName '        => $_FILES['files']['name'],
                                    );*/
									echo ($data_image);

            }
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}

        }
	}
?>