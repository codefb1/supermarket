	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'paimentsPartners';?>'"><i class=" fa fa-reply"></i>  Liste des paiments  parteners</button>

 </div>

<div class="row">
  <div class="alert alert-success alert-dismissable fade in" id="sne-notification-success" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-checkmark"></i> OK</strong> Enregistrement avec succès</span> </div>
  <div class="alert alert-danger alert-dismissable fade in" id="sne-notification-error" style="display:none;">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <span><strong><i class="ion-ios7-close"></i> OK</strong> Enregistrement echoué</span> </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Nouvelle   paiment</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?php echo base_url().'paimentsPartners/add';?>">
		
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
                <label  for="F1">Partenaire </label>
              <select  id="partener_id"  name="partener_id" class="form-control  btn-xs">
			  <option value="">Selectionner</option>
					
			    <?php foreach($parteners as $partener) :?>
										<option <?php  if($partener->partener_id==$partener_id){ echo"selected";} ?> value="<?php echo $partener->partener_id;?>"> <?php echo $partener->partener_lastname;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div>
			</div>
			
			
			    <div class="form-group" >
			   <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Facture </label>
              <select  multiple  id="orders_id"  name="orders_id[]" class="form-control  btn-xs">
			
									</select> </div>
             
            </div>
			</div>
			
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Somme des facutres <span class="amount_sum"></span>  </label>
				
               
              </div>
             
            </div>
         
            </div>
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Montant  </label>
                <input id="name" class="form-control" type="text"  name="payment_amount" value="">
              </div>
             
            </div>
         
            </div>
			
					 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Date de paiment  </label>
                 
				
				<div class="col-lg-2"> <input id="name" class="form-control" type="date"  name="datepayement" value=""> </div> <div class="col-lg-2">  <input id="datepayement" class="form-control" type="time"  name="datetime" value=""> </div>
              </div>
             
            </div>
         
            </div>    
      
				         
		
            	<div class="form-group">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder bold">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer l'image de justification  <input id="upload-select" name="payment_preuve" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   </div>
		  </div>
              		  <div class="form-group" id="block-payment-preuve" style="display:none;">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" style="width: 20%;" alt="avatar" id="block-image-payment-preuve" src="" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
					</div>
				</div>
			</div>
            <input type="hidden" id="payment_preuve" name="payment_preuve" value="" />
				
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
$("#partener_id").change(function() {
	 var partener_id=  $(this).val() ;
	 html=  "";
	 $("#orders_id").html('') ;		
		  jQuery.ajax({
		   url: "<?php echo base_url().'orders/get_facture_not_paiments/';?>",
		   data: {partener_id:partener_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
							
							for(orders in data.orders_list)
								{ 
								   html+= '<option  value="'+ data.orders_list[orders].order_id +'"> Facture '+ data.orders_list[orders].order_id +'  avec prix : '+ data.orders_list[orders].order_partener_amount +' </option>'
								}
								   $("#orders_id").html(html) ;		
								}
			})	
});
        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'paimentsPartners/uploadFile/';?>', // upload url

            allow : '*.(jpg|jpeg|gif|png|doc|docx|pdf)', // allow only images

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
				$("#payment_preuve").val(response);
				$("#block-image-payment-preuve").attr("src","<?php echo base_url().'medias/payment_preuves/'; ?>"+response);
				$("#block-payment-preuve").show();
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
	$( "#orders_id" ).change(function() {
			var orders_id= $(this).val();
			jQuery.ajax({
				url: "<?php echo base_url().'orders/get_sum_facture_not_paiments/';?>",
				data: {orders_id:orders_id},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						
                  $( ".amount_sum" ).html(data.amount_sum+' €');
						} 
				}    
			});
			
		});


</script>