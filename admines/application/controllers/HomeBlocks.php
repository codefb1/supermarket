<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class HomeBlocks extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "homeBlocks/index";
				$config['total_rows'] = $this->M_homeBlocks->count_all();
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
				$data['homeBlocks_list'] = $this->M_homeBlocks->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_home_blocks/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
				$data['products'] = $this->M_products->get_all_table();
		
	 	if($this->input->post('home_block_title')) {
			
		try {
			
			$this->form_validation->set_rules('home_block_title', 'home_block_title', 'required');
			   $add_data=array(
					                   "home_block_title" =>  str_replace('"', "'", $this->input->post('home_block_title')),
										"home_block_text" =>  str_replace('"', "'", $this->input->post('home_block_text')),
										"home_block_botton_text" => $this->input->post('home_block_botton_text'),
										"home_block_picture" => $this->input->post('home_block_picture'),
										"product_id" => $this->input->post('product_id'),
										"data_updated" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
					$data['home_block_title'] = $this->input->post('home_block_title');
					$data['home_block_picture'] = $this->input->post('home_block_picture');
					$data['home_block_text'] = $this->input->post('home_block_text');
					$data['product_id'] = $this->input->post('product_id');	
					$data['home_block_botton_text'] = $this->input->post('home_block_botton_text');						
				$this->template->load('template','views_home_blocks/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_homeBlocks->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$this->template->load('template','views_home_blocks/add',$data);
				}
				
				else if($this->M_homeBlocks->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['home_block_title'] = $this->input->post('home_block_title');
				   	$data['home_block_picture'] = $this->input->post('home_block_picture');
						$data['home_block_text'] = $this->input->post('home_block_text');
						$data['product_id'] = $this->input->post('product_id');
						
										$data['home_block_botton_text'] = $this->input->post('home_block_botton_text');
						//$data['banner_title_2'] = $this->input->post('banner_title_2');
					$this->template->load('template','views_home_blocks/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_home_blocks/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
		    $data['products'] = $this->M_products->get_all_table();
			$data['homeBlock'] = $this->M_homeBlocks->get_this(end($this->uri->segments));
			if($this->input->post('home_block_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('home_block_title', 'home_block_title', 'required');
			   $update_data=array(
					                   "home_block_title" =>  str_replace('"', "'", $this->input->post('home_block_title')),
										"home_block_text" =>  str_replace('"', "'", $this->input->post('home_block_text')),
										"product_id" => $this->input->post('product_id'),
										"home_block_botton_text" => $this->input->post('home_block_botton_text'),
										"home_block_picture" => $this->input->post('home_block_picture'),
										
								
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'homeBlocks/edit/'.$data['process_status'].'/'.$this->input->post('home_block_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_homeBlocks->update_this($this->input->post('home_block_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'homeBlocks/edit/'.$data['process_status'].'/'.$this->input->post('home_block_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'homeBlocks/edit/'.$data['process_status'].'/'.$this->input->post('home_block_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_home_blocks/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('home_block_id');
			if(is_numeric($data_id)){
				if($this->M_homeBlocks->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/homeBlocks/index/'.$data_id);
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
				if($this->M_homeBlocks->update_status($update_entries,$banners_id)==true){
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
							'upload_path' => './medias/homeBlocks/',
							'allowed_types' => '*',
							'max_size' => '10000000',
							'max_width' => '10000000',
							'max_height' => '10000000'
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