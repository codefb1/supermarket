<table style="margin:20px 25px;" align="left" width="100%" >
	<tr><td style="font-size:18px;font-weight:bold;font-family:'Arial'" height="30">Export de données David phild du <?=date('d/m/Y');?></td></tr>
	<tr><td style="font-size:16px;font-family:'Arial'" height="20">Liste des commandes - flux PDF généré le <?=date('d/m/Y');?> à <?=date('H:i:s');?></td></tr>
</table>

<table width="960px" style="margin: 20px 25px; border-collapse: collapse;border: 1px solid #000;">
	<thead>
	  <tr  border="1">
<th align="center" style="padding:5px;border: 1px solid #000;">Référence</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Id client</th>
<th align="left" style="padding:5px;border: 1px solid #000;">Date du commande</th>

<th align="center" style="padding:5px;border: 1px solid #000;">Civilité</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Prénom</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Nom</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Email </th>
<th align="center" style="padding:5px;border: 1px solid #000;">Téléphone </th>
<th align="center" style="padding:5px;border: 1px solid #000;">Adresse de facturation</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Code postal de facturation </th>
<th align="center" style="padding:5px;border: 1px solid #000;">Ville de facturation </th>
<th align="center" style="padding:5px;border: 1px solid #000;">Pays de facturation </th>
<th align="center" style="padding:5px;border: 1px solid #000;">Produit</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Montant</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Mode</th>
<th align="center" style="padding:5px;border: 1px solid #000;">Statut</th>
	  </tr>
    </thead>
	<?php foreach ($orders_list as $orders): 
							

						
			if($orders->order_payment_status==0){$status='Abandon de panier';}
			if($orders->order_payment_status==6){$status='Paiement en attente';}
            if($orders->order_payment_status==1){$status='Paiement refusé';}
			if($orders->order_payment_status==2){$status='Paiement accepté';}
            if($orders->order_payment_status==5){$status='Commande annulée ';}
			if($orders->order_payment_status==7){$status='Remboursé';}
            if($orders->order_payment_status==4){$status='Commande expédiée';}
            if($orders->order_payment_status==3){$status='Commande en préparation';}
			if($orders->order_payment_method==1){$mode='Paypal';}		
			if($orders->order_payment_method==2){$mode='Ogone';}	
			if($orders->order_payment_method==3){$mode='Chèque';}
			if($orders->order_payment_method==0){$mode='Aucun';}
			if($orders->customer_civility=='Mme'){$civility='Chère';}
            if($orders->customer_civility=='Mlle'){$civility='Chère';}
            if($orders->customer_civility=='M'){$civility='Cher'; }
						?>
	  <tr border="1">
	
		<td align="center" style="background-color: #FFFACD;padding:5px;border: 1px solid #000;" ><?php  echo"#00".$orders->order_id;?></td>
		<td align="center" style="background-color: #FF6347;padding:5px;border: 1px solid #000;"><?php echo date_fr($orders->orders_data_created);?></td>
	    <td align="center" style="padding:5px;border: 1px solid #000;" ><?php  echo $civility;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php echo $orders->customer_civility;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php echo $orders->customer_firstname;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php echo $orders->customer_lastname ;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php  echo $orders->customer_email;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php  echo $orders->order_contact_phone?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php   if($orders->order_adress){echo $orders->order_adress ;} else {echo "***";}?></td>
		<td align="center"  style="padding:5px;border: 1px solid #000;" ><?php   if($orders->order_zip_code){echo $orders->order_zip_code ;} else {echo "***";}?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;" ><?php   if($orders->order_town){echo $orders->order_town ;} else {echo "***";}?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"  ><?php   if($orders->country_name){echo $orders->country_name ;} else {echo "***";}?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"> <?php echo $orders->product_name;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php echo (number_format($orders->order_amount, 2, ',', ''))."  DT" ?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?php echo  $mode;?></td>
	    <td align="center" style="background-color: #FFDAB9;padding:5px;border: 1px solid #000;"><?php echo  $status;?></td>
		
		
	 </tr>
	<?php endforeach;  ?>
	 
</table>