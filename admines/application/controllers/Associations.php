<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Associations extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "associations/index";
				$config['total_rows'] = $this->M_associations->count_all();
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
				$data['associations_list'] = $this->M_associations->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_associations/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			
				$data['countries_list'] = $this->M_countries->get_all_table();
				
	 	if($this->input->post('association_lastname')) {
			
		try {
			
			$this->form_validation->set_rules('association_lastname', 'association_lastname', 'required');
			   $add_data=array(
					                    "association_lastname" => $this->input->post('association_lastname'),
                                        "association_comments" => $this->input->post('association_comments'),
										"association_city" => $this->input->post('association_city'),
										"association_email" => $this->input->post('association_email'),
                                        "association_phone" => $this->input->post('association_phone'),
										"association_adress" => $this->input->post('association_adress'),
										"association_zip" => $this->input->post('association_zip'),
									    "association_country_id" => $this->input->post('association_country_id'),
										"association_picture" => $this->input->post('association_picture'),
										"association_short_text" => $this->input->post('association_short_text'),
										"association_responsable" => $this->input->post('association_responsable'),
										"association_phone_portable" => $this->input->post('association_phone_portable'),
										 "association_price" => $this->input->post('association_price'),
										"association_created" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
				$data['association_lastname'] = $this->input->post('association_lastname');
				$data['association_adress'] = $this->input->post('association_adress');
                $data['association_country_id'] = $this->input->post('association_country_id');
				$data['association_city'] = $this->input->post('association_city');
				$data['association_phone'] = $this->input->post('association_phone');
				$data['association_zip'] = $this->input->post('association_zip');
				$data['association_email'] = $this->input->post('association_email');
				$data['association_comments'] = $this->input->post('association_comments');
				$data['association_picture'] = $this->input->post('association_picture');
				$data['association_short_text'] = $this->input->post('association_short_text');
				$data['association_responsable'] = $this->input->post('association_responsable');
				$data['association_phone_portable'] = $this->input->post('association_phone_portable');
				$data['association_price'] = $this->input->post('association_price');
			
				$this->template->load('template','views_associations/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_associations->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					
				
							
							
					$this->template->load('template','views_associations/add',$data);
				}
				
				else if($this->M_associations->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['association_lastname'] = $this->input->post('association_lastname');
					$data['association_adress'] = $this->input->post('association_adress');
					$data['association_country_id'] = $this->input->post('association_country_id');
					$data['association_city'] = $this->input->post('association_city');
					$data['association_phone'] = $this->input->post('association_phone');
					$data['association_zip'] = $this->input->post('association_zip');
					$data['association_email'] = $this->input->post('association_email');	
                    $data['association_comments'] = $this->input->post('association_comments');
					$data['association_picture'] = $this->input->post('association_picture');
				    $data['association_short_text'] = $this->input->post('association_short_text');
					$data['association_responsable'] = $this->input->post('association_responsable');
				    $data['association_phone_portable'] = $this->input->post('association_phone_portable');
					$data['association_price'] = $this->input->post('association_price');
			
					$this->template->load('template','views_associations/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_associations/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			$data['countries_list'] = $this->M_countries->get_all_table();
				
			$data['association'] = $this->M_associations->get_this(end($this->uri->segments),null);
			
			
			
			if($this->input->post('association_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('association_lastname', 'association_lastname', 'required');
			   $update_data=array(
								"association_lastname" => $this->input->post('association_lastname'),
								"association_city" => $this->input->post('association_city'),
								"association_email" => $this->input->post('association_email'),
								"association_phone" => $this->input->post('association_phone'),
								"association_adress" => $this->input->post('association_adress'),
								"association_zip" => $this->input->post('association_zip'),
								"association_country_id" => $this->input->post('association_country_id'),
								"association_comments" => $this->input->post('association_comments'),
								"association_picture" => $this->input->post('association_picture'),
								"association_short_text" => $this->input->post('association_short_text'),
								"association_responsable" => $this->input->post('association_responsable'),
								"association_phone_portable" => $this->input->post('association_phone_portable'),
							    "association_price" => $this->input->post('association_price'),
							   "association_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'associations/edit/'.$data['process_status'].'/'.$this->input->post('association_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_associations->update_this($this->input->post('association_id'), $update_data);
					
					if($update_process  == true ) {
					
						 $data['process_status'] = 1;
						 redirect(base_url().'associations/edit/'.$data['process_status'].'/'.$this->input->post('association_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'associations/edit/'.$data['process_status'].'/'.$this->input->post('association_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_associations/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('association_id');
			if(is_numeric($data_id)){
				if($this->M_associations->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/associations/index/'.$data_id);
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
			$association_id=$this->input->post('association_id');
			if(is_numeric($data_id)){
				$update_entries=array('association_status'=>$data_id);
				if($this->M_associations->update_status($update_entries,$association_id)==true){
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
							'upload_path' => './medias/associations/',
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