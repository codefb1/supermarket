

<div class="col-sm-6">
  <h1 class="page_title">Page d'accueil</h1>
  <p class="text-muted">Liste des blocks</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'homeBlocks';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>
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
              <th class="sub_col" ></th>
				  <th class="sub_col">Nom</th>
				  <th class="sub_col">Produit</th>
                  <th class="sub_col" >Actions</th>
                 
                </tr>
              </thead>
              <?php foreach($homeBlocks_list as $homeBlock) :
			  
		
						?>
               <tr class="supp-<?php  echo $homeBlock->home_block_id;?>"> 
			   	<td class="sub_col" > <span style="position: relative;top:5px;">block  <?php echo $homeBlock->home_block_id;?> </span> </td>
					 	<td class="sub_col" > <span style="position: relative;top:5px;">  <?php echo $homeBlock->product_name;?> </span> </td>
							
			    			<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $homeBlock->home_block_title;?> </span> </td>
						
						
                 <td class="sub_col">
				
			
				  
				  	<a href="<?php echo base_url().'homeBlocks/edit/0/'.$homeBlock->home_block_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							
				   
				  
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
		var home_block_id=$(this).attr('data-id');
		jQuery('.url').val(home_block_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var home_block_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'homeBlock/delete/';?>",
				data: {home_block_id:home_block_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+home_block_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var banners_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'homeBlock/updatestatus/';?>",
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