<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

		
	
	public function index(){
		
		
		try {
			      if($this->input->get('filtercheck')){
					 $session_search_array = array(
						 'order_data_created' => $this->input->get('order_data_created'),
						 'order_data_created_end' => $this->input->get('order_data_created_end'),
						  'order_reference' => $this->input->get('order_reference'),
					 );
					$this->session->set_userdata($session_search_array);
				}
				 $data['order_data_created'] =$order_data_created;
				 $data['order_data_created_end'] =$order_data_created_end;
				 $data['order_reference'] =$order_reference;
				($this->session->userdata('order_data_created') != "" and $this->session->userdata('order_data_created') != '') ? $order_data_created = $this->session->userdata('order_data_created') : $order_data_created = ''; 
				($this->session->userdata('order_data_created_end') != "" and $this->session->userdata('order_data_created_end') != '') ? $order_data_created_end = $this->session->userdata('order_data_created_end') : $order_data_created_end = ''; 
				($this->session->userdata('order_reference') != "N" and $this->session->userdata('order_reference') != '') ? $order_reference = $this->session->userdata('order_reference') : $order_reference = ''; 
				
				$config = array();
				$config['base_url'] = base_url() . "orders/index";
				$config['total_rows'] = $this->M_orders->count_all($order_data_created,$order_data_created_end,$order_reference);
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
			$data['orders_list'] = $this->M_orders->get_all($config['per_page'], $page,$order_data_created,$order_data_created_end,$order_reference);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			$data['order_data_created'] =$order_data_created;
			$data['order_data_created_end'] =$order_data_created_end;
			$data['order_reference'] =$order_reference;
			if($order_reference == "N"){
			$data['order_reference'] ='';
			}
			if($order_data_created_end == ""){
			$data['order_data_created_end'] ='';
			}
			if($order_data_created == ""){
			$data['order_data_created'] ='';
			}
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
		    $data['body'] = 'product-cart checkout-cart blog';
			$data['menu'] = "1";
			$data['menuLeft'] = "orders";
				
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_orders/index',$data);
	}
	
	
	
	
/*** show Execute function orders ***/
			public function show()
		{
			
			try {
	
			$data['orders']= $this->M_orders->get_this(end($this->uri->segments));
			
			$data['orders_detail']= $this->M_orders->get_orders_detail($data['orders']->order_id);
			$data['partners_list']= $this->M_partners->get_all_table(1);
			$data['status_list']= $this->M_status->get_all_table(1);
			$data['status_livraison']= $this->M_status->get_all_table(2);
			$data['transporters_list']= $this->M_transporters->get_all_table();
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['order_billing_country']= $this->M_countries->get_this($data['orders']->order_billing_country);
		   $data['order_shipping_country']= $this->M_countries->get_this($data['orders']->order_shipping_country);
		     $data['list_group_shipping'] =$this->M_customer_shopping->get_all_table($this->session->userdata('customer_id'));
			
		   $data['body'] = 'product-cart checkout-cart blog';
			$data['menu'] = "1";
			$data['menuLeft'] = "orders";
				} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
			$this->template->load('template','views_orders/show',$data);
	}
		public function order_payement()
	
	{ 
		try{       
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);

			$data['body'] = 'product-cart checkout-cart blog';
			$data['menu'] = "1";
			$data['menuLeft'] = "orders";
            		if(!$this->cart->contents()){
						redirect('/');	
					}
					
					$shopping_address = $this->input->post('shopping_address');
					$order_shipping_email	 = $this->session->userdata('customer_email');
					$order_shipping_lastname = $this->input->post('customer_delivery_lastname');
					$order_shipping_firstname	 = $this->input->post('customer_delivery_firstname');
					$order_shipping_city = $this->input->post('customer_delivery_city');
					$order_shipping_phone = $this->input->post('customer_delivery_phone');
					$order_shipping_street = $this->input->post('customer_delivery_address');
					$order_shipping_country = $this->input->post('customer_delivery_country');
					$order_shipping_zip = $this->input->post('customer_delivery_zip');
					$order_billing_lastname = $this->input->post('customer_billing_lastname');
					$order_billing_firstname = $this->input->post('customer_billing_firstname');
					$order_billing_city = $this->input->post('customer_billing_city');
					$order_billing_phone = $this->input->post('customer_billing_phone');
					$order_billing_street = $this->input->post('customer_billing_address');
					$order_billing_country = $this->input->post('customer_billing_country');
					$order_billing_zip = $this->input->post('customer_billing_zip');

						
						$data['order_billing_lastname']=$order_billing_lastname;
						$data['order_billing_firstname']=$order_billing_firstname;
						$data['order_billing_city']=$order_billing_city;
						$data['order_billing_phone']=$order_billing_phone;
						$data['order_billing_street']=$order_billing_street;
						$data['order_billing_country']=$order_billing_country;
						$data['order_billing_zip']=$order_billing_zip;
						$data['order_billing_email']=$order_billing_email;
						$data['order_shipping_lastname']=$order_shipping_lastname;
						$data['order_shipping_firstname']=$order_shipping_firstname;
						$data['order_shipping_city']=$order_shipping_city;
						$data['order_shipping_phone']=$order_shipping_phone;
						$data['order_shipping_street']=$order_shipping_street;
						$data['order_shipping_country']=$order_shipping_country;
						$data['order_shipping_zip']=$order_shipping_zip;
						$data['order_shipping_email']=$order_shipping_email;
						
						
						
						
						
						$this->template->load('template','views_orders/order_payement',$data);
				
				
				
	    }catch (Exception $exc) {
		   $this->exceptionhandler->handle($exc);
	    }
	}
	
	
	
	public function order_payementold()
	
	{ 
		try{       

            		if(!$this->cart->contents()){
						redirect('/');	
					}
					
					$shopping_address = $this->input->post('shopping_address');
					$order_shipping_email	 = $this->session->userdata('customer_email');
					$order_shipping_lastname = $this->input->post('customer_delivery_lastname');
					$order_shipping_firstname	 = $this->input->post('customer_delivery_firstname');
					$order_shipping_city = $this->input->post('customer_delivery_city');
					$order_shipping_phone = $this->input->post('customer_delivery_phone');
					$order_shipping_street = $this->input->post('customer_delivery_address');
					$order_shipping_country = $this->input->post('customer_delivery_country');
					$order_shipping_zip = $this->input->post('customer_delivery_zip');
					$order_shipping_zip_save=$order_shipping_zip;
					/*if($shopping_address){
					$order_billing_lastname = $this->session->userdata('customer_delivery_lastname');
					$order_billing_firstname	 = $this->session->userdata('customer_delivery_firstname');
					$order_billing_email	 = $this->session->userdata('customer_email');
					$order_billing_city = $this->input->post('customer_delivery_city');
					$order_billing_phone = $this->input->post('customer_delivery_phone');
					$order_billing_street = $this->input->post('customer_delivery_address');
					$order_billing_country = $this->input->post('customer_delivery_country');
					$order_billing_zip = $this->input->post('customer_delivery_zip');
		                } else {
							
					
						}*/
						
						
			     	$order_billing_lastname = $this->input->post('customer_billing_lastname');
					$order_billing_firstname = $this->input->post('customer_billing_firstname');
					$order_billing_city = $this->input->post('customer_billing_city');
					$order_billing_phone = $this->input->post('customer_billing_phone');
					$order_billing_street = $this->input->post('customer_billing_address');
					$order_billing_country = $this->input->post('customer_billing_country');
					$order_billing_zip = $this->input->post('customer_billing_zip');
					
						
						
						
					$totalPoid=0;
					$orderProductsPrices=0;
					$orderPartenerAmount=0;
					$orderTotalMarge=0;
					$is_entier=0;
					$is_association=0;
					$all_association=true;
					$orderAssociationAmount=0;
						foreach ($this->cart->contents() as $items){
                           $product = $this->M_products->get_this(intval($items['id']));
						   if($product->product_entier_association){
							   $totalPoid=$totalPoid+0;
						     } else{
						       $totalPoid=$totalPoid+($product->product_poids*$items['qty']);
							}
							 
					    	$orderProductsPrices=$orderProductsPrices+($items['price']*$items['qty']);
							if($product->product_entier_association){
							$orderPartenerAmount=$orderPartenerAmount+0;
							$orderAssociationAmount=$orderAssociationAmount+$items['price']*$items['qty'];
							} else{
							$orderPartenerAmount=$orderPartenerAmount+$product->product_price*$items['qty'];
							$orderAssociationAmount=$orderAssociationAmount+0;
							$all_association=false;
							}
							$orderTotalMarge=$orderTotalMarge+($product->product_price*($product->product_price_marge_percente/100))*$items['qty'];
							$order_total_price_buying=$order_total_price_buying+$product->product_price*$items['qty'];
							if($product->categorie_id==2){
								$is_entier=1;
							}
							
							if($product->product_entier_association==1){
								$is_association=1;
							}
						}
					$transporter = $this->M_transporters->get_this(1,null);
					$shopingPriceKg =$transporter->transporter_price_by_one;
					$shopingPrice =$transporter->transporter_price_not_france;
                    $order_shipping_zip = substr($order_shipping_zip, 0, -3);
			    	$codeZips= array(91, 92, 75, 77, 93, 95, 94, 78);
						if (in_array($order_shipping_zip, $codeZips)) {
								$shopingPrice =$transporter->transporter_price_in_france;
						}
					$totalshopingPrices = $totalPoid*$shopingPriceKg+$shopingPrice;
					$partener_id =9;
					
					if($all_association){
						$totalshopingPrices=0;
						$partener_id =11;
					}
					
						
					$order_amount=$orderProductsPrices+$totalshopingPrices;
					$taxe = $this->M_taxe->get_taxe();
					
					 $add_new_order=array(
					 
					        "customer_id" => $this->session->userdata('customer_id'),
							"order_billing_lastname" => $order_billing_lastname,
							"order_billing_firstname" => $order_billing_firstname,
							"order_billing_city" =>$order_billing_city,
							"order_billing_street" => $order_billing_street,
							"order_billing_country" =>$order_billing_country,
							"order_billing_zip" => $order_billing_zip,
							"order_billing_email" => $order_billing_email,
							"order_billing_phone" => $order_billing_phone,
							"order_shipping_phone" => $order_shipping_phone,
							"order_shipping_lastname" => $order_shipping_lastname,
							"order_shipping_firstname" => $order_shipping_firstname,
							"order_shipping_email" => $order_shipping_email,
							"order_shipping_city" =>$order_shipping_city,
							"order_shipping_street" => $order_shipping_street,
							"order_shipping_country" =>$order_shipping_country,
							"order_shipping_zip" => $order_shipping_zip_save,
							"order_partener_amount" => $orderPartenerAmount,
							"order_total_marge" => $orderTotalMarge,
							"is_entier" => $is_entier,
							"taxe_id" => $taxe->taxe_id,
							"order_tax" => $taxe->taxe_value,
							"order_payment_method_name" => 'Bread',
							"partener_id" => $partener_id,
							"order_partener_status"=> 1,
							"order_status"=> 1,
							"order_payment_status"=> 1,/* Paiement en attente 1**/ 
							"order_products_prices"=> $orderProductsPrices,
							"order_amount"=> $order_amount,
							"order_shipping_rate"=> $totalshopingPrices,
							"order_total_price_buying"=> $order_total_price_buying,
							"is_association"=> $is_association,
							"order_total_amount_association"=> $orderAssociationAmount,
							"delivery_status"=> 0,
							"order_data_created" => date("Y-m-d H:i:s"),
							"order_data_updated" => date("Y-m-d H:i:s")
						
					);
					$this->M_orders->add_new_entry($add_new_order);
				     $ordersId=$this->db->insert_id();
					
						foreach ($this->cart->contents() as $items){
							$product = $this->M_products->get_this(intval($items['id']));
							$price_partener= $this->M_products->get_prix_product_partener($partener_id,$product->product_id);
						    $association_id="";
							$product_poids=$product->product_poids;
							$is_association=0;
							$order_product_price_buying = $price_partener->price_buying;
							if(isset($items['options']['product_entier_association']) and $items['options']['product_entier_association']){
								$is_association=1;
								$association_id=$items['options']['association_id'];
								$product_poids=0;
								$order_product_price_buying= $product->product_price;
							}
							/**recupere le prix de partenaire */
							
							$item_details_orders = array(
							'order_id'  => $ordersId,
							'product_id'   => $items['id'],
							'product_price_discount'     =>0,
							'orders_detail_product_price'     =>$items['price'],
							'order_product_price_buying'     =>$order_product_price_buying,
							'orders_detail_product_poids'     => $product_poids,
							'order_product_marge'     => $order_product_price_buying*($product->product_price_marge_percente/100),
							'product_quantity'     => $items['qty'],
							'order_product_entier_association'     => $is_association,
							'association_id'     => $association_id,
							
						);
				
				$this->M_orders->add_new_entry_orders_details($item_details_orders );
					}
					$update_ordres_entry = array(
					'order_reference'   => $ordersId,
				);
				$this->M_orders->update_this($ordersId,$update_ordres_entry);
				$this->cart->destroy();
						/**$update_customers_data=array(
						"customer_lastname" => $this->input->post('customer_delivery_lastname'),
						"customer_firstname" => $this->input->post('customer_delivery_firstname'),
						"customer_phone" =>$this->input->post('customer_delivery_phone'),
						"customer_address" => $this->input->post('customer_delivery_address'),
						"customer_zip" => $this->input->post('customer_delivery_zip'),
						"customer_city" => $this->input->post('customer_delivery_city'),
						"customer_country" => $this->input->post('customer_delivery_country')
						);
						$update_process = $this->M_customers->update_this($this->session->userdata('customer_id'), $update_customers_data);	**/
				ob_clean();
					$params=[
							'vads_action_mode' => 'INTERACTIVE',
							'vads_amount' => $order_amount*100,
							'vads_ctx_mode' => 'PRODUCTION', //TEST PRODUCTION
							'vads_currency' => '978', // 978eur
							'vads_page_action' => 'PAYMENT',
							'vads_payment_config' => 'SINGLE',
							'vads_site_id' => '99984172',
							'vads_trans_date' => date('YmdHis'), // AAAAMMJJhhmmss
							'vads_trans_id' => sprintf("%06d", $ordersId),
							'vads_language' => 'fr',
							'vads_version' => 'V2',		
							'vads_order_id' =>(int)$ordersId
					];
					$order_billing_street=str_replace(",","",trim($order_billing_street));
					$params['vads_cust_email']=trim($order_billing_email);$order_billing_email;
					$params['vads_cust_last_name']=str_replace(",","",trim($order_billing_lastname));
					$params['vads_cust_cell_phone']=trim($order_billing_phone); 
					//$params['vads_cust_address']= str_replace(" ","-",trim($order_billing_street));
					$params['vads_cust_zip']=trim($order_billing_zip);
					//$params['vads_cust_city']=trim($order_billing_city);
					$params['vads_cust_state']=1;
					$params['vads_url_return']=base_url() ."payments/payment_return"; 
					$params['vads_url_success']=base_url() ."payments/accept_payments";
					
					ksort($params);
					$signature = "";
					foreach($params as $nom=>$valeur)
					if (substr($nom,0,5)=='vads_')
					$signature .= $valeur."+";

					$key='xvvylh5opuRlzdvT';
					$key='oH59j0e0aYIkshKA';
					$signature .= $key;
					$signature = base64_encode(hash_hmac('sha256',$signature, $key, true));
					$params['signature']=$signature;
									
					ob_start();
					$form = '<form id="bred" method="POST" action="https://paiement.systempay.fr/vads-payment/" >';
						
							foreach ($params as $k=>$v){
					 $form .="<input type='hidden' name='$k' value='$v' />";
							}
								 $form .='</form><script>document.getElementById("bred").submit()</script>';   
			//var_dump($form1);exit;window.onload = function(){document.forms['bred'].submit();}

	

	
			 echo $form;
					/*$pack_price=100;
					$PSPID = 'atnet01'; 
					$passphrase = 'davidphildjulie1000';
					$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < 6; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
					}
					
					$unique_id = $ordersId.'-'.$randomString;
					$pm = "CREDIT CARD"; 
					
					$credit=$order_amount*100;
					$accept_url=base_url() ."payments/accept_gone";
					$cancelurl="base_url() .payments/cancel_ogone"; 
					
					$Ogone_sha1 =   
									"ACCEPTURL=".$accept_url.$passphrase.
									"AMOUNT=".$credit.$passphrase.
									"BGCOLOR=#4e84c4".$passphrase.
									"CANCELURL=".$cancelurl.$passphrase.
									"CURRENCY=EUR".$passphrase.
									"LANGUAGE=fr_FR".$passphrase.
									"ORDERID=".$unique_id.$passphrase.
									"PM=".$pm.$passphrase.
									"PSPID=".$PSPID.$passphrase.
									"TITLE=TA PARTICIPATION A TA COMMANDE A DAVID PHILD".$passphrase;
					
					$Ogone_sha1 = sha1($Ogone_sha1);
					$form1 = '<form name="directpayment1" id="directpayment" action="https://secure.ogone.com/ncol/prod/orderstandard.asp" method="post" >
								<input name="PSPID" type="hidden" value="'.$PSPID.'" />
								<input name="AMOUNT" type="hidden" value="'.$credit.'" />
								<input name="ACCEPTURL" type="hidden" value="'.$accept_url.'" />
								<input name="CANCELURL" type="hidden" value="'.$cancelurl.'" />
								<input name="ORDERID" type="hidden" value="'.$unique_id.'" />
								<input name="CURRENCY" type="hidden" value="EUR" />
								<input name="LANGUAGE" type="hidden" value="fr_FR" />
								<input name="PM"  type="hidden" value="'.$pm.'">
								<input name="TITLE"  type="hidden" value="TA PARTICIPATION A TA COMMANDE A DAVID PHILD">
								<input name="BGCOLOR"  type="hidden" value="#4e84c4">
								<input name="SHASIGN" type="hidden" value="'.$Ogone_sha1.'" />     
								</form><script>document.getElementById("directpayment").submit()</script>';    
					echo $form1;*/
					
					
				
				
				
	    }catch (Exception $exc) {
		   $this->exceptionhandler->handle($exc);
	    }
	}
	
	
	
		/*** Update Execute function ***/
		public function addGroup() { 
		
		try {
			$us=0;
			$customer_shopping_name=$this->input->post('customer_shopping_name');
			$add_data=array(
						"customer_shopping_name" => $this->input->post('customer_shopping_name'),
						"customer_id" => $this->session->userdata('customer_id'),
						"customer_shopping_data_created" => date("Y-m-d H:i:s"),
						"customer_shopping_data_updated" => date("Y-m-d H:i:s"),
						
						
					);
			$this->M_customer_shopping->add_new_entry($add_data);
			$groupes_shopping=$this->M_customer_shopping->get_all_table($this->session->userdata('customer_id'));
			
				echo json_encode(array('result'=>1,'groupes_shopping'=>$groupes_shopping));
				
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
		/*** Update Execute function ***/
		public function addProductGroup() { 
		
		try {
			$us=0;
			$order_detail_id=$this->input->post('order_detail_id');
			$customer_shopping_id=$this->input->post('customer_shopping_id');
			$order_detail = $this->M_orders->get_this_order_detail($order_detail_id);
			$add_data=array(
						"customer_shopping_id" => $this->input->post('customer_shopping_id'),
						"association_id" => $order_detail->association_id,
						"product_id" => $order_detail->product_id,
						"product_quantity" =>$order_detail->product_quantity ,
						"customer_shopping_product_data_created" => date("Y-m-d H:i:s"),
						
						
					);
			$this->M_customer_shopping->add_new_customer_shopping_products($add_data);
			
				echo json_encode(array('result'=>1));
				
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
		
		public function purchases(){
		
		
		try {
			     
				$config = array();
				$config['base_url'] = base_url() . "orders/purchases";
				$config['total_rows'] = $this->M_customer_shopping->count_all();
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
			$data['customer_shopping_list'] = $this->M_customer_shopping->get_all($config['per_page'], $page);
			$data['page_name'] = 'purchases';
			$data['pagination'] = $this->pagination->create_links();
			
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
		    $data['body'] = 'product-cart checkout-cart blog';
			$data['menu'] = "1";
			$data['menuLeft'] = "purchases";
				
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_orders/purchases',$data);
	}
	
	
	
	/*** Delete banner  Execute function ***/
		public function removePurches() {  
		try {
			$id = end($this->uri->segments);
			$this->M_customer_shopping->deleteListProductpurchases($id);
			$this->M_customer_shopping->deletethis($id);
			redirect('/orders/purchases');
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
		public function showPurches() {  
		try {
			$id = end($this->uri->segments);
			$data['customer_shopping'] = $this->M_customer_shopping->get_this($id);
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
		    $data['body'] = 'product-cart checkout-cart blog';
			$data['menu'] = "1";
			$data['menuLeft'] = "purchases";
			$data['customer_product_shopping_list'] = $this->M_customer_shopping->get_customer_product_shopping($id);

			$this->template->load('template','views_orders/ShowProductpurchases',$data);
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
		
		public function removeProductPurches() {  
		try {
			$id = end($this->uri->segments);
			$customer_shopping = $this->M_customer_shopping->get_this_purchases($id);
			$this->M_customer_shopping->deletethis_customer_shopping_products($id);
			redirect('/orders/showPurches/'.$customer_shopping->customer_shopping_id);
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
		
	
	
		
}
