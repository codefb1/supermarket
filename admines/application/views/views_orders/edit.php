	
	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'orders';?>'"><i class=" fa fa-reply"></i>  Listes des commandes</button>

 </div>
<div class="col-sm-6">
  <h2 class="page_title">Récapitulatif de la commande N°  <?php  echo $orders->order_reference;?></h2>
  
</div>
  <?php 
		if($orders->order_payment_method==1){$mode='Carte bancaire';}		 
		if($orders->order_payment_method==2){$mode='Ogone';}	
		if($orders->order_payment_method==3){$mode='Chèque';}
		if($orders->order_payment_method==0){$mode='Carte bancaire';}	
		if($orders->order_payment_status==0){$label='label-danger';$order_payment_status='Abandon de panier';}			
		if($orders->order_payment_status==1){$label='label-warning';$order_payment_status='Paiement en attente';}
		if($orders->order_payment_status==2){$label='label-danger';$order_payment_status='Paiement refusé';}
		if($orders->order_payment_status==3){$label='label-success';$order_payment_status='Paiement accepté';}
		if($orders->order_payment_status==5){$label='label-danger';$order_payment_status='Commande annulée ';}
		if($orders->order_payment_status==4){$label='label-success';$order_payment_status='Commande expédiée';}
		if($orders->order_payment_status==6){$label='label-warning';$order_payment_status='Commande en préparation';}
		
		$taxe_value= $orders->taxe_value;
		$order_taxe_value= $taxe_value/100;
	   ?>
