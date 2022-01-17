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
    <td valign="top"><table width="650" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
        <tr>
          <td><!-- START OF Header Table -->
            
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #e3e3e3; font-family: Helvetica, sans-serif; font-size: 12px; letter-spacing: 0px;"><a title="enerlisonline.com" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'template/'; ?>images/logo.png" alt=""/></a></td>
              </tr>
            </table>
            
            <!-- END OF Header Table --> 
            <!-- START OF full width Table -->
            
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;">&nbsp;</td>
              </tr>
              <tr>
                <td width="615" align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;"><!--Bonjour <?php /*echo $customer_lastname.' '.$customer_firstname*/?>,--></td>
              </tr>
              <tr>
                <td height="10"><img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"><p style="font-size: 18px; "> 
                  <b>FACTURE  - F<?php echo "00".$standard_order_id."-".date("m-Y")?>
                  <p><b>[ INFORMATIONS SUR LE CLIENT ]</b></br>
                  </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Client  :</b> <?php echo $orders['s_order_deliver_to']; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Société :</b> <?php echo $customer->customer_company; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Adresse de Facturation  :</b> <?php echo $customer->customer_address." " .$customer->customer_zip." " .$customer->customer_city; ?> </p>
                  <?php $data_country['customer']=$this->m_common->getthis("umb_countries","country_id",$customer->umb_country_id) ?>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Pays :</b> <?php echo $data_country['customer']->country_FR; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"><b> Email :</b> <?php echo $orders['s_order_email_to']; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Téléphone :</b> <?php echo $customer->customer_phone_number; ?> </p>
                  <img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" />
                  <p> <b>[ DÉTAILS DE LA COMMANDE  ]</b> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Adresse de livraision :</b> <?php echo $orders['s_order_delivery_address']; ?></p>
                  <?php $data_country_liv['customer']=$this->m_common->getthis("umb_countries","country_id",$orders['umb_country_id']) ?>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Pays :</b> <?php echo $data_country_liv['customer']->country_FR; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Date du la  commande  :</b> <?php echo date_format(date_create($orders['data_created']),'d-m-y'); ?> </p>
                  <p><b>Total produits :</b>
                    <?=(number_format($orders['s_order_amount']-$orders['s_order_shipping_rate'], 2, ',', ''));?>
                    €</p>
                  <p><b>Frais de port :</b> <?php echo $orders['s_order_shipping_rate']; ?> <?php echo $CUR ?></p>
                  <p><b>Net à payer : </b>
                    <?=(number_format($orders['s_order_amount'], 2, ',', ''));?>
                    €</p>
            </table>
            <table width="633" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
              <tbody>
                <tr style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a;">
                  <th class="table-header" style="text-align: left;" > Désignation </th>
                  <th class="table-header" style="text-align: center;"> Quantité </th>
                  <th class="table-header" style="text-align: center;"> Prix unitaire </th>
                  <th class="table-header" style="text-align: center;"> Prix total </th>
                </tr>
                <?php $i=0;foreach($orders_details as $order) {$i++;?>
                <tr style="height:70px !important;font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a;<?php if($i%2==0){echo 'background-color:#FAFAFA;'; }?>">
                  <td><?php echo $order['name']; ?></td>
                  <td style="text-align: center;"><?php echo $order['qty']; ?></td>
                  <td style="text-align: center;"><?php echo $order['price']; ?> €</td>
                  <td style="text-align: center;"><?php echo $order['price']*$order['qty']; ?> €</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            
            <!-- END OF full width Table -->
            
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"><p></p></td>
              </tr>
            </table>
            
            <!-- START OF FOOTER TABLE -->
            
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10" colspan="2" valign="top"><img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td width="501" align="left" valign="top" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #7a7a7a; line-height: 16px;"><p>&copy; <?PHP echo date('Y'); ?> <a href="<?php echo base_url().'index.php/connect/';?>" target="_blank">Enerlisonline.com</a><br />
                    Adresse : 77 Rue Marcel Dassault 92100 BOULOGNE BILLANCOURT - France<br />
                    N° Téléphone : (+33) 1.70.95.01.31<br />
                    N° Fax : (+33) 1.70.95.00.81<br />
                    Email : <a href="info@enerlisonline.com">info@enerlisonline.com</a><br />
                  </p></td>
              </tr>
            </table>
            
            <!-- END OF FOOTER TABLE --></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>