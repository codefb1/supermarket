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
<link href="<?php echo base_url().'template/';?>assets/css/style.css" rel="stylesheet" media="screen">
		
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

<body>

<!-- top bar -->
<header class="navbar navbar-fixed-top" role="banner">
  <div class="container-fluid">
    <div class="navbar-header"> </div>
    <ul class="top_links" style="left: 35%;POSITION: RELATIVE;">
  <li> <a href="<?php echo base_url().'menus';?>"><i class="ion-briefcase "></i>  Paramètres</a></li>
    <li> <a href="<?php echo base_url().'newsletters';?>"><i class="ion-briefcase "></i>  Newsletters</a></li>
  
   <li> <a href="<?php echo base_url().'customers';?>"><i class="ion-navicon-round  "></i>  Clients</a></li>
   <li>  <a href="<?php echo base_url().'certificats';?>"><i class="glyphicon glyphicon-certificate"></i> Certificats </a> </li>
<li>  <a href="<?php echo base_url().'transporters';?>">
<i class="glyphicon glyphicon-certificate"></i>
	Livreurs </a>
  
    </li>
<li>  <a href="<?php echo base_url().'news';?>">
<i class="glyphicon glyphicon-certificate"></i>
	Recette </a>
  
    </li>
	<li class=""><a href="<?php echo base_url().'Pages';?>"><i class="ion-navicon-round "></i> Pages </a></li>
     <li class="hidden"> <a href="<?php echo base_url().'sociaux/index';?>"><i class="ion-briefcase "></i>  Réseaux sociaux</a></li>
      <li class="hidden"><a href="<?php echo base_url().'Settings';?>"><i class="ion-navicon-round "></i> Paramètres  </a></li>
	  <li  class="hidden"><a href="<?php echo base_url().'Contacts';?>"><i class="ion-navicon-round "></i> Mes Contacts </a></li>
	  

	   <li class="hidden"><a href="<?php echo base_url().'Pages';?>"><i class="ion-navicon-round hidden"></i> Pages </a></li>
	  <li class="hidden"><a href="<?php echo base_url().'authentification/system_logout/';?>"> <i class="ion-navicon-round"></i> Se déconnecter</a></li>
      
    </ul>
	<div class="logo" >
	<a style="left: 3%;" href="<?php echo base_url()?>" class="navbar-brand" ><img src="<?php echo base_url().'template/';?>assets/logo_blanc.png" alt="" class=""></a> 
   </div> 
   
   
   
   <ul class=" nav navbar-nav navbar-right ">
         <li><a style="    background: #222;
    font-size: 10px;
    display: block;
    padding-right: 8px;
    text-transform: uppercase;
	
    padding: 1px 12px 1px;
    
    
    top: 10px;
" href="<?php echo base_url().'authentification/system_logout/';?>"> <i class="ion-navicon-round"></i> Se déconnecter</a></li>
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
    <li> <a href="<?php echo base_url().'dashboard/';?>">
	
<img src="<?php echo base_url().'template/';?>images/dashboard.png" alt="" class="">
	<span class="nav_title">Tableau de bord</span></a> </li>
    <!--Companies-->
	

	
	
	
	
	
	
		  <li> <a href="<?php echo base_url().'orders/';?>"> <img src="<?php echo base_url().'template/';?>images/commandes.png" alt="" class="">

	  
	  
	  <span class="nav_title">Commandes</span> </a>
    
    </li>
	
	   <li> <a href="<?php echo base_url().'orders/associations';?>"> <img src="<?php echo base_url().'template/';?>images/commandes.png" alt="" class="">

	  
	  
	  <span class="nav_title">Commandes Ass</span> </a>
    
    </li>
	
		
	  <li> <a href="<?php echo base_url().'products';?>">
<img src="<?php echo base_url().'template/';?>images/produit.png" alt="" class="">
	
	  <span class="nav_title">Produits</span> </a>

    </li>
	
		
	  <li> <a href="<?php echo base_url().'products/compose';?>">
<img src="<?php echo base_url().'template/';?>images/goff_icon.png" alt="" class="">
	
	  <span class="nav_title">Couffin</span> </a>

    </li>
	  <li> <a href="<?php echo base_url().'categoriesOptions';?>">
