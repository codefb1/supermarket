<?php 
		if($orders->order_payment_method==1){$mode='Carte bancaire';}		 
		if($orders->order_payment_method==2){$mode='Ogone';}	
		if($orders->order_payment_method==3){$mode='Chèque';}
		if($orders->order_payment_method==0){$mode='Aucun';}	
                                                               
		if($orders->order_payment_status==0){$label='label-danger';$order_payment_status='Abandon de panier';}			
		if($orders->order_payment_status==1){$label='label-warning';$order_payment_status='Paiement en attente';}
		if($orders->order_payment_status==2){$label='label-danger';$order_payment_status='Paiement refusé';}
		if($orders->order_payment_status==3){$label='label-success';$order_payment_status='Paiement accepté';}
		if($orders->order_payment_status==5){$label='label-danger';$order_payment_status='Commande annulée ';}
		if($orders->order_payment_status==4){$label='label-success';$order_payment_status='Commande expédiée';}
		if($orders->order_payment_status==6){$label='label-warning';$order_payment_status='Commande en préparation';}
		
				
		if($orders->order_partener_status==1){$label_partener='label-warning';$order_partener_status='Nouvelle demande';}
		if($orders->order_partener_status==2){$label_partener='label-warning';$order_partener_status='En cours de préparation ';}
		if($orders->order_partener_status==3){$label_partener='label-success';$order_partener_status='Livré';}
		if($orders->order_partener_status==4){$label_partener='label-danger';$order_partener_status='Réfusée';}
		
		$order_payment_status_partener="La commande n' a pas été payée";
		if($orders->order_payment_status_partener==2){$label='label-success';$order_payment_status_partener='La commande a été payée';}
	
		
		$taxe_value= $orders->taxe_value;
		$order_taxe_value= $taxe_value/100;
	   ?>
<div class="row">

  <div class="col-lg-12">
    <div class="panel panel-default">
     
      <div class="panel-body">
	  <div class="col-sm-12">
  <h2 class="page_title" style="text-align: center;" >Détails de la commande numéro  <?php  echo $orders->order_reference;?></h2>
  
