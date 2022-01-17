<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GO-Laferme </title>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

<!-- bootstrap framework -->
<link href="<?php echo base_url().'template/';?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- font awesome icons -->
<link href="<?php echo base_url().'template/';?>assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
<!-- ionicons -->
<link href="<?php echo base_url().'template/';?>assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen">
<!-- flags -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/icons/flags/flags.css">
<!-- login -->
<link href="<?php echo base_url().'template/';?>assets/css/login.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url().'template/';?>imgages/icone.png" />
	<!-- page specific stylesheets -->
    
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/iCheck/skins/minimal/green.css">
				
<!-- main stylesheet -->
<link href="<?php echo base_url().'template/';?>assets/css/style_partener.css" rel="stylesheet" media="screen">
		
<!-- google webfonts -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin' rel='stylesheet' type='text/css'>
		
<!-- moment.js (date library) -->
<script src="<?php echo base_url().'template/';?>assets/lib/moment-js/moment.min.js"></script>

<!-- datepicker -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/bootstrap-datepicker/css/datepicker3.css">
<!-- date range picker -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/bootstrap-daterangepicker/daterangepicker-bs3.css">
<!-- timepicker -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<!-- ion.rangeSlider -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/ion.rangeSlider/css/ion.rangeSlider.css">
<!-- bootstrap switches -->
<link href="<?php echo base_url().'template/';?>assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
<!-- 2col multiselect -->
<link href="<?php echo base_url().'template/';?>assets/lib/multi-select/css/multi-select.css" rel="stylesheet">
<!-- multiselect, tagging -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/select2/select2.css">
		
<!-- magnific popup -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/magnific-popup/magnific-popup.css">
<!-- nvd3 charts -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/novus-nvd3/nv.d3.min.css">
<!-- owl carousel -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/owl-carousel/owl.carousel.css">
<!-- datatables -->
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/DataTables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
<link rel="stylesheet" href="<?php echo base_url().'template/';?>assets/lib/DataTables/extensions/Scroller/css/dataTables.scroller.min.css">
<!-- jQuery -->
<script src="<?php echo base_url().'template/';?>assets/js/jquery.min.js"></script>
</head>

<body style="background-image: url(<?php echo base_url().'template/';?>images/bg.jpg);">

<!-- top bar -->
<header class="navbar navbar-fixed-top" role="banner">
   <div class="logo logo_partenert" >
    
	<a href="<?php echo base_url().'comptedPartener'?>" class="navbar-brand-parteners" ><img src="<?php echo base_url().'template/';?>assets/img/logo-tablete.jpg" alt="" class=""></a> 
 </div> 
  <div class="container-fluid">
  
    <div class="navbar-header" style=" width: 100%;position: absolute;top: 18px;"> <h2 class="page_title" style="text-align: center;font-weight: bolder;"> <?php echo $partener->partener_lastname;?> <?php echo $partener->partener_city;?> </h2></div>

    <ul class=" nav navbar-nav navbar-right ">
	   <li ><a href="#"><img src="<?php echo base_url().'template/';?>assets/img/notify-icon.png" alt="notifecation" class="notify"> <span class="badge badge-notify counts-new-ordres">0</span></a></li>
     
	    <li id="border_left"><a href="#"><img src="<?php echo base_url().'template/';?>assets/img/setting-icon.png" alt="Réglage" class="setting"></a></li>
     
         <li id="border_left"><a href="<?php echo base_url().'authentification/system_logout/';?>"><img src="<?php echo base_url().'template/';?>assets/img/logout-icone.png" alt="Déconnection" class="logout"></a></li>
       
	   </ul>
	   
  </div>
</header>

<!-- main content -->

<div id="main_wrapper">
  <div class="page_content">
    <div class="container-fluid"> <?php echo $contents;?> </div>
  </div>
</div>

<!-- side navigation-->

