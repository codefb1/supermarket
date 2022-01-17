<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-orders-".date('d-m-Y H:i:s').".xls");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
<table>
	<thead>
	  <tr  border="1">
<th align="left">Référence</th>
<th align="center">Id client</th>
<th align="left">Date du commande</th>

<th align="center">Civilité</th>
<th align="center">Prénom</th>
<th align="center">Nom</th>
<th align="center">Email </th>
<th align="center">Téléphone </th>
<th align="center">Adresse de facturation</th>
<th align="center">Code postal de facturation </th>
<th align="center">Ville de facturation </th>
<th align="center">Pays de facturation </th>
<th align="center">Produit</th>
<th align="center">Montant</th>
<th align="center">Mode</th>
<th align="center">Statut</th>

	  </tr>
    </thead>
	<?php foreach ($orders_list as $orders): 				
	        if($orders->order_payment_status==0){$status='Abandon de panier';}
			if($orders->order_payment_status==6){$status='Paiement en attente';}
            if($orders->order_payment_status==1){$status='Paiement refusé';}
			if($orders->order_payment_status==2){$status='Paiement accepté';}
            if($orders->order_payment_status==5){$status='Commande annulée ';}
            if($orders->order_payment_status==4){$status='Commande expédiée';}
			if($orders->order_payment_status==7){$status='Remboursé';}
            if($orders->order_payment_status==3){$status='Commande en préparation';}
			if($orders->order_payment_method==1){$mode='Paypal';}		
			if($orders->order_payment_method==2){$mode='Ogone';}	
			if($orders->order_payment_method==3){$mode='Chèque';}
			if($orders->order_payment_method==0){$mode='Aucun';}
			if($orders->customer_civility=='Mme'){$civility='Chère';}
            if($orders->customer_civility=='Mlle'){$civility='Chère'; }
            if($orders->customer_civility=='M'){$civility='Cher'; }
						?>
	  <tr border="1">
			<td align="center" style="background-color: #FFFACD;" ><?php  echo"#00".$orders->order_id;?></td>
			
			<td align="center" style="background-color: #FF6347;"><?php echo date_fr($orders->orders_data_created);?></td>
		
			<td align="center" style="background-color: #DD6777;"><?php echo $civility;?></td>
			<td align="center" style="background-color: #DD6777;"><?php echo $orders->customer_civility;?></td>
			<td align="center" style="background-color: #DD6777;"><?php echo $orders->customer_firstname;?></td>
			<td align="center" style="background-color: #DD6777;"><?php echo $orders->customer_lastname ;?></td>
			<td align="center" style="background-color: #6EC7E6;"><?php  echo $orders->customer_email;?></td>
			<td align="center" style="background-color: #6FC080;"><?php  echo $orders->order_contact_phone?></td>
			<td align="center" style="background-color: #9ACD32;"><?php   if($orders->order_adress){echo $orders->order_adress ;} else {echo "***";}?></td>
			<td align="center"  style="background-color: #D8BFD8;" ><?php   if($orders->order_zip_code){echo $orders->order_zip_code ;} else {echo "***";}?></td>
			<td align="center" style="background-color: #FA460;" ><?php   if($orders->order_town){echo $orders->order_town ;} else {echo "***";}?></td>
			<td align="center" style="background-color: #FFC0CB;"  ><?php   if($orders->country_name){echo $orders->country_name ;} else {echo "***";}?></td>
			<td align="center" style="background-color: #FFD700;"> <?php echo $orders->product_name;?></td>
			<td align="center" style="background-color: #6EC7E6;"><?php echo (number_format($orders->order_amount, 2, ',', ''))."  DT" ?></td>
			<td align="center" style="background-color: #FF6347;"><?= $mode;?></td>
			<td align="center" style="background-color: #FFDAB9;"><?= $status;?></td>
			
	 </tr>
	<?php endforeach;  ?>
	 
</table>