<table bgcolor="#fff"  style="padding:20px 25px;font-family:'Arial'; color:#000;" height="100" width="100%">
<tr>
<td align="left" style="font-size:11px;font-family:'Arial'"><span style="font-weight:bold">Autotranquille.com </span> <br> 6, Rue du débarcadère 75017 Paris<br>
Tél : (+33) 1.44.85.47.76<br>
Mail : assistance@autotranquille.com<br>
Web : Autotranquille.com<br>
</td>
<td align="right"><img height="100" width="100" src="<?php echo base_url()."/assets/medias/exports/pdf/icons/pdf_logo.png";?>" /></td>
</tr>
</table>
<table bgcolor="#fff" style="padding:20px 25px;" align="left" width="100%" >
	<tr><td style="font-size:14px;font-weight:bold;font-family:'Arial'; color:#000;" height="30">Export liste des clients du <?=date('d/m/Y');?></td></tr>
	<tr><td style="font-size:10px;font-family:'Arial'; color:#000;" height="20">Data Extract plateforme Autotranquille.com du <?=date('d/m/Y');?> - document généré le <?=date('d/m/Y à H:i:s');?></td></tr>
</table>
<table  width="100%" style="margin: 20px 25px; border-collapse: collapse;border: 1px solid #000;" >
			<thead>
			  <tr >
				<th  bgcolor="#f26d20" align="left" style="padding:5px;border: 1px solid #000; color:#fff;">CID</th>
				<th  align="left" style="padding:5px;border: 1px solid #000;">Client</th>
				<th  align="left" style="padding:5px;border: 1px solid #000;">DN</th>
				<th  align="left" style="padding:5px;border: 1px solid #000;">Adresse</th>
				<th  align="left" style="padding:5px;border: 1px solid #000;">CP</th>
				<th  align="left" style="padding:5px;border: 1px solid #000;">Ville</th>
				<th  bgcolor="#f26d20" align="left" style="color:#fff; padding:5px;border: 1px solid #000;">IMM</th>
				<th  align="left" style="padding:5px;border: 1px solid #000;">Email</th>
				<th align="left" style="padding:5px;border: 1px solid #000;">Téléphone</th>
			  </tr>
			</thead>
			<tbody>
			<?php if( !empty($customers) ) { foreach($customers as $customer) :?>
			  <tr border="1">
				<td bgcolor="#f26d20" align="left" style="padding:5px;border: 1px solid #000; color:#fff;"><?=$customer->customer_id;?></td>
				<td  align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_civility.' '.$customer->customer_firstname.' '.$customer->customer_lastname; ?></td>
				<td  align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_birthdate;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_address;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_zip;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_city;?></td>
				<td bgcolor="#f26d20" align="left" style="color:#fff; padding:5px;border: 1px solid #000;"><?=$customer->auto_immatriculation;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_email;?></td>
				<td align="left" style="padding:5px;border: 1px solid #000;"><?=$customer->customer_phone_number;?></td>
			  </tr>
			<?php endforeach; } ?>
			</tbody> 
		</table>

