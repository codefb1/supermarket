
		 <style>
 

      .swiper-container {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
	  
    </style>


	<div class="swiper-container mySwiper" style="z-index: 0;">
      <div class="swiper-wrapper">
	  <?php foreach($slider_list as $slider) :?>

	   <div class="swiper-slide">  <div class="effect">   
		<a style="width:100%" href="<?php  echo base_url().'products/goffa'?>" title="<?php echo $slider->banner_title;?>">
                                             <img  src="<?php echo base_url().'admines/medias/banners/'.$slider->banner_picture;?>" alt="<?php echo $slider->banner_title;?>" title="<?php echo $slider->banner_title;?>">
                                     </a>
									 <div id="caption1" class="nivo-html-caption banner_info">
                        <div class="tiva-caption">
                            <div class="left-right" style="">
                               
              <h1 class="mb-3 text-1 title_un"><?php echo $slider->banner_title;?></h1>
              <p class="text-2 text_un" style=""><?php echo $slider->banner_text;?></p> 
			                <p class="text-2 text_deux"><?php echo $slider->banner_text_deux;?></p>
							<p class="text-2 text_troix"><?php echo $slider->banner_text_troix;?></p>
			  						<p><a title="<?php echo $slider->banner_title;?>" href="<?php  echo base_url().'products/goffa'?>" class="btn btn-primary"><?php echo $slider->banner_botton_text;?></a></p>		
                            </div>
                        </div>
                    </div>
									 </div>
									 </div>
					 <?php endforeach; ?>
       
       

       
      </div>
      
    </div>
		<div id="wrapper-site"  style="z-index: 100;" >
            <div id="content-wrapper" class="full-width  ">
                <div id="main">
				<div class="section blcok_certif"  style="background-image: url('<?php echo base_url().'template/';?>img/image-7.png');">
                            <div class="">
                                <div class="row">
                                   <img class="img-fluid" src="<?php echo base_url().'template/';?>img/liste-certif.png">
                                </div>
                            </div>
                        </div>
	<section class="page-home  block_couffat"  style="background-image: url('<?php echo base_url().'template/';?>img/background-couffat.png');text-align: center;background-repeat: no-repeat;" >
    
                        <div class="container container_home" style="padding-left: 50px;padding-right: 50px;">
                            <!-- banner -->
                           
							<div class="info-block">
							<div class="title">
                                              <h2><?php echo $page_couffat->page_name;?></h2>
												
                                            </div>
											<div class="description">
											<?php echo $page_couffat->page_description;?>
											 </div>
											  </div>
                                <div class="row">
									<?php foreach($products_couffat as $couffat) :
			  
				
					                                                 	?>
                                 <div class="col-lg-4 col-md-4">
								 
                                        <div class="row">
										
										   	<div class="col-lg-12 col-md-12 ">
												<img src="<?php echo base_url().'admines/medias/products/'.$couffat->product_picture;?>" alt="<?php echo $couffat->product_name;?>" class="img-fluid">
										
											
                                           </div>
										
										   	<div class="col-lg-12 col-md-12 ">
												 <div class="couffat_title" >
											<a href="<?php echo base_url().'products/show/'.$couffat->product_id.'-'.strtolower(url_title($couffat->product_name));?>" title="<?php echo $couffat->product_name;?>" class="btn-primary"><?php echo $couffat->product_name;?></a>
                                           </div> </div>
										
                                        </div>
                                    </div>
									  <?php endforeach; ?>
                                </div>
								<div class="row">
									<div class="col-lg-12 col-md-12 " style="padding-top: 10px;">
												<a href="<?php echo base_url().'products/goffa';?>" title="j'ai d'autre plan ?" class="autre_oouffa">j'ai d'autre plan ? >></a>
                                        
                                           </div>
									
                              </div>
							 
                        </div>
                         
                        

                    
                        
                    </section>
					
   <div class="wrap-banner block-banner container_pc"  style="background-image: url('<?php echo base_url().'template/';?>img/image 7.jpg');">
            <!-- menu category -->
             <!-- slide show -->
            <div class="section banner">
                <div class="tiva-slideshow-wrapper container " >
				  <?php foreach($banners_list as $banners) :?>
                    <div id="tiva-slideshowe" class="nivoSlider">
                      
                            <img style="max-height: 700px;" class="img-responsive" src="<?php echo base_url().'admines/medias/banners/'.$banners->banner_picture;?>" title="<?php  echo strip_tags($banners->banner_title);?>" alt=" <?php  echo strip_tags($banners->banner_title);?>">
                       
                        
                       
                    </div>
					  <div id="caption<?php  echo $banners->banner_id;?>" class="nivo-html-caption">
                        <div class="tiva-caption">
                            <div class="left-right" style="">
                               
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
        </div>					<!--  products -->
<div class="section" >
<div class="container container_home">
<div class="content">
                                <div class="row">
								   <div class="sidebar-3 sidebar-collection col-lg-3 col-md-3 col-sm-4">

                                        <!-- category -->
                                      
                                        <!-- best seller -->
                                       <?php  if($products_best_seller_list) { ?>	
                                           <div class="sidebar-block best-seller">
                                            <div class="title-block">
                                                Meilleurs <span>Ventes</span><hr/>
                                            </div>
                                            <div class="product-content tab-content">
                                                <div class="row">
                                                	<?php foreach($products_best_seller_list as $products) :
			  
				
																			
                                                                 if($products->product_picture){
					                                                 	?>
                                                    <div class="item col-md-12">
													
                                                        <div class="product-miniature  d-flex">
                                                            <div class="thumbnail-container ">
                                                             
                                                                     <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/products/'.$products->product_picture; ?>" alt="<?php echo $products->product_name;?>">
                                                                        
															</div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                    <div class="product-title">
                                                                   <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>" title="<?php echo $products->product_name;?>"><?php echo substr($products->product_name, 0, 20).'...';?></a>
                                                                            </div>
                                                                  
                                                                   	<?php  if($products->product_is_promo==2){?>
																	  <div class="product-group-price" style=" margin-top: 0px;">
																	<span id=""  class=" "><span class="price product-price-old"> € <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  </span></span>
                                                                        <div class="product-price-and-shipping ">
																		
                                                                            <span class="price product-price-promo"> € <?php echo (number_format($products->product_price_dicount, 2, ',', ''))?>  </span>
                                                                        </div>
                                                                    </div>
																	
																	<?php } else { ?>
																	
																	 <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price"> € <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  </span>
                                                                        </div>
                                                                    </div>
																	<?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													
													<?php } endforeach; ?>
													
													
													  </div>
                                            </div>

                                        </div>  
										<?php  } ?>
										
										  <?php  if($get_products_promo_list) { ?>	
                                           <div class="sidebar-block best-seller">
                                            <div class="title-block">
                                                En <span>Promotion</span>
                                            </div>
                                            <div class="product-content tab-content">
                                                <div class="row">
                                                	<?php foreach($get_products_promo_list as $products) :
			  
				
																		
					
                                                           if($products->product_picture){
					                                                 	?>
                                                    <div class="item col-md-12">
													
                                                        <div class="product-miniature  d-flex">
                                                            <div class="thumbnail-container ">
                                                             
                                                                     <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/products/'.$products->product_picture; ?>" alt="<?php echo $products->product_name;?>">
                                                                        
															</div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                    <div class="product-title">
                                                                   <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>" title="<?php echo $products->product_name;?>"><?php echo substr($products->product_name, 0, 20).'...';?></a>
                                                                            </div>
                                                                  
                                                                
																	
																	  <div class="product-group-price" style=" margin-top: 0px;">
																	<span id=""  class=" "><span class="price product-price-old"> € <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  </span></span>
                                                                        <div class="product-price-and-shipping ">
																		
                                                                            <span class="price product-price-promo"> € <?php echo (number_format($products->product_price_dicount, 2, ',', ''))?>  </span>
                                                                        </div>
                                                                    </div>
																	
																	
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													
													<?php } endforeach; ?>
													
													
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
                                                    <div id="grid" class="tab-pane fade in active show">
                                                        <div class="item text-center row">
																	  <?php foreach($products_list as $products) :
			  
				                                                             $partner = $this->M_partners->get_this($products->product_affected_partener);
																			
					
                                                                 if($products->product_picture){
					                                                 	?>
						
			
													
                                                        <div class=" text-center  items_product mobile_items_product">
                                                        <div class=" js-product-miniature categorie-info">
														<a href="#mpquickview" class="mpquickview-button mpquickview"  data-id="<?php echo $products->product_id;?>" title="<?php echo $products->product_name;?>">
                                                                  <span >Aperçu</span> </a>
														
														      <div class="product-description">
                                                                <div class="product-groups"  style="display:none;">
                                                                    <div class="product-title" style="display:none;">
																	<div class="row">
																	<div class="col-sm-4 col-lg-4 col-md-4 categorie-logo" style="display:none;">

   
																	 <img class="img-fluid brand categorie-img" src="<?php echo base_url().'template/';?>img/<?php echo $products->categorie_id;?>-actives.jpg" alt="<?php echo $products->categorie_name;?>">
                                                                     
																	 </div>
																	
																	 </div>
																	 </div>
																	 
                                                                   
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="thumbnail-container ">
                                                                <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>" title="<?php echo $products->product_name;?>">
                                                                    <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/products/'.$products->product_picture; ?>" alt="<?php echo $products->product_name;?>">
                                                                </a>
                                                               
                                                            </div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                <span class="product-weight-home"> <?php  if($products->show_poids) { ?><?php echo $products->product_poids;?> kg<?php  } ?></span>
                                                              
                                                                    	<?php  if($products->product_is_promo==2){?>
																	  <div class="product-group-price">
																	<span id=""  class=" "><span class="price product-price-old"> € <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  </span></span>
                                                                        <div class="product-price-and-shipping ">
																		
                                                                            <span class="price product-price-promo"> € <?php echo (number_format($products->product_price_dicount, 2, ',', ''))?>  </span>
                                                                        </div>
                                                                    </div>
																	
																	<?php } else { ?>
																	
																	 <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price"> € <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  </span>
                                                                        </div>
                                                                    </div>
																	<?php } ?>
                                                                </div>
                                                               
                                                            </div>
															  <div class="product-title" >
															 <div class="col-sm-12 col-lg-12 col-md-12 product-name" >
   
   
    
																	    <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>"><?php echo $products->product_name;?></a>
                                                                   
																	 </div></div>
															<?php  if($product->product_stock!=2){ ?>
                                                                
															<div id="shopping-cart" class="shopping-cart" style="display:none;">
																	<button  style="background: transparent!important;" type="button" class="btn btn-default add-to-cart add-cart " data-qty=1 data-id=<?php  echo $products->product_id;?>>
																				
																				<img class="img-fluid brand" style="width: auto!important; height: auto!important;" src="<?php echo base_url().'template/';?>img/panier.png" alt="Ajouter au panier">
																	

																				</button> </div>
																 
																			<?php } ?>
																				<div class="product-option-list">   
																						<?php  if($products->product_label_rouge==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Produit Label Rouge"></span><?php  } ?>	
																						<?php  if($products->product_origin==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/origine-france.png" alt="Produit Origine France"></span><?php  } ?>	
																						<?php  if($products->product_bio==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/bio_3.png" alt="Produit Biologique"></span><?php  } ?>	
																						<?php  if($partner){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'admines/medias/certificats/'.$partner->certificat_picture;; ?>"  alt="<?php echo $partner->certificat_name; ?>"></span><?php  } ?>	
                                                                           </div>
									
													
                                                        </div>
                                                    </div>
															 <?php } endforeach; ?>
                                                          </div>
                                                        <div class="content-showmore text-center has-showmore">
                                                            <!--<button type="button" class="btn btn-default novShowMore" onClick="location.href='<?php echo base_url().'products';?>'" name="novShowMore" data-loading="Loading..." data-loadmore="Load More Products">
                                                                <span>Voir tout</span>
                                                            </button>--->
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
						  
						

                        <!-- product kitchen -->
						
				
				<div class="page-home block-home-4  block-home-4-pc  ">
                            <div class="container">
                               

<div class="row">
										
										
										<div class="col-lg-6 col-md-6 col-sm-6 right">
											
												<img class="img-fluid" src="<?php echo base_url().'admines/medias/homeBlocks/'.$blocksTree->home_block_picture;?>" alt="#">
											
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 left">
											<div class="cms-block f-right">
												<h3 class="page-subheading"><?php echo $blocksTree->home_block_title;?></span></h3>
												<?php echo $blocksTree->home_block_text;?>
													<a href="<?php   echo base_url().'associations' ?>" class="btn btn-primary"><?php echo $blocksTree->home_block_botton_text;?></a>
						
											</div>
										</div>
										
										
										
									
									</div>
									</div></div>
									
									
										<div class="page-home block-home-4  block-home-4-mobile">
                            <div class="container_home">
                               

<div class="row">
										
										<div class="cms-block f-right">
												<h3 class="page-subheading"><?php echo $blocksTree->home_block_title;?></span></h3>
											
											</div>
										<div class="right cms-img">
											
												<img class="img-fluid" src="<?php echo base_url().'admines/medias/homeBlocks/'.$blocksTree->home_block_picture;?>" alt="#">
											
										</div>
										<div class="left cms-dispcription">
											<div class="">
												<?php echo $blocksTree->home_block_text;?>
												
											</div>
										</div>
										
											<div class="left" style="width: 100%;">
											<div class="cms-block f-right">
													<a href="<?php   echo base_url().'associations' ?>" class="btn btn-primary"><?php echo $blocksTree->home_block_botton_text;?></a>
						
											</div>
										</div>
										
									<div></div>
									</div>
									</div></div>
                           <!-- SHOP THE LOOK -->
						   
						     <!--   block information  -->
						  <div class="section banner block_service_home ">
                <div class="container container_home">
				<div class="row">
				              <div class="col-lg-3 col-md-3 mb-3 info_blocks" >
							 <div class="row">
							 <div class="col-lg-12 col-md-12 mb-12 info ">
							  <div  class="info_img">
							 <img class="img-fluid" src="<?php echo base_url().'template/';?>img/viande-icon.jpg">
							  </div>
							 <div class="info_text"></br>
							 <h3>Viande Halal </h3>
							 <p>Des viandes halal et certifées AVS !  </p>
							 </div>
							 </div>
							  
							  <div class="col-lg-12 col-md-12 mb-12 info ">
							  <div  class="info_img">
							 <img class="img-fluid" src="<?php echo base_url().'template/';?>img/france-origin-icon.jpg">
							  </div>
							 <div class="info_text"></br>
							 <h3>Origine france </h3>
							 <p>Des viandes halal orgine france !  </p>
							 </div>
							 </div>
							
							 </div>
							  </div>
							    <div class="col-lg-6 col-md-6 mb-6">
								<img class="img-fluid" src="<?php echo base_url().'template/';?>img/round-logo.jpg">
							  </div>
							        <div class="col-lg-3 col-md-3 mb-3 info_blocks" >
							 <div class="row">
							 <div class="col-lg-12 col-md-12 mb-12 info ">
							  <div  class="info_img">
							 <img class="img-fluid" src="<?php echo base_url().'template/';?>img/livraison.jpg">
							  </div>
							 <div class="info_text"></br>
							 <h3>Livraison rapide </h3>
							 <p>Une livraison rapide dans le meilleurs conditions !  </p>
							 </div>
							 </div>
							  
							  <div class="col-lg-12 col-md-12 mb-12 info ">
							  <div  class="info_img">
							 <img class="img-fluid" src="<?php echo base_url().'template/';?>img/ecoute.jpg">
							  </div>
							 <div class="info_text"></br>
							 <h3>À votre écoute </h3>
							 <p>Une équipe experte à votre écoute ! </p>
							 </div>
							 </div>
							
							 </div>
							  </div>
							  </div>
							 
					            </div>
				
            </div>
						  <!--  end block information  -->
			
                      </section>
                </div>
            </div>
        </div>