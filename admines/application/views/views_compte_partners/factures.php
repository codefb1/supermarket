
 <div class="panel panel-default page-panel">
 

 <h1 class="page_title title_page" >Paiments / <span>Factures</span> </h1>
<div class="page_content" style="padding-top: 0px;">
  <div class="container-fluid">
    <div class="row saerch_facture">
	   <form method="GET" action="<?=base_url().'comptedPartener/factures/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
		
			

			  <div class="row">

			<div class="col-lg-2" style="padding-right: 0px;">
			<label style="width: 20%;display: inline-block;position: relative;top: -3px;">DATE </label>
			<input  style="width: 73%;display: inline-block;" name="delivery_date_time" id="delivery_date_time" type="date"  class="form-control"  value="<?php echo $delivery_date_time;?>">
			</div>
			
				<div class="col-lg-2" style="padding-right: 0px;padding-left: 0px;">
			<label style="width: 10%;display: inline-block;position: relative;top: -3px;" >À  </label>
			<input style="width: 80%;display: inline-block;" name="delivery_date_time_end" id="delivery_date_time_end" type="date"  class="form-control"  value="<?php echo $delivery_date_time_end;?>">
			</div>
			
			

              <div class="col-lg-4" style="padding-right: 0px;padding-left: 0px;">
				<label style="width: 46%;display: inline-block;">SELECTIONNEZ LA PÉRIODE  </label>
              <select  id="duration"  name="duration" class="form-control  btn-xs" style="width: 39%;display: inline-block;">
							<option value=""> Selectionnez...</option>
							<option <?php  if($duration ==1){ echo"selected";} ?> value="1">Aujourd'hui</option>
							<option <?php  if($duration ==2){ echo"selected";} ?> value="2">Cette semaine</option>
							<option <?php  if($duration ==3){ echo"selected";} ?> value="3">Ce mois </option>
							<option <?php if($duration == 4)echo "selected";?>   value="4" >Les 3 derniers mois</option>
                           <option <?php  if($duration ==5){ echo"selected";} ?> value="5">Cette année </option>
																</select> </div>
									
					<div class="col-lg-4" style="padding-right: 0px;padding-left: 0px;">
	<button type="submit"  class="btn btn-w-md btn-accent">Rechercher </button> 
			<a href="<?=base_url();?>comptedPartener/factures/?filtercheck=1&duration=N&delivery_date_time=N&delivery_date_time_end=N" class="btn btn-w-md btn-success">Réinitialiser la rechecher</a>
							
					</div>				
									
             
            </div>
			 
		
	</form>
	  </div>




    <div class="row">
      <div class="col-lg-12">

	  
	  
        <div class="panel panel-default" style="padding: 0px!important;">
         
          <div class="table-responsive">
            <table class="table info_table table-hover info_table_facture " id="accounts_table">
              <thead>
              
                <tr>
                <th><span>DATE</span><div>DE FACTURE</div></th>
				<th><span class="text_vert">RÉFÉRENCE</span><div>DE COMMANDE</div></th>
				 <th><span>PANIER</span><div>DE CLIENT</div></th>
				<th><span class="text_vert">NOM DU CLIENT</span> <div>FINAL</div></th>
				<th><span class="">MONTANT TOTAL</span><div>TAX/TAV</div></th>
		        <th><span class="text_vert">PAYÉ</span> <div> &MONTANT PAYÉ </div></th>
				<th><span class="">PREUVE</span><div>DE PAIMIENT</div></th>
                </tr>
              </thead>
              <?php foreach($orders_list as $orders) :
			  $tvaCart = ($orders->order_total_price_buying/100)*$orders->taxe_value;
			  $htCart = $orders->order_total_price_buying-$tvaCart;
			  $tvaShopping = ($orders->order_shipping_rate/100)*$orders->taxe_value;
			  $htShopping = $orders->order_shipping_rate-$tvaShopping;
			  $total = $orders->order_total_price_buying+$orders->order_shipping_rate;
			  $orders_detail = $this->M_orders->get_orders_detail($orders->order_id);
			  $order_payment_status_partener="<div  class='bolder text_red'>NON PAYÉ</div>";
		      if($orders->order_payment_status_partener==2){$order_payment_status_partener='<div class="bolder text_vert">FACTURE PAYÉ</div>';}
	
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			   <td class="sub_col date_commande" >   <div class="date_fr bolder"> <?php echo date_fr($orders->delivery_date_time);?> </div><div> <?php echo date_fr_heur($orders->delivery_date_time);?></div>  </td>
	
			   <td class="sub_col bg_tr num_facture" > <div class="bolder"> FAC-F<?php  echo $orders->order_id;?></div>
			    </td>
					<td class="sub_col" >
					<?php $i=1; foreach($orders_detail as $detail) :   ?> 
					<div class="product-name order-detail-<?php  echo $detail->order_detail_id;?>" <?php if($i>2){echo 'style="display:none;"';} ?> > <?php echo $i; ?>-<?php echo $detail->product_name;?> </div>
					<?php $i++;  endforeach; ?>
					<div class="plus_orders" data-id ="<?php  echo $detail->order_detail_id;?>" <?php if(count($orders_detail)>2){echo 'style="display:block;"';} else {echo 'style="display:none;"';} ?> > Afficher <?php echo count($orders_detail)-2;?> plus </div>
					  </td>
			   		
			   	 			
							<td class="sub_col customer bg_tr" >  <div class="bolder"> <?php echo $orders->customer_firstname.' '.$orders->customer_lastname;?></div></td>
							
							<td class="sub_col" > 
							<div class="amount"> <?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."  €" ?> </div>
                            <div class="ht_cart"> <img src="<?php echo base_url().'template/';?>assets/img/attachement.png" alt="" class=""> HT PANIER  <?php echo (number_format($htCart, 2, ',', ''))."  €" ?> </div>
							 <div class="tva_cart"><img src="<?php echo base_url().'template/';?>assets/img/attachement.png" alt="" class="">  TVA PANIER <?php echo (number_format($tvaCart, 2, ',', ''))."  €" ?> </div>
							</td>
							
							
							
						
					
							 <td class="sub_col bg_tr paye_facture" >  <?php  echo $order_payment_status_partener;?>
			   
						
				<td class="sub_col">
			<?php	if($orders->order_payment_status_partener==2){ ?>
				        	<a href="<?php echo base_url().'comptabilite/orderPdfPartners/'.$orders->order_id;?>">
							<img src="<?php echo base_url().'template/';?>assets/img/telecharger.png" alt="" class="" style="width: 50%;">
							</a>
			<?php }  ?>	
				   
				  
				  </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
          </div>
		       <div style="text-align:center;margin-bottom:10px;">
   <?=$pagination;?>
  
  </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
	
	

<script type="text/javascript">
	
		$(".plus_orders").click(function () {
			var $id =  $(this).data('id');
			$('.order-detail-'+$id).css('display','block');
		   $(this).css('display','none');;
	 	});
</script>