   <div class="wrap-banner">     </div>
            <!-- menu category -->
             <!-- slide show -->
            <div class="section banner">
                <div class="tiva-slideshow-wrapper">
				  <?php foreach($banners_list as $banners) :?>
                    <div id="tiva-slideshow" class="nivoSlider">
                        <a href="#">
                            <img class="img-responsive" style="width: 100%;" src="<?php echo base_url().'admines/medias/banners/'.$banners->banner_picture;?>" title="#caption<?php  echo $banners->banner_id;?>" alt="<?php  echo $banners->banner_id;?>">
                        </a>
                        
                       
                    </div>
					  <div id="caption<?php  echo $banners->banner_id;?>" class="nivo-html-caption">
                        <div class="tiva-caption">
                            <div class="left-right " style="">
                               
              <h1 class="mb-3 text-1"><?php echo $banners->banner_title;?></h1>
              <p class="text-2" style=""><?php echo $banners->banner_text;?></p>
			  <?php  if($banners->product_id){ ?>
              <p ><a href="<?php echo base_url().'products/show/'.$banners->product_id.'-'.strtolower(url_title($banners->product_name));?>" class="btn btn-primary"><?php echo $banners->banner_botton_text;?></a></p>
			  <?php   } ?>
								
                            </div>
                        </div>
                    </div>
					 <?php endforeach; ?>
                </div>
				
            </div>
   
		
		<div id="wrapper-site" >
            <div id="content-wrapper" class="full-width">
                <div id="main">
				    <div class="section spacing-10 group-image-special block-home-2" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);background-image: url('<?php echo base_url().'template/';?>img/image 7.jpg');">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="effect">
									 
                                        <a href="<?php if($blocksOne->product_id){  echo base_url().'products/show/'.$blocksOne->product_id.'-'.strtolower(url_title($blocksOne->product_name)); } else { echo '#';}?>">
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/homeBlocks/'.$blocksOne->home_block_picture;?>" alt="<?php echo $blocksOne->home_block_title;?>" title="<?php echo $blocksOne->home_block_title;?>">
                                        </a>
										  <p><a href="<?php  if($blocksOne->product_id){ echo base_url().'products/show/'.$blocksOne->product_id.'-'.strtolower(url_title($blocksOne->product_name));} else { echo '#';} ?>" class="btn btn-primary"><?php echo $blocksOne->home_block_botton_text;?></a></p>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
	<section class="page-home block-home-3" style="background-image: url('<?php echo base_url().'template/';?>img/image 7.jpg');">
                        


                        <div class="container">
                            <!-- banner -->
                            <div class="section spacing-10 group-image-special col-lg-12 col-xs-12 " id="block-categories">
                                <div class="row">
								 <?php foreach ($categories_list as $categorie): ?>
                            <?php    if ($categorie->categorie_id&1) { ?>
                                 <div class="col-lg-6 col-md-6">
								 
                                        <div class="row block-categorie">
										
										   	<div class="col-lg-6 col-md-6 info-categorie">
												<h2><a title="<?php echo $categorie->categorie_name;?>" href="<?php echo base_url().'products/categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));?>"><span><?php echo ucfirst(substr($categorie->categorie_name,-strlen($categorie->categorie_name)-1, 1));?></span><?php echo substr($categorie->categorie_name,1);?></a> </h2>

												<p><?php echo $categorie->categorie_content;?></p>
                                           </div>
										   <div class="col-lg-6 col-md-6">
										<a title="<?php echo $categorie->categorie_name;?>" href="<?php echo base_url().'products/categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));?>">
										<img src="<?php echo base_url().'admines/medias/categories/'. $categorie->categorie_picture; ?>" alt="<?php echo $categorie->categorie_name;?>" class="img-fluid">
										</a>
                                           </div>
										
                                        </div>
                                    </div>
									<?php   } else { ?>
                                       <?php   }  ?>
     
									
                                  <?php endforeach; ?>
								   <?php foreach ($categories_list as $categorie): ?>
								   <?php    if ($categorie->categorie_id&1) { ?>
                                
									<?php   } else { ?>
									 <div class="col-lg-6 col-md-6">
								 
                                        <div class="row block-categorie">
										
										  
										   <div class="col-lg-6 col-md-6">
										<a title ="<?php echo $categorie->categorie_name;?>"  href="<?php echo base_url().'products/categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));?>">
										<img src="<?php echo base_url().'admines/medias/categories/'. $categorie->categorie_picture; ?>" alt="<?php echo $categorie->categorie_name;?>" class="img-fluid">
										</a>
                                           </div>
										 	<div class="col-lg-6 col-md-6 info-categorie">
													<h2><a title ="<?php echo $categorie->categorie_name;?>" href="<?php echo base_url().'categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));?>"><span><?php echo ucfirst(substr($categorie->categorie_name,-strlen($categorie->categorie_name)-1, 1));?></span><?php echo substr($categorie->categorie_name,1);?></a> </h2>

												<p><?php echo $categorie->categorie_content;?></p>
                                           </div>
                                        </div>
                                    </div>
                                       <?php   }  ?>
     
									
                                  <?php endforeach; ?>
                                </div>
                            </div>

                           
                        </div>

                    
                        
                    </section>
					<!--  products -->
