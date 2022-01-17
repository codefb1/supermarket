<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Mails extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		
		public function add()
		{
			
			if($this->input->post('type')=="formation"){
											$data['customers_formation'] = $this->M_customers_formations->get_this($this->input->post('id'));
											$data['customer'] = $this->M_customers->get_this($data['customers_formation']->customer_id);
											$add_data=array(        


											"customer_formation_id" => $this->input->post('id'),
											"sujet" => $this->input->post('sujet'),
											"message" => $this->input->post('messages'),
											"email_data_created" => date("Y-m-d H:i:s")
											);
										$send_data=array(        
			                           "is_send" => 1
										);
											$update_process = $this->M_customers_formations->update_this($this->input->post('id'), $send_data);
						    $data['setting'] = $this->M_settings->get_this(1);
							$this->load->library('email');
                            $Email_data['email']=$data['customer']->customer_email;
                            $Email_data['firstname']=$data['customer']->customer_firstname;
                            $Email_data['lastname']=$data['customer']->customer_firstname;
                            $Email_data['lastname']=$this->input->post('messages');
                          
                            $config=array(
                                'charset'=>'utf-8',
                                'wordwrap'=> TRUE,
                                'mailtype' => 'html'
                            );
                            $this->email->initialize($config);
                            $this->email->from($data['setting']->email);
                            $this->email->to($data['customer']->customer_email);
                           
                            $this->email->subject($this->input->post('sujet'));
                            $email_etudiant = $this->load->view('views_emails/send_email',$Email_data,true);

                            $this->email->message($email_etudiant);
                            $send= $this->email->send();
							
							
										}
										
											if($this->input->post('type')=="ecole"){
													$add_data=array(        
			   
			  
			                           "ecole_inscription_id" => $this->input->post('id'),
					                   "sujet" => $this->input->post('sujet'),
									   "message" => $this->input->post('messages'),
										"email_data_created" => date("Y-m-d H:i:s")
										);
											$data['ecoles_inscriptions'] = $this->M_ecoles_inscriptions->get_this($this->input->post('id'));
			
										$send_data=array(        
			                           "is_send" => 1
										);
											$update_process = $this->M_ecoles_inscriptions->update_this($this->input->post('id'), $send_data);
					
										$data['setting'] = $this->M_settings->get_this(1);
							$this->load->library('email');
                            $Email_data['email']=$data['ecoles_inscriptions']->ecole_inscription_email;
                            $Email_data['firstname']=$data['ecoles_inscriptions']->ecole_inscription_firstname;
                            $Email_data['lastname']=$data['ecoles_inscriptions']->ecole_inscription_firstname;
                            $Email_data['messages']=$this->input->post('messages');
                          
                            $config=array(
                                'charset'=>'utf-8',
                                'wordwrap'=> TRUE,
                                'mailtype' => 'html'
                            );
                            $this->email->initialize($config);
                            $this->email->from($data['setting']->email);
                            $this->email->to($data['ecoles_inscriptions']->ecole_inscription_email);
                           
                            $this->email->subject($this->input->post('sujet'));
                            $email_etudiant = $this->load->view('views_emails/send_email',$Email_data,true);

                            $this->email->message($email_etudiant);
                            $send= $this->email->send();
										
										}
		
										
										
									
										$this->M_mails->add_new_entry($add_data);
			
				echo json_encode(array('result'=>1));
		
		}
		
	}
	
	
	
?>