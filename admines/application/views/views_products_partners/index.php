

<div class="col-sm-6">
  <h1 class="page_title">Produits</h1>
  <p class="text-muted">Liste des produits </p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'productspartners';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>
 <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'partners';?>'"><i class=" fa fa-reply"></i>  Listes des  partenaires</button>

   </div>

</div>
<div class="col-sm-12">
  <h2 class="page_title" style="text-align: center;">Partenaire:  <?php echo $partener->partener_lastname;?></h2>
 <h3 class="page_title" style="text-align: center;">Adress:   <?php echo $partener->partener_adress.' '. $partener->partener_zip.' '. $partener->partener_city;?></h3>

</div>
<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	   <div class="row">
	      <form method="GET" action="<?=base_url().'productspartners/index/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	 <div class="form-group">
			
			
<input name="partener_idPr" id="partener_idPr" type="hidden"  value="<?php echo $partener->partener_id;?>">
			
			  <div class="row">

			<div class="col-lg-4">
			<label>Rechecher par :</label>
			<input name="keywordPr" id="keywordPr" type="text"  class="form-control" placeholder="  Référence ,Nom" value="<?php echo $keyword;?>">
			</div>
			
			

              <div class="col-lg-4">
                <label  for="F1">Catégories </label>
              <select  id="categorie_idPr"  name="categorie_idPr" class="form-control  btn-xs">
			  <option value=""> Selectionnez une catégorie...</option>
				
			    <?php foreach($categories_list as $categorie) :?>
										<option <?php  if($categorieId==$categorie->categorie_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_id;?>"> <?php echo $categorie->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
									
								
             
            </div>
			 
		

			<div class="col-lg-12" style="    text-align: center; padding-bottom: 15px;padding-top: 15px;">
			<button type="submit"  class="btn btn-w-md btn-accent">Rechecher</button> 
			<a href="<?php echo base_url()."productspartners/index/?exports=1"?>" class="btn btn-w-md btn-success hidden">Exporter en XLS</a>
			<a href="<?=base_url();?>productspartners/index/?filtercheck=1&keywordPr=N&partener_idPr=<?php echo $partener->partener_id;?>&categorie_idPr=N" class="btn btn-w-md btn-danger">Réinitialiser la rechecher</a>
		</div></div>
		
	</form></div>
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="news_table">
              <thead>
              
                <tr>
				  <th></th>
					<th class="sub_col">Référence</th>
					<th class="sub_col"  style="width: 5%;">Photo</th>
					<th class="sub_col">Nom</th>
					<th class="sub_col">Catégorie</th>
					<th class="sub_col">Sous catégorie</th>
					<th class="sub_col">Poids</th>
					<th class="sub_col hidden">Prix</th>
					<th class="sub_col" style="width: 12%;">Prix d'achat</th>
					<th class="sub_col">Marge</th>
					<th class="sub_col">Prix de vente</th>
					<th class="sub_col" >Stock fournisseur</th>
					<th class="sub_col" >Stock</th>
					<th class="sub_col" >Statut</th>
					<th class="sub_col" >Action</th>
                
                </tr>
              </thead>
              <?php foreach($products_list as $products) :
			  
			  if($products->product_data_status==1){$label='label-success';$status='Activer';}
					  if($products->product_data_status==2){$label='label-warning';$status='Rupture de stock';}
							if($products->product_data_status==0){$label='label-danger';$status='Désactiver';}
						if($products->show_poids==1){$class_show_poids="label-success";$show_poids="Oui";}
						if($products->show_poids==0){$class_show_poids=" label-danger";$show_poids='Non';}
						$sub_categorie ="";
						if($products->sub_categorie_id){$sub_categorie = $this->M_categories->get_this($products->sub_categorie_id);$sub_categorie =$sub_categorie->categorie_name;}
						$image =$this->M_products_pictures->get_one_product_picture($products->product_id);
						$path ="";
						if($image){
							$path =base_url().'medias/products/'.$image->product_pictures;
						}
						
						if($products->product_stock==1){$product_stock="En stock";}
						if($products->product_stock==2){$product_stock="Non stock";}
						if($products->product_stock==3){$product_stock="Rupture de stock";}
						$price_buying ="";
						
						$productParneter= $this->M_products->get_this_product_parneter($products->product_id,$partener->partener_id);
						if($productParneter){
							$price_buying =$productParneter->price_buying;
							
						}
						?>
						
						
               <tr class="supp-<?php  echo $products->product_id;?>"> 
			   <td class="sub_col" >  <span class="position_text delete_price_<?php  echo $products->product_id;?>"   <?php	if($price_buying){  echo'style="display:inline-block"'; 	} else {  echo'style="display:none"';}  ?>><i class=" glyphicon glyphicon-euro"></i> </span> </td>
			   	 <td class="sub_col" > <span class="position_text"> <?php echo $products->product_ref;?> </span> </td>
						<td class="sub_col" > <span class="position_text"> 
						<?php if($path){ $path =base_url().'medias/products/'.$image->product_pictures; ?>
						<img data-dz-thumbnail=""  alt="avatar" id="block-image-banners" src="<?php echo $path; ?>" class="img-responsive">
						
						<?php } ?>
							
						
						</span> </td>
							
						<td class="sub_col" > <span class="position_text"> <?php echo $products->product_name;?> </span> </td>
						<td class="sub_col" > <span class="position_text" > <?php echo $products->categorie_name;?> </span> </td>
						<td class="sub_col" > <span class="position_text"> <?php echo $sub_categorie;?> </span> </td>
											
						<td class="sub_col" > <span class="position_text"> <?php echo $products->product_poids;?> kg </span> </td>
						
             
												
			    				<td class="sub_col hidden" > <span class="position_text"  >  <?php echo (number_format($products->product_price, 2, ',', ''))."  €" ?>  </span> </td> 
						<td class="sub_col" >
						
						<div><input type ="text" name="price" id="price-<?php echo $products->product_id;?>" class=" price-<?php echo $products->product_id;?> form-control" data-id="<?php echo $products->product_name;?>" value="<?php echo $price_buying;?>">	</div>
						
						
						  <span style="color: #68c12c;" class="message message_<?php  echo $products->product_id;?>"> </span>	
						</td>
								<td class="sub_col" > <span class="position_text"  >  <?php echo (number_format($products->product_price_marge_percente, 2, ',', ''))." %" ?>  </span> </td>
						
								<td class="sub_col" > <span class="position_text"  >  <?php echo (number_format($products->product_price_selling, 2, ',', ''))."  €" ?>  </span> </td>
					<td class="sub_col" > <span class="position_text"> <?php echo $product_stock;?> </span> </td>
					     <td class="sub_col" >
				 <div    data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>" class="delete_price_<?php  echo $products->product_id;?>"  <?php	if($price_buying){  echo'style="display:inline-block"'; 	} else {  echo'style="display:none"';}  ?> >
				 <select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" data-partener="<?php echo $partener->partener_id;?>" name="ddlCreditCardTypeTab" class="is_disponible is_disponible_ <?php echo $products->product_id;?> btn-xs">
										<option <?php  if($is_disponible==0){ echo"selected";} ?> value="0">  Non stock</option>
										<option <?php  if($is_disponible==1){ echo"selected";} ?> value="1"> En stock</option>
									</select></div>
									 <span style="color: #68c12c;" class="message message_disponible_<?php  echo $products->product_id;?>"> </span>
									
				 </td>
						<td class="sub_col" ><span  class=" position_text span-<?php  echo $products->product_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			          
                  
				  
				 <td class="sub_col" > <div class="pr_<?php  echo $products->product_id;?>"><a  data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>" class="add_edit_price_partners"  ><button type="button" class="btn btn-success"> <i class=" glyphicon glyphicon-saved"></i></button></a>
					
							<a  data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>"  class="delete_price_partners  delete_price_<?php  echo $products->product_id;?>"  <?php	if($price_buying){  echo'style="display:inline-block"'; 	} else {  echo'style="display:none"';}  ?> ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
						
					
						</div></td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
          </div>
		     <div style="text-align:right;margin-bottom:10px;">
   <?=$pagination;?>
  
  </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
	<div aria-hidden="true" aria-labelledby="parteners" role="dialog" tabindex="-1" id="parteners" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Liste des partenaires de  <span class="product_name"></span></h4>
				</div>
				<div class="modal-body">
					
					
					 <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
            
				  <th class="sub_col" >Nom</th>
				     <th class="sub_col">Prix d'achat (€)</th>
                 
                </tr>
              </thead>
			  <tbody class="list_products">
			  
 

            
			  </tbody>
            </table>
			
				</div>
				  <div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
				</div>
				
			</div>
		</div>
	</div>
	

<script type="text/javascript">

$(document).ready(function () {
 $(".modalconfirm").click(function () {
		var product_id=$(this).attr('data-id');
		jQuery('.url').val(product_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	 $(".show_poid").click(function () {
		var product_id=$(this).attr('data-id');
		var show_poids=$(this).attr('data-status');
		var	show_poid=1;
		if(show_poids ==1) {
		var	show_poid=0;
	     }
	jQuery.ajax({
				url: "<?php echo base_url().'products/showPoids/';?>",
				data: {product_id:product_id,show_poids:show_poid},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.show_poids ==0) {
						$('.poid_'+product_id).removeClass('inbox-started');	
						$('.poid_'+product_id).attr('data-status',0);
						} 
						else 
						{
						$('.poid_'+product_id).addClass('inbox-started');	
						$('.poid_'+product_id).attr('data-status',1);
						}
				}
			});
		
	});
	
		$(".suppconfirm").click(function () {
			var product_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'products/delete/';?>",
				data: {product_id:product_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+product_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/updatestatus/';?>",
				data: {product_id:product_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+product_id).empty();

						if(idsatus == 1){$( '.span-'+product_id ).removeClass( "label-danger label-warning" );$( '.span-'+product_id ).addClass( "label-success" );$('.span-'+product_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+product_id ).removeClass( "label-success label-warning" );$( '.span-'+product_id ).addClass( "label-danger" );$('.span-'+product_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
			$( ".show_poids" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/show_poids/';?>",
				data: {product_id:product_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
						//	$('.msg').show(0).delay(7000).hide(200);
						});					
						//$('html, body').animate({scrollTop:0}, 'slow');
						//$('.show_poids-'+product_id).empty();

						if(idsatus == 1){$( '.show_poids-'+product_id ).removeClass( "label-danger label-warning" );$( '.show_poids-'+product_id ).addClass( "label-success" );$('.show_poids-'+product_id).html('Oui'); }
						if(idsatus == 0){$( '.show_poids-'+product_id ).removeClass( "label-success label-warning" );$( '.show_poids-'+product_id ).addClass( "label-danger" );$('.show_poids-'+product_id).html('Non'); }
						
						
						
						} 
				}    
			});
		});
		
		$(".add_edit_price_partners").click(function () {
			var partener_id=$(this).attr('data-partener');
			var product_id=$(this).attr('data-product');
			jQuery('.message').css('display','none');
			jQuery('.message').text('');
			var price_buying=$(".price-"+product_id).val();
			jQuery.ajax({
				url: "<?php echo base_url().'productspartners/addEdit/';?>",
				data: {product_id:product_id,partener_id:partener_id,price_buying:price_buying},
				dataType: "json",
				type: "POST",  
				success: function(data) {
					if(data.result==1){ 
						 jQuery('.message_'+data.product_id).text('Mise à jour réussie');
					}
                    else{
						jQuery('.message_'+data.product_id).text('Ajout avec succée');
					}	
					jQuery('.message_'+data.product_id).css('display','block');
						jQuery('.delete_price_'+data.product_id).css('display','inline-block');
				}
			});
			
		});
		$(".delete_price_partners").click(function () {
			var partener_id=$(this).attr('data-partener');
			var product_id=$(this).attr('data-product');
			jQuery('.message').css('display','none');
			jQuery('.message').text('');
		
			jQuery.ajax({
				url: "<?php echo base_url().'productspartners/delete/';?>",
				data: {product_id:product_id,partener_id:partener_id},
				dataType: "json",
				type: "POST",  
				success: function(data) {
					
						 jQuery('.message_'+data.product_id).text('Le produit est suprimer.');
					
                   
					jQuery('.message_'+data.product_id).css('display','block');
						jQuery('.delete_price_'+data.product_id).css('display','none');
				}
			});
			
		});
  
		
});
$( ".is_disponible" ).change(function() {
			var is_disponible= $(this).val();
		
			var partener_id=$(this).attr('data-partener');
			var product_id=$(this).attr('data-id');
			jQuery('.message').css('display','none');
			jQuery('.message').text('');
		
			jQuery.ajax({
				url: "<?php echo base_url().'productspartners/disponibleProductPartener/';?>",
				data: {product_id:product_id,is_disponible:is_disponible,partener_id:partener_id},
				dataType: "json",
				
				type: "POST", 
				success: function(data) { 
					jQuery('.message_disponible_'+data.product_id).text('Mise à jour réussie');
                   
					jQuery('.message_disponible_'+data.product_id).css('display','block');
						
				}    
			});
		});
	
</script>