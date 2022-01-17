	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <input id="lastID" class="lastID" name="lastID" type="hidden" value="">
	<?php 	$count = $this->M_products->count_all($subCategories->parent_id,$subCategories->categorie_id,$this->session->userdata('certif'),$this->session->userdata('sub_cat_bio'),$this->session->userdata('sub_cat_label_rouge'));
			//var_dump($count);exit; ?>												
					
					<div class="page-home">
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
										<?php if($categorie){  ?>
	                                    <li class="breadcrumb-home">
                                            <a href="#">
                                                <span> <span><?php echo $categorie->categorie_name;?></span></span>
                                            </a>
                                        </li>
	                                      <?php } else if($subCategorie) { ?>
										  <li class="breadcrumb-home">
                                            <a href="<?php echo base_url().'products/categorie/'.$categorieParent->categorie_id.'-'.strtolower(url_title($categorieParent->categorie_name));?>">
                                                <span><?php echo $categorieParent->categorie_name;?></span>
                                            </a>
                                        </li>
										<li class="breadcrumb-title">
                                            <a href="#">
                                                <span><?php echo $subCategorie->categorie_name;?></span>
                                            </a>
                                        </li>
										   <?php } else { ?>
										   <li>
                                            <a href="#">
                                                <span>Nos articles</span>
                                            </a>
                                        </li>
										    <?php } ?>
                                        
                                      
                                    </ol>
                                </div>
                            </div>
                        </nav>
						
						<?php if($banniers){  ?>
                             <div class="section spacing-10 group-image-special block-boucherie" >
                            <div class="">
                                <div class="col-lg-12 col-md-12 categories" >
                                    <div class="effect">
									 
                                      
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/banners/'.$banniers->banner_picture;?>" alt="<?php echo strip_tags($banniers->banner_title) ?>" title="<?php echo strip_tags($banniers->banner_title); ?>">
											<h1> <?php echo $banniers->banner_title; ?> </h1>
    

                                        
										                                     </div>
                                </div>
                             
                            </div>
                        </div>
						<?php } ?>
                        <div class="container">
						
                            <div class="content" style="margin-top: 2rem;">
                                <div class="row">
                                    <div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">
	 <div class="sidebar-block">
                                            <div class="title-block">Catégories
											<hr/>
											</div>
                                           <div class="block-content">
									              
	                                           
												  <?php foreach($categories_list as $categorie) :?>
			  
			
						
												  <div class="cateTitle hasSubCategory open level1" >
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)">
												   <input  <?php  if(  $this->session->userdata('all_sub_categorie')  and in_array($categorie->categorie_id, $this->session->userdata('all_sub_categorie'))){  ?> checked <?php   } ?> type="checkbox" id="filtre" data-search="all" class="all_filtre_sub_categorie  sub_categorie_<?php echo $categorie->categorie_id;?>" name="categorie" value="<?php echo $categorie->categorie_id;?>">
												   
												   <?php  if(  $this->session->userdata('all_sub_categorie')  and in_array($categorie->categorie_id, $this->session->userdata('all_sub_categorie'))){  ?> 
                                                      <img   class="img-fluid checkIdCategorie brand" src="<?php echo base_url().'template/';?>img/<?php echo $categorie->categorie_id;?>-actives.jpg" alt="<?php echo $categorie->categorie_name;?>" data-id='<?php echo $categorie->categorie_id;?>' >
												   
												   <?php   }  else { ?>
                                                     <img   class="img-fluid checkIdCategorie brand" src="<?php echo base_url().'template/';?>img/dps-<?php echo $categorie->categorie_id;?>.jpg" alt="<?php echo $categorie->categorie_name;?>"  data-id='<?php echo $categorie->categorie_id;?>'>
												   

												   <?php   }   ?>
												  
												   <span class="checkIdCategorie" data-id='<?php echo $categorie->categorie_id;?>' ><?php echo $categorie->categorie_name;?></span></a>
                                    
                                                </div>
											
												  <?php endforeach; ?>
												   <div class="cateTitle hasSubCategory open level1" >
												  <a class="cateItem" href="javascript:void(0)"> <input  type="checkbox" id="filtre" class="check_all_sub_catego_clear sub_categorie_0"   name="categorie" value="1">
												  <img class="img-fluid brand  checkIdCategorie" data-id='0' src="<?php echo base_url().'template/';?>img/dps-eyes.jpg" alt="Tout Voir" >
												  <span class="checkIdCategorie" data-id='0'>Tout Voir</span></a>
                                                 </div>
										   
									 </div>
                                         </div>
                                         <!-- Filtre -->
                                       <?php $this->load->view('views_menus/filtre-products.php');?>
                                        <!-- end Filtre -->
                                      
                                        <!-- product tag -->
                                    </div>
                                    <div class="col-sm-8 col-lg-9 col-md-8 product-container categories">
									  
                                       <!-- <?php $this->load->view('views_menus/menu_categories.php');?>-->
										
                                
                                        <div class="tab-content product-items"> 
                                            <div id="grid"  class="related tab-pane fade list in active show">
                                                <div class="row sub-categories">

														<?php $i=1; foreach($subCategories_lists as $subCategories) :
														
													        
															$product_price_min = $this->M_products->get_product_price_min($subCategories->categorie_id,$this->session->userdata('sub_cat_bio'),$this->session->userdata('sub_cat_label_rouge'),$this->session->userdata('certif'),false);
															$partner = $this->M_partners->get_this($product_price_min->product_affected_partener);
															$count_product = $this->M_products->get_product_price_min($subCategories->categorie_id,$this->session->userdata('sub_cat_bio'),$this->session->userdata('sub_cat_label_rouge'),$this->session->userdata('certif'),true);
															
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
															  <span >Aperçu</span> </a>
															    <?php    } else {?>
															
															  	<a href="#mpquickview" class="mpquickview-button mpquickview"  data-id="<?php echo $product_price_min->product_id;?>" title="<?php echo $product_price_min->product_name;?>">
                                                                  <span >Aperçu</span> </a>
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
																	<span id=""  class=" "><span class="price product-price-old"> € <?php echo (number_format($product_price_min->product_price_selling, 2, ',', ''))?>  </span></span>
                                                               
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price product-price-promo "> € <?php echo (number_format($product_price_min->product_price_dicount, 2, ',', ''))?> </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
															<?php } else {  ?>
															   <div class="product-description">
                                                                <div class="product-groups">
                                                                  <span class="product-weight"> <?php  if($product_price_min->show_poids) { ?><?php echo $product_price_min->product_poids;?> kg<?php  } ?></span>
                                                              
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price"> € <?php echo (number_format($product_price_min->product_price_selling, 2, ',', ''))?> </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
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
																		   <?php if( $this->session->userdata('sub_cat_bio')  or $this->session->userdata('sub_cat_label_rouge') or $this->session->userdata('certif') or $this->session->userdata('all_sub_categorie')) { ?>
													                           <?php  if($count_product > 1){ ?>
																			 <p>  <?php echo $count_product; ?> produit(s) trouvés</p>
                                                                                <?php } ?>																			 
																		   <?php } ?>
															</div>
														
                                                        </div>
                                                    </div>
													
													<?php }  ?>
													<?php $i++; ?>
												
													 
                                                <?php endforeach; ?>
								
												
												</div>
                                            </div>
                                        </div>
	                                        <div class="loader loader_blcok " style="display:none">
									<img src="<?php echo base_url().'template/';?>img/loading.gif"> <span>En cours de chargement...</span>
									</div>
                                        <!-- pagination -->
                                        <div class="pagination" style="display:none" >
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
       
          <script type="text/javascript">
    var page = 0;
        var total_pages =<?=$num_page;?>;
      var per_page =<?=$per_page;?>;
     
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()- 300) {
                page++;
                if(page < total_pages) {
                    loadMore(page,per_page);
                }
            }
        });
    
        function loadMore(page,per_page){
			var page=page*per_page;
          $.ajax(
                {
                     url: '<?php echo base_url(); ?>categories/index/'+page,
                    type: "GET",
					data: {page:page},
                    beforeSend: function()
                    {
                        $('.loader').show();
                    }
                })
                .done(function(data)
                {               
                    $('.loader').hide();
                    $(".sub-categories").append(data);
                });
        }
    </script>
