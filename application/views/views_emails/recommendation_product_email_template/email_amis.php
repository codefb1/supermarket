<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
  <title>Enerlisonline</title>
  </head>
  
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="3" bgcolor="#59b329"></td>
      </tr>
    <tr>
        <td align="center" valign="top" style="padding:25px 0px;"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
            <tr>
            <td align="left" valign="top"><table  border="0" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" style="padding:0px 0px 0px 10px;"><a title="enerlisonline.com" href="<?php echo base_url(); ?>"><img src="<?=base_url().'template/';?>newsletter/logo.png" width="220" height="24" alt="" /></a></td>
                </tr>
              </table></td>
          </tr>
          </table>
    <tr>
        <td height="1" bgcolor="#d0d3d7"></td>
      </tr>
    <tr>
        <td align="center" valign="top" style="padding:20px 0px;"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
            <tr>
            <td align="left" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="middle" bgcolor="#fafafa" width="599" height="70" style="font-family:verdana; font-size:13px; font-weight:lighter; color:#80888e; line-height:18px; padding-bottom:12px;">Bonjour, une connaissance de votre réseau souhaite partager ce produit avec vous<br/>depuis le site <a title="enerlisonline.com" href="<?php echo base_url(); ?>"><span style="color:#20aae5">Enerlisonline.com</span></a></td>
                </tr>
              </table></td>
          </tr>
            
          <tr>
            <td >
            <table align="center" width="600" border="0" style="padding:20px 0px;">
                <tr>
                  <td width="300" align="left"><a title="<?=$P_NAME?>" href="<?php echo base_url();?>index.php/products/product/<?=$P_ID?>" target="_blank"><img src="<?php echo base_url();?>umbrella/medias/products-pictures/<?=$P_PH?>" width="286" height="362" alt="" border="0" style="display:block;"/></a></td>
                  <td width="300" align="center"  valign="top" style="text-align:justify; font-family:Verdana;font-size:11px; line-height:16px; color:#504641;"><table width="286" border="0" align="right" cellpadding="0" cellspacing="0" class="main">
                      <tr>
                        <td align="left" valign="top" style="font-family:verdana;
            font-size:16px; font-weight:lighter; color:#20aae5; padding:0px 0px 8px 0px;"><?=$P_NAME?></td>
                      </tr>
                  			      <?php if($P_PRIX > 0){?>
               <tr>
			
                <td align="left" valign="middle" style="font-family:verdana;
            font-size:20px; font-weight:lighter; color:#59b329; padding:0px 0px 8px 0px;"><?=number_format($P_PRIX, 2, ',', '')?>  €
			  <?php if($P_D_PRIX){?>
			<span style="color: #868d93;font-size: 13px;">(<?=$P_D_PRIX?>)</span>
				<?php }?> <span style="font-size: 12px;">(HT)</span>
			
			</td>
	
              </tr>
			  	<?php }?>
				
			      <?php if($P_PRIX == 0){?>
				  
				  <?php if($P_D_PRIX){?> 
               <tr>
			
                <td align="left" valign="middle" style="font-family:verdana;
            font-size:13px; font-weight:bold;color:#80888e; padding:0px 0px 8px 0px;">Information sur le prix
			
			</td>
              </tr>
			      <tr>
               <td align="left" valign="middle" style="font-family:verdana;
            font-size:18px; font-weight:lighter; color:#59b329; padding:0px 0px 8px 0px;"><?=$P_D_PRIX?> 
			</td>
              </tr>
			  <?php }
			  
			  else {?>
			     <tr>
			
                <td align="left" valign="middle" style="font-family:verdana;
            font-size:13px;color:#59b329; padding:0px 0px 8px 0px;">Prix non disponible momentanément
			
			</td>
              </tr>
			  
			  
			  <?php }?>
			  	<?php }?>	
				
		
                      <tr>
                        <td align="left" valign="top" style="font-family:verdana;
            font-size:11px; font-weight:lighter; color:#9ea8af; line-height:22px; padding-bottom:12px; text-align:start;"> <?=$P_DE?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><a title="<?=$P_NAME?>" href="<?php echo base_url();?>index.php/products/product/<?=$P_ID?>">
						<img src="<?=base_url().'template/';?>newsletter/read-more.png" width="160" height="33" alt="" /></a></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>

            <tr>
            <td align="center" valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0" style="padding:20px 0px;">
                <tr>
                  <td align="center" valign="top"  style="background:#fafafa;"><table width="600" height="50" border="0" cellspacing="0" cellpadding="0" class="main">
                      <tr>
                        <td align="center" valign="middle" style="font-family:verdana;
            font-size:12px; color:#80888e; padding:0px 0px 8px 0px;">© <?PHP echo date('Y'); ?> EnerlisOnline.com Tous droits réservés.</td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
          </table>
        
    </body>
</html>
  