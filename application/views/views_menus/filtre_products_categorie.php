
 <?php  $certificats_list =$this->M_certificats->get_all_table();?> 
 <?php  if($certificats_list){  ?>  
						
 <div class="sidebar-block">
                                            <div class="title-block">Certification
											<hr/>
											</div>
                                           <div class="block-content">
									              
	                                           
												  <?php foreach($certificats_list as $certificats) :?>
			  
			
						
												  <div class="cateTitle hasSubCategory open level1" >
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)"><input  <?php  if(  $this->session->userdata('product_categorie_certif')  and in_array($certificats->certificat_id, $this->session->userdata('product_categorie_certif'))){} else {  ?> checked <?php   } ?> type="checkbox" id="filtre" data-search="all" class="filtre_product_categorie_certif certification_<?php echo $certificats->certificat_id;?>" name="certificat" value="<?php echo $certificats->certificat_id;?>">
												   <img   class="img-fluid brand cerficf checkIdCertification" data-id='<?php echo $certificats->certificat_id;?>' src="<?php echo base_url().'admines/medias/certificats/'.$certificats->certificat_picture;?>" alt="<?php echo $certificats->certificat_name;?>" >
												   <span class="checkIdCertification" data-id='<?php echo $certificats->certificat_id;?>'><?php echo $certificats->certificat_name;?></span></a>
                                    
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
                                                    
                                                    <a class="cateItem" href="javascript:void(0)"> 
													<input <?php  if($this->session->userdata('product_categorie_bio')){ } else { ?> checked <?php   } ?> type="checkbox" data-type="bio" id="filtre" data-search="all" class="filtre_products_categorie_label labels_2" name="avg" value="2">
													<img   class="img-fluid brand cerficf checkIdLabels" data-id='2' src="<?php echo base_url().'template/';?>img/bio_3.png" alt="BIO" >
													<span class="checkIdLabels" data-id='2'>BIO</span></a>
                                    
                                                </div>
												 <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="javascript:void(0)"> <input  <?php  if($this->session->userdata('product_categorie_label_rouge')){ } else { ?> checked <?php   } ?> type="checkbox" data-type="lr" data-search="all" id="filtre" class="filtre_products_categorie_label labels_3" name="avg" value="3">
													<img class="img-fluid brand cerficf checkIdLabels" data-id='3' src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Label Rouge" >
													<span class="checkIdLabels" data-id='2'>Label Rouge</span></a>
                                    
                                                </div>
												
										   
										   
									 </div>
                                         </div>
                             