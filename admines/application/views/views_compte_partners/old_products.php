
 <div class="panel panel-default page-panel">
 

 <h1 class="page_title title_page" >Liste des   <span>produits</span> </h1>

<div class="row">
			<?php	foreach($products_list as $products) :
			  
					if($products->product_data_status==1){$label='label-success';$status='Activer';}
					if($products->product_data_status==2){$label='label-warning';$status='Rupture de stock';}
					if($products->product_data_status==0){$label='label-danger';$status='Désactiver';}
					if($products->show_poids==1){$class_show_poids="label-success";$show_poids="Oui";}
					if($products->show_poids==0){$class_show_poids=" label-danger";$show_poids='Non';}
					$sub_categorie ="";
					if($products->sub_categorie_id){$sub_categorie = $this->M_categories->get_this($products->sub_categorie_id);$sub_categorie =$sub_categorie->categorie_name;}
					$image =$this->M_products_pictures->get_one_product_picture_partener($products->product_id);
					$path ="";
					if($image){
					$path =base_url().'medias/products/'.$image->product_pictures;
					}else {
					$path =base_url().'template/assets/img/inconu.png';	
					}
					$price_buying =0;

					$prices_buying =$this->M_products->get_prix_product_parteners($products->product_id);
                     if($prices_buying){
						 $price_buying =$prices_buying->price_buying;
					 }
					if($products->product_stock==1){$product_stock="En stock";}
					if($products->product_stock==2){$product_stock="Non stock";}
					if($products->product_stock==3){$product_stock="Rupture de stock";}
                            ?>
<div class="col-md-4 col-sm-4 col-lg-4 " >
<div class="row product">
<div class="col-md-12 col-sm-12 col-lg-12 info_product  product_in_stock_background_green <?php if($products->is_disponible!=1){  ?> product_not_stock_background_green  <?php } ?>">
 <div class="row product_img">
	<img data-dz-thumbnail="" src="<?php echo $path; ?>" data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>"  data-disponible="<?php echo $products->is_disponible;?>" class="img-responsive img-<?php echo $products->product_id;?>">
	</div>
	 <div class="row product_name">
	 <h2 ><img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" ><b> <?php echo $products->product_name;?></b> <img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" class=""> </h2>
	 </div>
	 
	   <div class="row product_grille_price" style="">
	   <div class="col-md-2 col-sm-2 col-lg-2 " > </div>
	     <div class="col-md-8 col-sm-8 col-lg-8 product_price" >
	    <div class="">
                                  <span> 
                                     € <input id="price_buying_<?php  echo $products->product_id;?>"  disabled class="form-control price_buying" type="text" data-parsley-required="true" data-parsley-type="alphanum"  value="<?php echo (number_format($price_buying, 2, ',', '')) ?>" disabled>
             
								  </span>
								  <span style="position: relative;right: 1px;font-size: 12px;"> /Kg</span>
								        <a href="#" class="updatePrice updatePrice_<?php  echo $products->product_id;?> btn yellow btn-sm btn-primary" data-product=<?php  echo $products->product_id;?> style=""><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="historiquePrice  historiquePrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-warning" data-product=<?php  echo $products->product_id;?>  data-partener=<?php  echo $products->partener_id;?> ><i class="glyphicon glyphicon-euro"></i></a>
    					
						<a href="#" class="okPrice  okPrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-success hidden" data-product="<?php  echo $products->product_id;?>" data-product-partener="<?php  echo $products->product_partener_id;?>" data-partener="<?php echo $partener->partener_id;?>" ><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelPrice cancelPrice_<?php  echo $products->product_id;?> btn red btn-sm  btn-danger hidden" data-product=<?php  echo $products->product_id;?>><i class="glyphicon glyphicon-remove"></i></a>
					 </div></div>
					 <div class="col-md-2 col-sm-2 col-lg-2 " > </div>
                              </div>
							  
</div>
</div>
</div>
<?php endforeach; 	 ?>
</div>









<div class="col-sm-12">
 <h2 class="page_title" style="text-align: center;"> Liste des produits  <?php echo $partener->partener_lastname;?> <span class="hidden"> <?php echo $partener->partener_city;?></span> </h2>
 
</div>