<img src="<?php echo base_url().'template/';?>images/goffa_option.png" alt="" class="">
	
	  <span class="nav_title">Options</span> </a>

    </li>
	   <li> <a href="<?php echo base_url().'partners';?>">

	   <img src="<?php echo base_url().'template/';?>images/partenaires.png" alt="" class="">
	   <span class="nav_title">Partenaires</span> </a>
    
     
    </li>
	
 <li> <a href="<?php echo base_url().'associations';?>"> 
	   <img src="<?php echo base_url().'template/';?>images/associations.png" alt="" class="">
 <span class="nav_title">Associations</span> </a>
    
     
    </li>
	
	  
	<li> <a href="<?php echo base_url().'comptabilite/partners';?>"> 
	 <img src="<?php echo base_url().'template/';?>images/comptabilite.png" alt="" class="">
	</span> <span class="nav_title">Comptabilité</span> </a>
  
    </li>
	<li> <a href="<?php echo base_url().'paimentsPartners';?>"> 
	 <img src="<?php echo base_url().'template/';?>images/comptabilite.png" alt="" class="">
	</span> <span class="nav_title">Paiments</span> </a>
  
    </li>
		<li> <a href="#"> 
		 <img src="<?php echo base_url().'template/';?>images/ouitils.png" alt="" class="">
	
		<span class="nav_title">Outils</span> </a>
  
    </li>			    
	
	<li>  <a href="<?php echo base_url().'transporters';?>">
	<img src="<?php echo base_url().'template/';?>images/livreurs.png" alt="" class="">

	<span class="nav_title">Livreurs</span> </a>
  
    </li>
     <li>  <a href="<?php echo base_url().'certificats';?>">
<i class="glyphicon glyphicon-certificate"></i>

	<span class="nav_title">Certificats</span> </a>
  
    </li>
    <!--Campaign -->

    </li>
 

  </ul>
</nav>

<!-- right slidebar -->
<div id="slidebar">
  <div id="slidebar_content">
    <div class="input-group">
      <input type="text" class="form-control input-sm" placeholder="Chercher...">
      <span class="input-group-btn">
      <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
      </span> </div>
    <hr>
    <div class="sepH_a">
      <div class="progress">
        <div style="width: 60%;" role="progressbar" class="progress-bar"> 60% </div>
      </div>
      <span class="help-block">CPU Usage</span> </div>
    <div class="sepH_a">
      <div class="progress">
        <div style="width: 28%;" class="progress-bar progress-bar-success"> 28% </div>
      </div>
      <span class="help-block">Disk Usage</span> </div>
    <div class="progress">
      <div style="width: 82%;" class="progress-bar progress-bar-danger"> 0.2GB/20GB </div>
    </div>
    <span class="help-block">Monthly Transfer</span>
    <hr>
    <div class="heading_a">New Users</div>
    <div class="user_img_grid clearfix"> <a class="user_img_item" href="#"><img src="<?php echo base_url().'template/';?>assets/img/avatars/avatar_3.jpg" alt="" class="img-thumbnail"></a> <a class="user_img_item" href="#"><img src="<?php echo base_url().'template/';?>assets/img/avatars/avatar_5.jpg" alt="" class="img-thumbnail"></a> <a class="user_img_item" href="#"><img src="<?php echo base_url().'template/';?>assets/img/avatars/avatar_8.jpg" alt="" class="img-thumbnail"></a> <a class="user_img_item" href="#"><img src="<?php echo base_url().'template/';?>assets/img/avatars/avatar_6.jpg" alt="" class="img-thumbnail"></a> </div>
    <hr>
    <form>
      <div class="form-group">
        <input type="text" class="input-sm form-control" placeholder="Tilte...">
      </div>
      <div class="form-group">
        <textarea cols="30" rows="3" class="form-control input-sm" placeholder="Message..."></textarea>
      </div>
      <button type="button" class="btn btn-default btn-sm">Send message</button>
    </form>
    <hr>
    <div class="sepH_a"> <span class="label label-info">Reminder</span> </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fuga omnis ipsa odit sint aut molestiae enim. Quia cupiditate distinctio ad dicta qui ducimus aspernatur debitis incidunt minima laboriosam atque.</p>
  </div>
</div>

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
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
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
   toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
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
			
			$(".okInfoCommentsParteners").click(function () {
			var order_id = $("#order_id").val();
			var order_comments_parteners   = tinyMCE.get('order_comments_parteners').getContent();


		$(".message").hide();
			jQuery.ajax({
				url: "<?php echo base_url().'orders/updateOrderCommentsParteners/';?>",
				data: {order_id:order_id,order_comments_parteners:order_comments_parteners},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					
				 $('.message_order_comments_parteners').text('Mise à jour réussie');
				        $(".message_order_comments_parteners").show();
				}
			});
			});
			
			
  </script>
  <?php  } ?>

 <script src="<?php echo base_url().'template/';?>bootstrap-datepicker.js"></script>
  
<script type="text/javascript">
	 $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
</script>
</body>
</html>
