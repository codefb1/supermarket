<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
	error_reporting(E_ALL);
	class Orders extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/
		
			/* liste orders */
				public function index(){
		
		
		try {
			      if($this->input->get('filtercheck')){
					 $session_search_array = array(
						 'order_data_created' => $this->input->get('order_data_created'),
						 'order_data_created_end' => $this->input->get('order_data_created_end'),
						 'order_partener_status' => $this->input->get('order_partener_status'),
						 'delivery_status' => $this->input->get('delivery_status'),
						 'order_status' => $this->input->get('order_status')
					 );
					$this->session->set_userdata($session_search_array);
				}
				 $data['order_status'] =$order_status;
	             $data['delivery_status'] =$delivery_status;
				 $data['order_partener_status'] =$order_partener_status;
				 $data['order_data_created'] =$order_data_created;
				 $data['order_data_created_end'] =$order_data_created_end;
				($this->session->userdata('order_data_created') != "N" and $this->session->userdata('order_data_created') != '') ? $order_data_created = $this->session->userdata('order_data_created') : $order_data_created = date("Y-m-01"); 
				($this->session->userdata('order_data_created_end') != "N" and $this->session->userdata('order_data_created_end') != '') ? $order_data_created_end = $this->session->userdata('order_data_created_end') : $order_data_created_end = date("Y-m-d"); 
				($this->session->userdata('order_partener_status') != "N" and $this->session->userdata('order_partener_status') != '') ? $order_partener_status = $this->session->userdata('order_partener_status') : $order_partener_status = "N";
				($this->session->userdata('delivery_status') != "N" and $this->session->userdata('delivery_status') != '') ? $delivery_status = $this->session->userdata('delivery_status') : $delivery_status = "N";
				($this->session->userdata('order_status') != "N" and $this->session->userdata('order_status') != '') ? $order_status = $this->session->userdata('order_status') : $order_status = 1;

				$config = array();
				$config['base_url'] = base_url() . "orders/index";
				$config['total_rows'] = $this->M_orders->count_all($order_data_created,$order_data_created_end,$order_partener_status,$delivery_status,$order_status);
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
			$data['status_list']= $this->M_status->get_all_table(1);
			 $data['status_livraison']= $this->M_status->get_all_table(2); 
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['orders_list'] = $this->M_orders->get_all($config['per_page'], $page,$order_data_created,$order_data_created_end,$order_partener_status,$delivery_status,$order_status);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			$data['order_status'] =$order_status;
			$data['delivery_status'] =$delivery_status;
			$data['order_partener_status'] =$order_partener_status;
			$data['order_data_created'] =$order_data_created;
			$data['order_data_created_end'] =$order_data_created_end;
				
			 if($order_partener_status == "N"){
					 $data['order_partener_status'] ='';
					 }
					  if($delivery_status == "N"){
					 $data['delivery_status'] ='';
					 }
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_orders/index',$data);
	}
	
	
	
	
	public function associations(){
		
		
		try {
				
				$config = array();
				$config['base_url'] = base_url() . "orders/partners";
				$config['total_rows'] = $this->M_orders->count_all_for_associations();
				$config['per_page'] = 100;
				$config['uri_segment'] = 4;
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
			
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['orders_list'] = $this->M_orders->get_all_for_associations($config['per_page'], $page);
            $data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_orders/order_associations',$data);
	}
	
	public function partners(){
		
		
		try {
				$partner_id = $this->uri->segment(3);
				$data['partener'] = $this->M_partners->get_this(end($this->uri->segments),null);
			
				$config = array();
				$config['base_url'] = base_url() . "orders/partners";
				$config['total_rows'] = $this->M_orders->count_all_by_partner($partner_id);
				$config['per_page'] = 100;
				$config['uri_segment'] = 4;
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
			
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['orders_list'] = $this->M_orders->get_all_by_partner($config['per_page'], $page,$partner_id);
            $data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_orders/order_partner',$data);
	}
	
	public function customers(){
		
		
		try {
			$customer_id = $this->uri->segment(3);
			$data['customer'] = $this->M_customers->get_this($customer_id);
			
			
				$config = array();
				$config['base_url'] = base_url() . "orders/customers";
				$config['total_rows'] = $this->M_orders->count_all_by_customer($customer_id);
				$config['per_page'] = 100;
				$config['uri_segment'] = 4;
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
			 $data['status_list']= $this->M_status->get_all_table(1);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['orders_list'] = $this->M_orders->get_all_by_customer($config['per_page'], $page,$customer_id);
            $data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
						 
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_orders/order_customer',$data);
	}
		/*** show order ***/
			public function detail()
		{
			
			try {
	
			$data['orders']= $this->M_orders->get_this(end($this->uri->segments));
			
			//$data['order_country']= $this->M_orders->get_this_country($data['orders']->order_country_id);
			$data['orders_detail']= $this->M_orders->get_orders_detail_all($data['orders']->order_id);
			$data['partners_list']= $this->M_partners->get_all_table(1);
			$data['status_list']= $this->M_status->get_all_table(1);
			$data['status_livraison']= $this->M_status->get_all_table(2);
			$data['transporters_list']= $this->M_transporters->get_all_table();
				$data['log_orders_parteners']= $this->M_orders->get_all_log_orders_parteners($data['orders']->order_id);
				} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
			$this->template->load('template','views_orders/edit',$data);
	}
	/*** Update Execute function  update status orders ***/
	public function updatestatus() { 
			try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$order_id=$this->input->post('order_id');
			if(is_numeric($data_id)){
			    $update_entries=array('order_status'=>$data_id);
				
			   echo json_encode(array('result'=>1));
		    	
			}
			else 
			{  
			 echo json_encode(array('result'=>0));
			}

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
		public function updateOrderPartener() { 
			try {
			$us=0;
			$partener_id=$this->input->post('partener_id');
			$order_id=$this->input->post('order_id');
			$order_partener_status=$this->input->post('order_partener_status');
			$order_payment_status_partener=$this->input->post('order_payment_status_partener');
			$orders= $this->M_orders->get_this($order_id);
			$partener = $this->M_partners->get_this($partener_id,null);
			$partener_city = $partener->partener_city;
			$order_partener_id_old=$orders->partener_id;
			$order_partener_status_old=$orders->order_partener_status;
			if($orders->order_payment_status_partener==2){
			$update_entries=array('partener_id'=>$partener_id,'order_partener_status'=>$order_partener_status,'order_payment_status_partener'=>$order_payment_status_partener);

			} else {
			$update_entries=array('partener_id'=>$partener_id,'order_partener_status'=>$order_partener_status,'order_payment_status_partener'=>$order_payment_status_partener,'order_partener_date_payement'=>date("Y-m-d H:i:s"));

			}
			$this->M_orders->update_atribute($update_entries,$order_id);
            if($order_partener_status_old==4){
				$add_data_log_orders_parteners=array(
                            "order_id" =>$orders->order_id,
							 "old_partener_id" => $order_partener_id_old,
							  "new_partener_id" => $partener_id,
							  "account_id" => $this->session->userdata('account_id'),
							  "log_data_created" => date("Y-m-d H:i:s")
			);
			$this->M_orders->add_new_entry_log_orders_parteners($add_data_log_orders_parteners);
			$update_entries=array('order_status'=>1,'is_partener_singal'=>0,'data_partener_singal'=>'');

			}
			
			echo json_encode(array('result'=>1,'partener_city'=>$partener_city));
		    	
			
			

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
		
		
		public function update_partener_status() { 
			try {
			
			$order_partener_status=$this->input->post('order_partener_status');
			$order_id=$this->input->post('order_id');
			
			
			    $update_entries=array('order_partener_status'=>$order_partener_status);
				$this->M_orders->update_atribute($update_entries,$order_id);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		public function updateOrderStatus() { 
			try {
			
			$order_status=$this->input->post('order_status');
			$order_id=$this->input->post('order_id');
			
			
			    $update_entries=array('order_status'=>$order_status);
				$this->M_orders->update_atribute($update_entries,$order_id);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
			public function updateOrderComments() { 
			try {
			
			$order_comments=$this->input->post('order_comments');
			$order_id=$this->input->post('order_id');
			
			
			    $update_entries=array('order_comments'=>$order_comments);
				$this->M_orders->update_this($order_id,$update_entries);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
			public function updateOrderCommentsParteners() { 
			try {
			
			$order_comments_parteners=$this->input->post('order_comments_parteners');
			$order_id=$this->input->post('order_id');
			
			
			    $update_entries=array('order_comments_parteners'=>$order_comments_parteners);
                 $this->M_orders->update_this($order_id,$update_entries);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
		public function update_delivery() { 
			try {
			
			$delivery_name=$this->input->post('delivery_name');
			$delivery_num_coli=$this->input->post('delivery_num_coli');
			$delivery_price=$this->input->post('delivery_price');
			$delivery_status=$this->input->post('delivery_status');
			$delivery_referance=$this->input->post('delivery_referance');
			$order_id=$this->input->post('order_id');
			
			
			    $update_entries=array(
				'delivery_name'=>$delivery_name,
				'delivery_num_coli'=>$delivery_num_coli,
				'delivery_price'=>$delivery_price,
				'delivery_status'=>$delivery_status,
				'delivery_referance'=>$delivery_referance,
				
				);
				$this->M_orders->update_atribute($update_entries,$order_id);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
				public function updateOrderAddress() { 
			try {
			
	
			$datas = $this->input->post('datas',[]);
		    $type = $this->input->post('type');
			$order_id = $this->input->post('order_id');
			
			    if( $type =='billing'){
					$update_entries=array(
						'order_billing_street'=>$datas['order_billing_street'],
						'order_billing_city'=>$datas['order_billing_city'],
						'order_billing_zip'=>$datas['order_billing_zip'],
						'order_billing_country'=>$datas['order_billing_country'],
						'order_billing_firstname'=>$datas['order_billing_firstname'],
						'order_billing_lastname'=>$datas['order_billing_lastname'],
						'order_billing_email'=>$datas['order_billing_email'],
						'order_billing_phone'=>$datas['order_billing_phone'],
						'order_billing_country'=>$datas['order_billing_country'],
				);
				}
				
				 if( $type =='shipment'){
					$update_entries=array(
						'order_shipping_street'=>$datas['order_shipping_street'],
						'order_shipping_city'=>$datas['order_shipping_city'],
						'order_shipping_zip'=>$datas['order_shipping_zip'],
						'order_shipping_country'=>$datas['order_shipping_country'],
						'order_shipping_firstname'=>$datas['order_shipping_firstname'],
						'order_shipping_lastname'=>$datas['order_shipping_lastname'],
						'order_shipping_email'=>$datas['order_shipping_email'],
						'order_shipping_phone'=>$datas['order_shipping_phone'],
						'order_shipping_country'=>$datas['order_shipping_country'],
				);
				}
				
				 if( $type =='delivery'){
					 
					$update_entries=array(
						'transporter_id'=>$datas['transporter_id'],
						'delivery_num_coli'=>$datas['delivery_num_coli'],
						'delivery_price'=>$datas['delivery_price'],
						'delivery_status'=>$datas['delivery_status'],
						'poid_coli'=>$datas['poid_coli'],
						'delivery_referance'=>$datas['delivery_referance'],
				);
				if($datas['delivery_status']==6){
						$update_delivery_date_time=array(
						'order_status'=>9,
						'delivery_date_time'=>date("Y-m-d H:i:s")
				);
				}
				if($datas['delivery_status']==7){
						$update_delivery_date_time=array(
						'order_status'=>3,
						'delivery_date_time'=>date("Y-m-d H:i:s")
				);
				}
				if($datas['delivery_status']==8){
						$update_delivery_date_time=array(
						'order_status'=>10,
						'delivery_date_time'=>date("Y-m-d H:i:s")
				);
				}
				 $this->M_orders->update_this($order_id,$update_delivery_date_time);
				
				}
			   
                 $this->M_orders->update_this($order_id,$update_entries);
			   echo json_encode(array('result'=>1,'type'=>$type));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
		
		/*** Update Execute function  search orders ***/
	public function search(){

		try {
			$data['landingpages_list'] = $this->M_landingpages->get_all_landingpages();
			$search=false;
			$customer_email= trim($this->input->post('customer_email'));
			$order_source= $this->input->post('order_source');
			$customer_base64_id= trim($this->input->post('customer_base64_id'));
			
		    $data['page_name'] = 'orders';
			$date_debut= $this->input->post('date_debut');
			$date_fin= $this->input->post('date_fin');
			$date_selected= $this->input->post('date_selected');
			//var_dump($date_selected);exit;
		    $order_payment_method= $this->input->post('order_payment_method');
			$order_payment_status= $this->input->post('order_payment_status');
					if($this->input->post('search')){
					$session_array = array(
					'date_debut' => $this->input->post('date_debut'),
					'date_fin' => $this->input->post('date_fin'),
					'date_selected' => $this->input->post('date_selected'),
					'order_payment_method' => $this->input->post('order_payment_method'),
					'order_payment_status' => $this->input->post('order_payment_status'),
					'customer_email' => trim($this->input->post('customer_email')),
					'order_source' => $this->input->post('order_source'),
					'customer_base64_id' => trim($this->input->post('customer_base64_id')),
					
					);
					$this->session->set_userdata($session_array);
					}
				($this->session->userdata('date_debut') != "") ? $date_debut = $this->session->userdata('date_debut') : $date_debut = "";
				($this->session->userdata('date_fin') != "") ? $date_fin = $this->session->userdata('date_fin') : $date_fin = "";
				($this->session->userdata('date_selected') != "") ? $date_selected = $this->session->userdata('date_selected') : $date_selected = "";
                ($this->session->userdata('customer_email') != "") ? $customer_email = $this->session->userdata('customer_email') : $customer_email = "";
                ($this->session->userdata('order_source') != "") ? $order_source = $this->session->userdata('order_source') : $order_source = "";
				($this->session->userdata('order_status') != "") ? $order_status = $this->session->userdata('order_payment_status') : $order_payment_status = "";
			if($customer_email!='' or $date_selected!='' or $order_payment_method!='' or $order_payment_status!='' or $order_source!=''  or $customer_base64_id !='')
			{
				$search=true;
			}
			if($date_debut)
			{
			$date_debut_final = explode('/', $date_debut);
			$date_debut_d = $date_debut_final[0];
			$date_debut_m   = $date_debut_final[1];
			$date_debut_y  = $date_debut_final[2];
			$date_debut_final=$date_debut_y.'-'.$date_debut_m.'-'.$date_debut_d;
			$search=true;
			}
			if($date_fin)
			{
			$date_fin_final = explode('/', $date_fin);
			$date_fin_d = $date_fin_final[0];
			$date_fin_m   = $date_fin_final[1];
			$date_fin_y  = $date_fin_final[2];
			$date_fin_final=$date_fin_y.'-'.$date_fin_m.'-'.$date_fin_d;
			$search=true;
			} 
	
			if ($search==true)
			{
				$config = array();
				$config['base_url'] = base_url() . "orders/search";	
				$config['total_rows'] = $this->M_orders->count_all_search($customer_email,$date_selected,$date_debut_final,$date_fin_final,$order_payment_method,$order_payment_status,$order_source,$customer_base64_id);
				$config['per_page'] = 10;
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
				$data['orders_list'] = $this->M_orders->get_all_search($config['per_page'], $page,$customer_email,$date_selected,$date_debut_final,$date_fin_final,$order_payment_method,$order_payment_status,$order_source,$customer_base64_id);
				$data['pagination'] = $this->pagination->create_links();
				$data["order_payment_status"]=$order_payment_status;
				$data["order_payment_method"]=$order_payment_method;
				$data["date_selected"]=$date_selected;
				$data["date_fin"]=$date_fin;
				$data["date_debut"]=$date_debut;
				$data["customer_email"]=$customer_email;
				$data["order_source"]=$order_source;
				$data["customer_base64_id"]=$customer_base64_id;
				
			
				}
				$this->template->load('template','views_orders/search',$data);
	
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
	
	}	

/*** show order  association***/
			public function detailOrderAssociation()
		{
			
			try {
	
			$data['orders']= $this->M_orders->get_this(end($this->uri->segments));
			
			//$data['order_country']= $this->M_orders->get_this_country($data['orders']->order_country_id);
			$data['orders_detail']= $this->M_orders->get_orders_detail_all($data['orders']->order_id);
			$data['partners_list']= $this->M_partners->get_all_table(1);
			$data['status_list']= $this->M_status->get_all_table(1);
			$data['status_livraison']= $this->M_status->get_all_table(2);
			$data['transporters_list']= $this->M_transporters->get_all_table();
			
				} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
			$this->template->load('template','views_orders/detail_association',$data);
	}	
	
		public function get_facture_not_paiments() { 
			try {
			
		
			$partener_id=$this->input->post('partener_id');
			
				$orders_list=$this->M_orders->get_all_facture_not_paiments($partener_id);
		
			   echo json_encode(array('result'=>1,'orders_list'=>$orders_list));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		public function get_sum_facture_not_paiments() { 
			try {
			
		
			$orders_id=$this->input->post('orders_id');
			
				$amount_sum=$this->M_orders->get_sum_facture_not_paiments($orders_id);
		
			   echo json_encode(array('result'=>1,'amount_sum'=>number_format($amount_sum->order_partener_amount, 2, ',', '')));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
	
		
	}
?>