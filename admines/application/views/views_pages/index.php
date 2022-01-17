    <div style="text-align:right;margin-bottom:10px;">
	  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'pages';?>'"><i class="icon-refresh"></i> Recharger</button>
   <a href="<?php echo base_url().'pages/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvel page</span></button></a>
 
</div>

		 <div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading"> Liste des pages </header>
      <table class="table table-striped border-top" id="">

              <thead>
                <tr>
                
                  <th>Titre</th>
				   <th style="text-align: center;" >Status</th>
				  <th style="text-align: center;" >Actions</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach ($pages_list as $pages): 
								  if($pages->page_data_status==1){$label='label-success';$status='Activer';}
					
							if($pages->page_data_status==0){$label='label-danger';$status='Désactiver';}
						
								?>
               <tr class="supp-<?php  echo $pages->page_id;?>"> 
						
						<td > <span class="position_text"> <?php echo $pages->page_title;?></span> </td>
							<td class="sub_col" ><span  class=" icone_action span-<?php  echo $pages->page_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			          
						
							<td class="text-center">
										<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $pages->page_id;?>" name="ddlCreditCardTypeTab" class=" changesatus btn-xs">
										<option <?php  if($pages->page_data_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($pages->page_data_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
									<a href="<?php echo base_url().'pages/edit/0/'.$pages->page_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							
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
		
	
	
	

	  <!-- page scripts -->
	

<script type="text/javascript">

$(document).ready(function () {


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var pages_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'pages/updatestatus/';?>",
				data: {pages_id:pages_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+pages_id).empty();

						if(idsatus == 1){$( '.span-'+pages_id ).removeClass( "label-danger label-warning" );$( '.span-'+pages_id ).addClass( "label-success" );$('.span-'+pages_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+pages_id ).removeClass( "label-success label-warning" );$( '.span-'+pages_id ).addClass( "label-danger" );$('.span-'+pages_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>