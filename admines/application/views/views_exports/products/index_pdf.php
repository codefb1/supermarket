<table style="margin:20px 25px;" align="left" width="100%" >
	<tr><td style="font-size:18px;font-weight:bold;font-family:'Arial'" height="30">Export de données du <?=date('d/m/Y');?></td></tr>
	<tr><td style="font-size:16px;font-family:'Arial'" height="20">Liste des Cliens - flux PDF généré le <?=date('d/m/Y');?> à <?=date('H:i:s');?></td></tr>
</table>

<table width="960px" style="margin: 20px 25px; border-collapse: collapse;border: 1px solid #000;">
	<thead>
	  <tr>
	  <th align="center" style="padding:5px;border: 1px solid #000;">Id</th>
	  		<th align="center" style="padding:5px;border: 1px solid #000;">Catégorie</th>
		<th align="center" style="padding:5px;border: 1px solid #000;">Nom</th>
		
		<th align="center" style="padding:5px;border: 1px solid #000;">Prix (dt)</th>
	
	
	  </tr>
    </thead>
	<?php if( !empty($products_list) ) { foreach($products_list as $products) :
	

	
		?>
	  <tr >
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $products->product_id;?></td>
				<td align="center" style="padding:5px;border: 1px solid #000;"><?= $products->category_name;?></td>
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $products->product_name;?></td>
		
		<td align="center" style="padding:5px;border: 1px solid #000;"><?= $products->product_price;?></td>

			
		</tr>
	<?php endforeach; } ?>
</table>