
<body style="body{margin:0;padding:0;}">
<table>
<tr>
    <td height="67" width="210"  align="left" valign="middle" bgcolor="#FFFFFF" style=" font-size: 12px; letter-spacing: 0px;"><img src="<?=base_url().'template/';?>logo.jpg" width="200"/></td>
	<td height="67" width="210"  align="right" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;; font-size: 13px;">
	<div  style="word-spacing: 5px; text-align:right ;"><strong>Facture Réf# <?php echo $orders->order_reference;?></strong></div>
	<div style="float:right;text-align:right; font-size: 13px;" ><strong> <?php echo date_fr($orders->order_data_created);?> à  <?php echo date_fr_heur($orders->order_data_created);?></strong></div></td>
</tr>
<tr >
    <td height="20"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
</tr>
</table>
  <?php 
		$taxe_value= $orders->taxe_value;
		$order_taxe_value= $taxe_value/100;
	   ?>
<table style="width:450px ; hight:450px ;    " >
			<tr style="width:450px ; hight:450px ;    " >
              <td  style="width:450px ;   hight:450px ;    " >
			  <table  style=" border: 1 ; ;padding:15px; " >  
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;"><strong>Adresse de Livraison</strong></td></tr>
	              <tr ><td style="width: 250px ; height:20px ; font-size: 11px;"><?php  echo $orders->order_shipping_lastname;?>  <?php  echo $orders->order_shipping_firstname;?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_shipping_street;?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_shipping_city;?></td></tr>
                  <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_shipping_zip;?></td></tr>
				     <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" > <?php  if($orders->order_shipping_country==1){ echo"France";} ?> <?php  if($orders->order_shipping_country==3){ echo"Belgique";} ?></td></tr>
			 
			      <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_shipping_phone;?></td></tr>
			   </table>   
            </td>
            
			  
			  
			      <td  style="width:250px;hight:450px ;;padding:15px; " >
			  <table  style="border: 1 ;padding:15px; " >  
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;"><strong>Adresse de facturation</strong></td></tr>
	               <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_billing_lastname;?>  <?php  echo $orders->order_billing_firstname;?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_billing_street;?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_billing_city;?></td></tr>
                  <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_billing_zip;?></td></tr>
			    <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" > <?php  if($orders->order_billing_country==1){ echo"France";} ?> <?php  if($orders->order_billing_country==3){ echo"Belgique";} ?></td></tr>
			    	
			      <tr ><td style="width: 250px ; height:20px ; font-size: 11px;" ><?php  echo $orders->order_billing_phone;?></td></tr>
			   </table>   
            </td>
         </tr>
         <tr >
           <td height="30"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
        </tr>
 </table>
