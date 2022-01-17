	<?php 	$count = $this->M_products->count_all($subCategories->parent_id,$subCategories->categorie_id,$this->session->userdata('certif'),$this->session->userdata('sub_cat_bio'),$this->session->userdata('sub_cat_label_rouge'));
			//var_dump($count);exit; ?>												
					
									<?php $i=1; foreach($subCategories_lists as $subCategories) :
														
													        
														
															$product_price_min = $this->M_products->get_product_price_min($subCategories->categorie_id,$this->session->userdata('product_categorie_bio'),$this->session->userdata('product_boucherie_rouge'),$this->session->userdata('filtre_boucherie_certif'),false);
															$partner = $this->M_partners->get_this($product_price_min->product_affected_partener);
															$count_product = $this->M_products->get_product_price_min($subCategories->categorie_id,$this->session->userdata('product_categorie_bio'),$this->session->userdata('product_boucherie_rouge'),$this->session->userdata('filtre_boucherie_certif'),true);
															 $path=""; 
															if($subCategories->categorie_picture){
															$path =base_url().'admines/medias/categories/'.$subCategories->categorie_picture;
															
															} else {
																 if($product_price_min->product_picture){
																$path =base_url().'admines/medias/products/'.$product_price_min->product_picture;
																 } else {
																	$path =base_url().'template/img/inconu.png';
																}
															}
                                                               
														?>
													<?php if( $path  and $subCategories->count_products > 0 and $product_price_min) { ?>
														
														<div class="text-center  items_product mobile_items_product">
                                                        <div class="product-miniature js-product-miniature item-one first-item categorie-info">
								                           <?php if( $subCategories->count_products > 1 ) { ?>
                                                              <a href="<?php echo base_url().'products/subcategorie/'.$subCategories->categorie_id.'-'.strtolower(url_title($subCategories->categorie_name));?>" class="mpquickview-button" title="<?php echo $subCategories->categorie_name;?>" >
															  <span >Ajouter au panier</span> </a>
															    <?php    } else {?>
																	<a href="#mpquickview" class="mpquickview-button mpquickview"  data-id="<?php echo $product_price_min->product_id;?>" title="<?php echo $product_price_min->product_name;?>">
                                                                  <span >Ajouter au panier</span> </a>
																 <?php    } ?>
														      <div class="product-description">
                                                                <div class="product-groups" style="display:none;">
                                                                    <div class="product-title" >
																 	<div class="row">
																	<div class="col-sm-4 col-lg-4 col-md-4  categorie-logo" style="display:none;" >

   
																	<img class="img-fluid brand categorie-img" src="<?php echo base_url().'template/';?>img/<?php echo $subCategories->parent_id;?>-actives.jpg" alt="<?php echo $subCategories->categorie_name;?>">
                                                                   
																	 </div>
																	 <div class="col-sm-12 col-lg-12 col-md-8 product-name">
   
   
                                                                            <?php if( $subCategories->count_products > 1 ) { ?>
																	 	     <a href="<?php echo base_url().'products/subcategorie/'.$subCategories->categorie_id.'-'.strtolower(url_title($subCategories->categorie_name));?>"><?php echo $subCategories->categorie_name;?></a>
                                                                      <?php    } else {?>
																	     <a href="<?php echo base_url().'products/show/'.$product_price_min->product_id.'-'.strtolower(url_title($product_price_min->product_name));?>"><?php echo $subCategories->categorie_name;?></a>
																	  <?php    } ?>
																	 </div>
																	 </div>  </div>
                                                                   
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="thumbnail-container">
                                                                <?php if( $subCategories->count_products > 1 ) { ?>
                                                                <a href="<?php echo base_url().'products/subcategorie/'.$subCategories->categorie_id.'-'.strtolower(url_title($subCategories->categorie_name));?>"> 
																<img class="img-fluid image-cover" src="<?php echo $path; ?>" alt="<?php echo $subCategories->categorie_name; ?>"></a>
                                                              
															    <?php    } else {?>
																  <a href="<?php echo base_url().'products/show/'.$product_price_min->product_id.'-'.strtolower(url_title($product_price_min->product_name));?>"> 
																<img class="img-fluid image-cover" src="<?php echo $path; ?>" alt="<?php echo $subCategories->categorie_name; ?>"></a>
                                                              
																 <?php    } ?>
                                                               
                                                            </div>
															<?php  if($product_price_min->product_is_promo==2){?>
                                                            <div class="product-description">
															        
                                                                <div class="product-groups">
                                                                  <span class="product-weight"> <?php  if($product_price_min->show_poids) { ?><?php echo $product_price_min->product_poids;?> kg<?php  } ?></span>
                                                              
                                                                    <div class="product-group-price">
																	<span id=""  class=" "><span class="price product-price-old">  <?php echo (number_format($product_price_min->product_price_selling, 2, ',', ''))?>  €</span></span>
                                                               
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price product-price-promo ">  <?php echo (number_format($product_price_min->product_price_dicount, 2, ',', ''))?>  €</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                  					<div class="product_price_kg"><span>   <?php  if($product_price_min->show_poids) {  echo product_price_kg ($product_price_min->product_price_selling,$product_price_min->product_poids);  }  ?></span> </div>
                                                           
                                                            </div>
															<?php } else {  ?>
															   <div class="product-description">
                                                                <div class="product-groups">
                                                                  <span class="product-weight"> <?php  if($product_price_min->show_poids) { ?><?php echo $product_price_min->product_poids;?> kg<?php  } ?></span>
                                                              
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price">  <?php echo (number_format($product_price_min->product_price_selling, 2, ',', ''))?>  €</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                  					<div class="product_price_kg"> <span>   <?php  if($product_price_min->show_poids) {  echo product_price_kg ($product_price_min->product_price_selling,$product_price_min->product_poids);  }  ?></span>  </div>
                                                           
                                                            </div>
															<?php }  ?>
															  <div class="product-title" >
															 <div class="col-sm-12 col-lg-12 col-md-12 product-name" >
                                      
   
                                                            <?php if( $subCategories->count_products > 1 ) { ?>
																	 <a href="<?php echo base_url().'products/subcategorie/'.$subCategories->categorie_id.'-'.strtolower(url_title($subCategories->categorie_name));?>"><?php echo $subCategories->categorie_name;?></a>
                                                                    <?php    } else {?>
																	 <a href="<?php echo base_url().'products/show/'.$product_price_min->product_id.'-'.strtolower(url_title($product_price_min->product_name));?>"><?php echo $subCategories->categorie_name;?></a>
                                                                    <?php    } ?>
																	    
																	 </div></div>
																  	<div class="product-option-list">   
																	                   <?php  if($partner){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'admines/medias/certificats/'.$partner->certificat_picture;; ?>"  alt="<?php echo $partner->certificat_name; ?>"></span><?php  } ?>	
                                                                          
																						<?php  if($product_price_min->product_label_rouge==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Produit Label Rouge"></span><?php  } ?>	
																						<?php  if($product_price_min->product_origin==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/origine-france.png" alt="Produit Origine France"></span><?php  } ?>	
																						<?php  if($product_price_min->product_bio==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/bio_3.png" alt="Produit Biologique"></span><?php  } ?>	
																		 </div>
																		      <div class="product-count">   
																		   <?php if( $this->session->userdata('product_categorie_bio')  or $this->session->userdata('product_boucherie_rouge') or $this->session->userdata('filtre_boucherie_certif') or $this->session->userdata('all_sub_categorie')) { ?>
													                           <?php  if($count_product > 1){ ?>
																			 <p>  <?php echo $count_product; ?> produit(s) trouvés</p>
                                                                                <?php } ?>																			 
																		   <?php } ?>
															</div>
															
															  
														
                                                        </div>
                                                    </div>
													
													<?php }  ?>
														
														
													
													
                                                <?php endforeach; ?>
											 