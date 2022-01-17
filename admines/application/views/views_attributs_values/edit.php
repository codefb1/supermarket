	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'attributsValues';?>'"><i class=" fa fa-reply"></i>  Liste des values</button>

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
      <div class="panel-heading">Editer valeur</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'attributsValues/edit';?>">
		
		<?php if(@$this->uri->segment(3) == 1) { ?>
					<div class="alert alert-success"> <i class="zmdi zmdi-check"></i> Mise à jour réussie</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 2) { ?>
					<div class="alert alert-danger"> <i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Mise à jour échouée !</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>		
			
			
			<div class="form-group" >
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Attributs </label>
              <select  id="attribut_id"  name="attribut_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			    <?php foreach($attributs as $attribut) :?>
										<option <?php  if($attribut->attribut_id==$attribut_value->attribut_id){ echo"selected";} ?> value="<?php echo $attribut->attribut_id;?>"> <?php echo $attribut->attribut_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div>
			</div>

			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom  </label>
                <input id="name" class="form-control" type="text"  name="attribut_value" value="<?php echo $attribut_value->attribut_value;?>">
              </div>
             
            </div>
         
            </div>
			
       
				  
				    
                 
				               
		 <input type="hidden" class="form-control" name="attribut_value_id" id="attribut_value_id" value="<?=$attribut_value->attribut_value_id;?>">
							  
              </br> </br>
        </form>
		<div class="form-sep">
            <div class="pull-right">
              <button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-ok"></i> <span>Mise Ajour</span></button>
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