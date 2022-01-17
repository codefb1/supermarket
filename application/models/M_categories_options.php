<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_categories_options extends CI_Model {
public $table='av_categories_options';	
public $table_categories='av_categories';
public $table_options_types='av_options_types';
public $categorie_id='categorie_id';
public $field_id='categorie_option_id';
public $option_name='option_name';
public $option_type_id='option_type_id';

		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
		
		
		
				

		
			
		
			function get_options($categorieIds,$groupBy) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_options_types, $this->table.".".$this->option_type_id." = ".$this->table_options_types.".".$this->option_type_id,'left');
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieIds);
			    $this->db->order_by($this->field_id,"desc");
				if($groupBy){
					 $this->db->group_by($this->table_options_types.'.'.$this->option_type_id);
				}
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
				/* Sart Delete Query Function */
			
			
			
		
}