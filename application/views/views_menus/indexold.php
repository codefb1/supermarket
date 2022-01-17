	

 <?php  $categories_menu_list =$this->M_categories->get_categories_menu();?> 
    <div class="row block_menu">
         
 <div  style=""class="menu_pc main-menu col-sm-10 col-md-10 align-items-center justify-content-center navbar-expand-md ">
					  <div class="menu navbar collapse navbar-collapse" >
                            <ul class="menu-top navbar-nav">
                                <li>
                                    <a href="<?php echo base_url();?>" title="Accueil" class="parent  <?php if($menu=='home'){ echo'active'; } ?>"   >Accueil</a>
                                   
									</li> 
	                               	  <li>
                                    <a href="<?php echo base_url().'associations';?>" title="Mouton entier" class="parent  <?php if($menu=='entiers'){ echo'active'; } ?>"   >Mouton entier</a>
                                   
									</li> 								
								 <li>
                                    <a href="<?php echo base_url().'categories';?>" title="La Boucherie" class="parent  <?php if($menu=='produts'){ echo'active'; } ?>"   >La Boucherie</a>
                                   <?php if($categories_menu_list) {  ?>
								   <div class="dropdown-menu">
                                        <ul>
										<?php foreach ($categories_menu_list as $categorie_menu): ?>
                                            <li class=" sub_menu">
                                                <a href="<?php echo base_url().'products/categorie/'.$categorie_menu->categorie_id.'-'.strtolower($categorie_menu->categorie_name);?>" title="<?php echo $categorie_menu->categorie_name;?>">
												<!--<img class="img-fluid "  src="<?php echo base_url().'template/';?>img/dps-<?php echo $categorie_menu->categorie_id;?>.jpg" alt="<?php echo $categorie_menu->categorie_name?>">-->
												<span><?php echo $categorie_menu->categorie_name;?></span>
												
												</a>
                                            </li>
											 <?php endforeach; ?>
                                            
                                        </ul>
                                    </div>
									<?php  } ?>
									</li>
									
									<li>
                                    <a href="<?php echo base_url().'products/categorie/101-epices';?>"title="L'épicerie"  class="parent  <?php if($menu=='page_1'){ echo'active'; } ?>"   >L'épicerie</a>
                                   
									</li> 
									 
									<li>
                                    <a href="<?php echo base_url().'products/solde';?>"  title="Promotions" class="parent  <?php if($menu=='promotions'){ echo'active'; } ?>"   >Promotions</a>
                                   
									</li>
									<li>
                                    <a href="<?php echo base_url().'products/goffa';?>"  title="Goffa" class="parent  <?php if($menu=='promotions'){ echo'active'; } ?>"   >Goffa</a>
                                   
									</li>
									<li>
                                    <a href="#"  style="display:none;" title="Contact" class="parent  <?php if($menu=='promotions'){ echo'active'; } ?>"   >Contact</a>
                                   
									</li>
									
                            </ul>
                        </div>
                    </div>
					<div class="col-sm-2 col-md-2 d-flex align-items-center info_phone" style="background: #222;">
                      
					  <img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/bande-france.png" alt="" >
                     <span class="contact_phone"> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $setting->phone;?></span>
                    </div>
 </div>
