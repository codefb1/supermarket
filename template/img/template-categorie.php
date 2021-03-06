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
	
	  <?php if($categorie){  ?>
	                               
   	<title> <?=$categorie->categorie_meta_title;?> </title>
<meta name="keywords" content="<?php echo $categorie->categorie_meta_keywords;?>" />
		<meta name="description" content="<?php echo $categorie->categorie_meta_description;?>" />
	

								     <?php } else if($subCategorie) { ?>
										     	<title> <?=$subCategorie->categorie_meta_title;?> </title>
<meta name="keywords" content="<?php echo $subCategorie->categorie_meta_keywords;?>" />
		<meta name="description" content="<?php echo $subCategorie->categorie_meta_description;?>" />
	
										
										   <?php }else if($product) { ?>
										     	<title> <?=$product->product_meta_title;?> </title>
<meta name="keywords" content="<?php echo $product->product_meta_keywords;?>" />
		<meta name="description" content="<?php echo $product->product_meta_description;?>" />
	
										
										   <?php } else { ?>
										     	<title> <?=$setting->page_title;?> </title>
<meta name="keywords" content="<?php echo $setting->page_meta_keywords;?>" />
		<meta name="description" content="<?php echo $setting->page_meta_description;?>" />
	
										    <?php } ?>
 
  
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
 <link rel="icon" type="image/x-icon" href="<?php echo base_url().'template/img';?>/favicon-16x16.png" />
   
    <!--
   
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/font-material/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/nivo-slider/css/nivo-slider.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/nivo-slider/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/nivo-slider/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/owl-carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url().'template/';?>libs/slider-range/css/jslider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/css/';?>jquery.bootstrap-touchspin.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>css/reponsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>css/mobile.css">

	
    <!-- Template CSS -->
    
</head>

