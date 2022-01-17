<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
		
		
		/*     * *********************************** */
		/*     * ***********Constructeur************ */
		/*     * *********************************** */
		
		
		
		public function __construct() {
			
			parent::__construct();
			
			
		}
		/* ------------ srdv { Function index } ------------ */
		/*
			* @description   cabinets list 
			* @author        
			* @access        public 
			* @method        POST
			* @params        
			* @return        table
		*/
		public function index() { 
		 	
		
			try {			 	
				$data['orders_new_list'] = $this->M_orders->get_orders_by_status(1);
				$data['orders_preparete_list'] = $this->M_orders->get_orders_by_status(2) ;
				$data['orders_livraison_list'] = $this->M_orders->get_orders_by_status(3) ;
				
				$this->template->load('template','dashboard',$data);
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
				}
			
			
		}

 
	}
