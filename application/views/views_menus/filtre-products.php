 
 	 <div class="sidebar-block">
                                            <div class="title-block">Catégories
											<hr/>
											</div>
                                           <div class="block-content">
									              
	                                           
												  <?php foreach($categories_list as $categorie) :?>
			    <?php  if($categorie->categorie_id!=101){  ?> 
                                                  
			
						
												  <div class="cateTitle hasSubCategory open level1" >
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)">
												   <input  <?php  if(  $this->session->userdata('all_sub_categorie')  and in_array($categorie->categorie_id, $this->session->userdata('all_sub_categorie'))) { } else  { ?> checked <?php   } ?> type="checkbox" id="filtre" data-search="all" class="all_filtre_sub_categorie  sub_categorie_<?php echo $categorie->categorie_id;?>" name="categorie" value="<?php echo $categorie->categorie_id;?>">
												   
												   <?php  if(  $this->session->userdata('all_sub_categorie')  and in_array($categorie->categorie_id, $this->session->userdata('all_sub_categorie'))){  ?> 
                                                  <img   class="img-fluid checkIdCategorie brand" src="<?php echo base_url().'template/';?>img/dps-<?php echo $categorie->categorie_id;?>.jpg" alt="<?php echo $categorie->categorie_name;?>"  data-id='<?php echo $categorie->categorie_id;?>'>
												        
												   <?php   }  else { ?>
                                                       <img   class="img-fluid checkIdCategorie brand" src="<?php echo base_url().'template/';?>img/<?php echo $categorie->categorie_id;?>-actives.jpg" alt="<?php echo $categorie->categorie_name;?>" data-id='<?php echo $categorie->categorie_id;?>' >
												

												   <?php   }   ?>
												  
												   <span class="checkIdCategorie" data-id='<?php echo $categorie->categorie_id;?>' ><?php echo $categorie->categorie_name;?></span></a>
                                    
                                                </div>
											<?php   }   ?>
												  <?php endforeach; ?>
												 
										   
									 </div>
                                         </div>
 <?php  $certificats_list =$this->M_certificats->get_all_table();?> 
 <?php  if($certificats_list){  ?>  
						
 <div class="sidebar-block">
                                            <div class="title-block">Certification
											<hr/>
											</div>
                                           <div class="block-content">
									              
	                                           
												  <?php foreach($certificats_list as $certificats) :?>
			  
			
						
												  <div class="cateTitle hasSubCategory open level1" >
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)">     
												   <input  <?php  if($this->session->userdata('certif')  and in_array($certificats->certificat_id, $this->session->userdata('certif'))){ } else  { ?> checked <?php   } ?> type="checkbox" id="filtre" class="filtre_certif certification_<?php echo $certificats->certificat_id;?>" name="certificat" value="<?php echo $certificats->certificat_id;?>">
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
													<input <?php  if(!$this->session->userdata('sub_cat_bio')) { } else  {  ?> checked <?php   } ?> type="checkbox" data-type="bio" id="filtre" class="filtre_products labels_2" name="avg" value="2">
													<img   class="img-fluid brand cerficf checkIdLabels" data-id='2' src="<?php echo base_url().'template/';?>img/bio_3.png" alt="BIO" >
													<span class="checkIdLabels" data-id='2'>BIO</span></a>
                                    
                                                </div>
												 <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="javascript:void(0)"> <input  <?php  if(!$this->session->userdata('sub_cat_label_rouge'))  { } else  { ?> checked <?php   } ?> type="checkbox" data-type="lr" id="filtre" class="filtre_products labels_0" name="avg" value="3">
													<img class="img-fluid brand cerficf checkIdLabels" data-id='3' src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Label Rouge" >
													<span class="checkIdLabels" data-id='2'>Label Rouge</span></a>
                                    
                                                </div>
										
									 </div>
                                         </div>
                             