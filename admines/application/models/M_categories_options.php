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
					

		
			function count_all($keyword="N",$categorieIds="N",$optionTypeId="N") {
				
				try {
				
					$this->db->from($this->table);
				
				
				if($keyword != "N" and  $keyword) {	
				$param_1 = trim($keyword);
				$param_1 = str_replace('""', '',$param_1);
				$param_1 = str_replace("'", "\'",$param_1);
				$this->db->where("(option_name like '%$param_1%')");
				}

				if($optionTypeId != "N" and  $optionTypeId) {
				$this->db->where($this->table.'.'.$this->option_type_id,$optionTypeId);
				}
				if($categorieIds != "N" and  $categorieIds) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieIds);
				}

					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start,$keyword="N",$categorieIds="N",$optionTypeId="N") {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				$this->db->join($this->table_options_types, $this->table.".".$this->option_type_id." = ".$this->table_options_types.".".$this->option_type_id,'left');
				
			   $query =$this->db->limit($limit, $start);
				if($keyword != "N" and  $keyword) {	
				$param_1 = trim($keyword);
				$param_1 = str_replace('""', '',$param_1);
				$param_1 = str_replace("'", "\'",$param_1);
				$this->db->where("(option_name like '%$param_1%')");
				}

				if($optionTypeId != "N" and  $optionTypeId) {
				$this->db->where($this->table.'.'.$this->option_type_id,$optionTypeId);
				}
				if($categorieIds != "N" and  $categorieIds) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieIds);
				}
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

	

		
			function get_option_by_categories($categorie_id) {

		try {
		
			$this->db->select('*');		
			$this->db->from($this->table);
			
			$query=$this->db->where($this->categorie_id, $categorie_id);
			
			$query = $this->db->get();
			return $query->result();

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