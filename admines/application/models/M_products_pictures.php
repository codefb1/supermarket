<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_products_pictures extends CI_Model {
	
public $table='av_products_pictures'; 
public $field_id='product_picture_id';
public $pages_table='pro_pages';
public $product_pictures='product_pictures';
public $product_id='product_id';
public $picture_data_focus='picture_data_focus';
public $picture_data_status='picture_data_status';
public $field_meta_keywords='page_meta_keywords';
public $field_content='page_content';
public $field_content_1='page_content_1';
public $field_content_2='page_content_2';
public $field_content_3='page_content_3';
public $field_url='page_url';
public $field_type='page_type';
public $data_created='data_created';
public $data_updated='data_updated';
public $data_status='data_status';
public $picture_view='picture_view';


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
				$query =$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get_where($this->table);

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
		
		function updatefocus($product_id,$update_entry){
		 
			try {
			
				$this->db->where($this->product_id, $product_id);
			
				$this->db->update($this->table, $update_entry);

				return true;
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
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
			function get_all_pages() {
				
			try {
			
		
				$query = $this->db->get_where($this->table);
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			
			function get_all_product_picture($product_id) {
				
			try {
			$query=$this->db->where($this->product_id, $product_id);

		    $query =$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get_where($this->table);
				
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			function get_one_product_picture($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->product_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
			function get_one_product_picture_cover($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->product_id => $param_id,$this->picture_data_focus=>1));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function get_one_product_picture_partener($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->product_id => $param_id,$this->picture_view=>2));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
			function get_one_product_picture_categorie($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->product_id => $param_id,$this->picture_view=>1,$this->picture_data_focus=>1));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
			/* Sart Delete Query Function */
			function deleteProduct($product_id) {

			try {
				$query=$this->db->where($this->product_id, $product_id);
				$query=$this->db->delete($this->table);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
}