

<div class="col-sm-6">
  <h1 class="page_title">Produits</h1>
  <p class="text-muted">Liste des produits</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'products';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>
  <button class="btn btn-shadow btn-primary promotions" type="button"><i class=" glyphicon"></i> Promotions</button>

    <a href="<?php echo base_url().'products/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouveau produit</span></button></a>
  </div>
</div>

<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	   <div class="row">
	      <form method="GET" action="<?=base_url().'products/index/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	 <div class="form-group">
			
			

			  <div class="row">

			<div class="col-lg-2">
			<label>Rechecher par :</label>
			<input name="keyword" id="keyword" type="text"  class="form-control" placeholder="  Référence ,Nom" value="<?php echo $keyword;?>">
			</div>
			
			

              <div class="col-lg-2">
                <label  for="F1">Catégories </label>
              <select  id="categorie_id"  name="categorie_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez une catégorie...</option>
				
			    <?php foreach($categories_list as $categorie) :?>
										<option <?php  if($categorieId==$categorie->categorie_id){ echo"selected";} ?> value="<?php echo $categorie->categorie_id;?>"> <?php echo $categorie->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
									
									 <div class="col-lg-2">
                <label  for="F1">Fournisseurs </label>
              <select  id="partener_id"  name="partener_id" class="form-control  btn-xs">
			  <option value=""> Selectionnez un fournisseur...</option>
				
			    <?php foreach($parteners_list as $partener) :?>
										<option <?php  if($partenerId==$partener->partener_id){ echo"selected";} ?> value="<?php echo $partener->partener_id;?>"> <?php echo $partener->partener_lastname;?></option>
										 <?php endforeach; ?>
									</select> </div>
									 <div class="col-lg-2">
                <label  for="F1">Etat </label>
              			<select id="product_stock" name="product_stock" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
				<option value="1" <?php  if($productStock==1){ echo"selected";} ?>> En stock</option>
				<option value="2" <?php  if($productStock==2){ echo"selected";} ?> > Non stock</option>
				<option value="3" <?php  if($productStock==3){ echo"selected";} ?>> Rupture de stock</option>
					</select> </div>
						 <div class="col-lg-2">
                <label  for="F1">En promotion </label>
              <select  id="product_is_promo"  name="product_is_promo" class="form-control  btn-xs">
			  <option value=""> Selectionnez...</option>
			<option <?php  if($productIsPromo==1){ echo"selected";} ?> value="1"> Non</option>
			<option <?php  if($productIsPromo==2){ echo"selected";} ?> value="2"> Oui</option>
												 
									</select> </div>
										 <div class="col-lg-2">
                <label  for="F1">Mode d'affichage </label>
              <select  id="modeShowProduct"  name="modeShowProduct" class="form-control  btn-xs">
			  <option value=""> Selectionnez mode...</option>
			<option <?php  if($modeShowProduct==1){ echo"selected";} ?> value="1"> Liste</option>
			<option <?php  if($modeShowProduct==2){ echo"selected";} ?> value="2"> Grille</option>
												 
									</select> </div>
									
             
            </div>
			 
		

			<div class="col-lg-12" style="    text-align: center; padding-bottom: 15px;padding-top: 15px;">
			<button type="submit"  class="btn btn-w-md btn-accent">Rechecher</button> 
			<a href="<?php echo base_url()."products/index/?exports=1"?>" class="btn btn-w-md btn-success hidden">Exporter en XLS</a>
			<a href="<?=base_url();?>products/index/?filtercheck=1&keyword=N&partener_id=N&categorie_id=N&modeShowProduct=1&product_stock=N" class="btn btn-w-md btn-danger">Réinitialiser la rechecher</a>
		</div></div>
		
	</form></div>
       
		 <?php if($modeShowProduct==1){ ?>
		  <div class="panel panel-default">
         
		 
						   <div class="table-responsive">
            <table class="table info_table table-hover" id="news_table">
              <thead>
              
                <tr>
				<th class="sub_col"></th>
				<th class="sub_col"></th>
				<th class="sub_col">Référence</th>
				 <th class="sub_col"  style="width: 5%;">Photo</th>
            	  <th class="sub_col"  style="width: 10%;">Nom</th>
				  <th class="sub_col">Catégorie</th>
				  <th class="sub_col">Sous catégorie</th>
				   <th class="sub_col">Poids</th>
				    <th class="sub_col">Afficher poids</th>
				  <th class="sub_col hidden">Prix</th>
				   <th class="sub_col">Prix d'achat</th>
				     <th class="sub_col">Historique </th>
				   	   <th class="sub_col">Marge</th>
				   <th class="sub_col">Prix de vente</th>
				 
                      <th class="sub_col">Photos</th>	
                       <th class="sub_col" >Stock</th>
                     <th class="sub_col">Afficher page d'accuiel</th>	
                   <th class="sub_col">Afficher option</th>						 
				     <th class="sub_col" >Statut</th>
                  <th class="sub_col" >Actions</th>
                  
                </tr>
              </thead>
              <?php foreach($products_list as $products) :
			  
					if($products->product_data_status==1){$label='label-success';$status='Activer';}
					if($products->product_data_status==2){$label='label-warning';$status='Rupture de stock';}
					if($products->product_data_status==0){$label='label-danger';$status='Désactiver';}
					if($products->show_poids==1){$class_show_poids="label-success";$show_poids="Oui";}
					if($products->show_poids==0){$class_show_poids=" label-danger";$show_poids='Non';}
					if($products->product_show_home==1){$class_show_home="label-success";$show_home="Oui";}
					if($products->product_show_home==0){$class_show_home=" label-danger";$show_home='Non';}
					
					if($products->show_option==1){$class_show_option="label-success";$show_option="Oui";}
					if($products->show_option==0){$class_show_option=" label-danger";$show_option='Non';}
					
					$sub_categorie ="";
					if($products->sub_categorie_id){$sub_categorie = $this->M_categories->get_this($products->sub_categorie_id);$sub_categorie =$sub_categorie->categorie_name;}
					$image =$this->M_products_pictures->get_one_product_picture_cover($products->product_id);
					$path ="";
					if($image){
					$path =base_url().'medias/products/'.$image->product_pictures;
					}
					$price_buying ="";
                     $partener_name ="";
					$prices_buying =$this->M_products->get_prix_product_parteners($products->product_id);
                        if($products->product_affected_partener){
							$partner = $this->M_partners->get_this($products->product_affected_partener,null);
							 $partener_name =$partner->partener_lastname;
                           }
					if($products->product_stock==1){$product_stock="En stock";}
					if($products->product_stock==2){$product_stock="Non stock";}
					if($products->product_stock==3){$product_stock="Rupture de stock";}

						?>
						
						
               <tr class="supp-<?php  echo $products->product_id;?>">
			  <td class="sub_col" >  <input name="checkbox"  class="ckeckProduct" value="<?php  echo $products->product_id;?>" type="checkbox" /></td>	
			   
 <td class="sub_col" > 
			    <?php if($products->product_entier){ ?> <img src="<?php echo base_url().'template/';?>images/sheep-head.png" alt="Produit entier" style="margin: 2px;" title="Produit entier"><?php } ?>
			  
			  
			  
			    <?php if($products->product_is_promo==2){ ?><img src="<?php echo base_url().'template/';?>images/promo.png" alt="Produit en promotion" title="Produit en promotion" style="width: 16px;margin: 2px;"> <?php } ?>
			     <?php if($products->product_best_seller==2){ ?><img src="<?php echo base_url().'template/';?>images/best.png" alt="Meilleurs Vente" title="Meilleurs Vente" style="margin: 2px;"> <?php } ?>
			    <?php if($products->product_entier_association){ ?><img src="<?php echo base_url().'template/';?>images/association.jpg" alt="Associations" title="Associations" style="margin: 2px;width: 16px;"> <?php } ?>
			   
			    
			  
			   
			   
			   </td>			   
			   	 <td class="sub_col" > <span class="position_text"> <?php echo $products->product_id;?> </span> </td>
				 
						<td class="sub_col" > <span class="position_text"> 
						<?php if($path){ $path =base_url().'medias/products/'.$image->product_pictures; ?>
						<img data-dz-thumbnail=""  alt="avatar" id="block-image-banners" src="<?php echo $path; ?>" class="img-responsive">
						
						<?php } ?>
							
						
						</span> </td>
							
						<td class="sub_col" > 				  <a href="<?php echo base_url().'products/edit/0/'.$products->product_id;?>"> <span class="position_text"> <?php echo $products->product_name;?> </span></a> </td>
						<td class="sub_col" > <span class="position_text" > <?php echo $products->categorie_name;?> </span> </td>
						<td class="sub_col" > <span class="position_text"> <?php echo $sub_categorie;?> </span> </td>
											
						<td class="sub_col" > <span class="position_text"> <?php echo $products->product_poids;?> kg </span> </td>
						
                    <td class="sub_col" ><?php if($products->product_poids>0){ ?>
						 <span class="position_text" >  <i><a href="javascript:void(0);" data-id=<?php echo $products->product_id;?>  data-status=<?php echo $products->show_poids;?> class="poid_<?php echo $products->product_id;?> show_poid glyphicon <?php echo $class_show_poids;?>"></a></i></span>
					<div><select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="show_poids btn-xs">
										<option <?php  if($products->show_poids==0){ echo"selected";} ?> value="0">Non</option>
										<option <?php  if($products->show_poids==1){ echo"selected";} ?> value="1">Oui</option>
									</select></div>
									<div ><span  class="position_text show_poids-<?php  echo $products->product_id;?> label <?php echo $class_show_poids;?>"><?php echo $show_poids;?></span></div>

					<?php } ?>    </td>
												
			    				<td class="sub_col hidden" > 
								<span class="position_text"  >  <?php echo (number_format($products->product_price, 2, ',', ''))."  €" ?>  </span> 
								
							      
								</td>
						<td class="sub_col" >
						
						<?php echo (number_format($products->product_price, 2, ',', ''))."  €" ?>
						<div><?php echo  $partener_name ?></div>
						<?php if($prices_buying){  ?>
						</br> <a  data-id="<?php  echo $products->product_id;?>" class="show_partener"  ><button type="button" class="btn btn-primary"><i class=" glyphicon glyphicon-eye-open"></i></button></a>
							 
						<?php } ?>
						   
						</td>
						 <td class="sub_col" >  
						 <?php if($products->product_entier_association==0){  ?>
<a href="#" class="historiquePrice  historiquePrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-warning" data-product=<?php  echo $products->product_id;?> ><i class="glyphicon glyphicon-euro"></i></a>
    						<?php } ?></td>
				   </td>
								<td class="sub_col" > <span class="position_text"  >  <?php echo (number_format($products->product_price_marge_percente, 2, ',', ''))." %" ?>  </span> </td>
						
								<td class="sub_col" > 
								<span class="position_text"  <?php if($products->product_is_promo==2){ ?> style="text-decoration: line-through;top: 0px!important;" <?php } ?> >  <?php echo (number_format($products->product_price_selling, 2, ',', ''))."  €" ?>  </span>

<?php if($products->product_is_promo==2){ ?></br><span style="color: #a71d1a !important;"><?php echo (number_format($products->product_price_dicount, 2, ',', ''))."  €" ?></span>	 <?php } ?> 							</td>
						
				  
					<td class="sub_col" >  <a href="<?php echo base_url().'productspictures/listpictures/'.$products->product_id;?>" class="btn btn-warning " type="button"><i class="glyphicon glyphicon-picture"></i></a>
				  	  </td>
					<td class="sub_col" > <span class="position_text"> <?php echo $product_stock;?> </span> </td>
					     <td class="sub_col" >
						 <span class="position_text" >  <i><a href="javascript:void(0);" data-id=<?php echo $products->product_id;?>  data-home=<?php echo $products->product_show_home;?> class="home_<?php echo $products->product_id;?> show_home glyphicon <?php echo $class_show_home;?>"></a></i></span>
					<div><select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="show_home btn-xs">
										<option <?php  if($products->product_show_home==0){ echo"selected";} ?> value="0">Non</option>
										<option <?php  if($products->product_show_home==1){ echo"selected";} ?> value="1">Oui</option>
									</select></div>
									<div ><span  class="position_text show_home-<?php  echo $products->product_id;?> label <?php echo $class_show_home;?>"><?php echo $show_home;?></span></div>

					  </td>
					  
					    <td class="sub_col" >
						 <span class="position_text" >  <i><a href="javascript:void(0);" data-id=<?php echo $products->product_id;?>  data-home=<?php echo $products->show_option;?> class="home_<?php echo $products->product_id;?> show_home glyphicon <?php echo $class_show_home;?>"></a></i></span>
					<div><select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="show_option btn-xs">
										<option <?php  if($products->show_option==0){ echo"selected";} ?> value="0">Non</option>
										<option <?php  if($products->show_option==1){ echo"selected";} ?> value="1">Oui</option>
									</select></div>
									<div ><span  class="position_text show_option-<?php  echo $products->product_id;?> label <?php echo $class_show_option;?>"><?php echo $show_option;?></span></div>

					  </td>
						<td class="sub_col" ><span  class=" position_text span-<?php  echo $products->product_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			          
                 <td class="sub_col">
				
				<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $products->product_id;?>" name="ddlCreditCardTypeTab" class="changesatus btn-xs">
										<option <?php  if($products->product_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
										<option <?php  if($products->product_data_status==1){ echo"selected";} ?> value="1">Activer</option>
									</select>
									</div>
				  <a href="<?php echo base_url().'products/edit/0/'.$products->product_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
								<?php if(!$products->product_affected_partener){ ?>
							<a  data-id="<?php  echo $products->product_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							<?php } ?>
						
							<a title="Duplique" href="<?php echo base_url().'products/duplique/'.$products->product_id;?>"><button type="button" class="btn btn-shadow btn-primary"><i class="glyphicon glyphicon-plus"></i></button></a>
							
				
				  
				  </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div></div>
						<?php }else {  ?>
							<div class="row product_grille " >
						<?php	foreach($products_list as $products) :
			  
					if($products->product_data_status==1){$label='label-success';$status='Activer';}
					if($products->product_data_status==2){$label='label-warning';$status='Rupture de stock';}
					if($products->product_data_status==0){$label='label-danger';$status='Désactiver';}
					if($products->show_poids==1){$class_show_poids="label-success";$show_poids="Oui";}
					if($products->show_poids==0){$class_show_poids=" label-danger";$show_poids='Non';}
					$sub_categorie ="";
					if($products->sub_categorie_id){$sub_categorie = $this->M_categories->get_this($products->sub_categorie_id);$sub_categorie =$sub_categorie->categorie_name;}
					$image =$this->M_products_pictures->get_one_product_picture_cover($products->product_id);
					$path ="";
					if($image){
					$path =base_url().'medias/products/'.$image->product_pictures;
					}
					$price_buying ="";

					$prices_buying =$this->M_products->get_prix_product_parteners($products->product_id);

					if($products->product_stock==1){$product_stock="En stock";}
					if($products->product_stock==2){$product_stock="Non stock";}
					if($products->product_stock==3){$product_stock="Rupture de stock";}
                            ?>
							 
							<div class="col-lg-3 col-sm-3 col-md-3">
							  <div class="">
							  <a href="<?php echo base_url().'products/edit/0/'.$products->product_id;?>"> 
						          
						      <img data-dz-thumbnail="" src="<?php echo $path; ?>" class="img-responsive product_grille_img  <?php if(count($prices_buying)<1){  ?> product_grille_stock  <?php } ?>">
						                  
                      </a>
							  </div>
							  <div class="product_grille_name">
                            <a href="<?php echo base_url().'products/edit/0/'.$products->product_id;?>"> <span class=""> <?php echo $products->product_name;?> </span></a>
						            </div>
							  <div class="product_grille_price">
                                  <span > <?php echo (number_format($products->product_price_selling, 2, ',', ''))." </span> euro/Kg" ?> 
                             <a href="#" class="historiquePrice  historiquePrice_<?php  echo $products->product_id;?> btn green btn-sm  btn-warning" data-product=<?php  echo $products->product_id;?>   ><i class="glyphicon glyphicon-euro"></i></a>
    					
							 </div>
							  <div class="">
							 
							  <?php if($prices_buying){  ?>
						
					<span class="product_fornisseur">	(<?php echo count($prices_buying);?>) fourniseur</span>
						
						<?php }  else { ?>
                                <span class="product_not_fornisseur">  Aucun  fourniseur Trouvé</span>
								

								<?php } ?>
								
								
                              </div>
							  <div style="height: 20px;">
							   <?php if($products->product_stock==3){  ?>
						
					
                                <span class="product_not_fornisseur">Rupture de stock</span>
								

								<?php } ?> </div>
                         </div>
							
							
						 <?php endforeach; }	 ?>
						</div>						
       
          
		     <div style="text-align:right;margin-bottom:10px;">
   <?=$pagination;?>
  
  </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
	<div aria-hidden="true" aria-labelledby="parteners" role="dialog" tabindex="-1" id="parteners" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Liste des partenaires de  <span class="product_name"></span></h4>
				</div>
				<div class="modal-body">
					
					
					 <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
            
				  <th class="sub_col" >Nom</th>
				     <th class="sub_col">Prix d'achat (€)</th>
                 
                </tr>
              </thead>
			  <tbody class="list_products">
			  
 

            
			  </tbody>
            </table>
			
				</div>
				  <div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
				</div>
				
			</div>
		</div>
	</div>
		<div aria-hidden="true" aria-labelledby="historiques" role="dialog" tabindex="-1" id="historiques" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Historiques du prix:  <span class="product_name_historique"></span></h4>
				</div>
				<div class="modal-body">
					
					
					 <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
                    
				 
				  <th class="sub_col" >Par</th>
				 <th class="sub_col" >Type de compte</th>
				  <th class="sub_col" >Nouveau Prix (€)</th>
				  <th class="sub_col" >Ancien Prix (€)</th>
				  <th class="sub_col">Date de modification</th>
                 
                </tr>
              </thead>
			  <tbody class="list_historiques">
			  
 

            
			  </tbody>
            </table>
			
				</div>
				  <div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
				</div>
				
			</div>
		</div>
	<div aria-hidden="true" aria-labelledby="myModalConfirm" role="dialog" tabindex="-1" id="myModalConfirm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Confirmation de suppression</h4>
				</div>
				<div class="modal-body">
					
					<div class="alert alert-warning">                
						Confirmez vous cette opération ? 
					</div>
				</div>
				<div class="modal-footer">
					<a  data-url="" class="suppconfirm btn btn-success btn-small" type="button" > <i class="fa fa-check"></i> Confirmer</a>
					<input type="hidden" class="url"  id="url">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
			</div>
		</div>
	</div>
		<div aria-hidden="true" aria-labelledby="myModalPromo" role="dialog" tabindex="-1" id="myModalPromo" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Promotions</h4>
				</div>
				<div class="modal-body">
					
					               
					
										<div class="alert alert-danger alert-message alert-danger" style="display:none;text-align: center;" role="alert">
												 Champ  promotion Obligatoire
												</div> 
									<div class="alert alert-success alert-message alert-success" style="display:none;text-align: center;" role="alert">
												 Mise à jour avec succès
												</div> 
												<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">En promotion</label>
							<div class="col-md-7">
				                            <select  id="products_is_promo"  name="products_is_promo" class="form-control  btn-xs products_is_promo">
			  <option value=""> Selectionnez...</option>
			<option value="1"> Non</option>
			<option  value="2"> Oui</option>
												 
									</select>
							</div>
						</div>
						</div>
									<div class="row">
						<div class="form-group">
							<label  class="col-md-5 control-label">Marge (%) </label>
							<div class="col-md-7">
				               <input id="product_price_marge_percente_dicount" class="form-control product_price_marge_percente_dicount" type="text"   name="product_price_marge_percente_dicount" value="" >
             
							</div>
						</div>
						</div>
					
				</div>
				<div class="modal-footer">
					<a  data-url="" class=" btn btn-success btn-small saveSolde" type="button" > <i class="fa fa-check"></i> Valider</a>
					<input type="hidden" class="productsPromo"  id="productsPromo">
					
					
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">

$(document).ready(function () {
 $(".modalconfirm").click(function () {
		var product_id=$(this).attr('data-id');
		jQuery('.url').val(product_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	 $(".show_poid").click(function () {
		var product_id=$(this).attr('data-id');
		var show_poids=$(this).attr('data-status');
		var	show_poid=1;
		if(show_poids ==1) {
		var	show_poid=0;
	     }
	jQuery.ajax({
				url: "<?php echo base_url().'products/showPoids/';?>",
				data: {product_id:product_id,show_poids:show_poid},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.show_poids ==0) {
						$('.poid_'+product_id).removeClass('inbox-started');	
						$('.poid_'+product_id).attr('data-status',0);
						} 
						else 
						{
						$('.poid_'+product_id).addClass('inbox-started');	
						$('.poid_'+product_id).attr('data-status',1);
						}
				}
			});
		
	});
	
		$(".suppconfirm").click(function () {
			var product_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'products/delete/';?>",
				data: {product_id:product_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+product_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/updatestatus/';?>",
				data: {product_id:product_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+product_id).empty();

						if(idsatus == 1){$( '.span-'+product_id ).removeClass( "label-danger label-warning" );$( '.span-'+product_id ).addClass( "label-success" );$('.span-'+product_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+product_id ).removeClass( "label-success label-warning" );$( '.span-'+product_id ).addClass( "label-danger" );$('.span-'+product_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
			$( ".show_poids" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/show_poids/';?>",
				data: {product_id:product_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
						//	$('.msg').show(0).delay(7000).hide(200);
						});					
						//$('html, body').animate({scrollTop:0}, 'slow');
						//$('.show_poids-'+product_id).empty();

						if(idsatus == 1){$( '.show_poids-'+product_id ).removeClass( "label-danger label-warning" );$( '.show_poids-'+product_id ).addClass( "label-success" );$('.show_poids-'+product_id).html('Oui'); }
						if(idsatus == 0){$( '.show_poids-'+product_id ).removeClass( "label-success label-warning" );$( '.show_poids-'+product_id ).addClass( "label-danger" );$('.show_poids-'+product_id).html('Non'); }
						
						
						
						} 
				}    
			});
		});
		
		
			$( ".show_home" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/show_home/';?>",
				data: {product_id:product_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
						//	$('.msg').show(0).delay(7000).hide(200);
						});					
						//$('html, body').animate({scrollTop:0}, 'slow');
						//$('.show_poids-'+product_id).empty();

						if(idsatus == 1){$( '.show_home-'+product_id ).removeClass( "label-danger label-warning" );$( '.show_home-'+product_id ).addClass( "label-success" );$('.show_home-'+product_id).html('Oui'); }
						if(idsatus == 0){$( '.show_home-'+product_id ).removeClass( "label-success label-warning" );$( '.show_home-'+product_id ).addClass( "label-danger" );$('.show_home-'+product_id).html('Non'); }
						
						
						
						} 
				}    
			});
		});
		
				$( ".show_option" ).change(function() {
			var idsatus= $(this).val();
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/show_option/';?>",
				data: {product_id:product_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
					
						if(idsatus == 1){$( '.show_option-'+product_id ).removeClass( "label-danger label-warning" );$( '.show_option-'+product_id ).addClass( "label-success" );$('.show_option-'+product_id).html('Oui'); }
						if(idsatus == 0){$( '.show_option-'+product_id ).removeClass( "label-success label-warning" );$( '.show_option-'+product_id ).addClass( "label-danger" );$('.show_option-'+product_id).html('Non'); }
						
						
						
						} 
				}    
			});
		});
		$(".show_partener").click(function () {
			var product_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'products/getPartener/';?>",
				data: {product_id:product_id},
				dataType: "json",
				type: "POST",  
				success: function(data) {
					$('.product_name').text(data.product_name);
					jQuery('.list_products').html('');
				for(product in data.products){ 
				$( ".list_products" ).append('<tr class=""> <td class="sub_col">'+data.products[product].partener_lastname+'</td><td class="sub_col">'+data.products[product].price_buying+'</td></tr>' );	
				}
					jQuery('#parteners').modal('show');
				}
			});
			
		});
		
			$('.historiquePrice').click(function(e){
			e.preventDefault();
			var product_id = $(this).attr('data-product');
			var partener_id="";
			var type='Boucherie';
			var product_partener_id=$(this).attr('data-product-partener');
			$.ajax({
				url : "<?php echo base_url().'productspartners/getLogProductPartenerPrice/';?>",
				data :  {product_id:product_id,partener_id:partener_id,type:type},
				method : 'POST',
				dataType : 'json',
				success : function (data){
								$('.product_name_historique').text(data.product_name);
					jQuery('.list_historiques').html('');
				for(product in data.logProductPartenerPrice){ 
					$( ".list_historiques" ).append('<tr class=""> <td class="sub_col">'+data.logProductPartenerPrice[product].user_name+'</td> <td class="sub_col">'+data.logProductPartenerPrice[product].type+'</td> <td class="sub_col">'+data.logProductPartenerPrice[product].new_price_buying+'</td><td class="sub_col">'+data.logProductPartenerPrice[product].old_price_buying+'</td><td class="sub_col">'+data.logProductPartenerPrice[product].log_data_created+'</td></tr>' );	
			
				}
					jQuery('#historiques').modal('show');
				}	
				
			});
		});


		 $(".promotions").click(function () {
			  $('.alert-message').css('display','none');
		var products = [];
		$(".ckeckProduct").each(function() {
    if ($(this).is(':checked')) {
		products.push($(this).val());
    }
	}); 
	if(products.length > 0 ){
		jQuery('.productsPromo').val(products);
		jQuery('#myModalPromo').modal('show');
	}else {
		alert('aucune produit selectioner');
	}
		
	
	});
	 $(".saveSolde").click(function () {
		var productsId = $('.productsPromo').val();
		var product_is_promo = $('.products_is_promo').val();
		var product_price_marge_percente_dicount = $('.product_price_marge_percente_dicount').val();
		
	if(!product_is_promo){
		$('.alert-danger').css('display','block');
	}else {
		jQuery.ajax({
				url: "<?php echo base_url().'products/solde/';?>",
				data: {productsId:productsId,product_is_promo:product_is_promo,product_price_marge_percente_dicount:product_price_marge_percente_dicount},
				dataType: "json",
				type: "POST",  
				success: function(data) {
				$('.alert-success').css('display','block');
				setTimeout(function(){ location.reload(true); }, 2000);
				}
			});
		
	
		
	
	
     }
   });		
});
	
</script>