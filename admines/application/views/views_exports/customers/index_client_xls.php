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
	  <tr border="1">
	
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