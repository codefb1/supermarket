<?php
function product_price_kg ($price,$poids){
$priceKg= '';   
	  if($poids) {
		$priceKg= "Le 1 kg à ".(number_format((1/$poids)* $price, 2, ',', ''))." €";
		}
    return $priceKg ;   
}

