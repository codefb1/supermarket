<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="zxx">



<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title> <?=$setting->page_title;?> </title>
<meta name="keywords" content="<?php echo $setting->page_meta_keywords;?>" />
		<meta name="description" content="<?php echo $setting->page_meta_description;?>" />
	
    <meta name="keywords" content="Furniture, Decor, Interior">
    <meta name="description" content="Furnitica - Minimalist Furniture HTML Template">
    <meta name="author" content="tivatheme">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/font-material/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/nivo-slider/css/nivo-slider.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/nivo-slider/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/nivo-slider/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/owl-carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/css/';?>jquery.bootstrap-touchspin.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>css/reponsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>css/mobile.css">
</head>

<body id="home">
    <header>
        <!-- header left mobie -->
        <div class="header-mobile d-md-none">
            <div class="mobile hidden-md-up text-xs-center d-flex align-items-center justify-content-around">

                <!-- menu left -->
                <div id="mobile_mainmenu" class="item-mobile-top">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>

                <!-- logo -->
                <div class="mobile-logo">
                    <a href="<?php echo base_url();?>">
                        <img class="logo-mobile img-fluid" src="<?php echo base_url().'template/';?>img/logo-mobile.png" alt="">
                    </a>
                </div>
     <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                              <?php if(($this->session->userdata('logged_in'))!= 1) { ?>
							   <div class="myaccount-title">
                            
     <a href="<?php echo base_url().'accounts';?>"  class="acount">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span></span>
                                  
                                </a>
								</div>
      <?php }else{ ?>
	   <div class="myaccount-title">
                                <a href="#acounts" data-toggle="collapse" class="acount" aria-expanded="true">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span> Mon compte</span>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div id="acounts" class="collapse" style="">
                                <div class="account-list-content">
								 <div>
                                        <a class="login" href="<?php echo base_url().'customer/information/';?>" rel="nofollow" title="mon compte">
                                                <span ><?php echo $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');?></span>
                                        
                                            <span style="text-transform: initial;"><?php echo $this->session->userdata('customer_email');?></span>
                                        </a>
                                    </div>
									 <div>
                                        <a class="login" href="#" rel="nofollow" title="Log in to your customer account">
                                            <i class=" fa fa-angle-right "></i>
                                            <span>Voir Mon compte</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="login" href="#" rel="nofollow" title="Log in to your customer account">
                                            <i class=" fa fa-angle-right"></i>
                                            <span>Repasser une commander</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="login" href="user-login.html" rel="nofollow" title="Log in to your customer account">
                                            <i class="fa fa-angle-right "></i>
                                            <span>Voir mes facteurs</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="register" href="#" rel="nofollow" title="Register Account">
                                            <i class=" fa fa-angle-right "></i>
                                            <span>Voir mes liste d'achats</span>
                                        </a>
                                    </div>
                                  
                                    <div>
                                        <a href="<?php echo base_url().'accounts/system_logout/';?>" title="Se déconnecter">
                                            <i class="fa fa-angle-right "></i>
                                            <span>Se déconnecter</span>
                                        </a>
                                    </div>
                                   
                               
                                </div>
                            </div>
   
      
      <?php } ?>
                            </div>
                    
                <!-- menu right -->
                <div class="desktop_cart">
                    <div class="blockcart block-cart cart-preview tiva-toggle">
                        <div class="header-cart tiva-toggle-btn">
                            <span class="cart-products-count"><?=count($this->cart->contents())?></span>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="dropdown-content">
                                          <div class="cart-content">
                                       
							 <?php if($this->cart->contents()){  ?>
										<table>
										
                                            <tbody class="cart_items">
											<?php $totalCart=0; foreach ($this->cart->contents() as $items):
											$image =$this->M_products_pictures->get_one_product_picture($items['id']);
											$path ="";
											if($image){
											$path =base_url().'admines/medias/products/'.$image->product_pictures;
											}
											$totalCart=$totalCart+($items['price']*$items['qty']);
											?>
											
													<tr class="rowid_<?php echo $items['rowid'];?>">
													<td class="product-image">
													<a href="<?php echo base_url().'products/show/'.$items['options']->product_id.'-'.strtolower(url_title($items['options']->product_name));?>"><img src="<?php echo $path ;?>" alt="<?php echo  $items['options']->product_name;?>"></a>
													</td>
													<td>
													<div class="product-name"><a href="<?php echo base_url().'products/show/'.$items['options']->product_id.'-'.strtolower(url_title($items['options']->product_name));?>"><?php echo  $items['options']->product_name;?></a></div>
													<div><?php echo $items['qty'];?> x<span class="product-price">€ <?php if ($items['price']>0){  echo number_format($items['price']*$items['qty'], 2, ',', '');} else {echo "N.D";}?></span></div>
													</td>
													<td class="action">
													<a class="remove" href="#" onclick="remove_item('<?php echo $items['rowid'];?>');"><i class="fa fa-remove" aria-hidden="true"></i></a>
													</td>
													</tr>  
													<?php endforeach; ?>
                                             
                                            </tbody>
                                        </table>
										  <?php  } else {  ?>
										     <table>
                                            <tbody class="cart_items">
											
                                                 <tr>
                                                    <td>
														<div style="width: 100%;">
												     		<p class="text-center">Aucun article dans votre panier.</p>
														</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
										  <?php }  ?>
										               <table>
                                            <tbody class="">
											<tr></tr>
                                                   <tr class="total">
                                                    <td colspan="2">Total:</td>
                                                    <td class="total_cart"> € <?php echo  number_format($totalCart, 2, ',', '') ;?></td>
                                                </tr>
                                                    <td colspan="3" class="d-flex justify-content-center">
                                                        <div class="cart-button">
                                                            <a href="<?php echo base_url().'cart';?>" title="Voir panier" class="view_cart">Voir panier </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- search -->
            <div id="mobile_search" class="d-flex">
                
              
            </div>
        </div>
		<div class="modal fade" id="myModalCartSave" tabindex="-1" aria-labelledby="myModalCartSaveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<h4 class="modal-title">Panier <span>(<span class='modal_cart_items'> </span> article(s))</span></h4>
				</div>
      <div class="modal-body">
        <div class="alert alert-success cart_message">                
						<span class="productName"></span>
                             a été ajouté à votre panier ! 
					</div>
					<div>
       <table>
		<tbody class="modal_products_cart">
																						
		 </tbody>
          </table>
			</div>
      </div>
      <div class="modal-footer">
	    <a type="button" class="btn btn-secondary checkout_page" href="<?php echo base_url().'cart';?>" style="font-size: 12px!important;
	background-color: #b5313e!important;
    border-color: #b5313e!important;color: #fff;">  Voir mon panier</a>
 <button type="button" class="btn btn-secondary cart_modal_close" data-dismiss="modal"> Continuer mon achat</button>

      </div>
    </div>
  </div>
