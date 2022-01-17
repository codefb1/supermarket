

<div class="row">
  <div class="alert alert-success alert-dismissable fade in" id="sne-notification-success" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-checkmark"></i> OK</strong> Enregistrement avec succès</span> </div>
  <div class="alert alert-danger alert-dismissable fade in" id="sne-notification-error" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-close"></i> KO</strong> Enregistrement echoué</span> </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Paramètres générales</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'settings';?>">
		
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
                    <label class="col-sm-12 control-label bold"> Titre de la page   </label>
                    <div class="col-sm-12">
                      <input type="text" name="page_title" class="form-control input-rounded" value="<?=$setting->page_title;?>">
                    </div>
                  </div>
				  
				   <div class="row">
                    <label class="col-sm-12 control-label bold"> Description de la page   </label>
                    <div class="col-sm-12">
                      <input type="text" name="page_meta_description" class="form-control input-rounded" value="<?=$setting->page_meta_description;?>">
                    </div>
                  </div>
				  
				   <div class="row">
                    <label class="col-sm-12 control-label bold"> keywords de la page   </label>
                    <div class="col-sm-12">
                      <input type="text" name="page_meta_keywords" class="form-control input-rounded" value="<?=$setting->page_meta_keywords;?>">
                    </div>
                  </div>
				   <div class="row">
                    <label class="col-sm-12 control-label bold hidden "> Texte top page   </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_titre_1" class="form-control input-rounded" value="<?=$setting->home_block_titre_1;?>">
                    </div>
                  </div>
				  
				   <div class="row">
                    <label class="col-sm-12 control-label bold"> Texte footer (Qui somme nous)   </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_titre_5" class="form-control input-rounded" value="<?=$setting->home_block_titre_5;?>">
                    </div>
                  </div>
				  				   <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Texte footer page  1 </label>
                    <div class="col-sm-12">
                      <input type="text" name="" class="form-control input-rounded" value="">
					  <textarea name="footer_text"><?=$setting->footer_text;?></textarea>
             
                    </div>
                  </div>
					   <div class="row">
                    <label class="col-sm-12 control-label bold"> Email  </label>
                    <div class="col-sm-12">
                      <input type="text" name="email" class="form-control input-rounded" value="<?=$setting->email;?>">
                    </div>
                  </div>
				    </div>
				  
					 
				     <div class="form-group">
					 <div class="row">
                    <label class="col-sm-12 control-label bold"> L'addresse </label>
                    <div class="col-sm-12">
                      <input type="text" name="address" class="form-control input-rounded" value="<?=$setting->address;?>">
                    </div>
                  </div>
				   </div>
				      <div class="form-group">
					 <div class="row">
                    <label class="col-sm-12 control-label bold"> L'addresse 1 </label>
                    <div class="col-sm-12">
                      <input type="text" name="address_1" class="form-control input-rounded" value="<?=$setting->address_1;?>">
                    </div>
                  </div>
				   </div>
				      <div class="form-group">
					 <div class="row">
                    <label class="col-sm-12 control-label bold"> L'addresse 2 </label>
                    <div class="col-sm-12">
                      <input type="text" name="address_2" class="form-control input-rounded" value="<?=$setting->address_2;?>">
                    </div>
                  </div>
				   </div>
				   <div class="form-group">
					 <div class="row">
                    <label class="col-sm-12 control-label bold"> Téléphone </label>
                    <div class="col-sm-12">
                      <input type="text" name="phone" class="form-control input-rounded" value="<?=$setting->phone;?>">
                    </div>
                  </div>
				   </div>
				   
				     <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home de  l'entreprise  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_titre_6" class="form-control input-rounded" value="<?=$setting->home_block_titre_6;?>">
                    </div>
                  </div>
				  
				
				  
				  
				    <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home description  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_desc_6" class="form-control input-rounded" value="<?=$setting->home_block_desc_6;?>">
                    </div>
                  </div>
				  
				  
				    <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home Nombre de project  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_nbr_dossiers" class="form-control input-rounded" value="<?=$setting->home_nbr_dossiers;?>">
                    </div>
                  </div>
				  
				  <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home Nombre de client  heureux </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_color_6" class="form-control input-rounded" value="<?=$setting->home_block_color_6;?>">
                    </div>
                  </div>
				  
				   <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home Nombre ACTIF  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_desc_en_6" class="form-control input-rounded" value="<?=$setting->home_block_desc_en_6;?>">
                    </div>
                  </div>
				  
				  <div class="row hidden ">
                    <label class="col-sm-12 control-label bold"> Block Home WON AWARD  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_titre_en_6" class="form-control input-rounded" value="<?=$setting->home_block_titre_en_6;?>">
                    </div>
                  </div>
				 
				  <div class="row hidden ">
				<label class="col-sm-12 control-label bold"> Block Home Expert  </label>
				<div class="col-sm-12">
				<input type="text" name="home_block_desc_3" class="form-control input-rounded" value="<?=$setting->home_block_desc_3;?>">
				</div>
				</div>
				  
				
				  
				  
				    <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home Secure Services  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_block_desc_en_3" class="form-control input-rounded" value="<?=$setting->home_block_desc_en_3;?>">
                    </div>
                  </div>
				  
				  
				    <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home Low Costing  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_top_desc" class="form-control input-rounded" value="<?=$setting->home_top_desc;?>">
                    </div>
                  </div>
				  
				  <div class="row hidden">
                    <label class="col-sm-12 control-label bold"> Block Home On Time  </label>
                    <div class="col-sm-12">
                      <input type="text" name="home_top_desc_1" class="form-control input-rounded" value="<?=$setting->home_top_desc_1;?>">
                    </div>
                  </div>
				   
				
				    <div class="row">
                    <label class="col-sm-12 control-label bold"> Text cookie  </label>
                    <div class="col-sm-12">
                      <input type="text" name="cookie" class="form-control input-rounded" value="<?=$setting->cookie;?>">
					  
                    </div>
                  </div>
				  
				    <div class="row">
                    <label class="col-sm-12 control-label bold"> Text newsletter  </label>
                    <div class="col-sm-12">
                      <input type="text" name="newsleter_text" class="form-control input-rounded" value="<?=$setting->newsleter_text;?>">
					  
                    </div>
                  </div> </br></br>
				   <div class="col-sm-12">
				      <label class="col-sm-12 control-label bold"> Banniére page boucherie </label></br></br>
			    <div class="form-group">
				   <div class="row">
                    <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  bannier  <input id="upload-select" name="boucherie_bannier" id="logo" type="file"></a>
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
							<img data-dz-thumbnail=""   alt="avatar" id="block-image-banners" src="<?php echo base_url().'medias/banners/'.$setting->boucherie_bannier;?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
                  </div>
				   </div>
				    </div>
					<input type="hidden" id="boucherie_bannier" name="boucherie_bannier" value="<?=$setting->boucherie_bannier;?>" />
				  
				 </div> </br></br>
				   <div class="col-sm-12">
				      <label class="col-sm-12 control-label bold"> Banniére page association </label></br></br>
			    <div class="form-group">
				   <div class="row">
                    <div id="upload-drop-association" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  bannier  <input id="upload-select-association" name="association_bannier" id="logo" type="file"></a>
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
							<img data-dz-thumbnail=""   alt="avatar" id="block-image-association_bannier" src="<?php echo base_url().'medias/banners/'.$setting->association_bannier;?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
                  </div>
				   </div>
				    </div>
					<input type="hidden" id="association_bannier" name="association_bannier" value="<?=$setting->association_bannier;?>" />
				  
          <input type="hidden" class="form-control" name="setting_id" id="setting_id" value="<?=$setting->setting_id;?>">
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
            settingsassociation    = {
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
				$("#association_bannier").val(response);
				$("#block-image-association_bannier").attr("src","<?php echo base_url().'medias/banners/'; ?>"+response);
				$("#block-association_bannier").show();
                setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);

                //alert("Upload Completed")
            }
        };

        var select = UIkit.uploadSelect($("#upload-select-association"), settingsassociation),
            drop   = UIkit.uploadDrop($("#upload-drop-association"), settingsassociation);
			//alert(select);
    });

</script>	 

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
				$("#boucherie_bannier").val(response);
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
