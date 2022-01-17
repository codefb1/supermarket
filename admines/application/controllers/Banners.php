<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Banners extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "banners/index";
				$config['total_rows'] = $this->M_banners->count_all();
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
				$data['banners_list'] = $this->M_banners->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_banners/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
				$data['products'] = $this->M_products->get_all_table();
		
	 	if($this->input->post('banner_title')) {
			
		try {
			
			$this->form_validation->set_rules('banner_title', 'banner_title', 'required');
			   $add_data=array(
					                   "banner_title" =>  str_replace('"', "'", $this->input->post('banner_title')),
										"banner_text" =>  str_replace('"', "'", $this->input->post('banner_text')),
										"banner_botton_text" => $this->input->post('banner_botton_text'),
										"banner_text_deux" => $this->input->post('banner_text_deux'),
										"banner_text_troix" => $this->input->post('banner_text_troix'),
										"banner_picture" => $this->input->post('banner_picture'),
										"product_id" => $this->input->post('product_id'),
										"bannier_position" => $this->input->post('bannier_position'),
										
										"data_updated" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				$data['banner_text_troix'] = $this->input->post('banner_text_troix');
				$data['banner_text_deux'] = $this->input->post('banner_text_deux');
				$data['banner_title'] = $this->input->post('banner_title');
				$data['banner_picture'] = $this->input->post('banner_picture');
				$data['banner_text'] = $this->input->post('banner_text');
				$data['product_id'] = $this->input->post('product_id');	
				$data['banner_botton_text'] = $this->input->post('banner_botton_text');						
				$this->template->load('template','views_banners/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_banners->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$this->template->load('template','views_banners/add',$data);
				}
				
				else if($this->M_banners->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['banner_title'] = $this->input->post('banner_title');
					$data['banner_picture'] = $this->input->post('banner_picture');
					$data['banner_text'] = $this->input->post('banner_text');
					$data['product_id'] = $this->input->post('product_id');
		            $data['banner_text_troix'] = $this->input->post('banner_text_troix');
				    $data['banner_text_deux'] = $this->input->post('banner_text_deux');
					$data['banner_botton_text'] = $this->input->post('banner_botton_text');
					//$data['banner_title_2'] = $this->input->post('banner_title_2');
					$this->template->load('template','views_banners/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_banners/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
		    $data['products'] = $this->M_products->get_all_table();
			$data['banners'] = $this->M_banners->get_this(end($this->uri->segments));
			if($this->input->post('banner_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('banner_title', 'banner_title', 'required');
			   $update_data=array(
					                   "banner_title" =>  str_replace('"', "'", $this->input->post('banner_title')),
										"banner_text" =>  str_replace('"', "'", $this->input->post('banner_text')),
										"product_id" => $this->input->post('product_id'),
										"banner_botton_text" => $this->input->post('banner_botton_text'),
										"banner_text_deux" => $this->input->post('banner_text_deux'),
										"banner_text_troix" => $this->input->post('banner_text_troix'),
										"banner_picture" => $this->input->post('banner_picture'),
										"bannier_position" => $this->input->post('bannier_position'),
										
										"data_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'banners/edit/'.$data['process_status'].'/'.$this->input->post('banner_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_banners->update_this($this->input->post('banner_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'banners/edit/'.$data['process_status'].'/'.$this->input->post('banner_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'banners/edit/'.$data['process_status'].'/'.$this->input->post('banner_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_banners/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('banner_id');
			if(is_numeric($data_id)){
				if($this->M_banners->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/banners/index/'.$data_id);
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
			$banners_id=$this->input->post('banners_id');
			if(is_numeric($data_id)){
				$update_entries=array('banner_data_status'=>$data_id);
				if($this->M_banners->update_status($update_entries,$banners_id)==true){
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
							'upload_path' => './medias/banners/',
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