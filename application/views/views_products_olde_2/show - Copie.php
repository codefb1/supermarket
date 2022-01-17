	<div style="text-align:right;margin-bottom:10px;">
	   <button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-ok"></i> <span>Mise Ajour</span></button>
           
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
      <div class="panel-heading">Editer produit</div>
	   <h2 class="page_title" style="text-align: center;"><?php echo $product->product_name;?> </h2>
 
      <div class="panel-body">
      
	
		<?php if(@$this->uri->segment(3) == 1) { ?>
					<div class="alert alert-success"> <i class="zmdi zmdi-check"></i> Mise à jour réussie</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 2) { ?>
					<div class="alert alert-danger"> <i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Mise à jour échouée !</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
					  <div class="row">
					 <div class="col-md-3 info_product">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         
				  <div class="title_block">  <h4 class="widget-title"><b>Général</b>
				        <a href="#" class="updateInfoGenernal btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="okInfoGenernal btn green btn-sm  btn-success hidden" data-type="general"><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelInfoGenernal btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>
					</h4></div>
				  <div class=" message message_general"> </div>
				
		 
				 <form  role="form">
			
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label">Catégories</label>
							<div class="col-md-8">
						 
							              <select  id="categorie_id"  name="categorie_id" class="form-control  btn-xs" disabled>
			  	  <option value=""> Selectionnez une catégorie...</option>
			    <?php foreach($categories_list as $categorie) :?>
										<option <?php  if($product->categorie_id==$categorie->categorie_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_id;?>"> <?php echo $categorie->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> 
							
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label">Catégories</label>
							<div class="col-md-8">
						 
							             <select  id="sub_categorie_id"  name="sub_categorie_id" class="form-control  btn-xs" disabled>
			  <option value=""> Selectionnez une catégorie...</option>
			    <?php foreach($sub_categories_list as $categorie) :?>
										<option <?php  if($product->sub_categorie_id==$categorie->categorie_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_id;?>"> <?php echo $categorie->categorie_name;?></option>
										 <?php endforeach; ?>
									</select>
							
							</div>
						</div>
						</div>
				 </form>
				
			
				
                </div>
                
              </div>
            </div> 
					
				 <div class="col-md-4 info_product">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         
				  <div class="title_block">  <h4 class="widget-title"><b>Poids / Prix / Marge</b>
				        <a href="#" class="updateInfoPoidsPriceMarge btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="okInfoPoidsPriceMarge btn green btn-sm  btn-success hidden" data-type="ppm"><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelInfoPoidsPriceMarge btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>
					</h4></div>
				  <div class=" message message_ppm"> </div>
				    <form  role="form">
					<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Poids (kg)</label>
							<div class="col-md-7">
						    <input id="product_poids" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_poids" value="<?php echo $product->product_poids;?>" disabled>
             
							</div>
						</div>
						</div>
		
				<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Prix Tolal  (€)</label>
							<div class="col-md-7">
				         <input id="product_total_price" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_total_price" value="<?php echo $product->product_total_price;?>" disabled>
              
							</div>
						</div>
						</div>
			
			 	<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Prix de vente / Kg (€)</label>
							<div class="col-md-7">
				            <input id="product_price_selling"  disabled class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_selling" value="<?php echo $product->product_price_selling;?>" disabled>
             
							</div>
						</div>
						</div>
			 
	<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Marge (%)</label>
							<div class="col-md-7">
				               <input id="product_price_marge_percente" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_marge_percente" value="<?php echo $product->product_price_marge_percente;?>" disabled>
             
							</div>
						</div>
						</div>
			
			<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Prix en promo (€)</label>
							<div class="col-md-7">
				              <input id="product_price_dicount" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_dicount" value="<?php echo $product->product_price_dicount;?>" disabled>
             
							</div>
						</div>
						</div>
		
			
				</form>
			
				
				
			
				
                </div>
                
              </div>
            </div> 	
					
				







	
				 <div class="col-md-5 info_product">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         
				  <div class="title_block">  <h4 class="widget-title"><b>Détail</b>
				        <a href="#" class="updateInfoDetail btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="okInfoDetail btn green btn-sm  btn-success hidden" data-type="detail"><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelInfoDetail btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>
					</h4></div>
							 	
             
				  <div class=" message message_detail"> </div>
				  <form  role="form">
					<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Nom</label>
							<div class="col-md-7">
						   <input id="product_name" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_name" value="<?php echo $product->product_name;?>" disabled>
             
							</div>
						</div>
						</div>
		
				<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Référence</label>
							<div class="col-md-7">
                 <input id="product_ref" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_ref" value="<?php echo $product->product_ref;?>" disabled>
            
							</div>
						</div>
						</div>
			
			 	<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Mouton entier</label>
							<div class="col-md-7">
				        
              <select id="product_entier" name="product_entier" class="form-control  btn-xs" disabled>
			  <option value=""> Selectionnez...</option>
				<option value="0" <?php  if($product->product_entier==0){ echo"selected";} ?> > Non</option>
				<option value="1" <?php  if($product->product_entier==1){ echo"selected";} ?>> Oui</option>
					</select> 
							</div>
						</div>
						</div>
			 
	<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Stock  de produit</label>
							<div class="col-md-7">
				                
              <select id="product_stock" name="product_stock" class="form-control  btn-xs" disabled>
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product->product_stock==1){ echo"selected";} ?> > En stock</option>
				<option value="2" <?php  if($product->product_stock==2){ echo"selected";} ?>> Non stock</option>
				<option value="3" <?php  if($product->product_stock==3){ echo"selected";} ?>> Rupture de stock</option>
					</select>  
							</div>
						</div>
						</div>
			
								<div class="row">
								<div class="form-group">
								<label  class="col-md-5 control-label">Short Description</label>
								<div class="col-md-7">
								<input id="product_short_text" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_short_text" value="<?php echo $product->product_short_text;?>" disabled>

								</div>
								</div>
								</div>
		<?php foreach($attributs_list as $attributs) :?>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label"><?php echo $attributs->attribut_name;?></label>
							<div class="col-md-7">
				                
               <select  multiple  id="attribut_value_ids"  name="attribut_value_ids[<?php echo $attributs->attribut_id;?>][]" class="form-control  btn-xs attribut_value_ids" disabled>
			 
			    <?php foreach($attributs_values_list as $attribut_value) :?>
				<?php  if($attribut_value->attribut_id==$attributs->attribut_id){  ?>
										<option  <?php foreach($product_attribut_list as $product_attribut) :?> <?php  if($attribut_value->attribut_value_id==$product_attribut->attribut_value_id){  ?> selected  <?php  } ?> <?php endforeach; ?>    value="<?php echo $attribut_value->attribut_value_id;?>"> <?php echo $attribut_value->attribut_value;?></option>
										<?php  } ?>
									<?php endforeach; ?>
									</select> 
							</div>
						</div>
						</div>
				
				<?php endforeach; ?>
				
				
			
				
								<div class="row">
								<div class="form-group">
								<label  class="col-md-5 control-label">Articles</label>
								<div class="col-md-7">
							
								   <select  id="new_id"  name="new_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez un'article...</option>
				
			    <?php foreach($news_list as $news) :?>
										<option <?php  if($product->new_id==$news->new_id){ echo"selected";} ?> value="<?php echo $news->new_id;?>"> <?php echo $news->new_title;?></option>
										 <?php endforeach; ?>
									</select>
									   <?php  if($product->new_id){  ?>
          <div class="">  <label  for="F1" style="display: inline-block;">Consulte l'article </label>
 <a target="_blank" href="<?php echo base_url().'news/edit/'.$product->new_id;?>"><button style="
    font-size: 7px;
    position: relative;
    top: 5px;
"type="button" class="btn btn-outline btn-success"><i class=" glyphicon glyphicon-eye-open"></i> </button></a>
					
		  </div><?php  } ?>
								</div>
								</div>
								</div>
								
									<div class="row">
								<div class="form-group">
								<label  class="col-md-5 control-label">Meta Titre</label>
								<div class="col-md-7">
							
								<input id="product_meta_title" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_title" value="<?php echo $product->product_meta_title;?>" disabled>

								</div>
								</div>
								</div>
								
								
									<div class="row">
								<div class="form-group">
								<label  class="col-md-5 control-label">Meta description</label>
								<div class="col-md-7">
							
					 <input id="product_meta_description" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_description" value="<?php echo $product->product_meta_description;?>" disabled>
             
								</div>
								</div>
								</div>
								<div class="row">
								<div class="form-group">
								<label  class="col-md-5 control-label">Meta Keywords</label>
								<div class="col-md-7">

					<input id="product_meta_keywords" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_keywords" value="<?php echo $product->product_meta_keywords;?>" disabled>
              
								</div>
								</div>
								</div>	
								</form>
								
							
                </div>
                
              </div>
            </div> 	
				
		 <input type="hidden" class="form-control" name="product_id" id="product_id" value="<?=$product->product_id;?>">
							 	
             
       
     
    </div>
  </div>
</div></div>
	 
<script type="text/javascript">
$('.updateInfoGenernal').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoGenernal').removeClass('hidden');
			$('.okInfoGenernal').removeClass('hidden');
               elem.closest('.portlet').find('.updateInputs input').attr('disabled', false);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoGenernal').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoGenernal').removeClass('hidden');
			$('.okInfoGenernal').addClass('hidden');
            elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});
		
	$('.updateInfoPoidsPriceMarge').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoPoidsPriceMarge').removeClass('hidden');
			$('.okInfoPoidsPriceMarge').removeClass('hidden');
               elem.closest('.portlet').find('.updateInputs input').attr('disabled', false);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoPoidsPriceMarge').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoPoidsPriceMarge').removeClass('hidden');
			$('.okInfoPoidsPriceMarge').addClass('hidden');
            elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});	
		$('.updateInfoDetail').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoDetail').removeClass('hidden');
			$('.okInfoDetail').removeClass('hidden');
               elem.closest('.portlet').find('.updateInputs input').attr('disabled', false);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoDetail').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoDetail').removeClass('hidden');
			$('.okInfoDetail').addClass('hidden');
            elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});	
		$('.okInfoDetail, .okInfoGenernal ,.okInfoPoidsPriceMarge').click(function(e){
			var elem = $(this);
			var currObj = {};
		   var attribut_value = {};
			var data = {
				datas: {},
				type : '',
				attribut_value_ids : ''
			};
			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);

			elem.closest('.portlet').find('form:eq(0) input').each(function(){
				currObj[this.name] = this.value;
				
			});
			elem.closest('.portlet').find('form:eq(0) select').each(function(){
				currObj[this.name] = this.value;
				
			});
			
            $(".message").text('');
			data.datas = currObj;
            data.product_id = <?=$product->product_id;?>;
			data.type = $(this).attr('data-type');
			if(data.type=="detail"){
				elem.closest('.portlet').find('form:eq(0) .attribut_value_ids').each(function(){
				attribut_value[this.value] = this.value;
				
			}); 
				data.attribut_value_ids=attribut_value;
			}
			$.ajax({
				url : "<?php echo base_url().'products/updateProduct/';?>",
				data : data,
				method : 'POST',
				dataType : 'json',
				success : function (data){
					
						elem.addClass('hidden');
						$('.updateInfoDetail').removeClass('hidden');
						$('.okInfoDetail').addClass('hidden');
						$('.cancelInfoDetail').addClass('hidden');
						
						$('.updateInfoPoidsPriceMarge').removeClass('hidden');
			            $('.okInfoPoidsPriceMarge').addClass('hidden');
			            $('.cancelInfoPoidsPriceMarge').addClass('hidden');
						
						$('.updateInfoGenernal').removeClass('hidden');
			            $('.okInfoGenernal').addClass('hidden');
			            $('.cancelInfoGenernal').addClass('hidden');
						elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
  		                elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
						 jQuery(".message_"+data.type).text('Mise à jour réussie');
						 if($product_price_selling){
							 $('.product_price_selling').val(dara.product_price_selling);
						 }
	                     $(".message_"+data.type).css('display','block');
					
					
				}
			});
		});
