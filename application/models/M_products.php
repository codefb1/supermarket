<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_products extends CI_Model {
	
public $table='av_products';
public $table_categories='av_categories';
public $table_products_pictures='av_products_pictures';
public $table_attributs='av_attributs';
public $table_attributs_values='av_attributs_values';
public $table_products_parteners='av_products_parteners';
public $table_products_attributs='av_products_attributs';
public $table_products_compose='av_products_compose';
public $field_id='product_id';
public $product_data_created='product_data_created';
public $data_updated='data_updated';
public $product_data_status='product_data_status';
public $field_created='product_data_created';
public $field_updated='data_updated';
public $field_status='product_data_status';
public $categorie_id='categorie_id';
public $sub_categorie_id='sub_categorie_id';

public $attribut_id='attribut_id';
public $attribut_value_id='attribut_value_id';

public $partener_id='partener_id';
public $product_ref='product_ref';
public $product_id='product_id';
public $table_parteners='av_parteners';
public $price_buying='price_buying';
public $product_partener_id='product_partener_id';
public $is_disponible='is_disponible';
public $user='user';
public $type='type';
public $product_stock='product_stock';
public $product_name='product_name';
public $product_price='product_price';
public $product_price_selling='product_price_selling';
public $product_best_seller	='product_best_seller';
public $product_is_promo	='product_is_promo';
public $product_entier_association ='product_entier_association';
public $attribut_value	='attribut_value';
public $certificat_id	='certificat_id';
public $product_affected_partener	='product_affected_partener';
public $product_label_rouge	='product_label_rouge';
public $product_promo	='product_promo';
public $product_origin	='product_origin';
public $product_bio	='product_bio';
public $product_is_composer='product_is_composer';
public $product_show_home='product_show_home';
public $prod_id='prod_id';
public $product_compose_id='product_compose_id';
public $categorie_couffin_id='categorie_couffin_id';

 function count_all($categorieId,$subCategorieId,$bio=NULL,$labelRouge=NULL,$certif=NULL,$all_product_categorie=NULL) {
				
				try {
					$this->db->from($this->table);
				
				/*	if($avs) {
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where($this->table_parteners.'.'.$this->certificat_id,$avs);
				
				}*/
				
					if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
					if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
				
				/*if($is_type=='bio') {
				 $this->db->where($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($is_type=='label_rouge') {
				 $this->db->where($this->table.'.'.$this->product_label_rouge,2);
			   }*/
			   
			   	if($certif) {
				
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
				}
				
				
				if($bio) {
				 $this->db->where($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($labelRouge) {
				 $this->db->where($this->table.'.'.$this->product_label_rouge,2);
			   }
				if($all_product_categorie) {
				 $this->db->where_not_in($this->table.'.'.$this->categorie_id,$all_product_categorie);
			   }
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start,$categorieId,$subCategorieId,$orderBy,$bio=NULL,$labelRouge=NULL,$certif=NULL,$all_product_categorie=NULL) {
				
			try {
				
					
				
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				if($certif) {
					
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
				
				}
				if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
				if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
			
					if($bio) {
				 $this->db->where($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($labelRouge) { 
				 $this->db->where($this->table.'.'.$this->product_label_rouge,2);
			   }
			   if($all_product_categorie) {
				 $this->db->where_not_in($this->table.'.'.$this->categorie_id,$all_product_categorie);
			   }
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->limit($limit, $start);
			   
			
			
				if($orderBy==1){
					$this->db->order_by($this->table.'.'.$this->product_name,"asc");
				} else if($orderBy==2){
					$this->db->order_by($this->table.'.'.$this->product_name,"desc");
			    } else if($orderBy==3){
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
			    } else if($orderBy==4){
				   $this->db->order_by($this->table.'.'.$this->product_price_selling,"desc");
			    } else {
					$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				}
				$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		 function count_all_by_categorie($categorieId,$subCategorieId,$bio=NULL,$labelRouge=NULL,$certif=NULL) {
				
				try {
					$this->db->from($this->table);
				
				
				
					if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
					if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
			
			  if($categorieId!=101){ 
						if($certif) {
						
						$this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
						 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
						}
						if($bio and $labelRouge ) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
						 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					   } else if($bio and  !$labelRouge ){
							$this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					  
					   } else if($labelRouge and  !$bio) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
					   }
			    } 
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_by_categorie($limit, $start,$categorieId,$subCategorieId,$orderBy,$bio=NULL,$labelRouge=NULL,$certif=NULL) {
				
			try {
				
					
				
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				
				if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
				if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
			    if($categorieId!=101){ 
						if($certif) {
						
						$this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
						 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
						}
						if($bio and $labelRouge ) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
						 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					   } else if($bio and  !$labelRouge ){
							$this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					  
					   } else if($labelRouge and  !$bio) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
					   }
			    }
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->limit($limit, $start);
			   
			
			
				if($orderBy==1){
					$this->db->order_by($this->table.'.'.$this->product_name,"asc");
				} else if($orderBy==2){
					$this->db->order_by($this->table.'.'.$this->product_name,"desc");
			    } else if($orderBy==3){
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
			    } else if($orderBy==4){
				   $this->db->order_by($this->table.'.'.$this->product_price_selling,"desc");
			    } else {
					$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				}
				$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_this($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table, array($this->field_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
					function get_all_table() {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		
			/* Sart Delete Query Function */
		
			function get_product_attribut_value($product_id,$groupBy = false) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_attributs);
				if($groupBy){
					$this->db->join($this->table_attributs, $this->table_products_attributs.".".$this->attribut_id." = ".$this->table_attributs.".".$this->attribut_id,'left');
				
				}else {
					$this->db->join($this->table_attributs_values, $this->table_products_attributs.".".$this->attribut_value_id." = ".$this->table_attributs_values.".".$this->attribut_value_id,'left');
				
				}
				$this->db->where($this->product_id, $product_id);
				$this->db->order_by($this->table_products_attributs.'.'.$this->attribut_value_id,"desc");
				if($groupBy){
					$this->db->group_by($this->table_products_attributs.".".$this->attribut_id);
				}
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			
		
	
		function getProductReleted($productId,$categorieId) {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				$query=$this->db->where($this->field_id.'!=', $productId);
				$this->db->order_by($this->field_id,"desc");
				$this->db->limit(3);
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function get_product_home() {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->product_show_home, 1);
				$this->db->order_by($this->field_id,'RANDOM');
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				//$this->db->order_by($this->field_id,"desc");
				$this->db->limit(9);
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_product_best_seller() {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->product_is_promo, 2);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				
				$this->db->order_by($this->field_id,"desc");
				$this->db->limit(6);
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_product_promo() {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->product_is_promo, 2);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				
				$this->db->order_by($this->field_id,"desc");
				$this->db->limit(6);
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function get_product_association(){
		 
			try {
					$this->db->from($this->table);
					$this->db->where($this->product_data_status, 1);
					$this->db->where($this->product_entier_association, 1);
				
				$query = $this->db->get();
				return $query->result();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function get_products() {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
			
				$this->db->order_by($this->field_id,"desc");
			
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}

		

					function get_product_price_min($subCategorieId,$bio=NULL,$labelRouge=NULL,$certif=NULL,$count=NULL) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				if($certif) {
				
				$this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
				}
				if($bio and $labelRouge ) {
				 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
				 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
			   } else if($bio and  !$labelRouge ){
				    $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
			  
			   } else if($labelRouge and  !$bio) {
				 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
			   }
				
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				if($count){
					$count = $this->db->count_all_results();
					return $count;
			    } else {
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
				    $query = $this->db->get();
				}
				
				return $query->row();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}


    function get_this_product($param_id){
		 
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				
				$this->db->where($this->table.".".$this->field_id,$param_id);
				
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		function get_prix_product_partener($partener_id,$product_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_parteners);
				$this->db->where($this->table_products_parteners.".".$this->product_id, $product_id);
				$this->db->where($this->table_products_parteners.".".$this->partener_id, $partener_id);
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		
		function count_all_products_subcategorie($categorieId,$subCategorieId,$is_type=NULL,$avs=NULL) {
				
				try {
					$this->db->from($this->table);
				
					if($this->session->userdata('sub_categorie_certif')) {
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$this->session->userdata('sub_categorie_certif'));
				
				}
				
					if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
					if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
				
			if($this->session->userdata('sub_categorie_bio')) {
				 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($this->session->userdata('sub_categorie_label_rouge')) {
				 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
			   }
				
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_products_subcategorie($limit, $start,$categorieId,$subCategorieId,$orderBy,$is_type=NULL,$avs=NULL) {
				
			try {
				$this->db->limit($limit, $start);
				$certifsId=[];
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				if($this->session->userdata('sub_categorie_certif')) {//var_dump($this->session->userdata('sub_categorie_certif'));exit;
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$this->session->userdata('sub_categorie_certif'));
				
				}
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
			    $this->db->where($this->table.'.'.$this->product_is_composer,1);
				if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
				if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
				if($this->session->userdata('sub_categorie_bio')) {
				 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($this->session->userdata('sub_categorie_label_rouge')) {
				 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
			   }
				if($orderBy==1){
					$this->db->order_by($this->table.'.'.$this->product_name,"asc");
				} else if($orderBy==2){
					$this->db->order_by($this->table.'.'.$this->product_name,"desc");
			    } else if($orderBy==3){
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
			    } else if($orderBy==4){
				   $this->db->order_by($this->table.'.'.$this->product_price_selling,"desc");
			    } else {
					$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				}
				$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		
		function count_all_solde($bio=NULL,$labelRouge=NULL,$certif=NULL,$all_product_categorie=NULL) {
				
				try {
					$this->db->from($this->table);
				
				
				
					if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
					if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
			
				
			   
			         if($certif) {
						
						$this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
						 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
						}
						if($bio and $labelRouge ) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
						 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					   } else if($bio and  !$labelRouge ){
							$this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					  
					   } else if($labelRouge and  !$bio) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
					   }
				if($all_product_categorie) {
				 $this->db->where_not_in($this->table.'.'.$this->categorie_id,$all_product_categorie);
			   }
			    $this->db->where($this->product_is_promo, 2);
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
			    $this->db->where($this->table.'.'.$this->product_is_composer,1);
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_solde($limit, $start,$orderBy,$bio=NULL,$labelRouge=NULL,$certif=NULL,$all_product_categorie=NULL) {
				
			try {
				
					$this->db->limit($limit, $start);
				
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				
				if($certif) {
						
						$this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
						 $this->db->where_not_in($this->table_parteners.'.'.$this->certificat_id,$certif);
						}
						if($bio and $labelRouge ) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
						 $this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					   } else if($bio and  !$labelRouge ){
							$this->db->where_not_in($this->table.'.'.$this->product_label_rouge,2);
					  
					   } else if($labelRouge and  !$bio) {
						 $this->db->where_not_in($this->table.'.'.$this->product_bio,2);
					   }
			   if($all_product_categorie) {
				 $this->db->where_not_in($this->table.'.'.$this->categorie_id,$all_product_categorie);
			   }
			    $this->db->where($this->product_is_promo, 2);
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
			    $this->db->where($this->table.'.'.$this->product_is_composer,1);
			
				if($orderBy==1){
					$this->db->order_by($this->table.'.'.$this->product_name,"asc");
				} else if($orderBy==2){
					$this->db->order_by($this->table.'.'.$this->product_name,"desc");
			    } else if($orderBy==3){
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
			    } else if($orderBy==4){
				   $this->db->order_by($this->table.'.'.$this->product_price_selling,"desc");
			    } else {
					$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				}
				$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function count_all_elgofa($categorieId,$subCategorieId,$bio=NULL,$labelRouge=NULL,$certif=NULL,$all_product_categorie=NULL) {
				
				try {
					$this->db->from($this->table);
				
				/*	if($avs) {
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where($this->table_parteners.'.'.$this->certificat_id,$avs);
				
				}*/
				
					/*if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
					if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}*/
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				/*if($is_type=='bio') {
				 $this->db->where($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($is_type=='label_rouge') {
				 $this->db->where($this->table.'.'.$this->product_label_rouge,2);
			   }*/
			   
			   /*	if($certif) {
				
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_in($this->table_parteners.'.'.$this->certificat_id,$certif);
				}*/
				
				
				/*if($bio) {
				 $this->db->where($this->table.'.'.$this->product_bio,2);
			   }*/
			   
			  /* if($labelRouge) {
				 $this->db->where($this->table.'.'.$this->product_label_rouge,2);
			   }
				if($all_product_categorie) {
				 $this->db->where_in($this->table.'.'.$this->categorie_id,$all_product_categorie);
			   }*/
			   
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_is_composer,2);
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_elgofa($limit, $start,$categorieId,$subCategorieId,$orderBy,$bio=NULL,$labelRouge=NULL,$certif=NULL,$all_product_categorie=NULL) {
				
			try {
				
					$this->db->limit($limit, $start);
				
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
			/*	if($certif) {
					
				 $this->db->join($this->table_parteners, $this->table.".".$this->product_affected_partener." = ".$this->table_parteners.".".$this->partener_id,'left');
                 $this->db->where_in($this->table_parteners.'.'.$this->certificat_id,$certif);
				
				}
				if($categorieId) {
				$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
				}
				if($subCategorieId) {
				$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
				}
			
					if($bio) {
				 $this->db->where($this->table.'.'.$this->product_bio,2);
			   }
			   
			   if($labelRouge) { 
				 $this->db->where($this->table.'.'.$this->product_label_rouge,2);
			   }*/
			 /*  if($all_product_categorie) {
				 $this->db->where_in($this->table.'.'.$this->categorie_id,$all_product_categorie);
			   }*/
			//   $this->db->where($this->product_is_promo, 2);
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
			    $this->db->where($this->table.'.'.$this->product_is_composer,2);
			
				if($orderBy==1){
					$this->db->order_by($this->table.'.'.$this->product_name,"asc");
				} else if($orderBy==2){
					$this->db->order_by($this->table.'.'.$this->product_name,"desc");
			    } else if($orderBy==3){
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
			    } else if($orderBy==4){
				   $this->db->order_by($this->table.'.'.$this->product_price_selling,"desc");
			    } else {
					$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				}
				$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_product_couffino() {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->product_is_promo, 2);
				
				
				$this->db->order_by($this->field_id,"desc");
				$this->db->limit(4);
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			function get_product_couffin_home() {
				
			try {
					
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->product_data_status, 1);
				$this->db->where($this->table.'.'.$this->product_is_composer,2);
				$this->db->where($this->product_show_home, 1);
				$this->db->order_by($this->field_id,'RANDOM');
				//$this->db->order_by($this->field_id,"desc");
				$this->db->limit(6);
				$query = $this->db->get();
				return $query->result();
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_packs_product($products_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_compose);
				$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_compose.".".$this->prod_id,'left');
			    $this->db->where_in($this->table_products_compose.".".$this->product_id, $products_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_info_product_composer($param_id){
		 
			try {
				
				$this->db->select('*');		
				$this->db->from($this->table_products_compose);
				$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_compose.".".$this->prod_id,'left');
			    $this->db->where($this->table_products_compose.".".$this->product_compose_id, $param_id);
				$query = $this->db->get();
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		
function count_all_product_couffin($categorieId) {
				
				try {
					$this->db->from($this->table);
				
				
			   
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				//$this->db->where($this->table.'.'.$this->product_entier_association,0);
				//$this->db->where($this->table.'.'.$this->product_is_composer,2);
			 $this->db->where($this->table.'.'.$this->categorie_couffin_id,$categorieId);
				//$this->db->group_by($this->table.'.'.$this->field_id);
				
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_product_couffin($limit, $start,$categorieId,$orderBy) {
				
			try {
					
					$this->db->limit($limit, $start);
				
				$this->db->select('*');		
				$this->db->from($this->table);
				
				$this->db->where($this->table.'.'.$this->product_data_status,1);	
				//$this->db->where($this->table.'.'.$this->product_entier_association,0);
			  //  $this->db->where($this->table.'.'.$this->product_is_composer,2);
			   $this->db->where($this->table.'.'.$this->categorie_couffin_id,$categorieId);
				if($orderBy==1){
					$this->db->order_by($this->table.'.'.$this->product_name,"asc");
				} else if($orderBy==2){
					$this->db->order_by($this->table.'.'.$this->product_name,"desc");
			    } else if($orderBy==3){
					$this->db->order_by($this->table.'.'.$this->product_price_selling,"asc");
			    } else if($orderBy==4){
				   $this->db->order_by($this->table.'.'.$this->product_price_selling,"desc");
			    } else {
					$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				}
				$this->db->group_by($this->table.'.'.$this->field_id);
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
			
}