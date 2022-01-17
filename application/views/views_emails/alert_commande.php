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
                <td width="615" align="left" valign="middle" bgcolor="#ffffff" style="font-family: Arial, Helvetica, sans-serif; color: #7a7a7a; font-size: 18px; letter-spacing: -1px;"></td>
              </tr>
              <tr>
                <td height="10"><img src="<?=base_url().'template/emails/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"><p> <b>Bonjour</b>, <br />
                  </p>
                  <p>Une nouvelle commande vient d'être émise via <a href="<?php echo base_url().'enerlisonline';?>">Enerlisonline.com</a> sous la référence <b><?php echo "F00".$standard_order_id."-".date_format(date_create($orders['data_created']),'m-Y');?></b> par le client <b><?php echo $orders['s_order_deliver_to']; ?></b> à <b> <?php echo date_fr($orders['data_created']); ?> </b> </p>
                  </br>
                  </br>
                  </p></td>
              </tr>
            </table>
            
            <!-- END OF full width Table -->
            
            <table width="633" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"></td>
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