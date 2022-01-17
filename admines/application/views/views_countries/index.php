    <div style="text-align:right;margin-bottom:10px;">
  
  		
    
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'countries';?>'"><i class="icon-refresh"></i> Recharger</button>
              		
   <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'countries/add/';?>'"><i class="icon-plus"></i> Nouveau pays</button>
  
</div>

		 <div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading"> Pays </header>
      <table class="table table-striped border-top" id="">

              <thead>
                <tr>
                
                <th class="sub_col">Nom</th>
				<th class="sub_col">Status</th>
                  <th class="sub_col" >Actions</th>
                </tr>
              </thead>
              <tbody>
		  <?php foreach ($countries_list as $countries): 
							
							        if($countries->country_data_status==1){$label='label-success';$data_status='Activer';}
					            	if($countries->country_data_status==0){$label='label-danger';$data_status='Désactiver';}
									
						?>
               <tr class="supp-<?php  echo $countries->country_id;?>"> 
					
						
					   <td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $countries->country_name;?> </span> </td>
					    	<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $countries->country_id;?> label <?php echo $label;?>"><?php echo $data_status;?></span></td>
			        
							<td class="text-center">
								<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select id="ddlCreditCardTypeTab" data-id="<?php echo $countries->country_id;?>" name="ddlCreditCardTypeTab" class="form-control changesatus btn-xs">
										<option <?php  if($countries->country_data_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($countries->country_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
							<a href="<?php echo base_url().'countries/edit/0/'.$countries->country_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $countries->country_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
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
			var country_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'countries/updatestatus/';?>",
				data: {country_id:country_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+country_id).empty();

						if(idsatus == 1){$( '.span-'+country_id ).removeClass( "label-danger label-warning" );$( '.span-'+country_id ).addClass( "label-success" );$('.span-'+country_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+country_id ).removeClass( "label-success label-warning" );$( '.span-'+country_id ).addClass( "label-danger" );$('.span-'+country_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	 $(".modalconfirm").click(function () {
			var country_id=$(this).attr('data-id');
	
		jQuery('.url').val(country_id);
		jQuery('#myModalConfirm').modal('show');
	
		//$(".modal-body").append(html);
		
	});
	
	$(".suppconfirm").click(function () {
			var country_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'countries/delete/';?>",
				data: {country_id:country_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+country_id ).remove();

						}  
				}
			});
			
		});

</script>