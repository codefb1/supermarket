   
  <div class="alert alert-success alert-dismissable fade in" id="sne-notification-success" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-checkmark"></i> OK</strong> Enregistrement avec succès</span> </div>
  <div class="alert alert-danger alert-dismissable fade in" id="sne-notification-error" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-close"></i> KO</strong> Enregistrement echoué</span> </div>
  <div class="col-lg-12">
    <div class="panel-heading">Réseaux sociaux</div>
    <div class="panel panel-default">
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'sociaux/index';?>">
		
	<?php if(@$this->uri->segment(3) == 1) { ?>
					<div class="alert alert-success"> <i class="zmdi zmdi-check"></i> Mise à jour réussie</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 2) { ?>
					<div class="alert alert-danger"> <i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Mise à jour échouée !</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>
					
      	   <div class="form-group">
					   <div class="row">
                    <label class="col-sm-12 control-label bold"> FACE BOOK </label>
                    <div class="col-sm-12">
                      <input type="text" name="facebook" class="form-control input-rounded" value="<?=$sociaux->facebook;?>">
                    </div>
					</div>
					</div>
                  
				  <div class="form-group">
					   					   					   <div class="row">
                    <label class="col-sm-12 control-label bold"> TWITTER </label>
                    <div class="col-sm-12">
                      <input type="text" name="twitter" class="form-control input-rounded" value="<?=$sociaux->twitter;?>">
                    </div>
                  </div>
				     </div>
				  	   <div class="form-group">
					   					   <div class="row">
                    <label class="col-sm-12 control-label bold"> LINKEDIN </label>
                    <div class="col-sm-12">
                      <input type="text" name="linkedin" class="form-control input-rounded" value="<?=$sociaux->linkedin;?>">
                    </div>
                  </div>
				     </div>
				  	   <div class="form-group">
					   <div class="row">
                    <label class="col-sm-12 control-label bold"> INSTAGRAM</label>
                    <div class="col-sm-12">
                      <input type="text" name="instgram" class="form-control input-rounded" value="<?=$sociaux->instgram;?>">
                    </div>
                  </div>
				   </div>
				  	   <div class="form-group">
					     <div class="row">
                    <label class="col-sm-12 control-label bold"> PINTEREST </label>
                    <div class="col-sm-12">
                      <input type="text" name="pinterest" class="form-control input-rounded" value="<?=$sociaux->pinterest;?>">
                    </div>
                  </div>
				   </div>
				  	   <div class="form-group">
					     <div class="row">
                    <label class="col-sm-12 control-label bold"> GOOGLE +</label>
                    <div class="col-sm-12">
                      <input type="text" name="google_plus" class="form-control input-rounded" value="<?=$sociaux->google_plus;?>">
                    </div>
                  </div>
				                    </div>
				  	   <div class="form-group">
					    <div class="row">
                    <label class="col-sm-12 control-label bold"> YOUTUBE</label>
                    <div class="col-sm-12">
                      <input type="text" name="youtub" class="form-control input-rounded" value="<?=$sociaux->youtub;?>">
                    </div>
                  </div>
				</div>
				  
  <input type="hidden" class="form-control" name="sociau_id" id="sociau_id" value="1">
						

				
				
				  			
				   
				
				  
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
