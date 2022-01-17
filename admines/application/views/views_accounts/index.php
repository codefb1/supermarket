<div class="col-sm-6">
  <h1 class="page_title">Administrateurs</h1>
  <p class="text-muted">Liste des administrateurs</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'accounts';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

    <a href="<?php echo base_url().'accounts/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvel administrateu</span></button></a>
  </div>
</div>
</div>
</div>
<?php if(@$us==1) {?>
<div class="alert alert-success alert-block fade in">
  <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
  <h4> <i class="icon-ok-sign"></i><strong>OK ! </strong> La liste des administrateur a été mise à jour.</h4>
  
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
					<th class="sub_col">Identifiant</th>
					<th class="sub_col">Nom</th>
					<th class="sub_col">Prénom</th>
					<th class="sub_col" >Email</th>
					<th class="sub_col" >Statut</th>
					<th class="sub_col" >Actions</th>
                  <th></th>
                </tr>
              </thead>
              <?php foreach($accounts_list as $accounts) :
			  
		
						if($accounts->data_status==1){$label='label-success';$status='Activer';}
							if($accounts->data_status==0){$label='label-danger';$status='Désactiver';}
						
						?>
               <tr class="supp-<?php  echo $accounts->account_id;?>"> 
						<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $accounts->account_user;?> </span> </td>
						<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $accounts->account_firstname;?> </span> </td>
						<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $accounts->account_lastname;?> </span> </td>
						<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $accounts->account_email;?> </span> </td>
						<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $accounts->account_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			           
                 <td class="sub_col">
				
				<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $accounts->account_id;?>" name="ddlCreditCardTypeTab" class="form-control changesatus btn-xs">
										<option <?php  if($accounts->data_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($accounts->data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
				  
				  	<a href="<?php echo base_url().'accounts/edit/0/'.$accounts->account_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $accounts->account_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
				   
				  
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
		var account_id=$(this).attr('data-id');
		jQuery('.url').val(account_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var account_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'accounts/delete/';?>",
				data: {account_id:account_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+account_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var account_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'accounts/updatestatus/';?>",
				data: {account_id:account_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+account_id).empty();

						if(idsatus == 1){$( '.span-'+account_id ).removeClass( "label-danger label-warning" );$( '.span-'+account_id ).addClass( "label-success" );$('.span-'+account_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+account_id ).removeClass( "label-success label-warning" );$( '.span-'+account_id ).addClass( "label-danger" );$('.span-'+account_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>