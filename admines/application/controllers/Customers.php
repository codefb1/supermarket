<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class customers extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste  users */
				public function index(){
		
		
		try {    
			     if($this->input->get('filtercheck')){
					 $session_search_array = array(
						 'keyword' => $this->input->get('keyword'),
						 'status' => $this->input->get('status'),
						
					 );
					$this->session->set_userdata($session_search_array);
				} 
				($this->session->userdata('keyword') != "N" and $this->session->userdata('keyword') != '') ? $keyword = $this->session->userdata('keyword') : $keyword = "N";
				($this->session->userdata('status') != "N" and $this->session->userdata('status') != '') ? $status = $this->session->userdata('status') : $status = "N";
				
				
				$config = array(); 
				$config['base_url'] = base_url() . "customers/index";
				$config['total_rows'] = $this->M_customers->count_all($keyword,$deplomeId,$status);
				$config['per_page'] = 5;
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
				$data['customers_list'] = $this->M_customers->get_all($config['per_page'], $page,$keyword,$status);
			
				$this->load->view('views_customers/exports/excel',$data);
			}elseif($this->input->get('exports') == 2){
				//load mPDF library
				$this->load->library('m_pdf');
				//load mPDF library
				//now pass the data//
				$data['customers_list'] = $this->M_customers->get_all($config['per_page'], $page,$keyword,$status);
			//now pass the data //
				$html=$this->load->view('views_customers/exports/pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
				//this the the PDF filename that user will get to download
				$pdfFilePath ="AT-export-clients-".date('d-m-Y H:i:s').".pdf";
				//actually, you can pass mPDF parameter on this load() function
				$pdf = $this->m_pdf->load();
				//generate the PDF!
				$pdf->WriteHTML($html,2);
				//offer it to user via browser download! (The PDF won't be saved on your server HDD)
				$pdf->Output($pdfFilePath, "D");
			
			
			}else{
				$data['customers_list'] = $this->M_customers->get_all($config['per_page'], $page,$keyword,$status);
			    $data['pagination'] = $this->pagination->create_links();
				$data["keyword"]=$keyword;
			
				$this->template->load('template','views_customers/index',$data);
			}// var_dump($param_2);die();
			
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
		/*** Add  users interface function ***/
		public function add()
		{  
			$data['process_status'] = 0;
			
			$data['customer_country'] = 0;
	 	if($this->input->post('customer_firstname')) {
			
		try { 
		$this->form_validation->set_rules('customer_lastname', 'customer_lastname', 'required');
		$this->form_validation->set_rules('customer_firstname', 'customer_firstname', 'required');
		$this->form_validation->set_rules('customer_email', 'Email', 'required');
        //$this->form_validation->set_rules('customer_password', 'Password', 'required');
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
						"customer_deliver_phone" =>$this->input->post('customer_deliver_phone'),
						"customer_deliver_address" => $this->input->post('customer_deliver_address'),
						"customer_deliver_zip" => $this->input->post('customer_deliver_zip'),
						"customer_deliver_city" => $this->input->post('customer_deliver_city'),
						"customer_deliver_country" => $this->input->post('customer_deliver_country'),
						"customer_deliver_lastname" => $this->input->post('customer_deliver_lastname'),
						"customer_deliver_firstname" => $this->input->post('customer_deliver_firstname'),
						"customer_siret" =>$this->input->post('customer_siret'),
						"customer_data_status" => 1,
						
						"customer_data_created" => date("Y-m-d H:i:s")
					);
					if($this->form_validation->run() == FALSE) {
								$data['process_status'] = 99;
								$data['customer_lastname'] = $this->input->post('customer_lastname');
								$data['customer_firstname'] = $this->input->post('customer_firstname');
								$data['customer_email'] = $this->input->post('customer_email');
								$data['customer_password'] = $this->input->post('customer_password');
								$data['customer_city'] = $this->input->post('customer_city');
								$data['customer_phone'] = $this->input->post('customer_phone');
								$data['customer_address'] = $this->input->post('customer_address');
				                $data['customer_country'] = $this->input->post('customer_country');
								$data['customer_zip'] = $this->input->post('customer_zip');
								$data['customer_deliver_zip'] = $this->input->post('customer_deliver_zip');
								$data['customer_deliver_city'] = $this->input->post('customer_deliver_city');
								$data['customer_deliver_phone'] = $this->input->post('customer_deliver_phone');
								$data['customer_deliver_address'] = $this->input->post('customer_deliver_address');
				                $data['customer_deliver_country'] = $this->input->post('customer_deliver_country');
								$data['customer_deliver_lastname'] = $this->input->post('customer_deliver_lastname');
								$data['customer_deliver_firstname'] = $this->input->post('customer_deliver_firstname');
								$data['customer_siret'] = $this->input->post('customer_siret');
								$this->template->load('template','views_customers/add',$data);	
						}
						
						if ($this->form_validation->run() == TRUE) {
						
							if($this->M_customers->add_new_entry($add_data) == true ) {	
								$data['process_status'] = 1;
								$this->template->load('template','views_customers/add',$data);
							}
							
							else if($this->M_customers->add_new_entry($add_data) == false ) {
								$data['process_status'] = 2;
								$data['customer_lastname'] = $this->input->post('customer_lastname');
								$data['customer_firstname'] = $this->input->post('customer_firstname');
								$data['customer_email'] = $this->input->post('customer_email');
								$data['customer_password'] = $this->input->post('customer_password');
								$data['customer_city'] = $this->input->post('customer_city');
								$data['customer_phone'] = $this->input->post('customer_phone');
								$data['customer_address'] = $this->input->post('customer_address');
				                $data['customer_country'] = $this->input->post('customer_country');
								$data['customer_zip'] = $this->input->post('customer_zip');
								$data['customer_deliver_zip'] = $this->input->post('customer_deliver_zip');
								$data['customer_deliver_city'] = $this->input->post('customer_deliver_city');
								$data['customer_deliver_phone'] = $this->input->post('customer_deliver_phone');
								$data['customer_deliver_address'] = $this->input->post('customer_deliver_address');
				                $data['customer_deliver_country'] = $this->input->post('customer_deliver_country');
				                $data['customer_deliver_lastname'] = $this->input->post('customer_deliver_lastname');
								$data['customer_deliver_firstname'] = $this->input->post('customer_deliver_firstname');
								$data['customer_siret'] = $this->input->post('customer_siret');
								
				$this->template->load('template','views_customers/add',$data);
								
							}
						}
				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
				}
		}
		
		else {
			
		
			$this->template->load('template','views_customers/add',$data);
		}
			
			
		}
		/*** Edit users interface function ***/
		public function edit()
		{
			$data['process_status'] = 0;
			
			$data['customer'] = $this->M_customers->get_this(end($this->uri->segments));

	if($this->input->post('customer_id') > 0) {
				
    	try {
	
			$this->form_validation->set_rules('customer_lastname', 'customer_lastname', 'required');
			$this->form_validation->set_rules('customer_firstname', 'customer_firstname', 'required');
            $this->form_validation->set_rules('customer_email', 'Email', 'required');
			$update_data=array(
				"customer_lastname" => $this->input->post('customer_lastname'),
				"customer_firstname" => $this->input->post('customer_firstname'),
				"customer_email" => $this->input->post('customer_email'),
				"customer_city" =>$this->input->post('customer_city'),
				"customer_phone" =>$this->input->post('customer_phone'),
				"customer_zip" => $this->input->post('customer_zip'),
				"customer_address" => $this->input->post('customer_address'),
				"customer_country" => $this->input->post('customer_country'),
				"customer_country" => $this->input->post('customer_country'),
				"customer_deliver_phone" =>$this->input->post('customer_deliver_phone'),
				"customer_deliver_address" => $this->input->post('customer_deliver_address'),
				"customer_deliver_zip" => $this->input->post('customer_deliver_zip'),
				"customer_deliver_city" => $this->input->post('customer_deliver_city'),
				"customer_deliver_country" => $this->input->post('customer_deliver_country'),
				"customer_deliver_lastname" => $this->input->post('customer_deliver_lastname'),
				"customer_deliver_firstname" => $this->input->post('customer_deliver_firstname'),
				"customer_siret" =>$this->input->post('customer_siret'),
				"customer_data_updated" => date("Y-m-d H:i:s")

				);

					if($this->input->post('customer_password')) {

					$update_data['customer_password'] = $this->input->post('customer_password');

					}
					if 	($this->form_validation->run() == FALSE) {

					$data['process_status'] = 99;
					redirect(base_url().'customers/edit/'.$data['process_status'].'/'.$this->input->post('customer_id'), 'refresh');
					}
							
			    	if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_customers->update_this($this->input->post('customer_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'customers/edit/'.$data['process_status'].'/'.$this->input->post('customer_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'customers/edit/'.$data['process_status'].'/'.$this->input->post('customer_id'), 'refresh');
					}
				}

			} catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			}
		}
		else {
				
	$this->template->load('template','views_customers/edit',$data);
		}
		} 
		/*** Delete users Execute function ***/
		public function delete() {  
		
		try {
			$data_id=$this->input->post('customer_id');
			if(is_numeric($data_id)){
				if($this->M_customers->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/customers/index/'.$data_id);
			}
			
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}

		/*** Update users  status Execute function ***/
		public function updatestatus() {

		try {		
			$us=0;
			$data_id=$this->input->post('idsatus');
			$customer_id=$this->input->post('customer_id');
			if(is_numeric($data_id)){
				$update_entries=array('customer_data_status'=>$data_id);
				if($this->M_customers->update_status($update_entries,$customer_id)==true){
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
	
	}
?>