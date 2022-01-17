<table style="margin:20px 25px;" align="left" width="100%" >
	<tr><td style="font-size:18px;font-weight:bold;font-family:'Arial'" height="30">Export de données  du <?=date('d/m/Y');?></td></tr>
	<tr><td style="font-size:16px;font-family:'Arial'" height="20">Liste des Cliens - flux PDF généré le <?=date('d/m/Y');?> à <?=date('H:i:s');?></td></tr>
</table>

<table width="960px" style="margin: 20px 25px; border-collapse: collapse;border: 1px solid #000;">
	<thead>
	  <tr>
		<th align="left">ID</th>

<th align="center">Civilité</th>
<th align="center">Prénom & Nom</th>
<th align="center">Email</th>
<th align="center">Numéro de Portable</th>
<th align="center">Adresse</th>
<th align="center">Code postal</th>
<th align="center">Ville</th>
	  </tr>
    </thead>
	<?php if( !empty($customers_list) ) { foreach($customers_list as $customers) :
if($customers->customer_civility=='Mme'){$civility='Mme'; }
	if($customers->customer_civility=='Mlle'){$civility='Mlle'; }
	if($customers->customer_civility=='M'){$civility='M';}
		?>
	  <tr >
	<td align="center"><?=$customers->customer_id;?></td>
			<td align="center"><?=$civility;?></td>
		
		<td align="center"><?=$customers->customer_firstname.' '.$customers->customer_lastname;?></td>
		<td align="center"><?= $customers->customer_email;?></td>
	 	<td align="center"><?= $customers->customer_phone_number;?></td>
		 	<td align="center"><?= $customers->customer_adress;?></td>
			 	<td align="center"><?= $customers->customer_zip_code;?></td>
				 	<td align="center"><?= $customers->city_name;?></td>
		</tr>
	<?php endforeach; } ?>
</table>