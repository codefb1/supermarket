    <div class="page-title"> 
	
	       <div class="title">Gestion des commandes</div>

	
	</div>
	
		  <div class="row" style="padding-bottom: 10px;">
		   <div class="pull-right">
	   <a  class="no-print"href="<?php echo base_url().'orders';?>">  
			  <button type="button" class="btn btn-primary no-print "><i class="fa fa-reply"></i> Liste des commandes </button></a>
			
			</div>
		</div>

		
				 <div class="row" style="padding-bottom: 10px;">
		  <div class="card-header">
         Recherche des commandes 
			 
          </div>
		  <div class="card-block card bg-white">
				  <form class="form-horizontal" id="submitexport" role="form" method="POST" action="<?=base_url().'orders/search';?>">
				     <input class="form-control " id="search" name="search"  type="hidden" value="1"/>

				   <?php if($this->input->get('error') == 999) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>
					<div class="alert alert-warning alert_date"  style="display:none"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Il faut choisir une  date ou définir un intervalle</div>
				 <div class="form-group">
                    <label class="col-sm-2 control-label">Sources</label>
                    <div class="col-sm-1">
                      <select class="form-control" name="order_source">
					    <option value="">Tous</option>
                        <!--<option value="0">Site</option>-->
						 <?php foreach ($landingpages_list as $landingpages):?>
                        <option   value="<?php echo $landingpages->	lp_id ?>" <?php if($order_source == $landingpages->	lp_id)echo "selected";?> ><span> <?php echo $landingpages->lp_name ?></span></option>
					  <?php endforeach; ?>
                      </select>
                    </div>
                 </div>
				  	   <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                 <input class="form-control " id="customer_email" name="customer_email" placeholder="E-mail" type="text"  value="<?php  echo $customer_email;?>"/>
                    </div>
                 </div>
				   	   <div class="form-group">
                    <label class="col-sm-2 control-label">ID Client </label>
                    <div class="col-sm-8">
                 <input class="form-control " id="customer_base64_id" name="customer_base64_id" placeholder="ID Client" type="text"  value="<?php  echo $customer_base64_id;?>"/>
                     <p class="help-block">Ex: d64e09f92292524 </span></p>
					</div>
                 </div>
                 <div class="form-group">
				       <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-2">
                      <select class="form-control date_selected" name="date_selected">
					    <option value="">Choisir une date </option>
								<option value="1" <?php if($date_selected == 1)echo "selected";?> >Aujourd'hui</option>
										<option value="2" <?php if($date_selected == 2)echo "selected";?> >Cette semaine</option>
										<option value="3" <?php if($date_selected == 3)echo "selected";?> >Le mois en cours</option>
										<option value="4" <?php if($date_selected == 4)echo "selected";?>  >Les 3 derniers mois</option>
										<option value="5" <?php if($date_selected == 5)echo "selected";?>  >Cette année </option>
					
					
				 
                      </select>
                    </div>
				  
				    
                    <label class="col-sm-1 control-label">Date : de </label>
                    <div class="col-sm-2">
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control date_debut" id="date" name="date_debut" placeholder="MM/DD/YYYY" type="text" value="<?php  echo $date_debut;?>"/>
       </div>
                    </div>
					 <label class="col-sm-1 control-label" style="text-align: center;"> à </label>
					         <div class="col-sm-2">   
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
 
        <input class="form-control date_fin" id="date" name="date_fin" placeholder="MM/DD/YYYY" type="text" value="<?php  echo $date_fin;?>"/>
       </div>
	   
	
                    </div>
					
					 	
                  </div>
				  
				  			    	 <div class="form-group">
                       <label class="col-sm-2 control-label">Mode de paiement </label>
                    <div class="col-sm-1">
                      <select class="form-control" name="order_payment_method">
					   <option value="">Tous</option>
						<option value="1" <?php if($order_payment_method == 1)echo "selected";?> >Paypal</option>
						<option value="2" <?php if($order_payment_method == 2)echo "selected";?>>Ogone</option>
						<option value="3" <?php if($order_payment_method == 3)echo "selected";?> >Chèque</option>
                     
                      </select>
                    </div>
                 </div>
				     	 <div class="form-group">
                       <label class="col-sm-2 control-label">Statut </label>
                    <div class="col-sm-1">
                      <select class="form-control" name="order_payment_status">
					   <option value="">Tous</option>
					   	<option value="0" <?php if($order_payment_status == 0)echo "selected";?> >Abandon de panier</option>
						<option value="2" <?php if($order_payment_status == 2)echo "selected";?> >Paiement accepté</option>
						<option value="6" <?php if($order_payment_status == 6)echo "selected";?> >Paiement en attente</option>
						<option value="1" <?php if($order_payment_status == 1)echo "selected";?> >Paiement refusé</option>
                
                
                      </select>
                    </div>
                 </div>
			
				      </form>
				   <div class="row" style="text-align: center;">
				    <button  class="btn btn-success export pull-left"><i class="fa fa-search"> </i> Recherche</button>
					 </div>
					  </div>
					  

				   
	
				
			
				  	</div>
        <div class="card bg-white">
          <div class="card-header">
            Liste des commandes
			 
          </div>
         <div class="card-block">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
				<th style="text-align: center;" >Date</th>
				<th style="text-align: center;" >Provenance</th>
				<th>Client </th>
				<th style="text-align: center;" >Montant</th>
                <th style="text-align: center;" >Mode</th>
				<th style="text-align: center;" >Statut</th>
				<th style="text-align: center;" >Actions</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach ($orders_list as $orders): 
							

				if($orders->order_payment_status==0){$label='label-danger';$status='Abandon de panier';}			
			 if($orders->order_payment_status==6){$label='label-warning';$status='Paiement en attente';}
            if($orders->order_payment_status==1){$label='label-danger';$status='Paiement refusé';}
			if($orders->order_payment_status==2){$label='label-success';$status='Paiement accepté';}
            if($orders->order_payment_status==5){$label='label-danger';$status='Commande annulée ';}
            if($orders->order_payment_status==4){$label='label-success';$status='Commande expédiée';}
            if($orders->order_payment_status==3){$label='label-warning';$status='Commande en préparation';}
			if($orders->order_source==0){$source='Site';}else {$source=$orders->lp_name;}
			if($orders->order_payment_method==1){$mode='Paypal';}		
			if($orders->order_payment_method==2){$mode='Ogone';}	
			if($orders->order_payment_method==3){$mode='Chèque';}
	        if($orders->order_payment_method==0){$mode='Aucun';}			
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
							<td><?php  echo $orders->order_id;?></td>
								<td style="text-align: center;" ><?php echo date_fr($orders->orders_data_created);?></td>
											<td style="text-align: center;" ><?php echo $source; ?></td>
						       <td ><?php echo $orders->customer_firstname.' '.$orders->customer_lastname ;?>
							   		 <p class="help-block"><span class="label label-success"><i class="icon-envelope"></i>  <?php  echo $orders->customer_email;?> </span></p>
							   		 <p class="help-block"><span class="label label-danger"><i class="fa fa-unlock-alt"></i> <?php  echo $orders->customer_base64_id;?> </span></p>
					
					
							   </td>
							<td style="text-align: center;" ><?php echo (number_format($orders->order_amount, 2, ',', ''))."  €" ?></td>
					 	   <td style="text-align: center;" ><?php echo $mode;?></td>
							<td style="text-align: center;" ><span  class="span-<?php  echo $orders->order_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			          
			           
							<td class="text-center">
								<div role="group" aria-label="Basic example" class="btn-group btn-group-sm" style="">
										
											<?php if($orders->order_payment_method==3){?>	
										<select id="ddlCreditCardTypeTab" data-id="<?php echo $orders->order_id;?>" name="ddlCreditCardTypeTab" class="form-control changesatus btn-xs">
										<option <?php  if($orders->order_payment_status==2){ echo"selected";} ?> value="2">Paiement accepté</option>
										<option <?php  if($orders->order_payment_status==6){ echo"selected";} ?> value="6">Paiement en attente</option>
										<option <?php  if($orders->order_payment_status==1){ echo"selected";} ?> value="1">Paiement refusé</option>
							
									</select>
								<?php } ?>
								<a href="<?php echo base_url().'orders/edit/0/'.$orders->order_id;?>"><i class="icon-pencil"></i></a>
								
							</div>
							</td>
						</tr>
						<?php endforeach; ?>
              </tbody>
            </table>
          </div>
		   <?=$pagination;?>
        </div>

	
	

		
	  <!-- page scripts -->
	
					  <script>
	$(document).ready(function(){
		var date_input=$('input[name="date_debut"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
				  <script>
	$(document).ready(function(){
		var date_input=$('input[name="date_fin"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

<script type="text/javascript">

$(document).ready(function () {
	
	$(".export").click(function () {

/*var date_selected  =jQuery('.date_selected').val();
//var date_debut  =jQuery('.date_debut').val();
//var date_fin  =jQuery('.date_fin').val();

if(!date_selected && !date_debut && !date_fin){

	jQuery('.alert_date').css("display", "block");

}else {
	$( "#submitexport" ).submit();
	
	}*/
	
	$( "#submitexport" ).submit();
});

});
	
</script>
<script type="text/javascript">

$(document).ready(function () {


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var order_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'orders/updatestatus/';?>",
				data: {order_id:order_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
						//	$('.msg').show(0).delay(7000).hide(200);
						});					
						//$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+order_id).empty();

						if(idsatus == 6){$( '.span-'+order_id ).removeClass( "label-success" );$( '.span-'+order_id ).removeClass( "label-danger" );$( '.span-'+order_id ).addClass( "label-warning" );$('.span-'+order_id).append('Paiement en attente'); }
						if(idsatus == 2){$( '.span-'+order_id ).removeClass( "label-warning" );$( '.span-'+order_id ).removeClass( "label-danger" );$( '.span-'+order_id ).addClass( "label-success" );$('.span-'+order_id).append('Paiement accepté'); }
						if(idsatus == 1){$( '.span-'+order_id ).removeClass( "label-warning" );$( '.span-'+order_id ).removeClass( "label-success" );$( '.span-'+order_id ).addClass( "label-danger" );$('.span-'+order_id).append('Paiement refusé'); }
						
						
						
						
						} 
				}    
			});
		});
});
	
</script>