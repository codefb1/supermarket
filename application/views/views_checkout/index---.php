         <div id="checkout" class="main-content">
	 <div id="wrapper-site">
            <!-- breadcrumb -->
            <nav class="breadcrumb-bg"  style="display:block!important;">
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
                                    <span>commander</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <section id="main"> 
					
                            <div class="cart-grid row ">
						       
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  message">
				<?php  foreach ($messages  as  $messsage):?>
				<p style="color:red;"><?php echo $messsage; ?></p>
				<?php endforeach; ?>
					 </div>
                                <div class="col-md-12 col-xs-12 check-info check-cart">
                           
                                   					<!-- MultiStep Form -->
<div class="row">
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-9 col-sm-9 col-md-9 col-lg-9 text-center ">
            <div class="card ">
              
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <div id="msform">
                            <!-- progressbar -->
								<div class=" check-cart">
						  <h1 class="title-page" style="text-align: center!important;"> <span> Bismallah ça prendre que 3mn</span></h1>
						  </div> 
                            <ul id="progressbar" class="progressbar_cart  progressbar_carts">
							
  
                                 <li  class="active" id="panier"><strong class="mun_progressbar_cart" ></strong> <strong>1-Panier</strong></li>
								
                               
								<li class="active" id="delivery"><strong class="mun_progressbar_cart" ></strong><strong>2-Livraison</strong></li>
                               <li id="payment" class="payments"><strong class="mun_progressbar_cart" ></strong><strong>3-Paiement</strong></li>
                             
							   <li id="payment" class="active payments_actvie" style="display:none;"><strong class="mun_progressbar_cart"></strong><strong>3-Paiement</strong></li>
                              </ul> <!-- fieldsets -->
							<div class="row">  <h1 class="typo-title mt-2 title_step_2">Livraison</h1></div>
							<div class="row">  <h1 class="typo-title mt-2 title_step_3"style="display:none;" >RECAPITULATIF</h1></div>
                            
								<form  style="padding-left:100px;padding-right:100px;"action="<?php echo base_url().'orders/order_payement';?>" id="customer-form" class="js-customer-form" method="post">
                          <input  name="customer_delivery_firstname"  id="customer_delivery_firstname" type="hidden" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
						<input   id="customer_delivery_lastname"  name="customer_delivery_lastname" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
						<input class="form-control"  id="customer_delivery_country"  name="customer_delivery_country" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_country'); ?>">
						<input class="form-control"  id="customer_delivery_address"  name="customer_delivery_address" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_address'); ?>">
						<input class="form-control"  id="customer_delivery_zip"  name="customer_delivery_zip" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_zip'); ?>">
						<input class="form-control"  id="customer_delivery_city"  name="customer_delivery_city" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_city'); ?>">
						<input class="form-control"  id="customer_delivery_phone"  name="customer_delivery_phone" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_phone'); ?>">
						
                          
						     <input  name="customer_billing_firstname"  id="customer_billing_firstname" type="hidden" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
						
						<input   id="customer_billing_lastname"  name="customer_billing_lastname" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
						<input   id="customer_billing_country"  name="customer_billing_country" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_country'); ?>">
						<input   id="customer_billing_address"  name="customer_billing_address" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_address'); ?>">
						<input   id="customer_billing_zip"  name="customer_billing_zip" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_zip'); ?>">
						<input    id="customer_billing_city"  name="customer_billing_city" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_city'); ?>">
						<input    id="customer_billing_phone"  name="customer_billing_phone" type="hidden"  value="<?php echo $this->session->userdata('customer_delivery_phone'); ?>">
						

                            <fieldset class="fieldset_block_delivery">
							         <div class="row">
								  <h2 class="fs-title title_livraison">1.Votre adresse de livraison 
									<a class="btn btn-primary up-adress">Modifier</a></h2> 

									    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12  "> 
						  <div  class="onecol block-up-adress">

<div class="c_d_cu"><?php echo $this->session->userdata('customer_delivery_lastname').' '.$this->session->userdata('customer_delivery_firstname');?></div>
<div class="c_d_ad"><?php echo $this->session->userdata('customer_delivery_address');?></div>
<div class="c_d_ci"><?php echo $this->session->userdata('customer_delivery_city');?></div>
<div class="c_d_zip"><?php echo $this->session->userdata('customer_delivery_zip');?></div>
<div class="c_d_co">
<?php  if($this->session->userdata('customer_delivery_country')==1){ echo"France";} ?> 
<?php  if($this->session->userdata('customer_delivery_country')==3){ echo "Belgique";} ?>  
								
