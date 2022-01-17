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
	<?php if($banniers){  ?>
                             <div class="section spacing-10 group-image-special block-boucherie contact" >
                            <div class="">
                                <div class="col-lg-12 col-md-12 categories" >
                                    <div class="effect">
									 
                                      
                                            <img class="img-fluid width-100" src="<?php echo base_url().'admines/medias/banners/'.$banniers->banner_picture;?>" alt="<?php echo strip_tags($banniers->banner_title); ?>" title="<?php echo strip_tags($banniers->banner_title); ?>">
											<h1> <?php echo $banniers->banner_title; ?> </h1>
    

                                        
										                                     </div>
                                </div>
                             
                            </div>
                        </div>
						<?php } ?>
        <!-- main -->
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
				
                      <div class="page-home">
                        <div class="container contact">
                           <div class="row-inhert">
                                <div class="input-contact">
                                     

                                    <div class="d-flex justify-content-center format_contact">
									    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										
										 <div class="row">
										 <h3 class="">Contactez-nous par </h3>
                                   
										 
										    <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="item d-flex">
                                                <div class="item-left">
                                                   <img  src="<?php echo base_url().'template/';?>img/phone_contact.png" alt="logo" title ="">
                                                </div>
                                                <div class="item-left d-flex">
                                                    <div class="title"> </div>
                                                    <div class="contact-content phone">
                                                      
                                                       <?=$setting->phone;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                     
                                    </div>
											
										 <div class="row">
										
										 
										    <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="item d-flex block_email">
                                                <div class="item-left">
                                                   <img  src="<?php echo base_url().'template/';?>img/contact_email.png" alt="logo" title ="">
                                                </div>
                                                <div class="item-left d-flex">
                                                    <div class="title"> </div>
                                                    <div class="contact-content phone">
                                                      
                                                       <?=$setting->email;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
       
                                    </div>
										 <div class="row">
										 <h3 class="">Notre Adress</h3>
                                   
										 
										    <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="item d-flex">
                                                <div class="item-left">
                                                   <img  src="<?php echo base_url().'template/';?>img/contact_adresse.png" alt="logo" title ="">
                                                </div>
                                                <div class="item-left d-flex">
                                                    <div class="title"> </div>
                                                    <div class="contact-content phone">
                                                      
                                                       <?=$setting->address;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                     
                                    </div>
										</div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										 <h3 class="">CONTACTEZ-NOUS PAR EMAIL</h3>
                                            <div class="contact-form">
                                                <form action="#" method="post" enctype="multipart/form-data">
                                                    <div class="form-fields">
													<div class="form-group row">
                                                            <div class="col-md-12 margin-bottom-mobie">
                                                                <input class="form-control contact_subject" name="contact_subject" type="text" value="" placeholder="Sujet *">
																<div class="contact_subject_erro  contact_erro"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input class="form-control contact_lastname" name="contact_lastname" value="" placeholder="Nom *" type="text">
																<div class="contact_lastname_erro  contact_erro"></div>
                                                            </div>
                                                           
                                                        </div>
                                                          <div class="form-group row">
                                                            
                                                            <div class="col-md-12 margin-bottom-mobie">
                                                                <input class="form-control contact_email" name="contact_email" type="email" value="" placeholder="Email *">
																	<div class="contact_email_erro  contact_erro"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <textarea class="form-control contact_message" name="message" placeholder="Message" rows="8"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="is_send_message">
                                                       
                                                    </div>
                                                </form>
												 <button class="btn submitMessage" type="button" name="">
                                                           Envoyer
                                                        </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
   