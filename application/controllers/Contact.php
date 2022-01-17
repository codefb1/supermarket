<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

 public function __construct()
    {
       parent::__construct();
    	 
    }   
			/*** Default controller function ***/
			public function index()
			{     
			    $data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
			    $data['banniers'] = $this->M_banners->get_bannier_emplacement(9);
				$data['metal'] = "";
				
                if($this->input->post('contact_email')) {


                    
                    $add_data=array(
                        "contact_lastname" => $this->input->post('contact_lastname'),
                        "contact_message" =>$this->input->post('contact_message'),
                        "contact_email" => $this->input->post('contact_email'),
						 "contact_subject" => $this->input->post('contact_subject'),
                         "contact_created" => date("Y-m-d H:i:s")
                    );
                  $this->M_contacts->add_new_entry($add_data);
                  
                            $this->load->library('email');
                            $Email_data['contact_email']=$this->input->post('contact_email');
                            $Email_data['contact_lastname']=$this->input->post('contact_lastname');
                            $Email_data['contact_subject']=$this->input->post('contact_subject');
                            $Email_data['message']=$this->input->post('contact_message');

                            $config=array(
                                'charset'=>'utf-8',
                                'wordwrap'=> TRUE,
                                'mailtype' => 'html'
                            );
                            $client = $Email_data['contact_lastname'] ;
                            $this->email->initialize($config);
                            $this->email->from('De la part de :'.$client);
                            $this->email->to('contact@go-ferme-halal.com');
                            //$this->email->to("elfartoun@gmail.com");
                            $this->email->subject("Demande de contact" );
                            $devis_email = $this->load->view('views_emails/contact_email_template/index',$Email_data,true);

                            $this->email->message($devis_email);
                            $send= $this->email->send();
                            echo json_encode(array('result'=>1));
                       
                        }else {
							 $this->template->load('template-home','views_contacts/index',$data);
						}
        
			}
 

}
?>