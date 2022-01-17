<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class News extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "news/index";
				$config['total_rows'] = $this->M_news->count_all();
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
				$data['news_list'] = $this->M_news->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_news/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
	 	if($this->input->post('new_title')) {
			
		try {
			
			$this->form_validation->set_rules('new_title', 'new_title', 'required');
			   $add_data=array(
					                   "new_title" => $this->input->post('new_title'),
									   "new_short_text" => $this->input->post('new_short_text'),
									   "new_date" => $this->input->post('new_date'),
										"new_meta_title" => $this->input->post('new_meta_title'),
									   "new_meta_description" => $this->input->post('new_meta_description'),
									    "new_meta_keywords" => $this->input->post('new_meta_keywords'),
										"new_picture" => $this->input->post('new_picture'),
										"new_text" => $this->input->post('new_text'),
										"data_updated" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
				    $data['new_title'] = $this->input->post('new_title');
				    $data['new_picture'] = $this->input->post('new_picture');
					$data['new_text'] = $this->input->post('new_text');
					$data['new_short_text'] = $this->input->post('new_short_text');
					$data['new_date'] = $this->input->post('new_date');
					$data['new_meta_title'] = $this->input->post('new_meta_title');
					$data['new_meta_description'] = $this->input->post('new_meta_description');
					$data['new_meta_keywords'] = $this->input->post('new_meta_keywords');
										
				$this->template->load('template','views_news/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_news->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$this->template->load('template','views_news/add',$data);
				}
				
				else if($this->M_news->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['new_title'] = $this->input->post('new_title');
				   	$data['new_picture'] = $this->input->post('new_picture');
					$data['new_text'] = $this->input->post('new_text');
					$data['new_short_text'] = $this->input->post('new_short_text');
					$data['new_date'] = $this->input->post('new_date');
					$data['new_meta_title'] = $this->input->post('new_meta_title');
					$data['new_meta_description'] = $this->input->post('new_meta_description');
					$data['new_meta_keywords'] = $this->input->post('new_meta_keywords');
					
					$this->template->load('template','views_news/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_news/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['new'] = $this->M_news->get_this(end($this->uri->segments));
			if($this->input->post('new_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('new_title', 'new_title', 'required');
			   $update_data=array(
								"new_title" => $this->input->post('new_title'),
								"new_short_text" => $this->input->post('new_short_text'),
								"new_date" => $this->input->post('new_date'),
								"new_picture" => $this->input->post('new_picture'),
								"new_text" => $this->input->post('new_text'),
								"new_meta_title" => $this->input->post('new_meta_title'),
								"new_meta_description" => $this->input->post('new_meta_description'),
								"new_meta_keywords" => $this->input->post('new_meta_keywords'),
								"data_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'news/edit/'.$data['process_status'].'/'.$this->input->post('new_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_news->update_this($this->input->post('new_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'news/edit/'.$data['process_status'].'/'.$this->input->post('new_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'news/edit/'.$data['process_status'].'/'.$this->input->post('new_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_news/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('new_id');
			if(is_numeric($data_id)){
				if($this->M_news->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/news/index/'.$data_id);
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
			$new_id=$this->input->post('new_id');
			if(is_numeric($data_id)){
				$update_entries=array('new_data_status'=>$data_id);
				if($this->M_news->update_status($update_entries,$new_id)==true){
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
							'upload_path' => './medias/news/',
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