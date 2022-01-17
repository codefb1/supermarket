<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Partners extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "partners/index";
				$config['total_rows'] = $this->M_partners->count_all();
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
				$data['partners_list'] = $this->M_partners->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_partners/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			$data['partener_type'] ==0;
			$data['code_zip_list'] = $this->M_code_zip->get_all_table();
		    $data['certificats_list'] = $this->M_certificats->get_all_table();
			
	 	if($this->input->post('partener_lastname')) {
			
		try {
			
			$this->form_validation->set_rules('partener_lastname', 'partener_lastname', 'required');
			   $add_data=array(
					                    "partener_lastname" => $this->input->post('partener_lastname'),
										"partener_user" => $this->input->post('partener_user'),
                                        "partener_siret" => $this->input->post('partener_siret'),
										"partener_city" => $this->input->post('partener_city'),
										"partener_email" => $this->input->post('partener_email'),
                                        "partener_phone" => $this->input->post('partener_phone'),
										"partener_adress" => $this->input->post('partener_adress'),
										"partener_zip" => $this->input->post('partener_zip'),
									    "partener_type" => $this->input->post('partener_type'),
										"partener_repensable" => $this->input->post('partener_repensable'),
									    "partener_phone_portable" => $this->input->post('partener_phone_portable'),
										"partener_password" => $this->input->post('partener_password'),
										"certificat_id" => $this->input->post('certificat_id'),
										"partener_created" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				$data['partener_user'] = $this->input->post('partener_user');
				$data['partener_password'] = $this->input->post('partener_password');
				$data['partener_lastname'] = $this->input->post('partener_lastname');
				$data['partener_adress'] = $this->input->post('partener_adress');
                $data['partener_type'] = $this->input->post('partener_type');
				$data['partener_city'] = $this->input->post('partener_city');
				$data['partener_phone'] = $this->input->post('partener_phone');
				$data['partener_zip'] = $this->input->post('partener_zip');
				$data['partener_email'] = $this->input->post('partener_email');
				$data['partener_siret'] = $this->input->post('partener_siret');
				$data['partener_repensable'] = $this->input->post('partener_repensable');
				$data['partener_phone_portable'] = $this->input->post('partener_phone_portable');
				$data['partener_password'] = $this->input->post('partener_password');
				$data['certificat_id'] = $this->input->post('certificat_id');
			
				$this->template->load('template','views_partners/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_partners->add_new_entry($add_data) == true ) {	
				
					$data['process_status'] = 1;
					
					if($this->input->post('partener_type') == 1 ) {	
					$partener_id = $this->db->insert_id();
					$user_add_data=array(
						"account_lastname" => $this->input->post('partener_lastname'),
						"account_user" => $this->input->post('partener_user'),
						"account_firstname" => 'Partenaire',
						"account_password" =>$this->input->post('partener_password'),
						"account_email" => $this->input->post('partener_email'),
						"partener_id" => $partener_id,
						
					);
					$this->M_accounts->add_new_entry($user_add_data);
				
									$departement_codes=$this->input->post('departement_codes');
				foreach($departement_codes as $value){
							
							if($value and $value!=0){
							
						$new_entry_products_parteners=array(
								'departement_code'=>$value,
								'partener_id'=>$partener_id,
							);
							if($this->M_code_zip->add_new_entry_code_zip_parteners($new_entry_products_parteners)==true) {			
							}
							 else{
							 $chek=false ;
							
                            }
							}
							}
							$products_list=$this->M_products->get_all_product_for_partenert();
							
								foreach($products_list as $product){ 
								 // $price_buyings=$this->M_products->get_prix_max_product_parteners($product->product_id);
								  // if($price_buyings) {}
									$add_data=array(
									"price_buying" => $product->price_buying,
									"product_id" => $product->product_id,
									"partener_id" => $partener_id,
									"is_disponible" => $product->is_disponible,
									"product_partener_bio" => $product->product_bio,
									"product_partener_label_rouge" => $product->product_label_rouge,
									"product_partener_origin" => $product->product_origin,
									"product_partener_promo" => $product->product_promo,
									);
			                        $this->M_products->add_new_entry_products_parteners($add_data);
								   
			                    }
							
							}
							
							
					$this->template->load('template','views_partners/add',$data);
				}
				
				else if($this->M_partners->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['partener_user'] = $this->input->post('partener_user');
					$data['partener_lastname'] = $this->input->post('partener_lastname');
					$data['partener_adress'] = $this->input->post('partener_adress');
					$data['partener_type'] = $this->input->post('partener_type');
					$data['partener_city'] = $this->input->post('partener_city');
					$data['partener_phone'] = $this->input->post('partener_phone');
					$data['partener_zip'] = $this->input->post('partener_zip');
					$data['partener_email'] = $this->input->post('partener_email');	
                    $data['partener_siret'] = $this->input->post('partener_siret');
					$data['partener_repensable'] = $this->input->post('partener_repensable');
					$data['partener_phone_portable'] = $this->input->post('partener_phone_portable');
					$data['certificat_id'] = $this->input->post('certificat_id');
			
					
					$this->template->load('template','views_partners/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_partners/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
		
			$data['partener'] = $this->M_partners->get_this(end($this->uri->segments),null);
			
			$data['code_zip_list'] = $this->M_code_zip->get_all_table();
			$data['code_zip_partener_list'] = $this->M_code_zip->get_code_zip_partener(end($this->uri->segments));
		    $data['certificats_list'] = $this->M_certificats->get_all_table();
			
			
			if($this->input->post('partener_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('partener_lastname', 'partener_lastname', 'required');
			   $update_data=array(
			                    "partener_user" => $this->input->post('partener_user'),
								"partener_lastname" => $this->input->post('partener_lastname'),
								"partener_city" => $this->input->post('partener_city'),
								"partener_email" => $this->input->post('partener_email'),
								"partener_phone" => $this->input->post('partener_phone'),
								"partener_adress" => $this->input->post('partener_adress'),
								"partener_zip" => $this->input->post('partener_zip'),
								"partener_type" => $this->input->post('partener_type'),
								"partener_siret" => $this->input->post('partener_siret'),
								"partener_repensable" => $this->input->post('partener_repensable'),
							    "partener_phone_portable" => $this->input->post('partener_phone_portable'),
								"partener_password" => $this->input->post('partener_password'),
								"certificat_id" => $this->input->post('certificat_id'),
								"partener_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'partners/edit/'.$data['process_status'].'/'.$this->input->post('partener_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_partners->update_this($this->input->post('partener_id'), $update_data);
					
					
					if($update_process  == true ) {
						if($this->input->post('partener_type') == 1 ) {	
						$data_status=0;
						$partener = $this->M_partners->get_this($this->input->post('partener_id'),null);
						
					   if ($partener->partener_status) {
					     	$data_status=1;
						}
						
						$existePartenaire=$this->M_accounts->get_this_partener($this->input->post('partener_id'));
						$user_add_data=array(
						"account_lastname" => $this->input->post('partener_lastname'),
						"account_firstname" => 'Partenaire',
						"account_user" => $this->input->post('partener_user'),
						"account_password" =>$this->input->post('partener_password'),
						"account_email" => $this->input->post('partener_email'),
						"partener_id" => $this->input->post('partener_id'),
						"data_status" => $data_status,
						
					);
					if($existePartenaire){
						$this->M_accounts->update_this($existePartenaire->account_id, $user_add_data);
					} else {
					   $this->M_accounts->add_new_entry($user_add_data);
					   $products_list=$this->M_products->get_all_product_for_partenert();
							
								foreach($products_list as $product){ 
								  $price_buyings=$this->M_products->get_prix_max_product_parteners($product->product_id);
								   if($price_buyings) {
									$add_data=array(
									"price_buying" => $price_buyings->price_buying,
									"product_id" => $product->product_id,
									"partener_id" => $partener_id,
									"is_disponible" => $product->product_stock,
									"product_partener_bio" => $product->product_bio,
									"product_partener_label_rouge" => $product->product_label_rouge,
									"product_partener_origin" => $product->product_origin,
									"product_partener_promo" => $product->product_promo,
									);
			                        $this->M_products->add_new_entry_products_parteners($add_data);
								   }
			                    }
					
					}
						$partener_id = $this->input->post('partener_id');
						
							$this->M_code_zip->deletethis_code_zip_parteners($partener_id) ;

					$departement_codes=$this->input->post('departement_codes');
				foreach($departement_codes as $value){
							
							if($value and $value!=0){
							
						$new_entry_products_parteners=array(
								'departement_code'=>$value,
								'partener_id'=>$partener_id,
							);
							if($this->M_code_zip->add_new_entry_code_zip_parteners($new_entry_products_parteners)==true) {			
							}
							 else{
							 $chek=false ;
							
                            }
							}
							}
						}
						 $data['process_status'] = 1;
						 redirect(base_url().'partners/edit/'.$data['process_status'].'/'.$this->input->post('partener_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'partners/edit/'.$data['process_status'].'/'.$this->input->post('partener_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_partners/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('partener_id');
			if(is_numeric($data_id)){
				if($this->M_partners->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/parteners/index/'.$data_id);
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
			$partener_id=$this->input->post('partener_id');
			if(is_numeric($data_id)){
				$update_entries=array('partener_status'=>$data_id);
				if($this->M_partners->update_status($update_entries,$partener_id)==true){
					$partener = $this->M_partners->get_this($partener_id,null);
					if($partener->partener_type == 1 ) {	
						$existePartenaire=$this->M_accounts->get_this_partener($partener_id);
						if($existePartenaire) {	
						$update_entries_partenaire=array('data_status'=>$data_id);
						$this->M_accounts->update_status($update_entries_partenaire,$existePartenaire->account_id);
						}
					}
					
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
							'upload_path' => './medias/parteners/',
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