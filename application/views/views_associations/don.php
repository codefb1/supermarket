
                    <div class="page-home page_assocations page-association" style="background-position: 50% 12%;background-image: url(<?php echo base_url().'template/';?>img/background-couffat.png);text-align: center;background-repeat: no-repeat;">
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
                                            <a href="<?php echo base_url();?>associations">
                                                <span>Mouton Entier</span>
                                            </a>
                                        </li>
										     <li class="breadcrumb-title">
                                            <a href="#">
                                                <span>Don</span>
                                            </a>
                                        </li>
                                      
                                    </ol>
                                </div>
                            </div>
                        </nav>

                        <div class="container block_acaht_don">
                            <div class="content">
                           	
								<div class="row " >
								
								  <div class="col-sm-12 col-lg-12 col-md-12 product-container">
                                 
									  
                                        <div class="tab-content product-items"> 
                                   
                                            <div id="list" class="related tab-pane show active">
                                                <div class="row">
												  
                                                <div class="item col-md-12">
                                                        <div class="product-miniature  assosation consommer">
                                                           <div class="row info" align='center'>
														   <div class="col-md-3 col-sm-3 col-lg-3"> </div>
														    <div class="col-md-9 col-sm-9 col-lg-9">
															
															  <div class="product-description">
                                                                        <div class="product-groups">
                                                                            <div class="product-title product-title-don " align="center">
                                                                                   <h1 align="center">  <?php echo $page->page_name;?> </h1>  
                                                                            </div>
																
																			
																					
																	
                                                                    </div>
																	
															
																	
																	
                                                                </div>
															 </div>
                                                                <div class="col-md-3 col-sm-3 col-lg-3">
                                                                    <div class="thumbnail-container">
																	<?php if ($page->page_image) { ?>
                                                                    <img class="img-fluid" src="<?php echo base_url().'admines/medias/pages/'. $page->page_image; ?>" alt="<?php echo  $page->page_name; ?>">
																	<?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9 col-sm-9 col-lg-9">
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                          
																			<div class="product-discription" style="text-align: justify;">
                                                                          <?php echo  $page->page_description; ?>
																			
																			</div>
																			
																					
																	
                                                                    </div>
																	
															
																	
																	
                                                                </div>
																
																		<div class="row association-list">


   
  <?php $i=1; foreach($associations_list as $associations) :?>

                                                <div class="item col-md-4 col-sm-4 col-lg-4" style="border-bottom: 4px dotted  #f4dfcc!important;">
                                                        <div class="product-miniature assosation">
                                                            <div class="row">
															<div class="col-md-12 col-sm-12 col-lg-12">
                                                                  
															 <div class="product-title ">
                                                                                     <h2 class="title-assosacion"><a href="#"> <?php echo $associations->country_name;?></a></h2> 
                                                                                         
																			 </div>																																		
                                                                               
                                                                            </div>
                                                                <div class="col-md-12 col-sm-12 col-lg-12 association-img <?php if ($i % 3 != 0) { echo 'border_right'; }?> " >
                                                                    <div class="thumbnail-container border ">
                                                                    <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/associations/'.$associations->association_picture; ?>" alt="<?php echo $associations->country_name;?>">
                                                                
                                                                    </div>
                                                                </div>
																<div class="col-md-12 col-sm-12 col-lg-12 ">
																<p>( Origine France )</p>
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
                                                                                       <span class="price">  <?php echo (number_format($associations->association_price, 2, ',', ''))?> €</span>
                                                                        
                                                                                </div>
																	</div>
																			<div class="col-md-4 col-sm-4 col-lg-4 block-panier">
																			<div id="shopping-cart" style="    width: 100%;">
																										<button type="button" style="background: transparent!important;" class="btn btn-default add-to-cart add-cart-association" data-association="<?php echo $associations->association_id;?>" data-id="<?php echo $product_association->product_id; ?>" >
																												<img class="img-fluid brand"  src="<?php echo base_url().'template/';?>img/paniers.png" alt="Ajouter au panier">
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
								    <?php $i++;  endforeach; ?>





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
            
           
           