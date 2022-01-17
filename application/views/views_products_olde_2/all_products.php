 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 
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
									 
                                      
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/banners/'.$banniers->banner_picture;?>" alt="<?php echo strip_tags($banniers->banner_title); ?>" title="<?php echo strip_tags($banniers->banner_title); ?>">
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
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)"><input  <?php  if(  $this->session->userdata('all_product_categorie')  and in_array($categorie->categorie_id, $this->session->userdata('all_product_categorie'))){  ?> checked <?php   } ?> type="checkbox" id="filtre" data-search="all" class="all_filtre_categorie sub_categorie_<?php echo $categorie->categorie_id;?>" name="categorie" value="<?php echo $categorie->categorie_id;?>">
												   
												   <?php  if(  $this->session->userdata('all_product_categorie')  and in_array($categorie->categorie_id, $this->session->userdata('all_product_categorie'))){  ?> 
                                                      <img   class="img-fluid brand checkIdCategorie" data-id='<?php echo $categorie->categorie_id;?>'  src="<?php echo base_url().'template/';?>img/<?php echo $categorie->categorie_id;?>-actives.jpg" alt="<?php echo $categorie->categorie_name;?>" >
												   
												   <?php   }  else { ?>
                                                     <img   class="img-fluid brand checkIdCategorie" data-id='<?php echo $categorie->categorie_id;?>' src="<?php echo base_url().'template/';?>img/dps-<?php echo $categorie->categorie_id;?>.jpg" alt="<?php echo $categorie->categorie_name;?>" >
												   

												   <?php   }   ?>
												  
												   <span class="checkIdCategorie" data-id='<?php echo $categorie->categorie_id;?>'><?php echo $categorie->categorie_name;?></span></a>
                                    
                                                </div>
											
												  <?php endforeach; ?>
												   <div class="cateTitle hasSubCategory open level1" >
												  <a class="cateItem" href="javascript:void(0)"> <input  type="checkbox" id="filtre" class="check_all_product_clear sub_categorie_0"   name="categorie" value="1">
												   <img class="img-fluid brand checkIdCategorie" data-id='0' src="<?php echo base_url().'template/';?>img/dps-eyes.jpg" alt="Tout Voir" >
												  <span class="checkIdCategorie" data-id='0'>Tout Voir</span></a>
                                                 </div>
										   
									 </div>
                                         </div>
                                        <!-- Filtre -->
                                 
									    <?php $this->load->view('views_menus/all_filtre-products.php');?>
                                        <!-- end Filtre -->
                                       
                                   
                                    </div>
                                    <div class="col-sm-8 col-lg-9 col-md-8 product-container categories">
                                     <?php if($title){ ?>
									 <h1> Articles <span>  <?php echo $title;?></span> </h1>
									 <?php } ?>
									 
									  <!--  <?php $this->load->view('views_menus/menu_categories.php',$categorieInfo);?>-->
									
	                          <?php if($products_list){  ?>
                                        <div class="js-product-list-top firt nav-top">
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
                                                   <!-- <div class="hidden-sm-down total-products ">
                                                        <p><?php echo $total_rows;?> articles.</p>
                                                    </div>-->
                                                </div>
                                                <div class="col col-xs-12">
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
                                            <div id="grid"  class="related tab-pane fade <?php  if($modeshow=='grid') {  echo 'in active show' ; } ?>">
                                                <div class="row list_product_load">

														<?php $i=1; foreach($products_list as $products) :

                                                       $partner = $this->M_partners->get_this($products->product_affected_partener);
														$path ="";
														if($products->product_picture){
														$path =base_url().'admines/medias/products/'.$products->product_picture;
														}
                                                        if($path){

														?>
														<div class=" text-center  items_product mobile_items_product">
                                                        <div class="product-miniature js-product-miniature item-one first-item  categorie-info">
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
                                                                    <img class="img-fluid image-cover" src="<?php echo $path; ?>" alt="<?php echo $products->product_name;?>">
                                                                </a>
                                                               
                                                            </div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                <span class="product-weight"> <?php  if($products->show_poids) { ?><?php echo $products->product_poids;?> kg<?php  } ?></span>
                                                              
                                                                   
																	
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
																				        				<?php  if($partner){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'admines/medias/certificats/'.$partner->certificat_picture;; ?>"  alt="<?php echo $partner->certificat_name; ?>"></span><?php  } ?>	
                                                                          
																						<?php  if($products->product_label_rouge==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Produit Label Rouge"></span><?php  } ?>	
																						<?php  if($products->product_origin==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/origine-france.png" alt="Produit Origine France"></span><?php  } ?>	
																						<?php  if($products->product_bio==2){ ?><span class="product-option"><img class="img-fluid"  src="<?php echo base_url().'template/';?>img/bio_3.png" alt="Produit Biologique"></span><?php  } ?>	
																		 </div>
									
													
                                                        </div>
                                                    </div>
													 <?php if($i==count($products_list)){?>

														
													<script type="text/javascript">
													 $('.lastID').val(<?php  echo $products->product_id;?>);
													 </script>
													 <?php } ?>
													 <?php $i++; ?>
                                                <?php } endforeach; ?>
												</div>
                                            </div>
                               
                                        </div>
                                        <?php } else {  ?>
										<div style="width: 100%;" class="message_panier">
							<p class="text-center ">Bientôt des nouveaux articles.</p>
							</div>
										<?php  } ?>
										
									<div class="loader loader_blcok " style="display:none">
									<img src="<?php echo base_url().'template/';?>img/loading.gif"> <span>En cours de chargement...</span>
									</div>
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
                    url: '<?php echo base_url(); ?>products/index/'+page,
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
                    $(".list_product_load").append(data);
                });
        }
    </script>
