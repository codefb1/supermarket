 <?php  $certificats_list =$this->M_certificats->get_all_table();?> 
 <?php  if($certificats_list){  ?>  
						
 <div class="sidebar-block">
                                            <div class="title-block">Certification
											<hr/>
											</div>
                                           <div class="block-content">
									              
	                                           
												  <?php foreach($certificats_list as $certificats) :?>
			  
			
						
												  <div class="cateTitle hasSubCategory open level1" >
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)">       <input  <?php  if(  $this->session->userdata('catg_certif')  and in_array($certificats->certificat_id, $this->session->userdata('catg_certif'))){  ?> checked <?php   } ?> type="checkbox" id="filtre" class="filtre_certif_catg" name="certificat" value="<?php echo $certificats->certificat_id;?>"><img   class="img-fluid brand" src="<?php echo base_url().'admines/medias/certificats/'.$certificats->certificat_picture;?>" alt="<?php echo $certificats->certificat_name;?>" ><span><?php echo $certificats->certificat_name;?></span></a>
                                    
                                                </div>
											
												  <?php endforeach; ?>
												
										   
									 </div>
                                         </div>
										  <?php   } ?>
										  <div class="sidebar-block">
                                            <div class="title-block">Labels
											<hr/>
											</div>
                                           <div class="block-content">
									             
												 <div class="cateTitle hasSubCategory open level1">
                                                    
                                                    <a class="cateItem" href="javascript:void(0)">  <input <?php  if($this->session->userdata('cat_bio')){  ?> checked <?php   } ?> type="checkbox" data-type="bio" id="filtre" class="filtre_products_catg" name="avg" value="2"><img   class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-5.png" alt="BIO" ><span>BIO</span></a>
                                    
                                                </div>
												 <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="javascript:void(0)"> <input  <?php  if($this->session->userdata('cat_label_rouge')){  ?> checked <?php   } ?> type="checkbox" data-type="lr" id="filtre" class="filtre_products_catg" name="avg" value="3"><img class="img-fluid brand" src="<?php echo base_url().'template/';?>img/icon-6.png" alt="Label Rouge" ><span>Label Rouge</span></a>
                                    
                                                </div>
										   
									 </div>
                                         </div>
                             