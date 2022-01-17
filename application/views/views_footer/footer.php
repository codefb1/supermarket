 <?php $this->load->view('views_modals/showProduct.php');?>
<?php $this->load->view('views_modals/showOptions.php');?>
<?php $this->load->view('views_modals/showOprionAssociations.php');?>
<?php $this->load->view('views_modals/editCart.php');?>
 <?php  $categories_list =$this->M_categories->get_categories(false);
        $setting = $this->M_settings->get_this();
        $sociaux = $this->M_sociaux->get_this(1);
 ?> 
 
     <footer class="footer-one"  >
        <div class="inner-footer"style="background-image: url('<?php echo base_url().'template/';?>img/footer_decor.png');">
            <div class="container">
                <div class="footer-top col-lg-12 col-xs-12">
				 <div class="row footer_newsletter"> 
				  <div class="tiva-modules col-lg-2 col-md-2"> </div>
 <div class="tiva-modules col-lg-3 col-md-3">
    <div class="block m-top">
                                <div class="block-content">
                                    <div class="title-block title-block-first">Inscrivez-vous à notre </div>
                                   
                                   <div class="title-block">Newsletter</div>
                                </div>
                            </div>
						  </div>
<div class="tiva-modules col-lg-5 col-md-5">
                            <div class="block m-top">
                                <div class="block-content">
                                  
                                    <div class="block-newsletter">
                                    
                                            <div class="input-group">
                                                <input type="text" class="form-control newsletter_email " name="newsletter_email" value="" placeholder="Votre email ici..">
                                                <span class="input-group-btn">
                                                    <button class="effect-btn btn btn-secondary add_new_newsletter" name="submitNewsletter" type="submit">
                                                        <span>Inscription</span>
                                                    </button>
                                                </span>
                                            </div>
                                           
                                      <div class="newsletter_message"></div>
                                    </div>
                                </div>
                            </div>
                         </div>
						  <div class="tiva-modules col-lg-2 col-md-2"> </div>
						   </div>
                    <div class="row">
				
                       <div class="col-lg-4 col-md-4 col-xs-6 col-mxl-6">
                            <div class="block">
                                <div class="block-content">
                                    <div class="title-block">
                                        Articles
                                    </div>

                                    <ul>
                                   
							
                                        <li>
                                            <a href="<?php echo base_url().'products/goffa';?>" title="NOS COUFINS"><i class="fa fa-angle-double-right"></i> <span>NOS COUFFINS</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'products/categorie/101-epices';?>" title="NOS ÉPECERIERS"><i class="fa fa-angle-double-right"></i> <span>NOS ÉPICES</span></a>
                                        </li>
										   <li>
                                            <a href="<?php echo base_url().'associations';?>" title="MOUTON ENTIER"><i class="fa fa-angle-double-right"></i> <span>MOUTON ENTIER</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
						   <div class="col-lg-4 col-md-4 col-xs-6  col-mxl-6">
                            <div class="block">
                                <div class="block-content">
                                    <div class="title-block">
                                        Espaces client
                                    </div>

                                    <ul>
                                        
						
									 <li>
                                            <a href="<?php echo base_url().'cart';?>" title="MOM PANIER" > <i class="fa fa-angle-double-right"></i><span> MON PANIER</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'contact';?>" title="RECLAMATION" > <i class="fa fa-angle-double-right"></i><span> RECLAMATION</span></a>
                                        </li>
                                       
                                        <li>
                                            <a href="<?php echo base_url().'contact';?>" title="SERVICE CLIENT"><i class="fa fa-angle-double-right"></i> <span>SERVICE CLIENT</span></a>
                                        </li>
                                     
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
						  <div class="tiva-modules col-lg-4 col-md-4">
                            <div class="block m-top">
                                <div class="block-content">
                                    <div class="title-block">Qui sommes nous ?</div>
                                    <div class="sub-title">
									<?=$setting->home_block_titre_5;?>
                                    </div>
                                   
                                </div>
                            </div>
							
                         </div>
						  
						 
						 
                    </div>
                </div>
            
            <div class="footer-list">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="block">
                            <div class="block-content">
                                <ul class="list-inline">
                            
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>6-qui-somme-nous" title="Qui somme nous">Qui sommes nous?</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>7-notre-mission" title="Notre mission">Notre mission</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>8-nos-engagements" title="Nos engagements">Nos engagements </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>9-conditions-generales" title="Conditions Générales">Conditions Générales</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>10-mentions-legales" title="Mentions Légales">Mentions Légales</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>11-emballages" title="Emballages">Emballages</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>12-certification" title="Nos certification">Nos certifications</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo base_url().'pages/show/';?>13-partenaire" title="Partenaire">Partenaire</a>
                                    </li>
                                    <li class="list-inline-item views">
                                        <a href="<?php echo base_url().'pages/show/';?>14-nos-recettes" title="Nos recettes">Nos recettes</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  
           
                <div class="col-lg-12 col-md-12">
					<div id="social-block">
							<div class="social"    align="center">
								<ul class="list-inline mb-0 justify-content-end">
									<li class="list-inline-item mb-0">
									<a href="#" target="_blank">
									<i class="fa fa-facebook"></i>
									</a>
									</li>
									<li class="list-inline-item mb-0">
									<a href="#" target="_blank">
									<i class="fa fa-twitter"></i>
									</a>
									</li>
									<li class="list-inline-item mb-0">
									<a href="#" target="_blank">
									<i class="fa fa-google"></i>
									</a>
									</li>
									<li class="list-inline-item mb-0">
									<a href="#" target="_blank">
									<i class="fa fa-instagram"></i>
									</a>
									</li>
								</ul>
							</div>
	</div>
				</div>
                </div>
            </div>
        </div>
        </div>
        <div id="tiva-copyright">
            <div class="container">
                <div class="row">
                    <div class="text-center col-lg-12 ">
                      <div class="info">  <span>
							<a href="<?php echo base_url();?>" title="Go-Ferme" ><img src="<?=base_url().'template/logo/';?>logo-footer-new.png"  alt='Go-ferme-halal' /></a>
                         </span><span>Copy rigths <?= date('Y');?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
