<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_associations extends CI_Model {
	
public $table='av_associations';
public $table_countries='av_countries';
public $field_id='association_id';
public $data_created='association_created';
public $data_updated='association_updated';
public $data_status='association_status';
public $field_created='partener_created';
public $field_updated='data_updated';
public $field_status='data_status';
public $association_country_id='association_country_id';
public $country_id='country_id';
public $association_status='association_status';

		function count_all() {
				
				try {
					$this->db->from($this->table);
					$this->db->where($this->table.'.'.$this->association_status,1);
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
				$this->db->join($this->table_countries, $this->table.".".$this->association_country_id." = ".$this->table_countries.".".$this->country_id,'left');

	            $this->db->where($this->table.'.'.$this->association_status,1);
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
				
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_countries, $this->table.".".$this->association_country_id." = ".$this->table_countries.".".$this->country_id,'left');
	            $this->db->where($this->table.'.'.$this->field_id,$param_id);
				$query = $this->db->get();
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
		function get_this_assocation($param_id){
		 
			try {
				
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_countries, $this->table.".".$this->association_country_id." = ".$this->table_countries.".".$this->country_id,'left');
                 $this->db->where($this->table.".".$this->field_id,$param_id);
				
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				
				
  
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
		
		
	

}