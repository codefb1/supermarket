  

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
					  <h2 class="text-center title-page">Historique des commandes</h2>
					  
					   <div class="row block_orders_search">
	   <form method="GET" action="<?=base_url().'orders/index/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	  <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">
		 <div class="row">
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			<input name="order_reference" id="order_reference" type="text"  class="form-control" placeholder="Réference"  value="<?php echo $order_reference;?>">
			</div>
			<label class="col-xs-12 col-sm-3 col-md-3 col-lg-3">Date commande de   </label>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<input name="order_data_created" id="order_data_created" type="date"  class="form-control"  value="<?php echo $order_data_created;?>">
			</div>
			<label class="col-xs-12 col-sm-1 col-md-1 col-lg-1">au   </label>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<input name="order_data_created_end" id="order_data_created_end" type="date"  class="form-control"  value="<?php echo $order_data_created_end;?>">
			</div>
          </div>
           </div>   
									
								
									
				
			

			
			 
		

			<div class="col-lg-12 block_action_search">
			<button type="submit"  class="btn btn-w-md btn-accent">Rechercher</button> 

		  <button class="btn btn-w-md btn-danger reinitial" type="button"onClick="location.href='<?=base_url();?>orders/index/?filtercheck=1&order_reference=N&order_data_created=&order_data_created_end'"><i class="icon-refresh"></i> Réinitialiser</button>
  
		
		</div>
	</form>
	  </div>
					  <div id="block-history" class="block-center">
                                        <table class="std table">
                                            <thead>
                                                <tr>
												     <th class="item mywishlist_second"></th>
                                                    <th class="first_item">Date</th>
                                                    <th class="item mywishlist_first">Réference </th>
													<th class="item mywishlist_first">Utilisateur</th>
                                                    <th class="item mywishlist_second">Nombre de ligne</th>
													 <th class="item mywishlist_second">Total TTC</th>
                                                    <th class="item mywishlist_second">Statut</th>
                                                   
                                                    <th class="item mywishlist_second"></th>
													 
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php if($orders_list) { ?>
											 <?php foreach($orders_list as $orders) :
											 $count_orders_detail = $this->M_orders->get_count_orders_detail($orders->order_id);
											 ?>
                                                <tr id="wishlist_1">
												 <td class="">
												 <a href="<?php echo base_url().'orders/show/'.$orders->order_id;?>" >
                                                        <img class="img-fluid brand " src="<?php echo base_url().'template/';?>img/eye.jpg" alt="Tout Voir" >
													    </a>
                                                    </td>
                                                   <td class="bold align_center">
                                                        <?php echo date_fr($orders->order_data_created);?>
                                                    </td>
													 <td>
													 <a href="<?php echo base_url().'orders/show/'.$orders->order_id;?>" >
                                                  <?php echo $orders->order_reference;?>
												  </a>
												  </td>
                                                   
                                                  
                                                    <td><?php echo $orders->customer_firstname.' '.$orders->customer_lastname;?></td>
                                                         <td>
                                                   <?php echo $count_orders_detail;?>
												   </td>
												  
                                                    <td class="">
                                                       € <?php echo (number_format($orders->order_amount, 2, ',', '')); ?> 
                                                    </td>
													 <td>
                                                   <?php echo $orders->status_name;?>
												   </td>
                                              
											   </tr>
												 <?php endforeach; ?>
												 <?php } else { ?>
											  <tr>
											   <td  colspan="6">
											   
                                                   <p class="text-center">   Aucune commande </p>
											    </td>
											   </tr>
											 <?php } ?>
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