 <?php  $categories_list =$this->M_categories->get_categories(false);
        $setting = $this->M_settings->get_this();
        $sociaux = $this->M_sociaux->get_this(1);
 ?> 
 
     <footer class="footer-one"  >
        <div class="inner-footer"style="background-image: url('<?php echo base_url().'template/';?>img/footer.png');">
            <div class="container">
                <div class="footer-top col-lg-12 col-xs-12">
                    <div class="row">
					  <div class="tiva-modules col-lg-3 col-md-6">
                           
							 <div class="footer-logo" style="top: 17px;">
							 <img src="<?php echo base_url().'template/';?>img/logo-footer.png" alt="Image">
							 </div>
							 <p style="
    text-align: center;
    font-size: 14px;
    color: #fff;    position: relative;margin-top: 20px;
"><a title="Go-MAKKAH" target="_blank" href="https://www.go-makkah.com/" style="color: #fff;
    font-weight: 600;">Visitez le site de notre </br>
	parteanire Go-MAKKAH</a></p>
                         </div>
                       <div class="col-lg-2 col-md-6 col-xs-6 col-mxl-6">
                            <div class="block">
                                <div class="block-content">
                                    <div class="title-block">
                                        Articles
                                    </div>

                                    <ul>
                                   
											 <?php foreach ($categories_list as $categorie): ?>
                                <li>
                                    <a href="<?php echo base_url().'products/categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));;?>"> <i class="fa fa-angle-double-right"></i> <?php echo $categorie->categorie_name;?></a>
                                 
                                </li>
                               
									<?php endforeach; ?>
                                        <li>
                                            <a href="#"><i class="fa fa-angle-double-right"></i> Meuilleurs ventes</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-angle-double-right"></i> Plus recommandes</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
						   <div class="col-lg-2 col-md-6 col-xs-6  col-mxl-6">
                            <div class="block">
                                <div class="block-content">
                                    <div class="title-block">
                                        Espace client
                                    </div>

                                    <ul>
                                        
						  <?php if(($this->session->userdata('logged_in'))!= 1) { ?>
									
									 <li>
                                            <a href="<?php echo base_url().'accounts';?>"> <i class="fa fa-angle-double-right"></i> Mon compte</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'accounts';?>"> <i class="fa fa-angle-double-right"></i> Mes commandes</a>
                                        </li>
                                       
                                        <li>
                                            <a href="<?php echo base_url().'accounts';?>"><i class="fa fa-angle-double-right"></i> Mes informations</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'accounts';?>"> <i class="fa fa-angle-double-right"></i> Mes adresses</a>
                                        </li>
						<?php }else{ ?>
								
								       <li>
                                            <a href="<?php echo base_url().'customers';?>"> <i class="fa fa-angle-double-right"></i> Mon compte</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'ordres';?>"> <i class="fa fa-angle-double-right"></i> Mes commandes</a>
                                        </li>
                                       
                                        <li>
                                            <a href="<?php echo base_url().'customers/informations';?>"><i class="fa fa-angle-double-right"></i> Mes informations</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'customers/adresses';?>"> <i class="fa fa-angle-double-right"></i> Mes adresses</a>
                                        </li>

						               <?php } ?>
										   <li>
                                            <a href="<?php echo base_url().'cart';?>"> <i class="fa fa-angle-double-right"></i> Mon panier</a>
                                        </li>
                                      
                                        <li>
                                            <a href="<?php echo base_url().'contact';?>"> <i class="fa fa-angle-double-right"></i> Service clients</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						  <div class="tiva-modules col-lg-3 col-md-6">
                            <div class="block m-top">
                                <div class="block-content">
                                    <div class="title-block">Qui sommes nous</div>
                                    <div class="sub-title">
									<?=$setting->home_block_titre_5;?>
                                    </div>
                                   
                                </div>
                            </div>
							
                         </div>
						   <div class="tiva-modules col-lg-2 col-md-6">
                                   <div class="block">
                                <div class="block-content">
                                    <div class="title-block">
                                       Informations 
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url().'pages/show/';?>6-qui-somme-nous"> <i class="fa fa-angle-double-right"></i> Qui somme nous</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'pages/show/';?>7-notre-mission"><i class="fa fa-angle-double-right"></i> Notre mission</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'pages/show/';?>8-nos-engagements"><i class="fa fa-angle-double-right"></i> Nos engagements </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'pages/show/';?>9-conditions-generales"><i class="fa fa-angle-double-right"></i> Conditions Générales</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'pages/show/';?>10-mentions-legales"> <i class="fa fa-angle-double-right"></i> Mentions Légales </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'pages/show/';?>11-emballages"><i class="fa fa-angle-double-right"></i> Emballages</a>
                                        </li>
										
										<li>
                                            <a href="<?php echo base_url().'pages/show/';?>12-certification"> <i class="fa fa-angle-double-right"></i> Nos certification</a>
                                        </li>
										<li>
                                            <a href="<?php echo base_url().'pages/show/';?>13-partenaire"><i class="fa fa-angle-double-right"></i> Partenaire</a>
                                        </li>
										<li>
                                            <a href="<?php echo base_url().'pages/show/';?>14-nos-recettes"><i class="fa fa-angle-double-right"></i> Nos recettes</a>
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
                        <span>
							<!--<a target="_blank" href="https://www.templateshub.net">Templates Hub</a>-->
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
