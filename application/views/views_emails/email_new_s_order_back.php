<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<style type="text/css">
<!--
body {
   background-color: #FFF;
   margin: 0;
   padding: 0;
}
a {
	color:#3185c4;
	text-decoration:none;
}
a:hover {
	color:#3185c4;
	text-decoration:underline;
}
img {
	border: none;
	}
.table-header {
	background-color : #E5E5E5;
	padding: 9px;
	text-align: left;
}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="20" cellspacing="0"  bgcolor="#FFF" style="background-repeat:repeat-x">
  <tr>
    <td valign="top">
      <table width="650" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
        <tr>
          <td>
          <!-- START OF Header Table -->
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #e3e3e3; font-family: Helvetica, sans-serif; font-size: 12px; letter-spacing: 0px;"><a title="enerlisonline.com" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'template/'; ?>img/logo.png" alt=""/></a></td>     
              </tr>
            </table>
            <!-- END OF Header Table -->
            <!-- START OF full width Table --> 
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;"></td>
              </tr>
              <tr>
                <td width="615" align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;"></td>
              </tr>
              <tr>
                <td height="10"><img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
            </table>
            <!-- END OF Header Table -->
            <!-- START OF full width Table --> 
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                  <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"><p style="font-size: 18px; "> <b>Facture Réf# F<?=$OREF;?></b> </p></br></td> 
                  <td align="center" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; color:<?=$COLR;?>; line-height: 18px;" ><b><?=$ETAT;?></b></td>
                  </tr>
            </table>
            <!-- END OF Header Table -->
            <!-- START OF full width Table --> 
            <table width="633" border="0" cellspacing="0" cellpadding="0">
            <tr>
                	<td height="10"></td>
              	</tr>
            	<tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;">
             <p><b>[ INFORMATIONS SUR LE CLIENT  ]</b></br></p>
																			<p>	<b>Client : </b> <?=$CVL." ".$CLN." ".$CFN;?> </p>
																		<p><b>	Email : </b> <?=$CE;?></p>
																		<p>	<b>Adresse de Facturation: </b><?=$ADF;?> </p>
																		<p>	<b>Pays :</b><?=$CDL;?> </p>
																		<p>	<b>Téléphone : </b><?=$CT;?> </p>
                                                                       <img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" />
                                                                        <p>	 <b>[ DÉTAILS DE LA COMMANDE  ]</b> </p>
																		
																		<p>	<b>Adresse de livraision :</b> <?=$ODL." ".$ODC;?> </p>
																		<!--<p>	Pays : <b><?=$CO;?></b> </p>-->
																		<p>	<b>Date d'émission du commande  :</b> <?=date_fr($DTE); ?> </p>
																		
																		<p><b>Total produits :</b><?=(number_format($MON-$CSR, 2, ',', ''));?> <?php echo $CUR ?></p>
																		
																		<p><b>Frais de port :</b> <?=(number_format($CSR, 2, ',', ''));?> <?php echo $CUR ?></p>
																		<!--<p>TVA <b><?=(number_format($TAX, 2, ',', ''));?> <?php echo $CUR ?></b></p>-->
																	    <p><b>Net à payer : </b> <?=(number_format($MON+$TAX, 2, ',', ''));?> <?php echo $CUR ?></p>
																		<p>	<b>Syst&eacute;me de paiement  : </b><?=$PST;?> </p><br /></td>
              	
              </tr>
             
            </table>
            <table width="633" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
          <tbody>
            <tr style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a;">
              <th class="table-header" > Désignation </th>
              <th class="table-header" style="text-align: center;"> Quantité </th>
              <th class="table-header" style="text-align: center;"> Prix unitaire </th>
              <th class="table-header" style="text-align: center;"> Prix total </th>
            </tr>
            <?php  $i=0; foreach($Products as $product)  {$i++;  ?>
            <tr style="height:70px !important;font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a;<?php if($i%2==0){echo 'background-color:#FAFAFA;'; }?>">
              <td ><?=$product->product_name;?></td>
              <td style="text-align: center;"><?=$product->s_order_details_quantity;?></td>
              <td style="text-align: center;"><?=(number_format($product->s_order_details_price, 2, ',', ''));?> <?=$CUR;?></td>
              <td style="text-align: center;"><?=(number_format(($product->s_order_details_price)*($product->s_order_details_quantity), 2, ',', ''));?><?=$CUR;?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table><!-- END OF full width Table -->
          <table width="633" border="0" cellspacing="0" cellpadding="0">
            	<tr>
            		<td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;">
            		<p></p></td>
            	</tr>
            </table>
            <!-- START OF FOOTER TABLE --> 
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10" colspan="2" valign="top"><img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td width="501" align="left" valign="top" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #7a7a7a; line-height: 16px;">
                 <p>&copy; <?PHP echo date('Y'); ?> <a href="<?php echo base_url().'index.php/connect/';?>" target="_blank">Enerlisonline.com</a><br />
                  Adresse : 77 Rue Marcel Dassault 92100 BOULOGNE BILLANCOURT - France<br />
                  N° Téléphone : (+33) 1.70.95.01.31<br />
                  N° Fax : (+33) 1.70.95.00.81<br />
                  Email : <a href="info@enerlisonline.com">info@enerlisonline.com</a><br />  
                  </p></td>
              </tr>
            </table>
            <!-- END OF FOOTER TABLE -->
          </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>