<div class="row">

  <div class="col-lg-12">
    <div class="panel panel-default">
     
      <div class="panel-body">
        <div class="panel-heading"> </div>
	
	<div class="row m-b">
	 <div class="col-md-4 commande">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
         
				  <div class="title_block">  <h4 class="widget-title"><b>Information de la commande</b>
				        <a href="#" class="updateInfoStatus btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="okInfoStatus btn green btn-sm  btn-success hidden"><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelInfoStatus btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>
					</h4></div>
				  <div class=" message message_order_status"> </div>
					<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label">Client</label>
							<div class="col-md-8">
								<input type="text" class="form-control " disabled name="" value="<?php echo $orders->customer_firstname.'  '.$orders->customer_lastname;?> " />
							</div>
						</div>
						</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label">Commande N°</label>
							<div class="col-md-8">
								<input type="text" class="form-control " disabled name="" value="<?php  echo $orders->order_reference;?>" />
							</div>
						</div>
						
				</div>
				
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label">Crée le</label>
							<div class="col-md-8">
								<input type="text" class="form-control " disabled name="" value="<?php echo date_fr($orders->order_data_created);?>  <?php echo date_fr_heur($orders->order_data_created);?>" />
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label">Statut </label>
							<div class="col-md-8">
							<select  id="order_status"  name="order_status " class="form-control  btn-xs " disabled>
																                                                     <?php foreach($status_list as $status) :?>
																													<option <?php  if($status->status_id==$orders->order_status){ echo"selected";} ?> value="<?php echo $status->status_id;?>"> <?php echo $status->status_name;?></option>
																													 <?php endforeach; ?>
																
																
															                                	</select> 
							</div>
						</div>
						</div>
			
				<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Montant total TTC</label>
							<div class="col-md-7">
								<input type="text" class="form-control " disabled name="" value="<?php echo (number_format($orders->order_amount, 2, ',', ''))."  €" ?>" />
							
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label"> Staut de paiement</label>
							<div class="col-md-8">
							<span  class="span-<?php  echo $orders->order_id;?> label <?php echo $label ?> " >  <?php echo $order_payment_status; ?></span>  par   <?php echo $mode ?> 

							</div>
						</div>
						</div>
			
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label">Partenaire</label>
							<div class="col-md-8">
								<input type="text" class="form-control " disabled name="" value="<?php  echo $orders->partener_lastname;?>" />
							</div>
						</div>
						
				</div>
                </div>
                
              </div>
            </div> 
	 <div class="col-md-4 billing">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b>Adresse de facturation</b>
				<a href="#" class="updateInfoBilling btn yellow btn-sm btn-primary" ><i class="glyphicon glyphicon-pencil"></i></i></a>
				<a href="#" class="okInfoBilling btn green btn-sm  btn-success hidden" data-id="<?php  echo $orders->order_id;?>" data-type="billing" ><i class="glyphicon glyphicon-ok"></i></a>
				<a href="#" class="cancelInfoBilling btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>

				  
				  </h4></div>
				  <div class=" message message_billing"> </div>
				<form  role="form">
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 control-label">Nom</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_lastname" disabled name="order_billing_lastname" value="<?php  echo $orders->order_billing_lastname;?>" />
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Prénom</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_firstname" disabled name="order_billing_firstname" value="<?php  echo $orders->order_billing_firstname;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Email</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_email" disabled name="order_billing_email" value="<?php  echo $orders->order_billing_email;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Téléphone</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_phone" disabled name="order_billing_phone" value="<?php  echo $orders->order_billing_phone;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Adresse</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_street" disabled name="order_billing_street" value="<?php  echo $orders->order_billing_street;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Ville</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_city" disabled name="order_billing_city" value="<?php  echo $orders->order_billing_city;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">CP</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_billing_zip" disabled name="order_billing_zip" value="<?php  echo $orders->order_billing_zip;?>" />
							</div>
						</div>
						</div>
						
							<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Pays</label>
							<div class="col-md-9">
											<select  id="order_billing_country"  name="order_billing_country" class=" form-control  order_billing_country_p btn-xs" disabled>
																<option  <?php  if($orders->order_billing_country==1){ echo"selected";} ?> value="1">France </option>
																<option  <?php  if($orders->order_billing_country==3){ echo"selected";} ?> value="2">Belgique </option>
																

  															</select> 
							</div>
						</div>
						</div>
				</form>
                </div>
                
              </div>
            </div> 
			
	    <div class="col-md-4 shipment">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b>Adresse de livraison</b>
				  <a href="#" class="updateInfoShipment btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
    					<a href="#" class="okInfoShipment btn green btn-sm  btn-success hidden" data-id="<?php  echo $orders->order_id;?>" data-type="shipment"><i class="glyphicon glyphicon-ok"></i></a>
    					<a href="#" class="cancelInfoShipment btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>
					
				  </h4></div>
				   <div class=" message message_shipment"> </div>
					<form  role="form">
			
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 control-label">Nom</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_lastname" disabled name="order_shipping_lastname" value="<?php  echo $orders->order_shipping_lastname;?>" />
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Prénom</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_firstname" disabled name="order_shipping_firstname" value="<?php  echo $orders->order_shipping_firstname;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Email</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_email" disabled name="order_shipping_email" value="<?php  echo $orders->order_shipping_email;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Téléphone</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_phone" disabled name="order_shipping_phone" value="<?php  echo $orders->order_shipping_phone;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Adresse</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_street" disabled name="order_shipping_street" value="<?php  echo $orders->order_shipping_street;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Ville</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_city" disabled name="order_shipping_city" value="<?php  echo $orders->order_shipping_city;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">CP</label>
							<div class="col-md-9">
								<input type="text" class="form-control order_shipping_zip" disabled name="order_shipping_zip" value="<?php  echo $orders->order_shipping_zip;?>" />
							</div>
						</div>
						</div>
						
							<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Pays</label>
							<div class="col-md-9">
											<select  id="order_shipping_country"  name="order_shipping_country" class=" form-control  order_shipping_country_p btn-xs" disabled>
																<option  <?php  if($orders->order_shipping_country==1){ echo"selected";} ?> value="1">France </option>
																<option  <?php  if($orders->order_shipping_country==3){ echo"selected";} ?> value="2">Belgique </option>
																

  															</select> 
							</div>
						</div>
						</div>
				</form>
                </div>
                
              </div>
            </div>
   </div>
	
	 <div class="row"> 
	 
	 
	 <div class="col-lg-12"><h4 class="widget-title"><b>Panier</b></h4></div>
		<div class="col-lg-12">
								 <table class="table info_table table-hover" id="accounts_table">
						  <thead>
						  
							<tr>
								<th class="sub_col" >Nom</th>
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

                    $totalPoids=$totalPoids+$order_detail->orders_detail_product_poids * $order_detail->product_quantity;
					$totalPriceTTC= $totalPriceTTC+$order_detail->orders_detail_product_price * $order_detail->product_quantity;
			        $totalPriceHT=$totalPriceHT+(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price))  * $order_detail->product_quantity);
			    
				
				       $product = $this->M_products->get_this_product($order_detail->product_id);
					   $assocation_country = "";
					   if($order_detail->association_id){ 
							 $assocation = $this->M_associations->get_this_assocation($order_detail->association_id);
							 
							 $assocation_country ="(".$assocation->country_name.")";
							 } 
							  $categorie_couffin_name = "";
							  $packs = "";
							  if($product->categorie_couffin_id){ 
							 $categorie_couffin = $this->M_categories_couffin->get_this($product->categorie_couffin_id);
							 
							 $categorie_couffin_name =$categorie_couffin->categorie_couffin_name;
							 $packs =$this->M_products->get_packs_product($product->product_id);
							 } 
			?>
						   <tr class="supp-<?php echo $order_detail->order_detail_id;?>">
							<td class="sub_col"><?php echo $i;?> </td>
							<td class="sub_col"><?php echo $product->categorie_name;?> <?php echo $categorie_couffin_name;?>



							</td>
							<td class="sub_col"><?php echo $order_detail->product_quantity;?> </td>
							<td class="sub_col"><?php echo $product->product_name;  echo $assocation_country;?>



                       <?php   if($packs){ 
						?> 
                       <div> <b>Composer du :</b></div>
						<?php
                         foreach($packs as $packs) :
						  $isproduct_poitou_charentes="";
							 $isproduct_bio="";
							 $isproduct_ccuffin_op="";
							 $isproduct_label_rouge="";
							if($packs->prod_poitou_charentes==2){
							$isproduct_poitou_charentes="Poitou charentes";
							}
							
							
							if($packs->prod_bio==2){
							$isproduct_bio="Bio";
							}
							
							
							if($packs->prod_label_rouge==2){
							$isproduct_label_rouge="Label Rouge";
							}
							
							if($isproduct_label_rouge or  $isproduct_bio or $isproduct_poitou_charentes ){
							$isproduct_ccuffin_op="(".$isproduct_label_rouge."  " .$isproduct_bio."  " .$isproduct_poitou_charentes.")";
							}
                           
					   ?>
					   
					   <div>- <?php echo $packs->product_name;  echo $isproduct_ccuffin_op;?> avec  poids du <?php echo $packs->prod_poids;?> KG </div>
					     <?php endforeach; ?>   
                            <?php  } ?>

							</td>
							
							<td class="sub_col"><?php echo (number_format(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price))  * $order_detail->product_quantity, 2, ',', ''))."  €" ;?> </td>
							<td class="sub_col"><?php echo $taxe_value;?> %</td>
							<td class="sub_col"><?php echo (number_format($order_detail->orders_detail_product_price * $order_detail->product_quantity, 2, ',', ''))."  €" ;?> </td>
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
							<td class="sub_col"  ><?php echo $totalPoids;?> KG  </td></td>
							</tr>
						  </tbody>
						</table>
						
			  
				</div>
  </div>
 
	   <div class="row"> 
	  <div class="col-md-12 infDelivery">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b> Livraison</b>
				
				  </h4></div>
				<div class=" message message_infDelivery"> </div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 control-label" style="    font-size: 15px!important;">De :   <?php  echo $orders->partener_city; ?> vers :  <?php  echo $orders->order_shipping_city;?> </label>
							<div class="col-md-2">
								
										
							</div>
						</div>
						
				</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-2 control-label">Poids Total</label>
							<div class="col-md-2">
								
										<input type="text" class="form-control " disabled name="" value="<?php echo $totalPoids ;?> KG" />
						
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">Prix de livraison  TTC </label>
							<div class="col-md-2">
								 <input type="text" class="form-control " disabled name="" value="<?php echo (number_format($orders->order_shipping_rate, 2, ',', ''))."  €" ;?>" />
						
							</div>
						</div>
						</div>
			
				
				
				
			
				
                </div>
                
              </div>
            </div> 
	</div>
	 
