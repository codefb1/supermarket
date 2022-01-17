<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
class Exports extends CI_Controller { 

 /*** Init Constructor ***/
			
		function exportnewsletters () {
     try {
			
		
			$format= $this->input->post('format');
			$date_debut= $this->input->post('date_debut');
			$date_fin= $this->input->post('date_fin');
			$date_selected= $this->input->post('date_selected');
			
				if(!$date_debut and $date_fin)
				{
					$data['process_status'] = 9991;
					redirect(base_url().'newsletters?error='.$data['process_status'], 'refresh');
				}
				if($date_debut and !$date_fin)
				{
					$data['process_status'] = 999;
					redirect(base_url().'newsletters?error='.$data['process_status'], 'refresh');
				}
			
			if($date_debut)
			{
				$date_debut = explode('/', $this->input->post('date_debut'));
				$date_debut_d = $date_debut[0];
				$date_debut_m   = $date_debut[1];
				$date_debut_y  = $date_debut[2];
				$date_debut=$date_debut_y.'-'.$date_debut_m.'-'.$date_debut_d;
			}
			$date_fin=$this->input->post('date_fin');
	
			if($date_fin)
			{
				$date_fin = explode('/', $this->input->post('date_fin'));
				$date_fin_d = $date_fin[0];
				$date_fin_m   = $date_fin[1];
				$date_fin_y  = $date_fin[2];
				$date_fin=$date_fin_y.'-'.$date_fin_m.'-'.$date_fin_d;
			}
	
			$data['newsletters_list'] = $this->M_exports->get_export_newsletters($date_selected,$date_debut,$date_fin);
			
		    if($data['newsletters_list']){}
			else 
			{
				 $data['process_status'] = 9995414;
				 redirect(base_url().'newsletters?error='.$data['process_status'], 'refresh');		
			}
			if($format==1)
			{
				$this->load->library('m_pdf');


				$html=$this->load->view('views_exports/newsletters/index_pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
				//this the the PDF filename that user will get to download
				$pdfFilePath ="export-newsletters-".date('d-m-Y H:i:s').".pdf";
				//actually, you can pass mPDF parameter on this load() function
				$pdf = $this->m_pdf->load();
				//generate the PDF!
				$pdf->WriteHTML($html,2);
				//offer it to user via browser download! (The PDF won't be saved on your server HDD)
				$pdf->Output($pdfFilePath, "D");
			
	    	}
		if($format==2)
		{
			$this->load->view('views_exports/newsletters/index_xls',$data);
		}
		if($format==3)
		{
          $this->load->view('views_exports/newsletters/index_csv',$data);
	    }
		
	} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}	
		}
		
function exportproduits () {
     try {
			
				$pb_sub_category_id= $this->input->post('pb_sub_category_id');
				$pb_category_id= $this->input->post('pb_category_id');
				$pb_category_type= $this->input->post('pb_category_type');
				$format= $this->input->post('format');
				
	
	
							$data['products_list'] = $this->M_exports->get_export_produit($pb_category_id,$pb_category_type,$pb_sub_category_id);

		    if($data['products_list'] ){}
			else 
			{
				 $data['process_status'] = 999;
				 redirect(base_url().'products?error='.$data['process_status'], 'refresh');		
			}
			if($format==1)
			{
				$this->load->library('m_pdf');


				$html=$this->load->view('views_exports/products/index_pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
				//this the the PDF filename that user will get to download
				$pdfFilePath ="export-products-".date('d-m-Y H:i:s').".pdf";
				//actually, you can pass mPDF parameter on this load() function
				$pdf = $this->m_pdf->load();
				//generate the PDF!
				$pdf->WriteHTML($html,2);
				//offer it to user via browser download! (The PDF won't be saved on your server HDD)
				$pdf->Output($pdfFilePath, "D");
			
	    	}
		if($format==2)
		{
			$this->load->view('views_exports/products/index_xls',$data);
		}
		if($format==3)
		{
          $this->load->view('views_exports/products/index_csv',$data);
	    }
		
	} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}	
		}
				function exportcustomers () {
     try {
		
		
			$format= $this->input->post('format');
			$date_debut= $this->input->post('date_debut');
			$date_fin= $this->input->post('date_fin');
			$date_selected= $this->input->post('date_selected');
		
				if(!$date_debut and $date_fin)
				{
					$data['process_status'] = 999;
					redirect(base_url().'orders?error='.$data['process_status'], 'refresh');
				}
				if($date_debut and !$date_fin)
				{
					$data['process_status'] = 999;
					redirect(base_url().'orders?error='.$data['process_status'], 'refresh');
				}
			
			if($date_debut)
			{
				$date_debut = explode('/', $this->input->post('date_debut'));
				$date_debut_d = $date_debut[0];
				$date_debut_m   = $date_debut[1];
				$date_debut_y  = $date_debut[2];
				$date_debut=$date_debut_y.'-'.$date_debut_m.'-'.$date_debut_d;
			}
			$date_fin=$this->input->post('date_fin');
	
			if($date_fin)
			{
				$date_fin = explode('/', $this->input->post('date_fin'));
				$date_fin_d = $date_fin[0];
				$date_fin_m   = $date_fin[1];
				$date_fin_y  = $date_fin[2];
				$date_fin=$date_fin_y.'-'.$date_fin_m.'-'.$date_fin_d;
			}
	
			$data['customers_list'] = $this->M_exports->get_export_customers($date_selected,$date_debut,$date_fin);
				
		    if($data['customers_list'] ){}
			else 
			{
				 $data['process_status'] = 999;
				 redirect(base_url().'customers?error='.$data['process_status'], 'refresh');		
			}
			if($format==1)
			{
				$this->load->library('m_pdf');


				$html=$this->load->view('views_exports/customers/index_client_pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
				//this the the PDF filename that user will get to download
				$pdfFilePath ="export-customers-".date('d-m-Y H:i:s').".pdf";
				//actually, you can pass mPDF parameter on this load() function
				$pdf = $this->m_pdf->load();
				//generate the PDF!
				$pdf->WriteHTML($html,2);
				//offer it to user via browser download! (The PDF won't be saved on your server HDD)
				$pdf->Output($pdfFilePath, "D");
			
	    	}
		if($format==2)
		{
			$this->load->view('views_exports/customers/index_client_csv',$data);
		}
		if($format==3)
		{
          $this->load->view('views_exports/customers/index_client_csv',$data);
	    }
		
	} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}	
		}
		function exportorders () {
			
			try {
				
						$format= $this->input->post('format');
						$date_debut= $this->input->post('date_debut');
						$date_fin= $this->input->post('date_fin');
						$date_selected= $this->input->post('date_selected');
						$pb_boutique_id= $this->input->post('pb_boutique_id');
						$order_payment_method= $this->input->post('order_payment_method');
						$order_payment_status= $this->input->post('order_payment_status');
						
			
						if(!$date_debut and $date_fin)
						{
							$data['process_status'] = 999;
							redirect(base_url().'orders?error='.$data['process_status'], 'refresh');
						}
						if($date_debut and !$date_fin)
						{
							$data['process_status'] = 999;
							redirect(base_url().'orders?error='.$data['process_status'], 'refresh');
						}
						if($date_debut)
						{
							$date_debut = explode('/', $this->input->post('date_debut'));
							$date_debut_d = $date_debut[0];
							$date_debut_m   = $date_debut[1];
							$date_debut_y  = $date_debut[2];
							$date_debut=$date_debut_y.'-'.$date_debut_m.'-'.$date_debut_d;
						}
						$date_fin=$this->input->post('date_fin');
	
						if($date_fin)
						{
							$date_fin = explode('/', $this->input->post('date_fin'));
							$date_fin_d = $date_fin[0];
							$date_fin_m   = $date_fin[1];
							$date_fin_y  = $date_fin[2];
							$date_fin=$date_fin_y.'-'.$date_fin_m.'-'.$date_fin_d;
						}
						$data['orders_list'] = $this->M_exports->get_export_orders($pb_boutique_id,$date_selected,$date_debut,$date_fin,$order_payment_method,$order_payment_status);	
		//var_dump($this->db->last_query());exit;
						if($data['orders_list'] ){}
							else 
							{
								$data['process_status'] = 999;
								 redirect(base_url().'orders?error='.$data['process_status'], 'refresh');	
							}
							if($format==1)
							{
								$this->load->library('m_pdf');
								$html=$this->load->view('views_exports/orders/index_pdf',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
								//this the the PDF filename that user will get to download
								$pdfFilePath ="export-orders-".date('d-m-Y H:i:s').".pdf";
								//actually, you can pass mPDF parameter on this load() function
								$pdf = $this->m_pdf->load();
								//generate the PDF!
								$pdf->WriteHTML($html,2);
								//offer it to user via browser download! (The PDF won't be saved on your server HDD)
								$pdf->Output($pdfFilePath, "D");
							}
							if($format==2)
							{
								$this->load->view('views_exports/orders/index_xls',$data);
							}
							//var_dump($data['customers_list']);exit;
							if($format==3)
							{	
								$this->load->view('views_exports/orders/index_csv',$data);
							}
				} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
				}
		}
    
		
				function exportordersnew () {
			
			try {
	
	$data['orders_list'] = $this->M_exports->get_export_ordersnew();	
	$this->load->view('views_exports/orders/index_csv',$data);
       } catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
                               }
		}
				
	
 }
