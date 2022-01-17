<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_settings extends CI_Model {
	
		public $table='av_settings';
		public $field_id='setting_id';		
		public $field_site_name='site_name';

		function get_this(){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => 1));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
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
	
}