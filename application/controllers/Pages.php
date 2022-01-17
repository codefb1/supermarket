<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Pages extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/
			public function show(){
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['menu'] = "detail_page";
					$data['body'] = 'product-cart checkout-cart blog';
		       $data['page'] = $this->M_pages->get_this(end($this->uri->segments));
		
		
		$this->template->load('template','views_pages/index',$data);
	}
		
	
	}
?>