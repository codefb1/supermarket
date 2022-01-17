<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

 public function __construct()
    {
       parent::__construct();
    	 
    }   
			/*** Default controller function ***/
			public function index()
			{     
			    $data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				
				$data['blocksOne'] = $this->M_homeBlocks->get_this(1);
				$data['blocksTow'] = $this->M_homeBlocks->get_this(2);
				$data['blocksTree'] = $this->M_homeBlocks->get_this(3);
				$data['banners_list'] = $this->M_banners->get_all();
				$data['products_list'] = $this->M_products->get_product_home();
				
				$data['menu'] = "customers";
				
					$this->template->load('template','views_customers/index',$data);
			
			}
 
/*** Default controller function ***/
			public function information()
			{     
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['sub_categories_list'] = $this->M_categories->get_categories(true);
			$data['body'] = 'product-cart checkout-cart blog';
				if($this->input->post('customer_firstname')) {
					
						$update_data=array(
				"customer_lastname" => $this->input->post('customer_lastname'),
				"customer_firstname" => $this->input->post('customer_firstname'),
				"customer_data_updated" => date("Y-m-d H:i:s")

				);
				$update_process = $this->M_customers->update_this($this->session->userdata('customer_id'), $update_data);
					$this->session->set_userdata($update_data);
					$this->session->set_flashdata('SUCCESINFOCOMPTE', "Informations du compte sauvegardées.");
					}
				
				$data['menu'] = "2";
				$data['menuLeft'] = "information";
					$this->template->load('template','views_customers/information',$data);
			
			}
 
 	public function adresses()
			{     
			$data['setting'] = $this->M_settings->get_this();
			$data['sociaux'] = $this->M_sociaux->get_this(1);
			$data['categories_list'] = $this->M_categories->get_categories(false);
			$data['sub_categories_list'] = $this->M_categories->get_categories(true);
			$data['customer'] = $this->M_customers->get_this($this->session->userdata('customer_id'));
			$data['body'] = 'product-cart checkout-cart blog';
				if($this->input->post('type_adress')==1) {
					
						$update_data=array(
						"customer_phone" =>$this->input->post('customer_phone'),
						"customer_address" => $this->input->post('customer_address'),
						"customer_zip" => $this->input->post('customer_zip'),
						"customer_city" => $this->input->post('customer_city'),
						"customer_country" => $this->input->post('customer_country'),
				        "customer_data_updated" => date("Y-m-d H:i:s")

				);
				    $update_process = $this->M_customers->update_this($this->session->userdata('customer_id'), $update_data);
					$this->session->set_userdata($update_data);
					$this->session->set_flashdata('SUCCESADRESS', "Vous avez sauvegardé l’adresse..");
					}
				if($this->input->post('type_adress')==2) {
					
						$update_data=array(
						"customer_delivery_lastname" => $this->input->post('customer_delivery_lastname'),
				        "customer_delivery_firstname" => $this->input->post('customer_delivery_firstname'),
						"customer_delivery_phone" =>$this->input->post('customer_delivery_phone'),
						"customer_delivery_address" => $this->input->post('customer_delivery_address'),
						"customer_delivery_zip" => $this->input->post('customer_delivery_zip'),
						"customer_delivery_city" => $this->input->post('customer_delivery_city'),
						"customer_delivery_country" => $this->input->post('customer_delivery_country'),
				        "customer_data_updated" => date("Y-m-d H:i:s")

				);
				    $update_process = $this->M_customers->update_this($this->session->userdata('customer_id'), $update_data);
					$this->session->set_userdata($update_data);
					
					$this->session->set_flashdata('SUCCESADRESS', "Vous avez sauvegardé l’adresse..");
					}
				$data['menu'] = "2";
				$data['menuLeft'] = "adresses";
					$this->template->load('template','views_customers/adresses',$data);
			
			}
 
}
?>