	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'status';?>'"><i class=" fa fa-reply"></i>  Listes des  status</button>

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
      <div class="panel-heading">Nouvelle status</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'status/add';?>">
		
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
              <div class="col-lg-4">
                <label  for="F1">Affectuer à</label>
              	<select  id="status_type"  name="status_type" class="form-control  btn-xs">
							<option value=""> Selectionnez status...</option>
							<option <?php  if($status_type==1){ echo"selected";} ?> value="1">Commmande</option>
							<option <?php  if($status_type==2){ echo"selected";} ?> value="2">Livraison </option>
							
							</select>
			  </div>
             
            </div>
         
            </div>
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-4">
                <label  for="F1">Nom  </label>
                <input id="name" class="form-control" type="text"  name="status_name" value="<?php echo $status_name;?>">
              </div>
             
            </div>
         
            </div>
		 <div class="form-group" >
            <div class="row">
              <div class="col-lg-2">
                <label  for="F1">Couleur  </label>
                <input id="name" class="form-control" type="color"  name="status_color" value="<?php echo $status_color;?>">
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

$(".btn-success").click(function () {

		$( "#submitpage" ).submit();
});

});
	


</script>