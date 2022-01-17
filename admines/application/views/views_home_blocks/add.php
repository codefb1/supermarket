	<div style="text-align:right;margin-bottom:10px;">
 <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'banners';?>'"><i class=" fa fa-reply"></i>  Liste des  bannières</button>
 
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
      <div class="panel-heading">Nouvelle banniére </div>
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
                <label  for="F1">Produits </label>
              <select  id="product_id"  name="product_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
				
			    <?php foreach($products as $product) :?>
										<option <?php  if($product->product_id==$product_id){ echo"selected";} ?> value="<?php echo $product->product_id;?>"> <?php echo  $product->product_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div>
			</div>
			
			
		
			
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Titre  </label>
                <input id="banner_title" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="banner_title" value="<?php echo $banner_title;?>">
              </div>
             
            </div>
         
            </div>
			
			
			
			  <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Description </label>
                <input id="description" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="banner_text" value="<?php echo $banner_text;?>">
              </div>
             
            </div>
         
            </div>
			  <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Titre de bouton </label>
                <input id="banner_botton_text" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="banner_botton_text" value="<?php echo $banner_botton_text;?>">
              </div>
             
            </div>
         
            </div>
			
			
          
        	 <div class="form-group">
			   <div class="row">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une image <input id="upload-select" name="banner_picture" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   
			    </div></div>
		  </div>
              		  <div class="form-group" id="block-banners" style="display:none;">
					  <div class="row">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" alt="avatar" id="block-image-banners" src="<?php echo base_url().'medias/banners/'.$banner_picture; ?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
						</div>
					</div>
				</div>
			</div>
          <input type="hidden" id="banner_picture" name="banner_picture" value="" />
		  <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_id;?>" />
		  
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
            action: '<?php echo base_url().'banners/uploadFile/';?>', // upload url

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
				$("#banner_picture").val(response);
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