<div class="row"> 
	  <div class="col-md-12 payment">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b> Paiement</b>
				
				  </h4></div>
				  <div class="action_block"> 
    					
				</div>
					<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">Client </label>
							<div class="col-md-3">
								
								 <input type="text" class="form-control " disabled name="" value="<?php echo $orders->customer_firstname.'  '.$orders->customer_lastname;?>" />
						
							</div>
						</div>
						</div>
			 
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-2 control-label" style="top: 3px!important;">Statut de paiement</label>
							<div class="col-md-3">
								 <span  class="span-<?php  echo $orders->order_id;?> label <?php echo $label ?> " >  <?php echo $order_payment_status;?></span>  par   <?php echo $mode ?>  
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">Montant total TTC </label>
							<div class="col-md-3">
								
								 <input type="text" class="form-control " disabled name="" value="<?php echo (number_format($orders->order_amount, 2, ',', ''))."  €" ?>" />
						
							</div>
						</div>
						</div>
						
						<div class="row">
						<div class="form-group">
							<label  class="col-md-2 control-label">Référence de la transaction </label>
							<div class="col-md-3">
								
								 <input type="text" class="form-control " disabled name="" value="" />
						
							</div>
						</div>
						</div>
			 
				
			
				
                </div>
                
              </div>
            </div> 
	</div>



	 
	 
	 	 
