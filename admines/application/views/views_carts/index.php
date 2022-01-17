	<div style="text-align:right;margin-bottom:10px;">
 
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
      <div class="panel-heading">Pannier </div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'banners/add';?>">
		
		<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
			
			 
			
			  
			  	<div class="form-group" >
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Clients </label>
              <select  id="customer_id"  name="customer_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			    <?php foreach($customers_list as $customer) :?>
										<option  value="<?php echo $customer->customer_id;?>"> <?php echo $customer->customer_firstname.' '.$customer->customer_lastname;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div>
			</div>
			
          	<div class="form-group" >
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Partenaire: <span class="parneters"></span> </label>
            </div>
             
            </div>
			</div>
			
			  
			   	<div class="form-group" >
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Code postal: <span class="code"></span> </label>
            </div>
             
            </div>
			</div>
			
        	 
              	
        
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
	
	
$("#customer_id").change(function() {
	 var customer_id=  $(this).val() ;
	 
		  jQuery.ajax({
		   url: "<?php echo base_url().'cart/getCodePostal/';?>",
		   data: {customer_id:customer_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
					$('.parneters').text(data.partener_lastname) ;
					$('.code').text(data.partener_zip) ;
								}	
			})	
});
 });
</script>	 
