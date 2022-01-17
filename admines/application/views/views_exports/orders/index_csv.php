<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-orders-".date('d-m-Y H:i:s').".csv");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
Référence;Id client;Date du commande;Civilité;Prénom;Nom;Email;Téléphone;Adresse de facturation;Code postal de facturation;Ville de facturation;Pays de facturation;Produit;Montant;Mode;Statut;Jour et heure souhaités pour la réservation;
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
if($orders->customer_civility=='Mlle'){$civility='Chère';}
if($orders->customer_civility=='M'){$civility='Cher';}
?>
<?=trim("#00".$orders->order_id);?>;<?php echo date_fr($orders->orders_data_created);?>;<?php echo $civility;?>;<?php echo $orders->customer_civility?>;<?php echo $orders->customer_firstname?>;<?php echo $orders->customer_lastname ;?>;<?php  echo $orders->customer_email;?>;<?php  echo $orders->order_contact_phone?>;<?php   if($orders->order_adress){echo $orders->order_adress ;} else {echo "***";}?>;<?php   if($orders->order_zip_code){echo $orders->order_zip_code ;} else {echo "***";}?>;<?php   if($orders->order_town){echo $orders->order_town ;} else {echo "***";}?>;<?php   if($orders->country_name){echo $orders->country_name ;} else {echo "***";}?>;<?php echo $orders->product_name;?>;<?php echo (number_format($orders->order_amount, 2, ',', ''))."  DT" ?>;<?= $mode;?>;<?= $status;?>;
<?php endforeach;  ?>
	 
