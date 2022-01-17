	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'products/compose';?>'"><i class=" fa fa-reply"></i>  Liste des couffin</button>

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
      <div class="panel-heading">Nouveau couffin</div>
      <div class="panel-body">
       
		<?php if(@$process_status == 1) { ?>
					<div class="alert alert-success"><i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$process_status == 2) { ?>
					<div class="alert alert-danger"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Opération échouée !</div>
					<?php } ?>
					<?php if(@$process_status == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
		
         	<?php if(@$this->uri->segment(3) == 1) { ?>
					<div class="alert alert-success"> <i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 2) { ?>
					<div class="alert alert-danger"> <i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Mise à jour échouée !</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
            </div>
				<div class="form-group" >					
  <div class="row">
              <div class="col-lg-4">
                <label  for="F1">Catégories </label>
              <select  id="categorie_couffin_id"  name="categorie_couffin_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez une catégorie...</option>
				
			    <?php foreach($categories_list as $categorie) :?>
										<option <?php  if($product->categorie_couffin_id==$categorie->categorie_couffin_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_couffin_id;?>"> <?php echo $categorie->categorie_couffin_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div></div>
			
			<div class="form-group" >					
  <div class="row">
              <div class="col-lg-4">
                <label  for="F1">Certification </label>
              <select  id="certificat_id"  name="certificat_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez une certification...</option>
				
			    <?php foreach($certificats_list as $certificats) :?>
										<option <?php  if($product->certificat_id==$certificats->certificat_id){ echo"selected";} ?>  value="<?php echo $certificats->certificat_id;?>"> <?php echo $certificats->certificat_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
             
            </div></div>
			 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Nom  </label>
				
                <input id="product_name" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_name" value="<?php echo $product->product_name;?>">
              </div>
             
            </div>
         
            </div>
				<div class="row">
								<div class="form-group">
								<label  class="col-md-12 control-label"> Description</label>
								<div class="col-md-12">
							     <textarea  id="product_short_text" name="product_short_text"><?php echo $product->product_short_text;?></textarea>
             
								</div>
								</div>
								</div>
								<div class="row">
						<div class="form-group">
							<label  class="col-md-12 control-label"> Short Description </label>
							<div class="col-md-12">
						   <input id="product_short_description" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_short_description" value="<?php echo $product->product_short_description;?>" >
             
							</div>
						</div>
						</div>
			<div class="form-group" >					
  <div class="row">
              <div class="col-lg-4">
                <label  for="F1">Produits </label>
              <select  id="products_id"  name="products_id[]" class="form-control  btn-xs products_id" multiple style="min-height: 300px;">
			  
				
			    <?php foreach($products_list as $products) :?>
				<?php  if($products->certificat_id==$product->certificat_id){ ?>
										<option <?php  if($product_id==$products->product_id){ echo"selected";} ?> value="<?php echo $products->product_id;?>"> <?php echo $products->product_name;?></option>
											<?php  } ?>

										<?php endforeach; ?>
									</select> </div>
             
            </div>
			
			
			
			</div>
			<div class="form-group" >	
			 <div class="row">
			  <div class="col-lg-4">
		<button class="btn btn-shadow btn-primary generer " type="button">  Générer </button>
</div>
		</div>
			
			</div>
			
		<div class="form-group" >	
			 	 <div class="row"> 
	 
	 
	 <div class="col-lg-12"><h4 class="widget-title"><b>List des produits</b></h4></div>
		<div class="col-lg-12">
								 <table class="table info_table table-hover" id="accounts_table">
						  <thead>
						  
							<tr>
								<th class="sub_col">Nom</th>
								<th class="sub_col">Prix d'achat TTC </th>
								<th class="sub_col">Poids</th>
								<th class="sub_col">Qté</th>
								<th class="sub_col">Total Poids</th>
								<th class="sub_col">Total Prix d'achat TTC</th>
								<th class="sub_col">Label Rouge</th>
								<th class="sub_col">Bio</th>
								
								<th class="sub_col">Poitou-Charentes</th>
								<th class="sub_col"></th>
							</tr>
						  </thead>
						  <tbody  class="list_products">
						  <?php foreach($packs as $packs) :
						  $isproduct_poitou_charentes="hide";
							if($packs->product_poitou_charentes==2){
							$isproduct_poitou_charentes="";
							}
							if($packs->prod_poitou_charentes==2){
							$isproduct_poitou_charentes="";
							}
							
							 $isproduct_bio="hide";
							if($packs->product_bio==2){
							$isproduct_bio="";
							}
							if($packs->prod_bio==2){
							$isproduct_bio="";
							}
							
							 $isproduct_label_rouge="hide";
							if($packs->product_bio==2){
							$isproduct_label_rouge="";
							}
							if($packs->prod_label_rouge==2){
							$isproduct_label_rouge="";
							}
						
						  ?>
						  <tr class="pr_<?php echo $packs->product_id;?>">
						  <input class="price_prod price_prod_<?php echo $packs->product_id;?>" type="hidden" value="<?php echo $packs->product_price;?>">
						  <input class="poid_prod poids_prod_<?php echo $packs->product_id;?>" type="hidden" value="<?php echo $packs->prod_poids;?>">
						  <input class="total_price_product total_price_product_<?php echo $packs->product_id;?>" type="hidden" value="<?php echo $packs->product_price*$packs->prod_qty;?>">
						  <input class="total_poids_product total_poids_product_<?php echo $packs->product_id;?>" type="hidden" value="<?php echo $packs->prod_poids*$packs->prod_qty;?>">
						  <td><?php echo $packs->product_name;?></td> 
						  <td class="pr_achat_<?php echo $packs->product_id;?>"><?php echo $packs->product_price;?></td>
						  <td class="pr_poid_<?php echo $packs->product_id;?>"><?php echo $packs->prod_poids;?></td>
						  <td> <input id="product_qty_<?php echo $packs->product_id;?>" class="form-control product_qty product_qty_<?php echo $packs->product_id;?>" step="0.5" data-id="<?php echo $packs->product_id;?>" type="number" min="1" name="product_qty[<?php echo $packs->product_id;?>]" value="<?php echo $packs->prod_qty;?>"></td>
						  <td class="pr_poid_total_<?php echo $packs->product_id;?>"><?php echo $packs->prod_poids*$packs->prod_qty;?></td><td class="pr_achat_total_<?php echo $packs->product_id;?>"><?php echo $packs->product_price*$packs->prod_qty;?></td>
						 
                       <td><select id="prod_label_rouge"  data-id="<?php echo $packs->product_id;?>" name="prod_label_rouge[<?php echo $packs->product_id;?>]" class="<?php echo $isproduct_label_rouge;?>  prod_label_rouge prod_label_rouge_<?php echo $packs->product_id;?>"><option  <?php  if($packs->prod_label_rouge==1){ echo"selected";} ?>  value="1" selected=""> Non</option><option  <?php  if($packs->prod_label_rouge==2){ echo"selected";} ?>   value="2"> Oui</option></select></td>
                       <td><select id="prod_bio"  data-id="<?php echo $packs->product_id;?>" name="prod_bio[<?php echo $packs->product_id;?>]" class="<?php echo $isproduct_bio;?>  prod_bio prod_bio_<?php echo $packs->product_id;?>"><option  <?php  if($packs->prod_bio==1){ echo"selected";} ?>  value="1" selected=""> Non</option><option  <?php  if($packs->prod_bio==2){ echo"selected";} ?>   value="2"> Oui</option></select></td>
                <td><select id="prod_poitou_charentes"  data-id="<?php echo $packs->product_id;?>" name="prod_poitou_charentes[<?php echo $packs->product_id;?>]" class=" <?php echo $isproduct_poitou_charentes;?> prod_poitou_charentes prod_poitou_charentes<?php echo $packs->product_id;?>"><option  <?php  if($packs->prod_poitou_charentes==1){ echo"selected";} ?>  value="1" selected=""> Non</option><option  <?php  if($packs->prod_poitou_charentes==2){ echo"selected";} ?>   value="2"> Oui</option></select></td>

						 <td><button type="button" class="btn btn-danger remove_product" data-id="<?php echo $packs->product_id;?>"><i class=" glyphicon glyphicon-trash"></i></button></td>
						  </tr>
						   <?php endforeach; ?>   
				   </tbody>
						</table>
				</div>
			
			</div>
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Prix d'achat TTC (€) </b></label>
                <input id="product_price" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price" value="<?php echo (number_format($product->product_price, 2, ',', '')) ?>">
              </div>
           
            </div>
         
            </div>
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Poids  (kg)</b></label>
                <input id="product_poids" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_poids" value="<?php echo $product->product_poids;?>">
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
                <label  for="F1"><b>Prix de vente TTC (€) </b></label>
                <input id="product_price_selling" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_selling" value="<?php echo (number_format($product->product_price_selling, 2, ',', '')) ?>">
              </div>
               
            </div>
         
            </div>
			
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label for="F1">En promotion  </label>
              <select id="product_is_promo" name="product_is_promo" class="form-control  btn-xs">
				<option value="1" <?php  if($product->product_is_promo==1){ echo"selected";} ?> > Non</option>
				<option value="2" <?php  if($product->product_is_promo==2){ echo"selected";} ?>> Oui</option>
					</select>  
					
			   </div>
			 </div>
			 </div>
		
					 <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Marge (%) </b></label>
                <input id="product_price_marge_percente_dicount" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_marge_percente_dicount" value="<?php echo $product->product_price_marge_percente_dicount;?>">
              </div>
             
            </div>
         
            </div>
			
			  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"><b>Prix en promo  TTC (€)</b></label>
                <input id="product_price_dicount" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_price_dicount" value="<?php  echo (number_format($product->product_price_dicount, 2, ',', ''));?>">
              </div>
             
            </div>
         
            </div>
			
			
			<div class="form-group">
            <div class="row">
			<div class="col-lg-4">
                <label for="F1">Stock  de produit </label>
              <select id="product_stock" name="product_stock" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($product->product_stock==1){ echo"selected";} ?> > En stock</option>
				<option value="2" <?php  if($product->product_stock==2){ echo"selected";} ?>> Non stock</option>
				<option value="3" <?php  if($product->product_stock==3){ echo"selected";} ?>> Rupture de stock</option>
					</select>  
					
			   </div>
			    </div>
				 </div>
			
								 

			  <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1"> Information  sur le poids  </label>
               <input id="product_info" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_info" value="<?php echo $product->product_info;?>">
             

</div>
             
            </div>
         
            </div>
			
			
			
			
			
			
			
			
			
  
  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Meta Titre  </label>
                <input id="product_meta_title" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_title" value="<?php echo $product->product_meta_title;?>">
              </div>
             
            </div>
         
            </div>
			
								  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Meta description  </label>
                <input id="product_meta_description" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_description" value="<?php echo $product->product_meta_description;?>">
              </div>
             
            </div>
         
            </div>
			
								  <div class="form-group" >
            <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Meta Keywords  </label>
                <input id="product_meta_keywords" class="form-control" type="text" data-parsley-required="true" data-parsley-type="alphanum" name="product_meta_keywords" value="<?php echo $product->product_meta_keywords;?>">
              </div>
             
            </div>
         
            </div>
					
		
			
			 <div class="form-group">
			   <div class="row">
			   <div class="col-sm-12">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer une  images  (taille max 900 Klo)<input id="upload-select" name="product_picture" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   
			    </div></div>
		  </div>
              		  <div class="form-group" id="block-products" >
					  <div class="row">
			   <div class="col-sm-12">
					<div class="dz-preview dz-processing dz-error dz-image-preview example-preview animated fadeInRight"  >
						<div class="dz-details">
							<img data-dz-thumbnail="" alt="avatar" id="block-image-products" src="<?php echo base_url().'medias/products/'.$product->product_picture; ?>" class="img-responsive">
						</div>
						<div class="dz-progress">
							<span class="dz-upload" data-dz-uploadprogress=""></span>
						</div>
						</div>
					</div>
				</div>
			</div>
          <input type="hidden" id="product_picture" name="product_picture" value="<?php echo $product->product_picture; ?>" />
       	  <input type="hidden" id="product_id" name="product_id" value="<?php echo $product->product_id; ?>" />
		  <input type="hidden" id="product_id" name="product_id" value="<?php echo $product->product_id; ?>" />
              </br> </br>
       
		<div class="form-sep">
            <div class="pull-right">
              <button class="btn btn-success addComposer" id=""><i class="glyphicon glyphicon-ok"></i> <span>Enregistrer</span></button>
            </div>
          </div>
     </br> </br>
    </div>
  </div>
</div> 
 <script src="<?php echo base_url().'template/';?>tinymce.min.js" ></script>	
<script type="text/javascript">
$( "#product_price_marge_percente" ).keyup(function() {
 var product_price_marge_percente = $(this).val();
 var product_price = $('#product_price').val();
if(product_price_marge_percente==0){
	$('#product_price_selling').val(0);
}else {
	
	 jQuery.ajax({
		   url: "<?php echo base_url().'products/calcule_price_vente/';?>",
		   data: {product_price_marge_percente:product_price_marge_percente,product_price:product_price},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
							 $('#product_price_selling').val(data.product_price_selling);	
			}
			})
}
 
  
});

$( "#product_price_marge_percente_dicount" ).keyup(function() {
 var product_price_marge_percente = $(this).val();
 var product_price = $('#product_price').val();

 if(product_price_marge_percente==0){
	$('#product_price_selling').val(0);
}else {
	
	  jQuery.ajax({
		   url: "<?php echo base_url().'products/calcule_price_vente/';?>",
		   data: {product_price_marge_percente:product_price_marge_percente,product_price:product_price},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
							 $('#product_price_dicount').val(data.product_price_selling);	
			}
			})
}
  
});
  $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'products/uploadFile/';?>', // upload url

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
				$("#product_picture").val(response);
				$("#block-image-products").attr("src","<?php echo base_url().'medias/products/'; ?>"+response);
				$("#block-products").show();
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

 $(document).on('click','.remove_product',function(e){
	         var poids=0;
			var price=0;
			var ids= $(this).attr('data-id');
			
			                      $(".pr_"+ids).html('');
				                  $(".total_poids_product").each(function(){
                                  poids+=+$(this).val();
		                         });
								 $(".total_price_product").each(function(){
                                   price+=+$(this).val();
		                        });
								$("#product_poids").val(poids.toFixed(2));
								$("#product_price").val(price.toFixed(2));
	 });
$(document).on('click','.product_qty',function(e){

			e.preventDefault();
			var poids=0;
			var price=0;
			var ids= $(this).attr('data-id');
			var qty= $(this).val(); 
			var priceProduct= $(".price_prod_"+ids).val();
			var poidProduct= $(".poids_prod_"+ids).val();
		    var total_price_product= priceProduct* qty;
		    var total_poids_product= poidProduct* qty;
			$(".total_price_product_"+ids).val(total_price_product.toFixed(2));
			$(".total_poids_product_"+ids).val(total_poids_product.toFixed(2));
			$(".pr_achat_total_"+ids).text(total_price_product.toFixed(2));
			$(".pr_poid_total_"+ids).text(total_poids_product.toFixed(2));
			 $(".total_poids_product").each(function(){
        
                                         poids+=+$(this).val();
		  
		                         });
								 $(".total_price_product").each(function(){
         
                                         price+=+$(this).val();
		  
		                        });
								$("#product_poids").val(poids);
								$("#product_price").val(price.toFixed(2));	
								
							var product_price_marge_percente = $('#product_price_marge_percente').val();
							var product_price = $('#product_price').val();
							if(product_price_marge_percente==0){
							//$('#product_price_selling').val(0);
							}else {

							jQuery.ajax({
							url: "<?php echo base_url().'products/calcule_price_vente/';?>",
							data: {product_price_marge_percente:product_price_marge_percente,product_price:product_price},
							dataType: "json",
							type: "POST",
							success: function(data) { 

							$('#product_price_selling').val(data.product_price_selling);	
							}
							})
							}
			});
			   
$(".generer").click(function () {
	var products_id= jQuery('.products_id').val();
	
	if(products_id){
		   var poids=0;
		   var price=0;
		  jQuery.ajax({
		   url: "<?php echo base_url().'products/getProducts/';?>",
		   data: {products_id:products_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					var obj = [];


 

								$(".total_poids_product").each(function(){
          
                                        poids+=+$(this).val();
		  
		                         });
								 $(".total_price_product").each(function(){
                                           price+=+$(this).val();
                                        
		  
		                        });
									for(products in data.products_list)
								{   
								var islabelRouge='hide';
								var isBio='hide';
								var ispoitouCharentes='hide';
								if(data.products_list[products].product_bio==2){
									isBio='';
								}
								if(data.products_list[products].product_label_rouge==2){
									islabelRouge='';
								}
								if(data.products_list[products].product_poitou_charentes==2){
									ispoitouCharentes='';
								}
								     $( ".list_products" ).append('<tr class="pr_'+data.products_list[products].product_id+'"><input class="price_prod price_prod_'+data.products_list[products].product_id+'"  type="hidden"  value="'+data.products_list[products].product_price+'"><input class="poid_prod poids_prod_'+data.products_list[products].product_id+'"  type="hidden"  value="'+data.products_list[products].product_poids+'"><input class="total_price_product total_price_product_'+data.products_list[products].product_id+'"  type="hidden"  value="0"> <input class="total_poids_product total_poids_product_'+data.products_list[products].product_id+'"  type="hidden"  value="0"><td>'+data.products_list[products].product_name+'</td> <td class="pr_achat_'+data.products_list[products].product_id+'">'+data.products_list[products].product_price+'</td><td class="pr_poid_'+data.products_list[products].product_id+'">'+data.products_list[products].product_poids+'</td><td> <input id="product_qty_'+data.products_list[products].product_id+'" step="0.5" class="form-control product_qty product_qty_'+data.products_list[products].product_id+'" data-id="'+data.products_list[products].product_id+'" type="number"  min="1" name="product_qty['+data.products_list[products].product_id+']" value="1"><td class="pr_poid_total_'+data.products_list[products].product_id+'">'+data.products_list[products].product_poids+'</td><td class="pr_achat_total_'+data.products_list[products].product_id+'">'+data.products_list[products].product_price+'</td><td><select id="prod_label_rouge"  data-id="'+data.products_list[products].product_id+'"  name="prod_label_rouge['+data.products_list[products].product_id+']" class="'+islabelRouge+' prod_label_rouge prod_label_rouge_'+data.products_list[products].product_id+'"><option value="1" selected=""> Non</option><option value="2"> Oui</option></select></td><td><select id="prod_bio"  data-id="'+data.products_list[products].product_id+'" name="prod_bio['+data.products_list[products].product_id+']" class=" '+isBio+' prod_bio prod_bio_'+data.products_list[products].product_id+'"><option value="1" selected=""> Non</option><option value="2"> Oui</option></select></td><td><select id="prod_poitou_charentes"  data-id="'+data.products_list[products].product_id+'" name="prod_poitou_charentes['+data.products_list[products].product_id+']" class=" '+ispoitouCharentes+' prod_poitou_charentes prod_poitou_charentes_'+data.products_list[products].product_id+'"><option value="1" selected=""> Non</option><option value="2"> Oui</option></select></td><td><button type="button" class="btn btn-danger remove_product" data-id='+data.products_list[products].product_id+'><i class=" glyphicon glyphicon-trash"></i></button></td></tr>');
								poids+=+data.products_list[products].product_poids;
								price+=+data.products_list[products].product_price;
									
									}
								  	
								$("#product_poids").val(poids.toFixed(2));
								$("#product_price").val(price.toFixed(2));										   
								}
                         			   
			});
	}else {
		alert('Aucun produit selectioner');
	}
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

		//$( "#submitpage" ).submit();
});

});
	
