<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_homeBlocks extends CI_Model {
	
public $table='av_home_blocks';
public $field_id='home_block_id';


public $field_picture='banner_picture';
public $commun_field_id='tr_page_id';
public $data_created='data_created';
public $data_updated='data_updated';
public $data_status='data_status';
public $field_created='data_created';
public $field_updated='data_updated';
public $field_status='data_status';
public $table_products='av_products';
public $product_id='product_id';
		
		function get_this($param_id){
		 
			try {
				
		            $this->db->select('*,');		
					$this->db->from($this->table);
					$this->db->join($this->table_products, $this->table.".".$this->product_id." = ".$this->table_products.".".$this->product_id,'left');
	                $this->db->where($this->table.".".$this->field_id,$param_id);
					$query =$this->db->get();

  
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
		
		
		
					
			

}