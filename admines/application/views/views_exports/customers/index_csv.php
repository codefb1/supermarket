<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-customers-".date('d-m-Y H:i:s').".csv");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
ID;Date d'inscription;Statut;Prénom;Nom;Email;Adresse;Code postal;Ville;Pays;État civil;
<?php if( !empty($customers_list) ) { foreach($customers_list as $customers) :
	if($customers->data_status==0){$status='Prospect';}
	if($customers->data_status==1){$status='Client';}
	if($customers->is_subscribed==0){$subscribe='Non';}
	if($customers->is_subscribed==1){$subscribe='Oui';}
	if($customers->customer_civility=='Mme'){$civility='Chère'; $personnalisation="e";}
	if($customers->customer_civility=='Mlle'){$civility='Chère'; $personnalisation="e";}
	if($customers->customer_civility=='M'){$civility='Cher'; $personnalisation="";}
	if($customers->customer_civil_status == 1){$customer_civil_status='Célibataire';}
	if($customers->customer_civil_status == 2){$customer_civil_status='Veufve';}
	if($customers->customer_civil_status == 3){$customer_civil_status='Mariée';}
	if($customers->customer_civil_status == 4){$customer_civil_status='En concubinage';}

?>
<?=trim($customers->data_created);?>;<?=$status;?>;;<?=$customers->customer_civility;?>;<?=$customers->customer_firstname;?>;<?=$customers->customer_lastname;?>;<?=$customers->customer_email;?>;<?= $customers->customer_adress;?>;<?=$customers->customer_zip_code;?>;<?= $customers->customer_town;?>;<?=$customers->country_name;?>;<?= $customer_civil_status;?>;<?=$customers->customer_phone_number;?>;
<?php endforeach; } ?>
	 