$('.addComposer').click(function(e){
			var elem = $(this);
			var productQty = {};
			var prodLabelRouge = {};
			var prodBio = {};
			var productPoitouCharentes = {};
		 var data = {
				datas: {},
				
				product_id : <?php echo $product->product_id; ?>,
				product_name : $('#product_name').val(),
				product_poids : $('#product_poids').val(),
				product_price : $('#product_price').val(),
				product_price_marge_percente : $('#product_price_marge_percente').val(),
				product_is_promo : $('#product_is_promo').val(),
				product_stock : $('#product_stock').val(),
				product_price_dicount : $('#product_price_dicount').val(),
				product_meta_title : $('#product_meta_title').val(),
				product_short_text : $('#product_short_text').val(),
				product_meta_description : $('#product_meta_description').val(),
				product_meta_keywords : $('#product_meta_keywords').val(),
				product_picture : $('#product_picture').val(),
				product_short_text :  tinyMCE.get('product_short_text').getContent(),
				product_short_description : $('#product_short_description').val(),
				categorie_couffin_id : $('#categorie_couffin_id').val(),
				product_price_selling : $('#product_price_selling').val(),
				product_price_marge_percente_dicount : $('#product_price_marge_percente_dicount').val(),
				certificat_id : $('#certificat_id').val(),
				productQty : '',
				prodLabelRouge : '',
				prodBio : '',
				productPoitouCharentes : ''
			};
		 
			
			$(".product_qty").each(function(){
			
			
				productQty[$(this).attr('data-id')] = this.value;
				
			});
			data.productQty=productQty;
			$(".prod_label_rouge").each(function(){
			
			
				prodLabelRouge[$(this).attr('data-id')] = this.value;
				
			});
			data.prodLabelRouge=prodLabelRouge;
			$(".prod_bio").each(function(){
			
			
				prodBio[$(this).attr('data-id')] = this.value;
				
			});
			data.prodBio=prodBio;
			
				$(".prod_poitou_charentes").each(function(){
			
			
				productPoitouCharentes[$(this).attr('data-id')] = this.value;
				
			});
			data.productPoitouCharentes=productPoitouCharentes;
            $(".message").text('');
			
			$.ajax({
				url : "<?php echo base_url().'products/saveComposer/';?>",
				data : data,
				method : 'POST',
				dataType : 'json',
				success : function (data){
					window.location.href = "<?php echo base_url().'products/editCompose/1/'.$product->product_id;?>";
				}
			});
		});
		
			$("#certificat_id").change(function() {
	 var certificat_id=  $(this).val() ;
	 html=  "";
		  jQuery.ajax({
		   url: "<?php echo base_url().'products/getproductsByCertificat/';?>",
		   data: {certificat_id:certificat_id},
		   dataType: "json",
		   type: "POST",
				success: function(data) { 
					
								
								for(product in data.products)
								{ 
								   html+= '<option  value="'+ data.products[product].product_id +'"> '+ data.products[product].product_name +' </option>'
								}
								   $("#products_id").html(html) ;		
								}	
			})	
});

</script>