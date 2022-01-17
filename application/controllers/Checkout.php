<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	/* Init tables home */
	
	public function index(){
		       if(!$this->cart->contents()){
						redirect('/');	
					}
					if(!$this->session->userdata('logged_in')){
				redirect('/accounts');	
				}	
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['menu'] = "checkout";
				$taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
				$data['taxe']= $taxe_value/100;
				$data['body'] ="product-checkout checkout-cart";
				$submitLogin = $this->input->post('submitLogin');
				$data['transporters'] = $this->M_transporters->get_all();
                $data['transporters_gratuit'] = $this->M_transporters->get_this(2); 
				$data['email_2']='';
				$data['customer_lastname'] = '';
				$data['customer_firstname'] = '';
				$data['customer_email'] = '';
				$data['customer_password'] = '';
				$data['customer_city'] = '';
				$data['customer_phone'] = '';
				$data['customer_address'] = '';
				$data['customer_country'] = '';
				$data['customer_zip'] = '';
				$data['info']="";
				 if(($this->session->userdata('logged_in'))) { 
				 $data['info']="info";
				 }
				 $message=[];
				 if($submitLogin ==1){
                        $this->form_validation->set_rules('customer_email', 'customer_email', 'trim|valid_email|required');
						$this->form_validation->set_rules('customer_password', 'customer_password', 'required'); 
				 	if($this->form_validation->run() == FALSE) {
							
								$message[] = 'Format email invalide';
								$data['messages']=$message;
								
						}else {
							$data['session_data']=$this->M_customers->checkthisaccount($this->input->post('customer_email'), $this->input->post('customer_password'));

							if($data['session_data']) {

					   $session_array = array(
										'customer_id'=>$data['session_data']->customer_id,
											'customer_lastname'=>$data['session_data']->customer_lastname,
											'customer_firstname'=>$data['session_data']->customer_firstname,
											'customer_email'=>$data['session_data']->customer_email,
											"customer_phone" =>$data['session_data']->customer_phone,
											"customer_address" => $data['session_data']->customer_address,
											"customer_zip" => $data['session_data']->customer_zip,
											"customer_city" => $data['session_data']->customer_city,
											"customer_country" => $data['session_data']->customer_country,
											"customer_delivery_lastname" => $data['session_data']->customer_delivery_lastname,
											"customer_delivery_firstname" => $data['session_data']->customer_delivery_firstname,
											"customer_delivery_phone" => $data['session_data']->customer_delivery_phone,
											"customer_delivery_address" => $data['session_data']->customer_delivery_address,
											"customer_delivery_zip" => $data['session_data']->customer_delivery_zip,
											"customer_delivery_city" => $data['session_data']->customer_delivery_city,
											"customer_delivery_country" => $data['session_data']->customer_delivery_country,
											'customer_infos'=>$data['session_data'],
											'logged_in'=>TRUE
											   );
							 $this->session->set_userdata($session_array);
							  redirect('/checkout');	
							
							} else {
								
								$message[] = 'Ce compte n\'existe pas';
								$data['messages']=$message;
								}
							
							
						}
				
				 }else if($submitLogin ==2){
						$data['customer_lastname'] = $this->input->post('customer_lastname');
						$data['customer_firstname'] = $this->input->post('customer_firstname');
						$data['customer_password_2'] = $this->input->post('customer_password');
						$data['customer_email_2'] = $this->input->post('customer_email');
						$data['customer_city'] = $this->input->post('customer_city');
						$data['customer_phone'] = $this->input->post('customer_phone');
						$data['customer_address'] = $this->input->post('customer_address');
						$data['customer_country'] = $this->input->post('customer_country');
						$data['customer_zip'] = $this->input->post('customer_zip');
						
					 $add_data=array(
						"customer_lastname" => $this->input->post('customer_lastname'),
						"customer_firstname" => $this->input->post('customer_firstname'),
						"customer_password" =>$this->input->post('customer_password'),
						"customer_email" => $this->input->post('customer_email'),
						"customer_phone" =>$this->input->post('customer_phone'),
						"customer_address" => $this->input->post('customer_address'),
						"customer_zip" => $this->input->post('customer_zip'),
						"customer_city" => $this->input->post('customer_city'),
						"customer_country" => $this->input->post('customer_country'),
						"customer_delivery_lastname" => $this->input->post('customer_lastname'),
				        "customer_delivery_firstname" => $this->input->post('customer_firstname'),
						"customer_delivery_phone" =>$this->input->post('customer_phone'),
						"customer_delivery_address" => $this->input->post('customer_address'),
						"customer_delivery_zip" => $this->input->post('customer_zip'),
						"customer_delivery_city" => $this->input->post('customer_city'),
						"customer_delivery_country" => $this->input->post('customer_country'),
						"customer_data_status" => 1,
						"customer_data_created" => date("Y-m-d H:i:s")
					);
					//	$this->form_validation->set_rules('customer_lastname', 'customer_lastname', 'required');
					//	$this->form_validation->set_rules('customer_firstname', 'customer_firstname', 'required');
						
						$this->form_validation->set_rules('customer_password', 'customer_password', 'required');
						$this->form_validation->set_rules('customer_email', 'Email', 'required');
						if($this->form_validation->run() == FALSE) {
							$data['regisitre']=1;
							$message[] = 'Vérifier vous information';
							$data['messages']=$message;
							} else {
							$this->M_customers->add_new_entry($add_data);
							$customer_id= $this->db->insert_id();
							$data['session_data'] = $this->M_customers->get_this($customer_id);
								$data['session_data'] = $this->M_customers->get_this($customer_id);
							$u_session = array(
							'customer_id'=>$customer_id,
							"customer_lastname" => $this->input->post('customer_lastname'),
							"customer_firstname" => $this->input->post('customer_firstname'),
							"customer_password" =>$this->input->post('customer_password'),
							"customer_email" => $this->input->post('customer_email'),
							"customer_phone" =>$this->input->post('customer_phone'),
							"customer_address" => $this->input->post('customer_address'),
							"customer_zip" => $this->input->post('customer_zip'),
							"customer_country" => $this->input->post('customer_country'),
							"customer_delivery_lastname" => $this->input->post('customer_lastname'),
							"customer_delivery_firstname" => $this->input->post('customer_firstname'),
							"customer_delivery_phone" =>$this->input->post('customer_phone'),
							"customer_delivery_address" => $this->input->post('customer_address'),
							"customer_delivery_zip" => $this->input->post('customer_zip'),
							"customer_delivery_city" => $this->input->post('customer_city'),
							"customer_delivery_country" => $this->input->post('customer_country'),
							'customer_infos'=>$data['session_data'],
							'logged_in'=>TRUE
							);
			
			               $this->session->set_userdata($u_session);
						   $this->send_email($add_data);
						   redirect('/checkout');	
							}
				 }         
				

				
	/***** END BLOCK TEMPLATE*****/
	
	 
	            $totalPoid=0;
				$data['trans'] = $this->M_transporters->get_this(1,null);
				$shopingPriceKg =$data['trans']->transporter_price_by_one;
				$shopingPrice =$data['trans']->transporter_price_not_france;
                $totalOptionPrice=0;
				$codeZips= array(91, 92, 75, 77, 93, 95, 94, 78);
				$codeZip=$this->session->userdata('customer_delivery_zip');
				$codeZip = substr($codeZip, 0, -3);
				if (in_array($codeZip, $codeZips)) {
				$shopingPrice =$data['trans']->transporter_price_in_france;
				}
	             $all_association=true;
				 
				foreach ($this->cart->contents() as $items){
					 $product = $this->M_products->get_this(intval($items['id']));
					if($product->product_entier_association){
						$totalPoid=$totalPoid+0;
							} else{
							$all_association=false;
							 $totalPoid=$totalPoid+($product->product_poids*$items['qty']);
							}
							
							if($items['options']['optionPrice']){
			                $totalOptionPrice = $totalOptionPrice+ $items['options']['optionPrice'];
			
		                    }
				}
				if($all_association){
						$data['trans'] = $this->M_transporters->get_this(2); 
					}
					$totalshopingPrices= $totalPoid*$shopingPriceKg+$shopingPrice;
					$data['totalshopingPrices'] =$totalshopingPrices;
					$data['totalPoid'] =$totalPoid;
					$data['totalOptionPrice'] =$totalOptionPrice;
		$this->template->load('template_carts','views_checkout/index',$data);
	}
	public function register(){
			if(!$this->cart->contents()){
			redirect('/');	
			}
			if(($this->session->userdata('logged_in'))) { 
			redirect('/Checkout');	
			}

			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['sub_categories_list'] = $this->M_categories->get_categories(true);
			$data['menu'] = "checkout";
			$taxe = $this->M_taxe->get_taxe();
			$taxe_value= $taxe->taxe_value;
			$data['taxe']= $taxe_value/100;
			$data['body'] ="product-checkout checkout-cart";
			$submitLogin = $this->input->post('submitLogin');
			  if($submitLogin==2){
				  
				  if($this->M_customers->check($this->input->post('customer_email'))) {
								$message = 'Ce compte existe déjà: '.$this->input->post('customer_email');
								$data['message']=$message;
							} else {
									$add_data=array(
										"customer_lastname" => $this->input->post('customer_lastname'),
										"customer_firstname" => $this->input->post('customer_firstname'),
										"customer_password" =>$this->input->post('customer_password'),
										"customer_email" => $this->input->post('customer_email'),
										"customer_phone" =>$this->input->post('customer_phone'),
										"customer_address" => $this->input->post('customer_address'),
										"customer_zip" => $this->input->post('customer_zip'),
										"customer_city" => $this->input->post('customer_city'),
										"customer_country" => $this->input->post('customer_country'),
										"customer_delivery_lastname" => $this->input->post('customer_lastname'),
										"customer_delivery_firstname" => $this->input->post('customer_firstname'),
										"customer_delivery_phone" =>$this->input->post('customer_phone'),
										"customer_delivery_address" => $this->input->post('customer_address'),
										"customer_delivery_zip" => $this->input->post('customer_zip'),
										"customer_delivery_city" => $this->input->post('customer_city'),
										"customer_delivery_country" => $this->input->post('customer_country'),
										"customer_data_status" => 1,
										"customer_data_created" => date("Y-m-d H:i:s")
										);
										$this->M_customers->add_new_entry($add_data);
										$customer_id= $this->db->insert_id();
										$data['session_data'] = $this->M_customers->get_this($customer_id);
										$u_session = array(
										'customer_id'=>$customer_id,
										"customer_lastname" => $this->input->post('customer_lastname'),
										"customer_firstname" => $this->input->post('customer_firstname'),
										"customer_password" =>$this->input->post('customer_password'),
										"customer_email" => $this->input->post('customer_email'),
										"customer_phone" =>$this->input->post('customer_phone'),
										"customer_address" => $this->input->post('customer_address'),
										"customer_zip" => $this->input->post('customer_zip'),
										"customer_country" => $this->input->post('customer_country'),
										"customer_delivery_lastname" => $this->input->post('customer_lastname'),
										"customer_delivery_firstname" => $this->input->post('customer_firstname'),
										"customer_delivery_phone" =>$this->input->post('customer_phone'),
										"customer_delivery_address" => $this->input->post('customer_address'),
										"customer_delivery_zip" => $this->input->post('customer_zip'),
										"customer_delivery_city" => $this->input->post('customer_city'),
										"customer_delivery_country" => $this->input->post('customer_country'),
										'customer_infos'=>$data['session_data'],
										'logged_in'=>TRUE
										);
                                        $this->send_email($add_data);
										$this->session->set_userdata($u_session);
										redirect('/checkout');
							  
							}
							  
							    }
									$this->template->load('template_carts','views_checkout/checkoutRegister',$data);
				  

	}	
	public function login(){
		
		if(!$this->cart->contents()){
		redirect('/');	
		}
		if(($this->session->userdata('logged_in'))) { 
		redirect('/Checkout');	
		}

		$data['setting'] = $this->M_settings->get_this();
		$data['sociaux'] = $this->M_sociaux->get_this(1);
		$data['categories_list'] = $this->M_categories->get_categories(false);
		$data['sub_categories_list'] = $this->M_categories->get_categories(true);
		$data['menu'] = "checkout";
		$taxe = $this->M_taxe->get_taxe();
		$taxe_value= $taxe->taxe_value;
		$data['taxe']= $taxe_value/100;
		$data['body'] ="product-checkout checkout-cart";
				
				$data['submitLogin']=1;
				$submitLogin = $this->input->post('submitLogin');
				 if($this->input->post('submitLogin')){
					 $submitLogin = $this->input->post('submitLogin');
				 }
					$message="";
				 if($submitLogin==1){
					   $this->form_validation->set_rules('customer_email', 'customer_email', 'trim|valid_email|required');
						$this->form_validation->set_rules('customer_password', 'customer_password', 'required'); 
				 	if($this->form_validation->run() == FALSE) {
							
							
								$data['message']='Format email invalide';
								
						} else {
							$data['session_data']=$this->M_customers->checkthisaccount($this->input->post('customer_email'), $this->input->post('customer_password'));
							 if($data['session_data']){
											   $session_array = array(
																    'customer_id'=>$data['session_data']->customer_id,
																	'customer_lastname'=>$data['session_data']->customer_lastname,
																	'customer_firstname'=>$data['session_data']->customer_firstname,
																	'customer_email'=>$data['session_data']->customer_email,
																	"customer_phone" =>$data['session_data']->customer_phone,
																	"customer_address" => $data['session_data']->customer_address,
																	"customer_zip" => $data['session_data']->customer_zip,
																	"customer_city" => $data['session_data']->customer_city,
																	"customer_country" => $data['session_data']->customer_country,
																	"customer_delivery_lastname" => $data['session_data']->customer_delivery_lastname,
																	"customer_delivery_firstname" => $data['session_data']->customer_delivery_firstname,
																	"customer_delivery_phone" => $data['session_data']->customer_delivery_phone,
																	"customer_delivery_address" => $data['session_data']->customer_delivery_address,
																	"customer_delivery_zip" => $data['session_data']->customer_delivery_zip,
																	"customer_delivery_city" => $data['session_data']->customer_delivery_city,
																	"customer_delivery_country" => $data['session_data']->customer_delivery_country,
																	'customer_infos'=>$data['session_data'],
																	'logged_in'=>TRUE
																	   );
													 $this->session->set_userdata($session_array);
													  redirect('/checkout');
                                } else {
								
								$message = 'Ce compte n\'existe pas';
								$data['message']=$message;
								}													  
													
							}
				  }
				  
				 	$this->template->load('template_carts','views_checkout/checkoutLogin',$data);
				  
				  
	}
			public function login1(){
		       if(!$this->cart->contents()){
						redirect('/');	
					}
					 if(($this->session->userdata('logged_in'))) { 
				    redirect('/Checkout');	
				 }
				
				
				$data['submitLogin']=1;
				if($this->input->post('submitLogin')){
					
					$submitLogin = $this->input->post('submitLogin');
				}
				$data['customer_email']="";
				$data['customer_password']= "";				
				$message="";
				 if($submitLogin==1){
					   $this->form_validation->set_rules('customer_email', 'customer_email', 'trim|valid_email|required');
						$this->form_validation->set_rules('customer_password', 'customer_password', 'required'); 
				 	if($this->form_validation->run() == FALSE) {
							
							
								$data['message']='Format email invalide';
								
						} else {
							$data['session_data']=$this->M_customers->checkthisaccount($this->input->post('customer_email'), $this->input->post('customer_password'));
							if($data['session_data']) {

											   $session_array = array(
																    'customer_id'=>$data['session_data']->customer_id,
																	'customer_lastname'=>$data['session_data']->customer_lastname,
																	'customer_firstname'=>$data['session_data']->customer_firstname,
																	'customer_email'=>$data['session_data']->customer_email,
																	"customer_phone" =>$data['session_data']->customer_phone,
																	"customer_address" => $data['session_data']->customer_address,
																	"customer_zip" => $data['session_data']->customer_zip,
																	"customer_city" => $data['session_data']->customer_city,
																	"customer_country" => $data['session_data']->customer_country,
																	"customer_delivery_lastname" => $data['session_data']->customer_delivery_lastname,
																	"customer_delivery_firstname" => $data['session_data']->customer_delivery_firstname,
																	"customer_delivery_phone" => $data['session_data']->customer_delivery_phone,
																	"customer_delivery_address" => $data['session_data']->customer_delivery_address,
																	"customer_delivery_zip" => $data['session_data']->customer_delivery_zip,
																	"customer_delivery_city" => $data['session_data']->customer_delivery_city,
																	"customer_delivery_country" => $data['session_data']->customer_delivery_country,
																	'customer_infos'=>$data['session_data'],
																	'logged_in'=>TRUE
																	   );
													 $this->session->set_userdata($session_array);
													  redirect('/checkout');	
													} else {
														$data['submitLogin']=2;
														$data['customer_email']=$this->input->post('customer_email');
														$data['customer_password']= $this->input->post('customer_password');
														$this->template->load('template_carts','views_checkout/checkoutLogin',$data);
													}
							}
				  } else if($submitLogin==2){
					 		$add_data=array(
										"customer_lastname" => $this->input->post('customer_lastname'),
										"customer_firstname" => $this->input->post('customer_firstname'),
										"customer_password" =>$this->input->post('customer_password'),
										"customer_email" => $this->input->post('customer_email'),
										"customer_phone" =>$this->input->post('customer_phone'),
										"customer_address" => $this->input->post('customer_address'),
										"customer_zip" => $this->input->post('customer_zip'),
										"customer_city" => $this->input->post('customer_city'),
										"customer_country" => $this->input->post('customer_country'),
										"customer_delivery_lastname" => $this->input->post('customer_lastname'),
										"customer_delivery_firstname" => $this->input->post('customer_firstname'),
										"customer_delivery_phone" =>$this->input->post('customer_phone'),
										"customer_delivery_address" => $this->input->post('customer_address'),
										"customer_delivery_zip" => $this->input->post('customer_zip'),
										"customer_delivery_city" => $this->input->post('customer_city'),
										"customer_delivery_country" => $this->input->post('customer_country'),
										"customer_data_status" => 1,
										"customer_data_created" => date("Y-m-d H:i:s")
										);
										$this->M_customers->add_new_entry($add_data);
										$customer_id= $this->db->insert_id();
										$data['session_data'] = $this->M_customers->get_this($customer_id);
										$u_session = array(
										'customer_id'=>$customer_id,
										"customer_lastname" => $this->input->post('customer_lastname'),
										"customer_firstname" => $this->input->post('customer_firstname'),
										"customer_password" =>$this->input->post('customer_password'),
										"customer_email" => $this->input->post('customer_email'),
										"customer_phone" =>$this->input->post('customer_phone'),
										"customer_address" => $this->input->post('customer_address'),
										"customer_zip" => $this->input->post('customer_zip'),
										"customer_country" => $this->input->post('customer_country'),
										"customer_delivery_lastname" => $this->input->post('customer_lastname'),
										"customer_delivery_firstname" => $this->input->post('customer_firstname'),
										"customer_delivery_phone" =>$this->input->post('customer_phone'),
										"customer_delivery_address" => $this->input->post('customer_address'),
										"customer_delivery_zip" => $this->input->post('customer_zip'),
										"customer_delivery_city" => $this->input->post('customer_city'),
										"customer_delivery_country" => $this->input->post('customer_country'),
										'customer_infos'=>$data['session_data'],
										'logged_in'=>TRUE
										);
                                        $this->send_email($add_data);
										$this->session->set_userdata($u_session);
										redirect('/checkout');
					 
				 }
				 /*if($this->input->post('customer_email')){
				
				 
				
                        $this->form_validation->set_rules('customer_email', 'customer_email', 'trim|valid_email|required');
						$this->form_validation->set_rules('customer_password', 'customer_password', 'required'); 
				 	if($this->form_validation->run() == FALSE) {
							
							
								$data['message']='Format email invalide';
								
						} else {
							$data['session_data']=$this->M_customers->checkthisaccount($this->input->post('customer_email'), $this->input->post('customer_password'));

							if($data['session_data']) {

					   $session_array = array(
										'customer_id'=>$data['session_data']->customer_id,
											'customer_lastname'=>$data['session_data']->customer_lastname,
											'customer_firstname'=>$data['session_data']->customer_firstname,
											'customer_email'=>$data['session_data']->customer_email,
											"customer_phone" =>$data['session_data']->customer_phone,
											"customer_address" => $data['session_data']->customer_address,
											"customer_zip" => $data['session_data']->customer_zip,
											"customer_city" => $data['session_data']->customer_city,
											"customer_country" => $data['session_data']->customer_country,
											"customer_delivery_lastname" => $data['session_data']->customer_delivery_lastname,
											"customer_delivery_firstname" => $data['session_data']->customer_delivery_firstname,
											"customer_delivery_phone" => $data['session_data']->customer_delivery_phone,
											"customer_delivery_address" => $data['session_data']->customer_delivery_address,
											"customer_delivery_zip" => $data['session_data']->customer_delivery_zip,
											"customer_delivery_city" => $data['session_data']->customer_delivery_city,
											"customer_delivery_country" => $data['session_data']->customer_delivery_country,
											'customer_infos'=>$data['session_data'],
											'logged_in'=>TRUE
											   );
							 $this->session->set_userdata($session_array);
							  redirect('/checkout');	
							} else {
								$data['check_email']=$this->M_customers->check($this->input->post('customer_email'));
								if($data['check_email']) { 
								
									$data['message']="Le compte existe déjà Vérifiez votre mot de passe ";
									$data['etap']=2;
									$this->template->load('template_carts','views_checkout/checkoutLogin',$data);
								} else {
										$add_data=array(
										"customer_lastname" => $this->input->post('customer_lastname'),
										"customer_firstname" => $this->input->post('customer_firstname'),
										"customer_password" =>$this->input->post('customer_password'),
										"customer_email" => $this->input->post('customer_email'),
										"customer_phone" =>$this->input->post('customer_phone'),
										"customer_address" => $this->input->post('customer_address'),
										"customer_zip" => $this->input->post('customer_zip'),
										"customer_city" => $this->input->post('customer_city'),
										"customer_country" => $this->input->post('customer_country'),
										"customer_delivery_lastname" => $this->input->post('customer_lastname'),
										"customer_delivery_firstname" => $this->input->post('customer_firstname'),
										"customer_delivery_phone" =>$this->input->post('customer_phone'),
										"customer_delivery_address" => $this->input->post('customer_address'),
										"customer_delivery_zip" => $this->input->post('customer_zip'),
										"customer_delivery_city" => $this->input->post('customer_city'),
										"customer_delivery_country" => $this->input->post('customer_country'),
										"customer_data_status" => 1,
										"customer_data_created" => date("Y-m-d H:i:s")
										);
										$this->M_customers->add_new_entry($add_data);
										$customer_id= $this->db->insert_id();
										$data['session_data'] = $this->M_customers->get_this($customer_id);
										$u_session = array(
										'customer_id'=>$customer_id,
										"customer_lastname" => $this->input->post('customer_lastname'),
										"customer_firstname" => $this->input->post('customer_firstname'),
										"customer_password" =>$this->input->post('customer_password'),
										"customer_email" => $this->input->post('customer_email'),
										"customer_phone" =>$this->input->post('customer_phone'),
										"customer_address" => $this->input->post('customer_address'),
										"customer_zip" => $this->input->post('customer_zip'),
										"customer_country" => $this->input->post('customer_country'),
										"customer_delivery_lastname" => $this->input->post('customer_lastname'),
										"customer_delivery_firstname" => $this->input->post('customer_firstname'),
										"customer_delivery_phone" =>$this->input->post('customer_phone'),
										"customer_delivery_address" => $this->input->post('customer_address'),
										"customer_delivery_zip" => $this->input->post('customer_zip'),
										"customer_delivery_city" => $this->input->post('customer_city'),
										"customer_delivery_country" => $this->input->post('customer_country'),
										'customer_infos'=>$data['session_data'],
										'logged_in'=>TRUE
										);

										$this->session->set_userdata($u_session);
										redirect('/checkout');	
										$data['message']=$message;
								  }	
								
								}
							
							
						}
				  }*/
				        
				

				
	/***** END BLOCK TEMPLATE*****/
	
		$this->template->load('template_carts','views_checkout/checkoutLogin',$data);
	}
