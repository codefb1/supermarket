	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'transporters';?>'"><i class=" fa fa-reply"></i>  Listes des  livreurs</button>

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
      <div class="panel-heading">Editer livreur</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'transporters/edit';?>">
		
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
                <label  for="F1">Sociéte  </label>
                <input id="transporter_name" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_name" value="<?php echo $transporter->transporter_name;?>">
              </div>
             
            </div>
         
            </div>
				<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom de responsable </label>
                <input id="transporter_responsable" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_responsable" value="<?php echo $transporter->transporter_responsable;?>">
              </div>
             
            </div>
         
            </div>
				

			
			
			
				<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Ville  </label>
                <input id="transporter_city" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_city" value="<?php echo $transporter->transporter_city;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Numéro téléphone  </label>
                <input id="transporter_phone" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_phone" value="<?php echo $transporter->transporter_phone;?>">
              </div>
             
            </div>
         
            </div>
			
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Numéro téléphone  portable </label>
                <input id="transporter_phone_portable" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_phone_portable" value="<?php echo $transporter->transporter_phone_portable;?>">
              </div>
             
            </div>
           
            </div>
			
				  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Tarif livraison 1 kg  </label>
                <input id="transporter_price_by_one" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_price_by_one" value="<?php echo $transporter->transporter_price_by_one;?>">
              </div>
             
            </div>
         
            </div>
					  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Tarif livraison ile  de france  </label>
                <input id="transporter_price_in_france" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_price_in_france" value="<?php echo $transporter->transporter_price_in_france;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Tarif livraison national  </label>
                <input id="transporter_price_not_france" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_price_not_france" value="<?php echo $transporter->transporter_price_not_france;?>">
              </div>
             
            </div>
         
            </div>
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Information  </label>
                <input id="transporter_short_text" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="transporter_short_text" value="<?php echo $transporter->transporter_short_text;?>">
              </div>
             
            </div>
         
            </div>
			
		
								
        	<div class="form-group">
			   <div class="row">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  image <input id="upload-select" name="transporter_picture" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   
			    </div></div>
		  </div>
              		  <div class="form-group" id="block-transporter">
					  <div class="row">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" alt="avatar" id="block-image-transporter" src="<?php echo base_url().'medias/transporters/'.$transporter->transporter_picture; ?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
						</div>
					</div>
				</div>
			</div>
          <input type="hidden" id="transporter_picture" name="transporter_picture" value="<?php echo $transporter->transporter_picture;?>" />
		
						 	
        	 	
		
		 <input type="hidden" class="form-control" name="association_id" id="association_id" value="<?=$transporter->association_id;?>">
							  	
              </br> </br> 	
        	 	
		
		 <input type="hidden" class="form-control" name="transporter_id" id="transporter_id" value="<?=$transporter->transporter_id;?>">
							  	
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

$(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'transporters/uploadFile/';?>', // upload url

            allow : '*.(jpg|jpeg|gif|png)', // allow only images

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");
				$("#transporter_picture").val(response);
				$("#block-image-transporter").attr("src","<?php echo base_url().'medias/transporters/'; ?>"+response);
				$("#block-transporter").show();
                setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);

                //alert("Upload Completed")
            }
        };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
			//alert(select);
    });

$(document).ready(function () {

$("#SNE").click(function () {

		$( "#submitpage" ).submit();
});
  
});
	

</script>
