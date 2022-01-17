    <div class="page-title">
          <div class="title">Gestion des commandes</div>

        </div>
		<!--
			  <div class="row" style="padding-bottom: 10px;">
		   <div class="pull-right">
		    	    <a href="<?php echo base_url().'exports/exportpdfordres';?>">  <button class="btn  btn-success tooltips"><i class="fa fa-file-pdf-o"> </i> Exporter les commandes en pdf</button></a>
	
		    <a href="<?php echo base_url().'exports/exportordres';?>">  <button class="btn  btn-success tooltips"><i class="fa fa-file-excel-o"> </i> Exporter les commandes en xls</button></a>
	

			</div>
		</div>-->
		
				 <div class="row" style="padding-bottom: 10px;">
		  <div class="card-header">
            Exporter les commandes 
			 
          </div>
		  <div class="card-block card bg-white">
				  <form class="form-horizontal" id="submitexport" role="form" method="POST" action="<?=base_url().'orders/exportorders';?>">
				   	<?php if($this->input->get('error') == 999) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>
					<div class="alert alert-warning alert_date"  style="display:none"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Il faut choisir une  date ou créer une intervalle de date. </div>
					 <div class="form-group">
                    <label class="col-sm-2 control-label">Landing pages</label>
                    <div class="col-sm-1">
                      <select class="form-control" name="order_source">
					    <option value="">Tous</option>
                        <!--<option value="0">Site</option>-->
						 <?php foreach ($landingpages_list as $landingpages):?>
                        <option   value="<?php echo $landingpages->	lp_id ?>"><span> <?php echo $landingpages->lp_name ?></span></option>
					  <?php endforeach; ?>
                      </select>
                    </div>
                 </div>
				  	   <div class="form-group">
                    <label class="col-sm-2 control-label">Civilité</label>
                    <div class="col-sm-1">
                      <select class="form-control" name="customer_civility">
					    <option value="">Tous</option>
                        <option value="Mlle">Mlle</option>
                        <option value="Mme">Mme</option>
                     <option value="M">M</option>
                      </select>
                    </div>
                 </div>
                 <div class="form-group">
				       <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-2">
                      <select class="form-control date_selected" name="date_selected">
					    <option value="">Choisir une date </option>
										<option value="1">Aujourd'hui</option>
										<option value="2">Cette semaine</option>
										<option value="3">Le mois en cours</option>
										<option value="4"> Les 3 derniers mois</option>
										<option value="5">  Cette année </option>
					
				 
                      </select>
                    </div>
				  
				    
                    <label class="col-sm-1 control-label">Date : de </label>
                    <div class="col-sm-2">
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control date_debut" id="date" name="date_debut" placeholder="MM/DD/YYYY" type="text"/>
       </div>
                    </div>
					 <label class="col-sm-1 control-label" style="text-align: center;"> à </label>
					         <div class="col-sm-2">   
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
		
		   
        <input class="form-control date_fin" id="date" name="date_fin" placeholder="MM/DD/YYYY" type="text"/>
       </div>
	   
	
                    </div>
					
					 	
                  </div>
				  
				  
				  	 <div class="form-group">
                       <label class="col-sm-2 control-label">Format</label>
                    <div class="col-sm-1">
                      <select class="form-control" name="format">
					    <option value="2">XLS</option>
                        <option value="1">PDF</option>
                    
                
                      </select>
                    </div>
                 </div>
				 
				      </form>
				   <div class="row" style="text-align: center;">
				    <button  class="btn btn-success export pull-left"><i class="fa fa-file-excel-o"> </i> Exporter</button>
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

				<th style="text-align: center;" >Status</th>
				<th style="text-align: center;" >Actions</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach ($orders_list as $orders): 
							

							
		
            if($orders->order_payment_status==1){$label='label-danger';$status='Paiement refusé';}
			if($orders->order_payment_status==2){$label='label-success';$status='Paiement accepté';}
            if($orders->order_payment_status==5){$label='label-danger';$status='Commande annulée ';}
            if($orders->order_payment_status==4){$label='label-success';$status='Commande expédiée';}
            if($orders->order_payment_status==3){$label='label-warning';$status='Commande en préparation';}
			 if($orders->order_source==0){$source='Site';}else {$source=$orders->lp_name;}
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
							<td><?php  echo $orders->order_id;?></td>
								<td style="text-align: center;" ><?php echo date_fr($orders->orders_data_created);?></td>
											<td style="text-align: center;" ><?php echo $source; ?></td>
						       <td ><?php echo $orders->customer_firstname.' '.$orders->customer_lastname ;?></td>
							<td style="text-align: center;" ><?php echo (number_format($orders->order_amount, 2, ',', ''))."  €" ?></td>
					
							<td style="text-align: center;" ><span  class="span-<?php  echo $orders->order_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			           
							<td class="text-center">
								<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
								<a href="<?php echo base_url().'orders/edit/0/'.$orders->order_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="icon-pencil"></i></button></a>
								
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

var date_selected  =jQuery('.date_selected').val();
var date_debut  =jQuery('.date_debut').val();
var date_fin  =jQuery('.date_fin').val();

if(!date_selected && !date_debut && !date_fin){

	jQuery('.alert_date').css("display", "block");

}else {
	$( "#submitexport" ).submit();
	
	}
});

});
	
</script>
