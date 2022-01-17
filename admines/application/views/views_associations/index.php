

<div class="col-sm-6">
  <h1 class="page_title">Associations </h1>
  <p class="text-muted">Liste des associations </p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'associations';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

    <a href="<?php echo base_url().'associations/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvel association </span></button></a>
  </div>
</div>
</div>
</div>
<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="news_table">
              <thead>
              
                <tr>
					<th class="sub_col">Association</th>
					<th class="sub_col" >Responsable</th>
					<th class="sub_col" >Téléphone</th>
					<th class="sub_col" >Email</th>
					<th class="sub_col" >Adresse</th>
					<th class="sub_col" >Pays</th>
						<th class="sub_col" >Prix de vente</th>
					<th class="sub_col" >Statut</th>
					<th class="sub_col" >Actions</th>
                  <th></th>
                </tr>
              </thead>
              <?php foreach($associations_list as $associations) :
			  
			  if($associations->association_status==1){$label='label-success';$status='Activer';}
					
							if($associations->association_status==0){$label='label-danger';$status='Désactiver';}
						 
						?>
               <tr class="supp-<?php  echo $associations->association_id;?>"> 
			   
			    		
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $associations->association_lastname;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $associations->association_repensable;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;text-align: left;"> <div>Fixe : <?php echo $associations->association_phone;?></div>   <div>Portable : <?php echo $associations->association_phone_portable;?> </div></span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $associations->association_email;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $associations->association_adress.' '. $associations->association_zip.' '. $associations->association_city;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $associations->country_name;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo (number_format($associations->association_price, 2, ',', ''))."  Euro" ?></span> </td>
						
						
				
					<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $associations->association_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>

                 <td class="sub_col">
				
				<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $associations->association_id;?>" name="ddlCreditCardTypeTab" class=" changesatus btn-xs">
										<option <?php  if($associations->association_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($associations->association_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
				  
				  	<a href="<?php echo base_url().'associations/edit/0/'.$associations->association_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $associations->association_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
				   
				  
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
		var association_id=$(this).attr('data-id');
		jQuery('.url').val(association_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var association_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'associations/delete/';?>",
				data: {association_id:association_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+association_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var association_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'associations/updatestatus/';?>",
				data: {association_id:association_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+association_id).empty();

						if(idsatus == 1){$( '.span-'+association_id ).removeClass( "label-danger label-warning" );$( '.span-'+association_id ).addClass( "label-success" );$('.span-'+association_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+association_id ).removeClass( "label-success label-warning" );$( '.span-'+association_id ).addClass( "label-danger" );$('.span-'+association_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>