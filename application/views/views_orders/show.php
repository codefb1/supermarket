  

      <div class="page-home">
                        <!-- breadcrumb -->  <div class="wrap-banner">

            <!-- breadcrumb -->
            <nav class="breadcrumb-bg">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                              <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
                            <li>
                                <a href="#" class="breadcrumb-home">
                                    <span> Mon Compte</span>
                                </a>
                            </li>
							<li>
                                <a href="#" class="breadcrumb-title">
                                    <span> Mes  adresses</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

        </div>

        <!-- main -->
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
				
                    <div class="container account">
				
				
					<div class="row list_orders text-center">
				
	

					  
                    
					  <div  class=" sidebar-3 menu_compte sidebar-collection col-xs-12 col-sm-3 col-md-3 col-lg-3" id="product-sidebar-left">
					 <div class="sidebar-block sidebar-compte">
                                           <div class="title-block"> Tableau de bord <hr/></div>
                                           <div class="block-content" style="background: #f7f8f9!important;">
									
                                               

											<div class="cateTitle hasSubCategory open level1 compte_border">
                                                    <div  class="arrow collapsed collapse-icons menu_compte_1 compte_menu_level" data-toggle="collapse" data-target="#menu_1" aria-expanded="false"  role="status">
                                                   <span>  Mes commandes</span>
                                                    </div>
                                             
                                                    <div class="subCategory collapse" id="menu_1" aria-expanded="true" role="status">
                                                       <div class="cateTitle menu_1_1 <?php if($menuLeft=='orders'){ echo'active'; } ?>">
                                                            <a href="<?php echo base_url().'orders/index/';?>" class="cateItem ">Commandes</a>
                                                        </div>
														 <div class="cateTitle menu_1_2 <?php if($menuLeft=='factures'){ echo'active'; } ?>">
                                                            <a href="" class="cateItem ">Factures et bon de livraison</a>
                                                        </div>
                                                   	 <div class="cateTitle menu_1_3 <?php if($menuLeft=='purchases'){ echo'active'; } ?>">
                                                            <a href="<?php echo base_url().'orders/purchases/';?>" class="cateItem">Liste des achats</a>
                                                        </div>
                                                     
                                                    </div>
													
                                                </div>
												 
												
                                              <div class="cateTitle hasSubCategory open level1 level11">
                                                    <div   class="arrow collapsed collapse-icons menu_compte_2 compte_menu_level_1" data-toggle="collapse" data-target="#menu_2" aria-expanded="false"  role="status">
                                                   <span>  Mes informations</span>
                                                    </div>
                                             
                                                    <div class="subCategory collapse" id="menu_2" aria-expanded="true" role="status">
                                                       <div class="cateTitle menu_2_1 <?php if($menuLeft=='information'){ echo'active'; } ?>" >
                                                            <a href="<?php echo base_url().'customer/information/';?>" class="cateItem  ">Informations du compte</a>
                                                        </div>
														 <div class="cateTitle menu_2_2 <?php if($menuLeft=='adresses'){ echo'active'; } ?>">
                                                            <a href="<?php echo base_url().'customer/adresses/';?>" class="cateItem ">Mes adresses</a>
                                                        </div>
                                                 
                                                     
                                                    </div>
													
                                                </div>
	                                             
										   
									                     
												                                               </div>
                                        </div>
					  </div>
					  <div  class="col-xs-12 col-sm-9 col-md-9 col-lg-9 onecol ">
					  <h2 class="text-center title-page">Détails de la commande N°  <?php  echo $orders->order_reference;?></h2>
					  <?php 
		if($orders->order_payment_method==1){$mode='Carte bancaire';}		 
		if($orders->order_payment_method==2){$mode='Ogone';}	
		if($orders->order_payment_method==3){$mode='Chèque';}
		if($orders->order_payment_method==0){$mode='Aucun';}	
		if($orders->order_payment_status==0){$label='label-danger';$order_payment_status='Abandon de panier';}			
		if($orders->order_payment_status==1){$label='label-warning';$order_payment_status='Paiement en attente';}
		if($orders->order_payment_status==2){$label='label-danger';$order_payment_status='Paiement refusé';}
		if($orders->order_payment_status==3){$label='label-success';$order_payment_status='Paiement accepté';}
		//if($orders->order_status==5){$label='label-danger';$order_payment_status='Commande annulée ';}
		//if($orders->order_status==4){$label='label-success';$order_payment_status='Commande expédiée';}
		//if($orders->order_status==3){$label='label-warning';$order_payment_status='Commande en préparation';}
		
		$taxe_value= $orders->taxe_value;
		$order_taxe_value= $taxe_value/100;
	   ?>
	     <div class="row  costumer_adress" style="text-align: left;
    padding-bottom: 10px;">
						      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  "> 
		<div> Crée le <?php echo date_fr($orders->order_data_created);?>  <?php echo date_fr_heur($orders->order_data_created);?>
		</div> 
	<div ><span  class="label <?php echo $label ?> " >  <?php echo $order_payment_status; ?></span>  par   <?php echo $mode ?> 
	 							 	</div> 
									<?php foreach($status_list as $status) :?>
									<?php  if($status->status_id==$orders->order_status){  ?>
										<div ><span  class="label  order_status " style="background-color: <?php echo $orders->status_color;?>; border-color: <?php echo $orders->status_color;?>;"> <?php echo $orders->status_name;?></span>  </div>
	 							 	<?php } endforeach; ?>
   
	</div> 
					      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  adress"> 
						  <div class="onecol">
