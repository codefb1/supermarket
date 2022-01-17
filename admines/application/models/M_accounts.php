<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_accounts extends CI_Model {

	public $table='av_accounts';
	public $field_id='account_id';
	public $field_email='account_email';
	public $field_password='account_password';
	public $field_lastname='account_lastname';
	public $field_firstname='account_firstname';
	public $data_created='data_created';
	public $data_updated='data_updated';
	public $data_status='data_status';
	public $partener_id='partener_id';
	
		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function get_this_partener($partener_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->partener_id => $partener_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
				function count_all() {
				
				try {
					$this->db->from($this->table);
					
					$this->db->where($this->partener_id,0);	
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
		        $this->db->where($this->partener_id,0);
				$query = $this->db->get_where($this->table);
				
				return $query->result();
			 
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
			

}