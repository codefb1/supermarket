
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

                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 product-container">
                                 
									   <h1 >     Nos Packs <span>Mouton Entier</span></h1>
										 
                                       
                                        <div class="tab-content product-items"> 
                                   
                                            <div id="list" class="related tab-pane show active">
                                                <div class="row">
												  
                                                <div class="item col-md-12">
                                                        <div class="product-miniature   assosation ">
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
                                                                                     <h2> <a href="#"> 1 <?php echo  $page_comsommer->page_name; ?></a><hr/> </h2>
                                                                                                                                                                    
																																																					
                                                                                
                                                                            </div>
																			<div class="product-discription">
                                                                          <?php echo  $page_comsommer->page_description; ?>
																			
																			</div>
																			
																			<div class="product-group-price">
																			  <div class="row"> 
																			   <div class="col-md-9 col-sm-9 col-lg-9">
																			  </div>
																			  <?php if( $product_association) { ?>
																				
																			   <div class="col-md-2 col-sm-2 col-lg-2">
																			  
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
															
																	  <div class="col-md-1 col-sm-1 col-lg-1">
																	  			<div id="shopping-cart">
																				<button type="button"  class="btn btn-default add-to-cart add-cart_association "  data-id="<?php echo $product_association->product_id; ?>"><span> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </span></button>
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
                                                <div class="row">
												  
                                                <div class="item col-md-12">
                                                        <div class="product-miniature   assosation">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="thumbnail-container border">
                                                                <?php if ($page->page_image) { ?>
                                                                    <img class="img-fluid" src="<?php echo base_url().'admines/medias/pages/'. $page->page_image; ?>" alt="<?php echo  $page->page_name; ?>">
																	<?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                            <div class="product-title">
                                                                                     <h2> <a href="#"> 2 <?php echo $page->page_name;?></a> </h2>
                                                                                                                                                                    
																																																					
                                                                                
                                                                            </div>
																			<div class="product-discription">
                                                                          	<?php echo $page->page_description;?>
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
								
								<div class="row " id="list-associaton">
								   <div class="col-sm-1 col-lg-1 col-md-1"></div>
									  
									  <div class="col-sm-10 col-lg-10 col-md-10">
									   	   
									   <div class="tab-content product-items"> 
                                   
                                            <div id="list" class="related tab-pane show active">
											
                                                <div class="row list-associaton" id="list-assosation">
   <?php foreach($associations_list as $associations) :?>

                                                <div class="item col-md-4 col-sm-4 col-lg-4">
                                                        <div class="product-miniature assosation">
                                                            <div class="row">
															<div class="col-md-11 col-sm-11 col-lg-11">
                                                                  
															 <div class="product-title ">
                                                                                     <h2 class="title-assosacion"><a href="#"> <?php echo $associations->country_name;?></a><hr/> </h2> 
                                                                                         
																			 </div>																																		
                                                                               
                                                                            </div>
                                                                <div class="col-md-11 col-sm-11 col-lg-11">
                                                                    <div class="thumbnail-container border">
                                                                    <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/associations/'.$associations->association_picture; ?>" alt="<?php echo $associations->country_name;?>">
                                                                
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-11 col-sm-11 col-lg-11">
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                           
																			<div class="product-group-price">
																			  <div class="row"> 
																			  <?php if( $product_association) { ?>
																										
																			   <div class="col-md-8 col-sm-8 col-lg-8 action-quantity">
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
																	
                                                              </div> 
																			<div class="col-md-4 col-sm-4 col-lg-4">
																			<div id="shopping-cart">
																										<button type="button" class="btn btn-default add-to-cart add-cart-association" data-association="<?php echo $associations->association_id;?>" data-id="<?php echo $product_association->product_id; ?>" style="background: #000!important;"><span> <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button>
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
									   <div style="text-align:right;margin-bottom:10px;">
   <?=$pagination;?>
  
  </div>
                                            </div>
                                        </div>

									  </div>
								
								<div class="col-sm-1 col-lg-1 col-md-1"></div>
								<div class="col-sm-1 col-lg-1 col-md-1"></div>
								<div class="col-sm-10 col-lg-10 col-md-10">
								 <img class="img-fluid" src="<?php echo base_url().'template/img/sheep-vector.jpg'  ?>" alt="Nos Packs Mouton Entier">
																	
								
								</div>
								<div class="col-sm-1 col-lg-1 col-md-1"></div>
								</div>
                            </div>
                        </div>
                    </div>
            
           
           