   <div class="wrap-banner">

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
                                <a href="#" class="breadcrumb-title">
                                    <span> Accès client</span>
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
					<div class="row message">
				<?php  foreach ($messages  as  $messsage):?>
				<p><?php echo $messsage; ?></p>
				<?php endforeach; ?>
					 </div>
					<div class="row login text-center">
					 <div id="account" class="col-xs-12 col-sm-5 col-md-5 col-lg-5 onecol " <?php if($regisitre){ echo "style='display:none'";} else { echo "style='display:block'";} ?> style="background-image: url('http://localhost/avion/template/img/image-7.jpg');">
                      
					   <div class="login-form">
					   
						  <h2 class="text-center title-page">Client <span> enregistrée</span></h2>
                         
                            <form id="customer-form" action="<?php echo base_url().'accounts';?>" method="post">
                                <div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
									
                                        <input class="form-control" name="customer_email" type="email"  required placeholder=" Email">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" required  name="customer_password" type="password" value="" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                    <div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="#" rel="nofollow">
                                                Mot de passe oublié ?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            Accéder a  un compte
                                        </button>
                                    </div>
									
                                </div>
                            </form>
                        </div>
					  </div> 
					  
    


					 <div  id="account" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 separateur-hidden"  <?php if($regisitre){ echo "style='display:none'";} else { echo "style='display:block'";} ?>>  <div class="separateur">	<hr/><span>Ou</span></div></div> 
					  <div id="account"  class="col-xs-12 col-sm-5 col-md-5 col-lg-5 onecol registre" <?php if($regisitre){ echo "style='display:none'";} else { echo "style='display:block'";} ?>>
					<div class="login-form">
					  <h2 class="text-center title-page">Nouveau <span>client</span></h2>
					  
                                    <form action="<?php echo base_url().'accounts';?>" id="" class="" method="post">
                                        <div>
                                            <div class="form-group">
                                               <p> </p>
                                            </div>
                                          
                                            <div class="form-group ">
                                                <div>
                                                    <input class="form-control" required name="customer_email" type="email" placeholder="Email">
                                                    <input type="hidden" name="submitLogin" value="2">
                                        
											   </div>
                                            </div>
                                           
                                        </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary add-new-use"  type="submit">
                                                    Inscription
                                                </button>
                                            </div>
                                        </div>
                                    </form>
									
									 </div>
					  </div>
					  
                    
					  <div  class="col-xs-12 col-sm-3 col-md-3 col-lg-3">   </div>
					  <div  class="col-xs-12 col-sm-7 col-md-7 col-lg-7 onecol saveregistre"  <?php if($regisitre){ echo "style='display:block'";} else { echo "style='display:none'";} ?>>
					     
					  <form action="<?php echo base_url().'accounts';?>" id="" class="" method="post">
					  <input type="hidden" name="submitLogin" value="">
                                                <button class="btn btn-primary return"  type="submit">
                                                 <i class="fa fa-chevron-left"></i>  Retourne
                                                </button>
                                           
                         </form>
                                 
                                  <h2 class="text-center title-page">Créer <span> un compte</span></h2>
                         
                                    <form action="<?php echo base_url().'accounts';?>" id="customer-form" class="js-customer-form" method="post">
                                               <input class="hidden" name="type_adress" type="hidden" value="2">
                                          
<div class="form-group">
											
												
												
						<div  class="row">
						<label class="labels col-sm-4">Nom <span class="required">*</span></label>
						<div  class="col-sm-6">
						<input class="form-control" required name="customer_firstname" type="text" placeholder="Nom" value="<?php echo $customer_firstname; ?>">
						</div>
						</div>
						</div>
							<div class="form-group">



							<div  class="row">
							<label class="labels col-sm-4">Prénom <span class="required">*</span></label>
							<div  class="col-sm-6">
							<input class="form-control" required  name="customer_lastname" type="text" placeholder="Prénom" value="<?php echo $customer_lastname; ?>">
							</div>
							</div>
							</div>											
										<div class="form-group">
										<div  class="row">
									<label class="labels col-sm-4">Pays <span class="required">*</span></label>
									<div  class="col-sm-6">
									<select  id="customer_country"  name="customer_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($custome_country==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($customer_country==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select></div>
									</div>
									
									 </div>
											<div class="form-group">
											
												
												
													<div  class="row">
									<label class="labels col-sm-4">Adresse <span class="required">*</span></label>
									<div  class="col-sm-6">
									     <input class="form-control"required  name="customer_address" type="text" placeholder="Adress" value="<?php echo $customer_address;?>">
                                                </div>
									</div>
                                            </div>
											
											<div class="form-group">
											
                                            
													<div  class="row">
									<label class="labels col-sm-4"> Code Postal <span class="required">*</span></label>
									<div  class="col-sm-6">
									             <input class="form-control" required name="customer_zip" type="text" placeholder="Code Postal" value="<?php echo $customer_zip;?>">
                                              </div>
									</div>
											</div>
											<div class="form-group">
											 
												
														<div  class="row">
									<label class="labels col-sm-4"> Ville <span class="required">*</span></label>
									<div  class="col-sm-6">
									              <input class="form-control" required name="customer_city" type="text" placeholder="Ville" value="<?php echo $customer_city;?>">
                                                </div>
									</div>
                                            </div>
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4"> Numéro téléphone <span class="required">*</span> </label>
									<div  class="col-sm-6">
									                <input class="form-control" required name="customer_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $customer_phone;?>">
                                                </div>
									</div>
                                            </div>
											
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4"> Mot de passe  <span class="required">*</span></label>
									<div  class="col-sm-6">
									                <input class="form-control" required name="customer_password" type="password" placeholder="Mot de passe" value="<?php echo $customer_password;?>">
                                                </div>
									</div>
                                            </div>
                                        <div class="clearfix">
                                            <div> 
											<input type="hidden" name="submitLogin" value="3">
											<input  name="customer_email" type="hidden" value="<?php echo $email_2;?>">
                                                 <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                   Créez votre compte
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                               
                               
					  </div>
					  <div  class="col-xs-12 col-sm-2 col-md-2 col-lg-2">   </div>
					  </div>
					   </div>
                </div>
            </div>
        </div>
   