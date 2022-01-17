  

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
					<div class="row message">
				<?php  foreach ($messages  as  $messsage):?>
				<p><?php echo $messsage; ?></p>
				<?php endforeach; ?>
					 </div>
					 <?php if ($this->session->flashdata('SUCCESADRESS')) { ?>
            <div role="alert" class="alert alert-success text-center" style="font-size: 15px;">
                <?= $this->session->flashdata('SUCCESADRESS') ?>
            </div>
        <?php } ?>
					<div class="row login text-center">
				
	

					  
                    
					  <div  class=" sidebar-3 menu_compte sidebar-collection col-xs-12 col-sm-3 col-md-3 col-lg-3" id="product-sidebar-left">
					 <div class="sidebar-block sidebar-compte">
                                           <div class="title-block"> Tableau de bord <hr/></div>
                                           <div class="block-content" style="background: #f7f8f9!important;">
									
                                               

											<div class="cateTitle hasSubCategory open level1 compte_border">
                                                    <div  class="arrow collapsed collapse-icons menu_compte_1 compte_menu_level" data-toggle="collapse" data-target="#menu_1" aria-expanded="false"  role="status">
                                                   <span>  Mes commande</span>
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
					  <div  class="col-xs-12 col-sm-9 col-md-9 col-lg-9 onecol costumer_adress">
					  
					    <div  class="row adress">
					      <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6  "> 
						  <div  class="onecol">
<h2 class="text-center title-page">Adresse de facturation</h2>
<div><?php echo $this->session->userdata('customer_lastname').' '.$this->session->userdata('customer_firstname');?></div>
<div><?php echo $this->session->userdata('customer_address');?></div>
<div><?php echo $this->session->userdata('customer_city');?></div>
<div><?php echo $this->session->userdata('customer_zip');?></div>
<div><?php  if($this->session->userdata('customer_country')==1){ echo"France";} ?> 
<?php  if($this->session->userdata('customer_country')==3){ echo "Belgique";} ?>  
								
</div>
<div><?php echo $this->session->userdata('customer_phone');?></div>

   <div  class="row"> <button class="btn btn-primary up-adress" data-action="shopping" >Modifier</button> </div>
												       </div>
						  </div>
						      <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6  "> 
						  <div  class="onecol">
<h2 class="text-center title-page">Adresse de livraison</h2>
<div><?php echo $this->session->userdata('customer_delivery_lastname').' '.$this->session->userdata('customer_delivery_firstname');?></div>
<div><?php echo $this->session->userdata('customer_delivery_address');?></div>
<div><?php echo $this->session->userdata('customer_delivery_city');?></div>
<div><?php echo $this->session->userdata('customer_delivery_zip');?></div>
<div>
<?php  if($this->session->userdata('customer_delivery_country')==1){ echo"France";} ?> 
<?php  if($this->session->userdata('customer_delivery_country')==3){ echo "Belgique";} ?>  
								
