<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Products extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste produts */
		public function index(){
		
		
		try {  
		     
				
				$certif= $this->session->userdata('all_product_certif');
			    $labelRouge=$this->session->userdata('all_product_label_rouge');
				$bio=$this->session->userdata('all_product_bio');
				$all_product_categorie= $this->session->userdata('all_product_categorie');
			
				$per_page=12;
				$config = array();
				$config['base_url'] = base_url() . "products/index";
				$config['total_rows'] = $this->M_products->count_all($this->session->userdata('categorie_id'),$subCategorieId,$bio,$labelRouge,$certif,$all_product_categorie);
				$config['per_page'] = $per_page;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
              
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			    
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$this->session->userdata('categorie_id'),$subCategorieId,$this->session->userdata('orderBy'),$bio,$labelRouge,$certif,$all_product_categorie);
				$data['pagination'] = $this->pagination->create_links();
			
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');
                $data['categorieInfo'] =$this->M_categories->get_this($categorieId);
				$data['banniers'] = $this->M_banners->get_bannier_emplacement(5);
				$data['body'] ="product-sidebar-left";
				$data['total_rows'] =$config['total_rows'];
				$num_page = intval($config['total_rows'] / $per_page);
				$res_page=$config['total_rows'] % $per_page;
				if($res_page){
				   $num_page = $num_page+1;
				} 
				 $data['num_page']=$num_page+1;
				 $data['total_pages'] =$config['total_rows']/$config['per_page'];
				 $data['modeshow']='grid';
				 $data['page'] ="all";
				 $data['per_page']=$per_page;
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
	              $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
                
				  if($this->input->get("page")){
					
					 $this->load->view('views_products/all_products_ajax',$data);
				} else {
					$this->template->load('template-categorie','views_products/all_products',$data);
				}
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
	
	public function label_rouge(){
		
		
		try {  
		     
		        $is_type ="label_rouge";
				$config = array();
				$config['base_url'] = base_url() . "products/index";
				$config['total_rows'] = $this->M_products->count_all($this->session->userdata('categorie_id'),$subCategorieId,$is_type);
				$config['per_page'] = 100;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$this->session->userdata('categorie_id'),$subCategorieId,$this->session->userdata('orderBy'),$is_type);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');

				 $data['body'] ="product-sidebar-left";
				 $data['total_rows'] =$config['total_rows'];
				 $data['modeshow']='grid';
				 $data['page'] ="all";
				 $data['title'] ="Label Rouge";
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
	             $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
                 $this->template->load('template-categorie','views_products/index',$data);
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
	public function bio(){
		
		
		try {  
		     
		        $is_type="bio";
				$config = array();
				$config['base_url'] = base_url() . "products/index";
				$config['total_rows'] = $this->M_products->count_all($this->session->userdata('categorie_id'),$subCategorieId,$is_type);
				$config['per_page'] = 100;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$this->session->userdata('categorie_id'),$subCategorieId,$this->session->userdata('orderBy'),$is_type);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');

				 $data['body'] ="product-sidebar-left";
				 $data['total_rows'] =$config['total_rows'];
				 $data['modeshow']='grid';
				 $data['page'] ="all";
				 $data['title'] ="BIO";
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
	                $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
                 $this->template->load('template-categorie','views_products/index',$data);
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
	public function avs(){
		
		
		try {  
		     
		         
				$config = array();
				$config['base_url'] = base_url() . "products/index";
				$config['total_rows'] = $this->M_products->count_all($this->session->userdata('categorie_id'),$subCategorieId,null,6);
				$config['per_page'] = 100;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
				$data['products_list'] = $this->M_products->get_all($config['per_page'], $page,$this->session->userdata('categorie_id'),$subCategorieId,$this->session->userdata('orderBy'),null,6);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');
               
				 $data['body'] ="product-sidebar-left";
				 $data['total_rows'] =$config['total_rows'];
				 $data['modeshow']='grid';
				 $data['page'] ="all";
				 $data['title'] ="AVS";
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
	                 $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
                 $this->template->load('template-categorie','views_products/index',$data);
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
	/* liste produts */
		public function categorie(){
		
		
		try {  
		    
		        $categorieId=$this->uri->segment(3);
				$categorieId=intVal($categorieId);
				$categorie=$this->M_categories->get_this($categorieId);
				$per_page=12;
				$config = array();
				$config['base_url'] = base_url() . "products/categorie/".$categorieId.'-'.strtolower(url_title($categorie->categorie_name));
				$config['total_rows'] = $this->M_products->count_all_by_categorie($categorieId,$subCategorieId,$this->session->userdata('orderBy'),$this->session->userdata('product_categorie_bio'),$this->session->userdata('product_categorie_label_rouge'),$this->session->userdata('product_categorie_certif'));
				$config['per_page'] = $per_page;
				$config['uri_segment'] = 4;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
                $data['title'] ="";
				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
				$data['products_list'] = $this->M_products->get_all_by_categorie($config['per_page'], $page,$categorieId,$subCategorieId,$this->session->userdata('orderBy'),$this->session->userdata('product_categorie_bio'),$this->session->userdata('product_categorie_label_rouge'),$this->session->userdata('product_categorie_certif'));
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');
                $data['body'] ="product-sidebar-left";
				$data['total_rows'] =$config['total_rows'];
				$data['modeshow']='grid';
				$data['page'] ="categories";
				$data['session_search'] ="categorie";
				
				 $data['banniers'] = $this->M_banners->get_bannier_emplacement(5);
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 } 
				$data['categorieInfo'] =$categorie;
				$data['categorie'] = $categorie;
				$data['subCategorie'] ="";
				$data['subCategorieId'] ='';
				$data['product'] ="";
				$data['menu'] =$categorieId;
				$data['session_search'] = "categorie";
				$taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
				$data['taxe']= $taxe_value/100;
				$num_page = intval($config['total_rows'] / $per_page);
				$res_page=$config['total_rows'] % $per_page;
				if($res_page){
				$num_page = $num_page+1;
				} 
				$data['num_page']=$num_page+1;
				$data['total_pages'] =$config['total_rows']/$config['per_page'];
				$data['per_page']=$per_page;
				  if($this->input->get("page")){
					
					 $this->load->view('views_products/product_categorie_ajax',$data);
				} else {
					$this->template->load('template-categorie','views_products/product_categorie',$data);
				}
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
		
		/* liste produts */
		public function subcategorie(){
		
		
		try {  
		    
		        $subCategorieId=$this->uri->segment(3);
				$subCategorieId=intVal($subCategorieId);
				$subCategories=$this->M_categories->get_this($subCategorieId);
				$config = array();
				$config['base_url'] = base_url() . "products/subcategorie/".$subCategorieId.'-'.strtolower(url_title($subCategories->categorie_name));
				
				$config['total_rows'] = $this->M_products->count_all_products_subcategorie($categorieId,$subCategorieId,$this->session->userdata('orderBy'));
				$config['per_page'] = 100;
				$config['uri_segment'] = 4;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
				$data['products_list'] = $this->M_products->get_all_products_subcategorie($config['per_page'], $page,$categorieId,$subCategorieId,$this->session->userdata('orderBy'));
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');
                $data['body'] ="product-sidebar-left";
				$data['total_rows'] =$config['total_rows'];
				$data['modeshow']='grid';
				$data['page'] ="categories";
				$data['session_search'] = "subcategorie";
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
				$subCategories=$this->M_categories->get_this($subCategorieId);
				$data['categorie'] ="";
				$data['product'] ="";
				$data['subCategorie'] =$subCategories;
				$data['subCategorieId'] =$subCategorieId;
				$data['categorieParent'] =$this->M_categories->get_this($subCategories->parent_id);
				$data['categorieInfo'] =$this->M_categories->get_this($subCategories->parent_id);
				$data['title'] ="";
				$data['menu'] =$subCategories->parent_id;
				$data['certificats_list'] =$this->M_certificats->get_all_table();
				$data['categoriefils'] =$this->M_categories->get_this($subCategorieId);
			
				$taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
				$data['taxe']= $taxe_value/100;
                 $this->template->load('template-categorie','views_products/product_subcategorie_index',$data);
			// var_dump($param_2);die();
				
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
		
		public function show()
		{
			$carts = $this->cart->contents();
			
			$productId=intVal($this->uri->segment(3));
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['sub_categories_list'] = $this->M_categories->get_categories(true);
		    $data['body'] ="product-detail";
		    $data['page'] ="products";
			$data['categorie'] ="";
			$data['subCategorie'] ="";
			$data['subCategorieId'] ="";
			$data['product'] = $this->M_products->get_this($productId);
			$data['partner'] = $this->M_partners->get_this($data['product']->product_affected_partener);
			
			$data['categorieParent'] =$this->M_categories->get_this($data['product']->categorie_id);
			$data['packs_products'] =$this->M_products->get_packs_product($productId);
				
			$data['categoriefils'] =$this->M_categories->get_this($data['product']->sub_categorie_id);
			
            $data['menu'] ="";
		    $data['product_releted'] = $this->M_products->getProductReleted($productId,$data['product']->categorie_id);
			$data['product_pictures_list']= $this->M_products_pictures->get_all_product_picture($productId);
			$data['product_attribut_value_list']= $this->M_products->get_product_attribut_value($productId,false);
			$data['product_attribut_list']= $this->M_products->get_product_attribut_value($productId,true);
			$data['products_best_seller_list'] = $this->M_products->get_product_best_seller();
			$data['categorieInfo'] =$this->M_categories->get_this($data['product']->categorie_id);
			
			if($data['product']->categorie_couffin_id) {
				$data['categorieInfo_couffin'] =$this->M_categories->get_this_categories_couffin($data['product']->categorie_couffin_id);
			}
	
			     
			    $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
				 if($data['product']->categorie_couffin_id) {
			 $this->template->load('template-categorie','views_products/show_couffin',$data);
			} else {
				 $this->template->load('template-categorie','views_products/show',$data);
			
              }			
			}
		public function modeShow() { 
		
		try {
			$us=0;
			$mode=$this->input->post('mode');
			$session_search_array = array(
					     'modeshow' => $mode,
						 
					 );
					$this->session->set_userdata($session_search_array);
			echo json_encode(array('result'=>1));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
							public function orderBy() { 
		
		try {
			$us=0;
			$orderBy=$this->input->post('orderBy');
			$session_search_array = array(
					     'orderBy' => $orderBy,
						 
					 );
					$this->session->set_userdata($session_search_array);
			echo json_encode(array('result'=>1,'orderBy'=>$orderBy));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
			public function filtre() { 
		
		try {
					$type=$this->input->post('type');
					$check=$this->input->post('check');
					$search=$this->input->post('search');
			
					if($search){
						if($type=='bio'){
							
							if($check==2){
								$session_search_array = array(
								 'all_product_bio' => 1,
								 
							 );
							} else {
								$session_search_array = array(
										 'all_product_bio' => "",
										 
									 );
							}
					  $this->session->set_userdata($session_search_array);
					}
							
					
					
					if($type=='lr'){
							if($check==2){
								$session_search_array = array(
								 'all_product_label_rouge' => 1,
								 
							 );
							}else {
								$session_search_array = array(
										 'all_product_label_rouge' => "",
										 
									 );
					}
					
					 $this->session->set_userdata($session_search_array);
							
					}
					
					
						}else {
							
							if($type=='bio'){
								if($check==2){
									$session_search_array = array(
									 'sub_cat_bio' => 1,
									 
								 );
								} else {
									$session_search_array = array(
											 'sub_cat_bio' => "",
											 
										 );
								}
							
							
									 $this->session->set_userdata($session_search_array);
							}
							if($type=='lr'){
								if($check==2){
									$session_search_array = array(
									 'sub_cat_label_rouge' => 1,
									 
								 );
								} else {
									$session_search_array = array(
											 'sub_cat_label_rouge' => "",
											 
										 );
								}
								
								
										 $this->session->set_userdata($session_search_array);
							}
					}
				
					
					
						echo json_encode(array('result'=>1,'sub_cat_bio'=>$sub_cat_bio,'sub_cat_label_rouge'=>$sub_cat_label_rouge,'check'=>$check,'type'=>$type));
					
						
				}catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		
		
		
			public function filtre_certif() { 
		
		try {
			$type=$this->input->post('type');
			$certif=$this->input->post('certif');
	        $search=$this->input->post('search');
			if($search){
					if($certif){
						$session_search_array = array(
					     'all_product_certif' => $certif,
						 
					 );
					  $this->session->set_userdata($session_search_array);
					} else {
						$session_search_array = array(
								 'all_product_certif' => "",
								 
							 );
							  $this->session->set_userdata($session_search_array);
					}
				 
				} else {
					
					if($certif){
						$session_search_array = array(
					     'certif' => $certif,
						 
					 );
					  $this->session->set_userdata($session_search_array);
				} else {
					$session_search_array = array(
							 'certif' => "",
							 
						 );
						  $this->session->set_userdata($session_search_array);
				}
			
			}	
			echo json_encode(array('result'=>1,'certif'=>$certif));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		public function vide_filtre() { 
		
		try {
			$name=$this->input->post('name');
			
			if($name=='all_certificat') {
				$session_search_array = array(
								 'all_product_certif' => "",
								 
							 );
							  $this->session->set_userdata($session_search_array);
			}
			
			if($name=='all_label_rouge_bio') {
				
				$session_search_array = array(
							 'all_product_label_rouge' => "",
							  'all_product_bio' => "",
						 );
						  $this->session->set_userdata($session_search_array);
			}
			
			if($name=='certificat') {
				$session_search_array = array(
							 'certif' => "",
							 
						 );
						  $this->session->set_userdata($session_search_array);
			}
			
			if($name=='label_rouge_bio') {
					$session_search_array = array(
							  'sub_cat_label_rouge' => "",
							  'sub_cat_bio' => "",
							 
						 );
							
						
				$this->session->set_userdata($session_search_array);
			}
				echo json_encode(array('result'=>1));
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		
			public function all_filtre_categorie() { 
		
		try {
			$categorie=$this->input->post('categorie');
			
	     
			if($categorie){
					
						$session_search_array = array(
					     'all_product_categorie' => $categorie,
						 );
					
					  $this->session->set_userdata($session_search_array);
					} else {
						$session_search_array = array(
								 'all_product_categorie' => "",
								 
							 );
							  $this->session->set_userdata($session_search_array);
					}
					
			echo json_encode(array('result'=>1,'certif'=>$certif));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		
		public function solde(){
		
		
		try {  
		     
				
				$certif= $this->session->userdata('all_product_certif_solde');
			    $labelRouge=$this->session->userdata('all_product_label_rouge_solde');
				$bio=$this->session->userdata('all_product_bio');
				$all_product_categorie= $this->session->userdata('all_product_categorie_solde');
			
				$per_page=12;
				$config = array();
				$config['base_url'] = base_url() . "products/solde";
				$config['total_rows'] = $this->M_products->count_all_solde($bio,$labelRouge,$certif,$all_product_categorie);
				$config['per_page'] = $per_page;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
				$data['products_list'] = $this->M_products->get_all_solde($config['per_page'], $page,$this->session->userdata('orderBy'),$bio,$labelRouge,$certif,$all_product_categorie);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');
                $data['categorieInfo'] =$this->M_categories->get_this($categorieId);
				$data['banniers'] = $this->M_banners->get_bannier_emplacement(7);
				$data['body'] ="product-sidebar-left";
				$data['total_rows'] =$config['total_rows'];
				$data['modeshow']='grid';
				$data['page'] ="all";
				$data['page'] ="all";
				$data['session_search'] ="solde";
				
				 $num_page = intval($config['total_rows'] / $per_page);
				$res_page=$config['total_rows'] % $per_page;
				if($res_page){
				$num_page = $num_page+1;
				} 
				$data['num_page']=$num_page+1;
				$data['total_pages'] =$config['total_rows']/$config['per_page'];
				$data['per_page']=$per_page;

				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
	              $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
                
				  if($this->input->get("page")){
					
					 $this->load->view('views_products/all_products_solde_ajax',$data);
				} else {
					$this->template->load('template-categorie','views_products/all_products_solde',$data);
				}
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
	
			public function filtre_certif_solde() { 
		
		try {
			$type=$this->input->post('type');
			$certif=$this->input->post('certif');
	        $search=$this->input->post('search');
			
					if($certif){
						$session_search_array = array(
					     'all_product_certif_solde' => $certif,
						 
					 );
					  $this->session->set_userdata($session_search_array);
					} else {
						$session_search_array = array(
								 'all_product_certif_solde' => "",
								 
							 );
							  $this->session->set_userdata($session_search_array);
					}
						 
						
			echo json_encode(array('result'=>1,'certif'=>$certif));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		
		public function filtre_solde1() { 
		
		try {
					$type=$this->input->post('type');
					$check=$this->input->post('check');
					$search=$this->input->post('search');
			
					if($search){
						if($type=='bio'){
							
							if($check==2){
								$session_search_array = array(
								 'all_product_bio_solde' => 1,
								 
							 );
							} else {
								$session_search_array = array(
										 'all_product_bio_solde' => "",
										 
									 );
							}
					  $this->session->set_userdata($session_search_array);
					}
							
					
					
					if($type=='lr'){
							if($check==2){
								$session_search_array = array(
								 'all_product_label_rouge_solde' => 1,
								 
							 );
							}else {
								$session_search_array = array(
										 'all_product_label_rouge_solde' => "",
										 
									 );
					}
					
					 $this->session->set_userdata($session_search_array);
							
					}
					
					
						}else {
							
							if($type=='bio'){
								if($check==2){
									$session_search_array = array(
									 'sub_cat_bio_solde' => 1,
									 
								 );
								} else {
									$session_search_array = array(
											 'sub_cat_bio_solde' => "",
											 
										 );
								}
							
							
									 $this->session->set_userdata($session_search_array);
							}
							if($type=='lr'){
								if($check==2){
									$session_search_array = array(
									 'sub_cat_label_rouge_solde' => 1,
									 
								 );
								} else {
									$session_search_array = array(
											 'sub_cat_label_rouge_solde' => "",
											 
										 );
								}
								
								
										 $this->session->set_userdata($session_search_array);
							}
					}
				
					
					
						echo json_encode(array('result'=>1,'sub_cat_bio'=>$sub_cat_bio,'sub_cat_label_rouge'=>$sub_cat_label_rouge,'check'=>$check,'type'=>$type));
					
						
				}catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
			   
      public function vide_filtre_solde() { 
		
		try {
			$name=$this->input->post('name');
			
			if($name=='all_certificat') {
				$session_search_array = array(
								 'all_product_certif_solde' => "",
								 
							 );
							  $this->session->set_userdata($session_search_array);
			}
			
			if($name=='all_label_rouge_bio') {
				
				$session_search_array = array(
							 'all_product_label_rouge_solde' => "",
							  'all_product_bio_solde' => "",
						 );
						  $this->session->set_userdata($session_search_array);
			}
			
			if($name=='certificat') {
				$session_search_array = array(
							 'certif_solde' => "",
							 
						 );
						  $this->session->set_userdata($session_search_array);
			}
			
			if($name=='label_rouge_bio') {
					$session_search_array = array(
							  'sub_cat_label_rouge_solde' => "",
							  'sub_cat_bio_solde' => "",
							 
						 );
							
						
				$this->session->set_userdata($session_search_array);
			}
				echo json_encode(array('result'=>1));
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}		

	


                   public function goffa(){
		
		
		try {  
		     
				
				$certif= $this->session->userdata('all_product_certif_elgofa');
			    $labelRouge=$this->session->userdata('all_product_label_rouge_elgofa');
				$bio=$this->session->userdata('all_product_bio');
				$all_product_categorie= $this->session->userdata('all_product_categorie_elgofa');
			
				
				$config = array();
				$config['base_url'] = base_url() . "products/goffa";
				$config['total_rows'] = $this->M_products->count_all_elgofa($this->session->userdata('categorie_id'),$subCategorieId,$bio,$labelRouge,$certif,$all_product_categorie);
				$config['per_page'] = 500;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '';
				$config['first_tag_open'] = '<li class="prev page " style="display:none;">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = '';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&rarr;';
				$config['next_tag_open'] = '<li class="next page" style="display:none;">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr;';
				$config['prev_tag_open'] = '<li class="prev page" >';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);
               
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
				$data['products_list'] = $this->M_products->get_all_elgofa($config['per_page'], $page,$this->session->userdata('categorie_id'),$subCategorieId,$this->session->userdata('orderBy'),$bio,$labelRouge,$certif,$all_product_categorie);
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['categorieId'] = $this->session->userdata('categorie_id');
				$data['orderBy'] = $this->session->userdata('orderBy');
                $data['categorieInfo'] =$this->M_categories->get_this($categorieId);
				$data['body'] ="product-sidebar-left";
				$data['total_rows'] =$config['total_rows'];
				$data['modeshow']='grid';
				$data['page'] ="all";
				$data['banniers'] = $this->M_banners->get_bannier_emplacement(8);
				 if($this->session->userdata('modeshow')){
					  $data['modeshow'] =$this->session->userdata('modeshow');
				 }
	              $taxe = $this->M_taxe->get_taxe();
				  $taxe_value= $taxe->taxe_value;
		         $data['taxe']= $taxe_value/100;
                 $this->template->load('template-categorie','views_products/all_products_goffa',$data);
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}	

public function getdetail()
		{
			
			$productId=$this->input->post('product_id');
			
			$product = $this->M_products->get_this($productId);
			$partener = $this->M_partners->get_this($product->product_affected_partener);
			$product_picture =base_url().'admines/medias/products/'.$product->product_picture;
			$product_price_selling =  number_format($product->product_price_selling, 2, ',', '');
			$product_price_dicount =  number_format($product->product_price_dicount, 2, ',', '');
			

			$certificat_name="";
			$certificat_picture="";
			if($partener){
				$certificat_name=$partener->certificat_name;
				$certificat_picture= base_url().'admines/medias/certificats/'.$partener->certificat_picture;
			}
			$priceKg= '';   
	  if($product->product_poids) {
		  if($product->product_is_promo==2){
		$priceKg= "Le 1 kg à € ".(number_format((1/$product->product_poids)* $product->product_price_dicount, 2, ',', ''));
		   	}  else {
			$priceKg= "Le 1 kg à  ".(number_format((1/$product->product_poids)* $product->product_price_selling, 2, ',', '')) ." €";
		
		}
		
		}
			echo json_encode(array('result'=>1,'show_option'=>$product->show_option,'priceKg'=>$priceKg,'product_path' =>  base_url().'products/show/'.$product->product_id,'product_short_description'=>$product->product_short_description,'product_id'=>$product->product_id,'product_is_promo'=>$product->product_is_promo,'product_bio'=>$product->product_bio,'product_origin'=>$product->product_origin,'certificat_name'=>$certificat_name,'certificat_picture'=>$certificat_picture,'product_label_rouge'=>$product->product_label_rouge,'product_info'=>$product->product_info,'product_poids'=>$product->product_poids,'product_price_selling'=>$product_price_selling,'product_price_dicount'=>$product_price_dicount,'product_picture'=>$product_picture,'product_name'=>$product->product_name,'show_poids'=>$product->show_poids));
			}
		public function getdetailProductComposer()
				{
					
				$product_composer_id=$this->input->post('product_composer_id');

				$product_composer = $this->M_products->get_info_product_composer($product_composer_id);
				$partener = $this->M_partners->get_this($product_composer->product_affected_partener);
				$certificat_name="";
				$certificat_picture="";
				if($partener){
				$certificat_name=$partener->certificat_name;
				$certificat_picture= base_url().'admines/medias/certificats/'.$partener->certificat_picture;
				}
                 $product_poids_qty=$product_composer->prod_poids.' kg';
				 echo json_encode(array('result'=>1,'product_short_description'=>$product_composer->product_short_description,'product_bio'=>$product_composer->prod_bio,'product_label_rouge'=>$product_composer->prod_label_rouge,'product_info'=>$product_composer->product_info,'product_poids'=>$product_poids_qty,'product_name'=>$product_composer->product_name));
					}
					
	public function filtre_certif_sub_catg() { 
		
	
			$certif=$this->input->post('certif');
			$session_search_array = array(
			'sub_categorie_certif' => $certif,

			);
			$this->session->set_userdata($session_search_array);

			echo json_encode(array('result'=>1,'certif'=>$certif));	
		}
			
		public function filtre_products_sub_catg_label() { 
		
		
					$type=$this->input->post('type');
					$check=$this->input->post('check');
					
		
						if($type=='bio'){
							
							if($check==2){
								$session_search_array = array(
								 'sub_categorie_bio' => '',
								 
							 );
							} else {
								$session_search_array = array(
										 'sub_categorie_bio' => 2,
										 
									 );
							}
					  $this->session->set_userdata($session_search_array);
					}
							
					
					
					if($type=='lr'){
							if($check==2){
								$session_search_array = array(
								 'sub_categorie_label_rouge' =>'',
								 
							 );
							}else {
								$session_search_array = array(
										 'sub_categorie_label_rouge' => 2,
										 
									 );
					}
					
					 $this->session->set_userdata($session_search_array);
							
					}
					echo json_encode(array('result'=>1));
					
						
				
		
		}
		
			public function filtre_boucherie_label() { 
		
		
					$type=$this->input->post('type');
					$check=$this->input->post('check');
					
		
						if($type=='bio'){
							
							if($check==2){
								$session_search_array = array(
								 'product_boucherie_bio' => '',
								 
							 );
							} else {
								$session_search_array = array(
										 'product_boucherie_bio' => 2,
										 
									 );
							}
					  $this->session->set_userdata($session_search_array);
					}
							
					
					
					if($type=='lr'){
							if($check==2){
								$session_search_array = array(
								 'product_boucherie_label_rouge' =>'',
								 
							 );
							}else {
								$session_search_array = array(
										 'product_boucherie_label_rouge' => 2,
										 
									 );
					}
					
					 $this->session->set_userdata($session_search_array);
							
					}
					echo json_encode(array('result'=>1));
					
						
				
		
		}	
			public function filtre_boucherie_certif() { 
		
	
			$certif=$this->input->post('certif');
			$session_search_array = array(
			'filtre_boucherie_certif' => $certif,

			);
			$this->session->set_userdata($session_search_array);

			echo json_encode(array('result'=>1,'certif'=>$certif));	
		}
		public function filtre_product_categorie_certif() { 
		
	
			$certif=$this->input->post('certif');
			$session_search_array = array(
			'product_categorie_certif' => $certif,

			);
			$this->session->set_userdata($session_search_array);

			echo json_encode(array('result'=>1,'certif'=>$certif));	
		}
		
		
		public function filtre_product_categorie_label() { 
		
		
					$type=$this->input->post('type');
					$check=$this->input->post('check');
					
		
						if($type=='bio'){
							
							if($check==2){
								$session_search_array = array(
								 'product_categorie_bio' => '',
								 
							 );
							} else {
								$session_search_array = array(
										 'product_categorie_bio' => 2,
										 
									 );
							}
					  $this->session->set_userdata($session_search_array);
					}
							
					
					
					if($type=='lr'){
							if($check==2){
								$session_search_array = array(
								 'product_categorie_label_rouge' =>'',
								 
							 );
							}else {
								$session_search_array = array(
										 'product_categorie_label_rouge' => 2,
										 
									 );
					}
					
					 $this->session->set_userdata($session_search_array);
							
					}
					echo json_encode(array('result'=>1));
					
						
				
		
		}	
		public function filtre_product_certif_solde() { 
		
	
			$certif=$this->input->post('certif');
			$session_search_array = array(
			'all_product_certif_solde' => $certif,

			);
			$this->session->set_userdata($session_search_array);

			echo json_encode(array('result'=>1,'certif'=>$certif));	
		}
			public function filtre_product_label_solde() { 
		
		
					$type=$this->input->post('type');
					$check=$this->input->post('check');
					
		
						if($type=='bio'){
							
							if($check==2){
								$session_search_array = array(
								 'all_product_bio_solde' => '',
								 
							 );
							} else {
								$session_search_array = array(
										 'all_product_bio_solde' => 2,
										 
									 );
							}
					  $this->session->set_userdata($session_search_array);
					}
							
					
					
					if($type=='lr'){
							if($check==2){
								$session_search_array = array(
								 'all_product_label_rouge_solde' =>'',
								 
							 );
							}else {
								$session_search_array = array(
										 'all_product_label_rouge_solde' => 2,
										 
									 );
					}
					
					 $this->session->set_userdata($session_search_array);
							
					}
					echo json_encode(array('result'=>1));
					
			
		
		}
					
					public function all_filtre_categorie_solde() { 
		
		try {
			$categorie=$this->input->post('categorie');
			
	     
		
					
						$session_search_array = array(
					     'all_product_categorie_solde' => $categorie,
						 );
					
					  $this->session->set_userdata($session_search_array);
					 
					
			echo json_encode(array('result'=>1));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		
	}
?>