</div>
	   <div style="text-align:left;margin-bottom:10px;">
 
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='#'"><i class=" fa fa-print"></i>  Imprimer ticket préparation</button>
<button class="btn btn-shadow btn-primary" type="button"onClick="location.href='#'"><i class=" fa fa-print"></i>  Imprimer ticket livraison</button>
<button class="btn btn-shadow btn-primary" style="text-align:right;float: right;"  type="button"onClick="location.href='<?php echo base_url().'comptedPartener/newOrders';?>'"><i class=" fa fa-reply"></i>  Listes des commandes</button>

 </div>
        <div class="panel-heading"> </div>
	
	<div class="row m-b">
	<div class="col-md-6 col-sm-7 detail" style="margin-bottom: 20px;">
	 <div class="widget portlet">

  <div class="title_block"> <h4 class="widget-title"><b>Commande num  <?php  echo $orders->order_id;?> du  <?php echo date_fr_dmy($orders->order_data_created);?></b> 	      <span style="margin-left: 10px;" class="span-<?php  echo $orders->order_id;?> label <?php echo $label_partener ?> " >  <?php echo $order_partener_status;?></span>   
							
				 
				  </h4></div>
				  <form  role="form">
				  	<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 col-sm-3 control-label">Date </label>
							<div class="col-md-9 col-sm-9">
								<?php echo date_fr_dmy($orders->order_data_created)?>  à <?php echo date_fr_heur($orders->order_data_created)?>
							</div>
						</div>
						
				</div>
				  	<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 col-sm-3 control-label">Total:</label>
							<div class="col-md-9 col-sm-9">
								<?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."  euro" ?>
							</div>
						</div>
						
				</div>
					
					
				<div style="height: 30px;"><?php echo $order_payment_status_partener;?> </div>
					
				</form>
				</div>
	 </div>
			
	    <div class="col-md-6 col-sm-5 detail" style="margin-bottom: 20px;">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b>Client</b>
				 
				  </h4></div>
				   <div class=" message message_shipment"> </div>
					<form  role="form">
			
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 col-sm-3 control-label">Nom</label>
							<div class="col-md-9 col-sm-9">
			<?php  echo $orders->order_shipping_lastname;?>
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 col-sm-3 control-label">Prénom</label>
							<div class="col-md-9 col-sm-9">
								<?php  echo $orders->order_shipping_firstname;?>
							</div>
						</div>
						</div>
		
			<div style="height: 40px;"> </div>
				
				</form>
                </div>
                
              </div>
            </div>
			
			    <div class="col-md-4 col-sm-12 detail" style="margin-bottom: 10px;">
		
              <div class="widget portlet">  
                <div class="widget-heading updateInputs">
              
				  <div class="row ">
				  <div class="form-group">
							<label  class="col-md-1 col-sm-2 control-label"><div class="title_block"> <h4 class="widget-title"><b>Panier</b>
				 </label>
							<div class="col-md-11 col-sm-10">
							</div>
						</div>
						
				</div></div>
				   <div class=" message message_shipment"> </div>
					<form  role="form">
					<div class="row">
			<?php $i=1; foreach($orders_detail as $order_detail) : 

                 $image =$this->M_products_pictures->get_one_product_picture($order_detail->product_id);
					$path ="";
					if($image){
					$path =base_url().'medias/products/'.$image->product_pictures;
					}
			?>
						<div class="col-md-4 col-sm-4">
							  <div class="" style="width: 90%;">  <img data-dz-thumbnail="" src="<?php echo $path; ?>" class="img-responsive"style="    width: 200px;
    height: 100px;" > </div>
							   <div class="product_grille_name">
							<?php   if($order_detail->orders_detail_product_poids) {?>
                          <span class=""> <?php echo $order_detail->orders_detail_product_poids;?> KG</span>
							<?php   } ?>
						            </div>
							  <div class="product_grille_name">
                          <span class=""> <?php echo $order_detail->product_name;?> </span>
						            </div>
							  
							 
                              </div>
				
				<?php $i++; endforeach; ?>  </div>
			
				
				
			
				</form>
                </div>
                
              </div>
            </div>
			
			  <div class="col-md-8 col-sm-12 detail" style="margin-bottom: 10px;">
		
              <div class="widget portlet">  
                <div class="widget-heading updateInputs">
              				  <div class="row ">
				  <div class="form-group">
							<label  class="col-md-1 col-sm-2 control-label"><div class="title_block"> <h4 class="widget-title"><b>Panier</b>
				 </label>
							<div class="col-md-11 col-sm-10">
							</div>
						</div>
						
				</div></div>
				  <div class="row ">
				  <div class="form-group">
						<div  class="col-md-1 col-sm-2 control-label"> <h4 class="widget-title"><b>Qté</b></h4></div>
						<div  class="col-md-3 col-sm-2 control-label"> <h4 class="widget-title"><b>Produit</b></h4></div>
						<div  class="col-md-2 col-sm-2 control-label"> <h4 class="widget-title"><b>Poids</b></h4></div>
						<div  class="col-md-2 col-sm-2 control-label"> <h4 class="widget-title"><b>HT</b></h4></div>
						<div  class="col-md-2 col-sm-2 control-label"> <h4 class="widget-title"><b>TVA</b></h4></div>
						<div  class="col-md-2 col-sm-2 control-label"> <h4 class="widget-title"><b>TTC</b></h4></div>

							
						</div>
						
				</div></div>
				   <div class=" message message_shipment"> </div>
					<form  role="form">
			<?php $totalPoids=0;  $totalPriceHT=0; $totalPriceTTC=0; $i=1; foreach($orders_detail as $order_detail) : 

                    $totalPoids=$totalPoids+$order_detail->orders_detail_product_poids * $order_detail->product_quantity;
					$totalPriceTTC= $totalPriceTTC+$order_detail->price_buying * $order_detail->product_quantity;
			        $totalPriceHT=$totalPriceHT+(($order_detail->price_buying-($order_taxe_value*$order_detail->price_buying))  * $order_detail->product_quantity);
			    
			?>
				<div class="row ">
				  <div class="form-group">
				  
				  <div class="col-md-1 col-sm-2">
								<?php echo $order_detail->product_quantity;?>
							</div>
							 <div class="col-md-3 col-sm-2">
								<?php echo $order_detail->product_name;?>
							</div>
							 <div class="col-md-2 col-sm-2">
								<?php echo $order_detail->orders_detail_product_poids * $order_detail->product_quantity;?>  KG
							</div>

							<div class="col-md-2 col-sm-2">
								<?php echo (number_format($order_detail->price_buying  * $order_detail->product_quantity, 2, ',', ''))." euro " ;?>
							</div>
							<div class="col-md-2 col-sm-2">
								<?php echo $taxe_value;?> %
							</div>
							<div class="col-md-2 col-sm-2">
							<?php echo (number_format(($order_detail->price_buying-($order_taxe_value*$order_detail->price_buying))  * $order_detail->product_quantity, 2, ',', ''))."  euro" ;?></div>
						</div>
						
				</div>
				
				<?php $i++; endforeach; ?>
			 <div class="row ">
				  <div class="form-group">
						
						<div  class="col-md-8 col-sm-5 control-label"> <h4 class="widget-title"><b></b></h4></div>
						<div  class="col-md-2 col-sm-2 control-label"> <h4 class="widget-title"><b>Total</b></h4></div>
						<div  class="col-md-2 col-sm-5 control-label"> <h4 class="widget-title"><b><?php echo (number_format($totalPriceTTC, 2, ',', ''))."  euro" ;?></b></h4></div>
                      
							
						</div>
						
				</div>
				
				
			
				</form>
                </div>
                
              </div>
            </div>
  
   </div>
	
	 
	 



	 
	 
	 	 
