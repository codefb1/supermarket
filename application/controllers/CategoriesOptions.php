<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class CategoriesOptions extends CI_Controller {
		/*** Init Tables ***/
		
	
		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste des utilisateurs */
		/*** Default controller function ***/

		
		
	
			public function getoptions()
				{
					
				$product_id=$this->input->post('product_id');

				$product = $this->M_products->get_this($product_id);
				$options = $this->M_categories_options->get_options($product->sub_categorie_id,false);
				$group_options = $this->M_categories_options->get_options($product->sub_categorie_id,true);
				 echo json_encode(array('result'=>1,'options'=>$options,'group_options'=>$group_options));
					}
			
		
	}
?>