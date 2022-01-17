	

 <?php  $categories_menu_list =$this->M_categories->get_categories_menu();?> 
    <div class="row block_menu">
    
 <div  style=""class="menu_pc main-menu col-sm-12 col-md-12 align-items-center justify-content-center navbar-expand-md block_menu_pc ">
					  <div class="menu navbar collapse navbar-collapse" >
                            <ul class="menu-top navbar-nav">
                                <li>
                                    <a href="<?php echo base_url();?>" title="Accueil" class="parent  <?php if($menu=='home'){ echo'active'; } ?>"   >
									<div><img class="" src="<?php echo base_url().'template/';?>img/acceuil.png" alt="Accueil" title="Accueil"></div>
									<div class="menu_title"><span>Accueil</span></div>
									</a>
                                   
									</li> 
									  <li>
									  
                                    <a href="<?php echo base_url().'associations';?>" title="Mouton entier" class="parent  <?php if($menu=='entiers'){ echo'active'; } ?>"   >
									<div><img class="" src="<?php echo base_url().'template/';?>img/mouton.png" alt="Mouton" title="Mouton"></div>
									
									<div class="menu_title" ><span>Mouton entier</span></div>
									
									</a>
                                   
									</li>
									<li>
                                    <a href="<?php echo base_url().'couffin';?>"  title="Couffin " class="parent  <?php if($menu=='Couffin'){ echo'active'; } ?>"   >
									<div><img class="" src="<?php echo base_url().'template/';?>img/couffin.png" alt="Couffin " title="Couffin "></div>
									
									<div class="menu_title"><span>Couffin </span></div>
									
									
									</a>
                                   
									</li>
									<li>
                                    <a href="<?php echo base_url().'categories';?>"  title="Goffa" class="parent  <?php if($menu=='categories'){ echo'active'; } ?>"   >
									<div><img class="" src="<?php echo base_url().'template/';?>img/boucherie.png" alt="La Boucherie" title="La Boucherie"></div>
									
									<div class="menu_title"><span>La Boucherie</span></div>
									
									
									</a>
                                   
									</li>
									
									<li>
                                    <a href="<?php echo base_url().'products/categorie/101-epices';?>"title="L'épicerie"  class="parent  <?php if($menu=='page_1'){ echo'active'; } ?>"   >
									
									
									<div><img class="" src="<?php echo base_url().'template/';?>img/epecire.png" alt="L'épicerie" title="L'épicerie"></div>
									
									<div class="menu_title"><span>L'épicerie</span></div>
									
									</a>
                                   
									</li> 
	                               	 <li>
                                    <a href="<?php echo base_url().'products/solde';?>"title="Promotion"  class="parent  <?php if($menu=='page_1'){ echo'active'; } ?>"   >
									
									
									<div><img class="" src="<?php echo base_url().'template/';?>img/solde.png" alt="Promotion" title="Promotion"></div>
									
									<div class="menu_title"><span>Promotion</span></div>
									
									</a>
                                   
									</li> 								
							
									
									
									 
									
									
                            </ul>
                        </div>
                    </div>
					
 </div>
