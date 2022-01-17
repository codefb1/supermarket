<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Attributs extends CI_Controller {
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
				$config['base_url'] = base_url() . "attributs/index";
				$config['total_rows'] = $this->M_attributs->count_all();
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
				$data['attributs_list'] = $this->M_attributs->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_attributs/index',$data);
	}
		
		/*** Add interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
		if($this->input->post('attribut_name')) {
			
		try {
			
		
			$this->form_validation->set_rules('attribut_name', 'attribut_name', 'required');
	
	  		$add_data=array(
						"attribut_name" => $this->input->post('attribut_name'),
						"attribut_picture" => $this->input->post('attribut_picture'),
						
					);
				if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
							    
								$data['attribut_name'] = $this->input->post('attribut_name');
								
								$this->template->load('template','views_attributs/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
							if($this->M_attributs->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_attributs/add',$data);
							}
							
							else if($this->M_attributs->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['attribut_name'] = $this->input->post('attribut_name');
								
								$this->template->load('template','views_attributs/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_attributs/add',$data);
		}
			
			
		}
		/*** Edit interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['page_name'] = 'categorie';
			$data['attribut'] = $this->M_attributs->get_this(end($this->uri->segments));
			
			
		  	if($this->input->post('attribut_id') > 0) {
				
				try {
					$this->form_validation->set_rules('attribut_name', 'attribut_name', 'required');
				$update_data=array(
								"attribut_name" => $this->input->post('attribut_name'),
								"attribut_picture" => $this->input->post('attribut_picture'),
										);
						

							if 	($this->form_validation->run() == FALSE) {
								
									 $data['process_status'] = 99;
									 redirect(base_url().'attributs/edit/'.$data['process_status'].'/'.$this->input->post('attribut_id'), 'refresh');
							}
							
							if ($this->form_validation->run() == TRUE) {
								
								$update_process = $this->M_attributs->update_this($this->input->post('attribut_id'), $update_data);
								
								if($update_process  == true ) {

									 $data['process_status'] = 1;
									 redirect(base_url().'attributs/edit/'.$data['process_status'].'/'.$this->input->post('attribut_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'attributs/edit/'.$data['process_status'].'/'.$this->input->post('attribut_id'), 'refresh');
								}
							}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_attributs/edit',$data);
			}
		
	
			
		} 

		
		
				/*** Update Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$attribut_id=$this->input->post('attribut_id');
			if(is_numeric($data_id)){
				$update_entries=array('attribut_data_status'=>$data_id);
				if($this->M_attributs->update_status($update_entries,$attribut_id)==true){
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
			$data_id=$this->input->post('attribut_id');
			if(is_numeric($data_id)){
				if($this->M_attributs->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/attributs/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		}

   
					  	 public function uploadFile()
		{ 

            try {
				
				$config = array(
									'upload_path' => './medias/attributs/',
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
	}
?>