<nav id="side_nav">
  <ul>
    <li class="home-menu opacity-menu <?php if($menu=='home'){echo 'is_opacity';}?> " > <a href="<?php echo base_url().'comptedPartener/';?>">
	
	<img src="<?php echo base_url().'template/';?>assets/img/Acceuil.png" alt="Acceuil" class="">

	<span class="nav_title">Accueil</span><span class="glyphicon glyphicon-play  icone-flesh flesh-home <?php if($menu=='home'){echo 'show';} else {echo 'hidden';}?> "></a> 
	</li>
    <!--Companies-->

	
	 <li class="orders-menu opacity-menu <?php if($menu=='orders'){echo 'is_opacity';}?>"> <a href="<?php echo base_url().'comptedPartener/newOrders/';?>"> <img  src="<?php echo base_url().'template/';?>assets/img/commande-icon.png" alt="Commandes" class=""><span class="nav_title">Commandes</span> <span class="glyphicon glyphicon-play  icone-flesh flesh-orders <?php if($menu=='orders'){echo 'show';} else {echo 'hidden';}?> "></a>
    
    </li>

	<li class="hidden"> <a href="#"> <span class="ion-ios7-contact-outline"></span> <span class="nav_title">Archive des  commandes livrés</span> </a>
    
    </li>
	
	<li class="products-menu opacity-menu <?php if($menu=='products'){echo 'is_opacity';}?>"> <a href="<?php echo base_url().'comptedPartener/products/';?>"> <img  src="<?php echo base_url().'template/';?>assets/img/produit.png" alt="Produit" class=""><span class="nav_title">Produits</span> <span class="glyphicon glyphicon-play icone-flesh flesh-products <?php if($menu=='products'){echo 'show';} else {echo 'hidden';}?> "></a>
    
    </li>
	
	 
      <li class="factures-menu opacity-menu <?php if($menu=='factures'){echo 'is_opacity';}?>"> <a href="<?php echo base_url().'comptedPartener/factures/';?>"> <img  src="<?php echo base_url().'template/';?>assets/img/Facture.png" alt="Factures" class=""><span class="nav_title">Factures</span> <span class="glyphicon glyphicon-play icone-flesh flesh-factures <?php if($menu=='factures'){echo 'show';} else {echo 'hidden';}?> "></a>
    
    </li>
       <li class="payments-menu opacity-menu <?php if($menu=='payments'){echo 'is_opacity';}?>"> <a href="<?php echo base_url().'comptedPartener/payments/';?>"> <img  src="<?php echo base_url().'template/';?>assets/img/comptabilité.png" alt="Mes paiments" class=""><span class="nav_title">Mes paiments</span> <span class="glyphicon glyphicon-play icone-flesh flesh-payments <?php if($menu=='payments'){echo 'show';} else {echo 'hidden';}?> "></a>
    
    </li>
     
   </li>
       <li class="compte-menu opacity-menu <?php if($menu=='compte'){echo 'is_opacity';}?>"> <a href="#"> <img  src="<?php echo base_url().'template/';?>assets/img/account-icon.png" alt="Mon compte" class=""><span class="nav_title">Mon compte</span> <span class="glyphicon glyphicon-play icone-flesh flesh-compte <?php if($menu=='compte'){echo 'show';} else {echo 'hidden';}?> "></a>
    
    </li>
	    
	
	
     
    <!--Campaign -->

    </li>
 

  </ul>
</nav>

<!-- right slidebar -->


<!-- easing --> 
<script src="<?php echo base_url().'template/';?>assets/js/jquery.easing.1.3.min.js"></script> 
<!-- bootstrap js plugins --> 
<script src="<?php echo base_url().'template/';?>assets/bootstrap/js/bootstrap.min.js"></script> 
 <script src="<?php echo base_url().'template/';?>tinymce.min.js" ></script>
   
<!-- top dropdown navigation --> 
<script src="<?php echo base_url().'template/';?>assets/js/tinynav.js"></script> 
<!-- perfect scrollbar --> 
<script src="<?php echo base_url().'template/';?>assets/lib/perfect-scrollbar/min/perfect-scrollbar-0.4.8.with-mousewheel.min.js"></script> 

<!-- common functions --> 
<script src="<?php echo base_url().'template/';?>assets/js/tisa_common.js"></script> 

<!-- style switcher  
<script src="<?php echo base_url().'template/';?>assets/js/tisa_style_switcher.js"></script>--> 

<!-- page specific plugins -->

<!-- listNav -->
<script src="<?php echo base_url().'template/';?>assets/lib/jquery-listnav/dist/js/jquery-listnav-2.4.0.min.js"></script>
<!-- quicksearch -->
<script src="<?php echo base_url().'template/';?>assets/js/jquery.quicksearch.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url().'template/';?>assets/lib/iCheck/jquery.icheck.min.js"></script>
		
<!-- user list functions -->
<script src="<?php echo base_url().'template/';?>assets/js/apps/tisa_user_list.js"></script>

<!-- power tooltips -->
<script src="<?php echo base_url().'template/';?>assets/lib/powertip/jquery.powertip.min.js"></script>
		
