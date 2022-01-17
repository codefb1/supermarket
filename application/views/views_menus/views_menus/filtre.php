 <div class="sidebar-block">
                                            <div class="title-block">Filtre
											<hr/>
											</div>
                                           <div class="block-content">
									                   <div class="cateTitle hasSubCategory open level1">
                                                    
                                                    <a class="cateItem" href="<?php echo base_url().'categories/';?>"> <img  class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-1.png" alt="" ><span>Boucherie</span></a>
                                                   
													
                                                </div>
	                                               <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="#"> <img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-2.png" alt="Promotions" ><span>Promotions</span></a>
                                                   
													
                                                </div>
												  <div class="cateTitle hasSubCategory open level1">
                                                      <?php if(($this->session->userdata('logged_in'))) { ?>
                                                    <a class="cateItem" href="<?php echo base_url().'orders/purchases';?>"><img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-3.png" alt="Mes liste d'achats" ><span>Mes liste d'achats</span></a>
													  <?php } else { ?>
													  <a class="cateItem" href="<?php echo base_url().'accounts';?>"><img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-3.png" alt="Mes liste d'achats" ><span>Mes liste d'achats</span></a>
									
													  <?php }  ?>
                                                </div>
												  <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="<?php echo base_url().'products/avs';?>"><img   class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-4.png" alt="Uniquement AVS" ><span>Uniquement AVS</span></a>
                                    
                                                </div>
												 <div class="cateTitle hasSubCategory open level1">
                                                    
                                                    <a class="cateItem" href="<?php echo base_url().'products/bio';?>"><img   class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-5.png" alt="BIO" ><span>BIO</span></a>
                                    
                                                </div>
												 <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="<?php echo base_url().'products/label_rouge';?>"><img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-6.png" alt="Label Rouge" ><span>Label Rouge</span></a>
                                    
                                                </div>
										   
									 </div>
                                         </div>
                             