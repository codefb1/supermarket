<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="width=device-width">
    <style type="text/css">
/* Fonts and Content */

body, td {
	font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;
	font-size: 14px;
}
body {
	margin: 0;
	padding: 0;
	-webkit-text-size-adjust: none;
	-ms-text-size-adjust: none;
}
h2 {
	padding-top: 12px; /* ne fonctionnera pas sous Outlook 2007+ */
	color: #0E7693;
	font-size: 22px;
}
</style>
    </head>
    <body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0"  >
        <tbody>
      
        <tr>
      
        <td align="center" bgcolor="#FFF">
      
      <table  cellpadding="0" cellspacing="0" border="0">
          <tbody>
        
        <tr>
          <td class="w640"  width="640" height="10"></td>
        </tr>
        <tr>
          <td align="center" class="w640"  width="640" height="20"><a style="color:#ffffff; font-size:12px;" href="#"><span style="color:#ffffff; font-size:12px;">Voir le contenu de ce mail en ligne</span></a></td>
        </tr>
        <tr>
          <td class="w640"  width="640" height="10"></td>
        </tr>
        
        <!-- entete -->
        <tr class="pagetoplogo">
          <td class="w640"  width="640"><table  class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#F2F0F0">
              <tbody>
              <tr>
                  <td class="w30"  width="30" height="15"></td>
                  <td  class="w580"  width="580" valign="middle" align="left" height="42"><div class="pagetoplogo-content"> <img class="w580" style="text-decoration: none; display: block; color:#476688; font-size:30px;" src="http://s517883354.onlinehome.fr/enerlisonline/template/images/logo.png" alt="Mon Logo" /> </div></td>
                  <td class="w30"  width="30"></td>
                </tr>
            </tbody>
            </table></td>
        </tr>
        
        <!-- separateur horizontal -->
        <tr>
          <td  class="w640"  width="640" height="1" bgcolor="#d7d6d6"></td>
        </tr>
        
        <!-- contenu -->
        
          <tr class="content">
        
          <td class="w640" class="w640"  width="640" bgcolor="#ffffff">
        
        <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <tr>
              <td  class="w30"  width="30"></td>
              <td  class="w580"  width="580"><!-- une zone de contenu -->
                
                <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                    <tr>
                      <td class="w580"  width="580"><h2 style="color:#0E7693; font-size:22px; padding-top:12px;"> DEVIS - DEV<?php echo "00".$standard_order_id."-".date("m-Y", strtotime($item_orders['data_updated'] ))?> </h2></td>
                    </tr>
                    <tr>
                      <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                    </tr>
                  </tbody>
                </table>
                
                <!-- fin zone --> 
                <!-- une zone de contenu -->
                
                <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                    <tr>
                      <td class="w580"  width="580" height="15" ></td>
                    </tr>
                    <tr>
                      <td class="w580"  width="580"><div align="left" class="article-content">
                          <p><b>[ INFORMATIONS SUR LE DEVIS ]</b></br>
                        </p>
                          <p>Un devis sous la référence <b><?php echo $orders['s_order_reference']; ?></b> a été emis par :</p>
                          <p> Client  : <b><?php echo $orders['s_order_deliver_to']; ?></b> </p>
                          <p> Société : <b><?php echo $customer->customer_company; ?></b> </p>
                          <p> Date d'émission du devis : <b><?php echo $orders['data_created']; ?></b> </p>
                          <p> Adresse de livraision : <b><?php echo $customer->customer_address; ?></b> </p>
                          <p> Pays : <b>France</b> </p>
                          <p> Téléphone : <b><?php echo $customer->customer_phone_number; ?></b> </p>
                          <p> Email : <b><?php echo $orders['s_order_email_to']; ?></b> </p>
                        </div></td>
                    </tr>
                    <tr>
                      <td class="w580"  width="580" height="15" ></td>
                    </tr>
                    <tr>
                      <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                    </tr>
                    <tr>
                      <td class="w580"  width="580" height="15" ></td>
                    </tr>
                  </tbody>
                </table>
                
                <!-- fin zone -->
                
                <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                    <tr>
                      <td colspan="5"><p><b>[ DÉTAILS DU DEVIS  ]</b></br>
                      </td>
                    </tr>
                    <tr>
                      <td class="w130"  width="130" valign="top"><div align="left" class="article-content">
                          <p ><b>Désignation</b> </p>
                          <?php foreach($orders_details as $order) {?>
                          <p style="height:30px;"><?php echo $order['name']; ?></p>
                          <?php } ?>
                        </div></td>
                      <td class="w20"  width="20"></td>
                      <td class="w130"  width="130" valign="top"><div align="left" class="article-content">
                          <p style="text-align:center;"><b>Quantité </b></p>
                          <?php foreach($orders_details as $order) {?>
                          <p style="text-align:center;height:30px;"><?php echo $order['qty']; ?></p>
                          <?php } ?>
                        </div></td>
                      <td class="w20"  width="20"></td>
                      <td class="w130"  width="130" valign="top"><div align="left" class="article-content">
                          <p style="text-align:center;"><b>Prix unitaire </b></p>
                          <?php foreach($orders_details as $order) {?>
                          <p style="text-align:center;height:30px;"><?php echo $order['price']; ?>&euro;</p>
                          <?php } ?>
                        </div></td>
                      <td class="w20"  width="20"></td>
                      <td class="w130"  width="130" valign="top"><div align="left" class="article-content">
                          <p style="text-align:center;"><b>Prix total</b></p>
                          <?php foreach($orders_details as $order) {?>
                          <p style="text-align:center;height:30px;"><?php echo $order['price']*$order['qty']; ?>&euro;</p>
                          <?php } ?>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="7" class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                    </tr>
                  </tbody>
                </table></td>
                <td class="w30" class="w30"  width="30">
            </td>
          
            </tr>
          
            </tbody>
          
        </table>
          </td>
        
          </tr>
        
        <!-- une zone de contenu -->
        <tr>
          <td class="w640" width="640" height="15" bgcolor="#ffffff"></td>
        </tr>
        <tr>
          <td class="w580"  width="580" style="color:#7A7A7A;"><table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
              <tbody>
              <tr>
                  <td class="w30"  width="30"></td>
                  <td class="w580"  width="580"><div align="left" class="article-content"> © 2014 Enerlisonline <br>
                      Enerlis 77 rue Marcel Dassault 92100 Boulogne Billancourt <br>
                      France Tel:+33(0)170950135 <br>
                      Pour plus d'informations merci d'envoyer un mail à: Contact@enerlis.fr<br>
                    </div></td>
                  <td class="w30"  width="30"></td>
                </tr>
            </tbody>
            </table></td>
        </tr>
        <tr> </tr>
        <!-- fin zone --> 
        <!--  separateur horizontal de 15px de  haut-->
        <tr>
          <td class="w640"  width="640" height="15" bgcolor="#fff"></td>
        </tr>
        <tr>
          <td class="w640"  width="640" height="1" bgcolor="#c7c5c5"></td>
        </tr>
        <!-- pied de page -->
        <tr class="pagebottom">
          <td class="w640"  width="640"><table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" >
              <tbody>
              <tr>
                  <td colspan="5" height="10"></td>
                </tr>
              <tr>
                  <td class="w30"  width="30"></td>
                  <td class="w580"  width="580" valign="top"><p align="center" >www.enerlisonline.com </p></td>
                  <td class="w30"  width="30"></td>
                </tr>
              <tr>
                  <td colspan="5" height="10"></td>
                </tr>
            </tbody>
            </table></td>
        </tr>
        <tr>
          <td class="w640"  width="640" height="60"></td>
        </tr>
          </tbody>
        
      </table>
        </td>
      
        </tr>
      
        </tbody>
      
    </table>
</body>
</html>