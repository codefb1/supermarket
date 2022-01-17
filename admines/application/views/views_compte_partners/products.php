
 <div class="panel panel-default page-panel">
 

 <h1 class="page_title title_page" >Liste des   <span>produits</span> </h1>
 <div class="page_content" style="padding-top: 0px;">
  <div class="container-fluid">
   <div class="row saerch_product " >
	      <form method="GET" action="<?=base_url().'comptedPartener/products/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
			
			

			  <div class="row">

			<div class="col-lg-4" style="padding-right: 0px;">
			<label style="width: 30%;display: inline-block;position: relative;top: -3px;" >RECHECHER PAR :</label>
			<input style="width: 65%;display: inline-block;"  name="keywordPr" id="keywordPr" type="text"  class="form-control" placeholder="Nom" value="<?php echo $keyword;?>">
			</div>
			
			<div class="col-lg-2" style="padding-right: 0px;top: 4px;">
			
			<input type="checkbox" id="isdispo" value="1" <?php if( $isdispo){ ?> checked <?php } ?> name="isdispo">
			<label style="width: 80%;display: inline-block;position: relative;top: -3px;" > En rupture de stock  </label>
			</div>

              <div class="col-lg-3" style="padding-right: 0px;padding-left: 0px;">
                <label  for="F1" style="width: 25%;display: inline-block;left: -10px;position: relative;" >CATÉGORIES </label>
              <select  id="categorie_idPr"  name="categorie_idPr" class="form-control  btn-xs" style="width: 65%;display: inline-block;">
			  <option value=""> Selectionnez une catégorie...</option>
				
			    <?php foreach($categories_list as $categorie) :?>
										<option <?php  if($categorieId==$categorie->categorie_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_id;?>"> <?php echo $categorie->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
									
						 <div class="col-lg-3" style="padding-right: 0px;padding-left: 0px;">	
	<button type="submit"  class="btn btn-w-md btn-accent">Rechecher</button> 
			<a href="<?=base_url();?>comptedPartener/products/?filtercheck=1&keywordPr=N&categorie_idPr=N" class="btn btn-w-md btn-success">Réinitialiser</a>
								 
              </div>
            </div>
		
		
	</form></div>
      				
				
					
<div class="row">
<div class="page-loader"><span></span></div>	
  <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
			<?php	foreach($products_list as $products) :
			  
					if($products->product_data_status==1){$label='label-success';$status='Activer';}
					if($products->product_data_status==2){$label='label-warning';$status='En rupture de stock';}
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
						$image =$this->M_products_pictures->get_one_product_picture($products->product_id);
						if($image){
					     $path =base_url().'medias/products/'.$image->product_pictures;
					} else {
						$path =base_url().'template/assets/img/inconu.png';	
					}
					
					}
					$price_buying =0;
					$product_parneter =$this->M_products->get_this_product_parneter($products->product_id,$partener->partener_id);
                    $product_parneters =false;
				    $is_disponible="En rupture de stock";
					if($product_parneter){
						 $price_buying =$product_parneter->price_buying;
						 $product_parneters = true ;
					if($product_parneter->is_disponible==1){$is_disponible="En stock";}
					 }
                            ?>
