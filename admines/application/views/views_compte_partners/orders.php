 <div class="panel panel-default page-panel">
 

 <h1 class="page_title title_page" >Liste des  <span>Commandes</span> </h1>
    <div class="row saerch_orders ">
	   <form method="GET" action="<?=base_url().'comptedPartener/newOrders/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
		
			

			  <div class="row">

			<div class="col-lg-2" style="padding-right: 0px;">
			<label style="width: 20%;display: inline-block;position: relative;top: -3px;">De </label>
			
			<input style="width: 70%;display: inline-block;" name="order_data_created" id="order_data_created" type="date"  class="form-control"  value="<?php echo $order_data_created;?>">
			</div>
			
					
				<div class="col-lg-2" style="padding-right: 0px;padding-left: 0px;">
			<label style="width: 10%;display: inline-block;position: relative;top: -3px;" >À  </label>
			<input style="width: 80%;display: inline-block;"  name="order_data_created_end" id="order_data_created_end" type="date"  class="form-control"  value="<?php echo $order_data_created_end;?>">
			</div>
			
			

            <div class="col-lg-4" style="padding-right: 0px;padding-left: 0px;">
               
				<label style="width: 40%;display: inline-block;left: 10px;position: relative;">ÉTAT DE LA COMMANDE </label>
              <select  id="order_partener_status"  name="order_partener_status" class="form-control  btn-xs" style="width: 50%;display: inline-block;">
							<option value=""> Selectionnez...</option>
							<option <?php  if($order_partener_status==1){ echo"selected";} ?> value="1">Nouvelle Commande</option>
							<option <?php  if($order_partener_status==2){ echo"selected";} ?> value="2">En cours de préparation </option>
							<option <?php  if($order_partener_status==3){ echo"selected";} ?> value="3">Livré</option>
																</select> </div>
									
									 <div class="col-lg-3" style="display:none;">
                <label  for="F1">État de livraison </label>   
							<select  id="delivery_status"  name="delivery_status" class="form-control  btn-xs">
						<option value=""> Selectionnez...</option>
				<?php foreach($status_livraison as $status) :?>
							<option <?php  if($status->status_id==$delivery_status){ echo"selected";} ?> value="<?php echo $status->status_id;?>"> <?php echo $status->status_name;?></option>
							<?php endforeach; ?>
							</select> </div>
									
							<div class="col-lg-4" style="padding-right: 0px;padding-left: 0px;">
	<button type="submit"  class="btn btn-w-md btn-accent">Rechercher</button> 
			<a href="<?=base_url();?>comptedPartener/newOrders/?filtercheck=1&delivery_status=N&order_payment_status=N&order_status=1" class="btn btn-w-md btn-success ">Réinitialiser la rechecher</a>
			</div>				
             
            </div>
			
	</form>
	  </div>
	  
	  