<div class="row"> 
 <?php if($orders->order_dispo_time){ ?>
	 	    <div class="col-md-6 col-sm-5 detail" style="margin-bottom: 20px;">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b>Livraison</b>
				 
				  </h4></div>
				   <div class=" message message_shipment"> </div>
					<form  role="form">
			 <?php if($orders->order_status==2){ ?>
				<div class="row ">
				  <div class="form-group">
				  <label  class="col-md-6 col-sm-6 control-label"> Passage du livreur attendu: </label>
						
	  <div class="col-md-6 col-sm-6"> 
	   <?php if($orders->order_dispo_date==date("Y-m-d")){ ?>
	   				Aujourd'huit à  <?php  echo $orders->order_dispo_time;?>
	  <?php }else{ ?>
	  						<div class="countdown-min countdown-small" data-countdown="<?php  echo $orders->order_dispo_date;?> <?php  echo $orders->order_dispo_time;?> "></div>
	 
	    <?php } ?>
							</div>
						</div>
						
				</div>
				 <?php } ?>
					 <?php  if($orders->order_status==3){ ?>
						
						<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Le coli a été récupéré le :</label>
							<div class="col-md-7">
							<?php echo date_fr_dmy($orders->delivery_date_time);?> à <?php echo date_fr_heur($orders->delivery_date_time);?>
							</div>
						</div>
						</div>	
						<?php  } else {  ?>
				<div class="row">
						<div class="form-group">
							
							<div class="col-md-9 col-sm-9">
							Si le livreur a récupére le coli 
							merci de valider ici  <button class="btn btn-shadow btn-success isDelivry" type="button" >  Oui</button>
							</div>
						</div>
						</div>
		<?php  }  ?>
			
				</form>
                </div>
                
              </div>
            </div>
		
		
 <?php  } if($orders->order_partener_status!=4 and !$orders->order_dispo_time ){ ?>
		<div class="col-md-3 col-sm-2 ">
             
            </div>
			
	<div class="col-md-6 col-sm-10 ">
	 <div class="row">
            <div class=" message message_dispo"> </div>
			 
						<div class="form-group dispo_date" <?php if($orders->order_partener_status==4){ ?>style="display:none"<?php } ?>>
							<label  class="col-md-4 col-sm-6 control-label date_time">La commande sera près le :</label>
							<div class="col-md-4 col-sm-4">
							<select id="day" name="day" class="form-control  btn-xs">
							<option value=""> Selectionnez ...</option>
							<option value="0">Aujourd'huit</option>
							<option value="1">Demain</option>
							<option value="2">àpres demain </option>
							<option value="3">àpres 3 jours</option>
							<option value="4">àpres 4 jours</option>
							<option value="5">àpres 5 jours</option>
							</select>
							</div>
							<label  class="col-md-1 col-sm-1 control-label date_t" style="">à</label> 
							<div class="col-md-3 col-sm-3">
								 <input type="time" class="form-control"  id="order_dispo_time"  name="order_dispo_time" value="<?php  echo $orders->order_dispo_time;?>" />
							</div>
						</div>
						</div>
						<div class="row ">
						<div class="col-md-4 col-sm-6">
							<button class="btn btn-shadow btn-danger cancel" type="button" <?php if($orders->order_partener_status==4){ ?> disabled style="color:#000;"<?php } ?>>  Réfuser</button>
                                 </div>
							<div class="col-md-4 col-sm-4 dispo_date">
							<button class="btn btn-shadow  btn-success action_dispo" <?php if($orders->order_partener_status==4){ ?>style="display:none"<?php } ?> type="button"> Confirmer</button>
                                </div>
						</div>
            </div>
			<div class="col-md-3 col-sm-2 ">
             
            </div>
	  </div> 
	 
	 <?php } ?>
	 
	 
 
	 
	 <?php   if($orders->order_comments_parteners ){ ?>
	<div class="col-md-12 col-sm-12 detail">
	
	 
	   <div class="widget portlet">

  <div class="title_block"> <h4 class="widget-title"><b>Message</b> 	      
  
							
				 
				  </h4></div>
				  <form  role="form">
				  	<div class="row  ">
				  <div class="form-group">
							<div class="col-md-9 col-sm-9">
						 <?php echo $orders->order_comments_parteners;?>	</div>
						</div>
						
				</div>
				 
					
					
					
				</form>
				</div>
	
	   </div>
	
	 
	 <?php  } ?>