<h2 class=" title-page">Adresse de facturation</h2>
<div><?php  echo $orders->order_billing_lastname.' '.$orders->order_billing_firstname;;?> 
							</div>
<div>	<?php  echo $orders->order_billing_street;?></div>
<div>	<?php  echo $orders->order_billing_city;?></div>
<div>	<?php  echo $orders->order_billing_zip;?></div>
<div>	<?php  echo $order_shipping_country->country_name;?></div>

<div><?php  echo $orders->order_billing_phone;?></div>


						  </div>
						   
						   </div>
					

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 adress"> 
						  <div class="onecol">
<h2 class=" title-page">Adresse de livraison</h2>
<div><?php  echo $orders->order_shipping_lastname.' '.$orders->order_shipping_firstname;;?> 
							</div>
<div>	<?php  echo $orders->order_shipping_street;?></div>
<div>	<?php  echo $orders->order_shipping_city;?></div>
<div>	<?php  echo $orders->order_shipping_zip;?></div>
<div>	<?php  echo $order_shipping_country->country_name;?></div>
<div><?php  echo $orders->order_shipping_phone;?></div>


						  </div>
						   
						   </div>


						   
						    </div>
	   
				
	    <div class="row"> 
	 
	 
	 <div class="col-lg-12"><h4 class="widget-title" style="text-align: left;"><b>Panier</b></h4></div>
		<div class="col-lg-12">
		  <div id="block-history" class="block-center">
                                       
								 <table class=" std table info_table table-hover" id="accounts_table">
						  <thead>
						  
							<tr>
								<th>Numéro</th>
								<th>Catégorie</th>
								<th>Quantité</th>
								<th >Produit</th>
								<!--<th class="sub_col" >Prix  HT</th>
								<th class="sub_col" >TVA</th>-->
								<th > Prix TTC</th>
								<th >Poids</th>
							 <th  ></th>
							</tr>
						  </thead>
						  <tbody >
						 
			 <?php $totalPoids=0;  $totalPriceHT=0; $totalPriceTTC=0; $i=1; foreach($orders_detail as $order_detail) : 

                    $totalPoids=$totalPoids+$order_detail->orders_detail_product_poids * $order_detail->product_quantity;
					$totalPriceTTC= $totalPriceTTC+$order_detail->orders_detail_product_price * $order_detail->product_quantity;
			        $totalPriceHT=$totalPriceHT+(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price))  * $order_detail->product_quantity);
			    
				
				       $product = $this->M_products->get_this_product($order_detail->product_id);
					    $isAddGrpoup =false;
					   $checkGrpoup = $this->M_customer_shopping->checkGrpoupShopping($order_detail->product_id,$this->session->userdata('customer_id'));
					   if($checkGrpoup){
						   $isAddGrpoup =true;
					   }
					   $assocation_country = "";
					   if($order_detail->association_id){ 
							 $assocation = $this->M_associations->get_this_assocation($order_detail->association_id);
							 
							 $assocation_country ="(".$assocation->country_name.")";
							 } 
			?>
						   <tr class="supp-<?php echo $order_detail->order_detail_id;?>">
							<td><?php echo $i;?> </td>
							<td><?php echo $product->categorie_name;?> </td>
							<td><?php echo $order_detail->product_quantity;?> </td>
							<td><?php echo $product->product_name;  echo $assocation_country;?> </td>
							
							<!--<td><?php echo (number_format(($order_detail->orders_detail_product_price-($order_taxe_value*$order_detail->orders_detail_product_price))  * $order_detail->product_quantity, 2, ',', ''))."  €" ;?> </td>
							<td><?php echo $taxe_value;?> %</td>-->
							<td><?php echo (number_format($order_detail->orders_detail_product_price * $order_detail->product_quantity, 2, ',', ''))."  euro" ;?> </td>
							<td><?php echo $order_detail->orders_detail_product_poids * $order_detail->product_quantity;?>  KG</td>
							<td>
							<?php  if(!$isAddGrpoup){ ?>
						  
							<button type="button" data-id="<?php echo $order_detail->order_detail_id;?>" data-product="<?php echo $order_detail->product_id;?>"  data-name="<?php echo $order_detail->product_name;?>" class="btn btn-shadow btn-primary add_list_achat" style="font-size: 9px!important;padding: 5px;margin: 0px;">Ajouter aux liste des achats</button></td>
                           <?php } ?>
							</tr>
						<?php $i++; endforeach; ?>
						<tr class="supp-">
							<td  style="border: none;"> </td>
							<td style="border: none;"> </td>
							<td style="border: none;"> </td>
							<td style="background-color: #f7f8f9!important;border-color: #f7f8f9!important;border: none;text-align: right!important;font-weight: bold;">Total TTC </td>
							
							<!--<td><?php echo (number_format($totalPriceHT, 2, ',', ''))."  euro" ;?> </td>
							<td><?php echo $taxe_value;?> % </td>-->
							<td><?php echo (number_format($totalPriceTTC, 2, ',', ''))."  euro" ;?> </td>
							<td ><?php echo $totalPoids;?> KG  </td>
							<td></td>
							</tr>
							
							<tr class="supp-">
							<td  style="border: none;"> </td>
							<td style="border: none;"> </td>
							<td style="border: none;"> </td>
							<td style="background-color: #f7f8f9!important;border-color: #f7f8f9!important;border: none;text-align: right!important;font-weight: bold;">Frais de livraison TTC</td>
							
							<td><?php echo (number_format($orders->order_shipping_rate, 2, ',', ''))."  euro" ;?> </td>
							<td ></td>
							</tr>
							
							<tr class="supp-">
							<td  style="border: none;"> </td>
							<td style="border: none;"> </td>
							<td style="border: none;"> </td>
							<td style="background-color: #f7f8f9!important;border-color: #f7f8f9!important;border: none;text-align: right!important;font-weight: bold;">Montant à payer TTC </td>
							
							<td><?php echo (number_format($orders->order_amount, 2, ',', ''))."  euro" ;?> </td>
							<td ></td>
							</tr>
						
						  </tbody>
						</table>
						
			  </div>
				</div>
  </div>
					</div>

					</div>
					  </div>
					   </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	<div aria-hidden="true" aria-labelledby="myModalAchat" role="dialog" tabindex="-1" id="myModalAchat" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
				<h4 class="modal-title" style="font-size: 18px;"> Ajouter  <span class="product_name" id="product_name"style="color:#a71d1a;"></span> aux liste des achats</h4>
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					
				</div>
				<div class="modal-body">
					<div class="alert alert-success" id="isSaveGroup" role="alert" style="display:none;">Produit enregistré avec succès </div>	<div>	</div>
								
					 <div class="form-group group">
										 <div  class="row">
								<label class="labels col-sm-3" style="position: relative;top: 9px;">Groupe</label>
								<div  class="col-sm-7" >
										<select  id="customer_shopping_id"   required name="customer_shopping_id" class="form-control  btn-xs">
												<option value="">Selectionner groupe</option>
												<?php foreach($list_group_shipping as $group_shipping) :?>
												<option value="<?php echo $group_shipping->customer_shopping_id;?>"><?php echo $group_shipping->customer_shopping_name;?></option>
												<?php endforeach; ?>
												</select>
																												
									 </div> </div> </div>
				</div>
				<div class="modal-footer">
				<button style="color: #fff;" class="newGroup btn btn-warning btn-small " type="button" >Nouveau groupe</button>
					<button  data-url="" class="saveProduct btn btn-success btn-small" type="button" >Valider</button>
					<input type="hidden" class="order_detail_id"  id="order_detail_id">
					
					<button class="btn btn-danger" type="button" data-dismiss="modal"> Quitter</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<div aria-hidden="true" aria-labelledby="myModalNewGroup" role="dialog" tabindex="-1" id="myModalNewGroup" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
				<h4 class="modal-title">Ajouter Nouveau groupe</h4>
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					
				</div>
				<div class="modal-body">
					
					 <div class="form-group group">
										 <div  class="row">
								<label class="labels col-sm-3" style="">Nom</label>
								<div  class="col-sm-6" >
											<input type="text" class="form-control customer_shopping_name"  name="customer_shopping_name" value="" />
							
																												
									 </div> </div> </div>
				</div>
				<div class="modal-footer">
					<button  data-url="" class="saveGroup btn btn-success btn-small" type="button" >Valider</button>
					
					<button class="btn btn-danger" type="button" data-dismiss="modal"> Quitter</button>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<script type="text/javascript">


</script>