<div class="row"> 
	  <div class="col-md-12 fournisseur">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs" style="display: inline-block; WIDTH: 50%;">
                  <div class="title_block"> <h4 class="widget-title"><b> Fournisseur</b>
				  <a href="#" class="updateInfoFournisseur btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
				<a href="#" class="okInfoFournisseur btn green btn-sm  btn-success hidden"><i class="glyphicon glyphicon-ok"></i></a>
				<a href="#" class="cancelInfoFournisseur btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>
				
				  </h4></div>
				 <div class=" message message_fournisseur"> </div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Fournisseur</label>
							<div class="col-md-6">
							
								<select  id="partener_id"  name="partener_id " class=" form-control btn-xs partener_id_p" disabled>
																						  
																							<?php foreach($partners_list as $partners) :?>
																											<option <?php  if($partners->partener_id==$orders->partener_id){ echo"selected";} ?> value="<?php echo $partners->partener_id;?>"> <?php echo $partners->partener_lastname;?></option>
																													 <?php endforeach; ?>
																												</select>
							
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label"  style="top: 3px!important;" >Ville fournisseur  </label>
							<div class="col-md-6">
								<span class="partener_city"><?php  echo $orders->partener_city; ?></span> 
								 
							</div>
						</div>
						</div>
			
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label">Statut Fournisseur</label>
							<div class="col-md-6">
							<select  id="order_partener_status"  name="order_partener_status " class=" form-control  order_partener_status_p btn-xs" disabled>
																<option  <?php  if($orders->order_partener_status==1){ echo"selected";} ?> value="1">Nouvelle demande</option>
																<option  <?php  if($orders->order_partener_status==2){ echo"selected";} ?> value="2">En cours de préparation </option>
																<option  <?php  if($orders->order_partener_status==3){ echo"selected";} ?> value="3">Livrée</option>
															  <option  <?php  if($orders->order_partener_status==4){ echo"selected";} ?> value="4">Refusée</option>
															

  															</select> 
															
							</div>
						<div class="col-md-1">
						<?php  if($orders->order_partener_status==4){ ?>
																<i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red; position: relative;
    top: 10px;
    font-size: 20px;"></i>
																	<?php  } ?>
						</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-4 control-label"> Paiement</label>
							<div class="col-md-6">
							<select  id="order_payment_status_partener"  name="order_payment_status_partener " class=" form-control  order_payment_status_partener_p btn-xs" disabled>
																<option  <?php  if($orders->order_payment_status_partener==1){ echo"selected";} ?> value="1">Non </option>
																<option  <?php  if($orders->order_payment_status_partener==2){ echo"selected";} ?> value="2">Oui </option>
																

  															</select> 
							</div>
						</div>
						</div>
				
                </div>
                 <div class="widget-heading " style="display: inline-block;WIDTH: 45%;">
				   <div class="title_block"> <h4 class="widget-title"><b> Historique de changement de fournisseur</b>
				
				  </h4></div>
				  
				  	 <div class="row"> 
	 
	 
	
		<div class="col-lg-12">
								 <table class="table info_table table-hover" id="accounts_table">
						  <thead>
						  
							<tr>
								<th class="sub_col" >Nouvelle  fournisseur  </th>
								<th class="sub_col" >ancien fournisseur</th>
								<th class="sub_col" >Utilisateur</th>
								<th class="sub_col" >Date de modification</th>
							
							 
							</tr>
						  </thead>
						  <tbody>
						  <?php foreach($log_orders_parteners as $log_parteners) :?>
						  <tr>
						  <td class="sub_col" ><?php  echo $log_parteners->new_partener_lastname; ?>  </td>
								<td class="sub_col" ><?php  echo $log_parteners->old_partener_lastname; ?></td>
								<td class="sub_col"> <?php  echo $log_parteners->account_user; ?></td>
								<td class="sub_col" ><?php echo date_fr($log_parteners->log_data_created);?>  <?php echo date_fr_heur($log_parteners->log_data_created);?></td>
							</tr>
							<?php endforeach; ?>
						  </tbody>
						   </table>
						    </div>
							 </div>
				  </div>
              </div>
            </div> 
	</div>
	 
	 
	 
	 
	 
 
	
	   <div class="row"> 
	  <div class="col-md-12 delivery">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b> Information de la livraison</b>
				<a href="#" class="updateInfoDelivery btn yellow btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></i></a>
				<a href="#" class="okInfoDelivery btn green btn-sm  btn-success hidden" data-id="<?php  echo $orders->order_id;?>" data-type="delivery"><i class="glyphicon glyphicon-ok"></i></a>
				<a href="#" class="cancelInfoDelivery btn red btn-sm  btn-danger hidden"><i class="glyphicon glyphicon-remove"></i></a>

				  
				  </h4></div>
				 <div class=" message message_delivery"> </div>
				 <form  role="form">
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-3 control-label">Livreur</label>
							<div class="col-md-3">
								<select  id="transporter_id"  name="transporter_id" class=" form-control btn-xs transporter_id_p" disabled>
																						  
																							<?php foreach($transporters_list as $transporters) :?>
																											<option <?php  if($transporters->transporter_id==$orders->transporter_id){ echo"selected";} ?> value="<?php echo $transporters->transporter_id;?>"> <?php echo $transporters->transporter_name;?></option>
																													 <?php endforeach; ?>
																												</select>
							</div>
						</div>
						
				</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Numéro de coli</label>
							<div class="col-md-3">
								<input type="text" class="form-control delivery_num_coli" disabled name="delivery_num_coli" value="<?php  echo $orders->delivery_num_coli;?>" />
							</div>
						</div>
						</div>
						<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Poids de coli</label>
							<div class="col-md-3">
								<input type="text" class="form-control poid_coli" disabled name="poid_coli" value="<?php  echo $orders->poid_coli;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Etat de livraison</label>
							<div class="col-md-3">
							<select  id="delivery_status"  name="delivery_status"  disabled class="form-control  btn-xs">
						<option value=""> Selectionnez statut ...</option>
				<?php foreach($status_livraison as $status) :?>
							<option <?php  if($status->status_id== $orders->delivery_status){ echo"selected";} ?> value="<?php echo $status->status_id;?>"> <?php echo $status->status_name;?></option>
							<?php endforeach; ?>
							</select>
							
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Tarif de livraison TTC </label>
							<div class="col-md-3">
								<input type="text" class="form-control delivery_price" disabled name="delivery_price" value="<?php  echo $orders->delivery_price;?>" />
							</div>
						</div>
						</div>
				<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Référence chez le Livreur</label>
							<div class="col-md-3">
								<input type="text" class="form-control delivery_referance" disabled name="delivery_referance" value="<?php  echo $orders->delivery_referance;?>" />
							</div>
						</div>
						</div>
						 <?php  if($orders->delivery_status==6 or $orders->delivery_status==9 ){ ?>
						
						<div class="row">
						<div class="form-group">
							<label  class="col-md-3 control-label">Date de sauvegarde: </label>
							<div class="col-md-3">
							<?php echo date_fr_dmy($orders->delivery_date_time);?> à <?php echo date_fr_heur($orders->delivery_date_time);?>
							</div>
						</div>
						</div>	
						<?php  }  ?>
						</form>
				
			
				
                </div>
                
              </div>
            </div> 
	</div>
	
	  
	  
	  
	
	 
	 
	 	  <div class="col-lg-12" style="margin-top: 20px;">
	    <div class="form-group">
				  
					
			 <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Commentaire  <a href="#" class="okInfoComments btn green btn-sm  btn-success"><i class="glyphicon glyphicon-ok"></i></a>
				
