<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_customer_shopping extends CI_Model {
	
public $table='av_customer_shopping';
public $table_customer_shopping_products='av_customer_shopping_products';
public $table_products='av_products';
public $field_id='customer_shopping_id';
public $customer_shopping_id='customer_shopping_id';
public $product_id='product_id';
public $customer_id='customer_id';
public $customer_shopping_product_id='customer_shopping_product_id';

		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
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
					

		
			function count_all() {
				
				try {
				
					$this->db->from($this->table);
						$this->db->where($this->table.".".$this->customer_id, $this->session->userdata('customer_id'));
				
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
			   $query =$this->db->limit($limit, $start);
			   	$this->db->where($this->table.".".$this->customer_id, $this->session->userdata('customer_id'));
				
			    $this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			 
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
					
			function get_all_table($customer_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->customer_id, $customer_id);
			
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			
			function add_new_customer_shopping_products($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_customer_shopping_products, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		function deletethis_customer_shopping_products($data_id) {

			try {
			$query=$this->db->where($this->customer_shopping_product_id, $data_id);
			$query=$this->db->delete($this->table_customer_shopping_products);

			return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			function checkGrpoupShopping($product_id,$customer_id)
			{
					$this->db->from($this->table);
				 $this->db->join($this->table_customer_shopping_products, $this->table.".".$this->customer_shopping_id." = ".$this->table_customer_shopping_products.".".$this->customer_shopping_id,'left');
                     $this->db->where($this->table_customer_shopping_products.'.'.$this->product_id, $product_id);
					 $this->db->where($this->table.'.'.$this->customer_id, $customer_id);
					 $query = $this->db->get();
					return $query->row();
				 
				
				}
				/* Sart Delete Query Function */
			function deleteListProductpurchases($customer_shopping_id) {

			try {
			$query=$this->db->where($this->customer_shopping_id, $customer_shopping_id);
			$query=$this->db->delete($this->table_customer_shopping_products);

			return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			
			function get_customer_product_shopping($customer_shopping_id)
			{
				$this->db->from($this->table_customer_shopping_products);
				
				$this->db->where($this->table_customer_shopping_products.'.'.$this->customer_shopping_id, $customer_shopping_id);
				
				$this->db->order_by($this->customer_shopping_id,"desc");
				$query = $this->db->get();
				return $query->result();
				 
				
				}
				function deleteProductpurchases($customer_shopping_id)
			{
				$this->db->from($this->table_customer_shopping_products);
				
				$this->db->where($this->table_customer_shopping_products.'.'.$this->customer_shopping_id, $customer_shopping_id);
				
				$this->db->order_by($this->customer_shopping_id,"desc");
				$query = $this->db->get();
				return $query->result();
				 
				
				}
				
				function get_this_purchases($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_customer_shopping_products, array($this->customer_shopping_product_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
}