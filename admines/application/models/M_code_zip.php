<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_code_zip extends CI_Model {
	
public $table='av_departement';
public $table_code_zip_parteners='av_code_zip_parteners';

public $field_id='departement_id';
public $code='departement_code';
public $partener_id='partener_id';
public $ville_id='ville_id';
public $code_zip_partener_id='code_zip_partener_id';
		
		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function get_this_code($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->code => $param_id));
					
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
				
					function get_all_table() {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->order_by($this->field_id,"asc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
				function add_new_entry_code_zip_parteners($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_code_zip_parteners, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		
		
			/* Sart Delete Query Function */
			function deletethis_code_zip_parteners($partener_id) {

			try {
				$query=$this->db->where($this->partener_id, $partener_id);
				$query=$this->db->delete($this->table_code_zip_parteners);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			
		
		
		function get_code_zip_partener($partener_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_code_zip_parteners);
				$query=$this->db->where($this->partener_id, $partener_id);
				$this->db->order_by($this->code_zip_partener_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}

}