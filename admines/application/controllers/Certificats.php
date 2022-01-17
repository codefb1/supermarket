<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Certificats extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Certifications */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "certificats/index";
				$config['total_rows'] = $this->M_certificats->count_all();
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
				$data['certificats_list'] = $this->M_certificats->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_certificats/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			
	 	if($this->input->post('certificat_name')) {
			
		try {
			
			$this->form_validation->set_rules('certificat_name', 'certificat_name', 'required');
			   $add_data=array(
					                    "certificat_name" =>  str_replace('"', "'", $this->input->post('certificat_name')),
										"certificat_discription" =>  $this->input->post('certificat_discription'),
										"certificat_picture" => $this->input->post('certificat_picture'),
				
										"certificat_data_created" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
				$data['certificat_name'] = $this->input->post('certificat_name');
				$data['certificat_picture'] = $this->input->post('certificat_picture');
				$data['certificat_discription'] = $this->input->post('certificat_discription');				
				$this->template->load('template','views_certificats/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_certificats->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$this->template->load('template','views_certificats/add',$data);
				}
				
				else if($this->M_certificats->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['certificat_name'] = $this->input->post('certificat_name');
					$data['certificat_picture'] = $this->input->post('certificat_picture');
					$data['certificat_discription'] = $this->input->post('certificat_discription');
					$this->template->load('template','views_certificats/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_certificats/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
		  $data['certificat'] = $this->M_certificats->get_this(end($this->uri->segments));
			if($this->input->post('certificat_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('certificat_name', 'certificat_name', 'required');
			   $update_data=array(
					                   "certificat_name" =>  str_replace('"', "'", $this->input->post('certificat_name')),
										"certificat_discription" =>  $this->input->post('certificat_discription'),
										"certificat_picture" => $this->input->post('certificat_picture'),
										"certificat_data_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'certificats/edit/'.$data['process_status'].'/'.$this->input->post('certificat_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_certificats->update_this($this->input->post('certificat_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'certificats/edit/'.$data['process_status'].'/'.$this->input->post('certificat_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'certificats/edit/'.$data['process_status'].'/'.$this->input->post('certificat_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_certificats/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('certificat_id');
			if(is_numeric($data_id)){
				if($this->M_certificats->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/certificats/index/'.$data_id);
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
			$certificat_id=$this->input->post('certificat_id');
			if(is_numeric($data_id)){
				$update_entries=array('certificat_data_status'=>$data_id);
				if($this->M_certificats->update_status($update_entries,$certificat_id)==true){
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
			/*** upload  picture Banner  Execute function ***/
    public function uploadFile()
    { 

        try {
			$config = array(
							'upload_path' => './medias/certificats/',
							'allowed_types' => '*',
							'max_size' => '6000',
							'max_width' => '4000',
							'max_height' => '4000'
							);
     
            $this->load->library('upload');

   
            $file_name    =  'file_'. md5(microtime());
            $config['file_name'] = $file_name;
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('logo');

            if (!$file)
            {
                    $errors = $this->upload->display_errors('', '');
                  
             var_dump($errors);
            }
            else
            { 

                    $data_file = $this->upload->data();

                    $data_image  =  $data_file['file_name'];
                   
									echo ($data_image);

            }
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}

        }

	}
?>