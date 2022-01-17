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

		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
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
			
		
			
			function get_all_product_picture($product_id) {
				
			try {
			$query=$this->db->where($this->product_id, $product_id);
		    $query=$this->db->where($this->picture_view, 1);
            $query=$this->db->where($this->picture_data_focus, 1);
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
				
				$query = $this->db->get_where($this->table, array($this->product_id => $param_id,$this->picture_view=>1,$this->picture_data_focus=>1));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
}