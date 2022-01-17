<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Products extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {  
		      $modeShowProduct=1;
			   if($this->input->get('modeShowProduct')){
				   
				    $modeShowProduct=$this->input->get('modeShowProduct');
			   }
		          if($this->input->get('filtercheck')){
					 $session_search_array = array(
					     'modeShowProduct' => $this->input->get('modeShowProduct'),
						 'keyword' => $this->input->get('keyword'),
						 'partener_id' => $this->input->get('partener_id'),
						 'categorie_id' => $this->input->get('categorie_id'),
						 'sub_categorie_id' => $this->input->get('sub_categorie_id'),
						  'product_stock' => $this->input->get('product_stock'),
						  'product_is_promo' => $this->input->get('product_is_promo'),
						  
						 
					 );
					$this->session->set_userdata($session_search_array);
				}
				($this->session->userdata('keyword') != "N" and $this->session->userdata('keyword') != '') ? $keyword = $this->session->userdata('keyword') : $keyword = "N"; 
				($this->session->userdata('categorie_id') != "N" and $this->session->userdata('categorie_id') != '') ? $categorieId = $this->session->userdata('categorie_id') : $categorieId = "N";
				($this->session->userdata('sub_categorie_id') != "N" and $this->session->userdata('sub_categorie_id') != '') ? $subCategorieId = $this->session->userdata('sub_categorie_id') : $subCategorieId = "N";
				($this->session->userdata('partener_id') != "N" and $this->session->userdata('partener_id') != '') ? $partenerId = $this->session->userdata('partener_id') : $partenerId = "N";
				($this->session->userdata('modeShowProduct') != "N" and $this->session->userdata('modeShowProduct') != '') ? $modeShowProduct = $this->session->userdata('modeShowProduct') : $modeShowProduct = 1;
				($this->session->userdata('product_stock') != "N" and $this->session->userdata('product_stock') != '') ? $productStock = $this->session->userdata('product_stock') : $productStock = "N";
				($this->session->userdata('product_is_promo') != "N" and $this->session->userdata('product_is_promo') != '') ? $productIsPromo = $this->session->userdata('product_is_promo') : $productIsPromo = "N";
				
				$config = array();
				$config['base_url'] = base_url() . "products/index";
				$config['total_rows'] = $this->M_products->count_all($keyword,$categorieId,$subCategorieId,$partenerId,$productStock,$productIsPromo);
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
                $data['categories_list'] = $this->M_categories->get_categories(false);
				$data['parteners_list'] = $this->M_partners->get_all_table(1);
	
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				if($this->input->get('exports') == 1){
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId,$productStock,$productIsPromo);
				  $this->load->view('views_products/exports/excel',$data);
			}elseif($this->input->get('exports') == 2){
				//load mPDF library
				$this->load->library('m_pdf');
				//load mPDF library
				//now pass the data//
			$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId,$productStock,$productIsPromo);
				//now pass the data //
				$html=$this->load->view('views_products/exports/pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
				//this the the PDF filename that user will get to download
				$pdfFilePath ="AT-export-clients-".date('d-m-Y H:i:s').".pdf";
				//actually, you can pass mPDF parameter on this load() function
				$pdf = $this->m_pdf->load();
				//generate the PDF!
				$pdf->WriteHTML($html,2);
				//offer it to user via browser download! (The PDF won't be saved on your server HDD)
				$pdf->Output($pdfFilePath, "D");
			
			
			}else{
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId,$productStock,$productIsPromo);
				 $data['pagination'] = $this->pagination->create_links();
				 
				 $data['keyword'] =$keyword;
				 $data['categorieId'] =$categorieId;
				 $data['subCategorieId'] =$subCategorieId;
				 $data['partenerId'] =$partenerId;
				 $data['modeShowProduct'] =$modeShowProduct;
	             $data['productStock'] =$productStock;
				 $data['productIsPromo'] =$productIsPromo;
	
			     if($categorieId == "N"){
					 $data['categorieId'] ='';
					 }
					 if($partenerId == "N"){
					 $data['partenerId'] ='';
					 }
					 	 if($productStock == "N"){
					 $data['productStock'] ='';
					 }
					 if($productIsPromo == "N"){
					 $data['productIsPromo'] ='';
					 }
					 	
				   if($subCategorieId == "N"){
					  $data['subCategorieId'] ='';
					 }
                    if($keyword == "N"){
					  $data['keyword'] ='';
					 }
                 $this->template->load('template','views_products/index',$data);
			}// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['attributs_values_list'] = $this->M_attributs_values->get_all_table();
	        $data['attributs_list'] = $this->M_attributs->get_all_table();
			$data['news_list'] = $this->M_news->get_all_table();
	 	if($this->input->post('product_name')) {
			
		try {
			$product_price = 0;
			
			$product_price_marge_percente = 0;
			$product_price_selling = 0;
			if($this->input->post('product_price_marge_percente')){
				$product_price_marge_percente=$this->input->post('product_price_marge_percente');
			}
			if($this->input->post('product_price')){
				$product_price = $this->input->post('product_price');
			}    
			
			 $product_price_selling = $product_price+$product_price*($product_price_marge_percente/100);

				if($this->input->post('product_entier_association')){
			    	 $product_price_selling = $this->input->post('product_total_price')+$this->input->post('product_total_price')*($product_price_marge_percente/100);

				}
           
			 $partenerInfo= $this->M_partners->get_this(9);

			$this->form_validation->set_rules('product_name', 'product_name', 'required');
			   $add_data=array(
								"product_name" => $this->input->post('product_name'),
								"product_total_price" => $this->input->post('product_total_price'),
								"product_short_description" => $this->input->post('product_short_description'),
								"product_short_text" => $this->input->post('product_short_text'),
								
							   "product_price" => $product_price,
								"product_entier" => $this->input->post('product_entier'),
								"product_price_dicount" => $this->input->post('product_price_dicount'),
								"product_meta_title" => $this->input->post('product_meta_title'),
								"product_meta_description" => $this->input->post('product_meta_description'),
								"product_meta_keywords" => $this->input->post('product_meta_keywords'),
								"product_text" => $this->input->post('product_text'),
								"product_picture" => $this->input->post('product_picture'),
								//	"product_ref" => $this->input->post('product_ref'),
								"sub_categorie_id" => $this->input->post('sub_categorie_id'),
								"categorie_id" => $this->input->post('categorie_id'),
								"product_poids" => $this->input->post('product_poids'),
								"new_id" => $this->input->post('new_id'),
								"product_stock" => $this->input->post('product_stock'),
								"product_best_seller" => $this->input->post('product_best_seller'),
								"product_is_promo" => $this->input->post('product_is_promo'),
								"product_label_rouge" => $this->input->post('product_label_rouge'),
								"product_promo" => $this->input->post('product_promo'),
								"product_origin" => $this->input->post('product_origin'),
								"product_bio" => $this->input->post('product_bio'),
								"product_entier_association" => $this->input->post('product_entier_association'),	
								"product_price_marge_percente" => $product_price_marge_percente,
								"product_price_selling" => $product_price_selling,
								"product_info" => $this->input->post('product_info'),
								"product_is_composer" => 1,
								"product_affected_partener" => 9,
								"certificat_id" => $partenerInfo->certificat_id,
								"product_data_created" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				    $data['process_status'] = 99;
					$data['product_short_text'] = $this->input->post('product_short_text');
					$data['product_info'] = $this->input->post('product_info');
					$data['product_is_promo'] = $this->input->post('product_is_promo');
					$data['product_short_description'] = $this->input->post('product_short_description');
					
					$data['product_name'] = $this->input->post('product_name');
					$data['product_poid'] = $this->input->post('product_poid');
					$data['product_total_price'] = $this->input->post('product_total_price');
					$data['product_price'] = $this->input->post('product_price');
					$data['product_price_dicount'] = $this->input->post('product_price_dicount');
					$data['product_text'] = $this->input->post('product_text');
					//$data['product_ref'] = $this->input->post('product_ref');
					$data['product_picture'] = $this->input->post('product_picture');
					$data['product_meta_title'] = $this->input->post('product_meta_title');
					$data['product_meta_description'] = $this->input->post('product_meta_description');
					$data['product_meta_keywords'] = $this->input->post('product_meta_keywords');
					$data['categorie_id'] = $this->input->post('categorie_id');
					$data['new_id'] = $this->input->post('new_id');
					$data['sub_categorie_id'] = $this->input->post('sub_categorie_id');
					$data['product_stock'] = $this->input->post('product_stock');
					$data['product_price_marge_percente'] = $this->input->post('product_price_marge_percente');
					$data['product_entier'] = $this->input->post('product_entier');
				    $data['product_best_seller'] = $this->input->post('product_best_seller');
					$data['product_entier_association'] = $this->input->post('product_entier_association');
										
				$this->template->load('template','views_products/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_products->add_new_entry($add_data) == true ) {
                        $product_id = $this->db->insert_id();
					/*$update_data=array(
								'product_ref'=>$product_id,
							);
				$this->M_products->update_this($product_id, $update_data);*/
				$add_data=array(
							 "price_buying" => $this->input->post('product_price'),
							 "product_id" => $product_id,
							 "partener_id" => 9
							 );
			 $this->M_products->add_new_entry_products_parteners($add_data);
				if($this->input->post('categorie_id')){
								$categorie_count=$this->M_products->count_product_by_categorie($this->input->post('categorie_id'),null);
								
								$update_data=array(
											
											"count_products" => $categorie_count,
											
													);
													$this->M_categories->update_this($this->input->post('categorie_id'), $update_data);
							}
				if($this->input->post('sub_categorie_id')){
							$sub_categorie_count =$this->M_products->count_product_by_categorie(null,$this->input->post('sub_categorie_id'));
							
					
					$update_data=array(
								
								"count_products" => $sub_categorie_count,
								
										);
										$this->M_categories->update_this($this->input->post('sub_categorie_id'), $update_data);
				}
				
					$data['process_status'] = 1;
					
					//$attribut_value_ids=$this->input->post('attribut_value_ids');
				/*foreach($attribut_value_ids as $attribut_value_id){
							$data['attribut_value'] = $this->M_attributs_values->get_this($attribut_value_id);
							if($attribut_value_id and $attribut_value_id!=0){
							
						$new_entry_products_attributs=array(
								'product_id'=>$product_id,
								'attribut_id'=>$data['attribut_value']->attribut_id,
								'attribut_value_id'=>$attribut_value_id,
							);
							if($this->M_products->add_new_entry_products_attributs($new_entry_products_attributs)==true) {			
							}
							 else{
							 $chek=false ;
							
                            }
							}
							}*/							
					$this->template->load('template','views_products/add',$data);
				}
				
				else if($this->M_products->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['product_name'] = $this->input->post('product_name');
					$data['product_short_text'] = $this->input->post('product_short_text');
					$data['product_short_description'] = $this->input->post('product_short_description');
					$data['product_total_price'] = $this->input->post('product_total_price');
					$data['product_price'] = $this->input->post('product_price');
					$data['product_price_dicount'] = $this->input->post('product_price_dicount');
					$data['product_text'] = $this->input->post('product_text');
					$data['product_is_promo'] = $this->input->post('product_is_promo');
					$data['product_meta_title'] = $this->input->post('product_meta_title');
					$data['product_meta_description'] = $this->input->post('product_meta_description');
					$data['product_meta_keywords'] = $this->input->post('product_meta_keywords');
					$data['categorie_id'] = $this->input->post('categorie_id');
					$data['sub_categorie_id'] = $this->input->post('sub_categorie_id');
                    $data['product_poid'] = $this->input->post('product_poid');
					$data['new_id'] = $this->input->post('new_id');
					$data['product_stock'] = $this->input->post('product_stock');
					$data['product_price_marge_percente'] = $this->input->post('product_price_marge_percente');
					$data['product_entier'] = $this->input->post('product_entier');
					$data['product_best_seller'] = $this->input->post('product_best_seller');
					$data['product_entier_association'] = $this->input->post('product_entier_association');
					$data['product_info'] = $this->input->post('product_info');
					
					$this->template->load('template','views_products/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_products/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['product'] = $this->M_products->get_this(end($this->uri->segments));
			$data['news_list'] = $this->M_news->get_all_table();
			$data['prices_buying'] =$this->M_products->get_prix_product_parteners(end($this->uri->segments));
            $data['products_prices']=$this->M_products->get_product_parteners_certifacts(end($this->uri->segments));
			$data['sub_categories_list'] ='';
			if($data['product']->categorie_id){
					$data['sub_categories_list'] = $this->M_categories->get_sub_categories($data['product']->categorie_id);
			}
		
			
			$data['product_attribut_list'] =$this->M_products->get_product_attribut(end($this->uri->segments));;
			
		
			$data['attributs_values_list'] = $this->M_attributs_values->get_all_table();
	        $data['attributs_list'] = $this->M_attributs->get_all_table();
			if($this->input->post('product_id') > 0) {
				try {	
			$product_price = 0;
			
			$product_price_marge_percente = 0;
			
			if($this->input->post('product_price_marge_percente')){
				$product_price_marge_percente=$this->input->post('product_price_marge_percente');
			}
			if($this->input->post('product_price')){
				$product_price = $this->input->post('product_price');
			}
			$product_price_selling = $product_price+$product_price*($product_price_marge_percente/100);
			if($this->input->post('product_entier_association')){
			    	$product_price_selling = $this->input->post('product_total_price')+$this->input->post('product_total_price')*($product_price_marge_percente/100);

				}
			
			$this->form_validation->set_rules('product_name', 'product_name', 'required');
			   $update_data=array( 
					                    "product_name" => $this->input->post('product_name'),
										"product_short_description" => $this->input->post('product_short_description'),
									   "product_total_price" => $this->input->post('product_total_price'),
									//   "product_price" => $this->input->post('product_price'),
									   "product_price_dicount" => $this->input->post('product_price_dicount'),
									   "product_meta_title" => $this->input->post('product_meta_title'),
									   "product_meta_description" => $this->input->post('product_meta_description'),
									   "product_meta_keywords" => $this->input->post('product_meta_keywords'),
										"product_text" => $this->input->post('product_text'),
										"product_picture" => $this->input->post('product_picture'),
										"sub_categorie_id" => $this->input->post('sub_categorie_id'),
										"categorie_id" => $this->input->post('categorie_id'),
										"product_ref" => $this->input->post('product_ref'),
										"product_poids" => $this->input->post('product_poids'),
										"new_id" => $this->input->post('new_id'),
										"product_stock" => $this->input->post('product_stock'),
										"product_price_marge_percente" => $product_price_marge_percente,
									//	"product_price_selling" => $product_price_selling,
									     "product_entier" => $this->input->post('product_entier'),
									     "product_is_promo" => $this->input->post('product_is_promo'),
										 "product_entier_association" => $this->input->post('product_entier_association'),
										 
										"product_data_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'products/edit/'.$data['process_status'].'/'.$this->input->post('product_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_products->update_this($this->input->post('product_id'), $update_data);
					$this->M_products->deletethis_products_attributs($this->input->post('product_id')) ;

					$attribut_value_ids=$this->input->post('attribut_value_ids');
				
					foreach($attribut_value_ids as $attribut_value_id){
							$data['attribut_value'] = $this->M_attributs_values->get_this($attribut_value_id);
							if($attribut_value_id and $attribut_value_id!=0){
							
						$new_entry_products_attributs=array(
								'product_id'=>$this->input->post('product_id'),
								'attribut_id'=>$data['attribut_value']->attribut_id,
								'attribut_value_id'=>$attribut_value_id,
							);
							if($this->M_products->add_new_entry_products_attributs($new_entry_products_attributs)==true) {			
							}
							 else{
							 $chek=false ;
							
                            }
							}
							}	
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'products/edit/'.$data['process_status'].'/'.$this->input->post('product_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'products/edit/'.$data['process_status'].'/'.$this->input->post('product_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_products/edit',$data);
			}

		} 
		
		
	public function duplique()
		{   	
									
			$data['product'] = $this->M_products->get_this(end($this->uri->segments));
			$partenerInfo= $this->M_partners->get_this($data['product']->product_info);
			  $new_data=array( 
							"product_name" =>$data['product']->product_name.' duplique' ,
							"product_total_price" =>$data['product']->product_total_price ,
							"product_price_dicount" => $data['product']->product_price_dicount ,
							"product_short_description" =>$data['product']->product_short_description ,
							"product_meta_title" =>$data['product']->product_meta_title, 
							"product_meta_description" =>$data['product']->product_meta_description,
							"product_meta_keywords" => $data['product']->product_meta_keywords,
							"product_text" => $data['product']->product_text,
							"product_picture" => $data['product']->product_picture,
							"sub_categorie_id" => $data['product']->sub_categorie_id,
							"categorie_id" => $data['product']->categorie_id,
							"product_ref" => '',
							"product_poids" => $data['product']->product_poids,
							"new_id" => $data['product']->new_id,
							"product_short_text" => $data['product']->product_short_text,
							"product_stock" =>$data['product']->product_stock,
							"product_price_marge_percente" => $data['product']->product_price_marge_percente,
							"product_price_marge_percente_dicount" => $data['product']->product_price_marge_percente_dicount,
							"product_entier" => $data['product']->product_entier,
							"product_price_dicount" => $data['product']->product_price_dicount,
							
							"product_is_promo" => $data['product']->product_is_promo,
							"product_entier_association" => $data['product']->product_entier_association,
							"product_price_selling" => $data['product']->product_price_selling,
							"product_label_rouge" => $data['product']->product_label_rouge,
							"product_promo" => $data['product']->product_promo,
							"product_origin" => $data['product']->product_origin,
							"product_bio" => $data['product']->product_bio,
							"product_affected_partener" => $data['product']->product_affected_partener,
							"certificat_id" => $data['product']->certificat_id,
							"product_info" => $data['product']->product_info,
							"product_is_composer" => 1,
							"product_data_status" => 0,
							"certificat_id" => $partenerInfo->certificat_id,	
                            "product_data_created" => date("Y-m-d H:i:s")
										);
							$this->M_products->add_new_entry($new_data);
							$product_id = $this->db->insert_id();
									$update_data=array(
									'product_ref'=>$product_id,
									);
							$this->M_products->update_this($product_id, $update_data);
							$add_data=array(
							 "price_buying" => $data['product_price']->product_origin ,
							 "product_id" => $product_id,
							 "partener_id" => 9
							 );
			                $this->M_products->add_new_entry_products_parteners($add_data);
							//$product_attribut_list =$this->M_products->get_product_attribut(end($this->uri->segments));;
						
							/*foreach($product_attribut_list as $product_attribut){
							
							$new_entry_products_attributs=array(
							'product_id'=>$product_id,
							'attribut_id'=>$product_attribut->attribut_id,
							'attribut_value_id'=>$product_attribut->attribut_value_id,
							);
							$this->M_products->add_new_entry_products_attributs($new_entry_products_attributs);		
							}*/
							$product_pictures_list= $this->M_products_pictures->get_all_product_picture(end($this->uri->segments));
                              
									 	foreach($product_pictures_list as $product_pictures){
											
											  $add_data_pictures=array(
												   "product_pictures" => $product_pictures->product_pictures,
												   "product_id" =>$product_id,
												   "picture_view" => $product_pictures->picture_view,
												   "product_pictures_alt" => $product_pictures->product_pictures_alt,
												   "product_picture_emplacement" => $product_pictures->product_picture_emplacement,
													);
										$this->M_products_pictures->add_new_entry($add_data_pictures);
											}
											
											redirect('products/');	
				
		} 
	public function updateProduct() {  
		try {
			$product_price_selling=0;
			$datas = $this->input->post('datas',[]);
		    $type = $this->input->post('type');
			$product_id = $this->input->post('product_id');
			$attribut_value_ids = $this->input->post('attribut_value_ids');
			
			  if( $type =='general'){
					$update_data=array(
						'categorie_id'=>$datas['categorie_id'],
						'sub_categorie_id'=>$datas['sub_categorie_id'],
						"product_is_composer" => 1,
						
				);
				$this->M_products->update_this($product_id, $update_data);
				if($datas['categorie_id']){
					$categorie_count=$this->M_products->count_product_by_categorie($datas['categorie_id'],null);
					
					$update_data_count=array(
								
								"count_products" => $categorie_count,
								
										);
										$this->M_categories->update_this($datas['categorie_id'], $update_data_count);
				}
				if($datas['sub_categorie_id']){
							$sub_categorie_count =$this->M_products->count_product_by_categorie(null,$datas['sub_categorie_id']);
							
					
					$update_data_count=array(
								
								"count_products" => $sub_categorie_count,
								
										);
										$this->M_categories->update_this($datas['sub_categorie_id'], $update_data_count);
				}
				
		
				
				}
				if( $type =='ppm'){
					$productInfo = $this->M_products->get_this($product_id);
					$old_price_buying =   $old_price_buyings->product_price;
			        $update_data_pmm=array(
						'product_price_dicount'=>$datas['product_price_dicount'],
						'product_price'=>$datas['product_price'],
						'product_total_price'=>$datas['product_total_price'],
						'product_poids'=>$datas['product_poids'],
						"product_info" => $datas['product_info'],
						'product_price_marge_percente'=>$datas['product_price_marge_percente'],
						'product_price_marge_percente_dicount'=>$datas['product_price_marge_percente_dicount'],
						'product_is_promo'=>$datas['product_is_promo'],
						"product_is_composer" => 1,
						
					   	
				);
				
					
				$this->M_products->update_this($product_id, $update_data_pmm);
				if($old_price_buying!=$datas['product_price']){

							if($productInfo->product_affected_partener){
								$product_parneters=$this->M_products->get_this_product_parneters_by_product($productInfo->product_id,$productInfo->product_affected_partener);
								
							$update_price_partener=array(
							'price_buying'=>$datas['product_price'],   	
							);
							$this->M_products->update_this_products_parteners($product_parneters->product_partener_id, $update_price_partener);
									$add_data=array(
									"product_id" => $productInfo->product_id,
									"old_price_buying" => $old_price_buying,
									"new_price_buying" => $datas['product_price'],
									"type" => 'Boucherie',
									"user" => "",
									"user_name" => 'admines',
									"log_data_created" => date("Y-m-d H:i:s")
									);
									$this->M_products->add_new_entry_log_products_parteners_price($add_data);
							}
					}
					//var_dump($datas['product_price_dicount']);exit;
				$product_price_selling= $this->updatePriceProduct($product_id);
				}
				if( $type =='detail'){
			        $update_data=array(
					    "product_short_description" => $datas['product_short_description'],	
						'product_name'=>$datas['product_name'],
						'product_meta_title'=>$datas['product_meta_title'],
						'product_meta_description'=>$datas['product_meta_description'],
						'product_meta_keywords'=>$datas['product_meta_keywords'],
					   	'product_ref'=>$datas['product_ref'],
						'product_short_text'=>$datas['product_short_text'],
						'new_id'=>$datas['new_id'],
						'product_stock'=>$datas['product_stock'],
						'product_best_seller'=>$datas['product_best_seller'],
						'product_entier'=>$datas['product_entier'],
						'product_entier_association'=>$datas['product_entier_association'],
						"product_label_rouge" => $datas['product_label_rouge'],
						"product_promo" => $datas['product_promo'],
						"product_origin" => $datas['product_origin'],
						"product_is_composer" => 1,
						"product_bio" => $datas['product_bio']
						
						
				);      
				$this->M_products->update_this($product_id, $update_data);
				//$this->M_products->deletethis_products_attributs($product_id);

					
					/*foreach($attribut_value_ids as $attribut_value_id =>$ids){
							if($ids ){
							foreach($ids as $id){
								$data['attribut_value'] = $this->M_attributs_values->get_this($id);
						$new_entry_products_attributs=array(
								'product_id'=>$product_id,
								'attribut_id'=>$data['attribut_value']->attribut_id,
								'attribut_value_id'=>$id,
							);
							if($this->M_products->add_new_entry_products_attributs($new_entry_products_attributs)==true) {			
							}
							 else{
							 $chek=false ;
							}
                            }
							}
							}	*/
				}
				
				$product = $this->M_products->get_this($product_id);
			   echo json_encode(array('result'=>1,'type'=>$type,'product_price_dicount'=>number_format($product->product_price_dicount, 2, ',', '') ,'product_price_selling'=>number_format($product->product_price_selling, 2, ',', '')));
			  
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
		
			public function updatePriceProduct($product_id) {
		$product = $this->M_products->get_this($product_id);
		 
			$product_price_marge_percente = 0;
			$product_price_marge_percente_dicount = 0;
			
			if($product->product_price_marge_percente){
				$product_price_marge_percente=$product->product_price_marge_percente;
			}
				if($product->product_price_marge_percente_dicount){
				$product_price_marge_percente_dicount=$product->product_price_marge_percente_dicount;
			}
			$product_price_selling = $product->product_price+$product->product_price*($product_price_marge_percente/100);
			$product_price_dicount = $product->product_price+$product->product_price*($product_price_marge_percente_dicount/100);
				if($product->product_entier_association){
			    	$product_price_selling = $product->product_total_price+ $product->product_total_price*($product_price_marge_percente/100);
                    $product_price_dicount = $product->product_total_price+ $product->product_total_price*($product_price_marge_percente_dicount/100);
				}
			
						$update_data=array(
						    "product_price_selling" => $product_price_selling,
							 "product_price_dicount" => $product_price_dicount,
						    "product_data_updated" => date("Y-m-d H:i:s")
						);
						
						$this->M_products->update_this($product->product_id, $update_data);
						return  $product_price_selling;
		}
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('product_id');
			$this->M_products_pictures->deleteProduct($data_id);
			$this->M_products->remove_packs_product($data_id);
			if(is_numeric($data_id)){
				if($this->M_products->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/products/index/'.$data_id);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	
		/*** Update product_data_status Banner  Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$product_id=$this->input->post('product_id');
			if(is_numeric($data_id)){
				$update_entries=array('product_data_status'=>$data_id);
				if($this->M_products->update_status($update_entries,$product_id)==true){
					
					$product = $this->M_products->get_this($product_id);
						if($product->categorie_id){
					$categorie_count=$this->M_products->count_product_by_categorie($product->categorie_id,null);
					
					$update_data=array(
								
								"count_products" => $categorie_count,
								
										);
										$this->M_categories->update_this($product->categorie_id, $update_data);
				}
				if($product->sub_categorie_id){
							$sub_categorie_count =$this->M_products->count_product_by_categorie(null,$product->sub_categorie_id);
							
					
					$update_data=array(
								
								"count_products" => $sub_categorie_count,
								
										);
										$this->M_categories->update_this($product->sub_categorie_id, $update_data);
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
		/*** Update show_poids Banner  Execute function ***/
		public function show_poids() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$product_id=$this->input->post('product_id');
			if(is_numeric($data_id)){
				$update_entries=array('show_poids'=>$data_id);
				if($this->M_products->update_status($update_entries,$product_id)==true){
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
		
		
		public function showPoids() { 
		$show_poids=$this->input->post('show_poids');
		$product_id=$this->input->post('product_id');
		$update_entries=array('show_poids'=>$show_poids);
		$this->M_products->update_status($update_entries,$product_id);
		echo json_encode(array('result'=>1,'show_poids'=>$show_poids));
		}
			public function solde() { 
		$productsId=$this->input->post('productsId');
        $productsId= explode(",", $productsId);
		$product_is_promo=$this->input->post('product_is_promo');
		$product_price_marge_percente_dicount = 0;
			
			if($this->input->post('product_price_marge_percente_dicount')){
				$product_price_marge_percente_dicount=$this->input->post('product_price_marge_percente_dicount');
			}
			
		foreach($productsId as $id){
			$product = $this->M_products->get_this($id);
			$product_price_dicount = $product->product_price+$product->product_price*($product_price_marge_percente_dicount/100);
				
			$update_data=array(
					                   "product_price_marge_percente_dicount" => $product_price_marge_percente_dicount,
									   "product_is_promo" => $product_is_promo,
									   "product_price_dicount" => $product_price_dicount
									   
										);
							$product = $this->M_products->update_this($id, $update_data);
					
			}
             
		
		echo json_encode(array('result'=>1));
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function compose(){
		
		
		try {  
		      
				
				$config = array();
				$config['base_url'] = base_url() . "products/compose";
				$config['total_rows'] = $this->M_products->count_all_compose();
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
				if($this->input->get('exports') == 1){
				$data['products_list'] = $this->M_products->get_all_compose($config['per_page'], $page);
				  $this->load->view('views_products/exports/excel',$data);
			}elseif($this->input->get('exports') == 2){
				//load mPDF library
				$this->load->library('m_pdf');
				//load mPDF library
				//now pass the data//
			$data['products_list'] = $this->M_products->get_all_compose($config['per_page'], $page);
				//now pass the data //
				$html=$this->load->view('views_products/exports/pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
				//this the the PDF filename that user will get to download
				$pdfFilePath ="AT-export-clients-".date('d-m-Y H:i:s').".pdf";
				//actually, you can pass mPDF parameter on this load() function
				$pdf = $this->m_pdf->load();
				//generate the PDF!
				$pdf->WriteHTML($html,2);
				//offer it to user via browser download! (The PDF won't be saved on your server HDD)
				$pdf->Output($pdfFilePath, "D");
			
			
			}else{
				$data['products_list'] = $this->M_products->get_all_compose($config['per_page'], $page);
				 $data['pagination'] = $this->pagination->create_links();
			
                 $this->template->load('template','views_products/compose',$data);
			}// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}

		public function addCompose()
		{ 
			
			
			$data['process_status'] = 0;
			$data['categories_list'] = $this->M_categories_couffin->get_categories_couffin();
		    $data['products_list'] = $this->M_products->get_all_table_for_composer();
			  $data['certificats_list'] = $this->M_certificats->get_all_table();
			$this->template->load('template','views_products/addCompose',$data);
		

		}
		public function editCompose()
		{ 
			
			
			$data['process_status'] = 0;
			$data['product'] = $this->M_products->get_this(end($this->uri->segments));
			$data['categories_list'] = $this->M_categories_couffin->get_categories_couffin();
		    $data['products_list'] = $this->M_products->get_all_table_for_composer();
			$data['packs'] =$this->M_products->get_packs_product(end($this->uri->segments));
			$data['certificats_list'] = $this->M_certificats->get_all_table();
			$this->template->load('template','views_products/editCompose',$data);
		

		}
		public function saveComposer() { 
		    
			
						
			$productId =$this->input->post('product_id');		
			$product_price = 0;
			$product_price_marge_percente = 0;
			$product_price_selling = 0;
			if($this->input->post('product_price_marge_percente')){
				$product_price_marge_percente=$this->input->post('product_price_marge_percente');
			}
			if($this->input->post('product_price')){
				$product_price = $this->input->post('product_price');
			}
				$product_price_selling = $product_price+$product_price*($product_price_marge_percente/100);
 
		   $add_data=array(
						"product_short_text" => $this->input->post('product_short_text'),
						"product_short_description" => $this->input->post('product_short_description'),
						"product_name" => $this->input->post('product_name'),
						"product_price" => $this->input->post('product_price'),
						"product_price_dicount" => $this->input->post('product_price_dicount'),
						"product_meta_title" => $this->input->post('product_meta_title'),
						"product_meta_description" => $this->input->post('product_meta_description'),
						"product_meta_keywords" => $this->input->post('product_meta_keywords'),
						"product_picture" => $this->input->post('product_picture'),
						"product_poids" => $this->input->post('product_poids'),
						"product_stock" => $this->input->post('product_stock'),
						"product_is_composer" => 2,
						"product_is_promo" => $this->input->post('product_is_promo'),
						"product_label_rouge" => $this->input->post('product_label_rouge'),
						"product_promo" => $this->input->post('product_promo'),
						"product_origin" => $this->input->post('product_origin'),
						"product_bio" => $this->input->post('product_bio'),
						"product_price_marge_percente" => $product_price_marge_percente,
						"product_price_selling" => $this->input->post('product_price_selling'),
						"product_info" => $this->input->post('product_info'),
						"categorie_couffin_id" => $this->input->post('categorie_couffin_id'),
						"product_price_marge_percente_dicount" => $this->input->post('product_price_marge_percente_dicount'),
						"certificat_id" => $this->input->post('certificat_id'),

								"product_data_created" => date("Y-m-d H:i:s")
								);
								if($productId){
								
								$this->M_products->update_this($productId, $add_data);
								} else {
									$this->M_products->add_new_entry($add_data);
								$product_id = $this->db->insert_id();
								$update_data=array(
								'product_ref'=>$product_id,
								);
								$this->M_products->update_this($product_id, $update_data);
								}
								if($productId){
									$this->M_products->remove_packs_product($productId);
									$product_id=$productId;
									}
					           $productQty=$this->input->post('productQty');
							   $prodLabelRouge=$this->input->post('prodLabelRouge');
							   $prodBio=$this->input->post('prodBio');
							   $productPoitouCharentes=$this->input->post('productPoitouCharentes');
				       foreach($productQty as $product =>$v){
							$productinfo = $this->M_products->get_this($product);
						
							
						$new_entry_products_compose=array(
								'product_id'=>$product_id,
								'prod_id'=>$productinfo->product_id,
								'prod_qty'=>$v,
								'prod_poids'=>number_format($productinfo->product_poids*$v, 2, '.', ''),
								'prod_label_rouge'=>$prodLabelRouge[$product],
								'prod_bio'=>$prodBio[$product],
								'prod_poitou_charentes'=>$productPoitouCharentes[$product],
								
								
							);
							$this->M_products->add_new_entry_products_compose($new_entry_products_compose);
							
							}
							
							echo json_encode(array('result'=>1));
		        }
		public function show_home() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$product_id=$this->input->post('product_id');
			if(is_numeric($data_id)){
				$update_entries=array('product_show_home'=>$data_id);
				if($this->M_products->update_status($update_entries,$product_id)==true){
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
			public function show_option() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$product_id=$this->input->post('product_id');
			if(is_numeric($data_id)){
				$update_entries=array('show_option'=>$data_id);
				if($this->M_products->update_status($update_entries,$product_id)==true){
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
		
			public function getProducts() { 
		$products_id=$this->input->post('products_id');
       
			
		$products_list = $this->M_products->get_products_by_id($products_id);
             
		
		echo json_encode(array('result'=>1,'products_list'=>$products_list));
		}
		public function saveProduct() { 
		$categories_list = $this->M_categories->get_sub_categoriesss();
		foreach($categories_list as $categories){
			$add_data=array(
					                   "product_name" => $categories->categorie_name,
									   "product_meta_title" => $categories->categorie_name,
									   "product_meta_description" => $categories->categorie_name,
									   "product_meta_keywords" => $categories->categorie_name,
										"sub_categorie_id" => $categories->categorie_id,
										"categorie_id" => $categories->parent_id,
										"product_data_created" => date("Y-m-d H:i:s")
										);
										$this->M_products->add_new_entry($add_data);
			}
             }
			 
			 public function saveRef() { 
		$products_list = $this->M_products->get_all_table();
		foreach($products_list as $product){
			
								$update_data=array(
								'product_ref'=>$product->product_id,
							);
				$this->M_products->update_this($product->product_id, $update_data);
			}
             }
			 
			   public function savePicture() { 
		$products_list = $this->M_products->get_all_table();
		foreach($products_list as $product){
			if($product->product_is_composer==1){
			
			$image =$this->M_products_pictures->get_one_product_picture_cover($product->product_id);
								$update_data=array(
								'product_picture'=>$image->product_pictures,
							);
				$this->M_products->update_this($product->product_id, $update_data);
			}
			}
             }
			 
			 	 public function saveText() { 
		$products_list = $this->M_products->get_all_table();
		foreach($products_list as $product){
			
								$update_data=array(
								'product_short_text'=>$product->product_meta_description,
							);
				$this->M_products->update_this($product->product_id, $update_data);
			}
             }
			 
			 	 	 public function saveimagescategorie() { 
		$products_list = $this->M_products->get_all_table();
		foreach($products_list as $product){
			$products_image = $this->M_products_pictures->get_one_product_picture_categorie($product->product_id);
			$categorie= $this->M_categories->get_category_by_name($product->product_name);
			if($categorie  and  $categorie->parent_id){
								$update_data=array(
								'categorie_picture'=>$products_image->product_pictures,
							);
				$this->M_categories->update_this($categorie->categorie_id, $update_data);
			}
			}
             }
			 public function getPartener() { 
		$product_id=$this->input->post('product_id');
		$products=$this->M_products->get_product_parteners(null,$product_id);
		$data['product'] = $this->M_products->get_this($product_id);
		echo json_encode(array('result'=>1,'products'=>$products,'product_name'=>$data['product']->product_name));
		}
		
		
		 public function saveProduct_Partenaire() { 
		$products_list = $this->M_products->get_all_table();
		foreach($products_list as $product){
			if($product->product_is_composer==1  and !$product->product_affected_partener){
				$product_parneters=$this->M_products->get_this_product_parneters_by_product($product->product_id,9);
					 if($product_parneters){
						
							 $update_data_parteners=array(
					                 
									    "price_buying" => $product->product_price,
										);
							$this->M_products->update_this_products_parteners($product_parneters->product_partener_id, $update_data_parteners);
					 } else {
						 	$add_data_parneters=array(
							 "price_buying" => $product->product_price,
							 "product_id" => $product->product_id,
							 "partener_id" => 9
							 );
			           $this->M_products->add_new_entry_products_parteners($add_data_parneters);
					 }
						 $update_data=array(
								'product_affected_partener'=>9,
							);
				$this->M_products->update_this($product->product_id, $update_data);
						 
					 }						 
		}
								
			}
            
			 	public function calcule_price_vente() { 
		    $product_price_marge_percente=$this->input->post('product_price_marge_percente');
			$product_price=$this->input->post('product_price');
			$product_price = str_replace(";", ".", $product_price);
			$product_price_marge_percente = str_replace(";", ".", $product_price_marge_percente);
			$product_price_selling = $product_price+$product_price*($product_price_marge_percente/100);
			echo json_encode(array('result'=>1,'product_price_selling'=>number_format($product_price_selling, 2, ',', '')));
		
		}
		 	public function getproductsByCertificat() { 
		    $certificat_id=$this->input->post('certificat_id');
			$products= $this->M_products->getproductsByCertificat($certificat_id);
			echo json_encode(array('result'=>1,'products'=>$products));
		
		}
		
			 	 public function setProductbycertifPartener() { 
                   $products_list = $this->M_products->get_all_table();
		           foreach($products_list as $product){
			if($product->product_is_composer==1 and  $product->product_entier_association==0){
			$partenerInfo= $this->M_partners->get_this($product->product_affected_partener);

		
								$update_data=array(
								"certificat_id" => $partenerInfo->certificat_id,
							);
				$this->M_products->update_this($product->product_id, $update_data);
			}
			}
		echo json_encode(array('result'=>1));
		}
	}
?>