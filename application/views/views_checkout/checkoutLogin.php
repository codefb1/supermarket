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
                                    <span> Mon compte</span>
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
						  
                            <form id="customer-form" action="<?php echo base_url().'checkout/login';?>" method="post" >
                              <h2 class="text-center title-page">Poursuivre votre commande</h2>
                         <p>Pour continuer votre commande , merci de vous connecter ou de créer un compte.</p>
							  <div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
									
                                        <input class="form-control" name="customer_email" type="email"  required placeholder=" Email *">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" required  name="customer_password" type="password" value="" placeholder="Mot de passe *">
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="clearfix">
								
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit" style="margin-bottom: 1rem;">
                                           
                                            Accéder à  mon compte
                                        
                                        </button>
										<span class="required-field alert_message" >*Champs obligatoires</span>
                                    </div>
									<div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="<?php echo base_url().'checkout/register';?>" rel="nofollow">
                                                Créer un compte 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
							
							    
									 
					  </div>
					  
                    
					  <div  class="col-xs-12 col-sm-3 col-md-3 col-lg-3">   </div>
					 
                               
                               
					  </div>
					 
					  </div>
					   </div>
                </div>
            </div>
   