</label>
           <div class=" message message_order_comments"> </div>  

  <textarea name="order_comments" id="order_comments"><?php echo $orders->order_comments;?></textarea></div>
             
            </div></br>
         
          </div>
	    <input type="hidden" class="form-control" name="order_id" id="order_id" value="<?=$orders->order_id;?>">
		
	   
	   </div>
	   
	    	  <div class="col-lg-12" style="margin-top: 20px;">
	    <div class="form-group">
				  
					
			 <div class="row">
              <div class="col-lg-12">
                <label  for="F1">Commentaire à afficher chez le boucher   <a href="#" class="okInfoCommentsParteners btn green btn-sm  btn-success"><i class="glyphicon glyphicon-ok"></i></a>
				
</label>
           <div class=" message message_order_comments_parteners"> </div>  

  <textarea name="order_comments_parteners" id="order_comments_parteners"><?php echo $orders->order_comments_parteners;?></textarea></div>
             
            </div></br>
         
          </div>
	   
	   
	   </div>
	 <div class="row"> 
	  <div class="col-md-6 payment">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b> Synthèse financière </b>
				
				  </h4></div>
				  <div class="action_block"> 
    					
				</div>
					<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Fournisseur</label>
							<div class="col-md-6">
							
																			<?php foreach($partners_list as $partners) :?>
																							<?php  if($partners->partener_id==$orders->partener_id){ ?>  
																							
																													 <?php  } endforeach; ?>
																												
							</div>
						</div>
						
				</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Prix d'achat chez fournisseur TTC </label>
							<div class="col-md-3">
							<?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."  €" ?>
							</div>
						</div>
						
				</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Marge TTC</label>
							<div class="col-md-3">
							<?php echo (number_format($orders->order_total_marge, 2, ',', ''))."  €" ?>
							</div>
						</div>
						
				</div>
			<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Prix de vente  TTC</label>
							<div class="col-md-3">
							<?php echo (number_format($orders->order_products_prices, 2, ',', ''))."  €" ?>
							</div>
						</div>
						
				</div>
				
				
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Prix d'achat de livraison  TTC </label>
							<div class="col-md-3">
							<?php echo (number_format($orders->order_shipping_rate, 2, ',', ''))."  €" ?>
							</div>
						</div>
						
				</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Prix de vente livraison TTC </label>
							<div class="col-md-3">
							<?php echo (number_format($orders->order_shipping_rate, 2, ',', ''))."  €" ?>
							</div>
						</div>
						
				</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;">Ecart TTC </label>
							<div class="col-md-3">
							<?php echo (number_format($orders->order_shipping_rate-$orders->order_shipping_rate, 2, ',', ''))."  €" ?>
							</div>
						</div>
						
				</div>
                </div>
                
              </div>
            </div> 
			<div class="col-md-6 payment">
		
              <div class="widget portlet">
                <div class="widget-heading updateInputs">
                  <div class="title_block"> <h4 class="widget-title"><b> Commission globale</b>
				
				  </h4></div>
				  <div class="action_block"> 
    					
				</div>
				<div class="row ">
				  <div class="form-group">
							<label  class="col-md-4 control-label" style="top: 3px!important;"></label>
							<div class="col-md-4" style='font-size: 19px;
    font-weight: bold;
    color: red;'>
							<?php echo (number_format($orders->order_total_marge, 2, ',', ''))."  €" ?> TTC
							</div>
						</div>
						
				</div>
				
			
				
		
                </div>
                
              </div>
            </div> 
	</div>

