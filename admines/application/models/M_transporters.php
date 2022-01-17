<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_transporters extends CI_Model {
	
public $table='av_transporters';
public $table_countries='av_countries';
public $field_id='transporter_id';
public $data_created='transporte_data__created';
public $data_updated='transporter_data_updated';
public $data_status='transporter_data_status';


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
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
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
			
		
				$query = $this->db->get_where($this->table);
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}

}