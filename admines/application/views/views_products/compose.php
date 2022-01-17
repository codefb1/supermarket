

<div class="col-sm-6">
  <h1 class="page_title">Couffin</h1>
  <p class="text-muted">Liste  Couffin</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'products/compose';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>
  <button class="btn btn-shadow btn-primary promotions" type="button"><i class=" glyphicon"></i> Promotions</button>

    <a href="<?php echo base_url().'products/addCompose';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvelle couffin</span></button></a>
  </div>
</div>

<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	   
	
		  <div class="panel panel-default">
         
		 
						   <div class="table-responsive">
            <table class="table info_table table-hover" id="news_table">
              <thead>
              
                <tr>
				<th class="sub_col"></th>
				<th class="sub_col"></th>
				<th class="sub_col">Référence</th>
				 <th class="sub_col"  style="width: 5%;">Photo</th>
				  <th class="sub_col"  style="width: 10%;">Catégories</th>
            	  <th class="sub_col"  style="width: 10%;">Nom</th>
				 
				   <th class="sub_col">Poids</th>
				    <th class="sub_col">Afficher poids</th>
					<th class="sub_col"  style="width: 15%;">Pack</th>
				  <th class="sub_col hidden">Prix</th>
				   <th class="sub_col">Prix d'achat</th>
				    
				   	   <th class="sub_col">Marge</th>
				   <th class="sub_col">Prix de vente</th>
				 
                 	
                       <th class="sub_col" >Stock</th>
 <th class="sub_col">Afficher page d'accuiel</th>							   
				     <th class="sub_col" >Statut</th>
                  <th class="sub_col" >Actions</th>
                  
                </tr>
              </thead>
              <?php foreach($products_list as $products) :
			  
					if($products->product_data_status==1){$label='label-success';$status='Activer';}
					if($products->product_data_status==2){$label='label-warning';$status='Rupture de stock';}
					if($products->product_data_status==0){$label='label-danger';$status='Désactiver';}
					if($products->show_poids==1){$class_show_poids="label-success";$show_poids="Oui";}
					if($products->show_poids==0){$class_show_poids=" label-danger";$show_poids='Non';}
					
					if($products->product_stock==1){$product_stock="En stock";}
					if($products->product_stock==2){$product_stock="Non stock";}
					if($products->product_stock==3){$product_stock="Rupture de stock";}
					if($products->product_show_home==1){$class_show_home="label-success";$show_home="Oui";}
					if($products->product_show_home==0){$class_show_home=" label-danger";$show_home='Non';}
                     $packs =$this->M_products->get_packs_product($products->product_id);
						?>
						
						
               <tr class="supp-<?php  echo $products->product_id;?>">
			  <td class="sub_col" >  <input name="checkbox"  class="ckeckProduct" value="<?php  echo $products->product_id;?>" type="checkbox" /></td>	
			   
                         <td class="sub_col" > 
			   
			  
			    <?php if($products->product_is_promo==2){ ?><img src="<?php echo base_url().'template/';?>images/promo.png" alt="Produit en promotion" title="Produit en promotion" style="width: 16px;margin: 2px;"> <?php } ?>
			     <?php if($products->product_best_seller==2){ ?><img src="<?php echo base_url().'template/';?>images/best.png" alt="Meilleurs Vente" title="Meilleurs Vente" style="margin: 2px;"> <?php } ?>
			  
			    
			  
			   
			   
			   </td>			   
			   	 <td class="sub_col" > <span class="position_text"> <?php echo $products->product_ref;?> </span> </td>
				 
						<td class="sub_col" > <span class="position_text"> 
						<img data-dz-thumbnail=""  alt="avatar" id="block-image-banners" src="<?php echo base_url().'medias/products/'.$products->product_picture; ?>" class="img-responsive">
						
					
							
						
						</span> </td>
								<td class="sub_col" > 				   <span class="position_text"> <?php echo $products->categorie_couffin_name;?> 	</span> </td>
							
						<td class="sub_col" > 				  <a href="<?php echo base_url().'products/editCompose/0/'.$products->product_id;?>"> <span class="position_text"> <?php echo $products->product_name;?> </span></a> </td>
										
						<td class="sub_col" > <span class="position_text"> <?php echo $products->product_poids;?> kg </span> </td>
						
                    <td class="sub_col" ><?php if($products->product_poids>0){ ?>
						 <span class="position_text" >  <i><a href="javascript:void(0);" data-id=<?php echo $products->product_id;?>  data-status=<?php echo $products->show_poids;?> class="poid_<?php echo $products->product_id;?> show_poid glyphicon <?php echo $class_show_poids;?>"></a></i></span>
					<div><select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="show_poids btn-xs">
										<option <?php  if($products->show_poids==0){ echo"selected";} ?> value="0">Non</option>
										<option <?php  if($products->show_poids==1){ echo"selected";} ?> value="1">Oui</option>
									</select></div>
									<div ><span  class="position_text show_poids-<?php  echo $products->product_id;?> label <?php echo $class_show_poids;?>"><?php echo $show_poids;?></span></div>

					<?php } ?>    </td>
								<td class="sub_col " > 
								<?php foreach($packs as $packs) :?>
						
								<div  class="position_text"  >  <?php echo $packs->product_name;?>  (Poids:<?php echo $packs->prod_poids*$packs->prod_qty;?> kg)  </div> 
								
							  <?php endforeach; ?>    
								</td>				
			    				<td class="sub_col " > 
								<span class="position_text"  >  <?php echo (number_format($products->product_price, 2, ',', ''))."  €" ?>  </span> 
								
							      
								</td>
						
						
				  
								<td class="sub_col" > <span class="position_text"  >  <?php echo (number_format($products->product_price_marge_percente, 2, ',', ''))." %" ?>  </span> </td>
						
								<td class="sub_col" > 
								<span class="position_text"  <?php if($products->product_is_promo==2){ ?> style="text-decoration: line-through;top: 0px!important;" <?php } ?> >  <?php echo (number_format($products->product_price_selling, 2, ',', ''))."  €" ?>  </span>

