	<div style="text-align:right;margin-bottom:10px;">
 
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
      <div class="panel-heading">Paramètres </div>
      <div class="panel-body">
    <div class="panel">
			 <div class="panel-heading" style="text-align: center;font-weight: bold;">Catégories</div>
			 </div></br>
		<div class="row">
            <div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'categories';?>'"><i class=" glyphicon ion-navicon-round"></i> Catégories</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'categories/subCategories';?>'"><i class=" glyphicon ion-navicon-round"></i> Sous Catégories</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'categoriesCouffin/';?>'"><i class=" glyphicon ion-navicon-round"></i> Catégories Couffin</button>

            </div>
          </div>
		   <div class="panel">
			 <div class="panel-heading" style="text-align: center;font-weight: bold;">Produits</div>
			 </div></br>
		  <div class="row">
            <div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'news';?>'"><i class=" glyphicon ion-navicon-round"></i> Listes des articles</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'optionsTypes';?>'"><i class=" glyphicon ion-navicon-round"></i> Types d'option</button>

            </div>
			<!--<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'attributs';?>'"><i class=" glyphicon ion-navicon-round"></i> Attributs</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'attributsValues';?>'"><i class=" glyphicon ion-navicon-round"></i> Listes des valeurs de attributs</button>

            </div>-->
	  
          </div>
		  		   <div class="panel">
			 <div class="panel-heading" style="text-align: center;font-weight: bold;">Client</div>
			 </div></br>
		   <div class="row">
            	<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'customers';?>'"><i class=" glyphicon ion-navicon-round "></i> Inscriptions</button>

            </div>
				
            </div>
		<div class="panel">
			 <div class="panel-heading" style="text-align: center;font-weight: bold;">Configuration</div>
			 </div></br>
			    <div class="row">
		    <div class="col-lg-2">
			
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'accounts';?>'"><i class=" glyphicon ion-navicon-round "></i> Administrateurs</button>

            </div>
            	<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'pages';?>'"><i class=" glyphicon ion-navicon-round "></i> Pages</button>

            </div>
				<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'Settings';?>'"><i class=" glyphicon ion-navicon-round"></i> Reglage</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'sociaux';?>'"><i class=" glyphicon ion-navicon-round"></i> Réseaux sociaux</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'contacts';?>'"><i class=" glyphicon ion-navicon-round"></i> Mes Contacts</button>

            </div>
			<div class="col-lg-2">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'status';?>'"><i class=" glyphicon ion-navicon-round"></i> Status des commandes</button>

            </div>
			
		<div class="col-lg-2" style="padding-top: 10px;">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'countries';?>'"><i class=" glyphicon ion-navicon-round"></i> Pays</button>

            </div>
<div class="col-lg-2" style="padding-top: 10px;">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'taxe';?>'"><i class=" glyphicon ion-navicon-round"></i> TVA</button>

            </div>
			<div class="col-lg-2" style="padding-top: 10px;">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'banners';?>'"><i class=" glyphicon ion-navicon-round"></i> Bannières </button>

            </div>
			<div class="col-lg-2" style="padding-top: 10px;">
             <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'homeBlocks';?>'"><i class=" glyphicon ion-navicon-round"></i> Block page d'accieul</button>

            </div>
            </div>
          </div>
     
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	
	
$("#customer_id").change(function() {
	 var customer_id=  $(this).val() ;
	 
		  jQuery.ajax({
		   url: "<?php echo base_url().'cart/getCodePostal/';?>",
		   data: {customer_id:customer_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
					$('.parneters').text(data.partener_lastname) ;
					$('.code').text(data.partener_zip) ;
								}	
			})	
});
 });
</script>	 
