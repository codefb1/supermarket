	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'products';?>'"><i class=" fa fa-reply"></i>  Liste des  produits</button>

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
      <div class="panel-heading">Nouveau produit</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'products/add';?>">
		
		<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
		
         
            </div>
			<div class="form-group" >					
  <div class="row">
              <div class="col-lg-4">
                <label  for="F1">Catégories </label>
              <select  id="categorie_id"  name="categorie_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez une catégorie...</option>
				
			    <?php foreach($categories_list as $categorie) :?>
										<option <?php  if($categorie_id==$categorie->categorie_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_id;?>"> <?php echo $categorie->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div></div>
			
			
			<div class="form-group" >					
  <div class="row">
              <div class="col-lg-4">
                <label  for="F1"> Sous catégories </label>
              <select  id="sub_categorie_id"  name="sub_categorie_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez sous catégorie...</option>
					</select> </div>
             
            </div></div>
			
			
			<div class="form-group" >					
  <div class="row">
              <div class="col-lg-4">
                <label  for="F1">Recettes </label>
              <select  id="new_id"  name="new_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez recette...</option>
				
			    <?php foreach($news_list as $news) :?>
										<option <?php  if($new_id==$news->new_id){ echo"selected";} ?> value="<?php echo $news->new_id;?>"> <?php echo $news->new_title;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div></div>
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom  </label>
                <input id="product_name" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_name" value="<?php echo $product_name;?>">
              </div>
             
            </div>
         
            </div>
				  	<div class="row">
								<div class="form-group">
								<label  class="col-md-12 control-label"> Description</label>
								<div class="col-md-12">
							     <textarea  id="product_short_texts" name="product_short_texts"><?php echo $product_short_text;?></textarea>
             
								</div>
								</div>
								</div>
								<div class="row">
						<div class="form-group">
							<label  class="col-md-12 control-label"> Short Description </label>
							<div class="col-md-12">
						   <input id="product_short_description" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_short_description" value="<?php echo $product_short_description;?>" >
             
							</div>
						</div>
						</div>
			
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Poids  (kg)</b></label>
                <input id="product_poids" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_poids" value="<?php echo $product_poids;?>">
              </div>
             
            </div>
         
            </div>
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Prix Tolal  (€)(Moutant entier association)</b> </label>
                <input id="product_total_price" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_total_price" value="<?php echo $product_total_price;?>">
              </div>
             
            </div>
         
            </div> 
			  <div class="form-group " >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Prix d'achat / Kg (€) </b></label>
                <input id="product_price" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price" value="<?php echo $product_price;?>">
              </div>
             
            </div>
         
            </div>
			<div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Marge (%) </b></label>
                <input id="product_price_marge_percente" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_marge_percente" value="<?php echo $product->product_price_marge_percente;?>">
              </div>
             
            </div>
         
            </div>
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Prix en promo (€)</b></label>
                <input id="product_price_dicount" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_dicount" value="<?php echo $product_price_dicount;?>">
              </div>
             
            </div>
         
            </div>
			<div class="row">
						<div class="form-group">
							
							<div class="col-lg-12">
				        <label  class=" control-label">Label Rouge</label>
              <select id="product_label_rouge" name="product_label_rouge" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product_label_rouge==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product_label_rouge==2){ echo"selected";} ?>> Oui</option>
					</select> 
							</div>
						</div>
						</div>
						
						
						<div class="row">
						<div class="form-group">
						
							<div class="col-lg-12">
				        	<label  class=" control-label">BIO</label>
              <select id="product_bio" name="product_bio" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product_bio==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product_bio==2){ echo"selected";} ?>> Oui</option>
					</select> 
							</div>
						</div>
						</div>
						
							<div class="row">
						<div class="form-group">
							
							<div class="col-lg-12">
				        <label  class=" control-label">Origin France</label>
              <select id="product_origin" name="product_origin" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product_origin==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product_origin==2){ echo"selected";} ?>> Oui</option>
					</select> 
							</div>
						</div>
						</div>
							<div class="row">
						<div class="form-group">
						
							<div class="col-lg-12">
				        	<label  class=" control-label">Promotion (bouchier)</label>
              <select id="product_promo" name="product_promo" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product_promo==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product_promo==2){ echo"selected";} ?>> Oui</option>
					</select> 
							</div>
						</div>
						</div>
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label for="F1">En promotion  </label>
              <select id="product_is_promo" name="product_is_promo" class="form-control  btn-xs">
				<option value="1" <?php  if($product_is_promo==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product_is_promo==2){ echo"selected";} ?>> Oui</option>
					</select>  
					
			   </div>
			 </div>
			 </div>
				 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label for="F1">Mouton entier </label>
              <select id="product_entier" name="product_entier" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="0" <?php  if($product_entier==0){ echo"selected";} ?> > Non</option>
				<option value="1" <?php  if($product_entier==1){ echo"selected";} ?>> Oui</option>
					</select>  
					
			   </div>
			 </div>
			 </div>
			 	 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label for="F1">Mouton entier association </label>
              <select id="product_entier_association" name="product_entier_association" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="0" <?php  if($product_entier_association==0){ echo"selected";} ?> > Non</option>
				<option value="1" <?php  if($product_entier_association==1){ echo"selected";} ?>> Oui</option>
					</select>  
					
			   </div>
			 </div>
			 </div>
			 
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label for="F1">Meilleurs vente </label>
              <select id="product_best_seller" name="product_best_seller" class="form-control  btn-xs">
				<option value="1" <?php  if($product_best_seller==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product_best_seller==2){ echo"selected";} ?>> Oui</option>
					</select>  
					
			   </div>
			 </div>
			 </div>
			 
			<div class="form-group">
            <div class="row">
			<div class="col-lg-4">
                <label for="F1">Stock  de produit </label>
              <select id="product_stock" name="product_stock" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product_stock==1){ echo"selected";} ?> > En stock</option>
				<option value="2" <?php  if($product_stock==2){ echo"selected";} ?>> Non stock</option>
				<option value="3" <?php  if($product_stock==3){ echo"selected";} ?>> Rupture de stock</option>
					</select>  
					
			   </div>
			    </div>
				 </div>
			
								 

											 
  <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"> Information  sur le poids</label>
               <input id="product_info" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_info" value="<?php echo $product_info;?>">
             

