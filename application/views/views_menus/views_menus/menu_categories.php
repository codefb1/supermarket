  
   <?php  $categories_list =$this->M_categories->get_categories(false);?>

							 
                                        <div class="row categorie_liste">
										 <?php foreach ($categories_list as $categories): ?>
										  <?php if($categorieInfo->categorie_id==$categories->categorie_id) {   ?> 
										
										<div class="categorie_active ctg_<?php echo $categories->categorie_id;?>">
										<a  href="<?php echo base_url().'categories/index/'.$categories->categorie_id.'-'.strtolower(url_title($categories->categorie_name));?>" title="<?php echo $categories->categorie_name;?>"> 
										
										<div  class="categorie_img" ><img   class="img-fluid brand" src="<?php echo base_url().'template/';?>img/<?php echo $categories->categorie_id;?>-active.jpg" alt="<?php echo $categories->categorie_name;?>" ></div>
										 <div class="categorie_title"> <a  href="<?php echo base_url().'categories/index/'.$categories->categorie_id.'-'.strtolower(url_title($categories->categorie_name));?>" title="<?php echo $categories->categorie_name;?>"><?php echo $categories->categorie_name;?></a> </div>
                               
										</a>
										</div>
										  <?php   } else    {  ?>
										<div class="categorie_not_active ctg_<?php echo $categories->categorie_id;?>" >
										<a  href="<?php echo base_url().'categories/index/'.$categories->categorie_id.'-'.strtolower(url_title($categories->categorie_name));?>" title="<?php echo $categories->categorie_name;?>"> 
										
										  <div class="categorie_img"><img  class="img-fluid brand" src="<?php echo base_url().'template/';?>img/<?php echo $categories->categorie_id;?>.jpg" alt="<?php echo $categories->categorie_name;?>" ></div>
										  <div class="categorie_title"> <?php echo $categories->categorie_name;?> </div>
                                                 </a>
										  </div>
										
                                          <?php   }   ?>
										 <?php endforeach; ?>
										</div>
                                                