</div>
    <!-- header desktop -->
        <div class="header-top d-xs-none ">
            <div class="container">
                <div class="row">
                    <!-- logo -->
                    <div class="col-sm-2 col-md-2 d-flex align-items-center menu-pc">
                        <div id="logo">
                            <a href="<?php echo base_url();?>">
                                <img  src="<?php echo base_url().'template/';?>img/logo_go_ferme_halal.png" alt="logo">
                            </a>
                        </div>
                    </div>

                    <!-- menu -->
					
										<?php if(($this->session->userdata('logged_in'))!= 1) { ?>
					<div class="main-menu col-sm-8 col-md-8 align-items-center justify-content-center navbar-expand-md menu-pc">
										   
						  <?php }else{ ?>
						  <div class="main-menu col-sm-7 col-md-7 align-items-center justify-content-center navbar-expand-md menu-pc">
										   
						  
						  <?php } ?>
							<div class="menu navbar collapse navbar-collapse" style="float: right;">
                            <ul class="menu-top navbar-nav">
                                <li class="nav-link">
                                    <a href="<?php echo base_url();?>" class="parent  <?php if($menu=='home'){ echo'active'; } ?>"   >Accueil</a>
                                   
									</li>                                                            
								 <?php foreach ($categories_list as $categorie): ?>
                                <li>
                                    <a href="<?php echo base_url().'products/categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));;?>" class="parent <?php if($menu==$categorie->categorie_id){ echo'active'; } ?> "><?php echo $categorie->categorie_name;?></a>
                                 
                                </li>
                               
									<?php endforeach; ?>
								
                            </ul>
                        </div>
                    </div>

                    <!-- search-->
				<?php if(($this->session->userdata('logged_in'))!= 1) { ?>
				<div id="search_widget" class="col-sm-2 col-md-2 align-items-center justify-content-end d-flex menu-pc">

				<?php }else{ ?>
				<div id="search_widget" class="col-sm-3 col-md-3 align-items-center justify-content-end d-flex menu-pc">


				<?php } ?>

                        <!-- acount  -->
                          <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                              <?php if(($this->session->userdata('logged_in'))!= 1) { ?>
							   <div class="myaccount-title">
                            
     <a href="<?php echo base_url().'accounts';?>"  class="acount">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span></span>
                                  
                                </a>
								</div>
      <?php }else{ ?>
	   <div class="myaccount-title">
                                <a href="#acount" data-toggle="collapse" class="acount" aria-expanded="true">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span> Mon compte</span>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div id="acount" class="collapse" style="">
                                <div class="account-list-content">
								 <div>
                                        <a class="login" href="<?php echo base_url().'customer/information/';?>" rel="nofollow" title="mon compte">
                                                <span ><?php echo $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');?></span>
                                        
                                            <span style="text-transform: initial;"><?php echo $this->session->userdata('customer_email');?></span>
                                        </a>
                                    </div>
									 <div>
                                        <a class="login" href="#" rel="nofollow" title="Log in to your customer account">
                                            <i class=" fa fa-angle-right "></i>
                                            <span>Voir Mon compte</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="login" href="#" rel="nofollow" title="Log in to your customer account">
                                            <i class=" fa fa-angle-right"></i>
                                            <span>Repasser une commander</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="login" href="user-login.html" rel="nofollow" title="Log in to your customer account">
                                            <i class="fa fa-angle-right "></i>
                                            <span>Voir mes facteurs</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="register" href="#" rel="nofollow" title="Register Account">
                                            <i class=" fa fa-angle-right "></i>
                                            <span>Voir mes liste d'achats</span>
                                        </a>
                                    </div>
                                  
                                    <div>
                                        <a href="<?php echo base_url().'accounts/system_logout/';?>" title="Se déconnecter">
                                            <i class="fa fa-angle-right "></i>
                                            <span>Se déconnecter</span>
                                        </a>
                                    </div>
                                   
                               
                                </div>
                            </div>
   
      
      <?php } ?>
                            </div>
                         <div class="desktop_cart">
                            <div class="blockcart block-cart cart-preview tiva-toggle">
                                <div class="header-cart tiva-toggle-btn">
                                    <a href="<?php echo base_url().'cart';?>">  <span class="cart-products-count"><?=count($this->cart->contents())?></span>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</a>
                                </div>
                                <div class="dropdown-content">
                                          <div class="cart-content">
                                       
							 <?php if($this->cart->contents()){  ?>
										<table>
										
                                            <tbody class="cart_items">
											<?php $totalCart=0; foreach ($this->cart->contents() as $items):
											$image =$this->M_products_pictures->get_one_product_picture($items['id']);
											$path ="";
											if($image){
											$path =base_url().'admines/medias/products/'.$image->product_pictures;
											}
											$totalCart=$totalCart+($items['price']*$items['qty']);
											?>
											
													<tr class="rowid_<?php echo $items['rowid'];?>">
													<td class="product-image">
													<a href="<?php echo base_url().'products/show/'.$items['options']->product_id.'-'.strtolower(url_title($items['options']->product_name));?>"><img src="<?php echo $path ;?>" alt="<?php echo  $items['options']->product_name;?>"></a>
													</td>
													<td>
													<div class="product-name"><a href="<?php echo base_url().'products/show/'.$items['options']->product_id.'-'.strtolower(url_title($items['options']->product_name));?>"><?php echo  $items['options']->product_name;?></a></div>
													<div><?php echo $items['qty'];?> x<span class="product-price">€ <?php if ($items['price']>0){  echo number_format($items['price']*$items['qty'], 2, ',', '');} else {echo "N.D";}?></span></div>
													</td>
													<td class="action">
													<a class="remove" href="#" onclick="remove_item('<?php echo $items['rowid'];?>');"><i class="fa fa-remove" aria-hidden="true"></i></a>
													</td>
													</tr>  
													<?php endforeach; ?>
                                             
                                            </tbody>
                                        </table>
										  <?php  } else {  ?>
										     <table>
                                            <tbody class="cart_items">
											
                                                 <tr>
                                                    <td>
														<div style="width: 100%;">
												     		<p class="text-center">Aucun article dans votre panier.</p>
														</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
										  <?php }  ?>
										               <table>
                                            <tbody class="">
											<tr></tr>
                                                   <tr class="total">
                                                    <td colspan="2">Total:</td>
                                                    <td class="total_cart"> € <?php echo  number_format($totalCart, 2, ',', '') ;?></td>
                                                </tr>
                                                    <td colspan="3" class="d-flex justify-content-center">
                                                        <div class="cart-button">
                                                            <a href="<?php echo base_url().'cart';?>" title="Voir panier" class="view_cart">Voir panier </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- main content -->
    <div class="main-content" >
     
