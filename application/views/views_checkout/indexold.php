         <div id="checkout" class="main-content">
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
						<div class=" check-cart">
						  <h1 class="title-page"> <span>Commander</span></h1>
						  </div> 
                            <div class="cart-grid row ">
						       
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  message">
				<?php  foreach ($messages  as  $messsage):?>
				<p style="color:red;"><?php echo $messsage; ?></p>
				<?php endforeach; ?>
					 </div>
                                <div class="col-md-9 col-xs-12 check-info check-cart">
                           
                                   					<!-- MultiStep Form -->
<div class="row">
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
            <div class="card ">
              
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
							
  
                                <li  class="active" id="account"><strong>1-Mon compte</strong></li>
                                <li id="adresse" <?php if(($this->session->userdata('logged_in'))) { ?>  class="active"  <?php }  ?>><strong>2-Adresse</strong></li>
                               
								<li id="delivery"><strong> 3-Livraison</strong></li>
                             
							   <li id="payment"><strong>4-Paiement</strong></li>
                            </ul> <!-- fieldsets -->
                             <fieldset <?php if(($this->session->userdata('logged_in'))) { ?>  style="display:none"  <?php }  ?>>
                                <div class="form-card">
								 <?php if(($this->session->userdata('logged_in'))!=1) { ?>
                                    <h2 class="fs-title"> Mon compte</h2> 
									   <ul class="nav nav-inline">
                                                <li class="nav-item">
                                                    <a class="nav-link active checkout-guest-form" data-toggle="tab" href="#checkout-guest-form" >
                                                      Inscrivez-vous
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link checkout-login-form" data-toggle="tab" href="#checkout-login-form">
                                                       identifiez-vous ! 
                                                    </a>
                                                </li>
                                            </ul>
											  <form id="login-form" action="<?php echo base_url().'checkout';?>" method="post" class="customer-form">
   
									 <div class="form-group new_acount">
									 	 <div  class="row">
								<label class="labels col-sm-3">Nom <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="text" name="customer_firstname"  required placeholder="Nom"  />
									 </div> </div> </div>
									 <div class="form-group new_acount">
									 	 <div  class="row">
								<label class="labels col-sm-3">Prénom <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="text" name="customer_lastname"  required placeholder="Prénom" />
										 </div> </div> </div>
										 <div class="form-group new_acount">
										 <div  class="row">
								<label class="labels col-sm-3">Payer <span class="required">*</span></label>
								<div  class="col-sm-6">
										<select  id="customer_country"   required name="customer_country" class="form-control  btn-xs">
									<option value="">¨Selectionner</option>


									<option <?php  if($customer_country==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($customer_country==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select>
									 </div> </div> </div>
									  <div class="form-group new_acount">
									   <div  class="row">
								<label class="labels col-sm-3">Adresse <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="text" name="customer_address" required placeholder="Adresse" />
										 </div>
										 </div></div>
										 
										 
										  <div class="form-group new_acount">
										    <div  class="row">
								<label class="labels col-sm-3">Code postal <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="text" name="customer_zip" required placeholder="Code Postal" />
										 </div>
										 </div></div>
										  <div class="form-group new_acount">
										    <div  class="row">
								<label class="labels col-sm-3">Ville <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="text" name="customer_city"  required placeholder="Ville" />
										 </div></div></div>
								  <div class="form-group new_acount">
								     <div  class="row">
								<label class="labels col-sm-3">Numéro téléphone <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="text" name="customer_phone"required  placeholder="Numéro téléphone" />
										 </div></div></div>
										   <div class="form-group new_acount">
										        <div  class="row">
								<label class="labels col-sm-3">E-mail <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="email" name="customer_email" required placeholder="E-mail" />
										 </div> </div> </div>
										   <div class="form-group new_acount">
										    <div  class="row">
								<label class="labels col-sm-3">Mot de passe <span class="required">*</span></label>
								<div  class="col-sm-6">
									<input type="password" name="customer_password" required placeholder="Mot de passe" />
										 </div> </div> </div>
								   <input type="hidden" name="submitLogin" value="2">
									<input type="submit" name="next" class="valide_compte action-button new_acount" value="Continue" />
								   </form>
								   <form id="login-form" action="<?php echo base_url().'checkout';?>" method="post" class="customer-form">
   
								   <div class="form-group identifie"  style="display:none;">
									<input type="email" name="customer_email" required placeholder="E-mail" />
										 </div>
										   <div class="form-group identifie" required style="display:none;">
									<input type="password" name="customer_password" required placeholder="Mot de passe" />
										 </div>
										      <input type="hidden" name="submitLogin" value="1">
								 	<input style="display:none;" type="submit" name="next" class="valide_compte action-button identifie" value="Continue" />
								   </form>
								     <?php }  ?>
								 </div>

                            </fieldset>
							 <?php if(($this->session->userdata('logged_in'))) { ?>
								<form action="<?php echo base_url().'orders/order_payement';?>" id="customer-form" class="js-customer-form" method="post">
           
                            <fieldset <?php if(($this->session->userdata('logged_in'))) { ?>  style="display:block"  <?php }  ?>>
                                <div class="form-card">
                                   <?php if(($this->session->userdata('logged_in'))) { ?>
                                    <h2 class="fs-title">Adresse de livraison</h2> 
										<div class="form-group ">
										 <div  class="row">
								<label class="labels col-sm-3">Nom <span class="required">*</span></label>
								<div  class="col-sm-6">
											<input class="form-control" id="customer_delivery_firstname"  name="customer_delivery_firstname" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_firstname'); ?>">
											<div class=" message_erro erro_delivery_firstname"></div> 
										</div>
										</div>
										
										</div>
										<div class="form-group ">
										<div  class="row">
									<label class="labels col-sm-3">Prénom <span class="required">*</span></label>
									<div  class="col-sm-6">
											<input class="form-control"  id="customer_delivery_lastname"  name="customer_delivery_lastname" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_lastname'); ?>">
											<div class=" message_erro erro_delivery_lastname"></div> 
										</div>
										</div>
										</div>
										<div class="form-group ">
												<div  class="row">
									<label class="labels col-sm-3">Payer <span class="required">*</span></label>
									<div  class="col-sm-6">
											<select  id="customer_delivery_country"  name="customer_delivery_country" class="form-control  btn-xs customer_delivery_country">
											<option value="">Selectionner </option>


											<option <?php  if($this->session->userdata('customer_country')==1){ echo"selected";} ?> value="1"> France</option>
											<option <?php  if($this->session->userdata('customer_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
											</select>
											<div class=" message_erro erro_delivery_country"></div> 
										</div>
										</div>
										</div>


										<div class="form-group ">
										<div  class="row">
									<label class="labels col-sm-3">Adresse <span class="required">*</span></label>
									<div  class="col-sm-6">
											<input class="form-control" id="customer_delivery_address" name="customer_delivery_address" type="text" placeholder="Adresse" value="<?php echo $this->session->userdata('customer_address');?>">
											<div class=" message_erro erro_delivery_address"></div> 
										</div>
										</div>
										</div>

										<div class="form-group ">
											<div  class="row">
												<label class="labels col-sm-3">Code postal <span class="required">*</span></label>
											<div  class="col-sm-6">
													<input class="form-control customer_delivery_zip"  id="customer_delivery_zip" name="customer_delivery_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_zip');?>">
													<div class=" message_erro erro_delivery_zip"></div> 
												</div>
										</div>
										</div>
										<div class="form-group ">
										<div  class="row">
												<label class="labels col-sm-3">Ville <span class="required">*</span></label>
											<div  class="col-sm-6">
											<input class="form-control"  name="customer_delivery_city" id="customer_delivery_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_city');?>">
											<div class=" message_erro erro_delivery_city"></div>
										</div>
										</div>
										</div>

										<div class="form-group ">
										<div  class="row">
												<label class="labels col-sm-3">Numéro téléphone <span class="required">*</span></label>
											<div  class="col-sm-6">
											<input class="form-control"   id="customer_delivery_phone" name="customer_delivery_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_phone');?>">
											<div class=" message_erro erro_delivery_phone"></div>
										</div>
										</div>
										</div>
											<div class="form-group ">
												<input style="width:5%" class="shopping_address"  name="shopping_address" id="shopping_address" type="checkbox" value="1" checked="">
												<label class="info_shopping">Utiliser cet adresse pour la facturation </label>
											  </div>
											  <h2 class="text-center title-page shopping" style="display:none;font-size:18px!important;">Adresse de facturation</h2>

									<div class="form-group shopping"style="display:none">
									<div  class="row">
												<label class="labels col-sm-3">Nom <span class="required">*</span></label>
											<div  class="col-sm-6">
									<input class="hidden" name="type_adress" type="hidden" value="2">
									<input class="form-control" id="customer_billing_firstname"  name="customer_delivery_firstname" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_firstname'); ?>">
									<div class=" message_erro erro_billing_firstname"></div>  
									</div>
									</div>
									</div>
									<div class="form-group shopping"style="display:none">
										<div  class="row">
												<label class="labels col-sm-3">Prénom <span class="required">*</span></label>
											<div  class="col-sm-6">
									<input class="form-control"  id="customer_billing_lastname"  name="customer_shipping_lastname" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_lastname'); ?>">
									<div class=" message_erro erro_billing_lastname"></div> 
									</div>
									</div>
									</div>
									<div class="form-group shopping"style="display:none">
										<div  class="row">
												<label class="labels col-sm-3">Payer <span class="required">*</span></label>
											<div  class="col-sm-6">
									<select  id="customer_country"    name="customer_billing_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($this->session->userdata('customer_country')==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($this->session->userdata('customer_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select>
									<div class=" message_erro erro_billing_country"></div>
									</div>
                                    </div></div>

									<div class="form-group shopping"style="display:none">
										<div  class="row">
												<label class="labels col-sm-3">Adresse <span class="required">*</span></label>
											<div  class="col-sm-6">
									<input class="form-control"required id="customer_billing_address"  name="customer_shipping_address" type="text" placeholder="Adresse" value="<?php echo $this->session->userdata('customer_address');?>">
									<div class=" message_erro erro_shipping_address"></div> 
									</div>
                                   </div></div>
									<div class="form-group shopping"style="display:none">
									<div  class="row">
												<label class="labels col-sm-3">Code postal <span class="required">*</span></label>
											<div  class="col-sm-6">
									<input class="form-control" id="customer_billing_zip"  name="customer_billing_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_zip');?>">
									<div class=" message_erro erro_billing_zip"></div>
									</div>
									</div>
									</div>
									<div class="form-group shopping"style="display:none">
									<div  class="row">
												<label class="labels col-sm-3">Ville <span class="required">*</span></label>
											<div  class="col-sm-6">
									<input class="form-control" id="customer_billing_city"  name="customer_billing_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_city');?>">
									<div class=" message_erro erro_billing_city"></div> 
									</div>
									</div>
									</div>

									<div class="form-group shopping"style="display:none">
									<div  class="row">
												<label class="labels col-sm-3">Numéro téléphone <span class="required">*</span></label>
											<div  class="col-sm-6">
									<input class="form-control" id="customer_billing_phone"  name="customer_billing_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_phone');?>">
									<div class=" message_erro erro_billing_phone"></div>
									</div>	  
										</div>
										</div>
											
                                    <?php }  ?>
								
								</div> 
								     	<input style="float: left;margin-left: 6%;" type="button" name="next" class="setep_2 action-button" value="Continue" />
                          		<input type="hidden" name="next" class="next action-button block_delivery" value="Continue" />
                            
							</fieldset>
                            <fieldset>
                                <div class="form-card">
                                  <h2 class="fs-title">Mode de livraison</h2> 
                                    		 <div id="block-history" class="block-center list_delivery">
                                        <table class="std table">
                                         
                                            <tbody>
								  <?php foreach($transporters as $transporter) :?>
                                                <tr id="wishlist_1" class="livreur">
                                                    <td>
                                                        <a style="font-size: 13px;"href="javascript:;"><?php echo $transporter->transporter_name;?></a>
                                                    </td>
                                                
                                                    <td>
													 <span class="info_delevery">
                                                           Livraison prévus 48 après </br>préparation de commande
                                                        </span>
                                                    </td>
                                                    <td class="wishlist_default">
                                                        <span class='htShopping'>
                                                           
                                                        </span>
                                                    </td>
													 <td class="wishlist_default">
                                                        <span class='tvaShopping'>
                                                           
                                                        </span>
                                                    </td>
                                                  <td class="wishlist_default">
                                                        <span  class='shipping_price'>
                                                           
                                                        </span>
                                                    </td>
                                                </tr>
												<?php endforeach; ?>
												  <tr id="wishlist_1"class="free"  style="display:none">
                                                  <td>
													 <span class="info_delevery text-center" >
                                                           <b>Gratuit </b>
                                                        </span>
                                                    </td>
                                                  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
								<input type="button" style="float: left;margin-left: 6%;" name="previous" class="previous action-button-previous" value="Précédente" /> 
								<input type="button" style="float: left;" name="next" class="next action-button" value="Continue" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title ">Paiement</h2> <br><br>
                                     <table class="std table">
                                           
                                            <tbody>
								    <tr id="wishlist_1">
                                                    <td >
                                                   <img src="<?php echo base_url();?>template/img/cbvm_card-2.png"  width="120px" /></label>
											 </td>
                                                
                                                    <td>
												<p  class="cart_paiement"><b>Carte Bleue/Visa/Mastercard</b>  via <span class="bold">Bread</span> 
												<a href="#" title="Qui est Ingenico-Ogone ?" data-target="#ingenico-ogone" data-toggle="modal">[en savoir +]</a> l'un des systèmes de paiement 100% sécurisé les plus reconnus.
										</p>
										
										
                                                    </td>

                                                 
                                                </tr>
												
                                            </tbody>
                                        </table>
                                </div>
										<input style="float: left;margin-left: 6%;" type="submit" name="make_payment" class=" action-button" value="Confirmer" />
                          
                            </fieldset>
                       </form>
					    <?php }  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
          
                                </div>
                                <div class="cart-grid-right col-xs-12 col-lg-3">
								<?php $totalCart=0; foreach ($this->cart->contents() as $items):
											
											$totalCart=$totalCart+($items['price']*$items['qty']);
											?>
												<?php endforeach; ?>
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
                                                <span class="value total_panier_cart_ht">€ <?php echo  number_format($totalCart*(1-$taxe), 2, ',', '') ;?></span>
                                          <div >  <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span> </div>
										   </div>
										    <div class="cart-summary-line cart-total">
                                                <span class="label">TVA :</span>
                                                <span class="value total_tva_cart">€ <?php echo  number_format($totalCart-($totalCart*(1-$taxe)), 2, ',', '') ;?></span>
                                            </div>
											   <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    Total panier TTC :
                                                </span>
                                                <span class="value total_panier_cart_ht">€ <?php echo  number_format($totalCart, 2, ',', '') ;?></span>
                                          
										   </div>
										   <div   class="cart-summary-line" style="display:none;" id="cart-subtotal-shipping-ttc">
                                                <span class="label">
                                                    Frais de livraison TTC:
                                                </span>
                                                <span class="value shipping_price_ttc">€ 0.00</span>
                                                <div>
                                                    <small class="value"></small>
                                                </div>
                                            </div>
                                        
                                            <div class="cart-summary-line cart-total carts-totals">
                                                <span class="label">Total TTC :</span>
                                                <span class="value total">€ 
												
												<?php echo  number_format($totalCart, 2, ',', '') ;?>
												
												</span>
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