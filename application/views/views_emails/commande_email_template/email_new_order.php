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
                <td   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #e3e3e3; font-family: Helvetica, sans-serif; font-size: 12px; letter-spacing: 0px;"><a title="go-ferme-halal.com" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'template/'; ?>logo/logo_go_ferme_halal-mail.jpg" alt="go-ferme-halal.com"/></a></td>
              </tr>
            </table>
            
            <!-- END OF Header Table --> 
            <!-- START OF full width Table -->
            
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;">&nbsp;</td>
              </tr>
              <tr>
                <td width="615" align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;">Bonjour <?php echo $orders->order_billing_lastname.' '.$orders->order_billing_firstname?>,</td>
              </tr>
              <tr>
                <td height="10"><img src="<?=base_url().'template/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"><p style="font-size: 18px; "> 
                  <b>FACTURE  - <?php echo $orders->order_id;?>
                  <p><b>[ INFORMATIONS SUR LE CLIENT ]</b></br>
                  </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Client  :</b> <?php echo  $orders->order_billing_lastname. " " . $orders->order_billing_firstname; ?> </p>
                    <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Adresse de Facturation  :</b> <?php echo $orders->order_billing_street." " . $orders->order_billing_zip." " . $orders->order_billing_city; ?> </p>
                  <?php $countries=$this->M_countries->get_this($orders->order_billing_country) ?>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Pays :</b> <?php echo $countries->country_name; ?> </p>
                 <!-- <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"><b> Email :</b> <?php echo  $orders->order_billing_email; ?> </p>-->
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Téléphone :</b> <?php echo  $orders->order_billing_phone; ?> </p>
                  <img src="<?=base_url().'template/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" />
                  <p> <b>[ DÉTAILS DE LA COMMANDE  ]</b> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Adresse de livraision :</b> </b> <?php echo  $orders->order_shipping_street." " . $orders->order_shipping_zip." " . $orders->order_shipping_city; ?> </p>
                   <?php $countries=$this->M_countries->get_this($orders->order_shipping_country) ?>
                   <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Pays :</b> <?php echo $countries->country_name; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"><b> Email :</b> <?php echo $orders->order_shipping_email; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Téléphone :</b> <?php echo $orders->order_shipping_phone; ?> </p>
                  <p style="color: #7a7a7a;font-family: Helvetica,sans-serif;"> <b>Date du la  commande  :</b> <?php echo date_format(date_create($orders->data_created),'d-m-yyyy'); ?> </p>
                  <p><b>Total produits :</b>
                    <?=(number_format($orders->order_products_prices, 2, ',', ''));?>
                    €</p>
                  <p><b>Frais de port :</b> <?php echo $orders->order_shipping_rate; ?> €</p>
                  <p><b>Net à payer : </b>
                    <?=(number_format($orders->order_amount, 2, ',', ''));?>
                    €</p>
            </table>
            <table width="633" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
              <tbody>
                <tr style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a;">
                  <th class="table-header" style="text-align: left;" > Article </th>
                  <th class="table-header" style="text-align: center;"> Quantité </th>
                  <th class="table-header" style="text-align: center;"> Prix unitaire </th>
                  <th class="table-header" style="text-align: center;"> Prix total </th>
                </tr>
                <?php $i=0;foreach($orders_details as $order_detail) {$i++;
				$product =$this->M_products->get_this($order_detail->product_id);
				
				
				?>
                <tr style="height:70px !important;font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a;<?php if($i%2==0){echo 'background-color:#FAFAFA;'; }?>">
                  <td><?php echo $product->product_name; ?></td>
                  <td style="text-align: center;"><?php echo $order_detail->product_quantity; ?></td>
                  <td style="text-align: center;"><?php echo (number_format($order_detail->orders_detail_product_price)); ?> €</td>
                  <td style="text-align: center;"><?php echo (number_format($order_detail->orders_detail_product_price*$order_detail->product_quantity)); ?> €</td>
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
                <td height="10" colspan="2" valign="top"><img src="<?=base_url().'template/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td width="501" align="left" valign="top" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #7a7a7a; line-height: 16px;"><p>&copy; <?PHP echo date('Y'); ?> <a href="<?php echo base_url().'accounts/';?>" target="_blank">go-ferme-halal.com</a><br />
                    Adresse : <br />
                    N° Téléphone : <br />
                    N° Fax : <br />
                    Email : <a href=""></a><br />
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