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
		
				
		if($orders->order_partener_status==1){$label_partener='label-warning'; $title_page='Fiche de la nouvelle <span style="padding-right: 20px;">Commande</span>';  $order_partener_status='Nouvelle Commande'; $background='background_blue'; $order_background='order_background_blue';  $text_color='title_blue';  $order_span_p_p="span_p_p_blue";$img='nouve-lcomm-grand.png';}
		if($orders->order_partener_status==2){$label_partener='label-warning'; $title_page='Fiche de  préparation de la  <span style="padding-right: 20px;">Commande</span> ';  $order_partener_status='En cours de préparation  '; $background='background_yellow';  $order_background='order_background_yellow'; $text_color='title_yellow'; $order_span_p_p="span_p_p_yellow"; $img='com-encours-grand.png';}
		if($orders->order_partener_status==3){$label_partener='label-success';$title_page='Fiche de la <span style="padding-right: 20px;" >Commande Livrée </span>';  $order_partener_status='Commande Livré'; $background='background_green'; $order_background='order_background_green';  $text_color='title_green'; $order_span_p_p="span_p_p_green"; $img='comm-livrai-grand.png'; }
		if($orders->order_partener_status==4){$label_partener='label-danger'; $title_page='Fiche de la  <span style="padding-right: 20px;">Commande Réfusée</span> ';  $order_partener_status='Commande  Réfusée'; $background='background_red';  $order_background='order_background_bleu'; $text_color='title_red'; $order_span_p_p="span_p_p_red"; $img='comm-refuse-grand.png';}
		
		$order_payment_status_partener="Panier Non Payée";
		if($orders->order_payment_status_partener==2){$label='label-success';$order_payment_status_partener='Panier Payée';}
	
		
		$taxe_value= $orders->taxe_value;
		$order_taxe_value= $taxe_value/100;
	   ?>
	   
	    <div class="panel panel-default page-panel detail_order">
 

 <h1 class="page_title title_page" ><?php echo $title_page; ?>  <span class="badge badge-notify <?php echo $background; ?>" style="left: 10px!impotrtant;
    position: relative!impotrtant;"><span><?php echo $orders->order_id; ?> </span></span>
					 </h1>
 
 </div>
 
 <div class="row">
 <!--  block product  -->
 <div class="col-md-8 col-sm-8 col-lg-8" >
  <div class="row page_detail_order" style="margin-top: -20px">
   <div class="col-md-12 col-sm-12 col-lg-12 <?php echo $order_background; ?> order_background list_product" >
  
			
			
			<?php $i=1;  $totalPoids=0;  $totalPriceHT=0; $totalPriceTTC=0; $i=1; 
			  foreach($orders_detail as $order_detail) : 
                    $tva =0;
                    $totalPoids=$totalPoids+$order_detail->orders_detail_product_poids * $order_detail->product_quantity;
					$totalPriceTTC= $totalPriceTTC+$order_detail->order_product_price_buying * $order_detail->product_quantity;
			        $totalPriceHT=$totalPriceHT+(($order_detail->order_product_price_buying-($order_taxe_value*$order_detail->order_product_price_buying))  * $order_detail->product_quantity);
			        //$image =$this->M_products_pictures->get_one_product_picture($order_detail->product_id);
					$image =$this->M_products_pictures->get_one_product_picture_partener($order_detail->product_id);
					$path ="";
					$tva =($order_detail->order_product_price_buying * $order_detail->product_quantity)-(($order_detail->order_product_price_buying-($order_taxe_value*$order_detail->order_product_price_buying))  * $order_detail->product_quantity);
					
					if($image){
					$path =base_url().'medias/products/'.$image->product_pictures;
					}else {
					     $image =$this->M_products_pictures->get_one_product_picture($order_detail->product_id);
									if($image){
									 $path =base_url().'medias/products/'.$image->product_pictures;
								} else {
									$path =base_url().'template/assets/img/inconu.png';	
				            	}
					}
			?>
			<div class="row detail_product">
			<div class="col-md-1 col-sm-1 col-lg-1" > 
			 <span class="badge  <?php echo $background; ?> numb_compteur"><span><?php echo $i; ?> </span></span>
			</div>
						<div class="col-md-3 col-sm-3 col-lg-3" >
		                 <div class="" style="width: 90%;"> <img data-dz-thumbnail="" src="<?php echo $path; ?>" class="img-responsive"> </div>
                    	</div>
						<div class="col-md-8 col-sm-8 col-lg-8 product_info" >
						<h2 style="font-weight:bloder!important;"><?php echo $order_detail->product_name;?></h2>
							<div><span><b>Quantité :</b> </span> <span class="poid"><?php echo $order_detail->product_quantity;?>   </span> <?php if ($order_detail->orders_detail_product_poids){ ?> <span><b>Poids :</b> </span> <span class="poid"><?php echo $order_detail->orders_detail_product_poids;?>/<?php echo $order_detail->orders_detail_product_poids * $order_detail->product_quantity;?>  KG </span><?php } ?>   <span><b>Prix :</b> </span> <span class="poid"> <?php if ($order_detail->orders_detail_product_poids){ ?> <?php echo (number_format($order_detail->order_product_price_buying , 2, ',', ''))."  €" ;?>/KG<?php } else { ?>  <?php echo (number_format($order_detail->order_product_price_buying , 2, ',', ''))."  €" ;?>  <?php }  ?>  </span>
							</span></span>   </div>
						<div> <?php if ($order_detail->orders_detail_product_poids){ ?> <span class="poid"><?php echo $order_detail->orders_detail_product_poids * $order_detail->product_quantity;?>  KG </span>  <?php } ?> <span><b> HT:</b> <span class="price_ht span_p_p <?php echo $order_span_p_p;?>"><?php echo (number_format(($order_detail->order_product_price_buying-($order_taxe_value*$order_detail->order_product_price_buying))  * $order_detail->product_quantity, 2, ',', ''))."  €" ;?></span></span>  <span><b> TVA:</b> <span class="price_tva span_p_p <?php echo $order_span_p_p;?>"><?php echo (number_format($tva, 2, ',', '')."  €" );?></span></span>  <span><b> TTC:</b>  <span class="price_ttc span_p_p <?php echo $order_span_p_p;?>"><?php echo (number_format($order_detail->order_product_price_buying  * $order_detail->product_quantity, 2, ',', ''))." € " ;?>
							</span></span>   </div>
						</div>
						<div class="col-md-12 col-sm-12 col-lg-12 lign_separateur" >
						</div>
						
			</div>
  
   <?php $i++; endforeach; ?>
    
   </div>
 </div>
  <h2 class="page_title title_page"> Information livraison</h2>
