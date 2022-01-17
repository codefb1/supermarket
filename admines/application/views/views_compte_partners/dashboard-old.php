 
 <div class="panel panel-default">
 <h2 class="page_title" style="text-align: left;"><?php echo date_fr_lettre();?> </h2>
  <h2 class="page_title" style="text-align: center;text-transform: uppercase;"> <?php echo $partener->partener_lastname;?> <?php echo $partener->partener_city;?> </h2>
 
          <div class="row " style="font-size: 14px;margin-left: 10px;color:#64b92a;font-weight: bold;">
<i class="ion-navicon-round"></i> Nouvelle commandes
			 
          </div>
 <div class="table-responsive">
  <table class="table info_table table-hover" id="">
              <thead>
             
                <tr>
            
				 <th >Numéro </th>
				<th>Date/Heure</th>
				
				<th>Client</th>
				<th>Ville Client</th>
				
				<th>Panier</th>
				<th >Montant</th>
				
				<th  >Actions</th>
                </tr>
              </thead>
              <?php foreach($orders_new_list as $orders) :
			  
		
						$orders_detail = $this->M_orders->get_orders_detail($orders->order_id);
						if($orders->order_partener_status==1){$partener_status='Non lue';}		
						if($orders->order_partener_status==2){$partener_status='En cours de préparation';}	
						if($orders->order_partener_status==3){$partener_status='Livré';}
						if($orders->order_partener_status==4){$partener_status='Réfuser';}
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			   		<td class="sub_col" > <span class="position_text"> <?php echo $orders->order_reference;?> </span> </td>
					
			   	 			<td class="sub_col" > <span class="position_text" >  <div> <?php echo date_fr($orders->order_data_created);?> </div><div> <?php echo date_fr_heur($orders->order_data_created);?><div> </span> </td>
					
			    			<td class="sub_col" > <span class="position_text"> <?php echo $orders->customer_firstname.' '.$orders->customer_lastname;?> </span> </td>
							<td class="sub_col" > <span class="position_text"> <?php echo $orders->order_billing_city;?> </span> </td>
							<td class="sub_col" >
                            <?php foreach($orders_detail as $detail) :?>
                             <div style="position: relative;top:5px;text-align: left;"><?php echo $detail->product_quantity;?> <?php echo $detail->product_name;?> </div> 
							<?php endforeach; ?>
							 </td> 
							<td class="sub_col" > <span class="position_text"> <?php echo (number_format($orders->order_amount, 2, ',', ''))."  €" ?> </span> </td>
				     
				
				<td class="sub_col">
				
				        	<a href="<?php echo base_url().'comptedPartener/detailOrder/'.$orders->order_id;?>"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-eye-open"></i></button></a>
							
				   
				  
				  </td>
              </tr>
              <?php endforeach; ?>
            </table>
        <div class="row " style="font-size: 14px;margin-left: 10px;color:#64b92a;padding-top: 20px;font-weight: bold;">
           <i class="ion-navicon-round"></i>  Commandes  en attende de préparation / en cours de préparation
			 
			 
          </div>
		   <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
            
				  <th><span style="">Numéro </span></th>
				<th >Date/Heure</th>
				
				<th>Client</th>
				<th>Ville Client</th>
				
				<th>Panier</th>
				<th >Montant</th>
				
				<th  >Statut</th>
			
                </tr>
              </thead>
              <?php foreach($orders_preparete_list as $orders) :
			  
		
						$orders_detail = $this->M_orders->get_orders_detail($orders->order_id);
						if($orders->order_partener_status==1){$partener_status='Non lue';}		
						if($orders->order_partener_status==2){$partener_status='En cours de préparation';}	
						if($orders->order_partener_status==3){$partener_status='Livré';}
						if($orders->order_partener_status==4){$partener_status='Réfuser';}
						?>
               <tr class="supp-<?php  echo $orders->order_id;?>"> 
			   		<td class="sub_col" > <span class="position_text"> <?php echo $orders->order_reference;?> </span> </td>
					
			   	 			<td class="sub_col" > <span class="position_text">  <div> <?php echo date_fr($orders->order_data_created);?> </div><div> <?php echo date_fr_heur($orders->order_data_created);?><div> </span> </td>
					
			    			<td class="sub_col" > <span class="position_text"> <?php echo $orders->customer_firstname.' '.$orders->customer_lastname;?> </span> </td>
							<td class="sub_col" > <span class="position_text"> <?php echo $orders->order_billing_city;?> </span> </td>
							<td class="sub_col" >
                            <?php foreach($orders_detail as $detail) :?>
                             <div style="position: relative;top:5px;text-align: left;"><?php echo $detail->product_quantity;?> <?php echo $detail->product_name;?> </div> 
							<?php endforeach; ?>
							 </td>
							<td class="sub_col" > <span class="position_text"> <?php echo (number_format($orders->order_amount, 2, ',', ''))."  €" ?> </span> </td>
				      

					
				<td class="sub_col">
				
				        	<a href="<?php echo base_url().'comptedPartener/detailOrder/'.$orders->order_id;?>"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-eye-open"></i></button></a>
							
				   
				  
				  </td>
              </tr>
              <?php endforeach; ?>
            </table>
			
			
			
			
		  
		           
		   
		   