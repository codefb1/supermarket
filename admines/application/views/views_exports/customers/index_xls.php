<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-customers-".date('d-m-Y H:i:s').".xls");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
<table>
	<thead>
	  <tr  border="1">
	  <th align="left">ID</th>
		<th align="left">Date d'inscription</th>
		
		<th align="left">Statut</th>
		
		<th align="center">Prénom</th>
		<th align="center">Nom</th>
		<th align="center">Email</th>
		<th align="left">Adresse</th>
		<th align="left">Code postal</th>
		<th align="left">Ville</th>
		<th align="left">Pays</th>
	    <th align="left">État civil</th>
	
	  </tr>
    </thead>
	<?php if( !empty($customers_list) ) { foreach($customers_list as $customers) :
	if($customers->data_status==0){$status='Prospect';}
	if($customers->data_status==1){$status='Client';}
	if($customers->is_subscribed==0){$subscribe='Non';}
	if($customers->is_subscribed==1){$subscribe='Oui';}

	if($customers->customer_civil_status == 1){$customer_civil_status='Célibataire';}
	if($customers->customer_civil_status == 2){$customer_civil_status='Veufve';}
	if($customers->customer_civil_status == 3){$customer_civil_status='Mariée';}
	if($customers->customer_civil_status == 4){$customer_civil_status='En concubinage';}

	  ?>
	  <tr border="1">
	
		<td align="center"><?= $customers->data_created;?></td>
	
	    <td align="center"><?=$status;?></td>
	
			<td align="center"><?=$customers->customer_civility;?></td>
	
		<td align="center"><?=$customers->customer_firstname;?></td>
		<td align="center"><?=$customers->customer_lastname;?></td>
		<td align="center"><?= $customers->customer_email;?></td>
	    <td align="center"><?= $customers->customer_adress;?></td>
		<td align="center"><?= $customers->customer_zip_code;?></td>
	    <td align="center"><?= $customers->customer_town;?></td>
		<td align="center"><?= $customers->country_name;?></td>
		<td align="center"><?= $customer_civil_status;?></td>
		<td align="center"><?= $customers->customer_phone_number;?></td>

	  </tr>
	<?php endforeach; } ?>
	 
</table>