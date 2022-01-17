<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="zxx">
<head >
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> <?=$setting->page_title;?> </title>
	<meta name="keywords" content="<?php echo $setting->page_meta_keywords;?>" />
	<meta name="description" content="<?php echo $setting->page_meta_description;?>" />

  

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'template/img';?>/icone.png" />
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
    <header >
        <!-- header left mobie -->
									<?php $bannier_top = $this->M_banners->get_bannier_top();?>	   
						  <?php if($bannier_top){ ?>
						<div class="show_mobile">
						  <img class="img-fluid "  src="<?php echo base_url().'admines/medias/banners/'.$bannier_top->banner_picture;?>" alt="" >
						  </div>
						  <?php } ?>
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
                                    <span> </span>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </div>
                        <?php $this->load->view('views_menus/menu_compte_mobile.php');?>
   
      
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
													<?php if($items['options']['product']->roduct_entier_association){  ?>
													<a href="#"><img src="<?php echo $path ;?>" alt="<?php echo  $items['options']['product']->product_name;?>"></a>
													<?php  } else {  ?>
													<a href="<?php echo base_url().'products/show/'.$items['options']->product_name.'-'.strtolower(url_title($items['options']['product']->product_name));?>"><img src="<?php echo $path ;?>" alt="<?php echo  $items['name'];?>"></a>
													
													<?php  }  ?></td>
													<td>
													 <?php if($items['options']['product']->product_entier_association){  ?>
													<div class="product-name"><a href="#"><?php echo  $items['name'];?></a></div>
													<?php  } else {  ?>
													<div class="product-name"><a href="<?php echo base_url().'products/show/'.$items['options']->product_name.'-'.strtolower(url_title($items['options']->product_name));?>"><?php echo  $items['options']['product']->product_name;?></a></div>
			
													<?php  }  ?>
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
			<!-- block Info -->

<!-- end block Info -->
        </div>
			<?php $this->load->view('views_modals/addcarte.php');?>
  
    <!-- header desktop -->
         <!-- header desktop -->
        <div class="header-top d-xs-none " style="position:relative">
		
            <div class="container container_pc">
			
                <div class="row">
				<div class="col-sm-12 col-md-12  col-lg-12 ">
				<?php $this->load->view('views_menus/blockInfo.php');?> </div>
                    <!-- logo -->
                    <div class="col-sm-2 col-md-2  col-lg-2 d-flex align-items-center menu-pc">
                        <div id="logo">
                            <a href="<?php echo base_url();?>">
                                <img  src="<?php echo base_url().'template/';?>img/logo_go_ferme_halal.png" alt="logo">
                            </a>
                        </div>
                    </div>

                    <!-- menu -->
                  <div class="main-menu col-sm-8 col-md-8 col-lg-7 align-items-center justify-content-center navbar-expand-md ">
										   
				<?php $bannier_top = $this->M_banners->get_bannier_top();?>
										   
						  <?php if($bannier_top){ ?>
						
						  <img class="img-fluid bannier-top"  src="<?php echo base_url().'admines/medias/banners/'.$bannier_top->banner_picture;?>" alt="" >
						  <?php } ?>
                    </div>

                    <!-- search-->
               <div id="user_compte" class="col-sm-2 col-md-2  col-lg-3 align-items-center justify-content-end d-flex">

				
				
                        <!-- acount  -->
                         <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                              <?php if(($this->session->userdata('logged_in'))!= 1) { ?>
							   <div class="myaccount-title">
                            
     <a href="<?php echo base_url().'accounts';?>"  class="acount">
                                    <span> <i class="fa fa-user" aria-hidden="true"></i> Mon compte</span>
                                  <div class="user_info"> Indentifier-vous </div>
                                </a>
								</div>
      <?php }else{ ?>
	   <div class="myaccount-title" style="top: -8px;">
                                <a href="#acount" data-toggle="collapse" class="acount" aria-expanded="true">
                                    <span> <i class="fa fa-user" aria-hidden="true"></i> Mon compte</span>
                                    <i class="fa fa-angle-down " aria-hidden="true" style="display:none;position: absolute;top: 5px;"></i>
                                </a>
                            </div>
                 <?php $this->load->view('views_menus/menu_compte.php');?>
      
      <?php } ?>
                            </div>
                          <div class="desktop_cart">
                            <div class="blockcart block-cart cart-preview tiva-toggle">
                                <div class="header-cart tiva-toggle-btn">
                                  <a href="<?php echo base_url().'cart';?>">  
                            <img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/panier-icon.png" alt="" >   Mon panier
								   		<div class="user_info"> <span class="cart-products-count "><?php if(count($this->cart->contents())==0){ echo 'Aucun article'; } else { echo count($this->cart->contents()).' article(s)';}?></span> </div>
									
									</a>
								</div>
                                 <div class="dropdown-content">
                                          <div class="cart-content">
                                       
						 <?php $this->load->view('views_menus/cart-content.php');?>
							
                                    </div>
                        </div>

                            </div>
                        </div>
                    </div>
                </div>
       <!-- MENU -->
<?php $this->load->view('views_menus/index.php');?>
<!-- end menu -->

<!-- block Info -->

<!-- end block Info -->






		  </div>
        </div>
    </header>

    <!-- main content -->
    <div class="main-content" >
     
<?php echo $contents;?>
        <!-- main -->
        
    </div>

    <!-- footer -->
    <?php $this->load->view('views_footer/footer.php');?>
    <!-- back top top -->
    <div class="back-to-top">
        <a href="#">
            <i class="fa fa-long-arrow-up"></i>
        </a>
    </div>

    <!-- menu mobie left -->
    <div class="mobile-top-menu d-md-none">
		<?php $this->load->view('views_menus/mobile-top-menu.php');?>
      
    </div>

    <!-- menu mobie right -->
 
    <!-- Page Loader -->
   
    <!-- Vendor JS -->
    <script src="<?php echo base_url().'template/';?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/popper/popper.min.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/nivo-slider/js/jquery.nivo.slider.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/owl-carousel/owl.carousel.min.js"></script>
    

	 <script src="<?php echo base_url().'template/';?>js/jquery.bootstrap-touchspin.min.js"></script>
	
	
    <!-- Template JS -->
    <script src="<?php echo base_url().'template/';?>js/theme.js"></script>
	<script type="text/javascript">
	var base_url ='<?php echo base_url();?>';
	</script>
	<script src="<?php echo base_url().'template/';?>js/app.js"></script>
	<style>.main-menu {
     padding-left: 0px!important; 
}</style>
<?php $this->load->view('views_footer/cookiebanner.php');?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <!-- Initialize Swiper -->
	
		 <style>
  

      .swiper-container {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
	  .swiper-container {
    height: 100%;
    width: 100%;
}

.swiper-slide {
    background-color: #000;
    background-position: center;
    background-size: cover;
}
    </style>
    <script>
      var swiper = new Swiper(".mySwiper", {
		   effect: 'flip',
    grabCursor: true,
    flipEffect: {
        rotate: 230,
        slideShadows: true,
    },
        spaceBetween: 10,
		speed: 10,
       autoplay: {
    delay: 3000,
  },
      });
	  
	  var swiper = new Swiper('.swiper-container', {
    effect: 'flip',
    grabCursor: true,
    flipEffect: {
        rotate: 230,
        slideShadows: true,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    }
});
    </script>
</body>



</html>