$("#categorie_id").change(function() {
	 var categorie_id=  $(this).val() ;
	 html=  "";
		  jQuery.ajax({
		   url: "<?php echo base_url().'categories/getSubCategoriebyCateg/';?>",
		   data: {categorie_id:categorie_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
								html+=   '  <option value="0">Selectionner une sous catégorie...</option>'
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

		$( "#submitpage" ).submit();
});

});
	


</script>

<style>
.underline {text-decoration: underline;margin-right: 10px;}


	.update {
    left: 24px;
    position: relative;
	}
	.message {
		color: #68c12c;
		text-align: center;
		position: relative;
		top: -7px;
		font-weight: bold;
	}
	.form-control[disabled] {
    
  background-color:transparent!important;
   
    border: none!important;
	color: #000!important;
    OPACITY: 1!important;
}

	
	.action_block1 {
		width: 21%;
		display: inline-block;
	}
	.title_block1 {
		width: 72%;
		display: inline-block;;
	}
	
	.info_product label {
			font-weight: bold!important;
			font-size: 12px!important;
			position: relative!important;
			top: 9px!important;
	}
	.info_product .portlet {
		border-width: 2px!important;
		border-style: solid!important;
		border-color: #90EE90!important;
		padding: 10px;
	}
	
.info_product	.row + .row{
    margin-top: 6px;
}
	.info_product .widget-title {
		
	
	}
	
 
</style>