<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-produits-".date('d-m-Y H:i:s').".csv");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
ID;Catégorie;Nom;Prix (DT);
<?php if( !empty($products_list) ) { foreach($products_list as $products) :

?>
<?=$products->product_id;?>;<?= $products->category_name;?>;<?=$products->product_name;?>;<?=$products->product_price;?>;
<?php endforeach; } ?>
	 
