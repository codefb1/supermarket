<table style="margin:20px 25px;" align="left" width="100%" >
	<tr><td style="font-size:18px;font-weight:bold;font-family:'Arial'" height="30">Export de données du <?=date('d/m/Y');?></td></tr>
	<tr><td style="font-size:16px;font-family:'Arial'" height="20">Liste des Cliens - flux PDF généré le <?=date('d/m/Y');?> à <?=date('H:i:s');?></td></tr>
</table>

<table width="960px" style="margin: 20px 25px; border-collapse: collapse;border: 1px solid #000;">
	<thead>
	  <tr>
	  <th align="center" style="padding:5px;border: 1px solid #000;">Id</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Date d'inscription</th>
		
		<th align="center" style="padding:5px;border: 1px solid #000;">Statut</th>
	
		<th align="center" style="padding:5px;border: 1px solid #000;">Prénom</th>
		<th align="center" style="padding:5px;border: 1px solid #000;"> Nom</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Email</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Adresse</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Code postal</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Ville</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Pays</th>
	    <th align="center" style="padding:5px;border: 1px solid #000;">État civil</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Numéro de Portable</th>

		
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
	  <tr >
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $customers->customer_base64_id;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $customers->data_created;?></td>
		
		<td align="center" style="padding:5px;border: 1px solid #000;"><?=$status;?></td>

		<td align="center" style="padding:5px;border: 1px solid #000;"><?=$customers->customer_civility;?></td>

		<td align="center" style="padding:5px;border: 1px solid #000;"><?=$customers->customer_firstname;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?=$customers->customer_lastname;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $customers->customer_email;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;" ><?= $customers->customer_adress;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;" ><?= $customers->customer_zip_code;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;" ><?= $customers->customer_town;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $customers->country_name;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $customer_civil_status;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $customers->customer_phone_number;?></td>
		
		</tr>
	<?php endforeach; } ?>
</table>