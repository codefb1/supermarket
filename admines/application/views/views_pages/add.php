 <div class="page-title">
          <div class="title">Gestion des  pages et des metas</div>
          <div class="sub-title"></div>
        </div>  
		<div class="row" style="padding-bottom: 10px;">
		   <div class="pull-right">
              <a href="<?php echo base_url().'pages';?>">  
			  <button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Listes des pages </button></a>
			</div>
		</div>
        <div class="card bg-white">
          <div class="card-header">
Nouvelle page
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">
                <form class="form-horizontal" id="submitpage" role="form" method="POST" action="<?=base_url().'pages/add';?>">
				
					<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
                  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Nom</label>
                    <div class="col-sm-12">
                      <input type="text" name="page_name" id="page_name" class="form-control">
                    </div>
                  </div>
				  
			
			

 <div class="form-group">
                    <label class="col-sm-12 control-label bold">Description</label>
                    <div class="col-sm-12">
                       <textarea name="page_description"><?php echo $page->page_description;?></textarea>
             
       
                    </div>
                  </div>		 
				   <div class="form-group">
                    <label class="col-sm-12 control-label bold">Titre</label>
                    <div class="col-sm-12">
                      <input type="text" name="page_title" class="form-control input-rounded">
                    </div>
                  </div>
				
				  
				 
	              
				   
                  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Meta Titre</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="page_meta_title">
                    </div>
                  </div>
				  
				    
                  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Meta Description	</label>
                    <div class="col-sm-12">
                   <input type="text" class="form-control"  id="page_meta_description"  name="page_meta_description">
					 </div>
                  </div>
				                    <div class="form-group">
                    <label class="col-sm-12 control-label bold">Meta Keyword	</label>
                    <div class="col-sm-12">  
					<input type="text" value="" name="page_meta_keywords"  class="form-control" />
                    </div>
                  </div>
				              
		<div class="form-group">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder bold">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer l'image du page  <input id="upload-select" name="page_image" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   </div>
		  </div>
              		  <div class="form-group" id="block-product" style="display:none;">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" style="width: 20%;" alt="avatar" id="block-image-product" src="" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
				</div>
			</div>
			
		  
		  
		  			
			
				  		
		  
		  
		  			
			    <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
							<input type="hidden" id="page_image" name="page_image" value="" />
						 	
							<input type="hidden" name="data_status"  id="data_status" value="1">
							<input type="hidden" name="page_content"  id="page_content" value="">
							</div>
                        </div>
                </form> 
				 <button  class="btn btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
              </div>
            </div>
          </div>
        </div><style>
		.form-horizontal .control-label {
    text-align: left!IMPORTANT; 
}</style>
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

</script>
<script type="text/javascript">

$(document).ready(function () {
	
	$(".btn-success").click(function () {
		

	$( "#submitpage" ).submit();
});

});
	
</script>
 
