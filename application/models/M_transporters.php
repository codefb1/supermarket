<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_transporters extends CI_Model {
	
public $table='av_transporters';
public $table_countries='av_countries';
public $field_id='transporter_id';
public $data_created='transporte_data__created';
public $data_updated='transporter_data_updated';
public $transporter_data_status='transporter_data_status';


	
		
			function get_all() {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->transporter_data_status,1);
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
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
		
	
					
			function get_all_table() {
				
			try {
			
		
				$query = $this->db->get_where($this->table);
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}

}