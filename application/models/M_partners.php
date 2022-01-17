<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_partners extends CI_Model {
	
public $table='av_parteners';
public $field_id='partener_id';
public $data_created='partener_created';
public $data_updated='partener_updated';
public $data_status='partener_status';
public $field_created='partener_created';
public $field_updated='data_updated';
public $field_status='data_status';
public $partener_zip='partener_zip';
public $partener_type='partener_type';
public $table_certificats='av_certificats';
public $certificat_id='certificat_id';
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
		function get_this($param_id){
		 
			try {
				
				$this->db->from($this->table);
				 $this->db->join($this->table_certificats, $this->table.".".$this->certificat_id." = ".$this->table_certificats.".".$this->certificat_id,'left');

				$this->db->where($this->field_id,$param_id);
				$query = $this->db->get();	
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
			function get_this_certificats($param_id){
		 
			try {
				$this->db->from($this->table_certificats);
				 
				$this->db->where($this->certificat_id,$param_id);
				$query = $this->db->get();	
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		function get_this_by_zip($partener_zip){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->partener_zip => $partener_zip));
					
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
				
				function get_all_table($partener_type=null) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				if($partener_type){
				$this->db->where($this->partener_type, $partener_type);
				}
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
				
					
			

}