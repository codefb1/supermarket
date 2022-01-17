<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_categories extends CI_Model {
	
public $table='av_categories';
public $parent_id='parent_id';
public $field_id='categorie_id';
public $categorie_id='categorie_id';
public $data_status_categorie='data_status_categorie';
public $table_products='av_products';
public $sub_categorie_id='sub_categorie_id';
public $is_show_menu='is_show_menu';
public $count_products='count_products';
public $table_categories_couffin='av_categories_couffin';
public $categorie_couffin_id='categorie_couffin_id';
public $data_status_categorie_couffin='data_status_categorie_couffin';

function get_this_categories_couffin($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_categories_couffin, array($this->categorie_couffin_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
			function count_all_couffin() {
				
				try {
				
					$this->db->from($this->table_categories_couffin);
				  $query=$this->db->where($this->data_status_categorie_couffin, 1);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_couffin($limit, $start) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_categories_couffin);
			    $query =$this->db->limit($limit, $start);
			
			     $query=$this->db->where($this->data_status_categorie_couffin, 1);
			    $this->db->order_by($this->categorie_couffin_id,"desc");
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
		
		
		
		
		
		
			function count_all($parent_id) {
				
				try {
				
					$this->db->from($this->table);
					if($parent_id) {
					
					$query=$this->db->where($this->parent_id, $parent_id);
				} else {
					$query=$this->db->where($this->parent_id, 0);
				}
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start,$parent_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
			   $query =$this->db->limit($limit, $start);
			if($parent_id){
					
					$query=$this->db->where($this->parent_id, $parent_id);
				} else {
					$query=$this->db->where($this->parent_id, 0);
				}
			    $this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
					 function count_sub_categories_all($parent_id) {
				
				try {
					$this->db->from($this->table);
				
				
				$this->db->where_not_in($this->table.'.'.$this->parent_id,$parent_id);
				 $this->db->where_not_in($this->table.'.'.$this->parent_id,101);
				
				$query=$this->db->where($this->data_status_categorie, 1);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function count_sub_categories_alls($parent_id=null) {
				
				try {
				
					$this->db->from($this->table);
					if($parent_id){
						 $this->db->where_in($this->table.'.'.$this->parent_id,$parent_id);
				} else {
					$query=$this->db->where($this->parent_id.'>', 0);
				}
				$this->db->where($this->table.'.'.$this->count_products.'>', 0);
				$query=$this->db->where($this->data_status_categorie, 1);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
			/*function get_sub_categories_all($limit, $start,$parent_id,$lastID=null) {

		try {
		
			$this->db->limit($limit);
				
				$this->db->select('*');		
				$this->db->from($this->table);
				
				
			if($parent_id){
					
					
					 $this->db->where_in($this->table.'.'.$this->parent_id,$parent_id);
				} else {
					//$this->db->join($this->table_products, $this->table.".".$this->categorie_id." = ".$this->table_products.".".$this->sub_categorie_id,'inner');
				
					$query=$this->db->where($this->parent_id.'>', 0);
				}
				
				 if($lastID) {
				 $this->db->where($this->table.'.'.$this->categorie_id.'>',$lastID);
			   }
			
			
				
		     $this->db->where($this->data_status_categorie, 1);
			 $this->db->order_by($this->table.'.'.$this->field_id,"asc");
			$query = $this->db->get();
			return $query->result();

		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);

		return false;
		}

		}*/
	
function get_sub_categories_all($limit, $start,$parent_id) {
				
			try {
				
					
				$this->db->select('*');		
				$this->db->from($this->table);
				if($parent_id){
					
					
					 $this->db->where_not_in($this->table.'.'.$this->parent_id,$parent_id);
				} else {
					//$this->db->join($this->table_products, $this->table.".".$this->categorie_id." = ".$this->table_products.".".$this->sub_categorie_id,'inner');
				
					$query=$this->db->where($this->parent_id.'>', 0);
				}
				
					 $this->db->where_not_in($this->table.'.'.$this->parent_id,101);
				
				/* if($lastID) {
				 $this->db->where($this->table.'.'.$this->categorie_id.'<',$lastID);
				
			   }*/
			          $this->db->limit($limit, $start);
				
			        $this->db->where($this->data_status_categorie, 1);
				    $this->db->where($this->table.'.'.$this->count_products.'>', 0);
					$this->db->order_by($this->table.'.'.$this->count_products,"desc");
				
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
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
			$query=$this->db->where($this->data_status_categorie, 1);
			
			$query = $this->db->get();
			return $query->result();

		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);

		return false;
		}

		}
		
		
			function get_categories_menu() {

		try {
		
			$this->db->select('*');	
            			
			$this->db->from($this->table);
			
		
					
					$query=$this->db->where($this->parent_id, 0);
				
					$query=$this->db->where($this->is_show_menu, 2);
				
				
			$query=$this->db->where($this->data_status_categorie, 1);
			
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
				
			$query=$this->db->where($this->data_status_categorie, 1);
			
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
				$this->db->where($this->data_status_categorie, 1);
			
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			
		
}