	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'associations';?>'"><i class=" fa fa-reply"></i>  Listes des  associations</button>

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
      <div class="panel-heading">Editer association</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'associations/edit';?>">
		
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
                <label  for="F1">Pays </label>
              <select  id="association_country_id"  name="association_country_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			   <?php foreach($countries_list as $countries) :?>
										<option <?php  if($association->association_country_id==$countries->country_id){ echo"selected";} ?> value="<?php echo $countries->country_id;?>"> <?php echo $countries->country_name;?></option>
								 <?php endforeach; ?>
								</select> </div>
             
            </div>
			</div>
			
								  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom  </label>
                <input id="association_lastname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_lastname" value="<?php echo $association->association_lastname;?>">
              </div>
             
            </div>
         
            </div>
				
		  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Email  </label>
                <input id="association_email" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_email" value="<?php echo $association->association_email;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Address  </label>
                <input id="association_adress" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_adress" value="<?php echo $association->association_adress;?>">
              </div>
             
            </div>
         
            </div>
			
				<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Code postal  </label>
                <input id="association_zip" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_zip" value="<?php echo $association->association_zip;?>">
              </div>
             
            </div>
         
            </div>
			
			
			
				<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Ville  </label>
                <input id="association_city" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_city" value="<?php echo $association->association_city;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Numéro téléphone  </label>
                <input id="association_phone" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_phone" value="<?php echo $association->association_phone;?>">
              </div>
             
            </div>
         
            </div>
			
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Numéro téléphone  portable </label>
                <input id="association_phone_portable" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_phone_portable" value="<?php echo $association->association_phone_portable;?>">
              </div>
             
            </div>
           
            </div>
			
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Information  </label>
                <input id="association_short_text" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_short_text" value="<?php echo $association->association_short_text;?>">
              </div>
             
            </div>
         
            </div>
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Prix de vente (Euro)  </label>
                <input id="association_price" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="association_price" value="<?php echo $association->association_price;?>">
              </div>
             
            </div>
         
            </div>
			
			 <div class="form-group">
				  
					
			 <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Commentaire</label>
            

  <textarea name="association_comments" id="basic-example"><?php echo $association->association_comments;?></textarea></div>
             
            </div>
         
          </div>
				
        	<div class="form-group">
			   <div class="row">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  image <input id="upload-select" name="association_picture" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   
			    </div></div>
		  </div>
              		  <div class="form-group" id="block-association">
					  <div class="row">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" alt="avatar" id="block-image-association" src="<?php echo base_url().'medias/associations/'.$association->association_picture; ?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
						</div>
					</div>
				</div>
			</div>
          <input type="hidden" id="association_picture" name="association_picture" value="<?php echo $association->association_picture;?>" />
		
						 	
        	 	
		
		 <input type="hidden" class="form-control" name="association_id" id="association_id" value="<?=$association->association_id;?>">
							  	
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
            action: '<?php echo base_url().'associations/uploadFile/';?>', // upload url

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
				$("#association_picture").val(response);
				$("#block-image-association").attr("src","<?php echo base_url().'medias/associations/'; ?>"+response);
				$("#block-association").show();
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
