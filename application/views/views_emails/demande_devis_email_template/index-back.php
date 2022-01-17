<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document sans nom</title>
<style>
<!--
body {
	background: url(../../template/images/bg.jpg) no-repeat center center fixed !important;
	-webkit-background-size: cover !important;
	-moz-background-size: cover !important;
	-o-background-size: cover !important;
	background-size: cover !important;
}
* {
	font-size : 12px;
	font-family: Arial;
}
br {
	clear: both;
	line-height: 0.4;
}
#wrap {
	padding : 10px;
	width : 800px;
	max-width : 800px;
	margin-right : auto;
	margin-left : auto;
	border : 1px solid #000;
}
.bordered {
	padding : 20px;
}
.text-right {
	text-align: right;
}
.text-left {
	text-align: left;
}
.header {
	font-size : 14px;
}
.orange {
	color : #428bca;
}
.table-title {
	color : white;
	background-color : #428bca;
	font-size : 14px;
}
.table-header {
	background-color : #E5E5E5;
	padding: 9px;
	text-align: left;
}
.table-cell-content {
	padding : 10px;
}
-->
</style>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#20ABE6" >
  <tbody>
    <tr style="height:10px;text-align:center;">
      <td style="width:100%;"></td>
    </tr>
  </tbody>
</table>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EFEFEF" >
  <tbody>
    <tr style="height:30px;text-align:center;">
      <td style="width:100%;"></td>
    </tr>
  </tbody>
</table>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EFEFEF" style="background-repeat:repeat-x">
  <tbody>
    <tr>
      <td valign="top"><table width="800" border="0" align="center" cellpadding="20" cellspacing="0" bgcolor="#EFEFEF">
          <tbody>
            <tr>
              <td><img src="http://s517883354.onlinehome.fr/enerlisonline/template/images/logo.png" alt=""></td>
            </tr>
            <tr height="50">
              <td></td>
            </tr>
            <tr>
              <td width="230"><div class=""> Enerlis 77 rue Marcel Dassault<br>
                  92100 Boulogne Billancourt France<br>
                  Tel:+33(0)170950135<br>
                  Email: Contact@enerlis.fr </div></td>
              <td style="width : 250px;"></td>
              <td><div class="text-left"> <?php echo $orders['s_order_deliver_to']; ?><br>
                  92100 Boulogne Billancourt France<br>
                  Tel:+33(0)170950135<br>
                  <?php echo $orders['s_order_email_to']; ?></div></td>
            </tr>
          </tbody>
        </table>
        <table width="800" border="0" align="center" cellpadding="20" cellspacing="0" >
          <tbody>
            <tr style="height:50px;text-align:center;">
              <td style="width:100%;"></td>
            </tr>
          </tbody>
        </table>
        <table width="800" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#EFEFEF" style="margin: 50px 0 50px 0 !important;">
          <tbody>
            <tr>
              <td style="width : 250px"><div class="bordered" style="width : 250px; height: 66px; "> DEVIS N° #<?php echo $orders['s_order_reference']; ?><br>
                  <?php echo $orders['data_created']=date('Y-m-d'); ?><br>
                </div></td>
              <td style="width : 100px; text-align:center;"></td>
              <td style="width : 250px"></td>
            </tr>
          </tbody>
        </table>
        <table width="800" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
          <tbody>
            <tr>
              <th class="table-header" style="text-align: center;"> Désignation </th>
              <th class="table-header" style="text-align: center;"> Quantité </th>
              <th class="table-header" style="text-align: center;"> Prix unitaire </th>
              <th class="table-header" style="text-align: center;"> Prix total </th>
            </tr>
            <?php $i=0;foreach($orders_details as $order) {$i++;?>
            <tr style="height:70px !important;<?php if($i%2==0){echo 'background-color:#FAFAFA;'; }?>">
              <td style="text-align: center;"><?php echo $order['name']; ?></td>
              <td style="text-align: center;"><?php echo $order['qty']; ?></td>
              <td style="text-align: center;"><?php echo $order['price']; ?></td>
              <td style="text-align: center;"><?php echo $order['price']*$order['qty']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table></td>
    </tr>
    <tr> </tr>
  </tbody>
</table>
<table width="800" border="0" align="center" cellpadding="20" cellspacing="0" >
  <tbody>
    <tr style="height:50px;text-align:center;">
      <td style="width:100%;"></td>
    </tr>
  </tbody>
</table>
<table width="720" border="0" align="center" cellpadding="20" cellspacing="0" >
  <tbody>
    <tr style="height:50px;text-align:center;">
      <td ></td>
    </tr>
    <tr style="height:50px;text-align:center;">
      <td style="width:180px;background-color: #E5E5E5;"> Sous-total </td>
      <td style="width:180px;background-color: #E5E5E5;"> TVA(20%) </td>
      <td style="width:180px;background-color: #E5E5E5;"> Frais Transport </td>
      <td style="width:180px;background-color: #62AD1F;color: #fff;"> Total </td>
    </tr>
  </tbody>
</table>
<table width="800" border="0" align="center" cellpadding="20" cellspacing="0" >
  <tbody>
    <tr style="height:50px;text-align:center;">
      <td style="width:100%;"></td>
    </tr>
  </tbody>
</table>
<table width="760" border="0" align="center" cellpadding="20" cellspacing="0" style="margin-top: 50px !important;">
  <tbody>
    <tr style="height:70px;text-align:center;">
      <td style="width:100%;"><p>En diminuant votre consommation d'énergie, vous pouvez aider des foyers en précarité énergétique.<br>
          ENERLIS, soutient l'association ACPE, www.lutte-precarite-energetique.org , accompagnant les
          personnes en détresse énergétique.</p></td>
    </tr>
  </tbody>
</table>
<hr width="800">
<table width="800" border="0" align="center" cellpadding="20" cellspacing="0">
  <tbody>
    <tr style="text-align:center;">
      <td style="width:100%;"> www.enerlisonline.com </td>
    </tr>
  </tbody>
</table>
</body>
</html>