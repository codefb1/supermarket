<?php
class M_exports extends CI_Model {
  public $table_customers='av_customers';
		public $table_countries='av_countries';
		public $table_orders_details='av_orders_details';
		public $table_products='av_products';	
	
        public $common_customer_id='customer_id';
		public $field_order_id='order_id';
		
		public $field_customer_id='customer_id';		

		public $field_order_reserverd_day='order_reserverd_day';
		public $field_order_reserved_hour='order_reserved_hour';
		public $field_order_contact_phone='order_contact_phone';
		public $field_order_payment_method='order_payment_method';
		public $field_order_payment_status='order_payment_status';
		public $field_order_amount='order_amount';
		public $field_order_detail_id='order_detail_id';
		public $common_order_id='pb_order_id';
		public $common_product_id='sbo_product_id';

		public $field_product_id='product_id';
		public $field_country_id='country_id';
		public $common_country_id='tr_country_id';
		public $order_country_id='order_country_id';

		public $field_created='data_created';
		public $field_updated='data_updated';
		public $field_status='data_status';
		public $field_civility='customer_civility';
	
		public $customer_civility='customer_civility';
		public $customer_firstname='customer_firstname';
		public $customer_lastname='customer_lastname';

		public $field_order_zip_code='order_zip_code';
		public $field_order_adress='order_adress';
		public $field_order_town='order_town';


		public $field_order_check_number='order_check_number';

		public $field_sex='customer_sex';
		
		

	public $table_newsletters='av_newsletters';
	public $customer_email='customer_email';
	public $newsletter_created='newsletter_created';
	public $newsletter_id='newsletter_id';
	public $table='av_products';
	public $table_categories='av_categories';
				
	public $field_id='product_id';		

	public $field_name='product_name';

	public $field_image='product_image';

	public $field_description='product_description';
	public $field_description_1='product_description_1';
	public $field_information='product_information';
	public $field_is_overall='is_overall';
	public $data_created='data_created';
	public $data_updated='data_updated';
	public $data_status='data_status';
	public $tr_category_type='tr_category_type';
	public $tr_category_id='tr_category_id';
	public $category_id='category_id';
	public $tr_sub_category_id='tr_sub_category_id';
	
	public $city_id='city_id';
	public $tr_city_id='tr_city_id';
	

