   <div class="wrap-banner">

            <!-- breadcrumb -->
            <nav class="breadcrumb-bg">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                              <li>
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
                            <li>
                                <a href="#">
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
				<div class="row">
				<?php  foreach ($messsages as $messsage):?>
				<p><?php echo $messsage; ?></p>
				<?php endforeach; ?>
					 </div>
                    <div class="container account">
					
					<div class="row login text-center">
					 <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6 onecol">
                        <h2 class="text-center title-page">Clients enregistrés</h2>
                         <p>Si vous avez un compte, connectez-vous avec votre adresse email.</p>
                        <div class="login-form">
                            <form id="customer-form" action="#" method="post">
                                <div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
                                        <input class="form-control" name="email" type="email"  required placeholder=" Email">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" required  name="password" type="password" value="" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="clearfix">
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            Connexion
                                        </button>
                                    </div>
									    <div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="user-reset-password.html" rel="nofollow">
                                                Mot de passe oublié ?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
					  <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6 onecol registre">
					   <h2 class="text-center title-page">Nouveaux clients</h2>
					  
                                    <form action="#" id="" class="" method="post">
                                        <div>
                                            <div class="form-group">
                                               <p> Saisissez votre adresse e-mail pour créer votre compte.</p>
                                            </div>
                                          
                                            <div class="form-group block-email">
                                                <div>
                                                    <input class="form-control" required name="email" type="email" placeholder="Email">
                                                    <input type="hidden" name="submitLogin" value="2">
                                        
											   </div>
                                            </div>
                                           
                                        </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary"  type="submit">
                                                    Créer un compte
                                                </button>
                                            </div>
                                        </div>
                                    </form>
					  </div>
					  </div>
					   </div>
                </div>
            </div>
        </div>
   