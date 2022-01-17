<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_categories extends CI_Model {
	
public $table='av_categories';
public $parent_id='parent_id';
public $field_id='categorie_id';
public $categorie_name='categorie_name';

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
					

		
			function count_all($parent_id,$keyword="N",$categorieIds="N") {
				
				try {
				
					$this->db->from($this->table);
					if($parent_id) {
					
					$query=$this->db->where($this->parent_id.'!=', 0);
				} else {
					$query=$this->db->where($this->parent_id, 0);
				}
				
				  if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$param_1 = str_replace("'", "\'",$param_1);
						$this->db->where("(categorie_name like '%$param_1%')");
					}
				
					if($categorieIds != "N" and  $categorieIds) {
						$this->db->where($this->table.'.'.$this->parent_id,$categorieIds);
					}
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start,$parent_id,$keyword="N",$categorieIds="N") {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
			   $query =$this->db->limit($limit, $start);
			if($parent_id){
					
					$query=$this->db->where($this->parent_id.'!=', 0);
				} else {
					$query=$this->db->where($this->parent_id, 0);
				}
				
				  if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$param_1 = str_replace("'", "\'",$param_1);
						$this->db->where("(categorie_name like '%$param_1%')");
					}
				
					if($categorieIds != "N" and  $categorieIds) {
						$this->db->where($this->table.'.'.$this->parent_id,$categorieIds);
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

	

		
			function get_sub_categories($parent_id) {

		try {
		
			$this->db->select('*');		
			$this->db->from($this->table);
			
			$query=$this->db->where($this->parent_id, $parent_id);
			
			$query = $this->db->get();
			return $query->result();

		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);

		return false;
		}

		}
		function get_sub_categoriesss() {

		try {
		
			$this->db->select('*');		
			$this->db->from($this->table);
			
			$query=$this->db->where($this->parent_id.'!=', 0);
			
			$query = $this->db->get();
			return $query->result();

		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);

		return false;
		}

		}
		function get_categories($parent_id) {

		try {
		
			$this->db->select('*');		
			$this->db->from($this->table);
			
			if($parent_id){
					
					$query=$this->db->where($this->parent_id.'!=', 0);
				} else {
					$query=$this->db->where($this->parent_id, 0);
				}
			
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
		
			function get_category_by_name($name){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->categorie_name => $name));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
			
		
}