<?php echo $contents;?>
        <!-- main -->
        
    </div>

    <!-- footer -->
     <footer class="footer-one"  >
        <div class="inner-footer"style="background-image: url('<?php echo base_url().'template/';?>img/footer.png');">
            <div class="container">
                <div class="footer-top col-lg-12 col-xs-12">
                    <div class="row">
                       <div class="col-lg-3 col-md-6 col-xs-6 col-mxl-6">
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
						   <div class="col-lg-3 col-md-6 col-xs-6 col-mxl-6">
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
							 <div class="footer-logo">
							 <img src="<?php echo base_url().'template/';?>img/img_1.png" alt="Image">
							 </div>
                         </div>
						   <div class="tiva-modules col-lg-3 col-md-6">
                            <div class="block m-top contact">
                                <div class="block-content">
                                    <div class="title-block">Contactez nous</div>
                                    <div class="sub-title">
									<form id="customer-form" action="#" method="post">
                                <div>
								 <div class="form-group no-gutters">
                                        <input class="form-control" name="name" type="text" placeholder="Nom & Prénom">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <input class="form-control" name="email" type="email" placeholder="Adresse email">
                                    </div>
                                   
                                    <div class="form-group no-gutters">
                                        <input class="form-control" name="subject" type="text" placeholder="Sujet">
                                    </div>
									<div class="form-group no-gutters">
                                  
									<textarea id="story" name="story" rows="3" cols="33"></textarea>

								  </div>

                                </div>
                                <div class="clearfix">
                                    <div class="text-left no-gutters">
                                       <button class="btn btn-primary send-contact"  type="submit">
                                            Envoyer
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
            </div>
        </div>
        <div id="tiva-copyright">
            <div class="container">
                <div class="row">
                    <div class="text-center col-lg-12 ">
                        <span>
							<a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- back top top -->
    <div class="back-to-top">
        <a href="#">
            <i class="fa fa-long-arrow-up"></i>
        </a>
    </div>

    <!-- menu mobie left -->
    <div class="mobile-top-menu d-md-none">
        <button type="button" class="close" aria-label="Close">
            <i class="zmdi zmdi-close"></i>
        </button>
        <div class="tiva-verticalmenu block" data-count_showmore="17">
            <div class="box-content block-content">
                <div class="verticalmenu" role="navigation">
                    <ul class="menu level1">
					 <li class="item  parent">
                            <a href="<?php echo base_url();?>" class="hasicon" title="Accueil">
                             Accueil</a>
                          
                         
                        </li>
						 <?php foreach ($categories_list as $categorie): ?>
                        <li class="item  parent">
                            <a href="<?php echo base_url().'products/categorie/'.$categorie->categorie_id.'-'.strtolower(url_title($categorie->categorie_name));;?>" class="parent" class="hasicon" title="<?php echo $categorie->categorie_name;?>">
                            <?php echo $categorie->categorie_name;?></a>
                          
                         
                        </li>
						<?php endforeach; ?>
						
                               									
								 
								
                               
								</ul>
                </div>
            </div>
        </div>
    </div>

    <!-- menu mobie right -->
    <div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up active d-md-none">
        <div class="content-boxpage col">
            <div class="box-header d-flex justify-content-between align-items-center">
                <div class="title-box">Menu</div>
                <div class="close-box">Close</div>
            </div>
            <div class="box-content">
                <nav>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div id="megamenu" class="clearfix">
                        <ul class="menu level1">
                            <li class="item home-page has-sub">
                                <span class="arrow collapsed" data-toggle="collapse" data-target="#home1" aria-expanded="true" role="status">
                                    <i class="zmdi zmdi-minus"></i>
                                    <i class="zmdi zmdi-plus"></i>
                                </span>
                                <a href="index-2.html" title="Home">
                                    <i class="fa fa-home" aria-hidden="true"></i>Home</a>
                                <div class="subCategory collapse" id="home1" aria-expanded="true" role="status">
                                    <ul>
                                        <li class="item">
                                            <a href="index-2.html" title="Home Page 1">Home Page 1</a>
                                        </li>
                                        <li class="item">
                                            <a href="home2.html" title="Home Page 2">Home Page 2</a>
                                        </li>
                                        <li class="item">
                                            <a href="home3.html" title="Home Page 3">Home Page 3</a>
                                        </li>
                                        <li class="item">
                                            <a href="home4.html" title="Home Page 4">Home Page 4</a>
                                        </li>
                                        <li class="item">
                                            <a href="home5.html" title="Home Page 5">Home Page 5</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="item has-sub">
                                <span class="arrow collapsed" data-toggle="collapse" data-target="#blog" aria-expanded="false" role="status">
                                    <i class="zmdi zmdi-minus"></i>
                                    <i class="zmdi zmdi-plus"></i>
                                </span>
                                <a href="#" title="Blog">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>Blog</a>

                                <div class="subCategory collapse" id="blog" aria-expanded="true" role="status">
                                    <ul>
                                        <li class="item">
                                            <a href="blog-list-sidebar-left.html" title="Blog List (Sidebar Left)">Blog List (Sidebar Left)</a>
                                        </li>
                                        <li class="item">
                                            <a href="blog-list-sidebar-left2.html" title="Blog List (Sidebar Left) 2">Blog List (Sidebar Left) 2</a>
                                        </li>
                                        <li class="item">
                                            <a href="blog-list-sidebar-right.html" title="Category Blog (Right column)">Blog List (Sidebar Right)</a>
                                        </li>
                                        <li class="item">
                                            <a href="blog-list-no-sidebar.html" title="Blog List (No Sidebar)">Blog List (No Sidebar)</a>
                                        </li>
                                        <li class="item">
                                            <a href="blog-grid-no-sidebar.html" title="Blog Grid (No Sidebar)">Blog Grid (No Sidebar)</a>
                                        </li>
                                        <li class="item">
                                            <a href="blog-detail.html" title="Blog Detail">Blog Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="item group has-sub">
                                <span class="arrow collapsed" data-toggle="collapse" data-target="#page" aria-expanded="false" role="status">
                                    <i class="zmdi zmdi-minus"></i>
                                    <i class="zmdi zmdi-plus"></i>
                                </span>
                                <a href="#" title="Page">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>page</a>
                                <div class="subCategory collapse" id="page" aria-expanded="true" role="status">
                                    <ul class="group-page">
                                        <li class="item container group">
                                            <div>
                                                <ul>
                                                    <li class="item col-md-4 ">
                                                        <span class="menu-title">Category Style</span>
                                                        <div class="menu-content">
                                                            <ul class="col">
                                                                <li>
                                                                    <a href="product-grid-sidebar-left.html">Product Grid (Sidebar Left)</a>
                                                                </li>
                                                                <li>
                                                                    <a href="product-grid-sidebar-right.html">Product Grid (Sidebar Right)</a>
                                                                </li>
                                                                <li>
                                                                    <a href="product-list-sidebar-left.html">Product List (Sidebar Left) </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="item col-md-4 html">
                                                        <span class="menu-title">Product Detail Style</span>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li>
                                                                    <a href="product-detail.html">Product Detail (Sidebar Left)</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Product Detail (Sidebar Right)</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="item col-md-4 html">
                                                        <span class="menu-title">Bonus Page</span>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li>
                                                                    <a href="404.html">404 Page</a>
                                                                </li>
                                                                <li>
                                                                    <a href="about-us.html">About Us Page</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="item has-sub">
                                <a href="contact.html" title="Contact us">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>Contact us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page Loader -->
   
    <!-- Vendor JS -->
    <script src="<?php echo base_url().'template/';?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/popper/popper.min.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/owl-carousel/owl.carousel.min.js"></script>
   <script src="<?php echo base_url().'template/';?>js/jquery.bootstrap-touchspin.min.js"></script>
	
    <!-- Template JS -->
    <script src="<?php echo base_url().'template/';?>js/theme.js"></script>
	<script type="text/javascript">
	var base_url ='<?php echo base_url();?>';
	</script>
	<script src="<?php echo base_url().'template/';?>js/app.js"></script>
</body>



</html>