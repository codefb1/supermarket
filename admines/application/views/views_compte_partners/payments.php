
 <div class="panel panel-default page-panel">
 

 <h1 class="page_title title_page" >Paiments  <span></span> </h1>
<div class="page_content" style="padding-top: 0px;">
  <div class="container-fluid">
    <div class="row saerch_facture" style="display:none;">
	   <form method="GET" action="<?=base_url().'comptedPartener/payments/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
		
			

			  <div class="row" >

			<div class="col-lg-2" style="padding-right: 0px;">
			<label style="width: 20%;display: inline-block;position: relative;top: -3px;">DATE </label>
			<input  style="width: 73%;display: inline-block;" name="delivery_date_time" id="delivery_date_time" type="date"  class="form-control"  value="<?php echo $delivery_date_time;?>">
			</div>
			
				<div class="col-lg-2" style="padding-right: 0px;padding-left: 0px;">
			<label style="width: 10%;display: inline-block;position: relative;top: -3px;" >À  </label>
			<input style="width: 80%;display: inline-block;" name="delivery_date_time_end" id="delivery_date_time_end" type="date"  class="form-control"  value="<?php echo $delivery_date_time_end;?>">
			</div>
			
			

              <div class="col-lg-4" style="padding-right: 0px;padding-left: 0px;">
				<label style="width: 46%;display: inline-block;">SELECTIONEZ LA PÉRIODE  </label>
              <select  id="duration"  name="duration" class="form-control  btn-xs" style="width: 39%;display: inline-block;">
							<option value=""> Selectionnez...</option>
							<option <?php  if($duration ==1){ echo"selected";} ?> value="1">Aujourd'hui</option>
							<option <?php  if($duration ==2){ echo"selected";} ?> value="2">Cette semaine</option>
							<option <?php  if($duration ==3){ echo"selected";} ?> value="3">Ce mois </option>
							<option <?php if($duration == 4)echo "selected";?>   value="4" >Les 3 derniers mois</option>
                           <option <?php  if($duration ==5){ echo"selected";} ?> value="5">Cette année </option>
																</select> </div>
									
					<div class="col-lg-4" style="padding-right: 0px;padding-left: 0px;">
	<button type="submit"  class="btn btn-w-md btn-accent">Rechecher</button> 
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
                <th><span>DATE</span><div>DE PAIMENT</div></th>
				<th><span class="text_vert">RÉFÉRENCE</span><div>DE COMMANDE</div></th>
			

		        <th><span class="text_vert">PAYÉ</span> <div> &MONTANT PAYÉ </div></th>
				<th><span class="">PREUVE</span><div>DE PAIMIENT</div></th>
                </tr>
              </thead>
               <?php foreach($payments_parteners_list as $payments_parteners) :
			  
		
						$orders_list = $this->M_payments_parteners->get_orders_list($payments_parteners->payment_partener_id);
					
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			   <td class="sub_col date_commande" >   <div class="date_fr bolder"> <?php echo date_fr($payments_parteners->payment_date);?> </div><div> <?php echo date_fr_heur($payments_parteners->payment_date);?></div>  </td>
	
			   </td>
					<td class="sub_col" >
					<?php $i=1; foreach($orders_list as $orders) :   ?> 
					<div  class="product-name "> facture  <?php  echo $orders->order_id;?> Prix: <?php echo (number_format($orders->order_partener_amount, 2, ',', ''))."  €" ?> </div>
				 <?php $i++;  endforeach; ?>
					 
					  
					  </td>
			   		
			   	 			
							
							<td class="sub_col" > 
							<div class="amount"> <?php echo (number_format($payments_parteners->payment_amount, 2, ',', ''))."  €" ?> </div>
                       	</td>
							
							
							
						
					
						
				<td class="sub_col">
		 <a  target="_blank" href="<?php echo base_url()."medias/payment_preuves/".$payments_parteners->payment_preuve; ?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i> Paiement Pdf </button></a>
				
				  
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