<div class="col-md-4 col-sm-4 col-lg-4 swiper-slide <?php if($product_parneters and  $product_parneter->is_disponible==$isdispo ){  ?> hidden  <?php } ?>"  > 
<div class="row product">
<div class="col-md-12 col-sm-12 col-lg-12 info_product product_in_stock_background_green product_stock_<?php  echo $products->product_id;?>   <?php if($product_parneters and  $product_parneter->is_disponible!=1){  ?>  product_not_stock_background_red <?php } ?>" style="padding-bottom: 20px;">
 <div class="row product_img">
	<img data-dz-thumbnail="" src="<?php echo $path; ?>" data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>"  data-disponible="<?php echo $products->is_disponible;?>" class="img-responsive img-<?php echo $products->product_id;?>  <?php if($product_parneter->is_disponible==2){echo 'img_filter';}?> " > 
	</div>
	 <div class="row product_name">
	 <h2 ><img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" ><b> <?php echo $products->product_name;?></b> <img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" class=""> </h2>
	 </div>
	 
	   <div class="row product_grille_price">
	   <div class="col-md-1 col-sm-1 col-lg-1 " > </div>
	     <div class="col-md-10 col-sm-10 col-lg-10 product_price" >
	    <div class="">
                                  <span class="price price_<?php  echo $products->product_id;?>  <?php if($product_parneters and  $product_parneter->is_disponible!=1){  ?> not_stock  <?php } ?>"> 
                                    € <input id="price_buying_<?php  echo $products->product_id;?>"  disabled class="form-control price_buying <?php if($product_parneters and  $product_parneter->is_disponible!=1){  ?> not_stock  <?php } ?>" type="text" data-parsley-required="true" data-parsley-type="alphanum"  value="<?php echo (number_format($price_buying, 2, ',', '')) ?>" disabled>
								  </span>
								  <span class="product_poid"> /<?php  echo $products->product_poids;?> Kg</span>
								        <a href="#" class="updatePrice updatePrice_<?php  echo $products->product_id;?> btn yellow btn-sm btn-primary <?php if($product_parneters and  $product_parneter->is_disponible!=1){  ?>not_stock <?php } ?>" data-product=<?php  echo $products->product_id;?>><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="historiquePrice  historiquePrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-warning" data-product=<?php  echo $products->product_id;?>  data-partener=<?php  echo $products->partener_id;?> ><i class="glyphicon glyphicon-euro"></i></a>
    					
						<a href="#" class="okPrice  okPrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-success hidden" data-product="<?php  echo $products->product_id;?>" data-product-partener="<?php  echo $products->product_partener_id;?>" data-partener="<?php echo $partener->partener_id;?>" ><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelPrice cancelPrice_<?php  echo $products->product_id;?> btn red btn-sm  btn-danger hidden" data-product=<?php  echo $products->product_id;?>><i class="glyphicon glyphicon-remove"></i></a>
					 </div></div>
					 <div class="col-md-1 col-sm-1 col-lg-1 " > </div>
                              </div>
							    <div class="row product_caracteristique">
								<?php  if($products->product_bio==2){  ?>
								 <div class="col-md-3 col-sm-3 col-lg-3 " >
								<div class="img_caracteristique border-not-ckeck border-ckeck border_lr_<?php  echo $products->product_id;?> <?php if($product_parneters and $product_parneter->product_partener_bio==2){  ?> border-ckeck  <?php } ?>"><img src="<?php echo base_url().'template/';?>assets/img/label-rouge.png" alt="" ></div>
								<div class="checkbox_caracteristique hidden"> <input type="checkbox" <?php if(!$product_parneters ){  ?> disabled  <?php } ?> data-type="lr" data-id="<?php  echo $products->product_id;?>" data-partener="<?php echo $partener->partener_id;?>" id="label_lr_<?php  echo $products->product_id;?>" name= "lr" style="width: 25px" value="1"  class="lr_bio" <?php if(!$product_parneters){  ?> disabled  <?php } ?> <?php if($product_parneters and $product_parneter->product_partener_label_rouge==2){  ?> checked  <?php } ?>/></div>
								 </div>
								 	<?php   } ?>
										<?php  if($products->product_label_rouge==2){  ?>
                                 <div class="col-md-3 col-sm-3 col-lg-3  " >
								<div class="img_caracteristique border-not-ckeck border-ckeck  <?php if($product_parneters and $product_parneter->product_partener_label_rouge==2){  ?> border-ckeck  <?php } ?> border_bio_<?php  echo $products->product_id;?>"> <img src="<?php echo base_url().'template/';?>assets/img/bio.png" alt="" ></div>
								<div class="checkbox_caracteristique hidden"> <input type="checkbox" <?php if(!$product_parneters ){  ?> disabled  <?php } ?>  data-type="bio" data-id="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>" <?php if($product_parneters and $product_parneter->product_partener_bio==2){  ?> checked  <?php } ?>   id="label_bio_<?php  echo $products->product_id;?>" name= "bio" value="1"  class="lr_bio" <?php if(!$product_parneters){  ?> disabled  <?php } ?>/></div>
								 </div>
								 	<?php   } ?>
									<?php  if($products->product_origin==2){  ?>
								<div class="col-md-3 col-sm-3 col-lg-3  " >
								<div class="img_caracteristique border-not-ckeck  border-ckeck <?php if($product_parneters and $product_parneter->product_partener_origin==2){  ?> border-ckeck  <?php } ?> border_origin_<?php  echo $products->product_id;?>" ><img src="<?php echo base_url().'template/';?>assets/img/origine-france.png" alt="" ></div>
								<div class="checkbox_caracteristique hidden" ><input type="checkbox" <?php if(!$product_parneters ){  ?> disabled  <?php } ?> data-type="origin"  <?php if($product_parneters and $product_parneter->product_partener_origin==2){  ?> checked  <?php } ?>  data-id="<?php  echo $products->product_id;?>" data-partener="<?php echo $partener->partener_id;?>" id="label_origin_<?php  echo $products->product_id;?>" name= "bio" value="1"  class="lr_bio" <?php if(!$product_parneters){  ?> disabled  <?php } ?>/></div>
								</div>
									<?php   } ?>
									<?php  if($products->product_promo==2){  ?>
								<div class="col-md-3 col-sm-3 col-lg-3 " >
								<div class="img_caracteristique border-not-ckeck border-ckeck <?php if($product_parneters and $product_parneter->product_partener_promo==2){  ?> border-ckeck  <?php } ?> border_promo_<?php  echo $products->product_id;?>"><img src="<?php echo base_url().'template/';?>assets/img/promo.png" alt="" ></div>
								<div class="checkbox_caracteristique hidden" ><input type="checkbox" <?php if(!$product_parneters ){  ?> disabled  <?php } ?>   <?php if($product_parneters and $product_parneter->product_partener_promo==2){  ?> checked  <?php } ?>  data-type="promo" data-id="<?php  echo $products->product_id;?>"  data-partener="<?php echo $partener->partener_id;?>" id="label_promo_<?php  echo $products->product_id;?>" name= "bio" value="1"  class="lr_bio" <?php if(!$product_parneters){  ?> disabled  <?php } ?> /></div>
								</div>
								<?php   } ?>
								 </div>
							