<?php if($products->product_is_promo==2){ ?></br><span style="color: #a71d1a !important;"><?php echo (number_format($products->product_price_dicount, 2, ',', ''))."  €" ?></span>	 <?php } ?> 							</td>
						
				  
				
					<td class="sub_col" > <span class="position_text"> <?php echo $product_stock;?> </span> </td>
					     <td class="sub_col" >
						 <span class="position_text" >  <i><a href="javascript:void(0);" data-id=<?php echo $products->product_id;?>  data-home=<?php echo $products->product_show_home;?> class="home_<?php echo $products->product_id;?> show_home glyphicon <?php echo $class_show_home;?>"></a></i></span>
					<div><select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="show_home btn-xs">
										<option <?php  if($products->product_show_home==0){ echo"selected";} ?> value="0">Non</option>
										<option <?php  if($products->product_show_home==1){ echo"selected";} ?> value="1">Oui</option>
									</select></div>
									<div ><span  class="position_text show_home-<?php  echo $products->product_id;?> label <?php echo $class_show_home;?>"><?php echo $show_home;?></span></div>

					  </td>
						<td class="sub_col" ><span  class=" position_text span-<?php  echo $products->product_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			          
                 <td class="sub_col">
				
				<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="changesatus btn-xs">
										<option <?php  if($products->product_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
										<option <?php  if($products->product_data_status==1){ echo"selected";} ?> value="1">Activer</option>
									</select>
									</div>
				  <a href="<?php echo base_url().'products/editCompose/0/'.$products->product_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $products->product_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							 <a  style="display:none;"title="Duplique" href="<?php echo base_url().'products/dupliqueCompose/'.$products->product_id;?>"><button type="button" class="btn btn-shadow btn-primary"><i class="glyphicon glyphicon-plus"></i></button></a>
							
				
				  
				  </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div></div>
						
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

	</div>
	
	<div aria-hidden="true" aria-labelledby="myModalConfirm" role="dialog" tabindex="-1" id="myModalConfirm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Confirmation de suppression</h4>
				</div>
				<div class="modal-body">
					
					<div class="alert alert-warning">                
						Confirmez vous cette opération ? 
					</div>
				</div>
				<div class="modal-footer">
					<a  data-url="" class="suppconfirm btn btn-success btn-small" type="button" > <i class="fa fa-check"></i> Confirmer</a>
					<input type="hidden" class="url"  id="url">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
			</div>
		</div>
	</div>
		<div aria-hidden="true" aria-labelledby="myModalPromo" role="dialog" tabindex="-1" id="myModalPromo" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Promotions</h4>
				</div>
				<div class="modal-body">
					
					               
					
										<div class="alert alert-danger alert-message alert-danger" style="display:none;text-align: center;" role="alert">
												 Champ  promotion Obligatoire
												</div> 
									<div class="alert alert-success alert-message alert-success" style="display:none;text-align: center;" role="alert">
												 Mise à jour avec succès
												</div> 
												<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">En promotion</label>
							<div class="col-md-7">
				                            <select  id="products_is_promo"  name="products_is_promo" class="form-control  btn-xs products_is_promo">
			  <option value=""> Selectionnez...</option>
			<option value="1"> Non</option>
			<option  value="2"> Oui</option>
												 
									</select>
							</div>
						</div>
						</div>
									<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Marge (%) </label>
							<div class="col-md-7">
				               <input id="product_price_marge_percente_dicount" class="form-control product_price_marge_percente_dicount" type="text"   name="product_price_marge_percente_dicount" value="" >
             
							</div>
						</div>
						</div>
					
				</div>
				<div class="modal-footer">
					<a  data-url="" class=" btn btn-success btn-small saveSolde" type="button" > <i class="fa fa-check"></i> Valider</a>
					<input type="hidden" class="productsPromo"  id="productsPromo">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
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
		
		$(".show_partener").click(function () {
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/getPartener/';?>",
				data: {product_id:product_id},
				dataType: "json",
				type: "POST",  
				success: function(data) {
					$('.product_name').text(data.product_name);
					jQuery('.list_products').html('');
				for(product in data.products){ 
				$( ".list_products" ).append('<tr class=""> <td class="sub_col">'+data.products[product].partener_lastname+'</td><td class="sub_col">'+data.products[product].price_buying+'</td></tr>' );	
				}
					jQuery('#parteners').modal('show');
				}
			});
			
		});
		
			$('.historiquePrice').click(function(e){
			e.preventDefault();
			var product_id = $(this).attr('data-product');
			var partener_id="";
			var type='partener';
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
					$( ".list_historiques" ).append('<tr class=""> <td class="sub_col">'+data.logProductPartenerPrice[product].user_name+'</td> <td class="sub_col">'+data.logProductPartenerPrice[product].type+'</td> <td class="sub_col">'+data.logProductPartenerPrice[product].new_price_buying+'</td><td class="sub_col">'+data.logProductPartenerPrice[product].old_price_buying+'</td><td class="sub_col">'+data.logProductPartenerPrice[product].log_data_created+'</td></tr>' );	
			
				}
					jQuery('#historiques').modal('show');
				}	
				
			});
		});


		 $(".promotions").click(function () {
			  $('.alert-message').css('display','none');
		var products = [];
		$(".ckeckProduct").each(function() {
    if ($(this).is(':checked')) {
		products.push($(this).val());
    }
	}); 
	if(products.length > 0 ){
		jQuery('.productsPromo').val(products);
		jQuery('#myModalPromo').modal('show');
	}else {
		alert('aucune produit selectioner');
	}
		
	
	});
	 $(".saveSolde").click(function () {
		var productsId = $('.productsPromo').val();
		var product_is_promo = $('.products_is_promo').val();
		var product_price_marge_percente_dicount = $('.product_price_marge_percente_dicount').val();
		
	if(!product_is_promo){
		$('.alert-danger').css('display','block');
	}else {
		jQuery.ajax({
				url: "<?php echo base_url().'products/solde/';?>",
				data: {productsId:productsId,product_is_promo:product_is_promo,product_price_marge_percente_dicount:product_price_marge_percente_dicount},
				dataType: "json",
				type: "POST",  
				success: function(data) {
				$('.alert-success').css('display','block');
				setTimeout(function(){ location.reload(true); }, 2000);
				}
			});
		
	
		
	
	
     }
   });

$( ".show_home" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/show_home/';?>",
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

						if(idsatus == 1){$( '.show_home-'+product_id ).removeClass( "label-danger label-warning" );$( '.show_home-'+product_id ).addClass( "label-success" );$('.show_home-'+product_id).html('Oui'); }
						if(idsatus == 0){$( '.show_home-'+product_id ).removeClass( "label-success label-warning" );$( '.show_home-'+product_id ).addClass( "label-danger" );$('.show_home-'+product_id).html('Non'); }
						
						
						
						} 
				}    
			});
		});   
});
	
</script>