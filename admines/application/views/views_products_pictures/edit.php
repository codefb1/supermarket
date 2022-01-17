	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'productspictures/listpictures/'.$products_picture->product_id;;?>'"><i class=" fa fa-reply"></i>  Listes des  photos</button>
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'products/';?>'"><i class=" fa fa-reply"></i>  Listes  des produits</button>

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
      <div class="panel-heading">Editer photo</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'productspictures/edit';?>">
		
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
                <label for="F1">Affecter   </label>
              <select id="picture_view" name="picture_view" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($products_picture->picture_view==1){ echo"selected";} ?> > Client</option>
				<option value="2" <?php  if($products_picture->picture_view==2){ echo"selected";} ?>> Boucherie</option>
					</select>  
					
			   </div>
			 </div>
			 </div>
			 	 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label for="F1">Empalcement   </label>
              <select id="product_picture_emplacement" name="product_picture_emplacement" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($products_picture->product_picture_emplacement==1){ echo"selected";} ?> > Panier top ou block</option>
				<option value="2" <?php  if($products_picture->product_picture_emplacement==2){ echo"selected";} ?>>  List produits</option>
				<option value="3" <?php  if($products_picture->product_picture_emplacement==3){ echo"selected";} ?>>  Page produit</option>
				
				</select>  
					
			   </div>
			 </div>
			 </div>
			  <div class="form-group">
				<div class="row">
                    <label class="col-sm-12 control-label bold">Nom	</label>
                    <div class="col-sm-12">  
					<input type="text" name="product_pictures_alt"  class="form-control"   value="<?php echo $products_picture->product_pictures_alt;?>"/>
                    </div>  </div>
			   </div>
			
          
        	 <div class="form-group">
			   <div class="row">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une image  <input id="upload-select" name="product_pictures" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   
			    </div></div>
		  </div>
              		  <div class="form-group" id="block-banners" >
					  <div class="row">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" alt="avatar" id="block-image-banners" src="<?php echo base_url().'medias/products/'.$products_picture->product_pictures; ?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
						</div>
					</div>
				</div>
			</div>
          <input type="hidden" id="product_pictures" name="product_pictures" value="<?php echo $products_picture->product_pictures;?>" />
		  <input type="hidden" id="product_picture_id" name="product_picture_id" value="<?php echo $products_picture->product_picture_id;?>" />
		  
              </br> </br>
        </form>
		<div class="form-sep">
            <div class="pull-right">
              <button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-ok"></i> <span>Mise ajour</span></button>
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
            action: '<?php echo base_url().'productspictures/uploadFile/';?>', // upload url

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
				$("#product_pictures").val(response);
				$("#block-image-banners").attr("src","<?php echo base_url().'medias/products/'; ?>"+response);
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