		function get_export_newsletters($date_selected,$date_debut,$date_fin) {
		try {
				$this->db->select('*');		
				$this->db->from($this->table_newsletters);
				
				
			
				if( $date_selected==1){
				$this->db->where($this->newsletter_created,date("Y-m-d"));
				}
       
				if( $date_selected==2){
				$this->db->where('newsletter_created BETWEEN"'. date("Y-m-d",strtotime( "previous sunday" )). '" and "'. date("Y-m-d").'"');
				}
				if( $date_selected==3){
				//$this->db->where('newsletter_created BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
				$this->db->where('YEAR('.$this->table_newsletters.'.newsletter_created)',date('Y'));
				$this->db->where('MONTH('.$this->table_newsletters.'.newsletter_created)',date('m'));
				}
				if( $date_selected==4){
				$this->db->where('newsletter_created BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
				}
				if( $date_selected==5){
				//$this->db->where('newsletter_created BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
				$this->db->where('YEAR('.$this->table_newsletters.'.newsletter_created)',date('Y'));
				}
				if($date_debut and $date_fin){
				$this->db->where('newsletter_created BETWEEN"'. $date_debut. '" and "'. $date_fin.'"');
				}
				$this->db->order_by($this->newsletter_id,"desc");
				$query = $this->db->get();
				return $query->result();
		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);
		return false;
		}
		}	
		
		
		function get_export_produit($tr_category_id,$tr_category_type,$pb_sub_category_id) {
				
			try {
					
			if($tr_category_id){
			$this->db->where($this->tr_category_id, $tr_category_id);
			}
			if($tr_category_type){
			$this->db->where($this->tr_category_type, $tr_category_type);
			}
			if($pb_sub_category_id){
			$this->db->where($this->pb_sub_category_id, $pb_sub_category_id);
			}
			 $query =$this->db->order_by($this->field_id,"desc");
			 $this->db->join($this->table_categories, $this->table_categories.".".$this->category_id." = ".$this->table.".".$this->tr_category_id,'left');
	
				$query = $this->db->get_where($this->table);
				
				return $query->result();
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_export_customers($date_selected,$date_debut,$date_fin) {
		try {
				$this->db->select('*');		
				$this->db->from($this->table_customers);
				$this->db->join($this->table_citys, $this->table_customers.".".$this->tr_city_id." = ".$this->table_citys.".".$this->city_id,'Left');
		
				if( $date_selected==1){
				$this->db->where($this->field_created,date("Y-m-d"));
				}
       
				if( $date_selected==2){
				$this->db->where('data_created BETWEEN"'. date("Y-m-d",strtotime( "previous sunday" )). '" and "'. date("Y-m-d").'"');
				}
				if( $date_selected==3){
				$this->db->where('YEAR('.$this->table_customers.'.data_created)',date('Y'));
				$this->db->where('MONTH('.$this->table_customers.'.data_created)',date('m'));
				}
				if( $date_selected==4){
				$this->db->where('data_created BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
				}
				if( $date_selected==5){
				$this->db->where('YEAR('.$this->table_customers.'.data_created)',date('Y'));
				}
				if($date_debut and $date_fin){
				$this->db->where('data_created BETWEEN"'. $date_debut. '" and "'. $date_fin.'"');
				}
				$this->db->order_by($this->field_customer_id,"desc");
				$query = $this->db->get();
				return $query->result();
		} catch (Exception $exc) {
		$this->exceptionhandler->handle($exc);
		return false;
		}
		}
		
		 		function get_export_orders($date_selected,$date_debut,$date_fin,$order_payment_method,$order_payment_status){

			try {

					$this->db->select('*,CAST('.$this->table.'.'.$this->field_created.' as Date ) as orders_data_created,'.$this->table.'.'.$this->field_status.' as orders_data_status');		
					$this->db->from($this->table);
					$this->db->join($this->table_customers, $this->table.".".$this->common_customer_id." = ".$this->table_customers.".".$this->field_customer_id,'left');
					$this->db->join($this->table_products, $this->table_orders.".".$this->common_product_id." = ".$this->table_products.".".$this->field_product_id,'left');
			      
				
				
				
					if( $date_selected==1){
					$this->db->where('CAST('.$this->table.".".$this->field_created.' AS Date)=',date("Y-m-d"));
					}

					if( $date_selected==2){
					$this->db->where('CAST(tr_orders.data_created As Date) BETWEEN"'. date("Y-m-d",strtotime( "previous sunday" )). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==3){
					//$this->db->where('CAST(sbo_orders.data_created As Date) BETWEEN"'. date( "Y-m-01"). '" and "'. date("Y-m-d").'"');
					$this->db->where('YEAR('.$this->table.'.data_created)',date('Y'));
					$this->db->where('MONTH('.$this->table.'.data_created)',date('m'));
					}
					if( $date_selected==4){
					$this->db->where('CAST(tr_orders.data_created As Date) BETWEEN"'. date( "Y-m-d", strtotime( "-3 month" ) ). '" and "'. date("Y-m-d").'"');
					}
					if( $date_selected==5){
					//$this->db->where('CAST(sbo_orders.data_created As Date) BETWEEN"'. date( "Y-01-01"). '" and "'. date("Y-m-d").'"');
					$this->db->where('YEAR('.$this->table.'.data_created)',date('Y'));
					}
					if($date_debut and $date_fin){
					$this->db->where('CAST(tr_orders.data_created As Date) BETWEEN"'. $date_debut. '" and "'. $date_fin.'"');
					}

				
					
					$this->db->order_by($this->field_order_id,"desc");
					$query = $this->db->get();
					return $query->result();

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);
			return false;
			}

			}
}
?>