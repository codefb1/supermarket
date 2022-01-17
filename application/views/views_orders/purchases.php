  

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
					  <h2 class="text-center title-page">Liste des achats</h2>
					  
					 <div id="block-history" class="block-center">
                                        <table class="std table">
                                            <thead>
                                                <tr>
                                                    <th class="first_item">Date</th>
                                                    <th class="item mywishlist_first">Crée par  </th>
													    <th class="item mywishlist_first">Nom de la liste  </th>
													<th class="item mywishlist_first">Réf</th>
                                                    <th class="item mywishlist_second"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
											 <?php if($customer_shopping_list) { ?>
											 <?php foreach($customer_shopping_list as $customer_shopping) :
											 ?>
                                                <tr id="wishlist_1">
                                                   <td class="bold align_center">
                                                        <?php echo date_fr($customer_shopping->customer_shopping_data_created);?>
                                                    </td>
													<td><?php echo $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');?></td>
                                                         </td>
													
													 <td><?php echo $customer_shopping->customer_shopping_name;?></td>
                                                   
													 <td><?php echo $customer_shopping->customer_shopping_id;?></td>
                                                   
                                                  
                                                  
                                                <td class="">
												<a href="<?php echo base_url().'orders/showPurches/'.$customer_shopping->customer_shopping_id;?>" >
                                                  <button type="button" class="btn btn-outline show_purches" style=" color: #a71d1a !important;border-color: #a71d1a!important;background: TRANSPARENT!important;"><i class="fa fa-eye"></i></button> </a>
												   <a href="<?php echo base_url().'orders/removePurches/'.$customer_shopping->customer_shopping_id;?>" >
                                                  <button type="button" class="btn btn-danger remove_purches"style=" color: #a71d1a !important;border-color: #a71d1a!important;background: TRANSPARENT!important;"><i class=" fa fa-trash"></i></button>
												  </a>
												  </td>
											   </tr>
												 <?php endforeach; ?>
											 <?php } else { ?>
											  <tr>
											   <td  colspan="4">
											   
                                                   <p class="text-center">   Aucun article </p>
											    </td>
											   </tr>
											 <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
									
									      <div class="pagination">
                                            <div class="js-product-list-top ">
                                                <div class="d-flex justify-content-around row">
                                                    <div class="showing col col-xs-12">
                                                        <span></span>
                                                    </div>
                                                    <div class="page-list col col-xs-12">
                                                       
														 <?=$pagination;?>
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
    </div>