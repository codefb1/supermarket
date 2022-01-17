<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_customers extends CI_Model {

	public $table='av_customers';
	public $table_orders='av_orders';
	public $field_id='customer_id';
	public $deplome_id='deplome_id';
	public $field_email='customer_email';
	public $field_password='customer_password';
	public $field_lastname='customer_lastname';
	public $field_firstname='customer_firstname';
	public $customer_created='customer_created';
	public $customer_updated='customer_updated';
	public $customer_data_status='customer_data_status';
	public $customer_id='customer_id';
	
		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		function check($email){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_email => $email));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		function checkthisaccount($email, $password){
			 
		   try {
			   
				$this->db->select('*');
				$this->db->from($this->table);
	
				$this->db->where($this->table.'.'.$this->field_email,$email);
				$this->db->where($this->table.'.'.$this->field_password,$password);
				$this->db->where($this->table.'.'.$this->customer_data_status,1);
				$query = $this->db->get();
				
				 if($query) {
						
						 return $query->row();
						
					}
					
					else {
						
						return array();
					}
					
			} 	catch (Exception $exc) {
				
				  $this->exceptionhandler->handle($exc);
				  
				  return false;
				}	
		 }			
		 
				function count_all($keyword="N",$status="N") {
				
				try {
					$this->db->from($this->table);
					$this->db->join($this->table_orders, $this->table.".".$this->customer_id." = ".$this->table_orders.".".$this->customer_id,'inner');
				
					if($keyword != "N") {	
						$param_1 = trim($keyword);
						$this->db->where("(customer_firstname like '%$param_1%' OR customer_lastname like '%$param_1%' OR customer_email like '%$param_1%' 
					    OR customer_phone like '%$param_1%' OR customer_id like '%$param_1%' )");
					}
				
					
					if($status != "N") {
						//$this->db->where($this->table.'.'.$this->customer_data_status,$status);
					}
					
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
				function get_all($limit, $start,$keyword="N",$status="N",$export=0) {
				
			try {
				if($export == 0){
					$this->db->limit($limit, $start);
				}
				$this->db->select('*');		
				$this->db->from($this->table);
				
				if($keyword != "N") {	
						$param_1 = trim($keyword);
						$this->db->where("(customer_firstname like '%$param_1%' OR customer_lastname like '%$param_1%' OR customer_email like '%$param_1%' 
					    OR customer_phone like '%$param_1%' OR customer_id like '%$param_1%' )");
					}
				
					
					if($status != "N") {
						$this->db->where($this->table.'.'.$this->customer_data_status,$status);
					}
				
				$this->db->order_by($this->field_id,"desc");
				
				$this->db->group_by($this->field_id); 
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function add_new_entry($new_entry){
		 
			try {
			
				if($this->db->insert($this->table, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		
		function update_this($param_1,$update_entry){
		 
			try {
			
				$this->db->where($this->field_id, $param_1);
			
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
				$query=$this->db->where($this->field_id, $data_id);
				$query=$this->db->delete($this->table);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
					/* Sart Update Status Query function */
			public function update_status($data_post,$data_id){
				
			try {
				$query=$this->db->where($this->field_id, $data_id);
				$query=$this->db->update($this->table, $data_post);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}
				}
				
				function get_all_table() {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			

}