<?php if($orders->order_dispo_time){ ?>
  <div class="row page_detail_order" style="margin-top: -20px">
 
	  <div class="col-md-12 col-sm-12 col-lg-12 <?php echo $order_background; ?> order_background deleviry"  <?php if($orders->order_status!=2){ ?>style="display:none;" <?php  } ?> >
	 <?php if($orders->order_status==2){ ?>
	   <?php if($orders->order_dispo_date==date("Y-m-d")){ ?>
	 <p style="text-align: left;" > Le passage de livreur est attendu aujourd'hui à <?php  echo $orders->order_dispo_time;?></p>
	 <button type="button" class="btn btn-outline btn-primary background_green show-order" style="margin-bottom: 20px;">IMPRIMER TICKET LIVRAISON </button>
	 <?php }else{ ?>
	 <div class="row">
	 <div class="col-md-6 col-sm-6 col-lg-6">
	  					<p style="text-align: left;top: 2px;    position: relative;" > Le passage du livreur est prévu dans :</p>  	
	  </div>
	   <div class="col-md-6 col-sm-6 col-lg-6">
	  						<div style="max-width: 60%;text-align: left;float: left;" class="countdown-min countdown-small" data-countdown="<?php  echo $orders->order_dispo_date;?> <?php  echo $orders->order_dispo_time;?>"></div>
	  </div> </div>
	    <?php } ?>
		<?php  } ?>
		
	
	 </div>
	 
	 
    </div>
	<div class="row page_detail_order" style="margin-top: -20px">
	 <div class="col-md-12 col-sm-12 col-lg-12 <?php echo $order_background; ?> order_background deleviry" >
		<?php  if($orders->order_status==3){ ?>
		 <p style="text-align: left;"> Le coli a été récupéré le :<?php echo date_fr_dmy($orders->delivery_date_time);?> à <?php echo date_fr_heur($orders->delivery_date_time);?></p>
	 <button type="button" class="btn btn-outline btn-primary background_green show-order" style="margin-bottom: 20px;">IMPRIMER TICKET LIVRAISON </button>
	 
	<?php  } else { ?>
	
		 <p style="text-align: left;"> Si le livreur a récupéré le coli merci de valider ici  <button class="btn btn-shadow btn-success isDelivry" type="button" >  Coli récupéré</button>
				 </p> 			
	<?php  }  ?>
	    </div>
		 </div>
<?php  } ?>
 <?php   if($orders->order_partener_status!=4 and !$orders->order_dispo_time ){ ?>
	
  <div class="row page_detail_order" style="margin-top: -20px">
	  <div class="col-md-12 col-sm-12 col-lg-12 <?php echo $order_background; ?> order_background deleviry" >
	<div class="row">
	<div class=" message message_dispo"> </div>
			 
	<p>La commande sera prête le :</p>
	<div class="col-md-3 col-sm-3 col-lg-3">
        <button type="button" class="btn btn-outline btn-primary background_green show-order action_dispo" <?php if($orders->order_partener_status==4){ ?>style="display:none"<?php } ?>>CONFIRMATION </button>
	</div>
	<div class="col-md-7 col-sm-7 col-lg-7">
	
		<div class="form-group dispo_date" <?php if($orders->order_partener_status==4){ ?>style="display:none"<?php } ?>>
						
							<div class="col-md-7 col-sm-7">
							<select id="day" name="day" class="form-control  btn-xs">
							<option value=""> Selectionnez ...</option>
							<option value="0">Aujourd'hui</option>
							<option value="1">Demain</option>
							<option value="2">Apres demain </option>
							<option value="3">Apres 3 jours</option>
							<option value="4">Apres 4 jours</option>
							<option value="5">Apres 5 jours</option>
							</select>
							</div>
							<label  class="col-md-1 col-sm-1 control-label date_t" style="">à</label> 
							<div class="col-md-4 col-sm-4">
								 <input type="time" class="form-control"  id="order_dispo_time"  name="order_dispo_time" value="<?php  echo $orders->order_dispo_time;?>" />
							</div>
						</div>
	</div>
	<div class="col-md-2 col-sm-2 col-lg-2">
	          <button type="button" class="btn btn-outline btn-primary background_red show-cancel" <?php if($orders->order_partener_status==4){ ?> disabled style="color:#000;"<?php } ?>>REFUSER </button>
	
	</div>
	
            </div>
	</div>
	</div>
	
	<?php  } ?>
	<?php   if($orders->order_comments_parteners ){ ?>
	  <div class="row page_detail_order" style="margin-top: -20px">
	  <p> Message :</p>
	  <div class="col-md-12 col-sm-12 col-lg-12 <?php echo $order_background; ?> order_background deleviry" >
	 <?php echo $orders->order_comments_parteners;?>
	  </div> 
	  </div>
	  <?php  } ?>
  </div>
