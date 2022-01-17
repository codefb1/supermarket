<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=AT-export-Etudiant-".date('d-m-Y H:i:s').".xls");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>
<table>
			<thead>
			  <tr >
			  <th align="left" style="padding:5px;border: 1px solid #000;">Id</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Prénom</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Nom</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Date de Naissance</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Adresse</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Diplome</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Email</th>
				<th bgcolor="#f26d20" align="left" style="padding:5px;border: 1px solid #000; color:#fff;">Téléphone</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Date</th>
			 </tr>
			</thead>
			<tbody>
			<?php if( !empty($customers_list) ) { foreach($customers_list as $customer) :?>
			  <tr border="1">
				<td bgcolor="#f26d20" align="left" style="padding:5px;border: 1px solid #000; color:#fff;"><?=$customer->customer_id;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_firstname;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_lastname;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_date;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_address;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->diplome_name;?></td>
					<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_email;?></td>
				<td bgcolor="#f26d20" align="left" style="padding:5px;border: 1px solid #000; color:#fff;"><?=$customer->customer_phone;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->data_created;?></td>
			  </tr>
			<?php endforeach; } ?>
			</tbody> 
		</table>