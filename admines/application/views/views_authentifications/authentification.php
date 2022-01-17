<?php if($this->session->userdata('logged_in'))redirect(base_url().'dashboard', 'refresh'); ?>
<!doctype html>
<head>
<link rel="shortcut icon" href="<?php echo base_url().'template/';?>assets/favicon.ico" />
<meta charset="UTF-8">
<title>GO-Laferme</title>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<!-- bootstrap framework -->
<link href="<?php echo base_url().'template/';?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- google webfonts -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url().'template/';?>assets/css/login.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url().'template/';?>imgages/icone.png" />
<!-- jQuery --> 
<script src="<?php echo base_url().'template/';?>assets/js/jquery.min.js"></script> 
<!-- bootstrap js plugins --> 
<script src="<?php echo base_url().'template/';?>assets/bootstrap/js/bootstrap.min.js"></script> 
</head>
<body >
<div class="col-lg-12">
<div class="top-bar">
<div class="logo"></div>
</div>
<div class="row">
  <div class="login_container">
    <form id="login_form" method="post" action="<?php echo base_url().'authentification/checkaccount/';?>">
	<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>
     <h1 class="login_heading">Authentification<span></h1> 
      <div class="form-group">
        <label for="login_username">Identifiant</label>
        <input type="text" name="account_user" class="form-control input-lg" placeholder="Identifiant utilisateur" autofocus id="account_user">
           
      </div>
      <div class="form-group">
        <label for="login_password">Mot de passe</label>
      
		<input type="password" name="account_password" class="form-control input-lg" placeholder="Mot de passe" id="password">
            
        <span class="help-block"><a href="#">Mot de passe oublié?</a></span> </div>
      <div class="submit_section">
        <button class="btn btn-lg btn-success btn-block" style="background-color: #a71d1a;
    border-color: #a71d1a;">Se Connecter</button>
      </div>
    </form>
   
  </div>

  <script>
		$(function() {
			// switch forms
			$('.open_register_form').click(function(e) {
				e.preventDefault();
				$('#login_form').removeClass().addClass('animated fadeOutDown');
				setTimeout(function() {
					$('#login_form').removeClass().hide();
					$('#register_form').show().addClass('animated fadeInUp');
				}, 700);
			})
			$('.open_login_form').click(function(e) {
				e.preventDefault();
				$('#register_form').removeClass().addClass('animated fadeOutDown');
				setTimeout(function() {
					$('#register_form').removeClass().hide();
					$('#login_form').show().addClass('animated fadeInUp');
				}, 700);
			})
		})
	</script> 
  <script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-49181536-1']);
		_gaq.push(['_trackPageview']);
	  
		(function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
    <script type="text/javascript">
  jQuery("#CB").click(function(e) {
  	e.preventDefault();
	  jQuery('#a-notification-success').css("display","none");
	  jQuery('#a-notification-error').css("display","none");
	  if(jQuery('#F1').val()=='') {jQuery('#F1').css('border','1px solid #B80000'); return false;}
	  if(jQuery('#F2').val()=='') {jQuery('#F2').css('border','1px solid #B80000'); return false;}
  // if(jQuery('#SP').val()!='') {return false;}
  var account_password=jQuery('#F2').val();
  var account_email=jQuery('#F1').val();
   jQuery.ajax({
   url: "<?php echo base_url().'authentification/checkaccount';?>",
   data: {account_password:account_password,account_email:account_email},
   dataType: "json",
   type: "POST",
        success: function(data) {
     if(data.result==1) {
     //jQuery('#a-notification-success').css("display","block");
     window.location = data.location;
     }
	 if(data.result==3)      jQuery('.alert').css("display","block");

	 
     if(data.result==0) {
     //jQuery('#a-notification-error').css("display","block");
     }
         }
     }) 
 });
  </script> 
</div>
</div>
</body>
</html>