<!-- tooltips, popovers functions -->
<script src="<?php echo base_url().'template/';?>assets/js/apps/tisa_tooltips.js"></script> 

<!--  datepicker -->
<script src="<?php echo base_url().'template/';?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- date range picker -->
<script src="<?php echo base_url().'template/';?>assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- timepicker -->
<script src="<?php echo base_url().'template/';?>assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<!-- ion.rangeSlider -->
<script src="<?php echo base_url().'template/';?>assets/lib/ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<!--  bootstrap switches -->
<script src="<?php echo base_url().'template/';?>assets/lib/bootstrap-switch/build/js/bootstrap-switch.min.js"></script>
<!--  2col multiselect -->
<script src="<?php echo base_url().'template/';?>assets/lib/multi-select/js/jquery.multi-select.js"></script>
<!-- multiselect, tagging -->
<script src="<?php echo base_url().'template/';?>assets/lib/select2/select2.min.js"></script>
<!-- textarea autosize -->
<script src="<?php echo base_url().'template/';?>assets/lib/autosize/jquery.autosize.min.js"></script>
<!-- masked inputs -->
<script src="<?php echo base_url().'template/';?>assets/lib/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
	
<!-- form extended elements functions -->
<script src="<?php echo base_url().'template/';?>assets/js/apps/tisa_extended_elements.js"></script>
<!-- parsley.js validation--> 
<script src="<?php echo base_url().'template/';?>assets/lib/Parsley.js/dist/parsley.js"></script> 
  
<!-- wysiwg editor --> 
 

<!-- form validation functions --> 
<script src="<?php echo base_url().'template/';?>assets/js/apps/tisa_validation.js"></script> 

<!-- nvd3 charts --> 
<script src="<?php echo base_url().'template/';?>assets/lib/d3/d3.min.js"></script> 
<script src="<?php echo base_url().'template/';?>assets/lib/novus-nvd3/nv.d3.min.js"></script> 
<!-- flot charts--> 
<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.min.js"></script> 
<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.pie.min.js"></script> 
<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.resize.min.js"></script> 
<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.tooltip.min.js"></script> 
<!-- clndr --> 
<script src="<?php echo base_url().'template/';?>assets/lib/underscore-js/underscore-min.js"></script> 
<script src="<?php echo base_url().'template/';?>assets/lib/CLNDR/src/clndr.js"></script> 
<!-- easy pie chart --> 
<script src="<?php echo base_url().'template/';?>assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script> 
<!-- owl carousel --> 

<!-- jQuery -->
		<script src="<?php echo base_url().'template/';?>assets/js/jquery.min.js"></script>
		<!-- easing -->
		<script src="<?php echo base_url().'template/';?>assets/js/jquery.easing.1.3.min.js"></script>
		<!-- bootstrap js plugins -->
		<script src="<?php echo base_url().'template/';?>assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- top dropdown navigation -->
		<script src="<?php echo base_url().'template/';?>assets/js/tinynav.min.js"></script>
		<!-- perfect scrollbar -->
		<script src="<?php echo base_url().'template/';?>assets/lib/perfect-scrollbar/min/perfect-scrollbar-0.4.8.with-mousewheel.min.js"></script>
		
		<!-- common functions -->
		<script src="<?php echo base_url().'template/';?>assets/js/tisa_common.js"></script>
		
		<!-- style switcher -->
		<script src="<?php echo base_url().'template/';?>assets/js/tisa_style_switcher.js"></script>
		
	<!-- page specific plugins -->

		<!-- nvd3 charts -->
		<script src="<?php echo base_url().'template/';?>assets/lib/d3/d3.min.js"></script>
		<script src="<?php echo base_url().'template/';?>assets/lib/novus-nvd3/nv.d3.min.js"></script>
		<!-- flot charts-->
		<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.min.js"></script>
		<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo base_url().'template/';?>assets/lib/flot/jquery.flot.tooltip.min.js"></script>
		<!-- clndr -->
		<script src="<?php echo base_url().'template/';?>assets/lib/underscore-js/underscore-min.js"></script>
		<script src="<?php echo base_url().'template/';?>assets/lib/CLNDR/src/clndr.js"></script>
		<!-- easy pie chart -->
		<script src="<?php echo base_url().'template/';?>assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
		<!-- owl carousel -->
		<script src="<?php echo base_url().'template/';?>assets/lib/owl-carousel/owl.carousel.min.js"></script>
		
		<!-- dashboard functions -->
		<script src="<?php echo base_url().'template/';?>assets/js/apps/tisa_dashboard.js"></script>
		