<div class="section" >
<div class="container">
<div class="content">
                                <div class="row">
								   <div class="sidebar-3 sidebar-collection col-lg-3 col-md-3 col-sm-4">

                                        <!-- category -->
                                      
                                        <!-- best seller -->
                                       <?php  if($products_best_seller_list) { ?>	
                                           <div class="sidebar-block best-seller">
                                            <div class="title-block">
                                                Meilleurs <span>Vente</span>
                                            </div>
                                            <div class="product-content tab-content">
                                                <div class="row">
                                                	<?php foreach($products_best_seller_list as $products) :
			  
				
																			$image =$this->M_products_pictures->get_one_product_picture($products->product_id);
																			$path ="";
																			if($image){
																			$path =base_url().'admines/medias/products/'.$image->product_pictures;
																			}
					

					                                                 	?>
                                                    <div class="item col-md-12">
													
                                                        <div class="product-miniature  d-flex">
                                                            <div class="thumbnail-container ">
                                                             
                                                                     <img class="img-fluid image-cover" src="<?php echo $path; ?>" alt="img">
                                                                        
															</div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                    <div class="product-title">
                                                                   <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>"><?php echo substr($products->product_name, 0, 20).'...';?></a>
                                                                            </div>
                                                                    <div class="rating">
                                                                        <div class="star-content">
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price">€ <?php echo (number_format($products->product_price_selling, 2, ',', ''))?> <span><?php  if($products->show_poids) { ?>(<?php echo $products->product_poids;?> kg)</span><?php  } ?></span>
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
										<?php  } ?>
                                         </div>	
								
								   
										<div class="col-lg-9 col-md-9 col-sm-8 products_home">
										
											
											<div class="grouptab">
                                            <div class="product-tab categoriestab-left flex-9">
                                                <div class="title-block">
                                                Composer <span>votre panier!</span>
                                            </div>

                                                <!-- filter -->
                                              
                                                <!-- tab product content -->
                                                <div class="tab-content">
                                                    <div id="all" class="tab-pane fade in active show">
                                                        <div class="item text-center row">
																	  <?php foreach($products_list as $products) :
			  
				
																			$image =$this->M_products_pictures->get_one_product_picture($products->product_id);
																			$path ="";
																			if($image){
																			$path =base_url().'admines/medias/products/'.$image->product_pictures;
																			}
					

					                                                 	?>
						
			
													
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="product-miniature js-product-miniature item-one first-item">
                                                                    <div class="thumbnail-container">
                                                                        <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>">
                                                                            <img class="img-fluid" src="<?php echo $path; ?>" alt="img">
                                                                        </a>
                                                                      
                                                                    </div>
                                                                    <div class="product-description">
                                                                        <div class="product-groups">
                                                                            <div class="product-title">
                                                                                <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>"><?php echo $products->product_name;?></a>
                                                                            </div>
                                                                            <div class="rating">
                                                                                <div class="star-content">
                                                                                    <div class="star"></div>
                                                                                    <div class="star"></div>
                                                                                    <div class="star"></div>
                                                                                    <div class="star"></div>
                                                                                    <div class="star"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-group-price">
                                                                                <div class="product-price-and-shipping">
                                                                                    <span class="price">  € <?php echo (number_format($products->product_price_selling, 2, ',', ''))?> <span><?php  if($products->show_poids) { ?>(<?php echo $products->product_poids;?> kg)</span><?php  } ?></span>
                                                                              
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                     
                                                                    </div>
																	<div id="shopping-cart">
																	<button type="button" class="btn btn-default add-to-cart add-cart " data-qty=1 data-id=<?php  echo $products->product_id;?>><span> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span> Ajouter au panier</span> </button>
                                                                </div>
																</div>
                                                            </div>
															 <?php endforeach; ?>
                                                          </div>
                                                        <div class="content-showmore text-center has-showmore">
                                                            <button type="button" class="btn btn-default novShowMore" onClick="location.href='<?php echo base_url().'products';?>'" name="novShowMore" data-loading="Loading..." data-loadmore="Load More Products">
                                                                <span>Voir tous</span>
                                                            </button>
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
						  
						  <!-- end products -->
				<div class="section newsletter block-service" style="background-image: url('<?php echo base_url().'admines/medias/homeBlocks/'.$blocksTow->home_block_picture;?>');padding: 100px;">
                            <div class="container">
                                <div class="row">
                                    <div class="news-content col-lg-12 col-md-12">
                                        <div class="tiva-modules row">
                                           <div class="col-lg-3 col-md-6 mb-4">
            <div class="service">
              <div><img class="img_1" src="<?php echo base_url().'template/';?>img/icone-1.png"></div>
                <p>Viande <span>halal</span></p>
             
            
            </div>
          </div><div class="col-lg-3 col-md-6 mb-4">
            <div class="service">
               <div><img class="img_2" src="<?php echo base_url().'template/';?>img/icone-2.png"></div>
                <p>Livraison <span>48h</span></p>
              
            
            </div>
          </div>
		  <div class="col-lg-3 col-md-6 mb-4">
            <div class="service">
              <span class="service-1-icon">
               <img  class="img_3"src="<?php echo base_url().'template/';?>img/icone-3.png">
                <p>Origine <span>france</span></p>
              </span>
            
            </div>
          </div>
		  
		  <div class="col-lg-3 col-md-6 mb-4">
            <div class="service">
              <span class="service-1-icon">
               <img  class="img_4"src="<?php echo base_url().'template/';?>img/icone-4.png">
                <p>A votre <span>ecoute</span></p>
              </span>
            
            </div>
          </div>

                                            <!-- Popup newsletter -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   

              

                        <!-- product kitchen -->
						
				
				<div class="page-home block-home-4 ">
                            <div class="container">
                               

<div class="row">
										
										
										<div class="col-lg-6 col-md-6 col-sm-6 right">
											
												<img class="img-fluid" src="<?php echo base_url().'admines/medias/homeBlocks/'.$blocksTree->home_block_picture;?>" alt="#">
											
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 left">
											<div class="cms-block f-right">
												<h3 class="page-subheading"><?php echo $blocksTree->home_block_title;?></span></h3>
												<?php echo $blocksTree->home_block_text;?>
													<a href="<?php  if($blocksTree->product_id){ echo base_url().'products/show/'.$blocksTree->product_id.'-'.strtolower(url_title($blocksTree->product_name)); } else { echo '#'; } ?>" class="btn btn-primary"><?php echo $blocksTree->home_block_botton_text;?></a>
						
											</div>
										</div>
										
										
										
									
									</div>
									</div></div>
                           <!-- SHOP THE LOOK -->
                      </section>
                </div>
            </div>
        </div>