    <div style="text-align:right;margin-bottom:10px;">
  
  		
    
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'attributsValues';?>'"><i class="icon-refresh"></i> Recharger</button>
              		
   <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'attributsValues/add/';?>'"><i class="icon-plus"></i> Nouvelle valeur</button>
  
</div>

		 <div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">List des valeurs </header>
      <table class="table table-striped border-top" id="">

              <thead>
                <tr>
                
                <th class="sub_col">Nom</th>
				 <th class="sub_col">Attributs</th>
				     <th class="sub_col" >Statut</th>
                  <th class="sub_col" >Actions</th>
                </tr>
              </thead>
              <tbody>
		  <?php foreach ($attributs_values_list as $values): 
							
							        if($values->attribut_value_data_status==1){$label='label-success';$data_status='Activer';}
					            	if($values->attribut_value_data_status==0){$label='label-danger';$data_status='Désactiver';}
									
									
						?>
               <tr class="supp-<?php  echo $values->attribut_value_id;?>"> 
					
						
					   <td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $values->attribut_value;?> </span> </td>
					    	<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $values->attribut_name;?> </span> </td>
					    
							<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $values->attribut_value_id;?> label <?php echo $label;?>"><?php echo $data_status;?></span></td>
			        
							<td class="text-center">
								<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select id="ddlCreditCardTypeTab" data-id="<?php echo $values->attribut_value_id;?>" name="ddlCreditCardTypeTab" class="form-control changesatus btn-xs">
										<option <?php  if($values->attribut_value_data_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($values->attribut_value_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
							<a href="<?php echo base_url().'attributsValues/edit/0/'.$values->attribut_value_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $values->attribut_value_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
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
			var attribut_value_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'attributsValues/updatestatus/';?>",
				data: {attribut_value_id:attribut_value_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+attribut_value_id).empty();

						if(idsatus == 1){$( '.span-'+attribut_value_id ).removeClass( "label-danger label-warning" );$( '.span-'+attribut_value_id ).addClass( "label-success" );$('.span-'+attribut_value_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+attribut_value_id ).removeClass( "label-success label-warning" );$( '.span-'+attribut_value_id ).addClass( "label-danger" );$('.span-'+attribut_value_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	 $(".modalconfirm").click(function () {
			var attribut_value_id=$(this).attr('data-id');
	
		jQuery('.url').val(attribut_value_id);
		jQuery('#myModalConfirm').modal('show');
	
		//$(".modal-body").append(html);
		
	});
	
	$(".suppconfirm").click(function () {
			var attribut_value_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'attributsValues/delete/';?>",
				data: {attribut_value_id:attribut_value_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+attribut_value_id ).remove();

						}  
				}
			});
			
		});

</script>