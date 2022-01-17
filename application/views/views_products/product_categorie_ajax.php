	<?php foreach($products_list as $products) :

                                                        $partner = $this->M_partners->get_this($products->product_affected_partener);
														$path ="";
														if($products->product_picture){
													        $path =base_url().'admines/medias/products/'.$products->product_picture;
													     }
													     if($path){


														?>
														<div class=" text-center col-md-4 items_product mobile_items_product">
                                                        <div class="product-miniature js-product-miniature item-one first-item  categorie-info">
													
																  <a href="#mpquickview" class="mpquickview-button mpquickview"  data-id="<?php echo $products->product_id;?>" title="<?php echo $products->product_name;?>">
                                                                  <span >Ajouter au panier</span> </a>
														
														      <div class="product-description" style="display:none;">
                                                                <div class="product-groups">
                                                                    <div class="product-title">
																	
	                                                              <div class="row">
																	<div class="col-sm-4 col-lg-4 col-md-4 categorie-logo " style="display:none;">

   
																	 <img class="img-fluid brand categorie-img" src="<?php echo base_url().'template/';?>img/<?php echo $products->categorie_id;?>-actives.jpg" alt="<?php echo $products->categorie_name;?>">
                                                                      
																	 </div>
																	 <div class="col-sm-12 col-lg-12 col-md-12 product-name">
                                                                                         <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>"><?php echo $products->product_name;?></a>
                                                                   
																	 </div>
																	 </div>



																   </div>
                                                                   
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="thumbnail-container ">
                                                                <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>" title="<?php echo $products->product_name;?>">
                                                                    <img class="img-fluid image-cover" src="<?php echo $path; ?>" alt="<?php echo $products->product_name;?>">
                                                                </a>
                                                               
                                                            </div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                <span class="product-weight-home"> <?php  if($products->show_poids) { ?><?php echo $products->product_poids;?> kg<?php  } ?></span>
                                                              
                                                                    	<?php  if($products->product_is_promo==2){?>
																	  <div class="product-group-price">
																	<span id=""  class=" "><span class="price product-price-old">  <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  €</span></span>
                                                                        <div class="product-price-and-shipping ">
																		
                                                                            <span class="price product-price-promo">  <?php echo (number_format($products->product_price_dicount, 2, ',', ''))?>  €</span>
                                                                        </div>
                                                                    </div>
																	
																	<?php } else { ?>
																	
																	 <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price">  <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  €</span>
                                                                        </div>
                                                                    </div>
																	<?php } ?>
                                                                </div>
																  <div class="product_price_kg">
                                                                  <?php  if($products->product_is_promo==2){?>
                                                              <span>   <?php  if($products->show_poids) {  echo product_price_kg ($products->product_price_dicount,$products->product_poids);  }  ?>
                                                                           <?php } else { ?>
														      				   <?php  if($products->show_poids) {  echo product_price_kg ($products->product_price_selling,$products->product_poids);  }  ?></span>
                                                           <?php } ?>
														   </div>
                                                            </div>
															  <div class="product-title" >
															 <div class="col-sm-12 col-lg-12 col-md-12 product-name" >
   
   
    
																	    <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>"><?php echo $products->product_name;?></a>
                                                                   
																	 </div></div>
															<?php  if($product->product_stock!=2){ ?>
                                                                
															<div id="shopping-cart" class="shopping-cart" style="display:none;">
																	<button type="button" style="background: transparent!important;" class="btn btn-default add-to-cart add-cart " data-qty=1  data-id=<?php  echo $products->product_id;?>>
																	
																	<img class="img-fluid brand" style="width: auto!important; height: auto!important;" src="<?php echo base_url().'template/';?>img/panier.png" alt="Ajouter au panier">
																	
																	</button>
                                                                </div>
																 
																			<?php } ?>
																			       	<?php if($categorieInfo->categorie_id!=101){  ?>
																			  			<div class="product-option-list">   
																						<?php  if($products->product_label_rouge==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Produit Label Rouge"></span><?php  } ?>	
																						<?php  if($products->product_origin==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/origine-france.png" alt="Produit Origine France"></span><?php  } ?>	
																						<?php  if($products->product_bio==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/bio_3.png" alt="Produit Biologique"></span><?php  } ?>	
																						<?php  if($partner){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'admines/medias/certificats/'.$partner->certificat_picture;; ?>"  alt="<?php echo $partner->certificat_name; ?>"></span><?php  } ?>	
                                                                                           </div>
																						   <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } endforeach; ?>