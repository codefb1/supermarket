<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Newsletters extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "newsletters/index";
				$config['total_rows'] = $this->M_newsletters->count_all();
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
                $data['settings'] = $this->M_settings->get_this(1);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['newsletters_list'] = $this->M_newsletters->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
				$data['page_name'] = 'customers';
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_newsletters/index',$data);
	}
		/*** Add Banner interface function ***/
	public function search(){

		try {
				$search=false;
				$newsletter_email_search= trim($this->input->post('newsletter_email_search'));
			
				$date_debut_newsletter= $this->input->post('date_debut_newsletter');
				$date_fin_newsletter= $this->input->post('date_fin_newsletter');
				$date_selected_newsletter= $this->input->post('date_selected_newsletter');
				
				if($this->input->post('search'))
				{
					$session_array = array(
											'date_debut_newsletter' => $this->input->post('date_debut_newsletter'),
											'date_fin_newsletter' => $this->input->post('date_fin_newsletter'),
											'date_selected_newsletter' => $this->input->post('date_selected_newsletter'),
											'newsletter_email_search' => trim($this->input->post('newsletter_email_search')),
											
											);
					$this->session->set_userdata($session_array);
				}	
		
			($this->session->userdata('date_debut_newsletter') != "") ? $date_debut_newsletter = $this->session->userdata('date_debut_newsletter') : $date_debut_newsletter = "";
			($this->session->userdata('date_fin_newsletter') != "") ? $date_fin_newsletter = $this->session->userdata('date_fin_newsletter') : $date_fin_newsletter = "";
			($this->session->userdata('date_selected_newsletter') != "") ? $date_selected_newsletter = $this->session->userdata('date_selected_newsletter') : $date_selected_newsletter = "";
			($this->session->userdata('newsletter_email_search') != "") ? $newsletter_email_search = $this->session->userdata('newsletter_email_search') : $newsletter_email_search = "";

			if($date_debut_newsletter)
			{
				$date_debut = explode('/', $date_debut_newsletter);
				$date_debut_d = $date_debut[0];
				$date_debut_m   = $date_debut[1];
				$date_debut_y  = $date_debut[2];
				$date_debut_final=$date_debut_y.'-'.$date_debut_m.'-'.$date_debut_d;
				$search=true;
			}
			
			if($date_fin_newsletter)
			{
				$date_fin = explode('/', $date_fin_newsletter);
				$date_fin_d = $date_fin[0];
				$date_fin_m   = $date_fin[1];
				$date_fin_y  = $date_fin[2];
				$date_fin_final=$date_fin_y.'-'.$date_fin_m.'-'.$date_fin_d;
				$search=true;
			}
			if( $date_selected_newsletter!='' or $newsletter_email_search!='')
			{
				$search=true;
			}
			if ($search==true)
			{
				$config = array();
				$config['base_url'] = base_url() . "newsletters/search";
				$config['total_rows'] = $this->M_newsletters->count_all_search($newsletter_email_search,$date_selected_newsletter,$date_debut_final,$date_fin_final);
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
				$data['newsletters_list'] = $this->M_newsletters->get_all_search($config['per_page'], $page,$newsletter_email_search,$date_selected_newsletter,$date_debut_final,$date_fin_final);
			}
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		}
			$data['page_name'] = 'customers';
			$data['pagination'] = $this->pagination->create_links();
			
			$data["date_selected_newsletter"]=$date_selected_newsletter;
			$data["date_debut_newsletter"]=$date_debut_newsletter;
			$data["date_fin_newsletter"]=$date_fin_newsletter;
			$data["newsletter_email_search"]=$newsletter_email_search;
		
		$this->template->load('template','views_newsletters/search',$data);
	}
		
				public function edit(){
	
						$update_data=array(
										"block_newslettre" => $this->input->post('block_newslettre'),
										);
			
								$update_process = $this->M_settings->update_this(1, $update_data);
								
							
									 $data['process_status'] = 1;
									 redirect(base_url().'newsletters');
								
								
	}
	
	}
?>