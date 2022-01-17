<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Accounts extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste  users */
				public function index(){
		
		
		try {
			  
				$data['setting'] = $this->M_settings->get_this();
				$data['callback'] = $this->input->get('callback');
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['body'] = 'product-cart checkout-cart blog';
                $submitLogin = $this->input->post('submitLogin');
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
				 $data['regisitre']="";
				 $message=[];
				 if($submitLogin ==1){
					  $data['email_1']=$this->input->post('customer_email');
                     $data['callback'] = $this->input->post('callback');
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
                             if($data['callback']=="cart"){
                                 redirect('/cart');
                             }else{
                                 redirect('/');
                             }

							
							} else {
								
								$message[] = 'Ce compte n\'existe pas';
								$data['messages']=$message;
								}
							
							
						}
				 } else if($submitLogin ==2){
					 $data['email_2']=$this->input->post('customer_email');
                     $data['callback']=$this->input->post('callback');
					  $this->form_validation->set_rules('customer_email', 'Email', 'required');
					 	if($this->form_validation->run() == FALSE) {
							
								$message[] = 'Format email invalide';
								$data['messages']=$message;
								
						}else {
							if($this->M_customers->check($this->input->post('customer_email'))) {
								$message[] = 'Ce compte existe déjà: '.$this->input->post('customer_email');
								$data['messages']=$message;
							} else {
								$data['regisitre']=1;
								}
						}
				 }else if($submitLogin ==3){
                        $data['callback']=$this->input->post('callback');
						$data['customer_lastname'] = $this->input->post('customer_lastname');
						$data['customer_firstname'] = $this->input->post('customer_firstname');
						$data['email_2'] = $this->input->post('customer_email');
						$data['customer_password'] = $this->input->post('customer_password');
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
						$this->form_validation->set_rules('customer_lastname', 'customer_lastname', 'required');
						$this->form_validation->set_rules('customer_firstname', 'customer_firstname', 'required');
						$this->form_validation->set_rules('customer_email', 'Email', 'required');
						$this->form_validation->set_rules('customer_phone', 'customer_phone', 'required');
						$this->form_validation->set_rules('customer_address', 'customer_address', 'required');
						$this->form_validation->set_rules('customer_zip', 'customer_zip', 'required');
						$this->form_validation->set_rules('customer_city', 'customer_city', 'required');
						$this->form_validation->set_rules('customer_country', 'customer_country', 'required');
						if($this->form_validation->run() == FALSE) {
							$data['regisitre']=1;
							$message[] = 'Vérifier vous information';
							$data['messages']=$message;
							} else {
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
                             $this->send_email($add_data);
                            if($data['callback']=="cart"){
                                redirect('/cart');
                            }else{
                                redirect('/');
                            }
							}
				 }         
				

		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_accounts/index',$data);
	}
		/*** Add  users interface function ***/
		
		public function system_logout() {
			try {
				$this->session->set_userdata('logged_in', FALSE);
				$this->session->unset_userdata($u_session);
				$this->session->sess_destroy();
				redirect('/','refresh');
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
?>