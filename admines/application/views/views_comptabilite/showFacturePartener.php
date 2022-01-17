	
	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'comptabilite/partners';?>'"><i class=" fa fa-reply"></i>  Listes des facutres</button>

 </div>
<div class="col-sm-6">
  <h2 class="page_title">Récapitulatif de la facture N°  <?php  echo $orders->order_reference;?></h2>
  
</div>
  <?php 
		      $tvaCart = ($orders->order_total_price_buying/100)*$orders->taxe_value;
			  $htCart = $orders->order_total_price_buying-$tvaCart;
			  $tvaShopping = ($orders->order_shipping_rate/100)*$orders->taxe_value;
			  $htShopping = $orders->order_shipping_rate-$tvaShopping;
			  $total = $orders->order_total_price_buying;
			  $taxe_value= $orders->taxe_value;
		      $order_taxe_value= $taxe_value/100;
	   ?>
<div class="row">
	
				
			
  <div class="col-lg-12">
    <div class="panel panel-default">
     
      <div class="panel-body">
        <div class="panel-heading"> </div>
	
	<div class="row m-b">
	<?php if(@$this->uri->segment(3) == 1) { ?>
					<div class="alert alert-success"> <i class="zmdi zmdi-check"></i> Opération réussie</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 2) { ?>
					<div class="alert alert-danger"> <i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Mise à jour échouée !</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
	 <div class="col-md-12 commande">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         	
				  <div class="title_block">  <h4 class="widget-title"><b>Information de la facture</b>
				      </h4></div>
				  
					<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">Date</label>
							<div class="col-md-8">
								<?php echo date_fr($orders->order_data_created);?> <?php echo date_fr_heur($orders->order_data_created);?>
							</div>
						</div>
						</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-2 control-label">Réf Commande</label>
							<div class="col-md-8">
							<?php echo $orders->order_reference;?> </div>
						</div>
						
				</div>
				
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-2 control-label">Founisseur</label>
							<div class="col-md-8">
								<?php echo $orders->partener_lastname;?> 
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">HT panier</label>
							<div class="col-md-8">
						<?php echo (number_format($htCart, 2, ',', ''))."  euro" ?>
							</div>
						</div>
						</div>
			
				<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">TVA panier</label>
							<div class="col-md-8">
								<?php echo (number_format($tvaCart, 2, ',', ''))."  euro" ?>
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label"> TTC panier</label>
							<div class="col-md-8">
							<?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."  euro" ?>
							</div>
						</div>
						</div>
							<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label"> Montant total facture</label>
							<div class="col-md-8">
							<?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."  euro" ?>
							</div>
						</div>
						</div>
						
		
 
			
                </div>
                
              </div>
            </div> 

	 <div class="col-md-12 commande">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         
				  <div class="title_block">  <h4 class="widget-title"><b>Panier</b>
				      </h4></div>
				
				
						
						
						 <div class="row"> 
	 
	 
	 <div class="col-lg-12">
								 <table class="table info_table table-hover" id="accounts_table">
						  <thead>
						  
							<tr>
								<th class="sub_col" >Num</th>
								<th class="sub_col" >Catégorie</th>
								<th class="sub_col" >Quantité</th>
								<th class="sub_col" >Produit</th>
								<th class="sub_col" >Prix  HT</th>
								<th class="sub_col" >TVA</th>
								<th class="sub_col" >TTC</th>
								<th class="sub_col" >Poids</th>
							 
							</tr>
						  </thead>
						  <tbody >
						 
			 <?php $totalPoids=0;  $totalPriceHT=0; $totalPriceTTC=0; $i=1; foreach($orders_detail as $order_detail) : 

                    $totalPoids=$totalPoids+($order_detail->orders_detail_product_poids * $order_detail->product_quantity);
					$totalPriceTTC= $totalPriceTTC+($order_detail->order_product_price_buying * $order_detail->product_quantity);
			        $totalPriceHT=$totalPriceHT+(($order_detail->order_product_price_buying-($order_taxe_value*$order_detail->order_product_price_buying)) * $order_detail->product_quantity);
			    
			?>
						   <tr class="supp-<?php echo $order_detail->order_detail_id;?>">
							<td class="sub_col"><?php echo $i;?> </td>
							<td class="sub_col"><?php echo $order_detail->categorie_name;?> </td>
							<td class="sub_col"><?php echo $order_detail->product_quantity;?> </td>
							<td class="sub_col"><?php echo $order_detail->product_name;?> </td>
							
							<td class="sub_col"><?php echo (number_format(($order_detail->order_product_price_buying-($order_taxe_value*$order_detail->order_product_price_buying))  * $order_detail->product_quantity, 2, ',', ''))."  €" ;?> </td>
							<td class="sub_col"><?php echo $taxe_value;?> %</td>
							<td class="sub_col"><?php echo (number_format($order_detail->order_product_price_buying * $order_detail->product_quantity, 2, ',', ''))."  €" ;?> </td>
							<td class="sub_col"><?php echo $order_detail->orders_detail_product_poids * $order_detail->product_quantity;?>  KG</td>
							</tr>
						<?php $i++; endforeach; ?>
						<tr class="supp-">
							<td class="sub_col" style="border: none;"> </td>
							<td class="sub_col" style="border: none;"> </td>
							<td class="sub_col" style="border: none;"> </td>
							<td class="sub_col" style="background-color: #90EE90!important;border-color: #90EE90!important;border: none;text-align: right!important;font-weight: bold;"><b>Total</b> </td>
							
							<td class="sub_col"><?php echo (number_format($totalPriceHT, 2, ',', ''))."  €" ;?> </td>
							<td class="sub_col"><?php echo $taxe_value;?> % </td>
							<td class="sub_col"><?php echo (number_format($totalPriceTTC, 2, ',', ''))."  €" ;?> </td>
							<td class="sub_col"><?php echo $totalPoids;?> KG</td>
							</tr>
						  </tbody>
						</table>
						
			  
				</div>
  </div>
 
			
                </div>
                
              </div>
            </div> 

</br>
 <div class="col-md-12 commande">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         
				  <div class="title_block">  <h4 class="widget-title"><b>Information de la paiement</b>
				      </h4></div>
				  <div class=" message "> </div>
				  <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="<?=base_url().'comptabilite/showFacturePartener';?>">
		
						<div class="form-group">
						<div class="row">
							<label  class="col-md-2 control-label"> Paiement</label>
							<div class="col-md-3">
							<select  id="order_payment_status_partener"  name="order_payment_status_partener" class=" form-control btn-xs" >
																<option  <?php  if($orders->order_payment_status_partener==1){ echo"selected";} ?> value="1">Non </option>
																<option  <?php  if($orders->order_payment_status_partener==2){ echo"selected";} ?> value="2">Oui </option>
																

  															</select> 
							</div>
						</div>
						</div>
				  <div class="form-group">
					<div class="row">
						
							<label  class="col-md-2 control-label">Montant payé (euro)</label>
							<div class="col-md-3">
								
								<input type="text" class="form-control order_partener_amount"  name="order_partener_amount" value="<?php echo $orders->order_partener_amount;?>" />
							
							
							</div>
						</div>
						</div>
						 <div class="form-group">
			   <div class="row">
			   <div class="col-sm-4">
				  <div id="upload-drop" class="uk-placeholder">
				  <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					Glisser ou <a class="uk-form-file">Importer le document  <input id="upload-select" name="partener_pdf_payement" id="logo" type="file"></a>
				  </div>
				  <div id="progressbar" class="uk-progress uk-hidden">
					<div class="uk-progress-bar" style="width: 0%;">...</div>
				  </div>
			   
			    </div>
				<div class="col-sm-4 partenerPdfPayement">	
			
			
			<?php if($orders->partener_pdf_payement) { ?>
									<a  target="_blank" href="<?php echo base_url()."medias/payements/".$orders->partener_pdf_payement; ?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i> Paiement Pdf</button></a>
				
					<?php } ?>
			
			</div>
				</div>
		  </div>
			
				
			 <input type="hidden" class="form-control" name="order_id" id="order_id" value="<?=$orders->order_id;?>">
							  	<input type="hidden" id="partener_pdf_payement" name="partener_pdf_payement" value="<?=$orders->partener_pdf_payement;?>" />
        
            <div class="">
              <button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-ok"></i> <span>Valider</span></button>
            </div>
                         	
        </form>
			
				
			
                </div>
                
              </div>
            </div>
			
	        </div>
   </div>
	
	
	 


	 
	 
	 	 
	</div>
	 
	 
	 
	 
	 
 
	
	</div>
	</div>
	
	  
	  
	  
	
	 
	 
	 	  
	 

<style>
.underline {text-decoration: underline;margin-right: 10px;}

.partenerPdfPayement  {
			padding: 10px;
	}
	.action_block1 {
		width: 21%;
		display: inline-block;
	}
	.title_block1 {
		width: 72%;
		display: inline-block;;
	}
	.commande  {
			margin-bottom: 10px;
	}

	.commande label {
			font-weight: bold!important;
			font-size: 12px!important;
			position: relative!important;
			top: 3px!important;
	}
	.commande .portlet {
		border-width: 2px!important;
		border-style: solid!important;
		border-color: #90EE90!important;
		padding: 10px;
	}
	
.commande	.row + .row{
    margin-top: 6px;
}
	.commande .widget-title {
		
	
	}
	
 
</style>
 <script type="text/javascript">

			
			 $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {
			param :'logo',
            action: '<?php echo base_url().'comptabilite/uploadFile/';?>', // upload url

            allow : '*.(pdf|doc|docx)', // allow only images

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");
				$("#partener_pdf_payement").val(response);
				$(".partenerPdfPayement").html('<a  target="_blank" href="<?php echo base_url()."medias/payements/"; ?>'+response+'" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i>Paiement Pdf</button></a>');
				
                setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);

                //alert("Upload Completed")
            }
        };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
			//alert(select);
    });

			</script>
	 <script type="text/javascript">

$(document).ready(function () {
	$(".btn-success").click(function () {
		$( "#submitpage" ).submit();
});

});
	


</script>