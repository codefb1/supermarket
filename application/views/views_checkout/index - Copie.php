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
                                     <?php if(($this->session->userdata('logged_in'))!=1) { ?>
									 <div class="checkout-personal-step">
                                            <h3 class="step-title h3 info">
                                                <span class="step-number">1</span>information personel
                                            </h3>
                                        </div>
										     <div class="content">
                                            <ul class="nav nav-inline">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#checkout-guest-form">
                                                      Inscrivez-vous
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#checkout-login-form">
                                                       identifiez-vous ! 
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active show" id="checkout-guest-form" role="tabpanel">
                                                    <form action="<?php echo base_url().'checkout';?>" id="customer-form" class="js-customer-form" method="post">
                                                     <div>
                                                           <div class="form-group">
											
												
						<div  class="row">
						<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12">Nom <span class="required">*</span></label>
						<div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
						<input class="form-control" required name="customer_firstname" type="text" placeholder="Nom" value="<?php echo $customer_firstname; ?>">
						</div>
						</div>
						</div>
							<div class="form-group">



							<div  class="row">
						
							<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12">Prénom <span class="required">*</span></label>
						  <div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
							<input class="form-control" required  name="customer_lastname" type="text" placeholder="Prénom" value="<?php echo $customer_lastname; ?>">
							</div>
							</div>
							</div>
							<div class="form-group">
										<div  class="row">
									<label class="labels col-sm-4">Pays <span class="required">*</span></label>
									<div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
									<select  id="customer_country"   required name="customer_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($customer_country==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($customer_country==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select>
									<div class=" message_erro erro_country"></div>
									</div>
									
									</div>
									
									 </div>
											<div class="form-group">
											
												
												
													<div  class="row">
									<label class="labels col-sm-4">Adresse <span class="required">*</span></label>
									<div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
									     <input class="form-control" required id="customer_address"  name="customer_address" type="text" placeholder="Adress" value="<?php echo $customer_address;?>">
                                             <div class=" message_erro erro_address"></div>  
											   </div>
									</div>
                                            </div>
											
											<div class="form-group">
											
                                            
													<div  class="row">
									<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12"> Code Postal <span class="required">*</span></label>
									<div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
									             <input class="form-control" id="customer_zip" required name="customer_zip" type="text" placeholder="Code Postal" value="<?php echo $customer_zip;?>">
                                             <div class=" message_erro erro_zip"></div> 
											 </div>
									</div>
											</div>
											<div class="form-group">
											 
												
														<div  class="row">
									<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12"> Ville <span class="required">*</span></label>
									<div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
									              <input class="form-control" id="customer_city" required name="customer_city" type="text" placeholder="Ville" value="<?php echo $customer_city;?>">
                                               <div class=" message_erro erro_city"></div> 
											   </div>
									</div>
                                            </div>
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12"> Numéro téléphone <span class="required">*</span></label>
									<div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
									                <input class="form-control" id="customer_phone" required name="customer_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $customer_phone;?>">
                                                <div class=" message_erro erro_phone"></div> 
												</div>
									</div>
                                            </div>
                                      				
								<div class="form-group">
											<div  class="row">
										<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12">E-mail</label>
						  <div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
						
									                <input class="form-control" required name="customer_email" type="email" placeholder="Email" value="<?php echo $customer_email;?>">
                                                </div>
									</div>
                                            </div>
                               	<div class="form-group">
											<div  class="row">
										<label class="labels col-sm-4 col-lg-4 col-md-4 col-xs-12">Mot de passe</label>
						  <div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
					
									                <input class="form-control" required name="customer_password" type="password" placeholder="Mot de passe" value="<?php echo $customer_password;?>">
                                                </div>
									</div>
                                            </div>                            
                                                           
                                                          
                                                           
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="row">
                                                        <input type="hidden" name="submitLogin" value="2">
														 
                                                                <button class="continue btn btn-primary pull-xs-right" name="continue" data-link-action="register-new-customer" type="submit"
                                                                    value="1">
                                                                    Continue
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="checkout-login-form" role="tabpanel">
                                                    <form id="login-form" action="<?php echo base_url().'checkout';?>" method="post" class="customer-form">
                                                      
													  <div>
                                                         <input type="hidden" name="submitLogin" value="1">
														 <div class="form-group">
											<div  class="row">
										<label class="labels col-sm-3 col-lg-3 col-md-3 col-xs-12">E-mail</label>
						  <div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
						
									                <input class="form-control" required name="customer_email" type="email" placeholder="Email" value="<?php echo $customer_email;?>">
                                                </div>
									</div>
                                            </div>
                               	<div class="form-group">
											<div  class="row">
										<label class="labels col-sm-3 col-lg-3 col-md-3 col-xs-12">Mot de passe</label>
						  <div  class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
					
									                <input class="form-control" required name="customer_password" type="password" placeholder="Mot de passe" value="<?php echo $customer_password;?>">
                                                </div>
									</div>
                                            </div> 
                                                            <div class="row">
                                                                <div class="forgot-password">
                                                                    <a href="user-reset-password.html" rel="nofollow">
                                                                        Mot de passe oublié ?
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="row">
                                                                <button class="continue btn btn-primary pull-xs-right" name="continue" data-link-action="sign-in" type="submit" value="1">
                                                                    Continue
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                  
				<?php } ?>
				

		<form action="<?php echo base_url().'orders/order_payement';?>" id="customer-form" class="js-customer-form" method="post">
                                                     
		
					
										 <div class="checkout-personal-step">
                                            <h3 class="step-title h3  h_addresses <?php if($info) { ?> info <?php } ?>">
                                                <span class="step-number <?php if($info) { ?> step-number-info <?php } ?> "><?php if($this->session->userdata('logged_in')) { ?> 1 <?php } else { ?> 2<?php }  ?></span>Addresses
                                            </h3>
											     <?php if(($this->session->userdata('logged_in'))) { ?>
											 <div class="content addresses" id="addresses" <?php if($info) { ?> info <?php } else { ?>style="display:none" <?php }  ?> >
                                               <h2 class="text-center title-page" style="font-size:18px!important;"> Adresse de livraison</h2>
                                    <form action="<?php echo base_url().'customer/adresses';?>" id="customer-form" class="js-customer-form" method="post">
                                               <input class="hidden" name="type_adress" type="hidden" value="1">
                                        <div class="form-group">
										  <div  class="row">
						<label class="labels col-sm-4">Nom <span class="required">*</span></label>
						<div  class="col-sm-6">
						<input class="form-control" id="customer_delivery_firstname"  name="customer_delivery_firstname" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
						<div class=" message_erro erro_delivery_firstname"></div> 
						</div>
						</div>
						</div>
							<div class="form-group">



							<div  class="row">
							<label class="labels col-sm-4">Prénom <span class="required">*</span></label>
							<div  class="col-sm-6">
							<input class="form-control"  id="customer_delivery_lastname"  name="customer_delivery_lastname" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
							<div class=" message_erro erro_delivery_lastname"></div> 
							</div>
							</div>
							</div>
										<div class="form-group">
										<div  class="row">
									<label class="labels col-sm-4">Pays <span class="required">*</span></label>
									<div  class="col-sm-6">
									<select  id="customer_delivery_country"  name="customer_delivery_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($this->session->userdata('customer_delivery_country')==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($this->session->userdata('customer_delivery_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select>
									<div class=" message_erro erro_delivery_country"></div> 
									</div>
									</div>
									
									 </div>
											<div class="form-group">
											
												
												
													<div  class="row">
									<label class="labels col-sm-4">Adresse <span class="required">*</span></label>
									<div  class="col-sm-6">
									     <input class="form-control" id="customer_delivery_address" name="customer_delivery_address" type="text" placeholder="Adress" value="<?php echo $this->session->userdata('customer_delivery_address');?>">
                                              <div class=" message_erro erro_delivery_address"></div> 
											  </div>
									</div>
                                            </div>
											
											<div class="form-group">
											
                                            
													<div  class="row">
									<label class="labels col-sm-4"> Code Postal <span class="required">*</span></label>
									<div  class="col-sm-6">
									             <input class="form-control customer_delivery_zip"  id="customer_delivery_zip" name="customer_delivery_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_delivery_zip');?>">
                                              <div class=" message_erro erro_delivery_zip"></div> 
											</div>
									</div>
											</div>
											<div class="form-group">
											 
												
														<div  class="row">
									<label class="labels col-sm-4"> Ville <span class="required">*</span></label>
									<div  class="col-sm-6">
									              <input class="form-control"  name="customer_delivery_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_delivery_city');?>">
                                              <div class=" message_erro erro_delivery_city"></div>
											  </div>
									</div>
                                            </div>
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4"> Numéro téléphone <span class="required">*</span></label>
									<div  class="col-sm-6">
									                <input class="form-control"   id="customer_delivery_phone" name="customer_delivery_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_delivery_phone');?>">
                                              <div class=" message_erro erro_delivery_phone"></div>
											  </div>
									</div>
                                            </div>   
									
                                      					<div class="">
												<input name="shopping_address" id="shopping_address" type="checkbox" value="1" checked="">
												<label class="info_shopping">Utiliser cet adresse pour la facturation </label>
											  </div>
                                    
									
									
									
									  <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol shopping"style="display:none" > 
				
                                  <h2 class="text-center title-page" style="font-size:18px!important;">Adresse de facturation</h2>
                                         <input class="hidden" name="type_adress" type="hidden" value="2">
                                        <div class="form-group">
										  <div  class="row">
						<label class="labels col-sm-4">Nom <span class="required">*</span></label>
						<div  class="col-sm-6">
						<input class="form-control" id="customer_billing_firstname"  name="customer_delivery_firstname" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_firstname'); ?>">
						<div class=" message_erro erro_billing_firstname"></div> 
						</div>
						</div>
						</div>
							<div class="form-group">



							<div  class="row">
							<label class="labels col-sm-4">Prénom <span class="required">*</span></label>
							<div  class="col-sm-6">
							<input class="form-control"  id="customer_billing_lastname"  name="customer_shipping_lastname" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_lastname'); ?>">
							<div class=" message_erro erro_billing_lastname"></div> 
							</div>
							</div>
							</div>

									   <div class="form-group">
										<div  class="row">
									<label class="labels col-sm-4">Pays <span class="required">*</span></label>
									<div  class="col-sm-6">
									<select  id="customer_country"   required name="customer_billing_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($this->session->userdata('customer_country')==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($this->session->userdata('customer_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select>
									<div class=" message_erro erro_billing_country"></div>
									</div>
									
									</div>
									
									 </div>
											<div class="form-group">
											
												
												
													<div  class="row">
									<label class="labels col-sm-4">Adresse <span class="required">*</span></label>
									<div  class="col-sm-6">
									     <input class="form-control"required id="customer_billing_address"  name="customer_shipping_address" type="text" placeholder="Adress" value="<?php echo $this->session->userdata('customer_address');?>">
                                             <div class=" message_erro erro_shipping_address"></div>  
											   </div>
									</div>
                                            </div>
											
											<div class="form-group">
											
                                            
													<div  class="row">
									<label class="labels col-sm-4"> Code Postal <span class="required">*</span></label>
									<div  class="col-sm-6">
									             <input class="form-control" id="customer_billing_zip"  name="customer_billing_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_zip');?>">
                                             <div class=" message_erro erro_billing_zip"></div> 
											 </div>
									</div>
											</div>
											<div class="form-group">
											 
												
														<div  class="row">
									<label class="labels col-sm-4"> Ville <span class="required">*</span></label>
									<div  class="col-sm-6">
									              <input class="form-control" id="customer_billing_city"  name="customer_billing_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_city');?>">
                                               <div class=" message_erro erro_billing_city"></div> 
											   </div>
									</div>
                                            </div>
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4"> Numéro téléphone <span class="required">*</span></label>
									<div  class="col-sm-6">
									                <input class="form-control" id="customer_billing_phone"  name="customer_billing_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_phone');?>">
                                                <div class=" message_erro erro_billing_phone"></div> 
												</div>
									</div>
                                            </div>
								</div>
									
											
				  <div class="clearfix">
				  
                                                            <div class="row">
                                                                <button style="margin-top: 0rem;margin-bottom: 2rem;" class="continue btn btn-primary pull-xs-right setep_2" name="continue" data-link-action="address" type="button" value="1">
                                                                    Continue
                                                                </button>
                                                            </div>
                                                        </div>
                                </div>
                                        <?php } ?>
									  
											
                                        </div>
                                        <div class="checkout-personal-step">
                                            <h3 class="step-title step-tranporteur h3">
                                                <span class="step-number step-number-tranporteur"><?php if($this->session->userdata('logged_in')) { ?> 2 <?php } else { ?> 3<?php }  ?></span>Mode de livraison
                                            </h3>
											     <?php if(($this->session->userdata('logged_in'))) { ?>
											
											 <div class="content block_delivery list_delivery" id="block_delivery" style="display:none;width: 100%;">
											 <div class="cart-content">
                                       
							 		 
											 <div id="block-history" class="block-center">
                                        <table class="std table">
                                         
                                            <tbody>
								  <?php foreach($transporters as $transporter) :?>
                                                <tr id="wishlist_1">
                                                    <td style='border-top: 0px solid #dee2e6;'>
                                                        <a style="font-size: 13px;"href="javascript:;"><?php echo $transporter->transporter_name;?></a>
                                                    </td>
                                                
                                                    <td style='border-top: 0px solid #dee2e6;'>
													 <span style='font-size:13px;' class=''>
                                                           Livraison prévus 48 après </br>préparation de commande
                                                        </span>
                                                    </td>
                                                    <td class="wishlist_default" style='border-top: 0px solid #dee2e6;'>
                                                        <span style='font-size:13px;' class='htShopping'>
                                                           
                                                        </span>
                                                    </td>
													 <td class="wishlist_default" style='border-top: 0px solid #dee2e6;'>
                                                        <span style='font-size:13px;' class='tvaShopping'>
                                                           
                                                        </span>
                                                    </td>
                                                  <td class="wishlist_default" style='border-top: 0px solid #dee2e6;'>
                                                        <span style='font-size:13px;' class='shipping_price'>
                                                           
                                                        </span>
                                                    </td>
                                                </tr>
												<?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
									  <div class="clearfix">
                                                            <div class="row">
                                                                <button style="margin-top: -1rem;" class="continue btn btn-primary pull-xs-right setep_3" name="continue" data-link-action="address" type="button" value="1">
                                                                    Continue
                                                                </button>
                                                            </div>
                                                        </div>
									 </div>
											 </div>
											
											  <?php } ?>
											 
											  	 
                                        </div>
                                        <div class="checkout-personal-step">
                                            <h3 class="step-title  step-paiement h3">
                                                <span class="step-number step-number-paiement"><?php if($this->session->userdata('logged_in')) { ?> 3 <?php } else { ?> 4<?php }  ?></span> Methode de  paiement
                                            </h3>
											 <?php if(($this->session->userdata('logged_in'))) { ?>
											
											<div class="cart-content paiements" style="display:none;">
								 		 <div id="block-history" class="block-center">
                                        <table class="std table">
                                           
                                            <tbody>
								    <tr id="wishlist_1">
                                                    <td style='border-top: 0px solid #dee2e6;'>
                                                   <img src="<?php echo base_url();?>template/img/cbvm_card-2.png" class="" style="" width="120px" /></label>
											 </td>
                                                
                                                    <td style='border-top: 0px solid #dee2e6;'>
												<p style="/* margin-top:5px; */font-size: 14px;display: inline-block;"><b>Carte Bleue/Visa/Mastercard</b>  via <span class="bold">Ingenico-Ogone</span> <a href="#" style="color:#777777;" title="Qui est Ingenico-Ogone ?" data-target="#ingenico-ogone" data-toggle="modal">[en savoir +]</a> l'un des systèmes de paiement 100% sécurisé les plus reconnus.
										</p>
                                                    </td>

                                                 
                                                </tr>
												
                                            </tbody>
                                        </table>
										<div class="clearfix">
                                                           <div  class="row">
										  <button style="    margin-left: 36px;
    margin-top: -1rem;"class="continue btn btn-primary pull-xs-right" name="continue" data-link-action="sign-in" type="submit" value="1">
                                                                    Valider
                                                                </button>
															</div></div>
                                    </div>
										
										
										</div>
										  <?php } ?>
										  
										 
											
                                        </div>
                                </form>
                                   					<!-- MultiStep Form -->
