	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'pages';?>'"><i class=" fa fa-reply"></i>  Listes des pages</button>

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
      <div class="panel-heading">Editer page</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'pages/edit';?>">
		
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
                    <label class="col-sm-12 control-label bold">Nom </label>
                    <div class="col-sm-12">
                      <input type="text" name="page_name" class="form-control input-rounded" value="<?php echo $page->page_name;?>">
                    </div>
                  </div>	
			
  
	                <div class="form-group">
                    <label class="col-sm-12 control-label bold">Description</label>
                    <div class="col-sm-12">
                       <textarea name="page_description"><?php echo $page->page_description;?></textarea>
             
       
                    </div>
                  </div>	
 
		  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Titre </label>
                    <div class="col-sm-12">
                      <input type="text" name="page_title" class="form-control input-rounded" value="<?php echo $page->page_title;?>">
                    </div>
                  </div>
				
		       <div class="form-group">
                    <label class="col-sm-12 control-label bold">Meta Titre</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" value="<?php echo $page->page_meta_title;?>" name="page_meta_title">
                    </div>
                  </div>
				  
				    
                  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Meta Description	</label>
                    <div class="col-sm-12">
                   

                   <input type="text" class="form-control"  id="page_meta_description"  name="page_meta_description" value="<?php echo $page->page_meta_description;?>">
					
				  </div>
                  </div>
				                    <div class="form-group">
                    <label class="col-sm-12 control-label bold">Meta Keyword	</label>
                    <div class="col-sm-12">  
					<input type="text" value="<?php echo $page->page_meta_keywords;?>" name="page_meta_keywords"  class="form-control" />
                    </div>
                  </div>
				
				 <input type="hidden" name="page_image" id="page_image" value="<?=$page->page_image;?>">   	   
				
		 <input type="hidden"  name="page_id" id="page_id" value="<?=$page->page_id;?>">
		<div class="form-group">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder bold">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une image du de pages  
					<input id="upload-select" name="logo" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   </div>
		  </div>
              		  <div class="form-group" id="block-product" >
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" style="width: 20%;" alt="avatar" id="block-image-product" src="<?php echo base_url().'medias/pages/'. $page->page_image;; ?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
				</div>
			</div>
			
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
 $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'pages/uploadFile/';?>', // upload url

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
				$("#page_image").val(response);
				$("#block-image-product").attr("src","<?php echo base_url().'medias/pages/'; ?>"+response);
				$("#block-product").show();
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

$(".btn-success").click(function () {

		$( "#submitpage" ).submit();
});

});
	


</script>