<div class="row block_info">
<?php  if($orders_list){ ?>

  <?php foreach($orders_list as $orders) :
			  
		
						$orders_detail = $this->M_orders->get_orders_detail($orders->order_id);
						if($orders->order_partener_status==1){$partener_status='Nouvelle Commande'; $background='background_blue';  $text_color='title_blue'; $label='warning'; $img='nouvelle-commande-petite.png';}		
						if($orders->order_partener_status==2){$partener_status='Commande en cours';  $background='background_yellow';  $text_color='title_yellow'; $label='success';$img='commande-encours-petit.png'; }	
						if($orders->order_partener_status==3){$partener_status='Commande Livrée'; $text_color='success';  $background='background_green';  $text_color='title_green'; $label='success'; $img='commande-livree-petit.png';}
						if($orders->order_partener_status==4){$partener_status='Commande Réfusée'; $text_color='danger'; $background='background_red';  $text_color='title_red'; $label='success';  $img='commande-refuser-petit.png';}
					
						if($orders->order_partener_status==1){	
						?> 
				 
		<div class="col-md-4 col-sm-4 col-lg-4 block_order_<?php echo $orders->order_id;?>" >
				<div class="row block-list-commande" >
					<div class="col-md-12 col-sm-12 col-lg-12 block_title block_<?php echo $orders->order_id;?>" >
					<div class="row" >
					<div class="col-md-2 col-sm-2 col-lg-2"  style="text-align: center;margin-top: 5px!important;"> <img class="img-<?php echo $orders->order_id;?>" src="<?php echo base_url().'template/assets/img/'.$img;?>" alt="" class=""> </div> 
					<div class="col-md-8 col-sm-8 col-lg-8" > <h2  style="margin-top: 0px!important;width: 100%;text-align: left!important;"class="page_title text_color-<?php echo $orders->order_id;?> <?php echo $text_color;?>" ><span class="partener_status-<?php echo $orders->order_id;?>" style="font-size: 15px!important;"><?php echo $partener_status;?></span> </h2> </div>
					<div class="col-md-2 col-sm-2 col-lg-2" >
					<span  <?php if($orders->order_partener_status==1){ echo 'style="display:none"';} else { ?> <?php echo 'style="display:block"'; } ?>>
					<span class="badge badge-notify show-ordre  badge-ordre-<?php echo $orders->order_id;?>  badge-ordre <?php echo $background; ?>" >
					<span style="top: 11px!important;left: -1px;" ><?php echo $orders->order_id; ?> </span></span></span>
					<span class="icon-info info-<?php echo $orders->order_id;?>"  <?php if($orders->order_partener_status !=1){ echo 'style="display:none;"';} ?> >
					<img  src="<?php echo base_url().'template/assets/img/icone_info.png';?>" alt="" class="">
					<span class="matirial-info"> La velours est un tissu fait sur une machine à tisser à deux systèmes de chaînes,  </span></span>
					</div> 
					</div>

					</div>
					 
					 <div class="col-md-12 col-sm-12 col-lg-12 list-products" >
					  <?php $i=0; foreach($orders_detail as $detail) :
					  if($i<3){
						$image =$this->M_products_pictures->get_one_product_picture_partener($detail->product_id);
							$path ="";
						if($image){
							$path =base_url().'medias/products/'.$image->product_pictures;
						}else {
								$image =$this->M_products_pictures->get_one_product_picture($detail->product_id);
									if($image){
									 $path =base_url().'medias/products/'.$image->product_pictures;
								} else {
									$path =base_url().'template/assets/img/inconu.png';	
				            	}
							
						}
					
					
					  ?>
                        
					 <div class="row block-proudct" >
					 <div class="col-md-4 col-sm-4 col-lg-4 block_order_<?php echo $orders->order_id;?>" >
					 <?php if($path){ ?>
						<img data-dz-thumbnail=""  alt="avatar" id="block-image-banners" src="<?php echo $path; ?>" class="img-responsive">
						
						<?php } ?>
					 </div>
					  <div class="col-md-8 col-sm-8 col-lg-8 info-product" >
					  <h2 style="font-weight: bolder;"><?php echo $detail->product_name;?></h2>
					   <div class="poid-price"><span class="poid"><?php echo $detail->orders_detail_product_poids * $detail->product_quantity;?> kg</span>    <span class="price">€ <?php echo (number_format($detail->order_product_price_buying  * $detail->product_quantity, 2, ',', '')) ;?></span></div>
					  
					 </div>
					
					  </div>
					  
					  	<?php $i++;} endforeach; ?>
					 </div>
					 	 <div class="col-md-12 col-sm-12 col-lg-12 " >
					   <div class="row action accepte-<?php echo $orders->order_id;?>  <?php if($orders->order_partener_status==1){ echo 'hidden_block';} ?> " >
					  <div class="col-md-5 col-sm-5 col-lg-5" style="text-align: center;" >
					<span class=" btn btn-outline btn-primary price_total background_<?php echo $orders->order_id;?> <?php echo $background; ?>"> € <?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."" ?></span>
					</div>
					  <div class="col-md-7 col-sm-7 col-lg-7" >
					  <a class=" background_<?php echo $orders->order_id;?> <?php echo $background; ?>" href="<?php echo base_url().'comptedPartener/detailOrder/'.$orders->order_id;?>" class="position_text"><button type="button" class="btn btn-outline btn-primary <?php echo $background; ?> background_<?php echo $orders->order_id;?> show-order">VOIR LA FICHE <i class="glyphicon glyphicon-chevron-right flesh"></i></button> </a>
							
					   </div>
					  </div>    
    
					  
					    <div class="row action not-accepte-<?php echo $orders->order_id;?>  <?php if($orders->order_partener_status!=1){ echo 'hidden_block';} ?> "  style="margin-top: 1px;" >
					  <div class="col-md-6 col-sm-6 col-lg-6" style="text-align: center;" >
					  <button type="button" class="btn btn-outline btn-primary background_green is_accepte" data-id="<?php echo $orders->order_id;?>" style="position: relative;top: -10px;">ACCEPTER  </button>
					</div>
					  <div class="col-md-6 col-sm-7 col-lg-6"  style="text-align: center;" >
					 	<button type="button" class="btn btn-outline btn-primary background_red  is_not_accepte" data-id="<?php echo $orders->order_id;?>"style="position: relative;top: -10px;">REFUSER </button>
					   </div>
					  </div>
					   <div class="row countdown-<?php echo $orders->order_id;?> " <?php if($orders->order_partener_status!=2){ echo 'style="height: 55px;opacity:0!important;"';} else { echo 'style="height: 55px;"'; } ?>   >
					  
					    <div class="countdown hero_count_<?php echo $orders->order_id;?>" data-Date=''>
                          
                           
                            <div class="running" style="display: blockf;text-align: center;">
                                <timer>
                                    <span class="days days_timer_countdown"></span> <span   class="days_labels_countdown">jour</span>
									<span class="hours hours_timer_countdown"></span>	<span  class="hours_labels_countdown">heures</span>
									<span  class="minutes minutes_timer_countdown"></span><span class="minutes_labels_countdown" >mn</span>
                                  <span class="seconds seconds_timer_countdown" style="display:none;"></span> 	<span class="seconds_labels_countdown" style="display:none;">Seconds</span>
                                </timer>
                                <div class="break"></div>
                                <div class="labels">
                                   
								
									
								
                                </div>
                          
                            </div>

                        </div>

                        
					 </div>
				
					 </div>
					  
				</div>
				</div>
				
				
				 <?php  } endforeach; ?>
				


  <?php foreach($orders_list as $orders) :
			  
		
						$orders_detail = $this->M_orders->get_orders_detail($orders->order_id);
						if($orders->order_partener_status==1){$partener_status='Nouvelle Commande'; $background='background_blue';  $text_color='title_blue'; $label='warning'; $img='nouvelle-commande-petite.png';}		
						if($orders->order_partener_status==2){$partener_status='En cours de préparation';  $background='background_yellow';  $text_color='title_yellow'; $label='success';$img='commande-encours-petit.png'; }	
						if($orders->order_partener_status==3){$partener_status='Commande Livrée'; $text_color='success';  $background='background_green';  $text_color='title_green'; $label='success'; $img='commande-livree-petit.png';}
						if($orders->order_partener_status==4){$partener_status='Commande Réfusée'; $text_color='danger'; $background='background_red';  $text_color='title_red'; $label='success';  $img='commande-refuser-petit.png';}
					
						if($orders->order_partener_status!=1){
						?> 
					
		<div class="col-md-4 col-sm-4 col-lg-4 " >
				<div class="row block-list-commande" >
				<div class="col-md-12 col-sm-12 col-lg-12 block_title block_<?php echo $orders->order_id;?>" >
				<div class="row" >
				<div class="col-md-2 col-sm-2 col-lg-2"  style="text-align: center;margin-top: 5px!important;"> <img class="img-<?php echo $orders->order_id;?>" src="<?php echo base_url().'template/assets/img/'.$img;?>" alt="" class=""> </div> 
				<div class="col-md-8 col-sm-8 col-lg-8" > <h2  style="margin-top: 0px!important;width: 100%;text-align: left!important;"class="page_title text_color-<?php echo $orders->order_id;?> <?php echo $text_color;?>" ><span class="partener_status-<?php echo $orders->order_id;?>"style="font-size: 15px!important;" ><?php echo $partener_status;?></span> </h2> </div>
				<div class="col-md-2 col-sm-2 col-lg-2" >
				<span>
				<span class="badge badge-notify show-ordre  badge-ordre-<?php echo $orders->order_id;?>  badge-ordre <?php echo $background; ?> " <?php if($orders->order_partener_status==1){ echo 'style="opacity:0!important;top: 0px!important;"';} else { ?> <?php echo 'style="top: -5px!important;"'; } ?> >
				<span style="top: 11px!important;left: -1px;" ><?php echo $orders->order_id; ?> </span></span></span>
				
				<span class="icon-info info-<?php echo $orders->order_id;?>"  <?php if($orders->order_partener_status !=1){ echo 'style="display:none;"';} ?> >
				<img  src="<?php echo base_url().'template/assets/img/icone_info.png';?>" alt="" class="">
				<span class="matirial-info"> La velours est un tissu fait sur une machine à tisser à deux systèmes de chaînes,  </span></span>
				</div> 
				</div>
				
                </div>
					 
					 <div class="col-md-12 col-sm-12 col-lg-12 list-products" >
					  <?php $i=0; foreach($orders_detail as $detail) :
					  if($i<3){
						$image =$this->M_products_pictures->get_one_product_picture_partener($detail->product_id);
							$path ="";
						if($image){
							$path =base_url().'medias/products/'.$image->product_pictures;
						}else {
								$image =$this->M_products_pictures->get_one_product_picture($detail->product_id);
									if($image){
									 $path =base_url().'medias/products/'.$image->product_pictures;
								} else {
									$path =base_url().'template/assets/img/inconu.png';	
				            	}
							
						}
					
					
					  ?>
                        
					 <div class="row block-proudct" >
					 <div class="col-md-4 col-sm-4 col-lg-4 block_order_<?php echo $orders->order_id;?>" >
					 <?php if($path){ ?>
						<img data-dz-thumbnail=""  alt="avatar" id="block-image-banners" src="<?php echo $path; ?>" class="img-responsive">
						
						<?php } ?>
					 </div>
					  <div class="col-md-8 col-sm-8 col-lg-8 info-product" >
					  <h2 style="font-weight: bolder;"><?php echo $detail->product_name;?></h2>
					   <div class="poid-price"><span class="poid"><?php echo $detail->orders_detail_product_poids * $detail->product_quantity;?> kg</span>    <span class="price">€ <?php echo (number_format($detail->order_product_price_buying  * $detail->product_quantity, 2, ',', '')) ;?></span></div>
					  
					 </div>
					
					  </div>
					  
					  	<?php $i++;} endforeach; ?>
					 </div>
					 	 <div class="col-md-12 col-sm-12 col-lg-12 " >
					   <div class="row action accepte-<?php echo $orders->order_id;?>  <?php if($orders->order_partener_status==1){ echo 'hidden_block';} ?> " >
					  <div class="col-md-5 col-sm-5 col-lg-5" style="text-align: center;" >
					<span class=" btn btn-outline btn-primary price_total background_<?php echo $orders->order_id;?> <?php echo $background; ?>"> € <?php echo (number_format($orders->order_total_price_buying, 2, ',', ''))."" ?></span>
					</div>
					  <div class="col-md-7 col-sm-7 col-lg-7" >
					  <a class=" background_<?php echo $orders->order_id;?> <?php echo $background; ?>" href="<?php echo base_url().'comptedPartener/detailOrder/'.$orders->order_id;?>" class="position_text"><button type="button" class="btn btn-outline btn-primary <?php echo $background; ?> background_<?php echo $orders->order_id;?> show-order">VOIR LA FICHE <i class="glyphicon glyphicon-chevron-right flesh"></i></button> </a>
							
					   </div>
					  </div>    
    
					  
					    <div class="row action not-accepte-<?php echo $orders->order_id;?>  <?php if($orders->order_partener_status!=1){ echo 'hidden_block';} ?> "  style="margin-top: 1px;" >
					  <div class="col-md-6 col-sm-6 col-lg-6" style="text-align: center;" >
					  <button type="button" class="btn btn-outline btn-primary background_green is_accepte" data-id="<?php echo $orders->order_id;?>" style="position: relative;top: -10px;">ACCEPTER  </button>
					</div>
					  <div class="col-md-6 col-sm-7 col-lg-6"  style="text-align: center;" >
					 	<button type="button" class="btn btn-outline btn-primary background_red  is_not_accepte" data-id="<?php echo $orders->order_id;?>"style="position: relative;top: -10px;"> REFUSER </button>
					   </div>
					  </div>
					   <div class="row countdown-<?php echo $orders->order_id;?> " <?php if($orders->order_partener_status!=2){ echo 'style="height: 55px;opacity:0!important;"';} else { echo 'style="height: 55px;"'; } ?>   >
					  		<?php  $order_dispo= strtotime($orders->order_dispo_time.' '.$orders->order_dispo_date);   ?> 
							
						         
                            <?php if($orders->order_dispo_date==date("Y-m-d") and  time() < $order_dispo){ ?>
					
					   <div class="alert_livraison_dispo" role="alert">   Le passage du livreur est attendu aujourd'hui à <?php  echo $orders->order_dispo_time;?> </div>
					   <?php } elseif(time() > $order_dispo) { ?>
					
                           <div class="alert_livraison" role="alert">   Livraison dépassée </div>
					  
					   <?php } else { ?>
					    <div  class="countdown-min countdown-small" data-countdown="<?php  echo $orders->order_dispo_date;?> <?php  echo $orders->order_dispo_time;?> "></div>
					   <?php } ?>
					 
					 </div>
					 </div>
					  
				</div>
				</div>
				 
				 <?php  } endforeach; ?>
				
				  <?php  } else { ?>
				 <p class="message_resulte_null">Aucune  commande trouvée </p>
				   <?php  }  ?>