</div>  
</div>
<div class="row product info_product info_products" 
    >
	  <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_1 ">
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_2">
				
<div class="col-md-12 col-sm-12 col-lg-12 " >  
 <div <?php if(!$product_parneters ){  ?> style="opacity: 0;"  <?php } ?>><button type="button" <?php if(!$product_parneters ){  ?> disabled  <?php } ?> class="btn btn-outline btn-primary  bottom_<?php  echo $products->product_id;?> product_in_stock_bg_green <?php if($product_parneters and  $product_parneter->is_disponible!=1){  ?>  product_not_stock_bg_red <?php } ?> <?php if($product_parneters ){  ?> product_dispo_action  <?php } ?> product_action"  data-product="<?php  echo $products->product_id;?>"data-partener="<?php echo $partener->partener_id;?>"  data-disponible="<?php echo $product_parneter->is_disponible;?>">
<?php echo $is_disponible?> </button></div>
	
</div>
</div>
</div>
<?php endforeach; ?>
 </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
</div>

<div class="row">
      <div class="col-lg-12">
	 						
       


	  <div style="text-align:center;margin-bottom:10px;">
   <?=$pagination;?>
  
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
</div>
		</div>
		   <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

<script type="text/javascript">

$(document).ready(function () {
$(".lr_bio").click(function() {
	var product_id =$(this).attr('data-id');
	var type =$(this).attr('data-type');
	var partener_id=$(this).attr('data-partener');
	var is_check=1;
		if( $('#label_'+type+'_'+product_id).is(':checked') ){
			is_check=2;
		} 
   jQuery.ajax({
				url: "<?php echo base_url().'productspartners/updatecatacterique/';?>",
				data: {product_id:product_id,partener_id:partener_id,type:type,is_check:is_check},
				dataType: "json",
				type: "POST",  
				success: function(data) {
					$('.border_'+data.type+'_'+data.product_id).removeClass('border-not-ckeck');
					$('.border_'+data.type+'_'+data.product_id).removeClass('border-ckeck');
					if(data.is_check==1){ 
					
                    $('.border_'+data.type+'_'+data.product_id).addClass('border-not-ckeck')
					} else {
						 $('.border_'+data.type+'_'+data.product_id).addClass('border-ckeck')
					}
				}
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
					
					if(data.is_new==1){ 
						 location.reload(); 
					}
					if(data.result==1){ 
						 jQuery('.message_'+data.product_id).text('Mise à jour réussie');
						 
						 jQuery('.is_disponible_'+data.product_id).val(1);
					}else {
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
		$( ".product_dispo_action" ).click(function() {

	
			var partener_id=$(this).attr('data-partener');
			var product_id=$(this).attr('data-product');
			var is_disponible=$('.bottom_'+product_id).attr('data-disponible');
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
				// location.reload(); 
				if(data.is_disponible==1){ 
					//$('.product_dispo_val_'+data.product_id).attr('data-disponible',2);
					//jQuery('.img-'+data.product_id).removeClass('product_grille_stock');
					//jQuery('.product_not_'+data.product_id).css('display','none');
					jQuery('.updatePrice_'+data.product_id).removeClass('not_stock');
					jQuery('#price_buying_'+data.product_id).removeClass('not_stock');
					
					jQuery('.price_'+data.product_id).removeClass('not_stock');
					jQuery('.product_stock_'+data.product_id).removeClass('product_not_stock_background_red');
					jQuery('.updatePrice'+data.product_id).removeClass('not_stock');
					jQuery('.img-'+data.product_id).removeClass('img_filter');
					jQuery('.bottom_'+data.product_id).removeClass('product_not_stock_bg_red');
					jQuery('.bottom_'+data.product_id).text('En stock');
					//$('.bottom_'+data.product_id).attr('data-disponible',2);alert(is_disponible);
				} else {
					//$('.product_dispo_val_'+data.product_id).attr('data-disponible',1);
					//jQuery('.img-'+data.product_id).addClass('product_grille_stock');
					//jQuery('.product_not_'+data.product_id).css('display','block');
					jQuery('#price_buying_'+data.product_id).addClass('not_stock');
					jQuery('.price_'+data.product_id).addClass('not_stock');
					jQuery('.product_stock_'+data.product_id).addClass('product_not_stock_background_red');
					jQuery('.updatePrice_'+data.product_id).addClass('not_stock');
					jQuery('.bottom_'+data.product_id).addClass('product_not_stock_bg_red');
					jQuery('.img-'+data.product_id).addClass('img_filter');
					jQuery('.bottom_'+data.product_id).text('En rupture de stock');
					//$('.bottom_'+data.product_id).attr('data-disponible',1);
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
	$(window).load(function () {
    var o = $('.page-loader');
    if (o.length > 0) {
        o.fadeOut(800);
    }
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