<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	   <div class="row">
	      <form method="GET" action="<?=base_url().'comptedPartener/products/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	 <div class="form-group">
			
			

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
			<a href="<?=base_url();?>comptedPartener/products/?filtercheck=1&keywordPr=N&categorie_idPr=N" class="btn btn-w-md btn-danger">Réinitialiser la rechecher</a>
		</div></div>
		
	</form></div>
      					<div class="row product_grille " >
						<?php	foreach($products_list as $products) :
			  
					if($products->product_data_status==1){$label='label-success';$status='Activer';}
					if($products->product_data_status==2){$label='label-warning';$status='Rupture de stock';}
					if($products->product_data_status==0){$label='label-danger';$status='Désactiver';}
					if($products->show_poids==1){$class_show_poids="label-success";$show_poids="Oui";}
					if($products->show_poids==0){$class_show_poids=" label-danger";$show_poids='Non';}
					$sub_categorie ="";
					if($products->sub_categorie_id){$sub_categorie = $this->M_categories->get_this($products->sub_categorie_id);$sub_categorie =$sub_categorie->categorie_name;}
					$image =$this->M_products_pictures->get_one_product_picture_partener($products->product_id);
					$path ="";
					if($image){
					$path =base_url().'medias/products/'.$image->product_pictures;
					}
					$price_buying =0;

					$prices_buying =$this->M_products->get_prix_product_parteners($products->product_id);
                     if($prices_buying){
						 $price_buying =$prices_buying->price_buying;
					 }
					if($products->product_stock==1){$product_stock="En stock";}
					if($products->product_stock==2){$product_stock="Non stock";}
					if($products->product_stock==3){$product_stock="Rupture de stock";}
                            ?>
							 
							<div class="col-lg-3 col-sm-3 col-md-3">
							  <div>
							    <a href="#" class="product_grille_action product_dispo_val_<?php  echo $products->product_id;?>" data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>"  data-disponible="<?php echo $products->is_disponible;?>"> <img data-dz-thumbnail="" src="<?php echo $path; ?>" data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>"  data-disponible="<?php echo $products->is_disponible;?>" class="img-responsive product_grille_img img-<?php echo $products->product_id;?>  <?php if($products->is_disponible!=1){  ?> product_grille_stock  <?php } ?>">
						                  
                      </a>
							  </div>
							  <div class="product_grille_name">
                            <a href="<?php echo base_url().'products/edit/0/'.$products->product_id;?>"> <span class=""> <?php echo $products->product_name;?> </span></a>
						            </div>
							  <div class="product_grille_price">
                                  <span> 
                                      <input id="price_buying_<?php  echo $products->product_id;?>"  disabled class="form-control price_buying" type="text" data-parsley-required="true" data-parsley-type="alphanum"  value="<?php echo (number_format($price_buying, 2, ',', '')) ?>" disabled>
             
								  </span>
								  <span style="position: relative;right: 1px;font-size: 12px;"> euro/Kg</span>
								        <a href="#" class="updatePrice updatePrice_<?php  echo $products->product_id;?> btn yellow btn-sm btn-primary" data-product=<?php  echo $products->product_id;?>><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="historiquePrice  historiquePrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-warning" data-product=<?php  echo $products->product_id;?>  data-partener=<?php  echo $products->partener_id;?> ><i class="glyphicon glyphicon-euro"></i></a>
    					
						<a href="#" class="okPrice  okPrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-success hidden" data-product="<?php  echo $products->product_id;?>" data-product-partener="<?php  echo $products->product_partener_id;?>" data-partener="<?php echo $partener->partener_id;?>" ><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelPrice cancelPrice_<?php  echo $products->product_id;?> btn red btn-sm  btn-danger hidden" data-product=<?php  echo $products->product_id;?>><i class="glyphicon glyphicon-remove"></i></a>
					
                              </div>
							  <div class="product_grille_dispo">
							 
							 
                                <span <?php if($products->is_disponible < 2){  ?>style="display:none; "<?php } ?>class="product_not_fornisseur  product_not_<?php  echo $products->product_id; ?>">   Reputre de stock</span>
								

								
                              </div>
                         </div>
							
							
						 <?php endforeach; 	 ?>
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
	<div aria-hidden="true" aria-labelledby="historiques" role="dialog" tabindex="-1" id="historiques" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Historiques du prix:  <span class="product_name_historique"></span></h4>
				</div>
				<div class="modal-body">
					
					
					 <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
            
				  <th class="sub_col" >Nouveau Prix (€)</th>
				  <th class="sub_col" >Ancien Prix (€)</th>
				  <th class="sub_col">Date de modifecation</th>
                 
                </tr>
              </thead>
			  <tbody class="list_historiques">
			  
 

            
			  </tbody>
            </table>
			
				</div>
				  <div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
				</div>
				
			</div>
		</div>

<script type="text/javascript">

