
                    <div class="page-home detail_product couffin_product" style="    background-position: 32% -13%;background-image: url(<?php echo base_url().'template/';?>img/background-couffat.png);text-align: center;background-repeat: no-repeat;">
                      <!-- breadcrumb -->
                  
   		<!--<?php if($banniers){  ?>
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
						<?php } ?>-->
						   <nav class="breadcrumb-bg">
                            <div class="container no-index">
                                <div class="breadcrumb">
                                    <ol>
                                        <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
										 <li class="breadcrumb-home">
                                            <a href="<?php echo base_url().'couffin';?>">
                                                <span>Couffin</span>
                                            </a>
                                        </li>
										<li  class="breadcrumb-title">
                                            <a href="#">
                                                <span> <?php echo $categorieInfo->categorie_couffin_name;?></span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </nav>
                        <div class="container">
                            <div class="content" style="margin-top: 2rem;">
							<div class="row info" align="center">
							<h1> Nos packs <b><?php echo $categorieInfo->categorie_couffin_name;?> !</b></h1>
							<p><?php echo $categorieInfo->categorie_couffin_content;?></p>
							
							</div>
                                <div class="row">
                                   <div class="col-sm-12 col-lg-12 col-md-12 product-container categories">
                                   
									 
									 
	                          <?php if($products_list){  ?>
                                        <div class="js-product-list-top firt nav-top" style="display:none;">
                                            <div class="d-flex justify-content-around row">
                                                <div class="col col-xs-12">
                                                    <ul class="nav nav-tabs" style="display:none;">
                                                        <li>
                                                            <a href="#grid" data-mode="grid" data-toggle="tab" class=" showMode  <?php  if($modeshow=='grid') {  echo 'active show' ; } ?>  fa fa-th-large"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#list" data-mode="list" data-toggle="tab" class=" showMode <?php  if($modeshow=='list') {  echo 'in active show' ; } ?> fa fa-list-ul"></a>
                                                        </li>
                                                    </ul>
                                                   <!-- <div class="hidden-sm-down total-products">
                                                        <p><?php echo $total_rows;?> articles.</p>
                                                    </div>-->
                                                </div>
                                                <div class="col col-xs-12" >
                                                    <div class="d-flex sort-by-row justify-content-lg-end justify-content-md-end">

                                                        <div class="products-sort-order dropdown">
                                                            <select class="select-title orderBy" style="text-transform: none;">
                                                                <option value="">Trier par</option>
                                                                <option value="1" <?php  if($orderBy==1) {  echo 'selected' ; } ?>>De, A à Z</option>
                                                                <option value="2" <?php  if($orderBy==2) {  echo 'selected' ; } ?>>De, Z à A</option>
                                                                <option value="3" <?php  if($orderBy==3) {  echo 'selected' ; } ?>>Prix croissant</option>
                                                                <option value="4" <?php  if($orderBy==4) {  echo 'selected' ; } ?>>Prix décroissant</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
															
                                        <div class="tab-content product-items"> 
                                            <div id="grid"  class="related tab-pane grid  <?php  if($modeshow=='grid') {  echo 'in active show' ; } ?>">
                                                <div class="row">

														<?php $i=1; foreach($products_list as $products) :

                                                     
                                                        

														?>
														<div class=" text-center  items_product mobile_items_product">
                                                        <div class="product-miniature js-product-miniature item-one first-item  categorie-info">
														<a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>" class="mpquickview-button" title="<?php echo $products->product_name;?>">
                                                                  <span >Ajouter au panier</span> </a>
														
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
                                                            <div class="thumbnail-container <?php if ($i % 3 != 0) { echo 'border_right'; }?>">
                                                                <a href="<?php echo base_url().'products/show/'.$products->product_id.'-'.strtolower(url_title($products->product_name));?>" title="<?php echo $products->product_name;?>">
                                                                    <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/products/'.$products->product_picture; ?>" alt="<?php echo $products->product_name;?>">
                                                                </a>
                                                               
                                                            </div>
                                                            <div class="product-description">
                                                                <div class="product-groups product-groups-price">
                                                                
                                                                 
																		<?php  if($products->product_is_promo==2){?>
																	  <div class="product-group-price">
																	
																		  <span class="price price_couffin" style="color: #d64652!important;">  <?php echo (number_format($products->product_price_dicount, 2, ',', ''))?>  €</span>
                                                                                  <span class="price solde" style="color: #ddd!important;font-size: 12px!important;">  <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  € </span>
                                                                      
                                                                    </div>
																	
																	<?php } else { ?>
																	
																	 <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price price_couffin" style="color: #d64652!important;">   <?php echo (number_format($products->product_price_selling, 2, ',', ''))?>  €</span>
                                                                               
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
																			 </div>
									
													
                                                        </div>
                                                    </div>
                                                <?php  $i++; endforeach; ?>
												</div>
                                            </div>
                                        </div>
                                        <?php } else {  ?>
										<div style="width: 100%;" class="message_panier">
							<p class="text-center ">Bientôt des nouveaux articles.</p>
							</div>
										<?php  } ?>
                                        <!-- pagination -->
                                        <div class="pagination" style="display:none;">
                                            <div class="js-product-list-top ">
                                                <div class="d-flex justify-content-around row">
                                                    <div class="showing col col-xs-12">
                                                        <span></span>
                                                    </div>
                                                    <div class="page-list col col-xs-12">
                                                       
														 <?=$pagination;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end col-md-9-1 -->
                                </div>
                            </div>
                        </div>
                    </div>
            
           
           