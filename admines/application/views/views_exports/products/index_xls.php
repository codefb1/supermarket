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
	  <th align="left">Catégorie</th>
		<th align="left">Nom</th>
		
		<th align="left">Prix (dt)</th>
		
				
	
	  </tr>
    </thead>
	<?php if( !empty($products_list) ) { foreach($products_list as $products) :
?>
	  <tr border="1">
	
		<td align="center" ><?= $products->product_id;?></td>
		<td align="center"><?= $products->category_name;?></td>
		<td align="center"><?= $products->product_name;?></td>
		
	    <td align="center"><?= $products->product_price;?></td>
	
			
		
	  </tr>
	<?php endforeach; } ?>
	 
</table>