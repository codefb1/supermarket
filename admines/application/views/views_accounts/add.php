	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'accounts';?>'"><i class=" fa fa-reply"></i>  Liste des  administrateurs</button>
 </div>

<div class="row">
  <div class="alert alert-success alert-dismissable fade in" id="sne-notification-success" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-checkmark"></i> OK</strong> Enregistrement avec succès</span> </div>
  <div class="alert alert-danger alert-dismissable fade in" id="sne-notification-error" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-close"></i> KO</strong> Enregistrement echoué</span> </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Nouvel administrateur</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'accounts/add';?>">
		
		<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
					<?php if(@$process_status == 4) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Ce compte existe déjà!</div>
					<?php } ?>	
						 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Identifiant</label>
                <input id="account_user" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="account_user" value="<?php  echo $account_user;?>">
              </div>
             
            </div>
         
            </div>	
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Nom</label>
                <input id="account_firstname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="account_firstname" value="<?php echo $account_firstname;?>">
              </div>
             
            </div>
         
            </div>
		
							
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Prénom</label>
                <input id="account_lastname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="account_lastname" value="<?php echo $account_lastname;?>">
              </div>
             
            </div>
         
            </div>
				   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Email</label>
                <input id="account_email" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="account_email" value="<?php echo $account_email;?>">
             <p class="help-block">Exp: xxx@gmail.com</p>
			 </div>
             
            </div>
         
            </div>
		
        		   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Mot de passe</label>
                <input id="account_password" class="form-control" type="password" data-parsley-required="true" data-parsley-type="alphanum" name="account_password" value="<?php echo $account_password;?>">
     
			 </div>
             
            </div>
         
            </div>
              		 
          </br> </br>
        </form>
		<div class="form-sep">
            <div class="pull-right">
              <button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-ok"></i> <span>Enregistrer</span></button>
            </div>
          </div>
     
    </div>
  </div>
</div>
	 
<script type="text/javascript">

$(document).ready(function () {
	$(".btn-success").click(function () {
		$( "#submitpage" ).submit();
});

});
	


</script>