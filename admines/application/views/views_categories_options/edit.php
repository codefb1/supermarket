	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'categoriesOptions';?>'"><i class=" fa fa-reply"></i>  Listes des options</button>

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
      <div class="panel-heading">Editer option</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'categoriesOptions/edit';?>">
		
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
                <label  for="F1">Catégories </label>
              <select  id="categorie_id"  name="categorie_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			    <?php foreach($categories as $cate) :?>
										<option <?php  if($cate->categorie_id==$categorie_option->categorie_id){ echo"selected";} ?> value="<?php echo $cate->categorie_id;?>"> <?php echo $cate->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div>
			</div>
<div class="row">
						<div class="form-group">
						
							<div class="col-lg-12">
				        	<label  class=" control-label">Type</label>
              <select id="option_type_id" name="option_type_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
			
				    <?php foreach($options_types_list as $options_types) :?>
										<option <?php  if($categorie_option->option_type_id==$options_types->option_type_id){ echo"selected";} ?> value="<?php echo $options_types->option_type_id;?>"> <?php echo $options_types->option_type_name;?></option>
										 <?php endforeach; ?>
					</select> 
							</div>
						</div>
						</div>
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom  </label>
                <input id="name" class="form-control" type="text"  name="option_name" value="<?php echo $categorie_option->option_name;?>">
              </div>
             
            </div>
         
            </div>
				  <div class="form-group">
			  <div class="row">
                    <label class="col-sm-12 control-label bold">Prix d'achat</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control"  name="option_price_buying" value="<?php echo  $categorie_option->option_price_buying;?>">
                    </div>
                  </div>
				   </div>
         <div class="form-group">
		  <div class="row">
                    <label class="col-sm-12 control-label bold">Prix</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" value="<?php echo $categorie_option->option_price;?>" name="option_price">
                    </div>
					</div>
                  </div>
				  
				    
               
				                
				 
              		
		<input type="hidden" class="form-control" name="categorie_option_id" id="categorie_option_id" value="<?=$categorie_option->categorie_option_id;?>">
							  
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