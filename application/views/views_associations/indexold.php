
                    <div class="page-home page-association">
                        <!-- breadcrumb -->
                        <nav class="breadcrumb-bg">
                            <div class="container no-index">
                                <div class="breadcrumb">
                                    <ol>
                                        <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
									 
										   <li>
                                            <a href="#">
                                                <span>Nos Packs Mouton Entier</span>
                                            </a>
                                        </li>
										   
                                      
                                    </ol>
                                </div>
                            </div>
                        </nav>
	<?php if($banniers){  ?>
                             <div class="section spacing-10 group-image-special block-boucherie" >
                            <div class="">
                                <div class="col-lg-12 col-md-12 categories" >
                                    <div class="effect">
									 
                                      
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/banners/'.$banniers->banner_picture;?>" alt="<?php echo strip_tags($banniers->banner_title); ?>" title="<?php echo strip_tags($banniers->banner_title); ?>">
											<h1> <?php echo $banniers->banner_title; ?> </h1>
    

                                        
										                                     </div>
                                </div>
                             
                            </div>
                        </div>
						<?php } ?>
                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 product-container">
                                 
								
										 
                                       
                                        <div class="tab-content product-items"> 
                                   
                                            <div id="list" class="related tab-pane show active">
                                                <div class="row">
												  
                                                <div class="item col-md-12">
                                                        <div class="product-miniature  assosation consommer">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="thumbnail-container border">
																	<?php if ($page_comsommer->page_image) { ?>
                                                                    <img class="img-fluid" src="<?php echo base_url().'admines/medias/pages/'. $page_comsommer->page_image; ?>" alt="<?php echo  $page_comsommer->page_name; ?>">
																	<?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                            <div class="product-title">
                                                                                     <h2> <a href="#">  <?php echo  $page_comsommer->page_name; ?></a></h2>
                                                                                                                                                                    
																																																					
                                                                                
                                                                            </div>
																			<div class="product-discription">
                                                                          <?php echo  $page_comsommer->page_description; ?>
																			
																			</div>
																			
																			<div class="product-group-price">
																			  <div class="row"> 
																			   <div class="col-md-7 col-sm-7 col-lg-7">
																			  </div>
																			  <?php if( $product_association) { ?>
																				
																			   <div class="col-md-1 col-sm-1 col-lg-1 qty_mobile">
																			  
																	<div class="quantity">
                                                                        <input  id="qty"
																		       class ="product_consommer"
																			   type="text"
																			   value=1
																			   name="qtyUp"
																			   data-bts-min="1"
																			   data-bts-max="100"
																			   data-bts-init-val=""
																			   data-bts-step="1"
																			   data-bts-decimal="0"
																			   data-bts-step-interval="100"
																			   data-bts-force-step-divisibility="round"
																			   data-bts-step-interval-delay="500"
																			   data-bts-prefix=""
																			   data-bts-postfix=""
																			   data-bts-prefix-extra-class=""
																			   data-bts-postfix-extra-class=""
																			   data-bts-booster="true"
																			   data-bts-boostat="10"
																			   data-bts-max-boosted-step="false"
																			   data-bts-mousewheel="true"
																			   data-bts-button-down-class="btn btn-secondary"
																			   data-bts-button-up-class="btn btn-secondary"
																				/>

                                                                    </div>
                                                              </div> 
															   <div class="col-md-2 col-sm-2 col-lg-2 price_mobile">
																	   <div class="product-price-and-shipping"> 
                                                                                       <span class="price"> € <?php echo (number_format($product_association->product_price_selling, 2, ',', ''))?></span>
                                                                        
                                                                                </div>
																	</div>
															
																	  <div class="col-md-2 col-sm-2 col-lg-2 panier_mobile">
																	  			<div id="shopping-cart">
																				<button type="button"  style="background: transparent!important;" class="btn btn-default add-to-cart add-cart-association"  data-id="<?php echo $product_association->product_id; ?>" data-option="<?php echo $product_association->show_option; ?>">
																				<img class="img-fluid brand" style="width: auto!important; height: auto!important;" src="<?php echo base_url().'template/';?>img/panier.png" alt="Ajouter au panier">
																	</button>
																			</div>
																				
																	   </div>
																	   <?php } ?>
															  </div>
                                                                             
                                                                            </div>
																					
																			                                                                        </div>
                                                                  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
								
                                                </div>
            
										   </div>
                                        </div>

                                        <!-- pagination -->
                                    </div>

                                    <!-- end col-md-9-1 -->
                                </div>
								
								<div class="row " >
								
								  <div class="col-sm-12 col-lg-12 col-md-12 product-container">
                                 
									  
                                        <div class="tab-content product-items"> 
                                   
                                            <div id="list" class="related tab-pane show active">
                                                <div class="row">
												  
                                                <div class="item col-md-12">
                                                        <div class="product-miniature  assosation consommer">
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-3 col-lg-3">
                                                                    <div class="thumbnail-container border">
																	<?php if ($page_comsommer->page_image) { ?>
                                                                    <img class="img-fluid" src="<?php echo base_url().'admines/medias/pages/'. $page->page_image; ?>" alt="<?php echo  $page->page_name; ?>">
																	<?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9 col-sm-9 col-lg-9">
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                            <div class="product-title">
                                                                                   <h2> <a href="#">  <?php echo $page->page_name;?></a> </h2>
                                                                                                                                                                        
																																																					
                                                                                
                                                                            </div>
																			<div class="product-discription">
                                                                          <?php echo  $page->page_description; ?>
																			
																			</div>
																			
																					
																	
                                                                    </div>
																	
															
																	
																	
                                                                </div>
																
																		<div class="row association-list">

  <?php foreach($associations_list as $associations) :?>

                                                <div class="item col-md-4 col-sm-4 col-lg-4">
                                                        <div class="product-miniature assosation">
                                                            <div class="row">
															<div class="col-md-12 col-sm-12 col-lg-12">
                                                                  
															 <div class="product-title ">
                                                                                     <h2 class="title-assosacion"><a href="#"> <?php echo $associations->country_name;?></a></h2> 
                                                                                         
																			 </div>																																		
                                                                               
                                                                            </div>
                                                                <div class="col-md-12 col-sm-12 col-lg-12 association-img">
                                                                    <div class="thumbnail-container border ">
                                                                    <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/associations/'.$associations->association_picture; ?>" alt="<?php echo $associations->country_name;?>">
                                                                
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-lg-12 association-price">
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                           
																			<div class="product-group-price">
																			  <div class="row"> 
																			  <?php if( $product_association) { ?>
																										
																			   <div class="col-md-4 col-sm-4 col-lg-4 action-quantity">
																			  <div class="quantity">
                                                                        <input  id="qty"
																		       class ="product_offrire_<?php echo $associations->association_id;?>"
																			   type="text"
																			   value=1
																			   name="qtyUp"
																			   data-bts-min="1"
																			   data-bts-max="100"
																			   data-bts-init-val=""
																			   data-bts-step="1"
																			   data-bts-decimal="0"
																			   data-bts-step-interval="100"
																			   data-bts-force-step-divisibility="round"
																			   data-bts-step-interval-delay="500"
																			   data-bts-prefix=""
																			   data-bts-postfix=""
																			   data-bts-prefix-extra-class=""
																			   data-bts-postfix-extra-class=""
																			   data-bts-booster="true"
																			   data-bts-boostat="10"
																			   data-bts-max-boosted-step="false"
																			   data-bts-mousewheel="true"
																			   data-bts-button-down-class="btn btn-secondary"
																			   data-bts-button-up-class="btn btn-secondary"
																				/>

                                                                    </div>
																	
                                                              </div>   <div class="col-md-4 col-sm-4 col-lg-4 block-price">
																	   <div class="product-price-and-shipping"> 
                                                                                       <span class="price"> € <?php echo (number_format($associations->association_price, 2, ',', ''))?></span>
                                                                        
                                                                                </div>
																	</div>
																			<div class="col-md-4 col-sm-4 col-lg-4 block-panier">
																			<div id="shopping-cart" style="    width: 100%;">
																										<button type="button" style="background: transparent!important;" class="btn btn-default add-to-cart add-cart-association" data-association="<?php echo $associations->association_id;?>" data-id="<?php echo $product_association->product_id; ?>" >
																												<img class="img-fluid brand"  src="<?php echo base_url().'template/';?>img/panier.png" alt="Ajouter au panier">
																</button>
																										</div>	
																			<?php  } ?>
																					</div>
															  </div>
                                                                             
                                                                            </div>
																					
																			                                                                        </div>
                                                                  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
								    <?php endforeach; ?>





																		</div>
                                                                  </div>
																	
                                                            </div>
                                                        </div>
                                                    </div>
								
                                                </div>
            
										   </div>
                                        </div>

                                        <!-- pagination -->
                                    </div>

								
								
								
								
								
								
								
								
								
								
								
								
								
								  
                            </div>
                        </div>
                    </div>
            
           
           