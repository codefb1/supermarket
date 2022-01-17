<?php
/* Start Debug Service */
 ini_set('display_errors', 'On');
 error_reporting(1);
 define('MP_DB_DEBUG', true);
 /* End Debug Service */ 


class M_authentification extends CI_Model {
  public $table='av_accounts';
 
 /*** Init Tables Fields ***/
 public $field_id='account_id';
 public $field_email='account_email';
 public $field_password='account_password';
  public $field_status='data_status';

 
  
 

    public function _construct(){
       parent::_construct();
    }
   

   /* Check account identity and validity */
  



	 function checkthisaccount($email, $password){
			 
		   try {
			   
				$this->db->select('*');
				$this->db->from($this->table);
	
				$this->db->where($this->table.'.'.$this->field_email,$email);
				$this->db->where($this->table.'.'.$this->field_password,$password);
				$this->db->where($this->table.'.'.$this->field_status,1);
				$query = $this->db->get();
				
				 if($query) {
						
						 return $query->row();
						
					}
					
					else {
						
						return array();
					}
					
			} 	catch (Exception $exc) {
				
				  $this->exceptionhandler->handle($exc);
				  
				  return false;
				}	
		 }			
}

?>