<body id="<?php echo $body;?>">
    <header>
        <!-- header left mobie -->
		<?php $bannier_top = $this->M_banners->get_bannier_top();?>
		  <?php if($bannier_top){ ?>
						<!--<div class="show_mobile">
						  <img class="img-fluid "  src="<?php echo base_url().'admines/medias/banners/'.$bannier_top->banner_picture;?>" alt="" >
						  </div>-->
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
                        <img class="logo-mobile img-fluid" src="<?php echo base_url().'template/';?>img/logo_mobile.jpg" alt="">
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
													<div><?php echo $items['qty'];?> x<span class="product-price">??? <?php if ($items['price']>0){  echo number_format($items['price']*$items['qty'], 2, ',', '');} else {echo "N.D";}?></span></div>
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
                                                    <td class="total_cart"> ??? <?php echo  number_format($totalCart, 2, ',', '') ;?></td>
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
  			<?php $this->load->view('views_modals/addcarte.php');?>
  
    <!-- header desktop -->
         <!-- header desktop -->
            <div class="header-top d-xs-none " style="position:relative">
		
            <div class="container container_pc">
			 <div class="row">
			   <div class="col-sm-3 col-md-3  col-lg-3 d-flex align-items-center paiement_header" >
                        <div id="">
                            
                             <span style="font-size: 13px;"> Paiement par </span> 
							 <img  class="sepatauer"  src="<?php echo base_url().'template/';?>img/sepatauer.png" alt="Mode de paiement" title="Mode de paiement">  
							 <img  class=""  src="<?php echo base_url().'template/';?>img/les-cartes.png" alt="Mode de paiement" title="Mode de paiement">
                            
                        </div>
                    </div>
					 <div class="main-menu col-sm-6 col-md-6 col-lg-6 align-items-center justify-content-center navbar-expand-md " >

                    </div>
					     <div id="user_compte" class="col-sm-3 col-md-3  col-lg-3 align-items-center justify-content-end d-flex">

				
				
                        <!-- acount  -->
                         <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                              <?php if(($this->session->userdata('logged_in'))!= 1) { ?>
							   <div class="myaccount-title">
                            
     <a href="<?php echo base_url().'accounts';?>"  class="acount acount_header">
                                    <span style="color: #fff!important;font-weight: normal!important;font-size: 13px!important;">  Mon compte</span>
                                 
                                </a>
								</div>
      <?php }else{ ?>
	   <div class="myaccount-title" style="top: 0px;">
                                <a href="#acount" data-toggle="collapse" class="acount acount_header" aria-expanded="true">
                                    <span style="color: #fff!important;font-weight: normal!important;font-size: 13px!important;">  Mon compte</span>
                                    
                                </a>
                            </div>
                 <?php $this->load->view('views_menus/menu_compte.php');?>
      
      <?php } ?>
                            </div>
                          <div class="desktop_cart">
                            <div class="blockcart block-cart cart-preview tiva-toggle">
                                <div class="header-cart tiva-toggle-btn">
                                  <a href="<?php echo base_url().'cart';?>"  class="carte_header" style="color: #d64652!important;">  Mon panier
								   		
									</a>
									<div class="user_info" style="top: 17px;"> <span class="cart-products-count "><?php if(count($this->cart->contents())==0){ echo 'Aucun article'; } else { echo count($this->cart->contents()).' article(s)';}?></span> </div>
									
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
                <div class="row">
				<!--<div class="col-sm-12 col-md-12  col-lg-12 ">
				<?php $this->load->view('views_menus/blockInfo.php');?> </div>-->
                    <!-- logo -->
                  
                    <!-- menu -->
                  <div class="main-menu col-sm-12 col-md-12 col-lg-12 align-items-center justify-content-center navbar-expand-md " style="text-align: center;margin-bottom: 20px;">
										   
							   
						  
						 <img  src="<?php echo base_url().'template/';?>img/logo.jpg" alt="logo" title ="">
						 
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
    
    <script src="<?php echo base_url().'template/';?>libs/slider-range/js/tmpl.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/slider-range/js/jquery.dependClass-0.1.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/slider-range/js/draggable-0.1.js"></script>
    <script src="<?php echo base_url().'template/';?>libs/slider-range/js/jquery.slider.js"></script>
	 <script src="<?php echo base_url().'template/';?>js/jquery.bootstrap-touchspin.min.js"></script>
	
	
    <!-- Template JS -->
    <script src="<?php echo base_url().'template/';?>js/theme.js"></script>
	<script type="text/javascript">
	var base_url ='<?php echo base_url();?>';
	<?php if($menu){  ?>
	var menu= "<?php echo $menu;?>";
 $( ".categ_"+menu).click();
	<?php } ?>
	<?php if($subCategorieId){  ?>
	var subCategorieId= "<?php echo $subCategorieId;?>";
 $( ".catg_"+subCategorieId).addClass('blod');
	<?php } ?>
		
    $("input[name='qty']").TouchSpin({
        min: 0,
        max: 100,
        boostat: 5,
        maxboostedstep: 10,
		 verticalbuttons: true,
      verticalupclass: 'glyphicon glyphicon-plus',
      verticaldownclass: 'glyphicon glyphicon-minus'
    });

$("input[name='qtyUp']").TouchSpin({
           verticalbuttons: true
    });
	
	$(".filtre_products").change(function() {
		var check= 1;
		var type = $( this ).attr('data-type');
		var search = $( this ).attr('data-search');
    if(this.checked) {
        //Do stuff
		 check= 2;
    }
	
		 jQuery.ajax({
    url: base_url+"products/filtre",
    data: {check:check,type:type,search:search},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     location.reload();
	   }
	});
});

	$(".filtre_certif").change(function() {
		var certif = []; // initialize array
		var search = $( this ).attr('data-search');
    $('.filtre_certif').each(function() {
       if ($(this).is(":checked")) {
           certif.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"products/filtre_certif",
    data: {certif:certif,search:search},
    dataType: "json",
    type: "POST",
       success: function(data) {
		       location.reload();
	   }
	});
});
	$(".all_filtre_categorie").change(function() {
		var categorie = []; // initialize array
    $('.all_filtre_categorie').each(function() {
       if ($(this).is(":checked")) {
           categorie.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"products/all_filtre_categorie",
    data: {categorie:categorie},
    dataType: "json",
    type: "POST",
       success: function(data) {
		       location.reload();
	   }
	});
});

	$(".check_all").change(function() {
	
		var name = $( this ).attr('data-name');
	
    if(this.checked) {
        //Do stuff
			 jQuery.ajax({
    url: base_url+"products/vide_filtre",
    data: {name:name},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     //location.reload();
			   window.location.href = base_url+"products";
	   }
	});
    }
	
	
});
$(".check_all_product_clear").change(function() {
	
		var name = $( this ).attr('data-name');
	
           categorie="";
        //Do stuff
			 jQuery.ajax({
    url: base_url+"products/all_filtre_categorie",
    data: {categorie:categorie},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     location.reload();
	   }
	});
    
	
	
});
	 	$(".all_filtre_sub_categorie").change(function() {
		var parent_id = []; // initialize array
    $('.all_filtre_sub_categorie').each(function() {
       if ($(this).is(":checked")) {
           parent_id.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"categories/all_filtre_sub_categorie",
    data: {parent_id:parent_id},
    dataType: "json",
    type: "POST",
       success: function(data) {
		       location.reload();
	   }
	});
});
$(".check_all_sub_catego_clear").change(function() {
	
	
           parent_id="";
        //Do stuff
			 jQuery.ajax({
    url: base_url+"categories/all_filtre_sub_categorie",
    data: {parent_id:parent_id},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     location.reload();
	   }
	});
    
	
	
});
	$(".all_filtre_categories").change(function() {
		var categorie = []; // initialize array
    $('.all_filtre_categories').each(function() {
       if ($(this).is(":checked")) {
           categorie.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"products/all_filtre_categorie",
    data: {categorie:categorie},
    dataType: "json",
    type: "POST",
       success: function(data) {
		      window.location.href = base_url+"products";
	   }
	});
});
	$(".filtre_index__certif").change(function() {
		var certif = []; // initialize array
		var search = $( this ).attr('data-search');
    $('.filtre_index__certif').each(function() {
       if ($(this).is(":checked")) {
           certif.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"products/filtre_certif",
    data: {certif:certif,search:search},
    dataType: "json",
    type: "POST",
       success: function(data) {
		        window.location.href = base_url+"products";
	   }
	});
});
	$(".filtre_index_products").change(function() {
		var check= 1;
		var type = $( this ).attr('data-type');
		var search = $( this ).attr('data-search');
    if(this.checked) {
        //Do stuff
		 check= 2;
    }
	
		 jQuery.ajax({
    url: base_url+"products/filtre",
    data: {check:check,type:type,search:search},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     window.location.href = base_url+"products";
	   }
	});
	
	
});

$(".filtre_certif_solde").change(function() {
		var certif = []; // initialize array
		var search = $( this ).attr('data-search');
    $('.filtre_certif_solde').each(function() {
       if ($(this).is(":checked")) {
           certif.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"products/filtre_certif_solde",
    data: {certif:certif,search:search},
    dataType: "json",
    type: "POST",
       success: function(data) {
		       location.reload();
	   }
	});
});


	$(".filtre_products_solde").change(function() {
		var check= 1;
		var type = $( this ).attr('data-type');
		var search = $( this ).attr('data-search');
    if(this.checked) {
        //Do stuff
		 check= 2;
    }
	
		 jQuery.ajax({
    url: base_url+"products/filtre_solde",
    data: {check:check,type:type,search:search},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     location.reload();
	   }
	});
});


	$(".all_filtre_categorie_solde").change(function() {
		var categorie = []; // initialize array
    $('.all_filtre_categorie_solde').each(function() {
       if ($(this).is(":checked")) {
           categorie.push($(this).val());
       }
    });

	

		 jQuery.ajax({
    url: base_url+"products/all_filtre_categorie_solde",
    data: {categorie:categorie},
    dataType: "json",
    type: "POST",
       success: function(data) {
		       location.reload();
	   }
	});
});


$(".check_all_solde").change(function() {
	
		var name = $( this ).attr('data-name');
	
    if(this.checked) {
        //Do stuff
			 jQuery.ajax({
    url: base_url+"products/vide_filtre_solde",
    data: {name:name},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     location.reload();
			   
	   }
	});
    }
	
	
});
$(".check_all_product_clear_solde").change(function() {
	
		var name = $( this ).attr('data-name');
	
           categorie="";
        //Do stuff
			 jQuery.ajax({
    url: base_url+"products/all_filtre_categorie_solde",
    data: {categorie:categorie},
    dataType: "json",
    type: "POST",
       success: function(data) {
		     location.reload();
	   }
	});
	});
	$(".checkIdCategorie").click(function() {

	var id = $( this ).attr('data-id');
	$( ".sub_categorie_"+id).click();
		
	 });
	 
	 	
	 
	 	$(".checkIdCertification").click(function() {

	var id = $( this ).attr('data-id');
	$( ".certification_"+id).click();
		
	 });
	 $(".checkIdLabels").click(function() {

	var id = $( this ).attr('data-id');
	$( ".labels_"+id).click();
		
	 });
</script>
	</script>
	<script src="<?php echo base_url().'template/';?>js/app.js"></script>
	<?php $this->load->view('views_footer/cookiebanner.php');?>

</body>



</html>