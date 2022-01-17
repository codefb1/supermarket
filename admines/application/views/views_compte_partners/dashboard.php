 <div class="panel panel-default page-panel">
 

 <h1 class="page_title title_page" >Aperçu <span>rapide</span> </h1>
<div class="row block_info"> 
		<div class="col-md-4 col-sm-4 col-lg-4 " >
				<div class="row block-home" >
					<div class="col-md-12 col-sm-12 col-lg-12 block_title" >
					<span class="badge badge-notify-home counts-new-ordres"><?php  echo $count_orders_new_today->nbr_orders;?></span>
					 <h2 class="page_title" > <img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" class=""> <span style="top: 5px!important;">Aujourd'hui</span></h2>
					   <h3> <?php  echo date_fr_lettre_home();?></h3>
					 </div>	
					 <div class="col-md-12 col-sm-12 col-lg-12 block-commande" >
    
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_1 ">
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_2">
					 <div class="row" >
					 <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="new-orders"><img src="<?php echo base_url().'template/';?>assets/img/nouvelle-commande-petite.png" alt="" class=""> <span><?php  echo $count_orders_new_today->nbr_orders;?> Nouvelle commande Aujourd'hui</span> </p>
					 <hr/>
					 </div>
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders_preparation"><img src="<?php echo base_url().'template/';?>assets/img/commande-encours-petit.png" alt="" class=""> <span><?php  echo $count_orders_during_preparation_today->nbr_orders;?> En cours de prépration</span> </p>
					   <hr/>
					  </div>
					  
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders-refusé"><img src="<?php echo base_url().'template/';?>assets/img/commande-refuser-petit.png" alt="" class=""> <span><?php  echo $count_orders_refuse_today->nbr_orders;?> Commande(s) refusée(s)</span> </p>
					   <hr/>
					  </div>
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders-refusé"><img src="<?php echo base_url().'template/';?>assets/img/commande-livree-petit.png" alt="" class=""> <span><?php  echo $count_orders_delivered_today->nbr_orders;?> Commande(s) livrée(s)</span> </p>
					   <hr/>
					  </div>
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders-attend-paiments"><img src="<?php echo base_url().'template/';?>assets/img/commande-attend-payer.png" alt="" class=""> <span><?php  if($orders_awaiting_payment_today->order_partener_amount){ echo (number_format($orders_awaiting_payment_today->order_partener_amount, 2, ',', ''));} else { echo 0 ; } ?> En attente de paiment!</span> </p>
					   <hr/>
					  </div>
					  
					  </div>	
					 </div>	
					 </div>		
				  </div>
				  
				  
				  	<div class="col-md-4 col-sm-4 col-lg-4 " >
				<div class="row block-home" >
					<div class="col-md-12 col-sm-12 col-lg-12 block_title" >
					 <h2 class="page_title" > <img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" class=""> <span style="top: 5px!important;">Commandes</span></h2>
					  <h3 ></br></h3>
					 </div>	
					 <div class="col-md-12 col-sm-12 col-lg-12 block-commande" >
    
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_1 ">
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_2">
					 <div class="row" >
					
					  
					    <?php if($count_not_orders_not_delivered->nbr_orders!=0){ ?>
					
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders-livrees"><img src="<?php echo base_url().'template/';?>assets/img/commande-refuser-petit.png" alt="" class=""> <span style="color: #dc364a!important;font-size: 13px;">Vous aves <?php  echo $count_not_orders_not_delivered->nbr_orders;?>  commande(s) en retard de livraison</span> </p>
					   <hr/>
					  </div>
					   <?php }?>
					
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p   <?php if($count_not_orders_not_delivered->nbr_orders==0){ ?> class="orders-livrees"  <?php }?> ><img src="<?php echo base_url().'template/';?>assets/img/commande-livree-petit.png" alt="" class=""> <span><?php  echo $count_orders_delivered_today->nbr_orders;?> Commande(s) livrée(s)</span> </p>
					   <hr/>
					  </div>
					    <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders-attend-paiments"><img src="<?php echo base_url().'template/';?>assets/img/commande-attend-payer.png" alt="" class=""> <span><?php  if($orders_awaiting_payment_all->order_partener_amount){ echo (number_format($orders_awaiting_payment_all->order_partener_amount, 2, ',', ''));} else { echo 0 ; } ?> En attente de paiment!</span> </p>
					   <hr/>
					  </div>
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <p class="orders-attend-paiments"><img src="<?php echo base_url().'template/';?>assets/img/commande-attend-payer.png" alt="" class=""> <span><?php if($sum_amount_payment->order_partener_amount){ echo (number_format($sum_amount_payment->order_partener_amount, 2, ',', '')); } else { echo 0 ;}?> Euro de CA</span> </p>
					   <hr/>
					  </div>
					   
					    <div class="col-md-12 col-sm-12 col-lg-12 text-center all-orders" <?php if($count_not_orders_not_delivered->nbr_orders!=0){ ?>  style="padding-top: 32px!important;"<?php }?>>
					 <a href="<?php echo base_url().'comptedPartener/newOrders/';?>" title="Acceder aux commandes" >Accéder aux commandes<span></span> </a>
					  
					  </div>
					  </div>	
					 </div>	
					 </div>		
				  </div>
				  
				  
				  	<div class="col-md-3 col-sm-4 col-lg-4" >
				<div class="row block-home" >
					<div class="col-md-12 col-sm-12 col-lg-12 block_title" >
					 <h2 class="page_title" > <img src="<?php echo base_url().'template/';?>assets/img/icone_title.png" alt="" class=""> <span style="top: 5px!important;">Note client</span></h2>
					  <h3 > Aucune note</h3>

					 </div>	
					 <div class="col-md-12 col-sm-12 col-lg-12 block-commande commente" >
    
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_1 ">
					 <img src="<?php echo base_url().'template/';?>assets/img/liason.png" alt="" class="liason liason_2">
					 <div class="row" >
					
					  
					  
					
					   <div class="col-md-12 col-sm-12 col-lg-12 commente-first" >
					<div class="commente-img" > <img src="<?php echo base_url().'template/';?>assets/img/paire.png" alt="" class="commente-img" style="width: 80px!important;"> </div><div class="commente-text"><p class="commente-paire"><span>Paul</span>:Go-ferme hala is geat for anyone recommende </p></div>
					 
					  </div>
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <div class="commente-img"><img src="<?php echo base_url().'template/';?>assets/img/impaire.png" alt="" class="commente-img" style="width: 80px!important;"></div> <div class="commente-text"><p class="commente-impaire"> <span>Marita</span>:Go-ferme hala le plus servicabla site de viandes halla!!  </p></div>
					  
					  </div>
					  <div class="col-md-12 col-sm-12 col-lg-12" >
					<div class="commente-img" > <img src="<?php echo base_url().'template/';?>assets/img/paire.png" alt="" class="commente-img" style="width: 80px!important;"> </div><div class="commente-text"><p class="commente-paire"><span>Paul</span>:Go-ferme hala is geat for anyone recommende </p></div>
					 
					  </div>
					   <div class="col-md-12 col-sm-12 col-lg-12" >
					 <div class="commente-img"><img src="<?php echo base_url().'template/';?>assets/img/impaire.png" alt="" class="commente-img" style="width: 80px!important;"></div> <div class="commente-text"><p class="commente-impaire"> <span>Marita</span>:Go-ferme hala le plus servicabla site de viandes halla!!  </p></div>
					  
					  </div>
					    <div class="col-md-12 col-sm-12 col-lg-12 text-center all-commente">
					 <a href="#" title="Afficher tous les commentaires" >Afficher tous les commentaires<span></span> </a>
					  
					  </div>
					  </div>	
					 </div>	
					 </div>		
				  </div>

   </div>

	</div>		
			
			
			
		  
		           
		   
		   