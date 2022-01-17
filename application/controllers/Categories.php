<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Categories extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		
				
						public function index(){
		
		
		try {
			    $parent_id=2;
				 $per_page=12;
		         if(intVal(end($this->uri->segments))){
			    $parent_id=intVal(end($this->uri->segments));
		         }
				$parent_id= $this->session->userdata('all_sub_categorie');
				
				$config = array();
				$config['base_url'] = base_url() . "categories/index";
				$config['total_rows'] = $this->M_categories->count_sub_categories_all($parent_id);
				
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
			//	$data['subCategories_lists'] = $this->M_categories->get_all($config['per_page'], $page,$parent_id);
			
			$data['subCategories_lists'] =  $this->M_categories->get_sub_categories_all($config['per_page'], $page,$parent_id);
				
            $data['categories_list'] = $this->M_categories->get_categories(false);
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			//$categorie=$this->M_categories->get_this($parent_id);
			 $data['banniers'] = $this->M_banners->get_bannier_emplacement(5);	
			  $data['per_page']=$per_page;
		    $data['body'] ="product-sidebar-left";
		    $data['page'] ="categories";
			$data['categorie'] ='';
			$data['subCategorie'] ="";
			$data['subCategorieId'] ="";
			$taxe = $this->M_taxe->get_taxe();
			$taxe_value= $taxe->taxe_value;
			$data['taxe']= $taxe_value/100;
			$data['pagination'] = $this->pagination->create_links();
			$data['session_search'] = "boucherie";
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
					
					 $this->load->view('views_categories/index-ajax',$data);
				} else {
					$this->template->load('template-categorie','views_categories/index',$data);
				}
		
	}
		
		
			public function all_filtre_sub_categorie() { 
		
		try {
			$parent_id=$this->input->post('parent_id');
			
	     
			if($parent_id){
					
						$session_search_array = array(
					     'all_sub_categorie' => $parent_id,
						 );
					
					  $this->session->set_userdata($session_search_array);
					} else {
						$session_search_array = array(
								 'all_sub_categorie' => "",
								 
							 );
							  $this->session->set_userdata($session_search_array);
					}
						 
				 	
			echo json_encode(array('result'=>1));
			
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		
		}
		

   
	}
?>