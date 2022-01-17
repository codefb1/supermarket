<div class="col-sm-6">
  <h1 class="page_title">Commandes</h1>
  <p class="text-muted">Liste des commandes</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  </div>
</div>

<?php if(@$us==1) {?>
<div class="alert alert-success alert-block fade in">
  <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
  <h4> <i class="icon-ok-sign"></i><strong>OK ! </strong> La liste des clients a été mise à jour.</h4>
  
</div>
<?php }?>
<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	   <div class="row">
	   <form method="GET" action="<?=base_url().'orders/index/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	 <div class="form-group">
			
			

			  <div class="row">

		
			<div class="col-lg-2">
			<label>Date de  commande  </label>
			<input name="order_data_created" id="order_data_created" type="date"  class="form-control"  value="<?php echo $order_data_created;?>">
			</div>
			
				<div class="col-lg-2">
			<label style="opacity: 0;">fin</label>
			<input name="order_data_created_end" id="order_data_created_end" type="date"  class="form-control"  value="<?php echo $order_data_created_end;?>">
			</div>

              <div class="col-lg-3">
                <label  for="F1">Statut de fournisseur </label>
              <select  id="order_partener_status"  name="order_partener_status" class="form-control  btn-xs">
							<option value=""> Selectionnez statut...</option>
							<option <?php  if($order_partener_status==1){ echo"selected";} ?> value="1">Non lue</option>
							<option <?php  if($order_partener_status==2){ echo"selected";} ?> value="2">En cours de préparation </option>
							<option <?php  if($order_partener_status==3){ echo"selected";} ?> value="3">Livrée</option>
							 <option  <?php  if($order_partener_status==4){ echo"selected";} ?> value="4">Refusée</option>
																</select> </div>
									
									 <div class="col-lg-3">
                <label  for="F1">Statut de livraison </label>   
							<select  id="delivery_status"  name="delivery_status" class="form-control  btn-xs">
						<option value=""> Selectionnez statut...</option>
				<?php foreach($status_livraison as $status) :?>
							<option <?php  if($status->status_id==$delivery_status){ echo"selected";} ?> value="<?php echo $status->status_id;?>"> <?php echo $status->status_name;?></option>
							<?php endforeach; ?>
							</select> </div>
									
									 <div class="col-lg-2">
                <label  for="F1">Statut </label>
              <select    name="order_status" class="form-control  btn-xs">
		<option value=""> Selectionnez statut...</option>
			  	<?php foreach($status_list as $status) :?>
			<option <?php  if($status->status_id==$order_status){ echo"selected";} ?> value="<?php echo $status->status_id;?>"> <?php echo $status->status_name;?></option>
			<?php endforeach; ?>
									</select> </div>
             
            </div>
			 
		

			<div class="col-lg-12" style="    text-align: center; padding-bottom: 15px;padding-top: 15px;">
			<button type="submit"  class="btn btn-w-md btn-accent">Rechercher</button> 
			<a href="<?=base_url();?>orders/index/?filtercheck=1&delivery_status=N&order_payment_status=N&order_status=1" class="btn btn-w-md btn-danger">Réinitialiser la rechecher</a>
		</div></div>
	</form>
	  </div>
	  
	  
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
                <th></th>
				 <th>Numéro</th>
				<th >Date/Heure</th>
				
				<th>Client</th>
				<th>Ville Client</th>
				
				<th>Panier </th>
				<th>Montant TTC</th>
				<th >Fournisseur</th>
				<th>Ville Fournisseur</th>
				<th>Statut fournisseur</th>
				
				<th>Statut</th>
				<th>Commentaire</th>
				<th>Actions</th>
                </tr>
              </thead>
              <?php foreach($orders_list as $orders) :
			  
		
						$orders_detail = $this->M_orders->get_orders_detail_all($orders->order_id);
						if($orders->order_partener_status==1){$partener_status='Non lue';  $label='warning'; }		
						if($orders->order_partener_status==2){$partener_status='En cours de préparation'; $label='success'; }	
						if($orders->order_partener_status==3){$partener_status='Livré'; $label='success'; }
						if($orders->order_partener_status==4){$partener_status='Refusé'; $label='danger'; }
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			   <td class="sub_col" > <span class="position_text"> 
			    <?php if($orders->is_entier){ ?><img src="<?php echo base_url().'template/';?>images/sheep-head.png" alt="" class=""> <?php } ?>
			  
			   <?php if($orders->is_association){ ?> <img style="margin: 2px;width: 16px;"src="<?php echo base_url().'template/';?>images/association.jpg" alt="" class=""><?php } ?>
			   
			   </span> </td>
					
			   		<td class="sub_col" >  <a href="<?php echo base_url().'orders/detail/'.$orders->order_id;?>" > <span class="position_text"> <?php echo $orders->order_reference;?> </span></a>  </td>
					
			   	 			<td class="sub_col" > <span class="position_text">  <div> <?php echo date_fr($orders->order_data_created);?> </div><div> <?php echo date_fr_heur($orders->order_data_created);?></div> </span> </td>
					
			    			<td class="sub_col" > <span class="position_text"> <div style="position: relative;text-align: left;"> <?php echo $orders->customer_firstname.' '.$orders->customer_lastname;?></div> <div>Tél.<?php echo $orders->customer_phone;?> </div>  </span> </td>
							<td class="sub_col" > <span class="position_text"> <?php echo $orders->order_billing_city;?> </span> </td>
							<td class="sub_col" >
                            <?php foreach($orders_detail as $detail) :?>
							<?php $product = $this->M_products->get_this($detail->product_id);
							$assocation_country = "";
							 if($detail->association_id){ 
							 $assocation = $this->M_associations->get_this_assocation($detail->association_id);
							 
							 $assocation_country ="(".$assocation->country_name.")";
							 } ?>
							
                             <div style="position: relative;text-align: left;"><span style="margin-right:5px;" ><?php echo $detail->product_quantity;?></span><?php echo $product->product_name;  echo $assocation_country;?> </div> 
							<?php endforeach; ?>
							 </td>
							<td class="sub_col" > <span class ="position_text"> <?php echo (number_format($orders->order_amount, 2, ',', ''))."  euro" ?> </span>
							<?php if($orders->order_payment_status==3){ ?>
							
							   <div style="position: relative;top: 3px;left: 17%"><span style="margin-right:5px;color:#64b92a" class=""><i class="glyphicon glyphicon-ok"></i></span> </div> 
							
							
							<?php } ?>
							</td>
				           <td class="sub_col" > <span class="position_text"><div> <?php echo $orders->partener_lastname;?></div> <div>Tél.<?php echo $orders->partener_phone;?> </div> </span> </td> 
							 <td class="sub_col" > <span class="position_text"> <?php echo $orders->partener_city;?> </span> </td>
					   <td class="sub_col" ><span  class="span-<?php  echo $orders->order_id;?> label label-<?php echo $label;?> icone_action" ><?php echo $partener_status;?></span></td>							
                
	 	  
					<td class="sub_col" ><span  class="span-<?php  echo $orders->order_id;?> label label-success icone_action" style="background-color: <?php echo $orders->status_color;?>; border-color: <?php echo $orders->status_color;?>;" ><?php echo $orders->status_name;?></span></td>							
             <td class="sub_col" > <span class="position_text"> <?php echo $orders->order_comments;?> </span> </td>
				
				<td class="sub_col">
				
				        	<a href="<?php echo base_url().'orders/detail/'.$orders->order_id;?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-eye-open"></i></button></a>
							
				   
				  
				  </td>
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
	

<script type="text/javascript">

$(document).ready(function () {
 $(".modalconfirm").click(function () {
		var customer_id=$(this).attr('data-id');
		jQuery('.url').val(customer_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var customer_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'customers/delete/';?>",
				data: {customer_id:customer_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+customer_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var customer_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'customers/updatestatus/';?>",
				data: {customer_id:customer_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+customer_id).empty();

						if(idsatus == 1){$( '.span-'+customer_id ).removeClass( "label-danger label-warning" );$( '.span-'+customer_id ).addClass( "label-success" );$('.span-'+customer_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+customer_id ).removeClass( "label-success label-warning" );$( '.span-'+customer_id ).addClass( "label-danger" );$('.span-'+customer_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>