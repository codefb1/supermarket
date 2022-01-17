<div class="col-sm-12">

  <h2 class="page_title" style="text-align: center;">Facutres à payer aux founisseurs </h2>
 
</div>
<div class="col-sm-12 text-center">
 <button class="btn btn-shadow btn-success" type="button" onClick="location.href='#'"><i class="icon-plus"></i> Factures  fournisseurs</button>
 
    <button class="btn btn-shadow btn-primary" type="button" onClick="location.href='<?php echo base_url().'comptabilite';?>'"> Factures clients </button>
<button class="btn btn-shadow btn-primary" type="button" onClick="location.href='<?php echo base_url().'comptabilite/transporters';?>'"><i class="icon-plus"></i> Factures livreurs</button>

</div>

    
<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
  <div class="row">
	   <form method="GET" action="<?=base_url().'comptabilite/partners';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	 <div class="form-group">
			
			

			  <div class="row">
</br></br>
		
			
			
				

              <div class="col-lg-3">
                <label  for="F1">Fournisseurs</label>
              <select  id="partner_id_facture"  name="partner_id_facture" class="form-control  btn-xs">
							<option value=""> Selectionnez fournisseur...</option>
											<?php foreach($partners_list as $partners) :?>
											<option <?php  if($partners->partener_id==$partner_id_facture){ echo"selected";} ?> value="<?php echo $partners->partener_id;?>"> <?php echo $partners->partener_lastname;?></option>
											<?php endforeach; ?>

							</select> </div>
									
						<div class="col-lg-2">
			<label>Mois  </label>
		<select  id="order_partener_status"  name="order_month" class="form-control  btn-xs">
				<option value=""> Selectionnez mois...</option>
				<option <?php  if($order_month=="01"){ echo"selected";} ?> value="01">Janvier</option>
				<option <?php  if($order_month=="02"){ echo"selected";} ?> value="02">Février </option>
				<option <?php  if($order_month=="03"){ echo"selected";} ?> value="03">Mars</option>
				<option  <?php  if($order_month=="04"){ echo"selected";} ?> value="04">Avril</option>
				<option  <?php  if($order_month=="05"){ echo"selected";} ?> value="05">Mai</option>
				<option <?php  if($order_month=="06"){ echo"selected";} ?> value="06">Juin</option>
				<option <?php  if($order_month=="07"){ echo"selected";} ?> value="07">Juillet </option>
				<option <?php  if($order_month=="08"){ echo"selected";} ?> value="08">Août</option>
				<option  <?php  if($order_month=="09"){ echo"selected";} ?> value="09">Septembre</option>
				<option  <?php  if($order_month=="10"){ echo"selected";} ?> value="10">Octobre</option>
				<option  <?php  if($order_month=="11"){ echo"selected";} ?> value="11">Novembre</option>
				<option  <?php  if($order_month=="12"){ echo"selected";} ?> value="12">Décembre</option>
																</select>	</div>			
								
             <div class="col-lg-2">
			<label>Années  </label>
			 <input class="date-own form-control" name="order_years" type="text" value="<?php echo $order_years; ?>">  </div>
            </div>
			 
		

			<div class="col-lg-12" style="    text-align: center; padding-bottom: 15px;padding-top: 15px;">
			<button type="submit"  class="btn btn-w-md btn-accent">Rechecher</button> 
			<a href="<?=base_url();?>comptabilite/partners/?filtercheck=1&order_month=N&partner_id_facture=N" class="btn btn-w-md btn-danger">Réinitialiser la rechecher</a>
		</div></div>
	</form>
	  </div>
	  
	  
      
	  
	  
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
               
				<th>Date</th>
				<th>Réf Commande</th>
				
				<th>Founisseur</th>
				
				<th>HT panier</th>
				<th>TVA panier</th>
				<th>TTC panier</th>
				<th>Montant total facture</th>
				<th>Payé</th>
				<th>Montant payé</th>
				<th>Preuve de paiement</th>
				
				<th>Pdf</th>
                </tr>
              </thead>
              <?php foreach($orders_list as $orders) :
			  $tvaCart = ($orders->order_total_price_buying/100)*$orders->taxe_value;
			  $htCart = $orders->order_total_price_buying-$tvaCart;
			  $tvaShopping = ($orders->order_shipping_rate/100)*$orders->taxe_value;
			  $htShopping = $orders->order_shipping_rate-$tvaShopping;
			  $total = $orders->order_total_price_buying;
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			  
						<td class="sub_col" > <span class="position_text">  <div> <?php echo date_fr($orders->order_data_created);?> </div><div> <?php echo date_fr_heur($orders->order_data_created);?></div> </span> </td>
					
			   		<td class="sub_col" >  <a href="<?php echo base_url().'comptabilite/showFacturePartener/'.$orders->order_id;?>" class="position_text">  <span class="position_text"> <?php echo $orders->order_reference;?> </span> </a></td>
					
							<td class="sub_col" > <span class="position_text"> <?php echo $orders->partener_lastname;?> </span> </td>
							
							<td class="sub_col" > <span class="position_text"> <?php echo (number_format($htCart, 2, ',', ''))."  euro" ?></span> </td>
							<td class="sub_col" > <span class="position_text"><?php echo (number_format($tvaCart, 2, ',', ''))."  euro" ?></span> </td> 
							<td class="sub_col" > <span class="position_text"> <?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."  euro" ?></span> </td>
                           <td class="sub_col" > <span class ="position_text"> <?php echo (number_format($total, 2, ',', ''))."  euro" ?> </span>

							</td>
								<td class="sub_col" >   
								<?php if($orders->order_payment_status_partener==2) { ?>
								<span class="position_text"> <div> <?php echo date_fr($orders->partener_date_payement);?> </div><div> <?php echo date_fr_heur($orders->partener_date_payement);?></div> </span>
					<?php } else { ?>  <span class="position_text" style="color:red;">  Non payée</span><?php }  ?> </td>
						<td class="sub_col" > <span class="position_text">
						<?php if($orders->order_payment_status_partener==2 and $orders->order_partener_amount ) { ?>
						<?php echo (number_format($orders->order_partener_amount, 2, ',', ''))."  euro" ?></span>
	                       <?php }  ?>
						</td>
						
							<td class="sub_col" > 
							<?php if($orders->partener_pdf_payement) { ?>
									<a  target="_blank" href="<?php echo base_url()."medias/payements/".$orders->partener_pdf_payement; ?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i> Paiement Pdf </button></a>
				
					<?php } ?> </td>
					
							

							
						
				<td class="sub_col">
				
				        	<a href="<?php echo base_url().'comptabilite/orderPdfPartners/'.$orders->order_id;?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i></button></a>
							
				   
				  
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
	