public function getShopingPrice() { 
		
		try {
			$us=0;
			    $taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
				$taxe= $taxe_value/100;
				$codeZip=$this->input->post('codeZipe');

				$totalCart=0;
				$totalPoid=0;
				$transporter = $this->M_transporters->get_this(1,null);
				$shopingPriceKg =$transporter->transporter_price_by_one;
				$shopingPrice =$transporter->transporter_price_not_france;
                $codeZip = substr($codeZip, 0, -3);
				$codeZips= array(91, 92, 75, 77, 93, 95, 94, 78);
				if (in_array($codeZip, $codeZips)) {
				$shopingPrice =$transporter->transporter_price_in_france;
				}

				foreach($this->cart->contents() as $rowid => $item) {
						$product = $this->M_products->get_this(intVal($item['id']));
						$totalCart=$totalCart+($item['price']*$item['qty']);
						if($product->product_entier_association){
                          $totalPoid=$totalPoid+0;
						}
						else 
						{
                          $totalPoid=$totalPoid+($product->product_poids*$item['qty']);
						}
						
				}
				$totalshopingPrices= $totalPoid*$shopingPriceKg+$shopingPrice;
				$total=	$totalCart+$totalshopingPrices;
				
				$taxe = $this->M_taxe->get_taxe();
				
				$tvaShopping = number_format(($totalshopingPrices/100)*$taxe->taxe_value, 2, '.', ''); 
				$htShopping = number_format($totalshopingPrices-$tvaShopping, 2, '.', ''); 
				$totalshopingPrices = number_format($totalshopingPrices, 2, '.', ''); 
				$total = number_format($total, 2, '.', ''); 
				if($totalPoid==0){
					$totalshopingPrices=0;
					$htShopping='';
					$tvaShopping='';
				}
			echo json_encode(array('result'=>1,'total'=>$total,'totalCart'=>$totalCart,'tvaShopping'=>$tvaShopping,'htShopping'=>$htShopping,'totalshopingPrices'=>$totalshopingPrices,'shopingPrice'=>$shopingPrice));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
	
	
		public function send_email($data){
		 
	 	 $this->load->library('email');
		
		  $config=array(
			  'charset'=>'utf-8',
			  'wordwrap'=> TRUE,
			  'mailtype' => 'html'
			 ); 
		  
		
		  $no_email = $this->load->view('views_emails/signup_email_template/index',$data,true);
		  $this->email->initialize($config);
		  $this->email->from('contact@go-ferme-halal.com','GO-FERME-HALAL');
		  $this->email->to($data['customer_email']);
		  $this->email->subject('GO-FERME-HALAL.COM Inscription - Votre compte est activé');
		  $this->email->message($no_email);
		 
		   if(! $this->email->send()){
			  return false;
		   }
		   else{
			return true;
		   }
	 }
	
	
}

