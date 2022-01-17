 <?php  $certificats_list =$this->M_certificats->get_all_table();?> 
 <?php  if($certificats_list){  ?>  
						
 <div class="sidebar-block">
                                            <div class="title-block">Certification
											<hr/>
											</div>
                                           <div class="block-content">
									              
	                                           
												  <?php foreach($certificats_list as $certificats) :?>
			  
			
						
												  <div class="cateTitle hasSubCategory open level1" >
                                                
                                            
                                                   <a class="cateItem" href="javascript:void(0)"><input  <?php  if(  $this->session->userdata('all_product_certif')  and in_array($certificats->certificat_id, $this->session->userdata('all_product_certif'))){  ?> checked <?php   } ?> type="checkbox" id="filtre" data-search="all" class="filtre_certif certification_<?php echo $certificats->certificat_id;?>" name="certificat" value="<?php echo $certificats->certificat_id;?>">
												   <img   class="img-fluid brand cerficf checkIdCertification" data-id='<?php echo $certificats->certificat_id;?>' src="<?php echo base_url().'admines/medias/certificats/'.$certificats->certificat_picture;?>" alt="<?php echo $certificats->certificat_name;?>" >
												   <span class="checkIdCertification" data-id='<?php echo $certificats->certificat_id;?>'><?php echo $certificats->certificat_name;?></span></a>
                                    
                                                </div>
											
												  <?php endforeach; ?>
												   <div class="cateTitle hasSubCategory open level1" >
												  <a class="cateItem" href="javascript:void(0)"> <input  type="checkbox" id="filtre" class="check_all certification_0" data-name="all_certificat"  name="certificat" value="1">
												   <img class="img-fluid brand checkIdCertification" data-id='0' src="<?php echo base_url().'template/';?>img/eye.jpg" alt="Tout Voir" >
												  <span class="checkIdCertification" data-id='0'>Tous Voir</span></a>
                                                 </div>
										   
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
													<input <?php  if($this->session->userdata('all_product_bio')){  ?> checked <?php   } ?> type="checkbox" data-type="bio" id="filtre" data-search="all" class="filtre_products labels_2" name="avg" value="2">
													<img   class="img-fluid brand cerficf checkIdLabels" data-id='2' src="<?php echo base_url().'template/';?>img/bio_3.png" alt="BIO" >
													<span class="checkIdLabels" data-id='2'>BIO</span></a>
                                    
                                                </div>
												 <div class="cateTitle hasSubCategory open level1" >
                                                    
                                                    <a class="cateItem" href="javascript:void(0)">
													<input  <?php  if($this->session->userdata('all_product_label_rouge')){  ?> checked <?php   } ?> type="checkbox" data-type="lr" data-search="all" id="filtre" class="filtre_products labels_3" name="avg" value="3">
													<img class="img-fluid brand cerficf checkIdLabels" data-id='3' src="<?php echo base_url().'template/';?>img/label-rouge.png" alt="Label Rouge" >
													<span class="checkIdLabels" data-id='3'>Label Rouge</span></a>
                                    
                                                </div>
												
												  <div class="cateTitle hasSubCategory open level1" >
												  <a class="cateItem" href="javascript:void(0)">       <input  type="checkbox" id="filtre" class="check_all labels_0" data-name="all_label_rouge_bio" name="certificat" value="1">
												   <img class="img-fluid brand checkIdLabels" data-id='0' src="<?php echo base_url().'template/';?>img/eye.jpg" alt="Tout Voir" >
												  <span class="checkIdLabels" data-id='0'>Tous Voir</span></a>
                                                 </div>
										   
										   
									 </div>
                                         </div>
                             