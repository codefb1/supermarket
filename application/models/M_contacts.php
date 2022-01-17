<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_contacts extends CI_Model {
	
public $table='av_contacts';
public $field_id='contact_id';


public $field_email='contact_email';
public $field_name='contact_name';
public $contact_created='contact_created';
public $data_status='contact_status';
public $field_subject='contact_subject';
public $field_message='contact_message';
public $contact_vu='contact_vu';

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