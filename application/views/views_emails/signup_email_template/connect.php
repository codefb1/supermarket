<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connect extends CI_Controller {
	/* Init tables home */
	public $brands_table='umb_brands';
	public $products_types='umb_products_types';
	public $rubriques_table='umb_rubriques';
  	public $rubriques_2lngs_table='umb_rubriques_2lngs';
	public $categories_table='umb_categories';
	public $categories_2lngs_table='umb_categories_2lngs';
	public $users_table='umb_customers';
    public $customers_adresse_table= 'umb_customers_adresse';
	 /*** Init Tables Fields ***/
 
 	 public $customer_id='customer_id';
	 public $rubrique_id='rubrique_id';
	 public $rubrique_reference='rubrique_reference';
	 public $category_id='category_id';
	 public $category_reference='category_reference';
	 public $language_id='language_id';
	 public $umb_language_id='umb_language_id';
	 public $umb_rubrique_id='umb_rubrique_id';
	 public $umb_category_id='umb_category_id';
	 public $data_sort_order='data_sort_order';
	 public $data_focus='data_focus';
	 public $data_status='data_status';
	 public $category_parent='category_parent';
	 public $user_email='customer_email';
	 public $user_password='customer_password';
	 
	 /*** Init Tables common Fields ***/
	
	public function index(){
		/***** BEGIN BLOCK TEMPLATE*****/	
		$data['right_slide_show']=false;
		$data['slide_show']=true;

   	/*	menus*/
		$data['brands_list']=$this->m_common->getall_active_brand($this->brands_table);
		$data['products_types_list']=$this->m_common->getall_active_type($this->products_types);

		$data['menus_rubrique'] = $this->m_rubriques->get_rubriques();
		$data['menus_client'] = $this->m_categories->getcategorybyrub();
		$data['category'] = $this->m_categories->getallcategorybyrub();
		$data['sub_category'] = $this->m_categories->getsub_categorybycateg();
		$data['sub_sub_category'] = $this->m_categories->getsub_sub_categorybycateg();
		$data['sub_sub_sub_category'] = $this->m_categories->getsub_sub_sub_category();
			/*	fin menus*/
	/***** END BLOCK TEMPLATE*****/
		$this->template->load('template','views_connect/index',$data);
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
		  $this->email->from('contact@enerlisonline.com','Enerlisonline');
		  $this->email->to($data['customer_email']);
		  $this->email->subject('ENERLISONLINE.COM Inscription - Votre compte est activé');
		  $this->email->message($no_email);
		 
		   if(! $this->email->send()){
			  return false;
		   }
		   else{
			return true;
		   }
	 }
	 /*** Add Execute function ***/
 public function adduserprocess() {
	
  $new_entry=array(
			'customer_lastname'=>strip_tags(strtoupper($this->input->post('D'))),
			'customer_firstname'=>strip_tags(ucfirst($this->input->post('C'))),
			'customer_company'=>$this->input->post('F'),
			'customer_service'=>$this->input->post('I'),
			'customer_phone_number'=>$this->input->post('H'),
			'customer_email'=>$this->input->post('E'),
			'customer_password'=>$this->input->post('G'),
			'customer_type'=>$this->input->post('T'),
			'data_created'=>date("Y-m-d H:i:s"),
			'data_updated'=>date("Y-m-d H:i:s"),
			'data_status'=>1
			);
		
		  if($this->m_common->getthis($this->users_table,$this->user_email,$this->input->post('E'))==false && $this->m_common->add_entry($this->users_table,$new_entry)==true && $this->send_email($new_entry)) {
		  
		   $u_session = array(
							'customer_id'=>$this->db->insert_id(),
							'customer_lastname'=>strip_tags(strtoupper($this->input->post('D'))),
							'customer_firstname'=>strip_tags(ucfirst($this->input->post('C'))),
							'customer_company'=>$this->input->post('F'),
							'customer_email'=>$this->input->post('E'),
							'customer_status'=>1,
							'customer_password'=>$this->input->post('G'),
							'customer_service'=>$this->input->post('I'),
		                	'customer_phone_number'=>$this->input->post('H'),
							'customer_type'=>$this->input->post('T'),
							'account_infos'=>$data['session_data'],
							'logged_in'=>TRUE
							);
			
			$this->session->set_userdata($u_session);
		    echo json_encode(array('result'=>1,'redirect' =>'home/'));
		  }
		  else {
		   echo json_encode(array('result'=>0));
		  }
		  
 }
 
	
	 /* Check Account Authentification */
	public function checkaccount() {
		 
	if($data['session_data']=$this->m_authentification->check_account($this->users_table,$this->user_email,$this->user_password,strip_tags($this->input->post('A')),$this->input->post('B'))){
			
					$u_session = array(
						   'customer_id'=>$data['session_data']->customer_id,
							'customer_lastname'=>$data['session_data']->customer_lastname,
							'customer_firstname'=>$data['session_data']->customer_firstname,
							'customer_company'=>$data['session_data']->customer_company,
							'customer_email'=>$data['session_data']->customer_email,
							'customer_status'=>$data['session_data']->user_status,
							'customer_password'=>$data['session_data']->customer_password,
							'customer_service'=>$data['session_data']->customer_service,
							'customer_picture'=>$data['session_data']->customer_picture,
		                	'customer_phone_number'=>$data['session_data']->customer_phone_number,
							'customer_city'=>$data['session_data']->customer_city,
							'customer_zip'=>$data['session_data']->customer_zip,
					     	'customer_address'=>$data['session_data']->customer_address,
						    'customer_fax_number'=>$data['session_data']->customer_fax_number,
							'customer_country_id'=>$data['session_data']->umb_country_id,
							'account_infos'=>$data['session_data'],
							'logged_in'=>TRUE
							);
			
					echo $this->session->set_userdata($u_session);
					
					if($this->cart->total_items())
						{
						$redirect="cart/";
						}
						else
						{
							$redirect="home/";
						}
			echo json_encode(array('result'=>1,'redirect'=>$redirect));
					
			
				}
	
			
				else {
					echo json_encode(array('result'=>0));

					$this->session->set_userdata('logged_in', FALSE);
					$this->session->unset_userdata($u_session);
					//$this->session->sess_destroy();
				}
					
	} 
	
		/* Logout System Process */
	public function system_logout() {
	 	
				$this->session->set_userdata('logged_in', FALSE);
				$this->session->unset_userdata($u_session);
				$this->session->sess_destroy();
				redirect('index.php/connect/','refresh');
	}
	public function updateuserprocess() {
	
 $update_entries=array(
			'customer_lastname'=>strip_tags(strtoupper($this->input->post('D'))),
			'customer_firstname'=>strip_tags(ucfirst($this->input->post('C'))),
			'customer_company'=>$this->input->post('F'),
			'customer_service'=>$this->input->post('I'),
			'customer_phone_number'=>$this->input->post('H'),
			'customer_email'=>$this->input->post('E'),
			'customer_zip'=>$this->input->post('Z'),
			'customer_city'=>$this->input->post('V'),
			'customer_address'=>$this->input->post('R'),
			'customer_fax_number'=>$this->input->post('X'),
			'umb_country_id'=>$this->input->post('P'),
			'data_updated'=>date("Y-m-d H:i:s")
		
			);
			$this->m_customers->updatethis($this->users_table,$this->customer_id,$update_entries,$this->input->post('K')) ;
  $u_session = array(
						'customer_id'=>$this->session->userdata("customer_id"),
						'customer_lastname'=>$this->input->post('D'),
						'customer_firstname'=>$this->input->post('C'),
						'customer_company'=>$this->input->post('F'),
						'customer_phone_number'=>$this->input->post('H'),
						'customer_email'=>$this->input->post('E'),
						'customer_status'=>$this->session->userdata("user_status"),
						'customer_password'=>$this->session->userdata("customer_password"),
						'customer_service'=>$this->input->post('I'),
						'customer_zip'=>$this->input->post('Z'),
			            'customer_city'=>$this->input->post('V'),
						'customer_address'=>$this->input->post('R'),
						'customer_fax_number'=>$this->input->post('X'),
						'customer_country_id'=>$this->input->post('P'),
						'account_infos'=>$data['session_data'],
						
						'logged_in'=>TRUE
               					);
				
						$this->session->set_userdata($u_session);
						$n_p_client=substr($this->input->post('D'),0,1).'.'.$this->input->post('C');
echo json_encode(array('result'=>1,'u_session'=>$u_session,'n_p_client'=>$n_p_client));
			}
			
			
			public function system_recovre_pass()
				{	
			if($data['customer'] = $this->m_customers->getclientpass($this->users_table,$this->user_email,$this->input->post('A'))==true)
			{
			$data['customer'] = $this->m_customers->getclientpass($this->users_table,$this->user_email,$this->input->post('A'));
			$Email_data['CM']=$data['customer']->customer_email; 
			$Email_data['CPW']=$data['customer']->customer_password; 
			$Email_data['CFN']=$data['customer']->customer_firstname; 
			$Email_data['CLN']=$data['customer']->customer_lastname; 
			$no_email = $this->load->view('views_emails/forgot_password_email_template/motdepasse',$Email_data,true);
			$this->load->library('email');

			$config=array(
			'charset'=>'utf-8',
			'wordwrap'=> TRUE,
			'mailtype' => 'html'
			); 
			// $client_email  = $data['proposings_list'][0]->proposing_email ;
			$this->email->initialize($config);
			$this->email->from('contact@enerlisonline.com','Enerlisonline');
			$this->email->to($data['customer']->customer_email); 
			$this->email->subject("ENERLISONLINE.COM - Récupération de compte" );
			$this->email->message($no_email);
			$this->email->send() ;	
			//echo $this->email->send() ;	

			echo json_encode(array('result'=>1,'emaim'=>$data['customer']));

			}
			else 
			{
			echo json_encode(array('result'=>0));
			}
		
		}
			
	public function addadresse() {
	

			$data['countries']=$this->m_common->getthis("umb_countries","country_id",$this->input->post('E'));

 			$new_address=array(
				 'umb_customer_id'=>$this->session->userdata("customer_id"),
				 'adresse_type'=>$this->input->post("A"),
                 'adresse_city'=>strip_tags($this->input->post('C')),
                 'adresse_zip'=>$this->input->post('D'),	
                 'umb_country_id'=>$this->input->post('E'),	
                 'country_name'=>$data['countries']->country_FR,					 
                 'adresse'=>strip_tags($this->input->post('B')),
				  'phone'=>$this->input->post('G'),	
                 'data_created'=>date("Y-m-d H:i:s"),
			     'data_updated'=>date("Y-m-d H:i:s")				 
            			
		
);	
		$this->m_common->add_entry($this->customers_adresse_table,$new_address);
			
echo json_encode(array('result'=>1));
			}	
			
		
}

