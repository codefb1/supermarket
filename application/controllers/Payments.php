<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends CI_Controller {

				  public function payment_return()
	{		
			
		try{
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['menu'] = "detail_page";
				$data['body'] = 'product-cart checkout-cart blog';
			
				
				$this->template->load('template_carts','views_payements/index',$data);
			}catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);
		}
	}	
				public function refuse(){

				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['menu'] = "cart";
				$data['body'] = "product-cart checkout-cart blog";
				$taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
				$data['taxe']= $taxe_value/100;
				$data['products'] =$this->M_products->get_products();


				/***** END BLOCK TEMPLATE*****/

				$this->template->load('template_carts','views_payements/refuse',$data);
				}
					public function accepte(){

				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['menu'] = "cart";
				$data['body'] = "product-cart checkout-cart blog";
				if(!$this->cart->contents()){
						redirect('/');	
					}
					
					$shopping_address = $this->input->post('shopping_address');
					$order_shipping_email	 = $this->session->userdata('customer_email');
					$order_shipping_lastname = $this->input->post('order_shipping_lastname');
					$order_shipping_firstname	 = $this->input->post('order_shipping_firstname');
					$order_shipping_city = $this->input->post('order_shipping_city');
					$order_shipping_phone = $this->input->post('order_shipping_phone');
					$order_shipping_street = $this->input->post('order_shipping_street');
					$order_shipping_country = $this->input->post('order_shipping_country');
					$order_shipping_zip = $this->input->post('order_shipping_zip');
					$order_shipping_zip_save = $this->input->post('order_shipping_zip');
					$order_billing_lastname = $this->input->post('order_billing_lastname');
					$order_billing_firstname = $this->input->post('order_billing_firstname');
					$order_billing_city = $this->input->post('order_billing_city');
					$order_billing_phone = $this->input->post('order_billing_phone');
					$order_billing_street = $this->input->post('order_billing_street');
					$order_billing_country = $this->input->post('order_billing_country');
					$order_billing_zip = $this->input->post('order_billing_zip');
					$order_billing_email = $this->session->userdata('customer_email');
					
					
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
						       $totalPoid=($product->product_poids*$items['qty']);
							
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
							"order_payment_status"=> 3,/* Paiement en attente 1**/ 
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
						$update_process = $this->M_customers->update_this($this->session->userdata('customer_id'), $update_customers_data);*/
                  $data['ordersId'] = $ordersId;
				/***** END BLOCK TEMPLATE*****/
					$data['orders']= $this->M_orders->get_this($ordersId);
					$data['customer']= $this->M_customers->get_this($data['orders']->customer_id);
					$data['orders_details']= $this->M_orders->get_orders_detail($data['orders']->order_id);
					$this->load->library('email');

					$config=array(
					'charset'=>'utf-8',
					'wordwrap'=> TRUE,
					'mailtype' => 'html'
					); 


					$no_email = $this->load->view('views_emails/commande_email_template/email_new_order',$data,true);
					$this->email->initialize($config);
					$this->email->from('contact@go-ferme-halal.com','GO-FERME-HALAL');
					$this->email->to($data['customer']->customer_email);
					$this->email->subject('GO-FERME-HALAL.COM - Nouvelle commande');
					$this->email->message($no_email);
					$this->email->send();
				$this->template->load('template_carts','views_payements/accepte',$data);
				}
				

	 		  public function accept_payments()
	{		
			
		try{
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['menu'] = "detail_page";
				$data['body'] = 'product-cart checkout-cart blog';
				/*foreach($_POST as $k=>$v) {}*/
				var_dump($_POST);exit;
					$order_id= $_POST['vads_order_id'];
					$order=$this->M_orders->get_this_orders($order_id);
					if($order && $order->order_payment_status!=3){
						$update_entries=array('order_payment_status'=>3,'order_payment_info'=>json_encode($_POST));
				$this->M_orders->update_this($order_id,$update_entries);
					}
				
				$this->template->load('template_carts','views_payements/index',$data);
			}catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);
		}
	}
	
	  public function ipn_payments()
	{	
	$order_id= 57;
	$json = file_get_contents('php://input');
	$update_entries=array('order_payment_status'=>1,'order_payment_info'=>$json);
				$this->M_orders->update_this($order_id,$update_entries);
	}
	  
		  public function cancel_ogone()
	{		
		try{
	
			
			
			$data['page_name']='payments';
			$received_data = intval($_GET['orderID']);
			 if (!$received_data)
				{
			    	redirect('/');	
				}
            $update_entries=array('order_payment_status'=>1);
		    $this->M_orders->update_this($update_entries,$received_data);
			$data['order']=$this->M_orders->get_this($received_data);
			$data['customer']=$this->M_customers->get_this($data['order']->customer_id);	
			
		    $session_array = array(
									'customer_id'=>$data['customer']->customer_id,
									"customer_civility" =>$data['customer']->customer_civility,
									"customer_firstname" =>$data['customer']->customer_firstname,
									"customer_lastname" =>$data['customer']->customer_lastname,	
									"customer_base64_id" =>$data['customer']->customer_base64_id,
									"customer_adress" =>$data['customer']->customer_adress,
									"customer_adress_sup" =>$data['customer']->customer_adress_sup,								
									"sbo_country_id" =>$data['customer']->sbo_country_id,
									"customer_civil_status" =>$data['customer']->customer_civil_status,
									"customer_town" =>$data['customer']->customer_town,
									"customer_phone_number" =>$data['customer']->customer_phone_number,
									"customer_birth_town" =>$data['customer']->customer_birth_town,
									"customer_birth_country" =>$data['customer']->customer_birth_country,
									"customer_email" =>$data['customer']->customer_email,
									"customer_birth_day" => $data['customer']->customer_birth_day,
									"customer_birth_moth" => $data['customer']->customer_birth_moth,
									"customer_birth_year" => $data['customer']->customer_birth_year,			
									'customer_infos'=>$data['customer'],
									'order_id'=> $data['order']->order_id,
									'order_amount'=> $data['order']->order_amount,
									'logged_in'=>TRUE
									);	
		$this->session->set_userdata($session_array);
		$this->template->load('template','views_payements/cancel_payment_ogone',$data);

		}catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);
		}
	}
	

	 	  public function accept_gone()

  {
	  try{
            $pay_status= $_GET['STATUS'];
			$pay_id=$_GET['PAYID']; 
			$pay_types=$_GET['BRAND']; 
			$pay_ipaddress=$_GET['IP'];
			$pay_CARDNO=$_GET['CARDNO'];
			$paytype =$_GET['PM'];
			$amount=$_GET['amount'];
			$reference = intval($_GET['orderID']);
			$data['order']=$this->M_orders->get_this_orders($reference);
			
			$data['customer']=$this->M_customers->get_this($data['order']->customer_id);
       
			$data['page_name']='payments';
			$this->template->load('template','views_payements/accept_payment_ogone',$data);
		}catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
	    }
	 }
		 } 
	

	   