<!--  block price  -->

 <div class="col-md-4 col-sm-4 col-lg-4" >
  <div class="row amount_order" >
   <h2>Total achats   <span>  € <?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."" ?></span></h2>
 </div>
 
 <div class="row cotumor_info" >
  <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_1 ">
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_2">
					
 <div class="col-md-12 col-sm-12 col-lg-12" >
   <div class="row info_partener_order" >
    <div class="col-md-4 col-sm-4 col-lg-4" ><img src="<?php echo base_url().'template/assets/img/'.$img;?>" alt="" class=""></div>
	 <div class="col-md-8 col-sm-8 col-lg-8" >
	 <div><button type="button" class="btn btn-outline btn-primary <?php echo $background?>" style="text-transform: uppercase;" ><?php echo $order_partener_status?> </button></div>
	<?php  if($orders->order_partener_status==3){ ?>
	 <div><h2><b><?php echo $order_payment_status_partener;?></b></h2>
	 </div>
	<?php  } ?>
   </div>
   </div>
   <div class="col-md-12 col-sm-12 col-lg-12 info_cu" style="text-align: left;">
  <div><span class="lable"><b>Nom du client</b></span><span class= 'info_costumer' > <?php  echo $orders->order_shipping_lastname;?>  <?php  echo $orders->order_shipping_firstname;?></span><hr/></div>
   <div><span class="lable"><b>Ville client </b></span><span class= 'info_costumer' > <?php  echo $orders->order_shipping_city;?> </span><hr/></div>
   <div><span class="lable"><b>Date </span></b><span class= ' span_p_p <?php echo $order_span_p_p;?> info_costumer ' >  <?php echo date_fr($orders->order_data_created)?>  à <?php echo date_fr_heur($orders->order_data_created)?> </span><hr/></div>
					
   </div>
   <div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center;">
   <button type="button" class="btn btn-outline btn-primary background_imp" >IMPRIMER TICKET PRÉPARATION  </button>
	
   </div>
 </div>
 
  
 </div>
  </div>
 
 
 
 
 
 
 

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
 <script src="<?php echo base_url().'template/';?>countdown.js"></script>
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
	 