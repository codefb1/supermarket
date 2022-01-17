    <div style="text-align:right;margin-bottom:10px;">
  
  		
    
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'status';?>'"><i class="icon-refresh"></i> Recharger</button>
              		
   <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'status/add/';?>'"><i class="icon-plus"></i> Nouvelle status</button>
  
</div>

		 <div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading"> Status </header>
      <table class="table table-striped border-top" id="">

              <thead>
                <tr>
                
                <th class="sub_col">Nom</th>
				<th class="sub_col">Affectation</th>
                  <th class="sub_col" >Actions</th>
                </tr>
              </thead>
              <tbody>
		  <?php foreach ($status_list as $status): 
							
							       $status_type="";
								  if($status->status_type==1){$status_type="Commmande";}
						if($status->status_type==2){$status_type="Livraison";}
						?>
               <tr class="supp-<?php  echo $status->status_id;?>"> 
					
						



					   <td class="sub_col" > <span class="btn-primary" style="padding: 5px;position: relative;top:5px;background-color: <?php echo $status->status_color;?>; border-color: <?php echo $status->status_color;?>;" > <?php echo $status->status_name;?> </span> </td>
					     <td class="sub_col" > <span class="btn-primary" style="padding: 5px;position: relative;top:5px;" > <?php echo $status_type;?> </span> </td>
					    		
							<td class="text-center">
								
							<a href="<?php echo base_url().'status/edit/0/'.$status->status_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $status->status_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
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
			var status_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'status/updatestatus/';?>",
				data: {status_id:status_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+status_id).empty();

						if(idsatus == 1){$( '.span-'+status_id ).removeClass( "label-danger label-warning" );$( '.span-'+status_id ).addClass( "label-success" );$('.span-'+status_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+status_id ).removeClass( "label-success label-warning" );$( '.span-'+status_id ).addClass( "label-danger" );$('.span-'+status_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	 $(".modalconfirm").click(function () {
			var status_id=$(this).attr('data-id');
	
		jQuery('.url').val(status_id);
		jQuery('#myModalConfirm').modal('show');
	
		//$(".modal-body").append(html);
		
	});
	
	$(".suppconfirm").click(function () {
			var status_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'status/delete/';?>",
				data: {status_id:status_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+status_id ).remove();

						}  
				}
			});
			
		});

</script>