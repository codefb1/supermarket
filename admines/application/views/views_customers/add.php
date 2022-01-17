	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'customers';?>'"><i class=" fa fa-reply"></i>  Listes des  clients</button>
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
      <div class="panel-heading">Nouvelle client</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'customers/add';?>">
		
		<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
					
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Nom</label>
                <input id="customer_firstname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_firstname" value="<?php echo $customer_firstname;?>">
              </div>
             
            </div>
         
            </div>
		
							
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Prénom</label>
                <input id="customer_lastname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_lastname" value="<?php echo $customer_lastname;?>">
              </div>
             
            </div>
         
            </div>
							
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Numéro SIRET</label>
                <input id="customer_siret" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_siret" value="<?php echo $customer_siret;?>">
              </div>
             
            </div>
         
            </div>
		
				   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Email</label>
                <input id="customer_email" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_email" value="<?php echo $customer_email;?>">
             <p class="help-block">Exp: xxx@gmail.com</p>
			 </div>
             
            </div>
         
            </div>
			
			   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Mot de passe</label>
                <input id="customer_password" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_password" value="<?php echo $customer_password;?>">
     
			 </div>
             
            </div>
         
            </div>
			<div class="panel">
			 <div class="panel-heading" style="text-align: center;font-weight: bold;">Address de facturation</div>
			 </div></br>
			 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Pays</label>
                 <select  id="customer_country"  name="customer_country" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			   
										<option <?php  if($customer_country==1){ echo"selected";} ?> value="1"> France</option>
										 <option <?php  if($customer_country==2){ echo"selected";} ?> value="2"> Belgique</option>
									</select>
			 </div>
             
            </div>
         
            </div>
			
			 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Address</label>
                <input id="customer_address" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_address" value="<?php echo $customer_address;?>">
     
			 </div>
             
            </div>
         
            </div>
			
			<div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Code postal</label>
                <input id="customer_zip" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_zip" value="<?php echo $customer_zip;?>">
     
			 </div>
             
            </div>
         
            </div>
			   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Ville</label>
                <input id="customer_city" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_city" value="<?php echo $customer_city;?>">
     
			 </div>
             
            </div>
         
            </div>
			
			   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Téléphone</label>
                <input id="customer_phone" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_phone" value="<?php echo $customer_phone;?>">
     
			 </div>
             
            </div>
         
            </div>
			<div class="form-group">
            <div class="row">
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">  Address de facturation et Address de livraison sont même
  <label class="form-check-label" for="flexCheckDefault">
    
  </label>
</div>		

  </div>		</div>		            	
<div class="panel">
			 <div class="panel-heading" style="text-align: center;font-weight: bold;">Address de livraison</div>
			 </div></br>
			 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Nom</label>
                <input id="customer_deliver_firstname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_deliver_firstname" value="<?php echo $customer->customer_deliver_firstname;?>">
              </div>
             
            </div>
         
            </div>
		
							
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Prénom</label>
                <input id="customer_deliver_lastname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_deliver_lastname" value="<?php echo $customer->customer_deliver_lastname;?>">
              </div>
             
            </div>
         
            </div>
			
			 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Pays</label>
                 <select  id="customer_deliver_country"  name="customer_deliver_country" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			   
										<option <?php  if($customer_deliver_country==1){ echo"selected";} ?> value="1"> France</option>
										 <option <?php  if($customer_deliver_country==2){ echo"selected";} ?> value="2"> Belgique</option>
									</select>
			 </div>
             
            </div>
         
            </div>
			 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Address</label>
                <input id="customer_deliver_address" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_deliver_address" value="<?php echo $customer_deliver_address;?>">
     
			 </div>
             
            </div>
         
            </div>
			
			<div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Code postal</label>
                <input id="customer_deliver_zip" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_deliver_zip" value="<?php echo $customer_deliver_zip;?>">
     
			 </div>
             
            </div>
         
            </div>
			   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Ville</label>
                <input id="customer_deliver_city" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_deliver_city" value="<?php echo $customer_deliver_city;?>">
     
			 </div>
             
            </div>
         
            </div>
			
			   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Téléphone</label>
                <input id="customer_deliver_phone" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="customer_deliver_phone" value="<?php echo $customer_deliver_phone;?>">
     
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

        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                      $( "#customer_deliver_firstname" ).val($( "#customer_firstname" ).val());
					  $( "#customer_deliver_lastname" ).val($( "#customer_lastname" ).val());
					  $( "#customer_deliver_phone" ).val($( "#customer_phone" ).val());
					  $( "#customer_deliver_city" ).val($( "#customer_city" ).val());
					  $( "#customer_deliver_address" ).val($( "#customer_address" ).val());
					  $( "#customer_deliver_country" ).val($( "#customer_country" ).val());
					  $( "#customer_deliver_zip" ).val($( "#customer_zip" ).val());
            }
            else if($(this).prop("checked") == false){
                console.log("Checkbox is unchecked.");
            }
        });
    });


</script>