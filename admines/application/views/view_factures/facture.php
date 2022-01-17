<style>body{margin:0;padding:0;}</style>
<body> 
<table>
<tr>
    <td height="67" width="220"  align="left" valign="middle" bgcolor="#FFFFFF" style=" font-size: 12px; letter-spacing: 0px;"> <img src="<?=base_url()?>template/logo.jpg" alt="" height="20" width="200"/></td>
	<td height="67" width="400"  align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"><div  style="word-spacing: 5px; text-align:right ;"><strong>Facture Réf #<?=$order_reference ?></strong></div>
	<div style="float:right;text-align:right" ><strong> <?=$data_created ?> </strong></div></td>
</tr>
<tr>
    <td height="100" align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
</tr>
</table>
<table align="center" style="width:450px ; hight:450px ; float:center " >
			<tr style="width:450px ; hight:450px ;" >
              <td   bgcolor="#FFFFFF">
			   <table  style=" border: 1 ;padding:15px;" >  
			     <tr  ><td style="width: 250px ; height:20px ; font-size: 18px;    "  ><strong>Client</strong></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;    " ><?= $civility_wording?> <?= $customer_firstname?> <?= $customer_lastname?> </td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;    " ><?= $customer_address?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;    " ><?= $customer_zip?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;    " ><?= $customer_town?></td></tr>
			      <tr ><td style="width: 250px ; height:20px ; font-size: 13px;    " ><?= $customer_phone_numbre?></td></tr>
			   </table>   
			  </td>
         </tr>
         <tr >
           <td height="30"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
        </tr>
 </table>
<p style=" font-size: 18px;   text-align:center ; "><strong> Nous vous remercions pour la confiance que vous nous t&eacute;moignez</strong></p>
  <table>
    <tr >
      <td height="50"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
    </tr>
  </table>
  <table style="border-style:solid;border-top:thick double #000000; "  width="800" >
       <tr  style="background-color:#F0F0F0;   ; height:5px ;" >
		   <td style="padding:2mm;"><strong>Coupon</strong></td>
		   <td style="padding:2mm;text-align: center;"><strong>Societé</strong></td>
		   <td style="padding:2mm;text-align: center;"><strong>D&eacute;signation</strong></td>
		   <td style="text-align: center;"><strong>Prix unitaire</strong></td>
		   <td style="text-align: center;"><strong>Quantit&eacute;</strong></td>
		   <td style="text-align: center;"><strong>Prix HTTC</strong></td>
		   <td style="text-align: center;"><strong>TVA</strong></td>
		   <td style="text-align: center;"><strong>Prix TTC</strong></td>
	   </tr>
	   <?php $totalarticle = 0 ; $totaleprice = 0 ; foreach($ordersdetails as  $orderdetail ) {?>
       <tr>
	   <td style="width: 6mm ; padding:2mm;"> <?= $orderdetail->order_detail_discount_coupon ?> </td>
       <td style="width: 14mm ; padding:2mm;"> <?= $orderdetail->establishment_wording ?> </td>
       <td style="width: 35mm ; padding:2mm;"> <?= $orderdetail->product_feature_wording ?> </td>
	   <td style="width: 20mm ;padding:2mm; text-align: center;"><?=number_format( $orderdetail->order_detail_price, 2, '.', ' '); ?>  € </td>
	   <td style="width: 10mm ;padding:2mm; text-align: center;"><?= $orderdetail->order_detail_amount ?> </td>
	   <td style="width: 20mm ;padding:2mm; text-align: center;"><?= number_format($orderdetail->order_detail_amount *  $orderdetail->order_detail_price , 2, '.', ' ') ?>  €</td>
	   <td style="width: 10mm ;padding:2mm; text-align: center;"><?= $orderdetail->tax_value ?>  %</td>
	   <td style="width: 20mm ;padding:2mm; text-align: center;"><?= number_format((($orderdetail->order_detail_amount *  $orderdetail->order_detail_price ) + (($orderdetail->order_detail_amount *  $orderdetail->order_detail_price ) * $orderdetail->tax_value  /100)), 2, '.', ' '); ?>  €</td>
	   </tr>
  	   <?php $totaleprice +=  number_format(($orderdetail->order_detail_amount *  $orderdetail->order_detail_price ) + (($orderdetail->order_detail_amount *  $orderdetail->order_detail_price ) * $orderdetail->tax_value  /100), 2, '.', ' '); ; $totalarticle ++ ;  } ?>
   </table>
   <table >
       <tr>
       <td height="20"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
       </tr>
   </table>
    <table> 
		<tr>
           <td  width="460"></td>
           <td  width="150" style="text-align: right;"> Total articles :</td>
		   <td  width="60"></td> 
		   <td  style="text-align: right;"><?= $totalarticle ?></td>  
        </tr>
		 <tr>
			 <td></td>
        	 <td  style="text-align: right;"> Total : </td>
			 <td  width="60"></td>
			 <td  style="text-align: right;"><?= $totaleprice ?> €</td>
		</tr>
 </table>

  </body> 