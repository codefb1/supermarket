    <link href="//cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css" rel="stylesheet">
    
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'template/';?>bootstrap-colorpicker.js"></script>
 <link href="<?php echo base_url().'template/';?>bootstrap-colorpicker.min.css" rel="stylesheet">
 <div class="row">
   <section class="panel">
	  <aside class="profile-nav col-lg-12">


		
		  <div class="panel-body">
          <div class="title">     	   	<header class="panel-heading">Gestion des bannières</header></div>
       	  
        </div> 
		 <div class="pull-right">
              <a href="<?php echo base_url().'banners';?>">  
			  <button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Liste des  bannières</button></a>
			</div>
<header class="panel-heading">Nouvelle bannière</header>
      
           <div class="panel-body">
		   
		   
		   
            <div class="row m-a-0">
              <div class="col-lg-12">
                <form class="form-horizontal" id="submitpage" role="form" method="POST" action="<?=base_url().'banners/edit';?>">
				
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
                    <label class="col-sm-12 control-label bold" style="color:<?php echo $banners->color_text;?>;"> Coleur deTitle</label>
                    <div class="col-sm-12">
                   <input type="text" class="form-control" id="cp6"  name="color_text" value="<?php echo $banners->color_text;?>" />
  </div>
                  </div>
<script>
    $(function() {
        $('#cp6').colorpicker({
            color: "#88cc33",
            horizontal: true
        });
    });
</script>
					   <label class="col-sm-12 control-label bold" style="    color: red;tEXT-ALIGN: CENTER;font-size: 18px;">Langue: FR  </label>
				  
				
                  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Title</label>
                    <div class="col-sm-12">
                      <input type="text" name="banner_title" id="banner_title" class="form-control" value="<?php echo $banners->banner_title;?>">
                    </div>
                  </div>

                
                      
			
			
			   <div class="form-group">
                   <label  class="col-sm-12 control-label bold">   Description</label>
				   
				   <textarea class="form-control" id="banner_text" name="banner_text"  ><?php echo $banners->banner_text;?></textarea>
					
				   
				   </div>
				   					   <label class="col-sm-12 control-label bold" style="    color: red;tEXT-ALIGN: CENTER;font-size: 18px;">Langue: EN  </label>
				  
				
                  <div class="form-group">
                    <label class="col-sm-12 control-label bold">Title</label>
                    <div class="col-sm-12">
                      <input type="text" name="banner_title_en" id="banner_title_en" class="form-control" value="<?php echo $banners->banner_title_en;?>">
                    </div>
                  </div>

                
                      
			
			
			   <div class="form-group">
                   <label  class="col-sm-12 control-label bold">   Description</label>
				   
				   <textarea class="form-control" id="banner_text_en" name="banner_text_en"  ><?php echo $banners->banner_text_en;?></textarea>
					
				   
				   </div>
				   
				   
				        <div class="form-group">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  bannière <input id="upload-select" name="banner_picture" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   </div>
		  </div>
                 
	<div class="form-group" id="block-banners" >
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail=""   alt="avatar" id="block-image-banners" src="<?php echo base_url().'medias/banners/'.$banners->banner_picture;?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
				</div>
			</div>
			    <div class="form-group">
			    <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
			
							  <input type="hidden" class="form-control" name="banner_id" id="banner_id" value="<?=$banners->banner_id;?>">
							  	<input type="hidden" id="banner_picture" name="banner_picture" value="<?=$banners->banner_picture;?>" />
                            	
                           
						  
						   </div>
                        </div>
                </form>
				 <button  class="btn btn-success pull-right"><i class="fa fa-check"></i> Mise à jour</button>
              </div>
            </div>
          </div></div> 
          </aside>		</section>   </div> 
<script type="text/javascript">
 jQuery(document).ready(function() {

 CKEDITOR.replace('banner_text');
	 CKEDITOR.replace('banner_text_en');
	
	

 });


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