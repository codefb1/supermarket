<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_newsletters extends CI_Model {
	
public $table='av_newsletters';

public $field_id='newsletter_id';
public $field_email='client_email';
public $field_created='newsletter_created';
public $data_status='newsletter_status';



		function checkEmail($email){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_email => $email));
					
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
		
	
}