</div>

<div class="row">
      <div class="col-lg-12">
	 						
    

	  <div style="text-align:center;margin-bottom:10px;">
   <?=$pagination;?>
  
  </div>
        </div>
      </div>
</div>
	<div aria-hidden="true" aria-labelledby="myModalConfirm" role="dialog" tabindex="-1" id="myModalConfirm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">Fermer</button>
					<h4 class="modal-title">Confirmation de commande </h4>
				</div>
				<div class="modal-body">
					
					<div class="alert alert-warning">                
						Le livreur peut passer le  : 
						
							</div>
								<input type="hidden" class="order_id"  id="order_id">
								<div class="message_dispo"></div>
		<div class="row">
						
							<div class="col-md-5 col-sm-5">
							<select id="day" name="day" class="form-control  btn-xs">
							<option value=""> Selectionnez ...</option>
							<option value="0">Aujourd'hui</option>
							<option value="1">Demain   <?php  echo date_fr_day(date( "Y-m-d", strtotime( "+1 day" ))) ; echo date_check_day(1) ;?></option>
							<option value="2">Le  <?php echo date_fr_day(date( "Y-m-d", strtotime( "+2 day" )));  echo date_check_day(2);?> </option>
							<option value="3"> <?php echo date_fr_day( date( "Y-m-d", strtotime( "+3 day" )));echo date_check_day(3); ?></option>
							 <option value="4"> <?php echo date_fr_day( date( "Y-m-d", strtotime( "+4 day" )));  echo date_check_day(4); ?></option>
							</select>
							</div>
							<label  class="col-md-1 col-sm-1 control-label date_t" style="position: relative;top: 10px;">à</label> 
							<div class="col-md-3 col-sm-3">
								 <input type="time" class="form-control"  id="order_dispo_time"  name="order_dispo_time" value="" />
						</div>
						<div class="col-md-3 col-sm-3"> 	<a  data-url="" class="confirm btn btn-success btn-small" type="button" > <i class="fa fa-check"></i> Confirmer</a> 	</div>
							
						</div>
				
				</div>
				<div class="modal-footer">
				
				
					
				</div>
			</div>
		</div>
	</div>
	   
	 <script src="<?php echo base_url().'template/';?>countdown.js"></script>
	 <script>
        /* Only for Demo proposal */
        
    </script>
