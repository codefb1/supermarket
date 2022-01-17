<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
	error_reporting(E_ALL);

	class Comptabilite extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/
		
			/* liste orders */
				public function index(){
		
		
		try {
			    
				$config = array();
				$config['base_url'] = base_url() . "comptabilite/index";
				$config['total_rows'] = $this->M_orders->count_all_by_status(3,null,null,null);
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
			$data['orders_list'] = $this->M_orders->get_all_by_status($config['per_page'],$page,3,null,null,null);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_comptabilite/index',$data);
	}
	
	
	
		public function orderPdf()
		{
			
			try {
	        $this->load->library('html2pdf_libs');

			$order['orders']= $this->M_orders->get_this(end($this->uri->segments));
			
			$order['orders_detail']= $this->M_orders->get_orders_detail($order['orders']->order_id);
			$no_Save_data=$this->load->view('view_factures/Pdffacture',$order,true);
			$filename ="facture-numero-".$order['orders']->order_id.".pdf";
			$save_to = $this->config->item('upload_root');

			if ($this->html2pdf_libs->converHtml2pdf($no_Save_data,$filename,$save_to,1)) {
			echo $save_to.'/'.$filename;
			} else {
			echo 'failed';
			}
           // $this->load->library('m_pdf');
			//	$this->data['title']="Commande.";
			//	$this->data['description']="";
			//	$html=$this->load->view('view_factures/Pdffacture',$order,true); 
			//	$pdfFilePath ="facture-numero-".$order['orders']->order_id.".pdf";
				
			//	$pdf = $this->m_pdf->load();
			
			//	$pdf->WriteHTML($html,2);
				//$pdf->Output($pdfFilePath, "D");
			 //$this->load->library('html2pdf_lib');
			 //$no_Save_data = $this->load->view('view_factures/Pdffacture',$order,true);
			 //$html2pdf = $this->html2pdf_lib->show($no_Save_data, FALSE, 'A4');
			 //$pdfFilePath ="facture-numero-".$order['orders']->order_id.".pdf";
			 //$html2pdf->Output($pdfFilePath,'D');
			 
				
  
				} catch (Exception $e) {
					 echo json_encode(array('result'=> 'Exception reçue : ',  $e->getMessage(), "\n"));;
				}
			
			
		
	}
	
					public function partners(){
		
		
		try {  
		
		  if($this->input->get('filtercheck')){
					 $session_search_array = array(
						 'order_month' => $this->input->get('order_month'),
						 'order_years' => $this->input->get('order_years'),
						 'partner_id_facture' => $this->input->get('partner_id_facture'),
						 
					 );
					$this->session->set_userdata($session_search_array);
				}
			    	($this->session->userdata('order_month') != "N" and $this->session->userdata('order_month') != '') ? $order_month = $this->session->userdata('order_month') : $order_month = 'N'; 
				($this->session->userdata('order_years') != "N" and $this->session->userdata('order_years') != '') ? $order_years = $this->session->userdata('order_years') : $order_years = date("Y"); 
				($this->session->userdata('partner_id_facture') != "N" and $this->session->userdata('partner_id_facture') != '') ? $partner_id_facture = $this->session->userdata('partner_id_facture') : $partner_id_facture = "N";
				
				$config = array();
				$config['base_url'] = base_url() . "comptabilite/partners";
				$config['total_rows'] = $this->M_orders->count_all_by_status(9,$partner_id_facture,$order_month,$order_years);
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
	        $data['partners_list']= $this->M_partners->get_all_table(1);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['orders_list'] = $this->M_orders->get_all_by_status($config['per_page'],$page,9,$partner_id_facture,$order_month,$order_years);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			$data['order_month'] =$order_month;
			$data['partner_id_facture'] =$partner_id_facture;
			$data['order_years'] =$order_years;
			if($order_month == "N"){
					 $data['order_month'] ='';
					 }
					  if($partner_id_facture == "N"){
					 $data['partner_id_facture'] ='';
					 }
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_comptabilite/partners',$data);
	}
	
	
	
		public function orderPdfPartners()
		{
			
			try {
	        $this->load->library('html2pdf_libs');

			$order['orders']= $this->M_orders->get_this(end($this->uri->segments));
			
			$order['orders_detail']= $this->M_orders->get_orders_detail($order['orders']->order_id);
			/********
			* $content = the html content to be converted
			* you can use file_get_content() to get the html from other location
			*
			* $filename = filename of the pdf file, make sure you put the extension as .pdf
			* $save_to = location where you want to save the file,
			*            set it to null will not save the file but display the file directly after converted
			* ******/
			$no_Save_data=$this->load->view('view_factures/PdffacturePartners',$order,true);
			$filename ="facture-partners-numero-".$order['orders']->order_id.".pdf";
			$save_to = $this->config->item('upload_root');

			if ($this->html2pdf_libs->converHtml2pdf($no_Save_data,$filename,$save_to,1)) {
			echo $save_to.'/'.$filename;
			} else {
			echo 'failed';
			}
           // $this->load->library('m_pdf');
			//	$this->data['title']="Commande.";
			//	$this->data['description']="";
			//	$html=$this->load->view('view_factures/PdffacturePartners',$order,true); 
			///	$pdfFilePath ="facture-partners-numero-".$order['orders']->order_id.".pdf";
				
				//$pdf = $this->m_pdf->load();
				//$pdf->WriteHTML($html,2);
				// $pdf->Output($pdfFilePath, "D");
			// $this->load->library('html2pdf_lib');
			//$no_Save_data = $this->load->view('view_factures/PdffacturePartners',$order,true);
			//$html2pdf = $this->html2pdf_lib->show($no_Save_data, FALSE, 'A4');
			//$pdfFilePath ="facture-partners-numero-".$order['orders']->order_id.".pdf";
			//$html2pdf->Output($pdfFilePath,'D');
				} catch (Exception $e) {
					
					 echo json_encode(array('result'=> 'Exception reçue : ',  $e->getMessage(), "\n"));;
				}
			
			
		
	}

	
					public function transporters(){
		
		
		try {
			    
				$config = array();
				$config['base_url'] = base_url() . "comptabilite/transporters";
				$config['total_rows'] = $this->M_orders->count_all_by_status(10,null,null,null);
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
			$data['orders_list'] = $this->M_orders->get_all_by_status($config['per_page'],$page,10,null,null,null);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_comptabilite/transporters',$data);
	}
	
	
	
		public function orderPdfTransporters()
		{
			
			try {
	
			$order['orders']= $this->M_orders->get_this(end($this->uri->segments));
			
			$order['orders_detail']= $this->M_orders->get_orders_detail($order['orders']->order_id);
						$no_Save_data = $this->load->view('view_factures/PdffactureTransporters',$order,true);
			$this->load->library('html2pdf_libs');

			/********
			* $content = the html content to be converted
			* you can use file_get_content() to get the html from other location
			*
			* $filename = filename of the pdf file, make sure you put the extension as .pdf
			* $save_to = location where you want to save the file,
			*            set it to null will not save the file but display the file directly after converted
			* ******/
			$filename ="facture-transporters-numero-".$order['orders']->order_id.".pdf";
			$save_to = $this->config->item('upload_root');

			if ($this->html2pdf_libs->converHtml2pdf($no_Save_data,$filename,$save_to,1)) {
			echo $save_to.'/'.$filename;
			} else {
			echo 'failed';
			}

           // $this->load->library('m_pdf');
		   // $this->load->library('html2pdf_lib');
			//$no_Save_data = $this->load->view('view_factures/PdffactureTransporters',$order,true);
			//$html2pdf = $this->html2pdf_lib->show($no_Save_data, FALSE, 'A4');
			//$pdfFilePath ="facture-transporters-numero-".$order['orders']->order_id.".pdf";
			//$html2pdf->Output($pdfFilePath,'D');
			
				//$this->data['title']="Commande.";
				//$this->data['description']="";
				//$html=$this->load->view('view_factures/PdffactureTransporters',$order,true); 
				
				//$pdfFilePath ="facture-transporters-numero-".$order['orders']->order_id.".pdf";
				
				//$pdf = $this->m_pdf->load();
				
				//$pdf->WriteHTML($html,2);
				//$pdf->Output($pdfFilePath, "D");
				} catch (Exception $e) {
					 echo json_encode(array('result'=> 'Exception reçue : ',  $e->getMessage(), "\n"));;
				}
			
			
		}
			/*** show Execute function orders ***/
			public function showFacturePartener()
		{
			
			try {
	
			$data['orders']= $this->M_orders->get_this(end($this->uri->segments));
		
			$data['orders_detail']= $this->M_orders->get_orders_detail($data['orders']->order_id);
				if($this->input->post('order_id') > 0) {
				if($data['orders']->order_payment_status_partener==2){
					$update_data=array(
					                    	"order_partener_amount" => $this->input->post('order_partener_amount'),
										"partener_pdf_payement" => $this->input->post('partener_pdf_payement'),
										"order_payment_status_partener" => $this->input->post('order_payment_status_partener'),
										);
				} else {
						   $update_data=array(
						   	"order_partener_amount" => $this->input->post('order_partener_amount'),
					                   "order_partener_date_payement" => date("Y-m-d H:i:s"),
										"partener_pdf_payement" => $this->input->post('partener_pdf_payement'),
										"order_payment_status_partener" => $this->input->post('order_payment_status_partener'),
										);
				}
				
				
		
										$update_process = $this->M_orders->update_this($this->input->post('order_id'), $update_data);
						 redirect(base_url().'comptabilite/showFacturePartener/1/'.$this->input->post('order_id'), 'refresh');
					
				
			}
				} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
			$this->template->load('template','views_comptabilite/showFacturePartener',$data);
	}
	
	public function uploadFile()
    { 

        try {
			$config = array(
							'upload_path' => './medias/payements/',
							'allowed_types' => '*',
							'max_size' => '6000',
							'max_width' => '4000',
							'max_height' => '4000'
							);
     
            $this->load->library('upload');

   
            $file_name    =  'payments_'. md5(microtime());
            $config['file_name'] = $file_name;
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('logo');

            if (!$file)
            {
                    $errors = $this->upload->display_errors('', '');
                  
             var_dump($errors);
            }
            else
            { 

                    $data_file = $this->upload->data();

                    $data_image  =  $data_file['file_name'];
                   
									echo ($data_image);

            }
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}

        }

	 
	
	}
?>