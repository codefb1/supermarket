<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_products extends CI_Model {
	
public $table='av_products';
public $table_categories='av_categories';
public $table_products_compose='av_products_compose';
public $table_categories_couffin='av_categories_couffin';
public $field_id='product_id';
public $table_certificats='av_certificats';
public $product_data_created='product_data_created';
public $data_updated='data_updated';
public $product_data_status='product_data_status';
public $field_created='product_data_created';
public $field_updated='data_updated';
public $field_status='product_data_status';
public $categorie_id='categorie_id';
public $sub_categorie_id='sub_categorie_id';
public $table_products_attributs='av_products_attributs';
public $attribut_id='attribut_id';
public $attribut_value_id='attribut_value_id';
public $table_products_parteners='av_products_parteners';
public $partener_id='partener_id';
public $product_ref='product_ref';
public $product_id='product_id';
public $table_parteners='av_parteners';
public $price_buying='price_buying';
public $product_partener_id='product_partener_id';
public $is_disponible='is_disponible';
public $table_log_products_parteners_price='av_log_products_parteners_price';
public $log_product_partener_id='log_product_partener_id';
public $user='user';
public $type='type';
public $product_stock='product_stock';
public $product_entier_association='product_entier_association';
public $certificat_id='certificat_id';
public $product_is_promo='product_is_promo';
public $product_is_composer='product_is_composer';
public $product_affected_partener='product_affected_partener';
public $product_compose_id='product_compose_id';
public $prod_id='prod_id';
public $prod_qty='prod_qty';
public $prod_poids='prod_poids';
public $categorie_couffin_id='categorie_couffin_id';
		function count_all($keyword="N",$categorieId="N",$subCategorieId="N",$partenerId="N",$productStock="N",$productIsPromo="N") {
				
				try {
					$this->db->from($this->table);
					if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$param_1 = str_replace("'", "\'",$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
					if($partenerId != "N" and  $partenerId) {
						$this->db->join($this->table_products_parteners, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
				
						$this->db->where($this->table_products_parteners.'.'.$this->partener_id,$partenerId);
					}
					if($productStock != "N" and  $productStock) {
						$this->db->where($this->table.'.'.$this->product_stock,$productStock);
					}
					if($productIsPromo != "N" and  $productIsPromo) {
						$this->db->where($this->table.'.'.$this->product_is_promo,$productIsPromo);
					}
					$this->db->where($this->table.'.'.$this->product_is_composer,1);
					
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all($limit, $start,$keyword="N",$categorieId="N",$subCategorieId,$partenerId="N",$productStock="N",$productIsPromo="N",$export=0) {
				
			try {
				if($export == 0){
					$this->db->limit($limit, $start);
				}
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$param_1 = str_replace("'", "\'",$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					if($partenerId != "N" and  $partenerId) {
					$this->db->join($this->table_products_parteners, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
				    $this->db->where($this->table_products_parteners.'.'.$this->partener_id,$partenerId);
					}
					if($productStock != "N" and  $productStock) {
						$this->db->where($this->table.'.'.$this->product_stock,$productStock);
					}
					if($productIsPromo != "N" and  $productIsPromo) {
						$this->db->where($this->table.'.'.$this->product_is_promo,$productIsPromo);
					}
					$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function count_all_compose() {
				
				try {
					$this->db->from($this->table);

					if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
					if($partenerId != "N" and  $partenerId) {
						$this->db->join($this->table_products_parteners, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
				
						$this->db->where($this->table_products_parteners.'.'.$this->partener_id,$partenerId);
					}
					if($productStock != "N" and  $productStock) {
						$this->db->where($this->table.'.'.$this->product_stock,$productStock);
					}
					if($productIsPromo != "N" and  $productIsPromo) {
						$this->db->where($this->table.'.'.$this->product_is_promo,$productIsPromo);
					}
					$this->db->where($this->table.'.'.$this->product_is_composer,2);
					
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_compose($limit, $start,$export=0) {
				
			try {
				if($export == 0){
					$this->db->limit($limit, $start);
				}
				$this->db->select('*');		
				$this->db->from($this->table);
				//$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
					$this->db->join($this->table_categories_couffin, $this->table.".".$this->categorie_couffin_id." = ".$this->table_categories_couffin.".".$this->categorie_couffin_id,'left');
			
				if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
					
					$this->db->where($this->table.'.'.$this->product_is_composer,2);
				$this->db->order_by($this->table.'.'.$this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function count_all_by_pt_old($keyword="N",$categorieId="N",$subCategorieId="N",$partenerId="N") {
				
				try {
					$this->db->from($this->table_products_parteners);
					
					$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
					$this->db->where($this->table_products_parteners.'.'.$this->partener_id,$this->session->userdata('partener_id'));
					$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
                    if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					$this->db->where($this->table.'.'.$this->product_entier_association,0);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_by_pt_old($limit, $start,$keyword="N",$categorieId="N",$subCategorieId,$partenerId="N",$export=0) {
				
			try {
				if($export == 0){
					$this->db->limit($limit, $start);
				}
				$this->db->select('*');		
				$this->db->from($this->table_products_parteners);
				
				$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
				$this->db->where($this->table_products_parteners.'.'.$this->partener_id,$this->session->userdata('partener_id'));
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					$this->db->where($this->table.'.'.$this->product_entier_association,0);
					$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->order_by($this->table_products_parteners.'.'.$this->product_partener_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function count_all_by_pt($keyword="N",$categorieId="N",$subCategorieId="N",$partenerId="N") {
				
				try {
					$this->db->from($this->table);
					
				//	$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
					//$this->db->where($this->table_products_parteners.'.'.$this->partener_id,$this->session->userdata('partener_id'));
					$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
                    if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					$this->db->where($this->table.'.'.$this->product_entier_association,0);
					$this->db->where($this->table.'.'.$this->product_is_composer,1);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
			function get_all_by_pt($limit, $start,$keyword="N",$categorieId="N",$subCategorieId,$partenerId="N",$export=0) {
				
			try {
				if($export == 0){
					$this->db->limit($limit, $start);
				}
				$this->db->select('*');		
				$this->db->from($this->table);
				
				//$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_parteners.".".$this->product_id,'left');
				//$this->db->where($this->table_products_parteners.'.'.$this->partener_id,$this->session->userdata('partener_id'));
				$this->db->join($this->table_categories, $this->table.".".$this->categorie_id." = ".$this->table_categories.".".$this->categorie_id,'left');
				if($keyword != "N" and  $keyword) {	
						$param_1 = trim($keyword);
						$param_1 = str_replace('""', '',$param_1);
						$this->db->where("(product_ref like '%$param_1%' OR product_name like '%$param_1%')");
					}
					if($subCategorieId != "N" and  $subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
				
					if($categorieId != "N" and  $categorieId) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					$this->db->where($this->table.'.'.$this->product_entier_association,0);
					$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->order_by($this->table.'.'.$this->product_id,"desc");
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
		
		
		
		
		function add_new_entry($new_entry){
		 
			try {
			
				if($this->db->insert($this->table, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		
		
		function update_this($param_1,$update_entry){
		 
			try {
			
				$this->db->where($this->field_id, $param_1);
			
				$this->db->update($this->table, $update_entry);

				return true;
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
					

		
				/* Sart Delete Query Function */
			function deletethis($data_id) {

			try {
				$query=$this->db->where($this->field_id, $data_id);
				$query=$this->db->delete($this->table);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
					/* Sart Update Status Query function */
			public function update_status($data_post,$data_id){
				
					try {
			$query=$this->db->where($this->field_id, $data_id);
			$query=$this->db->update($this->table, $data_post);

			return true;

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
			function get_all_table_for_composer() {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->where($this->table.'.'.$this->product_affected_partener.'>',0);
				
				$this->db->order_by($this->field_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
	
		function add_new_entry_products_attributs($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_products_attributs, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		
		
			/* Sart Delete Query Function */
			function deletethis_products_attributs($product_id) {

			try {
				$query=$this->db->where($this->product_id, $product_id);
				$query=$this->db->delete($this->table_products_attributs);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			
			function get_product_attribut($product_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_attributs);
				$this->db->where($this->product_id, $product_id);
				$this->db->order_by($this->field_id,"desc");
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
			function add_new_entry_products_parteners($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_products_parteners, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		function update_this_products_parteners($param_1,$update_entry){
		 
			try {
			
				$this->db->where($this->product_partener_id, $param_1);
			
				$this->db->update($this->table_products_parteners, $update_entry);

				return true;
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function deletethis_products_parteners($data_id) {

			try {
				$query=$this->db->where($this->product_partener_id, $data_id);
				$query=$this->db->delete($this->table_products_parteners);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
		
			/* Sart Delete Query Function */
			function deletethis_products_partenerss($partener_id) {

			try {
				$query=$this->db->where($this->partener_id, $partener_id);
				$query=$this->db->delete($this->table_products_parteners);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			
			function get_product_parteners($partener_id,$product_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_parteners);
				if($partener_id){
					$this->db->join($this->table, $this->table_products_parteners.".".$this->product_id." = ".$this->table.".".$this->product_id,'left');
				
					$this->db->where($this->table_products_parteners.".".$this->partener_id, $partener_id);
				}
				if($product_id){
					$this->db->join($this->table_parteners, $this->table_products_parteners.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				
					$this->db->where($this->table_products_parteners.".".$this->product_id, $product_id);
				}
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_product_parteners_certifacts($product_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_parteners);
				
			
					
					$this->db->join($this->table_parteners, $this->table_products_parteners.".".$this->partener_id." = ".$this->table_parteners.".".$this->partener_id,'left');
				  $this->db->join($this->table_certificats, $this->table_parteners.".".$this->certificat_id." = ".$this->table_certificats.".".$this->certificat_id,'left');

		
					$this->db->where($this->table_products_parteners.".".$this->product_id, $product_id);
				
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		function get_prix_product_parteners($product_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_parteners);
				$this->db->where($this->table_products_parteners.".".$this->product_id, $product_id);
				$this->db->where($this->table_products_parteners.".".$this->is_disponible, 1);
				$this->db->order_by($this->table_products_parteners.'.'.$this->price_buying,"desc");
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		function get_this_product_parneter($product_id,$partener_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_products_parteners, array($this->product_id => $product_id,$this->partener_id => $partener_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function get_disponible_product_parteners($product_id,$is_disponible){
		 
			try {
				
				$query = $this->db->get_where($this->table_products_parteners, array($this->product_id => $product_id,$this->is_disponible => $is_disponible));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		
		function get_this_product_parneters($param_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_products_parteners, array($this->product_partener_id => $param_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
	function get_this_product_parneters_by_product($product_id,$partener_id){
		 
			try {
				
				$query = $this->db->get_where($this->table_products_parteners, array($this->product_id => $product_id,$this->partener_id => $partener_id));
					
					return $query->row();
				 
			} catch (Exception $exc) {
					$this->exceptionhandler->handle($exc);
					return false;
				}
			
		}
		function add_new_entry_log_products_parteners_price($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_log_products_parteners_price, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
		function getLogProductPartenerPrice($product_id,$partener_id,$type=null) {
				
			try { 
				$this->db->select('*');		
				$this->db->from($this->table_log_products_parteners_price);
				$this->db->where($this->table_log_products_parteners_price.".".$this->product_id, $product_id);
				if($type){
					$this->db->where($this->table_log_products_parteners_price.".".$this->type, $type);
				}
				if($partener_id){
					$this->db->where($this->table_log_products_parteners_price.".".$this->user, $partener_id);
				}
				
				$this->db->order_by($this->table_log_products_parteners_price.'.'.$this->log_product_partener_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
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
			
	function updatecatacterique_products_parteners($partener_id,$product_id,$update_entry){
		 
			try {
			
				$this->db->where($this->partener_id, $partener_id);
			    $this->db->where($this->product_id, $product_id);
				$this->db->update($this->table_products_parteners, $update_entry);

				return true;
			 
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function get_products_by_id($products_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
			    $this->db->where_in($this->table.".".$this->product_id, $products_id);
				$this->db->order_by($this->table.'.'.$this->product_id,"desc");
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		

		function add_new_entry_products_compose($new_entry){
		 
			try {
			
				if($this->db->insert($this->table_products_compose, $new_entry)) {
					
					return true;
				}
				
				else {
					
					return false;
					
				}
				
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				
			}
			
		}
			function get_packs_product($products_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_compose);
			    $this->db->where_in($this->table_products_compose.".".$this->product_id, $products_id);
				$this->db->join($this->table, $this->table.".".$this->product_id." = ".$this->table_products_compose.".".$this->prod_id,'left');
				
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
		
		
			function remove_packs_product($product_id) {

			try {
				$query=$this->db->where($this->product_id, $product_id);
				$query=$this->db->delete($this->table_products_compose);

				return true;

			} catch (Exception $exc) {
			$this->exceptionhandler->handle($exc);

			return false;
			}

			}
			
				function count_product_by_categorie($categorieId=null,$subCategorieId=null) {
				
				try {
					$this->db->from($this->table);
					
				
					if($categorieId ) {
						$this->db->where($this->table.'.'.$this->categorie_id,$categorieId);
					}
					if($subCategorieId) {
						$this->db->where($this->table.'.'.$this->sub_categorie_id,$subCategorieId);
					}
					$this->db->where($this->table.'.'.$this->product_data_status,1);
					$count = $this->db->count_all_results();
					return $count;

				} catch (Exception $exc) {
				  $this->exceptionhandler->handle($exc);
			
					return false;
				}
		}
		
		
		
		function get_all_product_for_partenert() {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table_products_parteners);
			    $this->db->where_in($this->partener_id, 9);
			
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
			function getproductsByCertificat($certificat_id) {
				
			try {
				$this->db->select('*');		
				$this->db->from($this->table);
				$this->db->where($this->table.'.'.$this->product_entier_association,0);
				$this->db->where($this->table.'.'.$this->product_data_status,1);
				$this->db->where($this->table.'.'.$this->product_is_composer,1);
				$this->db->where($this->table.'.'.$this->certificat_id,$certificat_id);
			
				$query = $this->db->get();
				return $query->result();
			} catch (Exception $exc) {
				$this->exceptionhandler->handle($exc);
				
				return false;
			}
			
		}
		
}