<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_certificats extends CI_Model {
	
public $table='av_certificats';
public $table_pages='fc_pages';
public $field_id='certificat_id';
public $data_created='certificat_data_created';
public $data_updated='certificat_data_updated';
public $certificat_data_status='certificat_data_status';

					
			function get_all_table() {
				
			try {
				$query =$this->db->limit($limit, $start);
				$this->db->select('*,');		
				$this->db->where($this->certificat_data_status, 1);
				$this->db->from($this->table);
				
				$this->db->order_by($this->field_id,"asc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}

}