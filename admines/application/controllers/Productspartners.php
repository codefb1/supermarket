<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Productspartners extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
				
        try {    
		if($this->input->get('partener_idPr')){
			$partener_id=$this->input->get('partener_idPr');
			
		}else{
			$partener_id=$this->uri->segment(3);
		}
		
		        $data['partener'] = $this->M_partners->get_this($partener_id);
		          if($this->input->get('filtercheck')){
					 $session_search_array = array(
						 'keywordPr' => $this->input->get('keywordPr'),
						 'categorie_idPr' => $this->input->get('categorie_idPr'),
						 'sub_categorie_idPr' => $this->input->get('sub_categorie_idPr'),
						 
					 );
					$this->session->set_userdata($session_search_array);
				}
				($this->session->userdata('keywordPr') != "N" and $this->session->userdata('keywordPr') != '') ? $keyword = $this->session->userdata('keywordPr') : $keyword = "N"; 
				($this->session->userdata('categorie_idPr') != "N" and $this->session->userdata('categorie_idPr') != '') ? $categorieId = $this->session->userdata('categorie_idPr') : $categorieId = "N";
				($this->session->userdata('sub_categorie_idPr') != "N" and $this->session->userdata('sub_categorie_idPr') != '') ? $subCategorieId = $this->session->userdata('sub_categorie_idPr') : $subCategorieId = "N";
				$partenerId = "N";
				 
				$config = array();
				$config['base_url'] = base_url() . "productspartners/index/".$partener_id;
				$config['total_rows'] = $this->M_products->count_all($keyword,$categorieId,$subCategorieId,$partenerId);
				$config['per_page'] = 30;
				$config['uri_segment'] =4;
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
	
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				if($this->input->get('exports') == 1){
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId);
				  $this->load->view('views_products/exports/excel',$data);
			}elseif($this->input->get('exports') == 2){
				//load mPDF library
				$this->load->library('m_pdf');
				//load mPDF library
				//now pass the data//
			$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId);
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
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId);
				 $data['pagination'] = $this->pagination->create_links();
				 
				 $data['keyword'] =$keyword;
				 $data['categorieId'] =$categorieId;
				 $data['subCategorieId'] =$subCategorieId;
				 $data['partenerId'] =$partenerId;
	
			     if($categorieId == "N"){
					 $data['categorieId'] ='';
					 }
					 if($partenerId == "N"){
					 $data['partenerId'] ='';
					 }
					 	
				 if($subCategorieId == "N"){
					  $data['subCategorieId'] ='';
					 }
                    if($keyword == "N"){
					  $data['keyword'] ='';
					 }
                 $this->template->load('template','views_products_partners/index',$data);
			}// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
		/*** Add Banner interface function ***/
		
		

	public function addEdit()
		{
		$data['process_status'] = 0;
			$partener_id=$this->input->post('partener_id');
			$product_id=$this->input->post('product_id');
			$price_buying=$this->input->post('price_buying');
			$productParneter= $this->M_products->get_this_product_parneter($product_id,$partener_id);
						if($productParneter){
							
							 $update_data=array(
					                 
									    "price_buying" => $price_buying,
										);
							$this->M_products->update_this_products_parteners($productParneter->product_partener_id, $update_data);
							$prices_buying = $this->M_products->get_prix_product_parteners($product_id);
							$price_buying=$prices_buying->price_buying;
							$partenerId=$prices_buying->partener_id;

							$this->updatePriceProduct($price_buying,$product_id,$partenerId);
							
								$add_data=array(
									 "product_id" => $product_id,
									 "old_price_buying" => $productParneter->price_buying,
									  "new_price_buying" => $price_buying,
									  "type" => 'admine',
									  "user" => $this->session->userdata('account_id'),
									  "user_name" =>  $this->session->userdata('account_firstname').' '. $this->session->userdata('account_lastname'),
									  "log_data_created" => date("Y-m-d H:i:s")
							);
							$this->M_products->add_new_entry_log_products_parteners_price($add_data);
							
							echo json_encode(array('result'=>1,'product_id'=>$product_id));
							
						} else {
							$add_data=array(
					                   "partener_id" => $partener_id,
									   "product_id" => $product_id,
									    "price_buying" => $price_buying,
										);
							$this->M_products->add_new_entry_products_parteners($add_data);
							$prices_buying = $this->M_products->get_prix_product_parteners($product_id);
							$price_buying=$prices_buying->price_buying;
							$partenerId=$prices_buying->partener_id;
							
							$this->updatePriceProduct($price_buying,$product_id,$partenerId);
							echo json_encode(array('result'=>0,'product_id'=>$product_id));
						}	
	 	

		}
	public function disponibleProductPartener()
		{
		    $data['process_status'] = 0;
			$partener_id=$this->input->post('partener_id');
			$product_id=$this->input->post('product_id');
			$is_disponible=$this->input->post('is_disponible');
			$productParneter= $this->M_products->get_this_product_parneter($product_id,$partener_id);
							
							 $update_data=array(
					                 
									    "is_disponible" => $is_disponible,
										);
							
							
							$this->M_products->update_this_products_parteners($productParneter->product_partener_id, $update_data);
							
							$disponible_product = $this->M_products->get_disponible_product_parteners($product_id,1);
							
							if(!$disponible_product){
								$update_data_product=array(
						        'product_stock'=>3,	   	
			                    	);
				              
							} else {
								$update_data_product=array(
						        'product_stock'=>1,	   	
			                    	);
								
							}
							  $this->M_products->update_this($product_id, $update_data_product);
							  $prices_buying = $this->M_products->get_prix_product_parteners($product_id);
                              $price_buying=$prices_buying->price_buying;
							  $partenerId=$prices_buying->partener_id;
							  $this->updatePriceProduct($price_buying,$product_id,$partenerId);
						
							echo json_encode(array('result'=>1,'product_id'=>$product_id,'is_disponible'=>$is_disponible));
							
							
	 	

		}	
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
		    $partener_id=$this->input->post('partener_id');
			$product_id=$this->input->post('product_id');
		    $productParneter= $this->M_products->get_this_product_parneter($product_id,$partener_id);
			$this->M_products->deletethis_products_parteners($productParneter->product_partener_id);
			$prices_buying = $this->M_products->get_prix_product_parteners($product_id);
			$price_buying=$prices_buying->price_buying;
		    $partenerId=$prices_buying->partener_id;
							
			$this->updatePriceProduct($price_buying,$product_id,$partenerId);
			echo json_encode(array('result'=>0,'product_id'=>$product_id));
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
			public function updateProductPartenerPrice() {  
		try {
		   $user=$this->input->post('user');
			$product_id=$this->input->post('product_id');
			$partener_id=$this->input->post('partener_id');
		    $price_buying=str_replace(',','.',$this->input->post('price_buying'));
			$type=$this->input->post('type');
			$is_new=false;
	       // $old_price_buying=$this->M_products->get_this_product_parneters($product_partener_id);
		   $old_price_buyings=$this->M_products->get_this_product_parneter($product_id,$user);
		  
		  $old_price_buying=0;
		  if($old_price_buyings){ 
			$old_price_buying=   $old_price_buyings->price_buying;
		   }
			
			if($old_price_buying){
				$update_data=array(
							 "price_buying" => $price_buying,
			);
				$this->M_products->update_this_products_parteners($old_price_buyings->product_partener_id, $update_data);
			} else {
				$add_data=array(
							 "price_buying" => $price_buying,
							 "product_id" => $product_id,
							 "partener_id" => $user
							 );
			 $this->M_products->add_new_entry_products_parteners($add_data);
			 $is_new=true;
			}
			
			$prices_buying = $this->M_products->get_prix_product_parteners($product_id);
			$partenert_price_buying=$prices_buying->price_buying;
			$partenerId=$prices_buying->partener_id;
							   
			$this->updatePriceProduct($partenert_price_buying,$product_id,$partenerId);
			$this->updateLabelProduct($product_id,$partenerId);
			$partener = $this->M_partners->get_this($user);
			
			$add_data=array(
                            "product_id" => $product_id,
							 "old_price_buying" => $old_price_buying,
							  "new_price_buying" => $price_buying,
							  "type" => $type,
							  "user" => $user,
							  "user_name" => $partener->partener_lastname,
							  "log_data_created" => date("Y-m-d H:i:s")
			);
			$this->M_products->add_new_entry_log_products_parteners_price($add_data);
			echo json_encode(array('result'=>0,'product_id'=>$product_id,'is_new'=>$is_new));
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
		
		public function getLogProductPartenerPrice() {  
		try {
		    $product_id=$this->input->post('product_id');
			$partener_id=$this->input->post('partener_id');
			$type=$this->input->post('type');
		    $product = $this->M_products->get_this($product_id);

			 $logProductPartenerPrice=$this->M_products->getLogProductPartenerPrice($product_id,$partener_id,$type);
			echo json_encode(array('result'=>1,'product_name'=>$product->product_name,'logProductPartenerPrice'=>$logProductPartenerPrice));
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		} 
	public function updatePriceProduct($price_buying,$product_id,$partenerId =null) {
		$product = $this->M_products->get_this($product_id);
		 
			$product_price_marge_percente = 0;
			 $product_price_marge_percente_dicount = 0;
			if($product->product_price_marge_percente){
				$product_price_marge_percente=$product->product_price_marge_percente;
			}
			if($product->product_price_marge_percente_dicount){
				$product_price_marge_percente_dicount=$product->product_price_marge_percente_dicount;
			}
			$product_price_selling = $price_buying+$price_buying*($product_price_marge_percente/100);
			$product_price_dicount = $price_buying+$price_buying*($product_price_marge_percente_dicount/100);
						$update_data=array(

						   "product_price" => $price_buying,
						    "product_price_selling" => $product_price_selling,
							"product_price_dicount" => $product_price_dicount,
							"product_affected_partener" => $partenerId,
						    "product_data_updated" => date("Y-m-d H:i:s")
						);
						
						$this->M_products->update_this($product->product_id, $update_data);
						$this->updateLabelProduct($product_id,$partenerId);
		}
		public function updateLabelProduct($product_id,$partenerId) {
			$productPartener = $this->M_products->get_this_product_parneter($product_id,$partenerId);
			
			$update_data=array(

						   	    "product_label_rouge" => $productPartener->product_partener_label_rouge,
								"product_promo" => $productPartener->product_partener_promo,
								"product_origin" => $productPartener->product_partener_origin,
								"product_bio" => $productPartener->product_partener_bio,
						);
						
		   $this->M_products->update_this($product_id, $update_data);
		}
		
		public function savepp() {  
		$products_list = $this->M_products->get_all_table();
		foreach($products_list as $product){
		$productParneter= $this->M_products->get_this_product_parneter($product->product_id,9);
		$this->M_products->deletethis_products_parteners($productParneter->product_partener_id);
		if($product->product_price!='' and $product->product_price!=null){
			$add_data=array(
					                   "partener_id" => 9,
									   "product_id" => $product->product_id,
									    "price_buying" => $product->product_price,
										);
							$this->M_products->add_new_entry_products_parteners($add_data);
		                    $prices_buying = $this->M_products->get_prix_product_parteners($product->product_id);
							$price_buying=$prices_buying->price_buying;
							$partenerId=$prices_buying->partener_id;
							   
							$this->updatePriceProduct($price_buying,$product->product_id,$partenerId);    
							 }
		                  
		
							 }
					
		}
            
	public function updatecatacterique() {  
		try {
		    $product_id=$this->input->post('product_id');
			$partener_id=$this->input->post('partener_id');
			$type=$this->input->post('type');
			$is_check=$this->input->post('is_check');
			$product = $this->M_products->get_this($product_id);
			if($type=="lr"){

					$update_data=array(
					"product_partener_label_rouge" => $is_check,
					);
					if($product->product_affected_partener == $partener_id){
						$update_product_data=array(
					"product_label_rouge" => $is_check,
					);
					
					$this->M_products->update_this($product_id, $update_product_data);
					}

			}
			if($type=="origin"){

					$update_data=array(
					"product_partener_origin" => $is_check,
					);
					
					if($product->product_affected_partener == $partener_id){
						$update_product_data=array(
					"product_origin" => $is_check,
					);
					
					$this->M_products->update_this($product_id, $update_product_data);
					}

			}
			if($type=="promo"){

					$update_data=array(
					"product_partener_promo" => $is_check,
					);
					
					if($product->product_affected_partener == $partener_id){
						$update_product_data=array(
					"product_promo" => $is_check,
					);
					
					$this->M_products->update_this($product_id, $update_product_data);
					}

			}
			if($type=="bio"){

					$update_data=array(
					"product_partener_bio" => $is_check,
					);
					
					if($product->product_affected_partener == $partener_id){
						$update_product_data=array(
					"product_bio" => $is_check,
					);
					
					$this->M_products->update_this($product_id, $update_product_data);
					}

			}
							
						if($type){	
							$this->M_products->updatecatacterique_products_parteners($partener_id,$product_id, $update_data);
						}
			echo json_encode(array('result'=>1,'type'=>$type,'is_check'=>$is_check,'product_id'=>$product_id));
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	}
		
?>