</div></div></div></div>
<style>

.date_time {position: relative;
    top: 12px;
    font-weight: bold;
    color: #59a425}

.date_t {position: relative;
    top: 12px;
    font-weight: bold;
    color: #59a425}

.cancel,.action_dispo {width: 100%;
    text-align: left;
    background: none;
    color: #ab3326;
    font-weight: bold;
	}
	.action_dispo {
    color: #59a425;}

.underline {text-decoration: underline;margin-right: 10px;}

.partener {
    width: 30%;
    display: inline-block;
    left: 23px;
    position: relative;
	}
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
.detail label,.delivery label ,.infDelivery label,.payment label ,.fournisseur label {
		font-weight: bold!important;
   font-size: 12px!important;
    position: relative!important;
    top: 3px!important;
	}
	.billing .portlet,.detail .portlet,.delivery .portlet , .infDelivery .portlet, .payment .portlet , .fournisseur .portlet  {
		border-width: 2px!important;
		border-style: solid!important;
		border-color: #90EE90!important;
		padding: 10px;
	}
	
.billing	.row + .row , .detail	.row + .row, .delivery	.row + .row, .infDelivery	.row + .row, .payment	.row + .row,.fournisseur .row + .row {
    margin-top: 6px;
}
	.billing .widget-title,.detail .widget-title {
		
	
	}
	
	.action_block1 {
		width: 21%;
		display: inline-block;
	}
	.title_block1 {
		width: 72%;
		display: inline-block;;
	}
	
	.commande label {
			font-weight: bold!important;
			font-size: 12px!important;
			position: relative!important;
			top: 9px!important;
	}
	.commande .portlet {
		border-width: 2px!important;
		border-style: solid!important;
		border-color: #90EE90!important;
		padding: 10px;
	}
	
.commande	.row + .row{
    margin-top: 6px;
}
	.commande .widget-title {
		
	
	}
	
[class*='col-md'] {
    margin-bottom: 5px;
}
h4 {
    font-size: 14px!important;
}
</style>
 <script src="<?php echo base_url().'template/';?>countdown.min.js"></script>
 <script type="text/javascript">

$(".isDelivry").click(function () {
	var order_id = <?php  echo $orders->order_id;?>;
		
			
			jQuery.ajax({
				url: "<?php echo base_url().'comptedPartener/ordresDelivry/';?>",
				data: {order_id:order_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
				jQuery('.message_delivry').text('Enregistrement avec succès');
				setTimeout(function(){ window.location.href="<?php echo base_url().'comptedPartener/factures';?>"; }, 2000);
				}
			});
			
			});
			$(".action_dispo").click(function () {
			
			  $(".message").html('');
			var order_id = <?php  echo $orders->order_id;?>;
			var order_dispo_time   = $("#order_dispo_time").val();
            var day   = $("#day").val();
			if(day=="" || order_dispo_time==""  ) { 
			$(".message_dispo").text('veuillez remplir le champ');
			 } else {			
		   
			  	jQuery.ajax({
				url: "<?php echo base_url().'comptedPartener/ckeckDay/';?>",
				data: {day:day},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
							if(data.message){
								 jQuery('.message_dispo').text(data.message);
							} else {
								
								
										 jQuery.ajax({
									url: "<?php echo base_url().'comptedPartener/dipsoOrder/';?>",
									data: {order_id:order_id,order_dispo_time:order_dispo_time,day:day},
									dataType: "json",
									type: "POST",  
									success: function(data) { 
									 jQuery('.message_dispo').text('Enregistrement avec succès');
									   setTimeout(function(){ location.reload(true); }, 2000);
									}
										 
										});	
							
							}
				    }
				});	
			}
			});
		
		$(".cancel").click(function () {
			
			  $(".message").html('');
			var order_id = <?php  echo $orders->order_id;?>;
			
            var order_partener_status   = 4;
			
			jQuery.ajax({
				url: "<?php echo base_url().'comptedPartener/update_partener_status/';?>",
				data: {order_id:order_id,order_partener_status:order_partener_status},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
				$('.cancel').attr('disabled', true);
				$('.cancel').css('color', '#fff');
				$('.dispo_date').css('display', 'none');
				jQuery('.message_dispo').text('Enregistrement avec succès');
				          setTimeout(function(){ location.reload(true); }, 2000);
						
				
				}
			});
			
			});
        $('[data-countdown]').each(function() {
			var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
			$this.html(event.strftime('%D Jours %H:%M:%S'));
			});
	 	});
		
	
			</script>
	 