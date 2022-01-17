<div class="row">
  <div class="alert alert-success alert-dismissable fade in" id="sne-notification-success" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-checkmark"></i> OK</strong> Enregistrement avec succès</span> </div>
  <div class="alert alert-danger alert-dismissable fade in" id="sne-notification-error" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-close"></i> KO</strong> Enregistrement echoué</span> </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">À propos de nous</div></br> </br>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'settings/home';?>">
		
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
                    <label class="col-sm-12 control-label bold"> Title   </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_titre_1" class="form-control input-rounded" value="<?=$setting->home_block_titre_1;?>">
                    </div>
                  </div>
				  
				   <div class="row">
                    <label class="col-sm-12 control-label bold"> Title 1  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_titre_5" class="form-control input-rounded" value="<?=$setting->home_block_titre_5;?>">
                    </div>
                  </div>
				    </div>
					<div class="form-group">
			  <div class="row">
                    <label class="col-sm-12 control-label bold"> Discription   </label>
                    <div class="col-sm-12">
                      
					   <textarea name="home_block_desc_1" class="form-control input-rounded" ><?=$setting->home_block_desc_1;?></textarea>
                    </div>
                  </div>
				
				    </div>
				   <div class="form-group">
				   <div class="row">
                    <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  image <input id="upload-select" name="home_picture" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
                  </div>
				       </div>
					   
					   
				     <div class="form-group">
					 <div class="row">
                   	<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail=""   alt="avatar" id="block-image-banners" src="<?php echo base_url().'medias/banners/'.$setting->home_picture;?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
                  </div>
				   </div>
					<input type="hidden" id="home_picture" name="home_picture" value="<?=$setting->home_picture;?>" />
				  
				
				
				  			
							  <input type="hidden" class="form-control" name="setting_id" id="setting_id" value="<?=$setting->setting_id;?>">
							  	<input type="hidden" id="home_picture" name="home_picture" value="<?=$setting->home_picture;?>" />
                            	
				   
				
				  
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <style>.tox-notifications-container {display:none!important;}</style>
<script type="text/javascript">



    $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'settings/uploadFilehome/';?>', // upload url

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
				$("#home_picture").val(response);
				$("#block-image-banners").attr("src","<?php echo base_url().'medias/banners/'; ?>"+response);
				$("#block-banners").show();
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

</script>	 

<script type="text/javascript">

$(document).ready(function () {
	$(".btn-success").click(function () {
		$( "#submitpage" ).submit();
});

});
	


</script>
