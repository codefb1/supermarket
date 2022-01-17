<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class PaimentsPartners extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "PaimentsPartners/index";
				$config['total_rows'] = $this->M_payments_parteners->count_all();
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
				$data['payments_parteners_list'] = $this->M_payments_parteners->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_payments_parteners/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			
			$data['parteners'] = $this->M_partners->get_all_table(1);
	 	if($this->input->post('partener_id')) {
			
		try {
			
			$this->form_validation->set_rules('partener_id', 'partener_id', 'required');
			   $add_data=array(
					                     "partener_id" => $this->input->post('partener_id'),
									     "payment_amount" => $this->input->post('payment_amount'),
										 "payment_date" => $this->input->post('datepayement').' '.$this->input->post('datetime'),
			                              "payment_preuve" => $this->input->post('payment_preuve'),
										  "payment_data_created" => date("Y-m-d H:i:s")
									
										);
										
										
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
										
				$this->template->load('template','views_payments_parteners/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_payments_parteners->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					$payment_id = $this->db->insert_id();
					$orders_id=$this->input->post('orders_id');
				foreach($orders_id as $order_id){
					$new_entry_payments_parteners=array(
								'order_id'=>$order_id,
								'payment_partener_id'=>$payment_id,
							);
							$this->M_payments_parteners->add_new_entry_payments_parteners($new_entry_payments_parteners);
					$update_entries=array('order_payment_status_partener'=>2);
				$this->M_orders->update_this($order_id,$update_entries);
					}
					$this->template->load('template','views_payments_parteners/add',$data);
				}
				
				else if($this->M_payments_parteners->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['country_name'] = $this->input->post('country_name');
				  
					$this->template->load('template','views_payments_parteners/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_payments_parteners/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			
			$data['process_status'] = 0;
			$data['countrie'] = $this->M_payments_parteners->get_this(end($this->uri->segments));
			if($this->input->post('country_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('country_name', 'country_name', 'required');
			   $update_data=array(
					                    "country_name" => $this->input->post('country_name')
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'countries/edit/'.$data['process_status'].'/'.$this->input->post('country_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_payments_parteners->update_this($this->input->post('country_id'), $update_data);
					
					if($update_process  == true ) {
						
						 $data['process_status'] = 1;
						 redirect(base_url().'countries/edit/'.$data['process_status'].'/'.$this->input->post('country_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'countries/edit/'.$data['process_status'].'/'.$this->input->post('country_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_countries/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('country_id');
			if(is_numeric($data_id)){
				if($this->M_payments_parteners->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/countries/index/'.$data_id);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	
		/*** Update status Banner  Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$country_id=$this->input->post('country_id');
			if(is_numeric($data_id)){
				$update_entries=array('country_data_status'=>$data_id);
				if($this->M_payments_parteners->update_status($update_entries,$country_id)==true){
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
		
		 public function uploadFile()
		{ 

            try {
				
				$config = array(
									'upload_path' => './medias/payment_preuves/',
									'allowed_types' => '*',
									'max_size' => '6000',
									'max_width' => '2000',
									'max_height' => '2000'
									);
				

					$this->load->library('upload');
					$file_name    =  'file_'. md5(microtime());
					$config['file_name'] = $file_name;
					$this->upload->initialize($config);
					$file = $this->upload->do_upload('logo');

					if (!$file)
					{
							$errors = $this->upload->display_errors('', '');
							//$error = array('error' => $this->upload->display_errors());
							var_dump($errors);
					}
					else
					{ 

						$data_file = $this->upload->data();

						$data_image  =  $data_file['file_name'];
                    /*$data_image  = array(
                                    'fileNameServer'   => $data_file['file_name'],
                                    'extension'        => $data_file['file_ext'],
                                    'fileName '        => $_FILES['files']['categorie_name'],
                                    );*/
									echo ($data_image);

				}
			
			} catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			 
			}

        }
			
	}
?>