$(document).ready(function () {

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
						 
						 jQuery('.is_disponible_'+data.product_id).val(1);
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
		$( ".product_grille_action" ).click(function() {

		    var is_disponible=$(this).attr('data-disponible');
			var partener_id=$(this).attr('data-partener');
			var product_id=$(this).attr('data-product');
			jQuery('.message').css('display','none');
			jQuery('.message').text('');
			if(is_disponible==1){
				is_disponible=2;
				$(this).attr('data-disponible',2);
					
			}else {
				is_disponible=1;
				$(this).attr('data-disponible',1);
			}
			jQuery.ajax({
				url: "<?php echo base_url().'productspartners/disponibleProductPartener/';?>",
				data: {product_id:product_id,is_disponible:is_disponible,partener_id:partener_id},
				dataType: "json",
				
				type: "POST", 
				success: function(data) { 
				if(data.is_disponible==1){
					//$('.product_dispo_val_'+data.product_id).attr('data-disponible',2);
					
					jQuery('.img-'+data.product_id).removeClass('product_grille_stock');
						jQuery('.product_not_'+data.product_id).css('display','none');
					
				} else {
					//$('.product_dispo_val_'+data.product_id).attr('data-disponible',1);
					jQuery('.img-'+data.product_id).addClass('product_grille_stock');
					jQuery('.product_not_'+data.product_id).css('display','block');
					
					}
					//jQuery('.message_disponible_'+data.product_id).text('Mise à jour réussie');
                   
					//jQuery('.message_disponible_'+data.product_id).css('display','block');
						
				}    
			});
		});
  
		$('.updatePrice').click(function(e){
			e.preventDefault();
			var elem = $(this);
			var product_id = elem.attr('data-product');
			elem.addClass('hidden');
			$('.cancelPrice_'+product_id).removeClass('hidden');
			$('.okPrice_'+product_id).removeClass('hidden');
			$('.historiquePrice_'+product_id).addClass('hidden');
          elem.closest('.product_grille_price').find('input').attr('disabled', false);
			//elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelPrice').click(function(e){
			e.preventDefault();
			var elem = $(this);
			var product_id = elem.attr('data-product');
			elem.addClass('hidden');
			$('.updatePrice_'+product_id).removeClass('hidden');
			$('.okPrice_'+product_id).addClass('hidden');
			$('.historiquePrice_'+product_id).removeClass('hidden');
           elem.closest('.product_grille_price').find('input').attr('disabled', true);
			//elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});
		$('.okPrice').click(function(e){
			e.preventDefault();
			var elem = $(this);
			var product_id = elem.attr('data-product');
			var user=$(this).attr('data-partener');
			var type='Boucherie';
			var price_buying=$('#price_buying_'+product_id).val();
			var product_partener_id=$(this).attr('data-product-partener');
			$.ajax({
				url : "<?php echo base_url().'productspartners/updateProductPartenerPrice/';?>",
				data :  {product_id:product_id,product_partener_id:product_partener_id,user:user,price_buying:price_buying,type:type},
				method : 'POST',
				dataType : 'json',
				success : function (data){
					
						elem.addClass('hidden');

							$('.okPrice_'+data.product_id).addClass('hidden');
							$('.cancelPrice_'+data.product_id).addClass('hidden');
							$('.updatePrice_'+data.product_id).removeClass('hidden');
							$('.historiquePrice_'+data.product_id).removeClass('hidden');
			  elem.closest('.product_grille_price').find('input').attr('disabled', true);
						
				}
			});
		});
		$('.historiquePrice').click(function(e){
			e.preventDefault();
			var product_id = $(this).attr('data-product');
			var partener_id=$(this).attr('data-partener');
			var type='Boucherie';
			var product_partener_id=$(this).attr('data-product-partener');
			$.ajax({
				url : "<?php echo base_url().'productspartners/getLogProductPartenerPrice/';?>",
				data :  {product_id:product_id,partener_id:partener_id,type:type},
				method : 'POST',
				dataType : 'json',
				success : function (data){
								$('.product_name_historique').text(data.product_name);
					jQuery('.list_historiques').html('');
				for(product in data.logProductPartenerPrice){ 
			$( ".list_historiques" ).append('<tr class=""> <td class="sub_col">'+data.logProductPartenerPrice[product].new_price_buying+'</td><td class="sub_col">'+data.logProductPartenerPrice[product].old_price_buying+'</td><td class="sub_col">'+data.logProductPartenerPrice[product].log_data_created+'</td></tr>' );	
					}
					jQuery('#historiques').modal('show');
				}	
				
			});
		});
		  
});
	
</script>
<style>
.form-control[disabled] {
background-color:transparent!important;
border: none!important;
color: #000!important;
OPACITY: 1!important;
}
.price_buying {
width: 25%;
display: inline-block;
	}
	</style>