<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_mails extends CI_Model {
	
public $table='sc_emails';
public $field_id='email_id';
public $data_created='data_created';
public $customer_id='customer_id';
public $data_status='data_status';
public $ecole_inscription_id='ecole_inscription_id';
public $type_email='type_email';
public $customer_formation_id='customer_formation_id';

	
		
		
		
		
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
		
					function get_all_table($type,$pram) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				if($type=="formation"){
					$query=$this->db->where($this->customer_formation_id, $customer_formation_id);
					 
					}
					if($type=="ecole"){
					$query=$this->db->where($this->ecole_inscription_id, $ecole_inscription_id);
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