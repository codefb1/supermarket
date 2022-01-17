<page  style="margin:0;padding:0"  backtop="25mm" backbottom="25mm" backleft="0" backright="0">
  <page_header>
    <table>
      <tr>
        <td height="67" width="320"  align="left" valign="middle" ><img width="320" src="<?=base_url().'template/';?>images/logo-facture.png" /></td>
        <td height="67" width="400"  align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"><div  style="word-spacing: 5px; text-align:right ;"><strong>Devis Réf# DV
            <?=$OREF?>
            </strong></div></td>
      </tr>
      <tr >
        <td height="100"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
      </tr>
    </table>
  </page_header>
  <page_footer>
    <hr style="height:1px; color : #444;">
    <table align="center"  width="720">
      <tr>
        <td     valign="middle" bgcolor="#FFFFFF" style="bottom: 0px;color:#444; font-size: 12px; letter-spacing: 0px;text-align:center;"><span style="text-align:center;font-size: 6pt;line-height:2px;">Enerlisonline est une marque déposée.</span><br>
          <span style="text-align:center;font-size: 6pt;line-height:2px;">Adresse : 77 Rue Marcel Dassault 92100 BOULOGNE BILLANCOURT - France</span ><br>
          <span style="text-align:center;font-size: 6pt;line-height:2px;">N° Téléphone : (+33) 1.70.95.01.31</span ><br>
          <span  style="text-align:center;font-size: 6pt;line-height:2px;">Une version électronique est conservée sur votre compte. Pour y accéder, identifiez-vous sur le site www.enerlisonline.com</span ><br>
          <span  style="text-align:center;font-size: 6pt;line-height:2px;">ENERLISONLINE.COM</span ></td>
      </tr>
    </table>
  </page_footer>
  <table style="width:450px ; hight:450px ;">
    <tr style="width:450px ; height:450px ;">
      <td  style="width:450px ;   height:450px ;"><table  style=" border: 1 ; ;padding:15px;">
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 18px;" ><strong>Adresse de Livraison</strong></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;" ><?=$ODN;?></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;" ><?=$ODL;?></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;" ><?=$ODC;?></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;" ></td>
          </tr>
        </table></td>
      <td   bgcolor="#FFFFFF"><table  style=" border: 1 ;padding:15px;" >
          <tr  >
            <td style="width: 250px ; height:20px ; font-size: 18px;"><strong>Adresse de Facturation</strong></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;"><?=$CLN." ".$CFN;?></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;"><?=$ODCM;?></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;"><?=$CO;?></td>
          </tr>
          <tr >
            <td style="width: 250px ; height:20px ; font-size: 13px;"><?=$CT ;?></td>
          </tr>
        </table></td>
    </tr>
    <tr >
      <td height="15"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
    </tr>
  </table>
  <table>
    <tr >
      <td height="10"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
    </tr>
  </table>
  <table style="border-style:solid;border-top:thick double #000000; "  >
    <tr  style="background-color:#F0F0F0;   ; height:5px ;" >
      <td style="padding:2mm;"><strong>D&eacute;signation</strong></td>
      <td style="text-align: center;"><strong>Quantit&eacute;</strong></td>
      <td style="text-align: center;"><strong>Prix unitaire</strong></td>
      <td style="text-align: right;"><strong>Prix total</strong></td>
    </tr>
    <?php foreach($Products as $product) { ?>
    <?php foreach($Attributs as $attribut) { if($attribut->umb_s_orders_details_id== $product->s_order_details_id) $attr.="-".$attribut->attribut_type.":".$attribut->attribut_value." " ;};  ?>
    <tr>
      <td style="width: 48mm ; padding:2mm;"><?=$product->product_name;?>
        <span style=" " ><?php echo $attr ?></span></td>
      <td style="width: 48mm ;padding:2mm; text-align: center;"><?=$product->s_order_details_quantity;?></td>
      <td style="width: 48mm ;padding:2mm; text-align: center;"><?=(number_format($product->s_order_details_price, 2, ',', ''));?>
        <?=$CUR;?></td>
      <td style="width: 20mm ;padding:2mm; text-align: right;"><?=(number_format(($product->s_order_details_price)*($product->s_order_details_quantity), 2, ',', ''));?>
        <?=$CUR;?></td>
    </tr>
    <?php  $attr ="";} ;?>
  </table>
  <table >
    <tr >
      <td height="20"   align="left" valign="middle" bgcolor="#FFFFFF" style="color: #000000;word-spacing: 5px;; font-family: Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"></td>
    </tr>
  </table>
  <table>
    <tr>
      <td  width="460"></td>
      <td  width="150" style="text-align: right;"> Total produits :</td>
      <td  width="60"></td>
      <td  style="text-align: right;"><?="".(number_format(($MON-$OFE), 2, '.', ''));?>
        <?=$CUR;?></td>
    </tr>
    <tr>
      <td></td>
      <td  style="text-align: right;"> Frais de transport : </td>
      <td  width="60"></td>
      <td  style="text-align: right;"><?="".(number_format($OFE, 2, '.', ''));?>
        <?=$CUR;?></td>
    </tr>
    <tr>
      <td></td>
      <td  style="text-align: right;"> TVA : </td>
      <td  width="60"></td>
      <td  style="text-align: right;"><?="".(number_format((($MON-$OFE)*$TAX), 2, '.', ''));?>
        <?=$CUR;?></td>
    </tr>
    <tr>
      <td></td>
      <td  style="text-align: right;"> Net à payer : </td>
      <td  width="60"></td>
      <td  style="text-align: right;"><?="".(number_format($MON+(($MON-$OFE)*$TAX), 2, '.', ''));?>
        <?=$CUR;?></td>
    </tr>
  </table>
</page>