<div class="row">
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Commander</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
							
  
                                <li <?php if(($this->session->userdata('logged_in'))!=1) { ?>  class="active"  <?php }  ?>  id="account"><strong>Mon compte</strong></li>
                                <li id="personal" <?php if(($this->session->userdata('logged_in'))) { ?>  class="active"  <?php }  ?>><strong>Adress</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
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
									<input type="text" name="customer_firstname"  required placeholder="Nom" />
									 </div>
									 <div class="form-group new_acount">
									<input type="text" name="customer_lastname"  required placeholder="Prénom" />
										 </div>
										 <div class="form-group new_acount">
										<select  id="customer_country"   required name="customer_country" class="form-control  btn-xs">
									<option value="">¨Payer</option>


									<option <?php  if($customer_country==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($customer_country==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select>
									 </div>
									  <div class="form-group new_acount">
									<input type="text" name="customer_address" required placeholder="Adresse" />
										 </div>
										 
										  <div class="form-group new_acount">
									<input type="text" name="customer_zip" required placeholder="Code Postal" />
										 </div>
										 
										  <div class="form-group new_acount">
									<input type="text" name="customer_city"  required placeholder="Ville" />
										 </div>
								  <div class="form-group new_acount">
									<input type="text" name="customer_phone"required  placeholder="Numéro téléphone" />
										 </div>
										   <div class="form-group new_acount">
									<input type="email" name="customer_email" required placeholder="E-mail" />
										 </div>
										   <div class="form-group new_acount">
									<input type="password" name="customer_password" required placeholder="Mot de passe" />
										 </div>
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
                            <fieldset <?php if(($this->session->userdata('logged_in'))) { ?>  style="display:block"  <?php }  ?>>
                                <div class="form-card">
								 <?php if(($this->session->userdata('logged_in'))) { ?>
                                    <h2 class="fs-title">Adresse de livraison</h2> 
										<div class="form-group ">
										<input class="form-control" id="customer_delivery_firstname"  name="customer_delivery_firstname" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
										<div class=" message_erro erro_delivery_firstname"></div> 
										</div>
										<div class="form-group ">
										<input class="form-control"  id="customer_delivery_lastname"  name="customer_delivery_lastname" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
										<div class=" message_erro erro_delivery_lastname"></div> 
										</div>
										<div class="form-group ">
										<select  id="customer_delivery_country"  name="customer_delivery_country" class="form-control  btn-xs customer_delivery_country">
										<option value="">Payer </option>


										<option <?php  if($this->session->userdata('customer_delivery_country')==1){ echo"selected";} ?> value="1"> France</option>
										<option <?php  if($this->session->userdata('customer_delivery_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
										</select>
										<div class=" message_erro erro_delivery_country"></div> 
										</div>


										<div class="form-group ">
										<input class="form-control" id="customer_delivery_address" name="customer_delivery_address" type="text" placeholder="Adress" value="<?php echo $this->session->userdata('customer_delivery_address');?>">
										<div class=" message_erro erro_delivery_address"></div> 
										</div>

										<div class="form-group ">
										<input class="form-control customer_delivery_zip"  id="customer_delivery_zip" name="customer_delivery_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_delivery_zip');?>">
										<div class=" message_erro erro_delivery_zip"></div> 
										</div>
										<div class="form-group ">
										<input class="form-control"  name="customer_delivery_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_delivery_city');?>">
										<div class=" message_erro erro_delivery_city"></div>
										</div>

										<div class="form-group ">
										<input class="form-control"   id="customer_delivery_phone" name="customer_delivery_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_delivery_phone');?>">
										<div class=" message_erro erro_delivery_phone"></div>
										</div>
<?php }  ?>
                                </div> 
								<input type="button" name="next" class=" action-button" value="Continue" />
                          		<input type="hodde" name="next" class="next action-button block_delivery" value="Next Step" />
                         
						  
						   </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Payment Information</h2>
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                        <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
                                    </div> <label class="pay">Card Holder Name*</label> <input type="text" name="holdername" placeholder="" />
                                    <div class="row">
                                        <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" name="cardno" placeholder="" /> </div>
                                        <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"> <label class="pay">Expiry Date*</label> </div>
                                        <div class="col-9"> <select class="list-dt" id="month" name="expmonth">
                                                <option selected>Month</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October</option>
                                                <option>November</option>
                                                <option>December</option>
                                            </select> <select class="list-dt" id="year" name="expyear">
                                                <option selected>Year</option>
                                            </select> </div>
                                    </div>
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
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
</div>
</div>
          
                                </div>
                                <div class="cart-grid-right col-xs-12 col-lg-3">
                                    <div class="cart-summary">
                                        <div class="cart-detailed-totals">
                                            <div class="cart-summary-products">
                                                <div class="summary-label">Il y <span class="cart-products-panier-count"> <?php echo count($this->cart->contents()) ;?> </span>  commande dans votre panier </div>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    Total produits TTC:
                                                </span>
																							<?php $totalCart=0; foreach ($this->cart->contents() as $items):
											
											$totalCart=$totalCart+($items['price']*$items['qty']);
											?>
												<?php endforeach; ?>
                                                <span class="value total_panier_cart">€ <?php echo  number_format($totalCart, 2, ',', '') ;?></span>
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
                                            <div class="cart-summary-line cart-total">
                                                <span class="label">Total TTC:</span>
                                                <span class="value total_panier_cart">€ <?php echo  number_format($totalCart, 2, ',', '') ;?></span>
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