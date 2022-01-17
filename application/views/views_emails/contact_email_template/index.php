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
                <td   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #e3e3e3; font-family: Helvetica, sans-serif; font-size: 12px; letter-spacing: 0px;"><a title="go-ferme-halal.com" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'template/'; ?>logo/logo_go_ferme_halal-mail.jpg" alt="go-ferme-halal.com"/></a></td>
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
                <td height="10"><img src="<?=base_url().'template/img/';?>three_quarter_HR.gif" width="633" height="20" alt="hr1" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7a7a7a; line-height: 18px;"><p> <b>Bonjour</b>, <br />
                  </p>
                  <p>Une nouvelle demande de contact vient d'être émise via <a href="<?php echo base_url();?>">Go-Ferme-halal.com</a>, vous trouverez ci-dessous le détails <br />
                  </p>
                  Nom :
                  <?=$contact_lastname?>
                  
                 
                  
                  <br />
                  Email :
                  <?=$contact_email?>
                  <br />
                  Sujet :
                  <?=$contact_subject?>
                  <br />
                  </p>
                  <p>Message : <br />
                    <?=nl2br($message)?>
                    <br />
                  </p>
                  <br /></td>
              </tr>
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