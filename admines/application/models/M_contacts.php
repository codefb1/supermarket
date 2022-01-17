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
				$this->db->select('*,');		
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
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
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
	function get_contact_vu_total(){

			try {		
			
                    $this->db->select('COUNT(contact_id) as nbr_contact');
			        $this->db->from($this->table);
					$this->db->where($this->contact_vu, 0);
					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}
		function get_all_contact_vu() {
				
			try {
				$query =$this->db->limit($limit, $start);
				
			
				$this->db->where($this->contact_vu, 0);
				$query = $this->db->order_by($this->field_id,"desc");
				$query = $this->db->get_where($this->table);


				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
			function get_contact_total($date_time){

			try {		
			
                    $this->db->select('COUNT(contact_id) as nbr_devis');
			        $this->db->from($this->table);
					
                   if($date_time==1){
					
					$this->db->where('CAST('.$this->table.".".$this->contact_created.' AS Date)=',date("Y-m-d"));
					}

					if( $date_time==2){
					$this->db->where('CAST(ft_contacts.contact_created As Date) BETWEEN"'. date("Y-m-d",strtotime( "previous sunday" )). '" and "'. date("Y-m-d").'"');
					}
					if( $date_time==3){
					//$this->db->where('CAST(pb_orders.contact_created As Date) BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
					$this->db->where('YEAR('.$this->table.'.contact_created)',date('Y'));
					$this->db->where('MONTH('.$this->table.'.contact_created)',date('m'));
					}

					if( $date_time==4){
					//$this->db->where('CAST(pb_orders.contact_created As Date) BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
					$this->db->where('YEAR('.$this->table.'.contact_created)',date('Y'));
					}	
                  
				
						

					$query = $this->db->get();	 
					return $query->row();
			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}		

			}
			function get_all_fin() {
				
			try {
			$query =$this->db->limit(10);
				$query =$this->db->join($this->table_clubs, $this->table.".".$this->club_id." = ".$this->table_clubs.".".$this->club_id,'left');
				
		     $query =$this->db->order_by($this->field_id,"desc");
			 $query = $this->db->get_where($this->table);
				
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
}