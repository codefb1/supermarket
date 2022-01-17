<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Couffin extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		
				
						public function index(){
		
		
		try {
			    
				 $per_page=12;
		       
		
				$config = array();
				$config['base_url'] = base_url() . "couffin/index";
				$config['total_rows'] = $this->M_categories->count_all_couffin();
				
				$config['per_page'] = $per_page;
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
			
            
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			
			  $data['per_page']=$per_page;
		    
	
			$taxe = $this->M_taxe->get_taxe();
			$taxe_value= $taxe->taxe_value;
			$data['taxe']= $taxe_value/100;
				 $data['body'] ="product-sidebar-left";
		    $data['page'] ="categories";
			$data['categorie'] ='';
			$data['subCategorie'] ="";
			$data['subCategorieId'] ="";
			$data['pagination'] = $this->pagination->create_links();
		$data['categories_lists'] =  $this->M_categories->get_all_couffin($config['per_page'], $page);
			
					$num_page = intval($config['total_rows'] / $per_page);
				$res_page=$config['total_rows'] % $per_page;
				if($res_page){
				   $num_page = $num_page+1;
				} 
				 //var_dump($this->session->userdata('all_sub_categorie'));exit;
				  $data['num_page']=$num_page+1;
			//$data['categorieInfo'] =$categorie;
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		 if($this->input->get("page")){
					
					 $this->load->view('views_couffin/index-ajax',$data);
				} else {
					$this->template->load('template-categorie','views_couffin/index',$data);
				}
		
	}
		
		
	
		

           public function products(){
		
		
		try {  
		     
				
				$certif= $this->session->userdata('all_product_certif_elgofa');
			    $labelRouge=$this->session->userdata('all_product_label_rouge_elgofa');
				$bio=$this->session->userdata('all_product_bio');
				$all_product_categorie= $this->session->userdata('all_product_categorie_elgofa');
			
				 $categorie_couffin_id=intVal(end($this->uri->segments));
				$config = array();
				$config['base_url'] = base_url() . "products/".$categorie_couffin_id;
				$config['total_rows'] = $this->M_products->count_all_product_couffin($categorie_couffin_id);
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
               
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
				
				$data['pagination'] = $this->pagination->create_links();
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				
				$data['products_list'] = $this->M_products->get_all_product_couffin($config['per_page'], $page, $categorie_couffin_id,$this->session->userdata('orderBy'));
                $data['categorieInfo'] =$this->M_categories->get_this_categories_couffin($categorie_couffin_id);
				$data['categorie'] ="";
				$data['subCategorie'] ="";
				$data['subCategorieId'] ="";
				$data['product'] ="";
				$data['couffin'] ="";
				$data['body'] ="product-sidebar-left";
				$data['total_rows'] =$config['total_rows'];
				$data['modeshow']='grid';
				$data['page'] ="all";
				
                 $this->template->load('template-categorie','views_couffin/all_products_goffa',$data);
			// var_dump($param_2);die();
				
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		
	}
	}
?>