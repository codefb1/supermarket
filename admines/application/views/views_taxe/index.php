    <div style="text-align:right;margin-bottom:10px;">
  
  		
    
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'taxe';?>'"><i class="icon-refresh"></i> Recharger</button>
              		
   <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'taxe/add/';?>'"><i class="icon-plus"></i> Nouvelle valeur</button>
  
</div>

		 <div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">TVA </header>
      <table class="table table-striped border-top" id="">

              <thead>
                <tr>
                taxe_data_updated
                <th class="sub_col">Valeur (%)</th>
				 <th class="sub_col">Date de creation</th>
				 <th class="sub_col">Dérnier mise ajour </th>
				     <th class="sub_col" >Statut</th>
                  <th class="sub_col" >Actions</th>
                </tr>
              </thead>
              <tbody>
		  <?php foreach ($taxe_list as $taxe): 
							
							        if($taxe->taxe_data_status==1){$label='label-success';$data_status='Activer';}
					            	if($taxe->taxe_data_status==0){$label='label-danger';$data_status='Désactiver';}
									
						?>
               <tr class="supp-<?php  echo $taxe->taxe_id;?>"> 
					
						
					   <td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $taxe->taxe_value;?> </span> </td>
					    <td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo date_fr($taxe->taxe_data_created);?> </div><div> <?php echo date_fr_heur($taxe->taxe_data_created);?> </span> </td>
					   <td class="sub_col" > <span style="position: relative;top:5px;"><?php echo date_fr($taxe->taxe_data_updated);?> </div><div> <?php echo date_fr_heur($taxe->taxe_data_updated);?></span> </td>
					   
						<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $taxe->taxe_id;?> label <?php echo $label;?>"><?php echo $data_status;?></span></td>
			      
							<td class="text-center">
								<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select id="ddlCreditCardTypeTab" data-id="<?php echo $taxe->taxe_id;?>" name="ddlCreditCardTypeTab" class=" changesatus btn-xs">
										<option <?php  if($taxe->taxe_data_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($taxe->taxe_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
							<a href="<?php echo base_url().'taxe/edit/0/'.$taxe->taxe_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $taxe->taxe_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
							</td>
						</tr>
						<?php endforeach; ?>
              </tbody>
            </table>
          </div>
		    <?=$pagination;?>
        </section>
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
					<a  data-url="" class="suppconfirm btn btn-success btn-small" type="button" ><i class="fa fa-check"></i> Confirmer</a>
					<input type="hidden" class="url"  id="url">
					<button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-remove"></i> Quitter</button>
				</div>
			</div>
		</div>
	</div>
	  <!-- page scripts -->
	

<script type="text/javascript">

$(document).ready(function () {


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var taxe_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'taxe/updatestatus/';?>",
				data: {taxe_id:taxe_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+taxe_id).empty();

						if(idsatus == 1){$( '.span-'+taxe_id ).removeClass( "label-danger label-warning" );$( '.span-'+taxe_id ).addClass( "label-success" );$('.span-'+taxe_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+taxe_id ).removeClass( "label-success label-warning" );$( '.span-'+taxe_id ).addClass( "label-danger" );$('.span-'+taxe_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	 $(".modalconfirm").click(function () {
			var taxe_id=$(this).attr('data-id');
	
		jQuery('.url').val(taxe_id);
		jQuery('#myModalConfirm').modal('show');
	
		//$(".modal-body").append(html);
		
	});
	
	$(".suppconfirm").click(function () {
			var taxe_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'taxe/delete/';?>",
				data: {taxe_id:taxe_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+taxe_id ).remove();

						}  
				}
			});
			
		});

</script>