</div>
<div><?php echo $this->session->userdata('customer_delivery_phone');?></div>
   <div  class="row"> <button class="btn btn-primary up-adress"  data-action="delivery">Modifier</button> </div>
												       </div>
						  </div>
						   </div>
						   <div  class="row">
						   <div  class="col-xs-12 col-sm-10 col-md-10 col-lg-10 onecol shopping"  style="display:none;"> 
				
                                  <h2 class="text-center title-page">Adresse de facturation</h2>
                                    <form action="<?php echo base_url().'customer/adresses';?>" id="customer-form" class="js-customer-form" method="post">
                                               <input class="hidden" name="type_adress" type="hidden" value="1">
                                           
										<div class="form-group">
										<div  class="row">
									<label class="labels col-sm-4">Pays</label>
									<div  class="col-sm-6">
									<select  id="customer_country"   required name="customer_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($this->session->userdata('customer_country')==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($this->session->userdata('customer_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select></div>
									</div>
									
									 </div>
											<div class="form-group">
											
												
												
													<div  class="row">
									<label class="labels col-sm-4">Adresse</label>
									<div  class="col-sm-6">
									     <input class="form-control"required  name="customer_address" type="text" placeholder="Adress" value="<?php echo $this->session->userdata('customer_address');?>">
                                                </div>
									</div>
                                            </div>
											
											<div class="form-group">
											
                                            
													<div  class="row">
									<label class="labels col-sm-4"> Code Postal </label>
									<div  class="col-sm-6">
									             <input class="form-control" required name="customer_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_zip');?>">
                                              </div>
									</div>
											</div>
											<div class="form-group">
											 
												
														<div  class="row">
									<label class="labels col-sm-4"> Ville </label>
									<div  class="col-sm-6">
									              <input class="form-control" required name="customer_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_city');?>">
                                                </div>
									</div>
                                            </div>
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4"> Numéro téléphone </label>
									<div  class="col-sm-6">
									                <input class="form-control" required name="customer_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_phone');?>">
                                                </div>
									</div>
                                            </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                  Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                 </div>
							
								</div>
								<div  class="row">
						   <div  class="col-xs-12 col-sm-10 col-md-10 col-lg-10 onecol delivery"  style="display:none;"> 
				
                                  <h2 class="text-center title-page">Adresse de livraison</h2>
                                    <form action="<?php echo base_url().'customer/adresses';?>" id="customer-form" class="js-customer-form" method="post">
                                               <input class="hidden" name="type_adress" type="hidden" value="2">
                                          <div class="form-group">
										  <div  class="row">
						<label class="labels col-sm-4">Nom</label>
						<div  class="col-sm-6">
						<input class="form-control" required name="customer_delivery_firstname" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('customer_delivery_firstname'); ?>">
						</div>
						</div>
						</div>
							<div class="form-group">



							<div  class="row">
							<label class="labels col-sm-4">Prénom</label>
							<div  class="col-sm-6">
							<input class="form-control" required  name="customer_delivery_lastname" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('customer_delivery_lastname'); ?>">
							</div>
							</div>
							</div>
										<div class="form-group">
										<div  class="row">
									<label class="labels col-sm-4">Pays</label>
									<div  class="col-sm-6">
									<select  id="customer_country"  name="customer_delivery_country" class="form-control  btn-xs">
									<option value="">Selectionner</option>


									<option <?php  if($this->session->userdata('customer_delivery_country')==1){ echo"selected";} ?> value="1"> France</option>
									<option <?php  if($this->session->userdata('customer_delivery_country')==3){ echo"selected";} ?> value="3"> Belgique</option>
									</select></div>
									</div>
									
									 </div>
											<div class="form-group">
											
												
												
													<div  class="row">
									<label class="labels col-sm-4">Adresse</label>
									<div  class="col-sm-6">
									     <input class="form-control"required  name="customer_delivery_address" type="text" placeholder="Adress" value="<?php echo $this->session->userdata('customer_delivery_address');?>">
                                                </div>
									</div>
                                            </div>
											
											<div class="form-group">
											
                                            
													<div  class="row">
									<label class="labels col-sm-4"> Code Postal </label>
									<div  class="col-sm-6">
									             <input class="form-control" required name="customer_delivery_zip" type="text" placeholder="Code Postal" value="<?php echo $this->session->userdata('customer_delivery_zip');?>">
                                              </div>
									</div>
											</div>
											<div class="form-group">
											 
												
														<div  class="row">
									<label class="labels col-sm-4"> Ville </label>
									<div  class="col-sm-6">
									              <input class="form-control" required name="customer_delivery_city" type="text" placeholder="Ville" value="<?php echo $this->session->userdata('customer_delivery_city');?>">
                                                </div>
									</div>
                                            </div>
											<div class="form-group">
											<div  class="row">
												<label class="labels col-sm-4"> Numéro téléphone </label>
									<div  class="col-sm-6">
									                <input class="form-control" required name="customer_delivery_phone" type="text" placeholder="Numéro téléphone" value="<?php echo $this->session->userdata('customer_delivery_phone');?>">
                                                </div>
									</div>
                                            </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                  Enregistrer
                                                </button>
                                            </div>
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
        </div>
    </div>