</div>
<div class="c_d_phone"><?php echo $this->session->userdata('customer_delivery_phone');?></div>

												       </div>
													
						  </div> </div>
							 <div class="cart-grid-right col-xs-12 col-lg-12">
								<?php $totalCart=0; foreach ($this->cart->contents() as $items):
											
											$totalCart=$totalCart+($items['price']*$items['qty']);
											?>
												<?php endforeach; ?>
								
								
                                  
								 </div>
                      
                                <div class="form-card">
                                  <h2 class="fs-title">2.Choix du mode de livraison</h2> 
                                    		 <div id="block-history" class="block-center list_delivery">
                                        <table class="std table table_livraison">
                                                 <tbody>
                                 
                                            <thead>
                                                <tr id="wishlist_1"  style="background: #f7f8f9!important;">
                                                    <th style="width: 30%;">
													Transporteur
                                                   </th>
                                                
                                                    <th style="width: 25%;">
													  Délai approximatif 
                                                    </th>
                                                    <th class="wishlist_default">
                                                      Prix HT
                                                    </th>
													 <th class="wishlist_default">
                                                        TVA
                                                    </th>
                                                  <th class="wishlist_default">
                                                       Prix TTC
                                                    </th>
                                                </tr>
                                            </thead>
                                            
								  <?php if($totalPoid >0){ foreach($transporters as $transport) :?>
                                                <tr id="wishlist_1" class="livreur" >
                                                    <td>
                                                        <a style="font-size: 13px;"href="javascript:;">
														
																	<img style="width: 80%;" alt="<?php echo $transport->transporter_name;?>"  src="<?php echo base_url().'admines/medias/transporters/'.$transport->transporter_picture; ?>" class="img-responsive">
						
														</a>
                                                    </td>
                                                
                                                    <td>
													 <span class="info_delevery">
                                  <?php echo $transport->transporter_short_text;?>
														   
                                                        </span>
                                                    </td>
                                                    <td class="wishlist_default">
                                                        <span class='htShopping'>
                                                           € <?php echo  number_format($totalshopingPrices*(1-$taxe), 2, ',', '') ;?>
                                                        </span>
                                                    </td>
													 <td class="wishlist_default">
                                                        <span class='tvaShopping'>
                                                           € <?php echo  number_format($totalshopingPrices - $totalshopingPrices*(1-$taxe), 2, ',', '') ;?>
                                                        </span>
                                                    </td>
                                                  <td class="wishlist_default">
                                                        <span  class='shipping_price'>
                                                           € <?php echo  number_format($totalshopingPrices, 2, ',', '') ;?>
                                                        </span>
                                                    </td>
                                                </tr>
												<?php endforeach; } ?>
												
																				  <?php if($totalPoid == 0){ ?>
												     <tr id="wishlist_1" class="free" <?php  if($totalPoid==0){ echo 'style="display:block"';} else { echo 'style="display:none"';} ?> >
                                                    <td>
                                                        <a style="font-size: 13px;"href="javascript:;">
														
																	<img style="width: 80%;" alt="<?php echo $transporters_gratuit->transporter_name;?>"  src="<?php echo base_url().'admines/medias/transporters/'.$transporters_gratuit->transporter_picture; ?>" class="img-responsive">
						
														</a>
                                                    </td>
                                                
                                                    <td>
													 <span class="info_delevery">
                                                    <?php echo $transporters_gratuit->transporter_short_text;?>
														   
                                                        </span>
                                                    </td>
                                                    <td class="wishlist_default">
                                                        <span class='htShoppings'>
                                                          € 0
                                                        </span>
                                                    </td>
													 <td class="wishlist_default">
                                                        <span class='tvaShoppings'>
                                                           € 0
                                                        </span>
                                                    </td>
                                                  <td class="wishlist_default">
                                                        <span  class='shipping_prices'>
                                                           € 0
                                                        </span>
                                                    </td>
                                                </tr>
																				  <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
								
                            </fieldset>
                            <fieldset class="fieldset_block_paiements">
							    <div class="row">
										<table class="std table table_cart cart_table">

                                        	<tbody >
                                            	<tr>
	                           							
		                                        	<td >
													
            												<b>Total panier TTC :</b>
																				
													</td>  
													<td>
               											<span class=" ">€ <?php echo  number_format(($totalCart+$totalOptionPrice), 2, ',', '') ;?> </span>
														   <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div>
													</td>
		
												</tr>
												
												<tr>
													<td>
												
                                                		
                                                    		<b>Frais de livraison :</b>
                                                		
													</td>
													<th>
                                                		<span class="">€ <?php echo  number_format($totalshopingPrices, 2, ',', '') ;?></span>
                                                
													</td>
												</tr>
												<tr>
													<td>
														
															<b>TVA :</b>
														
													</td>
													<td>
                                                  		<span class="">€ <?php echo  number_format(($totalCart+$totalshopingPrices+$totalOptionPrice)-(1-$taxe)*($totalCart+$totalshopingPrices+$totalOptionPrice), 2, ',', '') ;?></span>
													</td>
												</tr>
											</tbody>
										</table>
										<table class="std table table_total show_pc">
                                                <tbody>

                                                <tr>
                                                    <td style="width: 50%;">
                                                        <div class="panier_ht">
                                                            <b>  <span class="label js-subtotal">
                                                  <b> Total TTC :</b>                                                </span>
                                                                
                                                            </b>
                                                        </div>
                                                    </td>

                                                    <td style="width: 25%;">
                                                        <div class="price_totals">
                                                            <b>
															<span class="value total_panier_cart">€ <?php echo  number_format($totalshopingPrices+$totalCart+$totalOptionPrice, 2, ',', '') ;?></span>
                                                        </div>
                                                        
                                                    </td>
                                                    <td style="width: 25%;">


													<a href="javascript:;" class=" btn btn-primary pull-xs-right action_checkout step_3" style=" display:none;padding-right: 7px; padding-left: 7px;margin-top: 1rem;">
                                                          Valider mon paiement
                                    				</a> 

                                                    </td>
																				
                                                </tr>
												<tr>
                                                    <td >
													

<img src="<?php echo base_url();?>template/img/home/cb.jpg" style="" class="carte" alt="CB"></td><td>

					 <img src="<?php echo base_url();?>template/img/home/mc.jpg" class="carte" alt="MasterCard"></td><td>
					 <img src="<?php echo base_url();?>template/img/home/visa.jpg" class="carte" alt="VISA">
						</span> </div>
						  
                                                    </td>

											</tbody>
                                            </table>

									   </div>
                               
										
                            </fieldset>
                       </form>
					   
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		<div class="cart-grid-right col-xs-12 col-lg-3  show_pc ">
		<fieldset class="fieldset_block_delivery">
                                    <div class="cart-summary carts-summary">
                                        <div class="cart-detailed-totals">
                                            <div class="cart-summary-products">
                                                <div class="summary-label">Il y <span class="cart-products-panier-count"> <?php echo count($this->cart->contents()) ;?> </span>  commande dans votre panier </div>
                                            </div>
											<h2  class="cart_title_summary">Récapitulatif</h2>
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    <b>Total panier TTC :</b>
                                                </span>
                                                <span class="value total_panier_cart_ht ">€ <?php echo  number_format(($totalCart+$totalOptionPrice), 2, ',', '') ;?> </span>
                                          <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div>
										   </div>
										     <div   class="cart-summary-line cart-subtotal-shipping-ht">
                                                <span class="label">
                                                    <b>Frais de livraison :</b>
                                                </span>
                                                <span class="value shipping_price_ttc">€<?php echo  number_format($totalshopingPrices, 2, ',', '') ;?></span>
                                                <div>
                                                    <small class="value"></small>
                                                </div>
                                            </div>
										
                                         <div class="cart-summary-line cart-total">
                                                <span class="label"><b>TVA :</b></span>
                                                  <span class="value total_tva_cart  totalCartsTVA">€ <?php echo  number_format(($totalCart+$totalshopingPrices+$totalOptionPrice)-(1-$taxe)*($totalCart+$totalshopingPrices+$totalOptionPrice), 2, ',', '') ;?></span>
                                           </div>
                                            <div class="cart-summary-line cart-total carts-totals">
                                                <span class="label">Total TTC :</span>
                                                <span class="value total_panier_cart">€ <?php echo  number_format($totalshopingPrices+$totalCart+$totalOptionPrice, 2, ',', '') ;?></span>
                                            </div>
											 <div style="text-align: center;">

                                   <span><img src="<?php echo base_url();?>template/img/home/cb.jpg" style="" class="carte" alt="CB">

														<img src="<?php echo base_url();?>template/img/home/mc.jpg" class="carte" alt="MasterCard">
														<img src="<?php echo base_url();?>template/img/home/visa.jpg" class="carte" alt="VISA">
                                                           </span> </div>
														     
															   <div id="block-checkout" >
											<a href="javascript:;" class=" btn btn-primary pull-xs-right action_checkout step_2" style="    padding-right: 28px;padding-right: 7px; padding-left: 7px;margin-top: 1rem;">
                                        Valider ma livraison
                                    </a> 
										<a href="javascript:;" class=" btn btn-primary pull-xs-right action_checkout step_3" style=" display:none;padding-right: 7px; padding-left: 7px;margin-top: 1rem;">
                                        Valider mon paiement
                                    </a> 
									</div>
									 
                                        </div>
                                    </div>
								
                                   
                                </div>
																				  </fieldset>
    	</div>
</div>
</div>
          
                                </div>
                          
                            	</div>
							
						
							
							</div>
                        </section>
                    </div>
					
      </div>
            </div>
        </div>
</div>
<style>.blockcart {display:none;}</style>








 <div class="modal fade" id="myModaladresseLivraison" tabindex="-1" aria-labelledby="myModaladresseLivraison" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	  <div class="modal-header">
<h4 class="modal-title" style="margin-bottom: 0rem;">
					
					
					<div class="address-delivery-title typo-title">Mon  adresse de livraison</div>

					</h4>
					  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					
				</div>
	<div class="modal-body">
	
						  <div  class="col-xs-12 col-sm-10 col-md-10 col-lg-10 onecol" > 
										<div class="form-group ">
										 <div  class="row">
										 	<div  class="col-sm-1"></div>
								<label class="labels col-sm-4">Nom <span class="required">*</span></label>
								<div  class="col-sm-6">
											<input class="form-control" id="customer_delivery_firstname_modal"   type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
											<div class=" message_erro erro_delivery_firstname_modal"></div> 
										</div>
										</div>
										
										</div>
										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
									<label class="labels col-sm-4">Prénom <span class="required">*</span></label>
									<div  class="col-sm-6">
										<div  class="col-sm-1"></div>
											<input class="form-control"  id="customer_delivery_lastname_modal"   type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
											<div class=" message_erro erro_delivery_lastname_modal"></div> 
										</div>
										</div>
										</div>
										<div class="form-group ">
												<div  class="row">
												
													<div  class="col-sm-1"></div>
									<label class="labels col-sm-4">Pays <span class="required">*</span></label>
									<div  class="col-sm-6">
											<select  id="customer_delivery_country_modal"   class="form-control  btn-xs customer_delivery_country">
											<option value="">Selectionner </option>


											<option <?php  if($this->session->userdata('customer_delivery_country')==1){ echo"selected";} ?> value="1"> France</option>
											<option <?php  if($this->session->userdata('customer_delivery_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
											</select>
											<div class=" message_erro erro_delivery_country_modal"></div> 
										</div>
										</div>
										</div>


										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
									<label class="labels col-sm-4">Adresse <span class="required">*</span></label>
									<div  class="col-sm-6">
											<input class="form-control" id="customer_delivery_address_modal"  type="text" placeholder="Adresse" value="<?php echo $this->session->userdata('customer_delivery_address');?>">
											<div class=" message_erro erro_delivery_address_modal"></div> 
										</div>
										</div>
										</div>

										<div class="form-group ">
											<div  class="row">
											<div  class="col-sm-1"></div>
												<label class="labels col-sm-4">Code postal <span class="required">*</span></label>
											<div  class="col-sm-6">
													<input class="form-control customer_delivery_zip_modal"  id="customer_delivery_zip_modal" name="customer_delivery_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_delivery_zip');?>">
													<div class=" message_erro erro_delivery_zip_modal"></div> 
												</div>
										</div>
										</div>
										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
												<label class="labels col-sm-4">Ville <span class="required">*</span></label>
											<div  class="col-sm-6">
											<input class="form-control"  id="customer_delivery_city_modal" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_delivery_city');?>">
											<div class=" message_erro erro_delivery_city_modal"></div>
										</div>
										</div>
										</div>

										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
												<label class="labels col-sm-4">Numéro téléphone <span class="required">*</span></label>
											<div  class="col-sm-6">
											<input class="form-control"   id="customer_delivery_phone_modal" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_delivery_phone');?>">
											<div class=" message_erro erro_delivery_phone_modal"></div>
										</div>
										</div>
										</div>
										</div>
								</div>
                           <div class="modal-footer" style="DISPLAY: BLOCK;text-align: center;">
					<a  href="javascript:;" class="valsierAdress  btn btn-success btn-small" type="button" >  Confirmer</a>
				
					
				</div>
								</div>
								</div>
								
								</div> 
								
								
								
								
								
								
								
								
								
								
								
								
								<div class="modal fade" id="myModaladressebilling" tabindex="-1" aria-labelledby="myModaladressebilling" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	  <div class="modal-header">
<h4 class="modal-title" style="margin-bottom: 0rem;">
					
					
					<div class="address-delivery-title typo-title">Mon  adresse de facturation</div>


					</h4>
					  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					
				</div>
	<div class="modal-body">
	
						  <div  class="col-xs-12 col-sm-10 col-md-10 col-lg-10 onecol" > 
										<div class="form-group ">
										 <div  class="row">
										 	<div  class="col-sm-1"></div>
								<label class="labels col-sm-4">Nom <span class="required">*</span></label>
								<div  class="col-sm-6">
											<input class="form-control" id="customer_billing_firstname_modal"   type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
											<div class=" message_erro erro_billing_firstname_modal"></div> 
										</div>
										</div>
										
										</div>
										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
									<label class="labels col-sm-4">Prénom <span class="required">*</span></label>
									<div  class="col-sm-6">
										<div  class="col-sm-1"></div>
											<input class="form-control"  id="customer_billing_lastname_modal"   type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
											<div class=" message_erro erro_billing_lastname_modal"></div> 
										</div>
										</div>
										</div>
										<div class="form-group ">
												<div  class="row">
												
													<div  class="col-sm-1"></div>
									<label class="labels col-sm-4">Pays <span class="required">*</span></label>
									<div  class="col-sm-6">
											<select  id="customer_billing_country_modal"   class="form-control  btn-xs customer_delivery_country">
											<option value="">Selectionner </option>


											<option <?php  if($this->session->userdata('customer_delivery_country')==1){ echo"selected";} ?> value="1"> France</option>
											<option <?php  if($this->session->userdata('customer_delivery_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
											</select>
											<div class=" message_erro erro_billing_country_modal"></div> 
										</div>
										</div>
										</div>


										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
									<label class="labels col-sm-4">Adresse <span class="required">*</span></label>
									<div  class="col-sm-6">
											<input class="form-control" id="customer_billing_address_modal"  type="text" placeholder="Adresse" value="<?php echo $this->session->userdata('customer_delivery_address');?>">
											<div class=" message_erro erro_billing_address_modal"></div> 
										</div>
										</div>
										</div>

										<div class="form-group ">
											<div  class="row">
											<div  class="col-sm-1"></div>
												<label class="labels col-sm-4">Code postal <span class="required">*</span></label>
											<div  class="col-sm-6">
													<input class="form-control customer_billing_zip_modal"  id="customer_delivery_zip_modal" name="customer_delivery_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_delivery_zip');?>">
													<div class=" message_erro erro_billing_zip_modal"></div> 
												</div>
										</div>
										</div>
										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
												<label class="labels col-sm-4">Ville <span class="required">*</span></label>
											<div  class="col-sm-6">
											<input class="form-control"  id="customer_billing_city_modal" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_delivery_city');?>">
											<div class=" message_erro erro_billing_city_modal"></div>
										</div>
										</div>
										</div>

										<div class="form-group ">
										<div  class="row">
											<div  class="col-sm-1"></div>
												<label class="labels col-sm-4">Numéro téléphone <span class="required">*</span></label>
											<div  class="col-sm-6">
											<input class="form-control"   id="customer_billing_phone_modal" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_delivery_phone');?>">
											<div class=" message_erro erro_billing_phone_modal"></div>
										</div>
										</div>
										</div>
										</div>
								</div>
                           <div class="modal-footer" style="DISPLAY: BLOCK;text-align: center;">
					<a  href="javascript:;" class="valsierAdressbilling  btn btn-success btn-small" type="button" >  Confirmer</a>
				
					
				</div>
								</div>
								</div>
								
								</div> 
							
