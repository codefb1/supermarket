   <div class="wrap-banner">

            <!-- breadcrumb -->
            <nav class="breadcrumb-bg" style="display:block!important">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                              <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
										
										 <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>cart">
                                                <span>Panier</span>
                                            </a>
                                        </li>
                            <li>
                                <a href="#" class="breadcrumb-title">
                                    <span> Créer un compte</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

        </div>

        <!-- main -->
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
				
                    <div class="container account">
					
					<div class="row login text-center">
					 <div id="account" class="col-xs-12 col-sm-6 col-md-6 col-lg-6  " style="margin: 0;padding: 0;" >
                        <img  class="img-fluid" src="<?php echo base_url().'template/';?>img/login_carts.jpg" title="Mouton entier" alt=" Mouton entier">
					                                                 
					  </div> 
					  
    


					 <div id="account"  class="col-xs-12 col-sm-6 col-md-6 col-lg-6 onecol registre">
						 
				 <div class="login-form">
					   <span class="alert_message_compte"> <?php echo $message;?></span>
						  
                              <form id="customer-form" action="<?php echo base_url().'checkout/register';?>" method="post" >
                             
						     <h2 class="text-center title-page">Poursuivre votre commande</h2>
                         <p>Pour continuer votre commande , merci de vous créer un compte.</p>
							
							   <div>
                                    
                                    
                                     
                                     <div class="form-group no-gutters">
									
                                        <input class="form-control" name="customer_email" type="email"  required placeholder=" Email *">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" required  name="customer_password" type="password" value="" placeholder="Mot de passe *">
                                        </div>
                                    </div>
									   <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <input class="form-control" name="customer_firstname" type="text"  required placeholder=" Nom *"> </div>
                                    </div>
									
									   <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <input class="form-control" name="customer_lastname" type="text"  required placeholder=" Prénom *"> </div>
                                    </div>
									
                                   <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <select  id="customer_delivery_country"  name="customer_country" class="form-control  btn-xs customer_delivery_country">
											<option  value="1"> France</option>
											<option  value="3"> Belgique</option>
											</select>
                                    </div>
                                </div>
								
								 <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <input class="form-control" name="customer_address" type="text"  required placeholder=" Adresse *"> 
										</div>
                                    </div>
									 <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <input class="form-control" name="customer_zip" type="text"  required placeholder=" Code postal *"> 
										</div>
                                    </div>
									
									 <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <input class="form-control" name="customer_city" type="text"  required placeholder=" Ville *"> 
										</div>
                                    </div>
									 <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                        <input class="form-control" name="customer_phone" type="text"  required placeholder=" Numéro téléphone *"> 
										</div>
                                    </div>
                                <div class="clearfix">
								
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="2">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit" style="margin-bottom: 1rem;">
                                           Valider
                                        </button>
										<span class="required-field alert_message" >*Champs obligatoires</span>
                                    </div>
										<div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="<?php echo base_url().'checkout/login';?>" rel="nofollow">
                                               Se connecter 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
									
									 
					  </div>
					  
                    
					  <div  class="col-xs-12 col-sm-3 col-md-3 col-lg-3">   </div>
					 
                               
                               
					  </div>
					 
					  </div>
					   </div>
                </div>
            </div>
   