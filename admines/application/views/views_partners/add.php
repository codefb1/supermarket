	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'partners';?>'"><i class=" fa fa-reply"></i>  Listes des  partenaires</button>

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
      <div class="panel-heading">Nouvelle partenaire</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'partners/add';?>">
		
		<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
				 <div class="form-group" style="display:none">
        
         
            </div>
		<div class="form-group" >
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Type de partenaire </label>
              <select  id="partener_type"  name="partener_type" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			   
										<option <?php  if($partener_type==1){ echo"selected"; } ?> value="1"> Boucherie</option>
										 <option <?php  if($partener_type==2){ echo"selected"; } ?> value="2"> Autre</option>
									</select> </div>
             
            </div>
			</div>
			
			
			 <div class="form-group is_type "  style="display:none;" >
			  
			
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Certificats </label>
              <select  id="certificat_id"  name="certificat_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			   
										  <?php foreach($certificats_list as $certificats) :?>
										<option <?php  if($certificat_id==$certificats->certificat_id){ echo"selected";} ?> value="<?php echo $certificats->certificat_id;?>"> <?php echo $certificats->certificat_name;?></option>
								 <?php endforeach; ?>
									</select> </div>
             
            </div>
			</div>
					  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Partenaire </label>
                <input id="partener_lastname" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_lastname" value="<?php echo $partener_lastname;?>">
              </div>
             
            </div>
         
            </div>
			
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom de responsable </label>
                <input id="partener_repensable" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_repensable" value="<?php echo $partener_repensable;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Numéro SIRET</label>
                <input id="partener_siret" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_siret" value="<?php echo $partener_siret;?>">
              </div>
             
            </div>
         
            </div>
				 <div class="form-group is_type "  style="display:none;">
            <div class="row">
              <div class="col-lg-12">
                <label class="req" for="F1">Identifiant</label>
                <input id="partener_user" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_user" value="<?php  echo $partener->partener_user;?>">
              </div>
             
            </div>
         
            </div>
		  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Email  </label>
                <input id="partener_email" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_email" value="<?php echo $partener_email;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group is_type "  style="display:none;">
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Mot de passe   </label>
                <input id="partener_password" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_password" value="<?php echo $partener_password;?>">
              </div>
             
            </div>
         
            </div>
			
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Adress  </label>
                <input id="partener_adress" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_adress" value="<?php echo $partener_adress;?>">
              </div>
             
            </div>
         
            </div>
			
				<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Code postal  </label>
                <input id="partener_zip" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_zip" value="<?php echo $partener_zip;?>">
              </div>
             
            </div>
         
            </div>
			
			
			
				<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Ville  </label>
                <input id="partener_city" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_city" value="<?php echo $partener_city;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Numéro téléphone  </label>
                <input id="partener_phone" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_phone" value="<?php echo $partener_phone;?>">
              </div>
             
            </div>
           
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"> Numéro téléphone  portable </label>
                <input id="partener_phone_portable" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="partener_phone" value="<?php echo $partener_phone_portable;?>">
              </div>
             
            </div>
           
            </div>
			
						
		
 <div class="form-group is_type"  style="display:none;">
			   <div class="row">
			  <div class="col-lg-12">
                <label  for="F1">Code postal  </label>
				       <select
                    multiple="multiple"
                    name="departement_ids[]"
                    id="code_zip_select"
                >
                    <?php foreach($code_zip_list as $code_zip) : ?>
					     <option value="<?php echo $code_zip->departement_id?>"><?php echo $code_zip->departement_code;?> </option>
                 <?php endforeach; ?>
                </select>
					</div>
					</div>
         
            </div>	


					        	 <div class="form-group">
			   <div class="row">
				  <div id="upload-drop" class="uk-placeholder bold">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer la cértifecation 
					<input id="upload-select" name="partener_certif" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   </div>
		  </div>
              		  <div class="form-group" id="block-partner" >
			   <div class="row">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
						<img data-dz-thumbnail="" style="width: 20%;" alt="avatar" id="block-image-partner" src="<?php echo base_url().'medias/parteners/'. $partener_certif;; ?>" class="img-responsive">
						
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
				</div>
			</div>	 	
        	 				<input type="hidden" id="partener_certif" name="partener_certif" value="<?=$partener_certif;?>" />
			    
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

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'template/';?>multi.min.css" />
<script src="<?php echo base_url().'template/';?>multi.min.js"></script>
  <script src="<?php echo base_url().'template/';?>bootstrap-typeahead.js"></script>
<script type="text/javascript">

    $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'partners/uploadFile/';?>', // upload url

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
				$("#partener_certif").val(response);
				$("#block-image-partner").attr("src","<?php echo base_url().'medias/parteners/'; ?>"+response);
				$("#block-partner").show();
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

$("#SNE").click(function () {

		$( "#submitpage" ).submit();
});



	$("#partener_type").change(function() {
			var partener_type=  $(this).val();
			$(".is_type").css('display','none');

			if(partener_type==1){
			$(".is_type").css('display','block');
			}		
		});	
		$("#add_product").click(function () {
						var product_id =$('#product_id').val();
			if(product_id){
				
				var product_text =$('#product_text').val();
				$( ".list_products" ).append(' <tr class="supp-'+product_id+'"> <td class="sub_col">'+product_text+'<input name="product_ids['+product_id+']" class="hidden" value=""></td><td class="sub_col"><input name="price_buying['+product_id+'][] " class="form-control" value=""></td><td class="sub_col"><button type="button" class="btn btn-danger remove_product" onclick="removeProduct('+product_id+')"><i class=" glyphicon glyphicon-trash"></i></button></td></tr>' );	
					}
			$('#product_text').val("");
				$('#product_id').val("");		  
			});

});

function removeProduct(id) {
    
        $('.supp-'+id).html('');
}

</script>
<script>

			 var select = document.getElementById("code_zip_select");
            multi(select, {
                non_selected_header: "Liste des codes postaux",
                selected_header: "Liste des codes postaux séléctionner"
            });
        </script>