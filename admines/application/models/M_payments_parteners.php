<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_payments_parteners extends CI_Model {
	

public $table='av_payments_parteners';
public $table_payments_parteners_details='av_payments_parteners_details';
public $table_parteners='av_parteners';
public $table_orders='av_orders';
public $field_id='payment_partener_id';
public $partener_id='partener_id';
public $order_id='order_id';
public $payment_partener_detail_id='payment_partener_detail_id';
public $payment_partener_id='payment_partener_id';
		function count_all() {
				
				try {
					$this->db->from($this->table);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start) {
				
			try {
				$query =$this->db->limit($limit, $start);
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_parteners, $this->table.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				
				$this->db->order_by($this->field_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
		
		
		
		
		function add_new_entry_payments_parteners($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_payments_parteners_details, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
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
			
		
				$query = $this->db->get_where($this->table);
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_all_table_by_parteners($partener_id) {
				
			try {
			
		        $query=$this->db->where($this->partener_id, $partener_id);
				$query = $this->db->get_where($this->table);
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_orders_list($payment_partener_id) {
				
			try {
			
		      
					$this->db->select('*');		
				$this->db->from($this->table_payments_parteners_details);
				$this->db->join($this->table_orders, $this->table_payments_parteners_details.".".$this->order_id." = ".$this->table_orders.".".$this->order_id,'left');
				$query=$this->db->where($this->payment_partener_id, $payment_partener_id);
				
				$this->db->order_by($this->payment_partener_detail_id,"desc");
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function count_all_payments($partener_id) {
				
				try {
					$this->db->from($this->table);
					$this->db->where($this->partener_id, $partener_id);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_payments($limit, $start,$partener_id) {
				
			try {	
				$query =$this->db->limit($limit, $start);
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->partener_id, $partener_id);
				$this->db->order_by($this->field_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}

}