<script type="text/javascript">


		
		$(".is_not_accepte").click(function () {
			
			  $(".message").html('');
			var order_id =$(this).attr('data-id');;
			
            var order_partener_status   = 4;
			
			jQuery.ajax({
				url: "<?php echo base_url().'comptedPartener/update_order_partener_status/';?>",
				data: {order_id:order_id,order_partener_status:order_partener_status},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
				
				$('.block_order_'+data.order_id).css('display','none');
				}
			});
			
			});
      
	   $(".modalconfirm").click(function () {
		var product_id=$(this).attr('data-id');
		jQuery('.url').val(product_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
	
		$(".is_accepte").click(function () {
			
			  
			var order_id =$(this).attr('data-id');
			jQuery('.order_id').val(order_id);
		    jQuery('#myModalConfirm').modal('show');
           // var order_partener_status   = 3;
			
		/*	jQuery.ajax({
				url: "<?php echo base_url().'comptedPartener/update_partener_status/';?>",
				data: {order_id:order_id,order_partener_status:order_partener_status},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
				
				$('.block_title_'+order_id).css('data-id');;
				}
			});*/
			
			});
			let mainClass = '.countdown';
			let OffsetLocation = 2;

			let runningClass = '.running'; //optinonal
			let endedClass = ".ended"; //optional

			// END CONFIG


			//init
			let date, fixTime, index = 0, extraClass, initText, zeroPad;
					
		$(".confirm").click(function () {
			
			  $(".message_dispo").html('');
			var order_id = $(".order_id").val();
			var order_dispo_time   = $("#order_dispo_time").val();
            var day   = $("#day").val();
			if(day=="" || order_dispo_time==""  ) { 
			$(".message_dispo").text('Veuillez remplir le champ');
			 } else {			
		   
			  jQuery.ajax({
									url: "<?php echo base_url().'comptedPartener/dipsoOrder/';?>",
									data: {order_id:order_id,order_dispo_time:order_dispo_time,day:day},
									dataType: "json",
									type: "POST",  
									success: function(data) { 
									 jQuery('.message_dispo').text('Enregistrement avec succès');
									setTimeout(function(){
                                        jQuery('.img-'+order_id).attr("src", "<?php echo base_url().'template/assets/img/commande-encours-petit.png';?>");
										jQuery('.partener_status-'+data.order_id).text('Commande en cours');
										jQuery('.text_color-'+data.order_id).removeClass('title_blue');
										jQuery('.info-'+data.order_id).css('dipsplay','none');
										jQuery('.badge-ordre-'+data.order_id).removeClass('background_blue');
										
									    jQuery('.badge-ordre-'+data.order_id).addClass('background_yellow');
										jQuery('.badge-ordre-'+data.order_id).css('opacity','1');
										jQuery('.info-'+data.order_id).css('opacity','0');
										jQuery('.text_color-'+data.order_id).addClass('title_yellow');
										jQuery('.background_'+data.order_id).removeClass('background_blue');
									    jQuery('.background_'+data.order_id).addClass('background_yellow');
										jQuery('.not-accepte-'+data.order_id).addClass('hidden_block');
										jQuery('.accepte-'+data.order_id).removeClass('hidden_block');
                                      //  countdowns();
									  if(data.isday){ 
									   $('.hero_count_'+data.order_id).html('<div class="alert_livraison_dispo" role="alert">Le passage de livraison est attendu aujourdhui à '+data.order_dispo_time+' </div>');
									  }else{
									  
									   $('.hero_count_'+data.order_id).attr('data-date', data.order_dispo);
				
										$(mainClass).each(function () { //for each countdown instance
													index++;
													date = $('.hero_count_'+data.order_id).attr('data-Date');
													fixTime = $('.hero_count_'+data.order_id).attr('data-fixTime');
													zeroPad = $('.hero_count_'+data.order_id).attr('data-zeroPad');
													extraClass = 'd_' + index;

													$(this).addClass(extraClass); //add a class to recognize each counter
													$(this).css('display','block'); //allow to start hidding the class to avoid a bad effect until js is loading

													if (fixTime != undefined) date = getFixDate(fixTime);

													//get init text with or whitout an extra Class
													if ($('.' + extraClass + ' ' + runningClass + ' timer').length) {
													initText = $('.' + extraClass + ' ' + runningClass + ' timer').text();
													} else {
													initText = $(this).text();
													}
													//show and hide classes
													$('.' + extraClass + ' ' + runningClass).css('display', 'block');
													$('.' + extraClass + ' ' + endedClass).css('display', 'none');

													//call main function
													dateReplace(extraClass, date, fixTime, initText, zeroPad); //prevent delay for the first time
													setInterval(dateReplace, 1000, extraClass, date, fixTime, initText, zeroPad);
										});
									  }
									 
									  




										jQuery('.countdown-'+data.order_id).css('opacity','1');
										jQuery('#myModalConfirm').modal('hide');

									}, 2000);
									}
										 
										});
			}
			});
			$('[data-countdown]').each(function() {
			var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
			$this.html(event.strftime('%D Jours %H:%M:%S'));
			});
	 	});
		
	
			function countdowns(){
			$('[data-countdown]').each(function() {
			var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
			$this.html(event.strftime('%D Jours %H:%M:%S'));
			});
	 	});
		}
		
		function timeDistance(date, fixTime) {
        var date1 = new Date(date);
        let date2, d, utc;

        d = new Date();
        utc = d.getTime() + (d.getTimezoneOffset() * 60000);
        if (fixTime != undefined) date2 = new Date;
        else date2 = new Date(utc + (3600000 * OffsetLocation));

        var diff = date1.getTime() - date2;
        var msec = diff;
        var hh = Math.floor(msec / 1000 / 60 / 60);
        msec -= hh * 1000 * 60 * 60;
        var mm = Math.floor(msec / 1000 / 60);
        msec -= mm * 1000 * 60;
        var ss = Math.floor(msec / 1000);
        msec -= ss * 1000;
        var dd = Math.floor(hh / 24);
        if (dd > 0) {
            hh = hh - (dd * 24);
        }
        return [dd, hh, mm, ss];
    }
   function dateReplace(extraClass, date, fixTime, initText, zeroPad) {
        let dif = timeDistance(date, fixTime);
        let text = initText;
        let zeroPadArr = [];
        if (dif[0] < 0 || dif[1] < 0 || dif[2] < 0 || dif[3] < 0) {
            //countdown ended
            let endText = $('.' + extraClass).attr('data-endText');
            if (endText != undefined) { //case data-endText attr
                $('.' + extraClass).text(endText);
            } else { //case with two blocks
                $('.' + extraClass + ' ' + runningClass).css('display', 'none');
                $('.' + extraClass + ' ' + endedClass).css('display', 'block');
            }

        } else {

            //Zero-pad
           if(zeroPad != undefined) zeroPadArr = JSON.parse(zeroPad);

            if (zeroPadArr['Days'] != "false") dif[0] = String(dif[0]).padStart(2, '0');
            if (zeroPadArr['Hours'] != "false") dif[1] = String(dif[1]).padStart(2, '0');
            if (zeroPadArr['Minutes'] != "false") dif[2] = String(dif[2]).padStart(2, '0');
            if (zeroPadArr['Seconds'] != "false") dif[3] = String(dif[3]).padStart(2, '0');

            //replace text with or without extra class

            //whith extras Class
            if ($('.' + extraClass + ' ' + runningClass + ' timer').length) {
                $('.' + extraClass + ' ' + runningClass + ' timer .days').text(dif[0]);
                $('.' + extraClass + ' ' + runningClass + ' timer .hours').text(dif[1]);
                $('.' + extraClass + ' ' + runningClass + ' timer .minutes').text(dif[2]);
                $('.' + extraClass + ' ' + runningClass + ' timer .seconds').text(dif[3]);

            } else {

                //replace parts without extra Class
                text = text.replace('(days)', dif[0]);
                text = text.replace('(hours)', dif[1]);
                text = text.replace('(minutes)', dif[2]);
                text = text.replace('(seconds)', dif[3]);
                $('.' + extraClass).text(text);
            }
            pluralization(extraClass, dif);

        }
    }
    function getFixDate(fixTime) {
        let getFixTimeDate = 0;

        var fixTimeDate = JSON.parse($('.' + extraClass).attr('data-fixTime'));
        if (fixTimeDate['Days'] != undefined) { getFixTimeDate += +fixTimeDate['Days'] * 60 * 24; }
        if (fixTimeDate['Hours'] != undefined) { getFixTimeDate += +fixTimeDate['Hours'] * 60; }
        if (fixTimeDate['Minutes'] != undefined) getFixTimeDate += +fixTimeDate['Minutes'];

        var now = new Date();
        now.setMinutes(now.getMinutes() + getFixTimeDate); // timestamp
        date = new Date(now); // Date object

        return date;
    }

    // Note this *is* JQuery, see below for JS solution instead
    function replaceText(selector, text, newText, flags) {
        var matcher = new RegExp(text, flags);
        $(selector).each(function () {
            var $this = $(this);
            if (!$this.children().length)
                $this.text($this.text().replace(matcher, newText));
        });
    }

    function pluralization(extraClass, dif) {
        //pluralization
        if (dif[0] == 1) replaceText('.' + extraClass, 'p_days', 'Day', 'g');
        else replaceText('.' + extraClass, 'p_days', 'Days', 'g');

        if (dif[1] == 1) replaceText('.' + extraClass, 'p_hours', 'Hour', 'g');
        else replaceText('.' + extraClass, 'p_hours', 'Hours', 'g');

        if (dif[2] == 1) replaceText('.' + extraClass, 'p_minutes', 'Minute', 'g');
        else replaceText('.' + extraClass, 'p_minutes', 'Minutes', 'g');

        if (dif[3] == 1) replaceText('.' + extraClass, 'p_seconds', 'Second', 'g');
        else replaceText('.' + extraClass, 'p_seconds', 'Seconds', 'g');
    }
			</script>

