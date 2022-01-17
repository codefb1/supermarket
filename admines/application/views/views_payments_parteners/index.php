    <div style="text-align:right;margin-bottom:10px;">
	  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'paimentsPartners';?>'"><i class="icon-refresh"></i> Recharger</button>
   <a href="<?php echo base_url().'paimentsPartners/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvelle paiment</span></button></a>
 
</div>

<div class="col-sm-6">
  <h1 class="page_title">Paiments</h1>
  <p class="text-muted">Liste des paiments  partenaires</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  </div>
</div>

<?php if(@$us==1) {?>
<div class="alert alert-success alert-block fade in">
  <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
  <h4> <i class="icon-ok-sign"></i><strong>OK ! </strong> La liste des paiments a été mise à jour.</h4>
  
</div>
<?php }?>
<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	 
	  
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
              
				 <th>Numéro</th>
				<th >Date/Heure</th>
				<th>Partenaires</th>
				<th>Facutre</th>
				<th>Montant</th>
				<th>Epreuve</th>
                </tr>
              </thead>
              <?php foreach($payments_parteners_list as $payments_parteners) :
			  
		
						$orders_list = $this->M_payments_parteners->get_orders_list($payments_parteners->payment_partener_id);
						?>
						
               <tr class="supp-<?php  echo $payments_parteners->payment_partener_id;?>"> 
			   <td class="sub_col" > <span class="position_text"> 
			   <?php  echo $payments_parteners->payment_partener_id;?>
			   </span> </td>
					  
			   	 			<td class="sub_col" > <span class="position_text">  <div> <?php echo date_fr($payments_parteners->payment_date);?> </div><div> <?php echo date_fr_heur($payments_parteners->payment_date);?></div> </span> </td>
					 <td class="sub_col" > <span class="position_text"><div> <?php echo $payments_parteners->partener_lastname;?></div> <div>Tél.<?php echo $payments_parteners->partener_phone;?> </div> </span> </td> 
					  

					 <td class="sub_col" > <span class="position_text"> 
			    <?php foreach($orders_list as $orders) :?>
				  <div> Facture  <?php  echo $orders->order_id;?> Prix: <?php echo (number_format($orders->order_partener_amount, 2, ',', ''))."  euro" ?> </div>
									 <?php endforeach; ?>         
			   </span> </td>
					 <td class="sub_col" > <span class="position_text"> 
			   <?php echo (number_format($payments_parteners->payment_amount, 2, ',', ''))."  €" ?>
	                      
			   </span> </td>
			    <td class="sub_col" >
			   
			   <a  target="_blank" href="<?php echo base_url()."medias/payment_preuves/".$payments_parteners->payment_preuve; ?>" class="position_text"><button type="button" class="btn btn-outline btn-primary"><i class=" glyphicon glyphicon-download-alt"></i> Paiement Pdf </button></a>
				
			 </td>
			    			
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
          </div>
		     <div style="text-align:right;margin-bottom:10px;">
   <?=$pagination;?>
  
  </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
	<div aria-hidden="true" aria-labelledby="myModalConfirm" role="dialog" tabindex="-1" id="myModalConfirm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 1px solid #e6e6e6;">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Confirmation de suppression</h4>
				</div>
				<div class="modal-body">
					
					<div class="alert alert-warning">                
						Confirmez vous cette opération ? 
					</div>
				</div>
				<div class="modal-footer">
					<a  data-url="" class="suppconfirm btn btn-success btn-small" type="button" > <i class="fa fa-check"></i> Confirmer</a>
					<input type="hidden" class="url"  id="url">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
			</div>
		</div>
	</div>
	

<script type="text/javascript">

$(document).ready(function () {
 $(".modalconfirm").click(function () {
		var customer_id=$(this).attr('data-id');
		jQuery('.url').val(customer_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var customer_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'customers/delete/';?>",
				data: {customer_id:customer_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+customer_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var customer_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'customers/updatestatus/';?>",
				data: {customer_id:customer_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+customer_id).empty();

						if(idsatus == 1){$( '.span-'+customer_id ).removeClass( "label-danger label-warning" );$( '.span-'+customer_id ).addClass( "label-success" );$('.span-'+customer_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+customer_id ).removeClass( "label-success label-warning" );$( '.span-'+customer_id ).addClass( "label-danger" );$('.span-'+customer_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>