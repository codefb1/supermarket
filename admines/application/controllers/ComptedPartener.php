<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class ComptedPartener extends CI_Controller {
		
		
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
				//$data['orders_new_list'] = $this->M_orders->get_orders_by_partener_status(1);
				//$data['orders_preparete_list'] = $this->M_orders->get_orders_by_partener_status(null) ;
				//$data['partener'] = $this->M_partners->get_this($this->session->userdata('partener_id'),null);
			    $data['menu']='home';
				$data['count_orders_new_today'] = $this->M_orders->get_count_orders_by_partener_today($this->session->userdata('partener_id'),1);
			
				$data['count_orders_during_preparation_today'] = $this->M_orders->get_count_orders_by_partener_today($this->session->userdata('partener_id'),2);
				$data['count_orders_refuse_today'] = $this->M_orders->get_count_orders_by_partener_today($this->session->userdata('partener_id'),4);
				$data['count_orders_delivered_today'] = $this->M_orders->get_count_orders_by_partener_today($this->session->userdata('partener_id'),3,true);
				$data['orders_awaiting_payment_today'] = $this->M_orders->get_sum_amount_awaiting_payment_today($this->session->userdata('partener_id'),1,true);
				$data['count_orders_delivered'] = $this->M_orders->get_count_orders_by_partener_today($this->session->userdata('partener_id'),3);
				$data['sum_amount_payment'] = $this->M_orders->get_sum_amount_awaiting_payment_today($this->session->userdata('partener_id'),2);
				$data['count_not_orders_not_delivered'] = $this->M_orders->get_count_orders_by_partener_exceeds_date_liv($this->session->userdata('partener_id'),3);
				$data['orders_awaiting_payment_all'] = $this->M_orders->get_sum_amount_awaiting_payment_today($this->session->userdata('partener_id'),1,false);
				$data['partener'] = $this->M_partners->get_this($this->session->userdata('partener_id'));
			} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
				}
			
				$this->template->load('template_partener','views_compte_partners/dashboard',$data);
		}

               
		


            public function products(){
				
						try {    
						$partener_id=$this->session->userdata('partener_id');
							
						
						        $data['menu']='products';
								$data['partener'] = $this->M_partners->get_this($partener_id);
								  if($this->input->get('filtercheck')){
									 $session_search_array = array(
										 'isdispo' => $this->input->get('isdispo'),
										  'keywordPr' => $this->input->get('keywordPr'),
										 'categorie_idPr' => $this->input->get('categorie_idPr'),
										 'sub_categorie_idPr' => $this->input->get('sub_categorie_idPr'),
										 
									 );
									
									$this->session->set_userdata($session_search_array);
								}
								($this->session->userdata('isdispo') != "") ? $isdispo = $this->session->userdata('isdispo') : $isdispo = ""; 
								($this->session->userdata('keywordPr') != "N" and $this->session->userdata('keywordPr') != '') ? $keyword = $this->session->userdata('keywordPr') : $keyword = "N"; 
								($this->session->userdata('categorie_idPr') != "N" and $this->session->userdata('categorie_idPr') != '') ? $categorieId = $this->session->userdata('categorie_idPr') : $categorieId = "N";
								($this->session->userdata('sub_categorie_idPr') != "N" and $this->session->userdata('sub_categorie_idPr') != '') ? $subCategorieId = $this->session->userdata('sub_categorie_idPr') : $subCategorieId = "N";
								$partenerId = "N";
								 
								$config = array();
								$config['base_url'] = base_url() . "comptedPartener/products/";
								$config['total_rows'] = $this->M_products->count_all_by_pt($keyword,$categorieId,$subCategorieId,$partenerId);
								$config['per_page'] = 1000;
								$config['uri_segment'] =3;
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
								$data['categories_list'] = $this->M_categories->get_categories(false);
								$data['parteners_list'] = $this->M_partners->get_all_table(1);
					
								$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
								
							   	$data['products_list'] = $this->M_products->get_all_by_pt($config['per_page'], $page,$keyword,$categorieId,$subCategorieId,$partenerId);
								
								$data['pagination'] = $this->pagination->create_links();
								 
								 $data['keyword'] =$keyword;
								 $data['categorieId'] =$categorieId;
								 $data['subCategorieId'] =$subCategorieId;
								 $data['partenerId'] =$partenerId;
					             $data['isdispo'] =$isdispo;
								 
								 if($categorieId == "N"){
									 $data['categorieId'] ='';
									 }
									 if($partenerId == "N"){
									 $data['partenerId'] ='';
									 }
									 
										
								 if($subCategorieId == "N"){
									  $data['subCategorieId'] ='';
									 }
									if($keyword == "N"){
									  $data['keyword'] ='';
									 }
								$this->template->load('template_partener','views_compte_partners/products',$data);
						
							
						} catch (Exception $exc) {
						  $this->exceptionhandler->handle($exc);
						 
						}
						
}
						
						public function newOrders(){
		
		
					try {     
							  if($this->input->get('filtercheck')){
								 $session_search_array = array(
									 'order_data_created' => $this->input->get('order_data_created'),
									  'order_data_created_end' => $this->input->get('order_data_created_end'),
									 'order_partener_status' => $this->input->get('order_partener_status'),
									 'delivery_status' => $this->input->get('delivery_status'),
									 'order_status' => $this->input->get('order_status')
								 );
								$this->session->set_userdata($session_search_array);
							}
							 $data['order_status'] =$order_status;
							 $data['delivery_status'] =$delivery_status;
							 $data['order_partener_status'] =$order_partener_status;
							 $data['order_data_created'] =$order_data_created;
							 $data['order_data_created_end'] =$order_data_created_end;
							($this->session->userdata('order_data_created') != "N" and $this->session->userdata('order_data_created') != '') ? $order_data_created = $this->session->userdata('order_data_created') : $order_data_created = date("Y-m-01"); 
				            ($this->session->userdata('order_data_created_end') != "N" and $this->session->userdata('order_data_created_end') != '') ? $order_data_created_end = $this->session->userdata('order_data_created_end') : $order_data_created_end = date("Y-m-d"); 
						    ($this->session->userdata('order_partener_status') != "N" and $this->session->userdata('order_partener_status') != '') ? $order_partener_status = $this->session->userdata('order_partener_status') : $order_partener_status = "N";
							($this->session->userdata('delivery_status') != "N" and $this->session->userdata('delivery_status') != '') ? $delivery_status = $this->session->userdata('delivery_status') : $delivery_status = "N";
							($this->session->userdata('order_status') != "N" and $this->session->userdata('order_status') != '') ? $order_status = $this->session->userdata('order_status') : $order_status = 1;

							$config = array();
							$config['base_url'] = base_url() . "comptedPartener/newOrders";
							$config['total_rows'] = $this->M_orders->count_all_for_partener($order_data_created,$order_data_created_end,$order_partener_status,$delivery_status,$order_status);
							$config['per_page'] = 6;
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
							$data['status_list']= $this->M_status->get_all_table(1);
							$data['status_livraison']= $this->M_status->get_all_table(2); 
							$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
							$data['orders_list'] = $this->M_orders->get_all_for_partener($config['per_page'], $page,$order_data_created,$order_data_created_end,$order_partener_status,$delivery_status,$order_status);
							$data['page_name'] = 'orders';
							$data['pagination'] = $this->pagination->create_links();
							$data['order_status'] =$order_status;
							$data['delivery_status'] =$delivery_status;
							$data['order_partener_status'] =$order_partener_status;
							$data['order_data_created'] =$order_data_created;
							$data['order_data_created_end'] =$order_data_created_end;
				            $data['menu']='orders';
							$data['partener'] = $this->M_partners->get_this($this->session->userdata('partener_id'));
						 if($order_partener_status == "N"){
								 $data['order_partener_status'] ='';
								 }
								  if($delivery_status == "N"){
								 $data['delivery_status'] ='';
								 }
					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					 
					}
					
					$this->template->load('template_partener','views_compte_partners/orders',$data);
								
				}
	
	
	
				public function detailOrder()
								{
						
						try {
				    
						$data['orders']= $this->M_orders->get_this(end($this->uri->segments));
					
						//$data['order_country']= $this->M_orders->get_this_country($data['orders']->order_country_id);
						$data['orders_detail']= $this->M_orders->get_orders_detail($data['orders']->order_id);
						$data['partners_list']= $this->M_partners->get_all_table(1);
						$data['status_list']= $this->M_status->get_all_table(1);
						$data['status_livraison']= $this->M_status->get_all_table(2);
						$data['menu']='orders';
						$data['partener'] = $this->M_partners->get_this($this->session->userdata('partener_id'));	
						$data['page_name'] = 'orders';
							} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					 
					}
						$this->template->load('template_partener','views_compte_partners/detail_order',$data);
				}

			public function factures(){
		
		
		try {   
		
		         if($this->input->get('filtercheck')){
								 $session_search_array = array(
									 'delivery_date_time' => $this->input->get('delivery_date_time'),
									  'delivery_date_time_end' => $this->input->get('delivery_date_time_end'),
									 'duration' => $this->input->get('duration'),
								 );
								$this->session->set_userdata($session_search_array);
							}
							
						
				
				($this->session->userdata('delivery_date_time') != "N" and $this->session->userdata('delivery_date_time') != '') ? $delivery_date_time = $this->session->userdata('delivery_date_time') : $delivery_date_time = "N"; 
				($this->session->userdata('delivery_date_time_end') != "N" and $this->session->userdata('delivery_date_time_end') != '') ? $delivery_date_time_end = $this->session->userdata('delivery_date_time_end') : $delivery_date_time_end = "N"; 
				($this->session->userdata('duration') != "N" and $this->session->userdata('duration') != '') ? $duration = $this->session->userdata('duration') : $duration = "N";
				
			    $partener_id=$this->session->userdata('partener_id');
				$data['menu']='factures';			
				$config = array();
				$config['base_url'] = base_url() . "comptedPartener/factures";
				$config['total_rows'] = $this->M_orders->count_all_facture(3,$partener_id,$duration,$delivery_date_time,$delivery_date_time_end);
				$config['per_page'] = 6;
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
			$data['orders_list'] = $this->M_orders->get_all_facture($config['per_page'],$page,3,$partener_id,$duration,$delivery_date_time,$delivery_date_time_end);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			if($duration == "N"){
			  $duration ='';
			}
			if($delivery_date_time == "N"){
			   $delivery_date_time ='';
			}
			if($delivery_date_time_end == "N"){
			  $delivery_date_time_end ='';
			}
			$data['duration'] =$duration;
			$data['delivery_date_time'] =$delivery_date_time;
			$data['delivery_date_time_end'] =$delivery_date_time_end;
			$data['partener'] = $this->M_partners->get_this($this->session->userdata('partener_id'));
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
			$this->template->load('template_partener','views_compte_partners/factures',$data);
		
	}
	
	
	
		public function orderPdfPartners()
		{
			
			try {
	
			$order['orders']= $this->M_orders->get_this(end($this->uri->segments));
			$data['orders']='factures';	
			$order['orders_detail']= $this->M_orders->get_orders_detail($order['orders']->order_id);
           // $this->load->library('m_pdf');
				//$this->data['title']="Commande.";
				//$this->data['description']="";
				///$html=$this->load->view('view_factures/PdffacturePartners',$order,true); 
				//$pdfFilePath ="facture-transporters-numero-".$order['orders']->order_id.".pdf";
				//$pdf = $this->m_pdf->load();
				//$pdf->WriteHTML($html,2);
				//$pdf->Output($pdfFilePath, "D");
				 $this->load->library('html2pdf_lib');
				 
				$no_Save_data=$this->load->view('view_factures/PdffacturePartners',$order,true);
			$filename ="facture-partners-numero-".$order['orders']->order_id.".pdf";
			$save_to = $this->config->item('upload_root');

			if ($this->html2pdf_libs->converHtml2pdf($no_Save_data,$filename,$save_to,1)) {
			echo $save_to.'/'.$filename;
			} else {
			echo 'failed';
			}
				} catch (Exception $e) {
					 echo json_encode(array('result'=> 'Exception reçue : ',  $e->getMessage(), "\n"));;
				}
			
			
		
	}
	public function dipsoOrder() { 
			try {
			
			$order_dispo_time=$this->input->post('order_dispo_time');
			$day=$this->input->post('day');
			$date = date('Y-m-d', strtotime("+".$day."day"));
			
			//$validday = explode("-", $date);
				$order_id=$this->input->post('order_id');
				$update_entries=array('order_dispo_time'=>$order_dispo_time,'order_dispo_date'=>$date,'order_partener_status'=>2,'order_status'=>2);
				$this->M_orders->update_atribute($update_entries,$order_id);
				$order= $this->M_orders->get_this_order($order_id);
				$order_dispo=$order->order_dispo_date.' '.$order->order_dispo_time;
				$order_dispotime= strtotime($order->order_dispo_date.' '.$order->order_dispo_time);
				$isday= false;
				if($order->order_dispo_date==date("Y-m-d") and  time() < $order_dispotime){
					$isday= true;
				}
			   echo json_encode(array('result'=>1,'order_id'=>$order_id,'order_dispo_date'=>$order->order_dispo_date,'order_dispo_time'=>$order->order_dispo_time,'order_dispo'=>$order_dispo,'isday'=>$isday));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
			public function orderPartenerStatus() { 
			try {
			
			$order_status=$this->input->post('order_partener_status');
			$order_id=$this->input->post('order_id');
			
			    $update_entries=array('order_partener_status'=>$order_partener_status);
				$this->M_orders->update_this($order_id,$update_entries);
			    
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		public function update_partener_status() { 
			try {
			
			$order_partener_status=$this->input->post('order_partener_status');
			$order_id=$this->input->post('order_id');
			
			
			    $update_entries=array('order_partener_status'=>$order_partener_status);
				$this->M_orders->update_atribute($update_entries,$order_id);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
			public function ordresDelivry() { 
			try {
			
			$order_partener_status=3;
			$order_status=9;
			$delivery_status=6;
			$order_id=$this->input->post('order_id');
			$delivery_date_time=date("Y-m-d H:i:s");
			
			    $update_entries=array('order_partener_status'=>$order_partener_status,'delivery_status'=>$delivery_status,'order_status'=>$order_status,'delivery_date_time'=>$delivery_date_time);
				$this->M_orders->update_atribute($update_entries,$order_id);
			   echo json_encode(array('result'=>1));
		    	
		

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			}
		}
		
		function checkJourFerie($timestamp)
		{
				$jour = date("d", $timestamp);
				$mois = date("m", $timestamp);
				$annee = date("Y", $timestamp);
				$EstFerie = 0;
				// dates fériées fixes
				if($jour == 1 && $mois == 1) $EstFerie = 1; // 1er janvier
				if($jour == 1 && $mois == 5) $EstFerie = 1; // 1er mai
				if($jour == 8 && $mois == 5) $EstFerie = 1; // 8 mai
				if($jour == 14 && $mois == 7) $EstFerie = 1; // 14 juillet
				if($jour == 15 && $mois == 8) $EstFerie = 1; // 15 aout
				if($jour == 1 && $mois == 11) $EstFerie = 1; // 1 novembre
				if($jour == 11 && $mois == 11) $EstFerie = 1; // 11 novembre
				if($jour == 25 && $mois == 12) $EstFerie = 1; // 25 décembre
				// fetes religieuses mobiles
				$pak = easter_date($annee);
				$jp = date("d", $pak);
				$mp = date("m", $pak);
				if($jp == $jour && $mp == $mois){ $EstFerie = 1;} // Pâques
				$lpk = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak)
				, date("d", $pak) +1, date("Y", $pak) );
				$jp = date("d", $lpk);
				$mp = date("m", $lpk);
				if($jp == $jour && $mp == $mois){ $EstFerie = 1; }// Lundi de Pâques
				$asc = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak)
				, date("d", $pak) + 39, date("Y", $pak) );
				$jp = date("d", $asc);
				$mp = date("m", $asc);
				if($jp == $jour && $mp == $mois){ $EstFerie = 1;}//ascension
				$pe = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak),
				date("d", $pak) + 49, date("Y", $pak) );
				$jp = date("d", $pe);
				$mp = date("m", $pe);
				if($jp == $jour && $mp == $mois) {$EstFerie = 1;}// Pentecôte
				$lp = mktime(date("H", $asc), date("i", $pak), date("s", $pak), date("m", $pak),
				date("d", $pak) + 50, date("Y", $pak) );
				$jp = date("d", $lp);
				$mp = date("m", $lp);
				if($jp == $jour && $mp == $mois) {$EstFerie = 1;}// lundi Pentecôte
				// Samedis et dimanches
				$jour_sem = jddayofweek(unixtojd($timestamp), 0);
				if($jour_sem == 0 || $jour_sem == 6) $EstFerie = 1;
				// ces deux lignes au dessus sont à retirer si vous ne désirez pas faire
				// apparaitre les
				// samedis et dimanches comme fériés.
				return $EstFerie;
		}
		function ckeckDay() {
		$day=$this->input->post('day');
		$date = date('Y-m-d', strtotime("+".$day."day"));
		$timestamp = strtotime($date);

		$weekday= date("l", $timestamp );

    if ($weekday =="Saturday" OR $weekday =="Sunday") {
        echo json_encode(array('result'=>1,'message'=>"weekend"));		
	
	} 
    else {
		$days = explode("-", $date);
		$JourFerie =$this->checkJourFerie(mktime(0,0,0,$days[1],$days[2],$days[0]));
			if($JourFerie) {
			     echo json_encode(array('result'=>1,'message'=>"jours de fériée "));	
			
			}else {
				 echo json_encode(array('result'=>2,'message'=>""));	
			}
	
		}

    }
	function checkNewOrderForpartenaire()
		{   
		$orderIds = [];
			$partener_id = $this->session->userdata('partener_id');
			$newOrders=$this->M_orders->get_new_order_for_partenere($partener_id,1);
		if($newOrders){
			
			foreach($newOrders as $orders){
			
			$order= $this->M_orders->get_this_order($orders->order_id);
	
								$update_data=array(
								'is_partener_singal'=>2,
								'data_partener_singal'=>date("Y-m-d H:i:s"),
								'data_partener_up_auto_status'=>date( "Y-m-d H:i:s", strtotime( "+15 minutes" ) ),
								
							);
				$this->M_orders->update_this($order->order_id, $update_data);
				
			}
			$is_singal = true;
			}
			echo json_encode(array('result'=>2,'is_singal'=>$is_singal,'nbrOrders'=>count($newOrders)));	
		}
		function updateNewOrderForpartenaire()
		{   
			
			$partener_id = $this->session->userdata('partener_id');
			$newOrders=$this->M_orders->get_new_order_for_partenere($partener_id,2);
			$orderIds=[];
			
		if($newOrders){
			
			foreach($newOrders as $orders){
			
			$order= $this->M_orders->get_this_order($orders->order_id);
	
							$update_data=array('order_partener_status'=>4,
							'order_data_updated'=>date("Y-m-d H:i:s"),
							
							);
				
				$this->M_orders->update_this($order->order_id, $update_data);
				$orderIds[]=$orders->order_id;
			}
			
			}
			  echo json_encode(array('result'=>2,'orderIds'=>$orderIds,'partener_id'=>$partener_id ));	      
		}
	function update_order_partener_status()
		{   
			
			$order_id=$this->input->post('order_id');
			$order= $this->M_orders->get_this_order($order_id);

							$update_data=array(
							'order_partener_status'=>4,
							'order_data_updated'=>date("Y-m-d H:i:s"),
							
							);
				
				$this->M_orders->update_this($order->order_id, $update_data);
				
			
			
			
			  echo json_encode(array('result'=>2,'order_id'=>$order_id));	      
		}		
		
	
	public function payments(){
		
		
		try {   
		
		         if($this->input->get('filtercheck')){
								 $session_search_array = array(
									 'delivery_date_time' => $this->input->get('delivery_date_time'),
									  'delivery_date_time_end' => $this->input->get('delivery_date_time_end'),
									 'duration' => $this->input->get('duration'),
								 );
								$this->session->set_userdata($session_search_array);
							}
							
						
				
				($this->session->userdata('delivery_date_time') != "N" and $this->session->userdata('delivery_date_time') != '') ? $delivery_date_time = $this->session->userdata('delivery_date_time') : $delivery_date_time = "N"; 
				($this->session->userdata('delivery_date_time_end') != "N" and $this->session->userdata('delivery_date_time_end') != '') ? $delivery_date_time_end = $this->session->userdata('delivery_date_time_end') : $delivery_date_time_end = "N"; 
				($this->session->userdata('duration') != "N" and $this->session->userdata('duration') != '') ? $duration = $this->session->userdata('duration') : $duration = "N";
				
			    $partener_id=$this->session->userdata('partener_id');;
				$data['menu']='payments';			
				$config = array();
				$config['base_url'] = base_url() . "comptedPartener/payments";
				$config['total_rows'] = $this->M_payments_parteners->count_all_payments($partener_id);
				$config['per_page'] = 6;
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
			$data['payments_parteners_list'] = $this->M_payments_parteners->get_all_payments($config['per_page'],$page,$partener_id);
			$data['page_name'] = 'orders';
			$data['pagination'] = $this->pagination->create_links();
			if($duration == "N"){
			  $duration ='';
			}
			if($delivery_date_time == "N"){
			   $delivery_date_time ='';
			}
			if($delivery_date_time_end == "N"){
			  $delivery_date_time_end ='';
			}
			$data['duration'] =$duration;
			$data['delivery_date_time'] =$delivery_date_time;
			$data['delivery_date_time_end'] =$delivery_date_time_end;
				$data['partener'] = $this->M_partners->get_this($partener_id);
		
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
			$this->template->load('template_partener','views_compte_partners/payments',$data);
		
	}
	
				public function prints()
			{  
            try {
				$this->load->library("EscPos.php");
			
//$connector = new Escpos\PrintConnectors\NetworkPrintConnector("192.168.0.87",9100);
				//	$connector = new Escpos\PrintConnectors\WindowsPrintConnector("/dev/ttyS0");
         //  $connector =  new Escpos\PrintConnectors\FilePrintConnector("/dev/ttyS3");
	//    $connector =  new Escpos\PrintConnectors\FilePrintConnector("./medias/KoTickets");
	   $connector = new Escpos\PrintConnectors\DummyPrintConnector();
     
			$printer = new Escpos\Printer($connector);

			$printer->text("Hello World!\n");
			$printer->cut();

			/* Close printer */
			$printer -> close();
			} catch (Exception $e) {
				echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
			}
            }
}