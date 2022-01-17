<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_newsletters extends CI_Model {
	
public $table='av_newsletters';

public $field_id='newsletter_id';
public $field_email='client_email';
public $field_name='client_name';
public $field_created='newsletter_created';
public $data_status='newsletter_status';



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
		
	function count_all_search($newsletter_email_search,$date_selected_newsletter,$date_debut_final,$date_fin_final) {
				
		try {
			$this->db->from($this->table);

			
			
          
			if($newsletter_email_search){
			$this->db->where($this->field_email, $newsletter_email_search);
			}
			if( $date_selected_newsletter==1){
			$this->db->where($this->field_created,date("Y-m-d"));
			}

			if( $date_selected_newsletter==2){
			$this->db->where('newsletter_created BETWEEN"'. date("Y-m-d",strtotime( "previous sunday" )). '" and "'. date("Y-m-d").'"');
			}
			if( $date_selected_newsletter==3){
			//$this->db->where('data_created BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
			$this->db->where('YEAR(newsletter_created)',date('Y'));
			$this->db->where('MONTH(newsletter_created)',date('m'));
			}
			if( $date_selected_newsletter==4){
			$this->db->where('newsletter_created BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
			}
			if( $date_selected_newsletter==5){
			//$this->db->where('data_created BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
			$this->db->where('YEAR(newsletter_created)',date('Y'));
			}
			if($date_debut_final and $date_fin_final){
			$this->db->where('newsletter_created BETWEEN"'. $date_debut_final. '" and "'. $date_fin_final.'"');
			}
			$count = $this->db->count_all_results();
			return $count;

		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
	
			return false;
		}
		}


	function get_all_search($limit, $start,$newsletter_email_search,$date_selected_newsletter,$date_debut_final,$date_fin_final) {
				
			try {
				$query =$this->db->limit($limit, $start);
				
				
				if($newsletter_email_search){
				$this->db->where($this->field_email, $newsletter_email_search);
				}
				if( $date_selected_newsletter==1){
				$this->db->where($this->field_created,date("Y-m-d"));
				}

				if( $date_selected_newsletter==2){
				$this->db->where('newsletter_created BETWEEN"'. date("Y-m-d",strtotime( "previous sunday" )). '" and "'. date("Y-m-d").'"');
				}
				if( $date_selected_newsletter==3){
				//$this->db->where('data_created BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
				$this->db->where('YEAR(newsletter_created)',date('Y'));
			    $this->db->where('MONTH(newsletter_created)',date('m'));
				}
				if( $date_selected_newsletter==4){
				$this->db->where('newsletter_created BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
				}
				if( $date_selected_newsletter==5){
				//$this->db->where('newsletter_created BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
				$this->db->where('YEAR(newsletter_created)',date('Y'));
				}
				if($date_debut_final and $date_fin_final){
				$this->db->where('newsletter_created BETWEEN"'. $date_debut_final. '" and "'. $date_fin_final.'"');
				}
				$query = $this->db->order_by($this->field_id,"desc");
				$query = $this->db->get_where($this->table);


				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}		
}