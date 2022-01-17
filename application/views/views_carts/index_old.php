     <div id="wrapper-site">
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
                                <a href="#"class="breadcrumb-title" >
                                    <span>Panier</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
			    <div class="section spacing-10 group-image-special block-boucherie" >
                            <div class="">
                                <div class="col-lg-12 col-md-12 categories" >
                                    <div class="effect">
									 
                                       
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/banners/'.$setting->boucherie_bannier;?>" alt="La" title="Boucherie">
											<h1>  <span>  Panier</span> </h1>
    

                                        
										                                     </div>
                                </div>
                             
                            </div>
                        </div>
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <section id="main"> 
						<?php if($this->cart->contents()){  ?>
						<div class="check-cart hidden_panier">
						<div class="row">
  <div class="col-md-9 col-xs-12">
  <h1 class="title-page">Panier <span class="cart_flow"> Livraison </span>  <span class="cart_flow">Paiement</span></h1>
    </div>
	<div class="col-md-3 col-xs-12">
	        <div id='block-checkout'>
											<a href="<?php echo base_url().'checkout';?> " class=" btn btn-primary pull-xs-right action_checkout">
                                        Finaliser ma commande
                                    </a> </div>
    </div>
	 </div>
					  
                
                          </div> 
                            <div class="cart-grid row hidden_panier">
						       
							
								    <div class="cart-grid-right col-xs-12 col-lg-3  show_mobile position_mobile ">
                                    <div class="cart-summary carts-summary">
                                        <div class="cart-detailed-totals">
                                            <div class="cart-summary-products">
                                                <div class="summary-label">Il y <span class="cart-products-panier-count"> <?php echo count($this->cart->contents()) ;?> </span>  commande dans votre panier </div>
                                            </div>
											<h2>Récapitulatif</h2>
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    Total panier HT :
                                                </span>
                                                <span class="value total_panier_cart_ht ">€ <?php echo  number_format($totalCart*(1-$taxe), 2, ',', '') ;?> HT</span>
                                          <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div>
										   </div>
                                         <div class="cart-summary-line cart-total">
                                                <span class="label">TVA :</span>
                                                <span class="value total_tva_cart">€ <?php echo  number_format($totalCart-(1-$taxe*$totalCart), 2, ',', '') ;?></span>
                                            </div>
                                            <div class="cart-summary-line cart-total carts-totals">
                                                <span class="label">Total TTC :</span>
                                                <span class="value total_panier_cart">€ <?php echo  number_format($totalCart, 2, ',', '') ;?></span>
                                            </div>
											
                                        </div>
                                    </div>
							 <div style="text-align: center;">
                                   <span><img src="<?php echo base_url();?>template/img/home/cb.jpg" style="" class="carte" alt="CB">

														<img src="<?php echo base_url();?>template/img/home/mc.jpg" class="carte" alt="MasterCard">
														<img src="<?php echo base_url();?>template/img/home/visa.jpg" class="carte" alt="VISA">
                                                           </span> </div>
                                </div>
                                <div class="col-md-9 col-xs-12 check-info check-cart">
                                    <div class="cart-container">
                                        <div class="cart-overview js-cart">
                                            
											 <div id="block-history" class="block-center showporches">
                                        <table class="std table table_cart">
                                            <thead>
                                                <tr style="background: #f7f8f9!important;">
                                                    <th class="first_item" style="padding-left: 5%;" >Vos produits</th>
													<th class=""style="width: 20%;">Quantité</th>
                                                      <th class="item mywishlist_first"style="width: 20%;">Prix TTC Unitaire  </th>
													<th class="item mywishlist_first"style="width: 20%;">Prix Total TTC </th>
                                                    
													<th class="item mywishlist_second"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="table_list_carts">
											<?php $totalCart=0; foreach ($this->cart->contents() as $items):
											
											
											if($items['options']['product']->product_is_composer==2){
											$path =base_url().'admines/medias/products/'.$items['options']['product']->product_picture;
											}else {
											$image =$this->M_products_pictures->get_one_product_picture($items['id']);
											$path ="";
											if($image){
											$path =base_url().'admines/medias/products/'.$image->product_pictures;
											}
											}
											$totalCart=$totalCart+($items['price']*$items['qty']);
											?>
											<tr id="wishlist_1" class="rowid_<?php echo  $items['rowid'];?>">
                                                   <td class="">
												   <div class="row">
													<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
														<?php if($items['options']['product']->product_entier_association){  ?>
																	<a href="#"><img  class="img-fluid" src="<?php echo $path ;?>" alt="<?php echo  $items['options']['product']->product_name;?>"></a>
													      
													<?php  } else {  ?>
																		<a href="<?php echo base_url().'products/show/'.$items['options']['product']->product_id.'-'.strtolower(url_title($items['options']['product']->product_name));?>"><img  class="img-fluid" src="<?php echo $path ;?>" alt="<?php echo  $items['options']['product']->product_name;?>"></a>
												      
													<?php  }  ?>
														</div>
														<div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
														<?php if($items['options']['product']->product_entier_association){  ?>
														 <a class="label cart_product_name" href="#" data-id_customization="0"><?php echo  $items['name'];?></a>
                                                         
													<?php  } else {  ?>
													<a class="label cart_product_name" href="<?php echo base_url().'products/show/'.$items['options']['product']->product_id.'-'.strtolower(url_title($items['options']['product']->product_name));?>" data-id_customization="0"><?php echo  $items['options']['product']->product_name;?></a>
                                                         
													<?php  }  ?>
														</div>
														</div>
                                                    </td>
													<td class="">
												       		    <div class="quantity">
                                                                        <input  id="qty"
																			   type="text"
																			   value=<?php echo  $items['qty'];?>
																			   name="qtyUp"
																			   data-bts-min="1"data-bts-max="100"
																			   
																			   data-bts-prefix-extra-class="<?php echo  $items['rowid'];?>"
																			   data-bts-postfix-extra-class=""
																			   data-bts-booster="true"
																			   data-bts-boostat="10"
																			   data-bts-max-boosted-step="false"
																			   data-bts-mousewheel="true"
																			   data-bts-button-down-class="btn btn-secondary"
																			   data-bts-button-up-class="btn btn-secondary"
																				/>

                                                                    </div>	 
                                                    </td>
													<td class="">
													<?php if($items['options']['product']->product_is_promo==2){  ?>
													<div  class="cart_old_price">€ <?php   echo number_format($items['options']['product']->product_price_selling, 2, ',', ''); ?></div>
													<?php  }  ?>
													<span class="value">€ <?php if ($items['price']>0){  echo number_format($items['price'], 2, ',', '');} else {echo "N.D";}?>       
																<?php  if($items['options']['product']->show_poids) { ?>  <span class="">(<?php echo $items['options']['product']->product_poids;?> kg)</span><?php  } ?>
                                                         </span>
                                                    </td>
													<td>
													
											     <span class="value product_price_total_<?php echo  $items['rowid'];?>" >€ <?php if ($items['price']>0){  echo number_format($items['price']*$items['qty'], 2, ',', '');} else {echo "N.D";}?>       
														 </span>
                                                   
											    </td>
												<td>
											   
                                                     <a class="remove-from-cart" onclick="remove_item('<?php echo $items['rowid'];?>');" rel="nofollow" href="#" data-link-action="delete-from-cart" data-id-product="1">
                                                                            <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                                                        </a>
											    </td>
											   </tr>
											   <?php endforeach; ?>
											 </tbody>
                                        </table>
												<table class="std table table_search">
                                            <tbody>
											     
                                                <tr>
                                                    <td style="width: 100%;" > 
													 <i class="fa fa-search search_product" aria-hidden="true"></i><input type="text" id="myAutocomplete" placeholder="Ajouter un article par nom" class="form-control"/>
													 <div id="output"></div>
													 </td>
													
													
											
												 </tr>
                                            </tbody>
											</table>
											
													<table class="std table table_total show_pc">
                                            <tbody>
											     
                                                <tr>
                                                    <td style="width: 50%;" > 
													<div class="panier_ht">
                                               <b>  <span class="label js-subtotal">
                                                   Total panier TTC :
                                                </span>
                                          <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div></b>
										   </div></td>
													
													 <td style="width: 25%;" > 
													<div class="price_totals">
                                               <b>  
                                                <span class="value total_panier_cart">€ <?php echo  number_format($totalCart, 2, ',', '') ;?></span> </div>
                                          <div > </div></td>
													<td  style="width: 25%;">
		                          <div id='block-checkout'>
											<a href="<?php echo base_url().'checkout';?> " class=" btn btn-primary pull-xs-right action_checkout">
                                        Finaliser ma commande
                                    </a> </div></td>
												 </tr>
                                            </tbody>
											</table>
											
											
											
											
												<table class="std table table_total show_mobile">
                                             <thead>
											     
                                                <tr>
                                                    <td style="width: 78%;    text-align: center;" > 
													<div class="panier_ht">
                                               <b>  <span class="label js-subtotal">
                                                   Total panier HT :
                                                </span>
                                          <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div></b>
										   </div>
										   <div class="price_totals">
                                               <b>  
                                                <span class="value total_panier_cart">€ <?php echo  number_format((1-$taxe)*$totalCart, 2, ',', '') ;?></span> </div>
										     <div id='block-checkout'>
											<a href="<?php echo base_url().'checkout';?> " class=" btn btn-primary pull-xs-right action_checkout">
                                        Finaliser ma commande
                                    </a> </div>
										   </td>
													
												
										
												 </tr>
                                             </thead>
											</table>
											
											
											 </div>
											
										
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="cart-grid-right col-xs-12 col-lg-3  show_pc ">
                                    <div class="cart-summary carts-summary">
                                        <div class="cart-detailed-totals">
                                            <div class="cart-summary-products">
                                                <div class="summary-label">Il y <span class="cart-products-panier-count"> <?php echo count($this->cart->contents()) ;?> </span>  commande dans votre panier </div>
                                            </div>
											<h2>Récapitulatif</h2>
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    Total panier HT :
                                                </span>
                                                <span class="value total_panier_cart_ht ">€ <?php echo  number_format($totalCart*(1-$taxe), 2, ',', '') ;?> HT</span>
                                          <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div>
										   </div>
                                         <div class="cart-summary-line cart-total">
                                                <span class="label">TVA :</span>
                                                <span class="value total_tva_cart">€ <?php echo  number_format($totalCart-(1-$taxe)*$totalCart, 2, ',', '') ;?></span>
                                            </div>
                                            <div class="cart-summary-line cart-total carts-totals">
                                                <span class="label">Total TTC :</span>
                                                <span class="value total_panier_cart">€ <?php echo  number_format($totalCart, 2, ',', '') ;?></span>
                                            </div>
											 <div style="text-align: center;">
                                   <span><img src="<?php echo base_url();?>template/img/home/cb.jpg" style="" class="carte" alt="CB">

														<img src="<?php echo base_url();?>template/img/home/mc.jpg" class="carte" alt="MasterCard">
														<img src="<?php echo base_url();?>template/img/home/visa.jpg" class="carte" alt="VISA">
                                                           </span> </div>
                                        </div>
                                    </div>
								
                                   
                                </div>
							
                            	</div>
							<?php  } else {  ?>
							<div style="width: 100%;">
							<p class="text-center">Aucun article dans votre panier.</p>
							</div>
							<?php }  ?>
							<div style="width: 100%; display:none;" class="message_panier">
							<p class="text-center ">Aucun article dans votre panier.</p>
							</div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    
  <!-- Dependencies -->
    <script src="<?php echo base_url().'template/';?>search/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url().'template/';?>search/popper.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url().'template/';?>search/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 Autocomplete -->
    <script src="<?php echo base_url().'template/';?>search/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>
     
    <script>
  var src = {
				<?php foreach($products as $product) :?>
            "<?php echo $product->product_name;?>": <?php echo $product->product_id;?>,
			<?php endforeach; ?>
         
        }

        function onSelectItem(item, element) {
			add_item_to_cart(item.value,1);
           $('#myAutocomplete').val("");
		   $('.modal-footer').css("display","none");
		   setTimeout(function(){location.reload(true); }, 2000);
		   
        }

        $('#myAutocomplete').autocomplete({
            source: src,
            onSelectItem: onSelectItem,
            highlightClass: 'text-danger'
        });

    </script>