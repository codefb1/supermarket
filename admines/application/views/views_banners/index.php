

<div class="col-sm-6">
  <h1 class="page_title">Bannières</h1>
  <p class="text-muted">Liste des bannières</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'banners';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

    <a href="<?php echo base_url().'banners/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvelle bannière</span></button></a>
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
            <table class="table info_table table-hover" id="banniers_table">
              <thead>
              
                <tr>
            
				  <th class="sub_col">Nom</th>
				  <th class="sub_col">Emplacement</th>
				  <th class="sub_col">rédirection</th>
				     <th class="sub_col" >Statut</th>
                  <th class="sub_col" >Actions</th>
                 
                </tr>
              </thead>
              <?php foreach($banners_list as $banners) :
			  
			  if($banners->banner_data_status==1){$label='label-success';$status='Activer';}
					
							if($banners->banner_data_status==0){$label='label-danger';$status='Désactiver';}
						
						?>
               <tr class="supp-<?php  echo $banners->banner_id;?>"> 
			    			<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $banners->banner_title;?> </span> </td>
							<td class="sub_col" > <span style="position: relative;top:5px;"> 
							<?php  if($banners->bannier_position==2){ echo"Slider";} ?> 
							<?php  if($banners->bannier_position==1){ echo"Bannier header";} ?>  
							<?php  if($banners->bannier_position==3){ echo"Page home  block Mouton entier";} ?> 
							<?php  if($banners->bannier_position==4){ echo"Page Mouton entier";} ?>
							<?php  if($banners->bannier_position==5){ echo"Page La Boucherie";} ?> 
							<?php  if($banners->bannier_position==6){ echo"Page Panier";} ?> 
							<?php  if($banners->bannier_position==7){ echo"Promotions";} ?> 
							<?php  if($banners->bannier_position==8){ echo"Goffa";} ?> 
                            <?php  if($banners->bannier_position==9){ echo"Contact";} ?>

							</span> </td>
						<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $banners->product_name;?> </span> </td>
						<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $banners->banner_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			           
                 <td class="sub_col">
				
				<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $banners->banner_id;?>" name="ddlCreditCardTypeTab" class=" changesatus btn-xs">
										<option <?php  if($banners->banner_data_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($banners->banner_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
				  
				  	<a href="<?php echo base_url().'banners/edit/0/'.$banners->banner_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $banners->banner_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
				   
				  
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
		var banner_id=$(this).attr('data-id');
		jQuery('.url').val(banner_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var banner_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'banners/delete/';?>",
				data: {banner_id:banner_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+banner_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var banners_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'banners/updatestatus/';?>",
				data: {banners_id:banners_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+banners_id).empty();

						if(idsatus == 1){$( '.span-'+banners_id ).removeClass( "label-danger label-warning" );$( '.span-'+banners_id ).addClass( "label-success" );$('.span-'+banners_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+banners_id ).removeClass( "label-success label-warning" );$( '.span-'+banners_id ).addClass( "label-danger" );$('.span-'+banners_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>