</div>
             
            </div>
         
            </div>
			
		
	
  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Meta Titre  </label>
                <input id="product_meta_title" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_title" value="<?php echo $product_meta_title;?>">
              </div>
             
            </div>
         
            </div>
			
								  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Meta description  </label>
                <input id="product_meta_description" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_description" value="<?php echo $product_meta_description;?>">
              </div>
             
            </div>
         
            </div>
			
								  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Meta Keywords  </label>
                <input id="product_meta_keywords" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_keywords" value="<?php echo $product_meta_keywords;?>">
              </div>
             
            </div>
         
            </div>
					
		
			
			<input id="product_short_text"  type="hidden"  name="product_short_text" value="">
             
  
			
              	
              </br> </br>
        </form>
		<div class="form-sep">
            <div class="pull-right">
              <button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-ok"></i> <span>Enregistrer</span></button>
            </div>
          </div>
     </br> </br>
    </div>
  </div>
</div> 
 <script src="<?php echo base_url().'template/';?>tinymce.min.js" ></script>	 
<script type="text/javascript">

$("#categorie_id").change(function() {
	 var categorie_id=  $(this).val() ;
	 html=  "";
		  jQuery.ajax({
		   url: "<?php echo base_url().'categories/getSubCategoriebyCateg/';?>",
		   data: {categorie_id:categorie_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
								html+=   '  <option value="0">Selectionner sous catégorie...</option>'
								for(subcategory in data.subcategory_list)
								{ 
								   html+= '<option  value="'+ data.subcategory_list[subcategory].categorie_id +'"> '+ data.subcategory_list[subcategory].categorie_name +' </option>'
								}
								   $("#sub_categorie_id").html(html) ;		
								}	
			})	
});	
$(document).ready(function () {

$(".btn-success").click(function () {
var product_short_text =   tinyMCE.get('product_short_texts').getContent();
$("#product_short_text").val(product_short_text);	
		$( "#submitpage" ).submit();
});

});
	


</script>