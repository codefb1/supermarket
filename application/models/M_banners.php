<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_banners extends CI_Model {
	
public $table='av_banners';
public $table_pages='fc_pages';
public $field_id='banner_id';
public $pages_table='tr_pages';
public $field_name='banner_name';
public $field_picture='banner_picture';
public $commun_field_id='tr_page_id';
public $data_created='data_created';
public $data_updated='data_updated';
public $banner_data_status='banner_data_status';
public $field_created='data_created';
public $field_updated='data_updated';
public $field_status='data_status';
public $table_products='av_products';

public $product_id='product_id';
public $bannier_position='bannier_position';		
		
			function get_all($position) {
				
			try {
				$this->db->select('*,');		
				$this->db->from($this->table);
				$this->db->join($this->table_products, $this->table.".".$this->product_id." = ".$this->table_products.".".$this->product_id,'left');
	            $this->db->where($this->banner_data_status, 1);
				$this->db->where($this->bannier_position, $position);
				$this->db->order_by($this->field_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_bannier_top() {
				
			try {
				$this->db->select('*,');		
				$this->db->from($this->table);
				 $this->db->where($this->banner_data_status, 1);
				$this->db->where($this->bannier_position, 1);
				
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
			
		}
	
		function get_bannier_emplacement($bannier_position) {
				
			try {
				$this->db->select('*,');		
				$this->db->from($this->table);
				 $this->db->where($this->banner_data_status, 1);
				$this->db->where($this->bannier_position, $bannier_position);
			
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
			
		}
		
	
				
					
			

}