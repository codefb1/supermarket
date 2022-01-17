
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
						    <nav class="breadcrumb-bg" style="display: block!important;background-color: #fff;">
                            <div class="container no-index">
                                <div class="breadcrumb">
                                    <ol>
                                        <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
										
										<li  class="breadcrumb-title">
                                            <a href="#">
                                                <span>Couffin </span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </nav>
                        <div class="container" >
                            <div class="content" style="margin-top: 2rem;">
							
							<div class="row info" align="center">
							<h1> Nos packs <b>Couffin !</b></h1>
							<p>Un simple clic suffit pour choisir le couffin magique contenant des articles frais et fabuleux,sélectionnés avec un grand soin!</p>
							
							</div>
                                <div class="row" >
                                   <div class="col-sm-12 col-lg-12 col-md-12 product-container categories">
                                   
									 
									
	                          <?php if($categories_lists){  ?>
                                   
															
                                        <div class="tab-content product-items"> 
                                            <div id="grid"  class="">
                                                <div class="row">

														<?php $i=1; foreach($categories_lists as $categories) :?>
														<div class=" text-center  items_product mobile_items_product">
                                                        <div class="product-miniature js-product-miniature item-one first-item  categorie-info">
														<a href="<?php echo base_url().'couffin/products/'.$categories->categorie_couffin_id.'-'.strtolower(url_title($categories->categorie_couffin_name));?>" class="mpquickview-button" title="<?php echo $categories->categorie_couffin_name;?>">
                                                                  <span >Ajouter au panier</span> </a>
														
							
                                                            <div class="thumbnail-container <?php if ($i % 3 != 0) { echo 'border_right'; }?> " >
                                                                <a href="<?php echo base_url().'couffin/products/'.$categories->categorie_couffin_id.'-'.strtolower(url_title($categories->categorie_couffin_name));?>" title="<?php echo $categories->categorie_couffin_name;?>">
                                                                    <img class="img-fluid image-cover" src="<?php echo base_url().'admines/medias/couffin/'.$categories->categorie_couffin_picture; ?>" alt="<?php echo $categories->categorie_couffin_name;?>">
                                                                </a>
                                                               
                                                            </div>
                                                       
															  <div class="product-title" >
															 <div class="col-sm-12 col-lg-12 col-md-12 product-name" >
   
   
    
																	    <a href="<?php echo base_url().'couffin/products/'.$categories->categorie_couffin_id.'-'.strtolower(url_title($categories->categorie_couffin_name));?>"><?php echo $categories->categorie_couffin_name;?></a>
                                                                   
																	 </div></div>
														
									
													
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
            
           
           