<script type="text/javascript" src="<?php echo base_url().'template/';?>uikit/js/uikit.js"></script>
	  <script type="text/javascript" src="<?php echo base_url().'template/';?>uikit/js/components/upload.js"></script>
	
 	
       <link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>uikit/css/uikit.docs.min.css">
	   <link rel="stylesheet" href="<?php echo base_url().'template/';?>bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css">

    <script src="<?php echo base_url().'template/';?>bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>

  
   <style>
    .tox-notifications-container {display: none !important;}
</style>
  <?php 	if(!$text){	?>
  <script>
  tinymce.init({
  selector: 'textarea11',
  
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor forecolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
 tinymce.init({
  selector: 'textarea',
  
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect |  advlist autolink lists link image' +
  'bold | italic | alignleft | aligncenter |' +
  'alignright alignjustify | outdent indent | insertdatetime media table paste code help wordcount' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

$(".okInfoComments").click(function () {
			var order_id = $("#order_id").val();
			var order_comments   = tinyMCE.get('order_comments').getContent();


		$(".message").hide();
			jQuery.ajax({
				url: "<?php echo base_url().'orders/updateOrderComments/';?>",
				data: {order_id:order_id,order_comments:order_comments},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					
				 $('.message_order_comments').text('Mise à jour réussie');
				        $(".message_order_comments").show();
				}
			});
			});
			
			
			
			
  </script>
  <?php 	
  }
						
							
						?>
	




<audio id="musicplayer"  style="display:none;" >
<source  src="<?php echo base_url().'template/';?>beep.mp3">
</audio>
<audio id="musicplayer1"  style="display:none;" >
<source  src="<?php echo base_url().'template/';?>beep.mp3">
</audio>
<audio id="musicplayer2"  style="display:none;" >
<source  src="<?php echo base_url().'template/';?>beep.mp3">
</audio>

<audio id="musicplayer3"  style="display:none;" >
<source  src="<?php echo base_url().'template/';?>beep.mp3">
</audio>
    <script>
	


	
			
			   setInterval(function(){
					jQuery.ajax({
						url: "<?php echo base_url().'comptedPartener/checkNewOrderForpartenaire/';?>",
						data: {},
						dataType: "json",
						type: "POST",  
						success: function(data) { 
							if(data.is_singal){
							document.getElementById('musicplayer').play();
							setTimeout(function(){  document.getElementById('musicplayer').play(); }, 1000);
							setTimeout(function(){  document.getElementById('musicplayer').play(); }, 2000);
							setTimeout(function(){  document.getElementById('musicplayer').play(); }, 3000);
							setTimeout(function(){  document.getElementById('musicplayer').play(); }, 4000);
							 }
						}
					});
						
				
			   }, 60000);
					 function play(){
						 	 document.getElementById('musicplayer').play();
							 //document.getElementById('musicplayer1').play();
							//  document.getElementById('musicplayer2').play();
							 //  document.getElementById('musicplayer3').play();
						/* for (i = 0; i < 10; ++i) {
             
				
						jQuery('#musicplayer').prop("muted", true);
						jQuery('#musicplayer').play();
						jQuery('#musicplayer').prop("muted", false);
						jQuery('#musicplayer').play();
						
						jQuery('#musicplayer1').prop("muted", true);
						jQuery('#musicplayer1').play();
						jQuery('#musicplayer1').prop("muted", false);
						jQuery('#musicplayer1').play();
                         
						 jQuery('#musicplayer2').prop("muted", true);
						jQuery('#musicplayer2').play();
						jQuery('#musicplayer2').prop("muted", false);
						jQuery('#musicplayer2').play();
				        
						
						 jQuery('#musicplayer3').prop("muted", true);
						jQuery('#musicplayer3').play();
						jQuery('#musicplayer3').prop("muted", false);
						jQuery('#musicplayer3').play();
                         }*/
				
				}
				
					   setInterval(function(){
					jQuery.ajax({
						url: "<?php echo base_url().'comptedPartener/updateNewOrderForpartenaire/';?>",
						data: {},
						dataType: "json",
						type: "POST",  
						success: function(data) { 
							if(data.ordres){
							 }
						}
					});
						
				
			   }, 5000);
	
    </script>
	  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
	  
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
		 navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
  
    </script>
</body>
</html>