</div></div></div></div>
<style>
.underline {text-decoration: underline;margin-right: 10px;}

.partener {
    width: 30%;
    display: inline-block;
    left: 23px;
    position: relative;
	}
	.update {
    left: 24px;
    position: relative;
	}
	.message {
		color: #68c12c;
		text-align: center;
		position: relative;
		top: -7px;
		font-weight: bold;
	}
	.form-control[disabled] {
    
  background-color:transparent!important;
   
    border: none!important;
	color: #000!important;
    OPACITY: 1!important;
}
.billing label,.shipment label,.delivery label ,.infDelivery label,.payment label ,.fournisseur label {
		font-weight: bold!important;
   font-size: 12px!important;
    position: relative!important;
    top: 9px!important;
	}
	.billing .portlet,.shipment .portlet,.delivery .portlet , .infDelivery .portlet, .payment .portlet , .fournisseur .portlet  {
		border-width: 2px!important;
		border-style: solid!important;
		border-color: #90EE90!important;
		padding: 10px;
	}
	
.billing	.row + .row , .shipment	.row + .row, .delivery	.row + .row, .infDelivery	.row + .row, .payment	.row + .row,.fournisseur .row + .row {
    margin-top: 6px;
}
	.billing .widget-title,.shipment .widget-title {
		
	
	}
	
	.action_block1 {
		width: 21%;
		display: inline-block;
	}
	.title_block1 {
		width: 72%;
		display: inline-block;;
	}
	
	.commande label {
			font-weight: bold!important;
			font-size: 12px!important;
			position: relative!important;
			top: 9px!important;
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

			
			$('.updateInfoStatus').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoStatus').removeClass('hidden');
			$('.okInfoStatus').removeClass('hidden');

			elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoStatus').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoStatus').removeClass('hidden');
			$('.okInfoStatus').addClass('hidden');
            
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});
		
			
		
		
			$(".okInfoStatus").click(function () {
			var elem = $(this);
			var order_id = $("#order_id").val();
			var order_status   = $("#order_status").val();
		    $(".message").hide(); 
			jQuery.ajax({
				url: "<?php echo base_url().'orders/updateOrderStatus/';?>",
				data: {order_id:order_id,order_status:order_status},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
				elem.addClass('hidden');
						$('.updateInfoStatus').removeClass('hidden');
						$('.okInfoStatus').addClass('hidden');
						$('.cancelInfoStatus').addClass('hidden');
						elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
						 jQuery('.message_order_status').text('Mise à jour réussie');
				        $(".message_order_status").show();
						
				
				}
			});
			});
			
			$('.updateInfoBilling').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoBilling').removeClass('hidden');
			$('.okInfoBilling').removeClass('hidden');

			elem.closest('.portlet').find('.updateInputs input').attr('disabled', false);
				elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoBilling').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoBilling').removeClass('hidden');
			$('.okInfoBilling').addClass('hidden');

			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});
		
		
		
		$('.updateInfoShipment').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoShipment').removeClass('hidden');
			$('.okInfoShipment').removeClass('hidden');

			elem.closest('.portlet').find('.updateInputs input').attr('disabled', false);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoShipment').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoShipment').removeClass('hidden');
			$('.okInfoShipment').addClass('hidden');

			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});
		$('.okInfoDelivery').click(function(e){
					$(".message_"+type).text('');
					var delivery_status   = $("#delivery_status").val();
			if( delivery_status==9 ) { 
			
			var delivery_price   = $(".delivery_price").val();
			var delivery_num_coli   = $(".delivery_num_coli").val();
			var type = $(this).attr('data-type');
			$(".message_"+type).text('');
			 
			 
				 if(delivery_price=="" || delivery_num_coli==""  ) { 
				$(".message_"+type).text('veuillez remplir le champs Numéro de coli et Tarif de livraison');
				$(".message_"+type).css('display','block');
				 } else {	
				 var elem = $(this);
			var currObj = {};
			var data = {
				datas: {},
				type : ''
			};
			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
	elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
			elem.closest('.portlet').find('form:eq(0) input').each(function(){
				currObj[this.name] = this.value;
				
			});
			elem.closest('.portlet').find('form:eq(0) select').each(function(){
				currObj[this.name] = this.value;
				
			});
            $(".message").text('');
			data.datas = currObj;
            data.order_id = $(this).attr('data-id');
			data.type = $(this).attr('data-type');
			$.ajax({
				url : "<?php echo base_url().'orders/updateOrderAddress/';?>",
				data : data,
				method : 'POST',
				dataType : 'json',
				success : function (data){
					
						elem.addClass('hidden');
						$('.updateInfoBilling').removeClass('hidden');
						$('.okInfoBilling').addClass('hidden');
						$('.cancelInfoBilling').addClass('hidden');

						$('.updateInfoShipment').removeClass('hidden');
						$('.okInfoShipment').addClass('hidden');
						$('.cancelInfoShipment').addClass('hidden');
						
						$('.updateInfoDelivery').removeClass('hidden');
						$('.okInfoDelivery').addClass('hidden');
						$('.cancelInfoDelivery').addClass('hidden');
                        $('.message_'+data.type).text('Mise à jour réussie');
						elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
  		               elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
	                     $(".message_"+data.type).css('display','block');
						 setTimeout(function(){ location.reload(true); }, 2000);
					
					
				}
			});
				 }
			 } else {
			var elem = $(this);
			var currObj = {};
			var data = {
				datas: {},
				type : ''
			};
			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);

			elem.closest('.portlet').find('form:eq(0) input').each(function(){
				currObj[this.name] = this.value;
				
			});
			elem.closest('.portlet').find('form:eq(0) select').each(function(){
				currObj[this.name] = this.value;
				
			});
            $(".message").text('');
			data.datas = currObj;
            data.order_id = $(this).attr('data-id');
			data.type = $(this).attr('data-type');
			$.ajax({
				url : "<?php echo base_url().'orders/updateOrderAddress/';?>",
				data : data,
				method : 'POST',
				dataType : 'json',
				success : function (data){
					
						elem.addClass('hidden');
						$('.updateInfoBilling').removeClass('hidden');
						$('.okInfoBilling').addClass('hidden');
						$('.cancelInfoBilling').addClass('hidden');

						$('.updateInfoShipment').removeClass('hidden');
						$('.okInfoShipment').addClass('hidden');
						$('.cancelInfoShipment').addClass('hidden');
						
						$('.updateInfoDelivery').removeClass('hidden');
						$('.okInfoDelivery').addClass('hidden');
						$('.cancelInfoDelivery').addClass('hidden');
                        $('.message_'+data.type).text('Mise à jour réussie');
						elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
  		               elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
	                     $(".message_"+data.type).css('display','block');
						 setTimeout(function(){ location.reload(true); }, 2000);
					
					
				}
			});
		}
		});
		
			
		$('.okInfoShipment, .okInfoBilling').click(function(e){
			var elem = $(this);
			var currObj = {};
			var data = {
				datas: {},
				type : ''
			};
			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);

			elem.closest('.portlet').find('form:eq(0) input').each(function(){
				currObj[this.name] = this.value;
				
			});
			elem.closest('.portlet').find('form:eq(0) select').each(function(){
				currObj[this.name] = this.value;
				
			});
            $(".message").text('');
			data.datas = currObj;
            data.order_id = $(this).attr('data-id');
			data.type = $(this).attr('data-type');
			$.ajax({
				url : "<?php echo base_url().'orders/updateOrderAddress/';?>",
				data : data,
				method : 'POST',
				dataType : 'json',
				success : function (data){
					
						elem.addClass('hidden');
						$('.updateInfoBilling').removeClass('hidden');
						$('.okInfoBilling').addClass('hidden');
						$('.cancelInfoBilling').addClass('hidden');

						$('.updateInfoShipment').removeClass('hidden');
						$('.okInfoShipment').addClass('hidden');
						$('.cancelInfoShipment').addClass('hidden');
						
						$('.updateInfoDelivery').removeClass('hidden');
						$('.okInfoDelivery').addClass('hidden');
						$('.cancelInfoDelivery').addClass('hidden');
                        $('.message_'+data.type).text('Mise à jour réussie');
						elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
  		               elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
	                     $(".message_"+data.type).css('display','block');
					
					
				}
			});
		});
		
		$('.updateInfoFournisseur').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoFournisseur').removeClass('hidden');
			$('.okInfoFournisseur').removeClass('hidden');
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
	 	 
			
		}); 
		$('.cancelInfoFournisseur').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoFournisseur').removeClass('hidden');
			$('.okInfoFournisseur').addClass('hidden');
           
			elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
		});
		
		 
		 $(".okInfoFournisseur").click(function () {
			var elem = $(this);
			var order_id = $("#order_id").val();
			var order_partener_status   = $("#order_partener_status").val();
			var order_payment_status_partener   = $("#order_payment_status_partener").val();
			var partener_id   = $("#partener_id").val();
		    $(".message").hide(); 
			jQuery.ajax({
				url: "<?php echo base_url().'orders/updateOrderPartener/';?>",
				data: {order_id:order_id,order_partener_status:order_partener_status ,partener_id:partener_id,order_payment_status_partener:order_payment_status_partener},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
				elem.addClass('hidden');
                $('.partener_city').text(data.partener_city);
				$('.updateInfoFournisseur').removeClass('hidden');
				$('.okInfoFournisseur').addClass('hidden');
				$('.cancelInfoFournisseur').addClass('hidden');
				elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
				$('.message_fournisseur').text('Mise à jour réussie');
				$(".message_fournisseur").show();
				setTimeout(function(){ location.reload(); }, 1000);
						
				}
			});
			});
			
		 $('.updateInfoDelivery').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.cancelInfoDelivery').removeClass('hidden');
			$('.okInfoDelivery').removeClass('hidden');
           elem.closest('.portlet').find('.updateInputs select').attr('disabled', false);
			elem.closest('.portlet').find('.updateInputs input').attr('disabled', false);
		});
		
		
		
		
		$('.cancelInfoDelivery').click(function(e){
			e.preventDefault();
			var elem = $(this);
			elem.addClass('hidden');
			$('.updateInfoDelivery').removeClass('hidden');
			$('.okInfoDelivery').addClass('hidden');
             elem.closest('.portlet').find('.updateInputs select').attr('disabled', true);
			elem.closest('.portlet').find('.updateInputs input').attr('disabled', true);
		});
		
		
			
	
			</script>
	 