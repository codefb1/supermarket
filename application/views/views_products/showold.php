       <div class="page-home detail_product">

                        <!-- breadcrumb -->
                   
						    <div class="section spacing-10 group-image-special block-boucherie" >
                            <div class="">
                                <div class="col-lg-12 col-md-12 categories" >
                                    <div class="effect">
									 
                                       
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/banners/'.$setting->boucherie_bannier;?>" alt="La" title="Boucherie">
											<h1> La <span>  Boucherie</span> </h1>
    

                                        
										                                     </div>
                                </div>
                             
                            </div>
                        </div>
						
						
						     <nav class="breadcrumb-bg">
                            <div class="container no-index">
                                <div class="breadcrumb">
                                    <ol>
                                        <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
											<?php if($product->product_is_composer==1){?>
											
                                         <li class="breadcrumb-home">
                                            <a href="<?php echo base_url().'products/categorie/'.$categorieParent->categorie_id.'-'.strtolower(url_title($categorieParent->categorie_name));?>">
                                                <span><?php echo $categorieParent->categorie_name;?></span>
                                            </a>
                                        </li>
										  <li class="breadcrumb-home">
                                            <a href="<?php echo base_url().'products/subcategorie/'.$categoriefils->categorie_id.'-'.strtolower(url_title($categoriefils->categorie_name));?>">
                                                <span><?php echo $categoriefils->categorie_name;?></span>
                                            </a>
                                        </li>
										<?php } else { ?>
										 <li class="breadcrumb-home">
                                            <a href="<?php echo base_url().'products/goffa';?>">
                                                <span>Couffin </span>
                                            </a>
                                        </li>
											<?php }  ?>
										<li  class="breadcrumb-title">
                                            <a href="#">
                                                <span><?php echo $product->product_name;?></span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </nav>
                        <div class="container">
                            <div class="content" style="margin-top: -1rem;">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
									
                                        <div class="main-product-detail">
                                           
                                            <div class="product-single row border">
                                                <div class="product-detail col-xs-12 col-md-5 col-sm-5">
												 <h1 class="show_mobile"><?php echo $product->product_name; ?></h1>
                                                    <div class="page-content" id="content">
                                                        <div class="images-container">
														
			                                   	<?php if($product->product_is_composer==1){?>
				
                                                            <div class="js-qv-mask mask tab-content ">
															<?php $i=1; foreach ($product_pictures_list as $product_pictures):?>
															
                                                                <div id="item<?php echo $product_pictures->product_picture_id?>" class="tab-pane fade <?php if($i==1){?> active in show <?php } ?>">
                                                                    <img src="<?php echo base_url().'admines/medias/products/'.$product_pictures->product_pictures;?>" alt="<?php echo $product_pictures->product_pictures_alt;?>">
                                                                </div>
																 <?php $i++; endforeach; ?>
                                                               
                                                               
                                                              
                                                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                                                    <i class="fa fa-expand"></i>
                                                                </div>
                                                            </div>
                                                            <ul class="product-tab nav nav-tabs d-flex">
															<?php $i=1; foreach ($product_pictures_list as $product_pictures):?>
                                                                <li class=" <?php if($i==1){?>  active <?php } ?> col">
                                                                    <a style="width: 25%;" href="#item<?php echo $product_pictures->product_picture_id?>" data-toggle="tab" aria-expanded="true"  >
                                                                        <img src="<?php echo base_url().'admines/medias/products/'.$product_pictures->product_pictures;?>" alt="<?php echo $product_pictures->product_pictures_alt;?>">
                                                                    </a>
                                                                </li>
																 <?php $i++; endforeach; ?>
                                                                
                                                            </ul>
								    <div class="modal fade" id="product-modal" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-body">
                                                                                <div class="product-detail">
                                                                                    <div>
                                                                                        <div class="images-container">
                                                                                            <div class="js-qv-mask mask tab-content">
                                                                                            
																										<?php $i=1; foreach ($product_pictures_list as $product_pictures):?>

																										<div id="modal-item<?php echo $product_pictures->product_picture_id?>" class="tab-pane fade <?php if($i==1){?> active in show <?php } ?>">
																										<img src="<?php echo base_url().'admines/medias/products/'.$product_pictures->product_pictures;?>" alt="<?php echo $product_pictures->product_pictures_alt;?>">
																										</div>
																										<?php $i++; endforeach; ?>
                                                                                             
                                                                                            </div>
                                                                                            <ul class="product-tab nav nav-tabs">
                                                                                                
																									<?php $i=1; foreach ($product_pictures_list as $product_pictures):?>
																										<li class=" <?php if($i==1){?>  active <?php } ?> col">
																											<a href="#modal-<?php echo $product_pictures->product_picture_id?>" data-toggle="tab" aria-expanded="true" <?php if($i==1){?>  class="active show" <?php } ?> >
																											<img src="<?php echo base_url().'admines/medias/products/'.$product_pictures->product_pictures;?>" alt="<?php echo $product_pictures->product_pictures_alt;?>">
																											</a>
																											</li>
																									<?php $i++; endforeach; ?>
                                                                                                
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
															<?php } else { ?>
															  <div class="js-qv-mask mask tab-content ">
															
                                                                <div id="item<?php echo $product->product_id?>" class="tab-pane fade  active in show">
                                                                    <img src="<?php echo base_url().'admines/medias/products/'.$product->product_picture;?>" alt="<?php echo $product->product_namet;?>">
                                                                </div>
																
                                                               
                                                               
                                                              
                                                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                                                    <i class="fa fa-expand"></i>
                                                                </div>
                                                            </div>
															   <ul class="product-tab nav nav-tabs d-flex">
															
                                                                <li class="active  col">
                                                                    <a style="width: 25%;" href="#item<?php echo $product->product_id?>" data-toggle="tab" aria-expanded="true"  >
                                                                        <img src="<?php echo base_url().'admines/medias/products/'.$product->product_picture;?>" alt="<?php echo $product->product_name;?>">
                                                                    </a>
                                                                </li>
																
                                                                
                                                            </ul>
															
																							    <div class="modal fade" id="product-modal" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-body">
                                                                                <div class="product-detail">
                                                                                    <div>
                                                                                        <div class="images-container">
                                                                                            <div class="js-qv-mask mask tab-content">
                                                                                            
																		
																										<div id="modal-item<?php echo $product->product_id?>" class="tab-pane fade  active in show ">
																										<img src="<?php echo base_url().'admines/medias/products/'.$product->product_picture;?>" alt="<?php echo $product->product_name;?>">
																										</div>
																							
                                                                                             
                                                                                            </div>
                                                                                            <ul class="product-tab nav nav-tabs">
                                                                                                
																									<li class="active  col">
																											<a href="#modal-<?php echo $product->product_id?>" data-toggle="tab" aria-expanded="true"   class="active show"  >
																											<img src="<?php echo base_url().'admines/medias/products/'.$product->product_picture;?>" alt="<?php echo $product->product_name;?>">
																											</a>
																											</li>
																									
                                                                                                
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
															
															
														
															<?php } ?>
                                                        
                                                        </div>
                                                    </div>
													
															<?php  if($product->product_label_rouge==2 or  $product->product_origin==2 or  $product->product_bio==2 or $partner->certificat_name){ ?>
												<div class="col-sm-12 col-lg-12 col-md-12 block-label">
												<div class="review" >
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#description" class="active show">Label</a>
                                                    </li>
                                                  
                                                </ul>
													
												<div class="product-attribut">
												<span class="product-option"><img class="img-fluid" src="<?php echo base_url().'admines/medias/certificats/'.$partner->certificat_picture;; ?>" alt="<?php  echo $partner->certificat_name; ?>"></span>	
												
												<?php  if($product->product_label_rouge==2){ ?>
												<span class="product-option"><img class="img-fluid" style="width: 50px;" src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Produits AVS"></span>	
												 
												 <?php  } ?>
												 
												 	<?php  if($product->product_origin==2){ ?>
												<span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/origine-france.png" alt="Produit Origine France"></span>	
												 
												  
												 <?php  } ?>
												 
												  	<?php  if($product->product_bio==2){ ?>
												<span class="product-option"><img class="img-fluid" src="<?php echo base_url().'template/';?>img/bio_3.png" alt="Produit Biologique"></span>	
												 
												 
												 <?php  } ?>
													 
												</div>
												</div>
												</div>
												<?php  } ?>
                                                </div>
                                                <div class="product-info col-xs-12 col-md-7 col-sm-7">
												 <h1 class="show_pc"><?php echo $product->product_name; ?></h1>
												<div id="deleviry">
												
												<span >Livré en 24/48h</span>
												</div>
                                                    <div class="detail-description">
                                                        
														
														<?php  if($product->product_is_promo==2){?>
														
														<div class="price-del ">
                                                         <div id="price_title"> <span class="price_title"> Prix </span> </div>
														   <div class="price-del priece_solde " style="padding: 0px!important;bottom: 5px!important;">
														  <span class="price product-price-old-show" style="color: #000 !important;">€ <?php echo (number_format($product->product_price_selling, 2, ',', ''))?> <?php  if($product->show_poids) { ?><span></span> <?php  } ?></span>
                                                         
														</div>
														   <div> <span class="price">€ <?php echo (number_format($product->product_price_dicount, 2, ',', ''))?>  <?php  if($product->show_poids) { ?><span>(<?php echo $product->product_poids;?> kg)</span> <?php  } ?></span> </div>
                                                           <?php  if($product->product_stock==2 or  $product->product_stock==3){?>
															<span class="float-right" style="display:none;">
                                                                <span class="availb">Disponibilité: </span>
                                                                
                                                                      <?php  if($product->product_stock==2){ echo'<span class="check" style="color:red"> Non stock </span>';} ?>
																		<?php  if($product->product_stock==3){ echo'<span class="check" style="color:#ffc107"> Rupture de stock </span>';} ?>
																	
                                                            </span>
															<?php  } ?>
															 <?php if($product->product_info){  ?>
														  <p style="display: block;font-size: 12px;color: #a71d1a;text-align: right;" >
                                                           <?php echo  $product->product_info;?></p>
														  <?php  }  ?>
                                                        </div>
														<?php  } else { ?>
															
														
														<div class="price-del ">
                                                          <div id="price_title"> <span class="price_title"> Prix </span> </div>
														    <div> <p><span class="price">€ <?php echo (number_format($product->product_price_selling, 2, ',', ''))?>  <?php  if($product->show_poids) { ?><span>(<?php echo $product->product_poids;?> kg)</span> <?php  } ?></span></p>  </div>
                                                           <?php  if($product->product_stock==2 or  $product->product_stock==3){?>
															<span class="float-right" style="display:none;">
                                                                <span class="availb">Disponibilité: </span>
                                                                
                                                                      <?php  if($product->product_stock==2){ echo'<span class="check" style="color:red"> Non stock </span>';} ?>
																		<?php  if($product->product_stock==3){ echo'<span class="check" style="color:#ffc107"> Rupture de stock </span>';} ?>
																	
                                                            </span>
															<?php  } ?>
															 <?php if($product->product_info){  ?>
														  <p style="display: block;font-size: 12px;color: #a71d1a;text-align: right;" >
                                                           <?php echo  $product->product_info;?></p>
														  <?php  }  ?>
                                                        </div>
														<?php  } ?>
															
															
														
												
								<?php  if($product->product_stock!=2){ ?>
                                                        <div class="has-border cart-area  block-quantity">
                                                            <div class="product-quantity">
                                                                <div class="qty">
                                                                    <div class="input-group">
                                                                        <div class="quantity">
                                                                            <span class="control-label">Quantité : </span>
                                                                            <input type="text" name="qty" id="quantity_wanted" value="1" class="input-group form-control qty">
                                                                        </div>
                                                                        <span class="add">
                                                                            <button style="background: #fff  !important;border: none;"class="btn btn-primary add-to-cart add-item  add-cart" data-id=<?php echo $product->product_id;?>  >
                                                                              <img   class="img-fluid brand" src="<?php echo base_url().'template/';?>img/panier.png" alt="Ajouter au panier" > 
                                                                            
                                                                            </button>
                                                                           
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <p class="product-minimal-quantity">
                                                            </p>
                                                        </div>
															<?php   } ?>
                                                      
                                                    </div>
													<?php if($product->product_short_text) { ?>
													<div id="product_short_text">
												<?php  echo $product->product_short_text; ?>
												
												</div>
													<?php  } ?>
                                              
                                                </div>
										
                                            </div>
										
											  <?php if($product_releted) { ?>
				
                                            <div class="related product_related" style="display:none;">
                                                <div class="title-tab-content  text-center">
                                                    <div class="title-product justify-content-start">
                                                        <h2>Articles de même famille</h2>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="row">
                                                      
                                                       				  <?php foreach($product_releted as $products) :
			  
				
																			$image =$this->M_products_pictures->get_one_product_picture($products->product_id);
																			$path ="";
																			 if($image and $image->product_pictures){
																          $path =base_url().'admines/medias/products/'.$image->product_pictures;
														                    }
														                if($path){
																	?>
						
			                                                <div class="item text-center col-md-4 col-xs-12">
													
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
                                                                                    <span class="price">  € <?php echo (number_format($products->product_price_selling*(1-$taxe), 2, ',', ''))?> HT<span><?php  if($products->show_poids) { ?>(<?php echo $products->product_poids;?> kg)</span><?php  } ?></span>
                                                                              
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                     
                                                                    </div>
																	<div id="shopping-cart">
																	<button type="button" class="btn btn-default add-to-cart add-cart " data-qty=1  data-id=<?php  echo $products->product_id;?>><span> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span> Ajouter au panier</span> </button>
                                                                </div>
																</div>
                                                            </div>
															 <?php } endforeach; ?>
															
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    
											  <?php  } ?>
									
									</div>
                                </div>
                    

						   </div>
                        </div>
                    </div>
                
            
