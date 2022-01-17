<div class="col-sm-12">

  <h2 class="page_title" style="text-align: center;">Facutres à payer aux livreurs </h2>
 
</div>
<div class="col-sm-12 text-center">
 <button class="btn btn-shadow btn-primary" type="button" onClick="location.href='<?php echo base_url().'comptabilite/partners';?>'"><i class="icon-plus"></i> Factures fournisseur </button>
 
    <button class="btn btn-shadow btn-primary" type="button" onClick="location.href='<?php echo base_url().'comptabilite';?>'"> Factures cliens </button>
<button class="btn btn-shadow btn-success" type="button" onClick="location.href='#'"><i class="icon-plus"></i> Factures  livreurs</button>

</div>


<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

	  
	  
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
                <th>Date</th>
				<th>Réf Commande</th>
				<th>Livreur</th>
				<th>HT livraison </th>
				<th>TVA livraison</th>
				<th>TTC livraison</th>
				<th>Montant total</th>
				<th>Pdf</th>
                </tr>
              </thead>
              <?php foreach($orders_list as $orders) :
			  $tvaCart = ($orders->order_products_prices/100)*$orders->taxe_value;
			  $htCart = $orders->order_products_prices-$tvaCart;
			  $tvaShopping = ($orders->order_shipping_rate/100)*$orders->taxe_value;
			  $htShopping = $orders->order_shipping_rate-$tvaShopping;
			  $total = $orders->order_amount+$orders->order_shipping_rate;
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			  
					<td class="sub_col" > <span class="position_text">  <div> <?php echo date_fr($orders->order_data_created);?> </div><div> <?php echo date_fr_heur($orders->order_data_created);?></div> </span> </td>
					
							
			   	           	<td class="sub_col" >   <span class="position_text"> <?php echo $orders->order_reference;?> </span> </td>
					
			   	 			<td class="sub_col" > <span class="position_text"> <?php echo $orders->transporter_name;?> </span> </td>
							
							
							
							<td class="sub_col" > <span class="position_text"> <?php echo (number_format($htShopping, 2, ',', ''))."  euro" ?></span> </td>
							<td class="sub_col" > <span class="position_text"><?php echo (number_format($tvaShopping, 2, ',', ''))."  euro" ?></span> </td> 
							<td class="sub_col" > <span class="position_text"> <?php echo (number_format($orders->order_shipping_rate, 2, ',', ''))."  euro" ?></span> </td>
                            <td class="sub_col" > <span class="position_text"> <?php echo (number_format($orders->order_shipping_rate, 2, ',', ''))."  euro" ?></span> </td>
                            
						
						
	
						
				<td class="sub_col">
				
				        	<a href="<?php echo base_url().'comptabilite/orderPdfTransporters/'.$orders->order_id;?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i></button></a>
							
				
				  
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
	
	

<script type="text/javascript">
	
</script>