<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Associations extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "associations/index";
				$config['total_rows'] = $this->M_associations->count_all();
				$config['per_page'] = 20;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '&laquo; Première';
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Dernier &raquo;';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = 'Suivant &rarr;';
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr; Pr&eacute;cédent';
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
     
				$this->pagination->initialize($config);

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['associations_list'] = $this->M_associations->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
                $data['body'] ="product-sidebar-left";
				$data['page'] ="associations";
				$data['page'] = $this->M_pages->get_this(15);
				$data['page_comsommer'] = $this->M_pages->get_this(16);
				$data['product_association'] = $this->M_products->get_product_association();
				$data['banniers'] = $this->M_banners->get_bannier_emplacement(4);	
		         $taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template-categorie','views_associations/index',$data);
	}
	
		public function don(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "associations/achat";
				$config['total_rows'] = $this->M_associations->count_all();
				$config['per_page'] = 20;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '&laquo; Première';
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Dernier &raquo;';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = 'Suivant &rarr;';
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr; Pr&eacute;cédent';
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
     
				$this->pagination->initialize($config);

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['associations_list'] = $this->M_associations->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
                $data['body'] ="product-sidebar-left";
				$data['page'] ="associations";
				$data['page'] = $this->M_pages->get_this(15);
				$data['page_comsommer'] = $this->M_pages->get_this(16);
				$data['product_association'] = $this->M_products->get_product_association();
				$data['banniers'] = $this->M_banners->get_bannier_emplacement(4);	
		         $taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template-categorie','views_associations/don',$data);
	}
	
			public function achat(){
		
		
		try {
				
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
                $data['body'] ="product-sidebar-left";
				$data['page'] ="associations";
				$data['page'] = $this->M_pages->get_this(15);
				$data['page_comsommer'] = $this->M_pages->get_this(16);
				$data['associations_list'] = $this->M_products->get_product_association();
		         $taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template-categorie','views_associations/achat',$data);
	}
	}
?>