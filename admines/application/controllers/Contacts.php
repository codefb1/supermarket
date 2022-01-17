<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Contacts extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "contacts/index";
				$config['total_rows'] = $this->M_contacts->count_all();
				$config['per_page'] = 20;
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
				$data['contacts_list'] = $this->M_contacts->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_contacts/index',$data);
	}
		/*** Add Banner interface function ***/

			public function edit()
		{
			
			    $data['process_status'] = 0;
				$data['contact'] = $this->M_contacts->get_this(end($this->uri->segments));
				//$update_data=array("contact_vu" => 1);
               // $this->M_contacts->update_this(end($this->uri->segments), $update_data);
					
		$this->template->load('template','views_contacts/edit',$data);
			
		
	
			
		} 

		
				public function coordonne(){
		
		
		try {
			
				
			
				$data['settings'] = $this->M_settings->get_this(1);

				if($this->input->post('setting_id') > 0) {
					
						$update_data=array(
										"block_contact" => $this->input->post('block_contact'),
										"page_contact" => $this->input->post('page_contact'),
										"google_map" => $this->input->post('google_map'),
										
										);
				

		
	
							
			
								
								$update_process = $this->M_settings->update_this(1, $update_data);
								
								if($update_process  == true ) {
									
									 $data['process_status'] = 1;
									 redirect(base_url().'contacts/coordonne/'.$data['process_status'].'/'.$this->input->post('setting_id'), 'refresh');
								}
								
								else if($update_process == false ) {
								
									 $data['process_status'] = 2;
									 redirect(base_url().'contacts/coordonne/'.$data['process_status'].'/'.$this->input->post('setting_id'), 'refresh');
								}
							
					}
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_contacts/coordonne',$data);
	}
	
		
			public function contacttop() { 
		
		try {
			$data['contact_total'] = $this->M_contacts->get_contact_vu_total();
			$data['contact'] = $this->M_contacts->get_all_contact_vu();
			
			    $contact=''; 
	            $nbr_contact=$data['contact_total']->nbr_contact;
				$contact .='<div class="notify-arrow notify-arrow-red"></div>
				      <li> <p class="red">vous avez '.$nbr_contact.' messages</p>
                       </li>';
         foreach ($data['contact'] as $contacts) {
           
             $contact .='   <li>
                                <a href="'.base_url().'contacts/edit/0/'.$contacts->contact_id.'">
                                    <span class="photo"></span>
                                    <span class="subject">
                                    <span class="from">'.$contacts->contact_lastname.' '.$contacts->contact_firstname.'</span>
                                    </span>
                                    <span class="message">
									'.date_fr($contacts->contact_created).'
                                    </span>
                                </a>
                            </li>';
             
       
         }
		 
		  $contact .='<li><a href="'.base_url().'contacts/'.'">Voir tous les messages</a></li>';
			 echo json_encode(array('result'=>0,'nbr_contact'=>$data['contact_total']->nbr_contact,'contact'=>$contact));
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
		
			/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('contact_id');
			if(is_numeric($data_id)){
				if($this->M_contacts->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/contacts/index/'.$data_id);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
		
	}
?>