<p style=" font-size: 13px;   text-align:center ; "><strong>Nous vous remercions pour la confiance que vous nous t&eacute;moignez</strong></p>
  <table  style="border:1px solid black;border-collapse:collapse; " >
     <tr style="background-color: Gainsboro  ;  height:3px ;font-size: 11px; "><td colspan=4 style="background-color:#F0F0F0 ; border:1px solid black; ; height:3px ;padding:2mm;"><strong>Facture Réf# F<?php  echo $orders->order_reference;?> </strong></td></tr>
     <tr  ><td style="height:10px ;padding:2mm; border:1px solid black; width: 40mm;font-size: 11px;">Commande Réf : <?php  echo $orders->order_reference;?></td>
	 <td style="width: 40mm ;padding:2mm;;border:1px solid black;;font-size: 11px;"><strong>Transporteur : </strong><?php  echo $orders->transporter_name;?></td>
	 <td style="width: 40mm ;border:1px solid black;padding:2mm;font-size: 11px;"><strong>Mode de paiement : </strong></td>
	 <td style="width: 45mm ;border:1px solid black;padding:2mm;font-size: 11px;"><strong>Fournisseur : </strong><?php echo $orders->partener_lastname;?></td></tr>
 </table>
  <table>
    <tr >
      <td height="50"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
    </tr>
  </table>
  <table style="width:450px;"  >
   
	  	<tr style="background-color:#F0F0F0;   ; height:5px ;">
								
								<th style="padding:2mm;width: 10mm ;" ><strong>Quantité</strong></th>
								<th style="padding:2mm;width: 45mm ;" ><strong>Produit</strong></th>
									<th style="padding:2mm;width: 23mm ;" ><strong>Prix Unitaire</strong></th>
								<th style="padding:2mm;width: 23mm" ><strong>Prix HT</strong></th>
								<th style="padding:2mm;width: 23mm" ><strong>Prix  TTC</strong></th>
								<th style="padding:2mm;width: 23mm"><strong>Poids</strong></th>
							 
							</tr>


		<?php $totalPoids=0;  $totalPriceHT=0; $totalPriceTTC=0;$totalPriceBuyingTTC=0; $totalPriceBuyingHT=0; $i=1; 
		foreach($orders_detail as $order_detail) : 

                    $totalPoids=$totalPoids+$order_detail->orders_detail_product_poids * $order_detail->product_quantity;
					$totalPriceTTC= $totalPriceTTC+$order_detail->orders_detail_product_price * $order_detail->product_quantity;
			        $totalPriceHT=$totalPriceHT+(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price))  * $order_detail->product_quantity);
			       
			?>
	                        <tr>
							
							
							<td style="width: 10mm ; padding:2mm;"><?php echo $order_detail->product_quantity;?> </td>
							<td style="width: 45mm ; padding:2mm;"><?php echo $order_detail->product_name;?> </td>
							<td style="width: 23mm ; padding:2mm;"><?php echo (number_format(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price)), 2, ',', ''))."  euro ";?> </td>
							
							<td style="width: 23mm ; padding:2mm;"><?php echo (number_format(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price))  * $order_detail->product_quantity, 2, ',', ''))."  euro ";?> </td>
							<td style="width: 23mm ; padding:2mm;"><?php echo (number_format($order_detail->orders_detail_product_price * $order_detail->product_quantity, 2, ',', ''))."  euro" ;?> </td>
							<td style="width: 23mm ; padding:2mm;"><?php echo $order_detail->orders_detail_product_poids * $order_detail->product_quantity;?>  KG</td>
							</tr> 
							<?php $i++; endforeach; ?>
							 <tr style="background-color: Gainsboro  ;  height:3px ; ">
							 <td   style="width: 10mm ; padding:2mm;" bgcolor="#FFFFFF"> </td>
							 	<td   style="width: 40mm ; padding:2mm;" bgcolor="#FFFFFF"> </td>
								<td  style="width: 23mm ; padding:2mm;text-align;right;">Total </td>
								<td   style="width: 23mm ; padding:2mm;"> <?php echo (number_format($totalPriceHT, 2, ',', ''))."  euro" ;?></td>
								<td   style="width: 23mm ; padding:2mm;"> <?php echo (number_format($totalPriceTTC, 2, ',', ''))."  euro" ;?></td>
								<td   style="width: 23mm ; padding:2mm;"> <?php echo $totalPoids  ;?> KG</td>


							</tr>							 
							 
							 
   </table>
   <table >
       <tr >
       <td height="20"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
       </tr>
   </table>
    <table  >
	 <?php    $tvaCart = ($orders->order_products_prices/100)*$orders->taxe_value;
			  $htCart = $orders->order_products_prices-$tvaCart;
			  $tvaShopping = ($orders->order_shipping_rate/100)*$orders->taxe_value;
			  $htShopping = $orders->order_shipping_rate-$tvaShopping;
			  $total = $orders->order_amount+$orders->order_shipping_rate;
			  ?>
		<tr  style="font-size: 12px;display:none;">
           <td  width="460" style="font-size: 12px;"></td>
           <td    style="text-align: right;font-size: 11px;"> Total paniers HT:</td>
		         <td  width="50"></td>

		   <td  style="text-align: right;font-size: 11px;"><?="".(number_format($htCart, 2, '.', ''));?> &euro; </td>
        </tr>
		<tr >
           <td></td>
		    <td  width="170" style="text-align: right;font-size: 11px;">  Frais de livraison HT: </td>
					         <td  width="50"></td>

			<td  style="text-align: right;font-size: 11px;"><?="".(number_format($htShopping, 2, '.', ''));?> &euro;</td>

        </tr>
	
		<tr>
           <td></td>
		    <td  style="text-align: right;font-size: 11px;">  TVA : </td>
					         <td  width="50"></td>

			<td  style="text-align: right;font-size: 11px;"><?="".(number_format($tvaShopping, 2, '.', ''));?> &euro; </td>

        </tr>
		
		 <tr >
           <td></td>
        	 <td  style="text-align: right;font-size: 11px;"> Frais de livraison  TTC: </td>
			 		         <td  width="50"></td>
			 <td  style="text-align: right;font-size: 11px;"><?="".(number_format($orders->order_shipping_rate, 2, '.', ''));?> &euro; </td>
		</tr>
   </table>
<div  style="  position:absolute;text-align:center; width:100% ;bottom: 0px;color:#444"></div>

  </body> 