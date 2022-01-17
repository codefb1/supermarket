<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
	error_reporting(E_ALL);
	class Settings extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		
		
				public function index(){
		
		
		try {
			
				
				$data['setting'] = $this->M_settings->get_this();
				if($this->input->post('setting_id') > 0) {
				$update_data=array(
				"email" => $this->input->post('email'),
			     //"banner_picture" => $this->input->post('banner_picture'),
				
					"phone" => $this->input->post('phone'),
					"address" => $this->input->post('address'),
					"page_title" => $this->input->post('page_title'),
					"page_meta_description" => $this->input->post('page_meta_description'),
					"page_meta_keywords" => $this->input->post('page_meta_keywords'),
					"home_block_titre_1" => $this->input->post('home_block_titre_1'),
					"home_block_titre_5" => $this->input->post('home_block_titre_5'),
					"home_block_desc_6" => $this->input->post('home_block_desc_6'),
					"home_block_titre_6" => $this->input->post('home_block_titre_6'),
					"home_nbr_dossiers" => $this->input->post('home_nbr_dossiers'),
					"home_block_color_6" => $this->input->post('home_block_color_6'),
					"home_block_desc_en_6" => $this->input->post('home_block_desc_en_6'),
					"home_block_titre_en_6" => $this->input->post('home_block_titre_en_6'),

					"home_block_desc_en_3" => $this->input->post('home_block_desc_en_3'),
					"home_block_desc_3" => $this->input->post('home_block_desc_3'),
					"home_top_desc" => $this->input->post('home_top_desc'),
					"home_top_desc_1" => $this->input->post('home_top_desc_1'),
					"address_1" => $this->input->post('address_1'),
					"address_2" => $this->input->post('address_2'),
					"cookie" => $this->input->post('cookie'),
					"footer_text" => $this->input->post('footer_text'),
					"boucherie_bannier" => $this->input->post('boucherie_bannier'),
					"association_bannier" => $this->input->post('association_bannier'),
					
					"newsleter_text" => $this->input->post('newsleter_text'),
				 //"page_meta_keywords_en" => $this->input->post('page_meta_keywords_en'),
				 //"site_logo" => $this->input->post('site_logo'),
			  //  "phone_client" => $this->input->post('phone_client'),
			    //"phone_consumers" => $this->input->post('phone_consumers'),
				//"fax" => $this->input->post('fax')
				
				);
		
		
				
							
								$update_process = $this->M_settings->update_this(1, $update_data);
								
								if($update_process  == true ) {
									
									 $data['process_status'] = 1;
									 redirect(base_url().'settings/index/'.$data['process_status'].'/'.$this->input->post('setting_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'settings/index/'.$data['process_status'].'/'.$this->input->post('setting_id'), 'refresh');
								}
							
					}
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_settings/index',$data);
	}
		/*** Add interface function ***/

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
	
		public function home(){
		
		
		try {
			
				
				$data['setting'] = $this->M_settings->get_this();
				if($this->input->post('setting_id') > 0) {
				$update_data=array(
				"home_block_titre_1" => $this->input->post('home_block_titre_1'),
				"home_block_desc_1" => $this->input->post('home_block_desc_1'),
				"home_block_titre_5" => $this->input->post('home_block_titre_5'),
				
			    "home_picture" => $this->input->post('home_picture'),
				);
		
		
				
							
								$update_process = $this->M_settings->update_this(1, $update_data);
								
								if($update_process  == true ) {
									
									 $data['process_status'] = 1;
									 redirect(base_url().'settings/home/'.$data['process_status'].'/'.$this->input->post('setting_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'settings/home/'.$data['process_status'].'/'.$this->input->post('setting_id'), 'refresh');
								}
							
					}
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_settings/home',$data);
	}
	
	 public function uploadFilelogo()
    { 

        try {
			$config = array(
							'upload_path' => './medias/logo/',
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
		public function uploadFilehome()
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