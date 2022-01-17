<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_orders extends CI_Model {
	
		
	    public $table='av_orders';
		public $table_orders_details='av_orders_details';
		public $table_log_orders_parteners='av_log_orders_parteners';
		public $table_accounts='av_accounts';
		
		public $table_products='av_products';
	    public $table_customers='av_customers';
		public $table_countries='av_countries';
		public $table_parteners='av_parteners';
		public $table_categories='av_categories';
		public $table_transporters='av_transporters';
		public $table_status='av_status';
		public $table_taxe='av_taxe';
        public $taxe_id='taxe_id';
		public $field_id ='order_id';
		public $customer_id ='customer_id';
		public $order_id ='order_id';
		public $product_id ='product_id';
		public $partener_id ='partener_id';
		public $status_id='status_id';
		public $order_status='order_status';
		public $order_billing_country='order_billing_country';
		public $country_id='country_id'; 
		public $categorie_id='categorie_id'; 
		public $transporter_id='transporter_id'; 
		public $order_partener_status='order_partener_status'; 
		public $order_data_created='order_data_created'; 
		public $delivery_status='delivery_status';
		public $association_id='association_id';
		public $is_association='is_association';
		public $order_payment_status_partener='order_payment_status_partener';
		public $order_payment_status='order_payment_status';
		public $delivery_date_time='delivery_date_time';
		public $is_partener_singal='is_partener_singal';
		public $data_partener_singal='data_partener_singal';
		public $data_partener_up_auto_status='data_partener_up_auto_status';
		public $account_id='account_id';
		public $new_partener_id='new_partener_id';
		public $old_partener_id='old_partener_id';
		public $log_order_partener_id='log_order_partener_id';
		 
		function count_all($order_data_created="",$order_data_created_end="",$order_partener_status="N",$delivery_status="N",$order_status="") {
				
				try {
					$this->db->from($this->table);
					if($order_data_created){
					  $order_data_created= date_create($order_data_created);
					  }
					  if($order_data_created_end){
						  $order_data_created_end= date_create($order_data_created_end);
					  }
					  if($order_data_created and $order_data_created_end) {
						$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($order_data_created and  !$order_data_created_end ) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
					}
					if($order_data_created == $order_data_created_end ) {
						
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
				
					}
					if($order_status) {
					$this->db->where($this->table.'.'.$this->order_status,$order_status);
					}

			       
			        if($delivery_status != "N" and  $delivery_status) {
						$this->db->where($this->table.'.'.$this->delivery_status,$delivery_status);
					}
					if($order_partener_status != "N" and  $order_partener_status) {
						$this->db->where($this->table.'.'.$this->order_partener_status,$order_partener_status);
					}
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
				function get_all($limit, $start,$order_data_created="",$order_data_created_end="",$order_partener_status="N",$delivery_status="N",$order_status="") {
				
			try {				 
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
				  if($order_data_created){
					  $order_data_created= date_create($order_data_created);
				  }
				  if($order_data_created_end){
					  $order_data_created_end= date_create($order_data_created_end);
				  }
				  if($order_data_created and $order_data_created_end) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created_end, 'Y-m-d 23:59:59').'"');
				  }	
					if($order_data_created and  !$order_data_created_end ) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
					}
					if($order_data_created == $order_data_created_end ) {
						
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
				
					}
					if($order_status) {
					$this->db->where($this->table.'.'.$this->order_status,$order_status);
					}

			       
			         if($delivery_status != "N" and  $delivery_status) {
						$this->db->where($this->table.'.'.$this->delivery_status,$delivery_status);
					}
					if($order_partener_status != "N" and  $order_partener_status) {
						$this->db->where($this->table.'.'.$this->order_partener_status,$order_partener_status);
					}
			       
				$this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		
		
		
		function count_all_by_customer($customer_id) {
				
				try {
					$this->db->from($this->table);
					$this->db->where($this->table.".".$this->customer_id, $customer_id);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
		function get_all_by_customer($limit, $start,$customer_id) {
				
			try {
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
				
				$this->db->where($this->table.".".$this->customer_id, $customer_id);
				$this->db->order_by($this->table.".".$this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
				function count_all_by_partner($partener_id) {
				
				try {
					$this->db->from($this->table);
					$this->db->where($this->table.".".$this->partener_id, $partener_id);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
		function get_all_by_partner($limit, $start,$partener_id) {
				
			try {
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
				
				$this->db->where($this->table.".".$this->partener_id, $partener_id);
				$this->db->order_by($this->table.".".$this->order_id,"desc");
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
				
		
		function get_this($data_id){
		 
			try {
				
					$this->db->select('*,');		
					$this->db->from($this->table);
					$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
					$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
					$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				    $this->db->join($this->table_countries, $this->table.".".$this->order_billing_country." = ".$this->table_countries.".".$this->country_id,'left');
			    	$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
				    $this->db->join($this->table_transporters, $this->table.".".$this->transporter_id." = ".$this->table_transporters.".".$this->transporter_id,'left');
           
				$this->db->where($this->table.".".$this->order_id,$data_id);
					$query = $this->db->get();

  
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		


		function update_this($param_1,$update_entry){
		 
			try {
			
				$this->db->where($this->order_id, $param_1);
			
				$this->db->update($this->table, $update_entry);

				return true;
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
				/* Sart Delete Query Function */
			function deletethis($data_id) {

			try {
			$query=$this->db->where($this->order_id, $data_id);
			$query=$this->db->delete($this->table);

			  return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			
			
					/* Sart Delete Query Function */
			function deletethis_orders_details($data_id) {

			try {
			$query=$this->db->where($this->common_order_id, $data_id);
			$query=$this->db->delete($this->table_orders_details);

			return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
					/* Sart Update Status Query function */
			public function update_status($data_post,$data_id){
				
					try {
			$query=$this->db->where($this->order_id, $data_id);
			$query=$this->db->update($this->table, $data_post);

			return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}
				}
						/* Sart Update Status Query function */
			public function update_atribute($data_post,$data_id){
				
					try {
			$query=$this->db->where($this->order_id, $data_id);
			$query=$this->db->update($this->table, $data_post);

			return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}
				}
				
				
				
					function get_all_countries() {
				
			try {
			$query = $this->db->get($this->table_countries);
				
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			
		function get_orders_detail($data_id) {
				
			try {

			$this->db->select('*');		
		     $this->db->from($this->table_orders_details);
			$this->db->join($this->table_products, $this->table_orders_details.".".$this->product_id." = ".$this->table_products.".".$this->product_id,'inner');
	       	$this->db->join($this->table_categories, $this->table_products.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'inner');
	     
		    $this->db->where($this->table_orders_details.".".$this->order_id,$data_id);
			 $this->db->where($this->table_orders_details.".".$this->association_id,0);

			$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			}
			
         function get_orders_detail_all($data_id) {
				
			try {

			$this->db->select('*');		
		     $this->db->from($this->table_orders_details);
			
		    $this->db->where($this->table_orders_details.".".$this->order_id,$data_id);

			$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			}
				function get_exportordres(){

				try {

					$this->db->select('*,'.$this->table.'.'.$this->field_created.' as orders_data_created,'.$this->table.'.'.$this->field_status.' as orders_data_status');		
					$this->db->from($this->table);
					$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->field_customer_id,'left');
					$this->db->join($this->table_countries, $this->table_countries.".".$this->field_country_id." = ".$this->table_customers.".".$this->common_country_id,'left');
					$this->db->join($this->table_orders_details, $this->table.".".$this->order_id." = ".$this->table_orders_details.".".$this->common_order_id,'left');     
					$this->db->join($this->table_products, $this->table_orders_details.".".$this->common_product_id." = ".$this->table_products.".".$this->field_product_id,'left');
					$this->db->join($this->table_landing_pages, $this->table.".".$this->field_order_source." = ".$this->table_landing_pages.".".$this->field_lp_id,'left');
					//$this->db->where($this->common_lp_id, 0);
					$query = $this->db->get();
					return $query->result();

				} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				return false;
				}

				}
			function get_exportordres_lp(){

			try {

				$this->db->select('*,'.$this->table.'.'.$this->field_created.' as orders_data_created,'.$this->table.'.'.$this->field_status.' as orders_data_status');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->field_customer_id,'left');
				$this->db->join($this->table_countries, $this->table_countries.".".$this->field_country_id." = ".$this->table_customers.".".$this->common_country_id,'left');
				$this->db->join($this->table_orders_details, $this->table.".".$this->order_id." = ".$this->table_orders_details.".".$this->common_order_id,'left');     
				$this->db->join($this->table_products, $this->table_orders_details.".".$this->common_product_id." = ".$this->table_products.".".$this->field_product_id,'left');
				$this->db->where_not_in($this->common_lp_id, 0);
				$query = $this->db->get();
				return $query->result();

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}

			}

	function get_this_order_customer($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->customer_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		function get_customers_wishes($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_customers_wishes, array($this->common_order_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function get_this_country($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_countries, array($this->field_country_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}	
	
			function get_orders_amount($date_orders){

			try {		
			
                    $this->db->select_sum('order_amount');
			        $this->db->from($this->table);
                    $this->db->where($this->table.".".$this->field_order_payment_status,2);
					if($date_orders==1){
					$this->db->where($this->table.".".$this->field_created,date("Y-m-d"));
					}

					if( $date_orders==2){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date("Y-m-d",strtotime( "previous monday" )). '" and "'. date("Y-m-d").'"');
					}
					if( $date_orders==3){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
					}

					if( $date_orders==4){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
					}	


					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}		

		function get_all_today() {
				
			try {
			$query =$this->db->limit(10);
			$this->db->select('*,'.$this->table.'.'.$this->field_created.' as orders_data_created,'.$this->table.'.'.$this->field_status.' as orders_data_status');		
			$this->db->from($this->table);
			$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->field_customer_id,'left');
			$this->db->join($this->table_landing_pages, $this->table.".".$this->field_order_source." = ".$this->table_landing_pages.".".$this->field_lp_id,'left');
		
			$this->db->order_by($this->order_id,"desc");
			$query = $this->db->get();
			return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}	
		
		
			function count_all_search($customer_email,$date_selected,$date_debut,$date_fin,$order_payment_method,$order_payment_status,$order_source,$customer_base64_id) {
				
				try {
					$this->db->from($this->table);
					$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->field_customer_id,'left');
				    
					if($customer_email){
					$this->db->where($this->table_customers.".".$this->customer_email, $customer_email);
					}
					if( $date_selected==1){
					$this->db->where($this->table.".".$this->field_created,date("Y-m-d"));
					}

					if( $date_selected==2){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date("Y-m-d",strtotime( "previous monday" )). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==3){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==4){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==5){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
					}
					if($date_debut and $date_fin){
					$this->db->where('sbo_orders.data_created BETWEEN"'. $date_debut. '" and "'. $date_fin.'"');
					}

					if($order_payment_method){
					$this->db->where($this->table.".".$this->field_order_payment_method,$order_payment_method);
					}
					if( $order_payment_status!=""){
					$this->db->where($this->table.".".$this->field_order_payment_status,$order_payment_status);
					}
					if($order_source){
					$this->db->where($this->table.".".$this->field_order_source, $order_source);
					}
				    if($customer_base64_id){
					$this->db->where($this->table_customers.".".$this->field_customer_base64_id, $customer_base64_id);
					}
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
		
			function get_all_search($limit,$start,$customer_email,$date_selected,$date_debut,$date_fin,$order_payment_method,$order_payment_status,$order_source,$customer_base64_id) {
				
			try {
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,'.$this->table.'.'.$this->field_created.' as orders_data_created,'.$this->table.'.'.$this->field_status.' as orders_data_status');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->field_customer_id,'left');
				$this->db->join($this->table_landing_pages, $this->table.".".$this->field_order_source." = ".$this->table_landing_pages.".".$this->field_lp_id,'left');
	        
					if($customer_email){
					$this->db->where($this->table_customers.".".$this->customer_email, $customer_email);
					}
					if( $date_selected==1){
					$this->db->where($this->table.".".$this->field_created,date("Y-m-d"));
					}

					if( $date_selected==2){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date("Y-m-d",strtotime( "previous monday" )). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==3){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==4){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==5){
					$this->db->where('sbo_orders.data_created BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
					}
					if($date_debut and $date_fin){
					$this->db->where('sbo_orders.data_created BETWEEN"'. $date_debut. '" and "'. $date_fin.'"');
					}

					if($order_payment_method){
					$this->db->where($this->table.".".$this->field_order_payment_method,$order_payment_method);
					}
					if( $order_payment_status!=""){
					$this->db->where($this->table.".".$this->field_order_payment_status,$order_payment_status);
					}
				   if($order_source){
					$this->db->where($this->table.".".$this->field_order_source, $order_source);
					}
				if($customer_base64_id){
					$this->db->where($this->table_customers.".".$this->field_customer_base64_id, $customer_base64_id);
					}

				$this->db->order_by($this->order_id,"desc");
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			function get_orders_by_status($status) {
				
			try {
				
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				$this->db->where($this->order_status, $status);
				$this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_orders_by_partener_status($status) {
				
			try {
				
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				if($status){
					$this->db->where($this->order_status, 1);
				} else {
					$this->db->where($this->order_status, 2);
				}
				$this->db->where($this->partener_id, $this->session->userdata('partener_id'));
				$this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		
		function count_all_for_partener($order_data_created="",$order_data_created_end="",$order_partener_status="N",$delivery_status="N",$order_status="") {
				
				try {
					$this->db->from($this->table);
					 if($order_data_created){
					  $order_data_created= date_create($order_data_created);
					  }
					  if($order_data_created_end){
						  $order_data_created_end= date_create($order_data_created_end);
					  }
					  if($order_data_created and $order_data_created_end) {
						$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($order_data_created and  !$order_data_created_end ) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
					}
					if($order_data_created == $order_data_created_end ) {
						
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
				
					}
					if($order_status) {
					$this->db->where($this->table.'.'.$this->order_status,$order_status);
					}
         
			       
			        if($delivery_status != "N" and  $delivery_status) {
						$this->db->where($this->table.'.'.$this->delivery_status,$delivery_status);
					}
					if($order_partener_status != "N" and  $order_partener_status) {
						$this->db->where($this->table.'.'.$this->order_partener_status,$order_partener_status);
					}
					$this->db->where_not_in($this->table.'.'.$this->order_partener_status, 4);
					$this->db->where_in($this->table.'.'.$this->order_payment_status, array(3, 4, 6));
					$this->db->where($this->partener_id, $this->session->userdata('partener_id'));
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
				function get_all_for_partener($limit, $start,$order_data_created="",$order_data_created_end="",$order_partener_status="N",$delivery_status="N",$order_status="") {
				
			try {				 
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
				   if($order_data_created){
					  $order_data_created= date_create($order_data_created);
					  }
					  if($order_data_created_end){
						  $order_data_created_end= date_create($order_data_created_end);
					  }
					  if($order_data_created and $order_data_created_end) {
						$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($order_data_created and  !$order_data_created_end ) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
					}
					if($order_data_created == $order_data_created_end ) {
						
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
				
					}
					if($order_status) {
					//$this->db->where($this->table.'.'.$this->order_status,$order_status);
					}
                    
			         if($delivery_status != "N" and  $delivery_status) {
						$this->db->where($this->table.'.'.$this->delivery_status,$delivery_status);
					}
					if($order_partener_status != "N" and  $order_partener_status) {
						$this->db->where($this->table.'.'.$this->order_partener_status,$order_partener_status);
					}
				 
			      $this->db->where_not_in($this->table.'.'.$this->order_partener_status, 4);
					$this->db->where_in($this->table.'.'.$this->order_payment_status, array(3, 4, 6));
			    $this->db->where($this->partener_id, $this->session->userdata('partener_id'));
				$this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		function count_all_by_status($order_status ,$partener_id,$order_month ,$order_years) {
				
				try {
					$this->db->from($this->table);
					
					if($partener_id and $partener_id!="N") {
					$this->db->where($this->table.'.'.$this->partener_id,$partener_id);
					}
					if($order_years and $order_month=="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-01-01 01:00:00"). '" and "'. date("$order_years-m-d 23:59:59").'"');
					}
					if($order_years and $order_month and $order_month!="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-$order_month-01 01:00:00"). '" and "'. date("$order_years-$order_month-d 23:59:59").'"');
					}
					if($order_status==3){
					$this->db->where($this->table.'.'.$this->order_payment_status ,3 );
					} else if($order_status==9){
					$this->db->where($this->table.'.'.$this->order_partener_status ,3 );
					} else {
					$this->db->where($this->table.'.'.$this->order_status ,$order_status );
					}
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
				function get_all_by_status($limit, $start,$order_status ,$partener_id,$order_month,$order_years) {
				
			try {				 
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
            	$this->db->join($this->table_transporters, $this->table.".".$this->transporter_id." = ".$this->table_transporters.".".$this->transporter_id,'left');
            		if($partener_id and $partener_id!="N") {
					$this->db->where($this->table.'.'.$this->partener_id,$partener_id);
					}
					
					
					if($order_years and $order_month=="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-01-01 01:00:00"). '" and "'. date("$order_years-12-31 23:59:59").'"');
					}
					if($order_years and $order_month and $order_month!="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-$order_month-01 01:00:00"). '" and "'. date("$order_years-$order_month-31 23:59:59").'"');
					}
				        if($order_status==3){
						$this->db->where($this->table.'.'.$this->order_payment_status ,3 );
						} else if($order_status==9){
						$this->db->where($this->table.'.'.$this->order_partener_status ,3 );
						} else {
						$this->db->where($this->table.'.'.$this->order_status ,$order_status );
						}
				    
				$this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		function count_all_for_associations($order_data_created="",$order_data_created_end="",$order_partener_status="N",$delivery_status="N",$order_status="") {
				
				try {
					$this->db->from($this->table);
					 if($order_data_created){
					  $order_data_created= date_create($order_data_created);
					  }
					  if($order_data_created_end){
						  $order_data_created_end= date_create($order_data_created_end);
					  }
					  if($order_data_created and $order_data_created_end) {
						$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($order_data_created and  !$order_data_created_end ) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
					}
					if($order_data_created == $order_data_created_end ) {
						
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
				
					}
					if($order_status) {
					$this->db->where($this->table.'.'.$this->order_status,$order_status);
					}

			       
			        if($delivery_status != "N" and  $delivery_status) {
						$this->db->where($this->table.'.'.$this->delivery_status,$delivery_status);
					}
					if($order_partener_status != "N" and  $order_partener_status) {
					//	$this->db->where($this->table.'.'.$this->order_partener_status,$order_partener_status);
					}
					$this->db->where($this->table.'.'.$this->is_association,1);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
				function get_all_for_associations($limit, $start,$order_data_created="",$order_data_created_end="",$order_partener_status="N",$delivery_status="N",$order_status="") {
				
			try {				 
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_status, $this->table.".".$this->order_status." = ".$this->table_status.".".$this->status_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
				  if($order_data_created){
					  $order_data_created= date_create($order_data_created);
					  }
					  if($order_data_created_end){
						  $order_data_created_end= date_create($order_data_created_end);
					  }
					  if($order_data_created and $order_data_created_end) {
						$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($order_data_created and  !$order_data_created_end ) {
					$this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
					}
				
					if($order_status) {
					//$this->db->where($this->table.'.'.$this->order_status,$order_status);
					}
				 $this->db->where($this->table.'.'.$this->is_association,1);	
			      $this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		

		
		function get_count_orders_new_today($partener_id){

			try {		
			
                       $this->db->select('COUNT(order_id) as nbr_orders');
			           $this->db->from($this->table);
                        $this->db->where('av_orders.order_data_created BETWEEN"'. date_format($order_data_created, 'Y-m-d 01:00:00'). '" and "'. date_format($order_data_created, 'Y-m-d 23:59:59').'"');
						if($partener_id){
							$this->db->where($this->partener_id,$partener_id);
						}
					$this->db->where($this->order_status, 1);
					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}
		function get_count_orders_by_partener_today($partener_id,$order_partener_status,$today=false){

			try {		
			
                       $this->db->select('COUNT(order_id) as nbr_orders');
			           $this->db->from($this->table);
					   /* new comande */
					   if($order_partener_status==1){
						  $this->db->where('av_orders.order_data_created BETWEEN"'. date( "Y-m-d 01:00:00"). '" and "'. date("Y-m-d 23:59:59").'"');
					
						  $this->db->where($this->order_payment_status, 3);
						
					   }
					     /*  commande en de preparation 2 commande refuse 4   */
					   if($order_partener_status==2  or $order_partener_status==4){
						$this->db->where('av_orders.order_dispo_date',date("Y-m-d"));
					   }
					    if($order_partener_status==3 and $today ){
						$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-d 01:00:00"). '" and "'. date("Y-m-d 23:59:59").'"');	
					  }
					 
                       $this->db->where($this->order_partener_status, $order_partener_status);
					if($partener_id){

					$this->db->where($this->partener_id, $partener_id);
					}
					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}
			/*commande partenaire en attende de payement **/
			function get_sum_amount_awaiting_payment_today($partener_id,$order_payment_status_partener,$today=false){

			try {		
                       $this->db->select('sum(order_partener_amount) as order_partener_amount');
			           $this->db->from($this->table);
					  
                       
					$this->db->where($this->order_payment_status_partener , $order_payment_status_partener);
					$this->db->where($this->order_partener_status, 3);
					
					 if($today){
						$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-d 01:00:00"). '" and "'. date("Y-m-d 23:59:59").'"');	
					  }
					  
			
					if($partener_id){
					$this->db->where($this->partener_id, $partener_id);
					}

					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}
			
			
			
			function count_all_facture($order_status ,$partener_id,$duration,$delivery_date_time,$delivery_date_time_end) {
				
				try {
					$this->db->from($this->table);
					$this->db->where($this->table.'.'.$this->order_status ,$order_status );
					/*if($partener_id and $partener_id!="N") {
					$this->db->where($this->table.'.'.$this->partener_id,$partener_id);
					}
					if($order_years and $order_month=="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-01-01 01:00:00"). '" and "'. date("$order_years-m-d 23:59:59").'"');
					}
					if($order_years and $order_month and $order_month!="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-$order_month-01 01:00:00"). '" and "'. date("$order_years-$order_month-d 23:59:59").'"');
					}*/
					
					if($delivery_date_time=='N'){
					  $delivery_date_time= '';
					  }
					  if($delivery_date_time_end=='N'){
					  $delivery_date_time_end= '';
					  }
					if($delivery_date_time){
					  $delivery_date_time= date_create($delivery_date_time);
					  }
					  if($delivery_date_time_end){
						  $delivery_date_time_end= date_create($delivery_date_time_end);
					  }
					  if($delivery_date_time and $delivery_date_time_end) {
						$this->db->where('av_orders.delivery_date_time BETWEEN"'. date_format($delivery_date_time, 'Y-m-d 01:00:00'). '" and "'. date_format($delivery_date_time_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($delivery_date_time and  !$delivery_date_time_end ) {
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date_format($delivery_date_time, 'Y-m-d 01:00:00'). '" and "'. date_format($delivery_date_time, 'Y-m-d 23:59:59').'"');
					}
					if(!$delivery_date_time_end and  !$delivery_date_time ) {
						
					
					
					if($delivery_date_time == $delivery_date_time_end ) {
						
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date_format($delivery_date_time, 'Y-m-d 01:00:00'). '" and "'. date_format($delivery_date_time, 'Y-m-d 23:59:59').'"');
				
					}
					}
					if($duration==1){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-d 01:00:00"). '" and "'. date("Y-m-d 23:59:59").'"');
					}
					if( $duration==2){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date("Y-m-d",strtotime( "previous monday" )). '" and "'. date("Y-m-d").'"');
					}
					if($duration==3){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-01 01:00:00"). '" and "'. date("Y-m-31 23:59:59").'"');
					}
					if( $date_selected==4){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
					}
					if($duration==5){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-01-01 01:00:00"). '" and "'. date("Y-12-31 23:59:59").'"');
					}
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
				function get_all_facture($limit, $start,$order_status ,$partener_id,$duration,$delivery_date_time,$delivery_date_time_end) {
				
			try {				 
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_customers, $this->table.".".$this->customer_id." = ".$this->table_customers.".".$this->customer_id,'left');
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				$this->db->join($this->table_taxe, $this->table.".".$this->taxe_id." = ".$this->table_taxe.".".$this->taxe_id,'left');
            	$this->db->join($this->table_transporters, $this->table.".".$this->transporter_id." = ".$this->table_transporters.".".$this->transporter_id,'left');
            		if($partener_id and $partener_id!="N") {
					$this->db->where($this->table.'.'.$this->partener_id,$partener_id);
					}
					
					
					/*if($order_years and $order_month=="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-01-01 01:00:00"). '" and "'. date("$order_years-12-31 23:59:59").'"');
					}
					if($order_years and $order_month and $order_month!="N"){
					$this->db->where('av_orders.order_data_created BETWEEN"'. date( "$order_years-$order_month-01 01:00:00"). '" and "'. date("$order_years-$order_month-31 23:59:59").'"');
					}*/
					if($delivery_date_time=='N'){
					  $delivery_date_time= '';
					  }
					  if($delivery_date_time_end=='N'){
					  $delivery_date_time_end= '';
					  }
					 
					if($delivery_date_time){
					  $delivery_date_time= date_create($delivery_date_time);
					  }
					  if($delivery_date_time_end){
						  $delivery_date_time_end= date_create($delivery_date_time_end);
					  }
					  if($delivery_date_time and $delivery_date_time_end) {
						$this->db->where('av_orders.delivery_date_time BETWEEN"'. date_format($delivery_date_time, 'Y-m-d 01:00:00'). '" and "'. date_format($delivery_date_time_end, 'Y-m-d 23:59:59').'"');
				     }	
					if($delivery_date_time and  !$delivery_date_time_end ) {
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date_format($delivery_date_time, 'Y-m-d 01:00:00'). '" and "'. date_format($delivery_date_time, 'Y-m-d 23:59:59').'"');
					}
					if($delivery_date_time_end!="" and  !$delivery_date_time!="" ) {
						
					
					
					if($delivery_date_time == $delivery_date_time_end ) {
						
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date_format($delivery_date_time, 'Y-m-d 01:00:00'). '" and "'. date_format($delivery_date_time, 'Y-m-d 23:59:59').'"');
				
					}
					}
					
					if($duration==1){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-d 01:00:00"). '" and "'. date("Y-m-d 23:59:59").'"');
					}
					if( $duration==2){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date("Y-m-d 01:00:00",strtotime( "previous monday" )). '" and "'. date("Y-m-d 23:59:5").'"');
					}
					if($duration==3){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-01 01:00:00"). '" and "'. date("Y-m-31 23:59:59").'"');
					}
					if( $date_selected==4){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-m-d 01:00:00", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d 23:59:5").'"');
					}
					if($duration==5){
					$this->db->where('av_orders.delivery_date_time BETWEEN"'. date( "Y-01-01 01:00:00"). '" and "'. date("Y-12-31 23:59:59").'"');
					}

				$this->db->where($this->table.'.'.$this->order_status ,$order_status );
				
				$this->db->order_by($this->order_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			
			
			function get_new_order_for_partenere($partener_id,$is_partener_singal) {
				
			try {
			
			$this->db->select('*');		
			$this->db->from($this->table);
		    $this->db->where($this->table.'.'.$this->partener_id ,$partener_id);
			$this->db->where($this->table.'.'.$this->order_partener_status ,1);
			$this->db->where($this->table.'.'.$this->order_status ,1);
			
			$this->db->where($this->table.'.'.$this->is_partener_singal ,$is_partener_singal );

			if($is_partener_singal==2){
							 $data_partener_up_auto_status= date_create(date( "Y-m-d H:i:s", strtotime( "-30 minutes" ) ));
					
					
					
					 	$this->db->where('av_orders.data_partener_up_auto_status BETWEEN"'. date_format($data_partener_up_auto_status, 'Y-m-d H:i:s'). '" and "'.date("Y-m-d H:i:s").'"');
				    
			
			}
			$this->db->order_by($this->order_id,"desc");
			$query = $this->db->get();
			
			return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}	
			
			function get_this_order($data_id){
		 
			try {
				
					$this->db->select('*');		
					$this->db->from($this->table);
					
           
				$this->db->where($this->table.".".$this->order_id,$data_id);
					$query = $this->db->get();

  
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}	
			
			
			function get_count_orders_by_partener_exceeds_date_liv($partener_id,$order_partener_status){

			try {		
			
                       $this->db->select('COUNT(order_id) as nbr_orders');
			           $this->db->from($this->table);
					  
					 
						 $this->db->where('av_orders.delivery_date_time <', date("Y-m-d H:i:s"));
						  $this->db->where($this->order_payment_status, 2);
						
					  
					   
					 
                       $this->db->where($this->order_partener_status, $order_partener_status);
					if($partener_id){

					$this->db->where($this->partener_id, $partener_id);
					}
					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}	
			
			}
			
			
			
				function get_all_facture_not_paiments($partener_id=null) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				if($partener_id){
				$this->db->where($this->partener_id, $partener_id);
				}
				$this->db->where($this->order_partener_status , 3);
				 $this->db->where($this->order_payment_status_partener, 1);
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			
			function get_sum_facture_not_paiments($orders_id){

			try {		
			
                    $this->db->select_sum('order_partener_amount');
			        $this->db->from($this->table);
                   
               $this->db->where_in($this->field_id, $orders_id);
					


					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}		
			
			
				function add_new_entry_log_orders_parteners($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_log_orders_parteners, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
			
				function get_all_log_orders_parteners($order_id=null) {
				
			try {
				$this->db->select('*,newPartener.partener_lastname as new_partener_lastname,oldPartener.partener_lastname as old_partener_lastname');		
				$this->db->from($this->table_log_orders_parteners);
				$this->db->join($this->table_parteners.' AS newPartener' , " newPartener.".$this->partener_id." = ".$this->table_log_orders_parteners.".".$this->new_partener_id,'left');
				$this->db->join($this->table_parteners.' AS oldPartener' ,"oldPartener.".$this->partener_id." = ".$this->table_log_orders_parteners.".".$this->old_partener_id,'left');
				$this->db->join($this->table_accounts, $this->table_log_orders_parteners.".".$this->account_id." = ".$this->table_accounts.".".$this->account_id,'left');
				
				
				IF($order_id) {
					$this->db->where($this->order_id, $order_id);
				
				}
				
		
				$this->db->order_by($this->log_order_partener_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
}