<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-customers-".date('d-m-Y H:i:s').".csv");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
ID;Civilité;Prénom & Nom;Email;Numéro de Portable;Adresse;Code postal;Ville;
<?php if( !empty($customers_list) ) { foreach($customers_list as $customers) :
	if($customers->customer_civility=='Mme'){$civility='Mme'; }
	if($customers->customer_civility=='Mlle'){$civility='Mlle'; }
	if($customers->customer_civility=='M'){$civility='M';}
?>
<?=trim($customers->customer_id);?>;<?=$civility;?>;<?=$customers->customer_firstname.' '.$customers->customer_lastname;?>;<?=$customers->customer_email;?>;<?=$customers->customer_phone_number;?>;<?=$customers->customer_adress;?>;<?=$customers->customer_zip_code;?>;<?=$customers->city_name;?>;
<?php endforeach; } ?>
	 
