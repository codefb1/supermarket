<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Productspictures extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function listpictures(){
				
        $data['product_id']=$this->uri->segment(3);
		 $data['product_pictures_list']= $this->M_products_pictures->get_all_product_picture($data['product_id']);
		$this->template->load('template','views_products_pictures/index',$data);
	}
		/*** Add Banner interface function ***/
		
		

	public function add()
		{
		$data['process_status'] = 0;
		$data['product_id']= end($this->uri->segments);
			
	 	if($this->input->post('product_pictures')) {
			
		try {
			
			$this->form_validation->set_rules('product_pictures', 'product_pictures', 'required');
			   $add_data=array(
					                   "product_pictures" => $this->input->post('product_pictures'),
									   "product_id" => $this->input->post('product_id'),
									   "picture_view" => $this->input->post('picture_view'),
									   "product_pictures_alt" => $this->input->post('product_pictures_alt'),
									   "product_picture_emplacement" => $this->input->post('product_picture_emplacement'),
									   
									   
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
							
			 redirect(base_url().'productspictures/add/'.$data['process_status'].'/'.$this->input->post('product_id'), 'refresh');
					
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_products_pictures->add_new_entry($add_data) == true ) {	
						 $data['process_status'] = 1;
						 redirect(base_url().'productspictures/add/'.$data['process_status'].'/'.$this->input->post('product_id'), 'refresh');
					
				}
				
				else if($this->M_products_pictures->add_new_entry($add_data) == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'productspictures/add/'.$data['process_status'].'/'.$this->input->post('product_id'), 'refresh');
					
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_products_pictures/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['products_picture'] = $this->M_products_pictures->get_this(end($this->uri->segments));
			if($this->input->post('product_picture_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('product_pictures', 'product_pictures', 'required');
			   $update_data=array(
					                   "product_pictures" => $this->input->post('product_pictures'),
									   "product_pictures_alt" => $this->input->post('product_pictures_alt'),
									   "picture_view" => $this->input->post('picture_view'),
									    "product_picture_emplacement" => $this->input->post('product_picture_emplacement'),
									   
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'productspictures/edit/'.$data['process_status'].'/'.$this->input->post('product_picture_id'), 'refresh');
			
	}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_products_pictures->update_this($this->input->post('product_picture_id'), $update_data);
					
					if($update_process  == true ) {
						 $products_picture = $this->M_products_pictures->get_this($this->input->post('product_picture_id'));
						 		$image =$this->M_products_pictures->get_one_product_picture_cover($products_picture->product_id);
								$update_data_cover=array(
								'product_picture'=>$image->product_pictures,
							);
				$this->M_products->update_this($products_picture->product_id, $update_data_cover);
						 $data['process_status'] = 1;
						 redirect(base_url().'productspictures/edit/'.$data['process_status'].'/'.$this->input->post('product_picture_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'productspictures/edit/'.$data['process_status'].'/'.$this->input->post('product_picture_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_products_pictures/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
		
			$us=0;
		
		$product_picture_id=$this->uri->segment(3);
		$product_id=$this->uri->segment(4);
			if(is_numeric($product_picture_id)){
				$us=1;
				if($this->M_products_pictures->deletethis($product_picture_id)==true){
				 redirect('/productspictures/listpictures/'.$product_id.'/'.$us);
				}
			}
			else {
				
			redirect('/productspictures/listpictures/'.$product_id.'/'.$us);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	
		/*** Update status Banner  Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
		$data_id=end($this->uri->segments);
		$product_picture_id=$this->uri->segment(3);
		$product_id=$this->uri->segment(4);
			if(is_numeric($data_id)){
				
				$update_entries=array('picture_data_status'=>$data_id);
				if($this->M_products_pictures->update_status($update_entries,$product_picture_id)==true){
					$us=1;
					$image =$this->M_products_pictures->get_one_product_picture_cover($product_id);
								$update_data=array(
								'product_picture'=>$image->product_pictures,
							);
				$this->M_products->update_this($product_id, $update_data);
					redirect('/productspictures/listpictures/'.$product_id.'/'.$us);
				}
			}
			else {  
				 redirect('/productspictures/listpictures/'.$product_id.'/'.$us);

			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
		
		 public function updatefocus() {
	 
  		$us=0;
		$data_id=end($this->uri->segments);
		$product_picture_id=$this->uri->segment(3);
		$product_id=$this->uri->segment(4);
		if(is_numeric($data_id)){
			$update_entries_0=array('picture_data_focus'=>0);
			$update_entries_1=array('picture_data_focus'=>1);
			if($data_id==0){
				$uf2 = $this->M_products_pictures->update_this($product_picture_id,$update_entries_0);
			}
			else{
				$uf1 =  $this->M_products_pictures->updatefocus($product_id,$update_entries_0,1);
				
				$uf2 = $this->M_products_pictures->update_this($product_picture_id,$update_entries_1);
			}
				if($uf2==true){
				$us=1;
				$image =$this->M_products_pictures->get_one_product_picture_cover($product_id);
								$update_data=array(
								'product_picture'=>$image->product_pictures,
							);
							$this->M_products->update_this($product_id, $update_data);
				redirect('/productspictures/listpictures/'.$product_id.'/'.$us);
			}
			$image =$this->M_products_pictures->get_one_product_picture_cover($product_id);
								$update_data=array(
								'product_picture'=>$image->product_pictures,
							);
							$this->M_products->update_this($product_id, $update_data);
		}
		else {
			$us=0;
			redirect('/productspictures/listpictures/'.$product_id.'/'.$us);
		}
		
	}
			/*** upload  picture Banner  Execute function ***/
    public function uploadFile()
    { 

        try {
			$config = array(
							'upload_path' => './medias/products/',
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