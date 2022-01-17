    <div style="text-align:right;margin-bottom:10px;">
  
  		
    
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'categories/subCategorie';?>'"><i class="icon-refresh"></i> Recharger</button>
              		
   <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'categories/addSubCategorie/';?>'"><i class="icon-plus"></i> Nouvelle sous catégorie</button>
  
</div>

		 <div class="row">
  <div class="col-lg-12">
  <div class="page_content">
  <div class="container-fluid">
    <div class="row">
	      <form method="GET" action="<?=base_url().'categories/subCategories/';?>">
	 <input type ="hidden" value="1" name="filtercheck" id="filtercheck">	
	 <div class="form-group">
			
			

			  <div class="row">

			<div class="col-lg-3">
			<label>Rechecher par :</label>
			<input name="keywordcategorie" id="keyword" type="text"  class="form-control" placeholder="Nom" value="<?php echo $keywordcategorie;?>">
			</div>
			
			

              <div class="col-lg-3">
                <label  for="F1">Catégories </label>
              <select  id="categorie_id"  name="categorie_ids" class="form-control  btn-xs">
			  <option value=""> Selectionnez une catégorie...</option>
				
			    <?php foreach($categories_parents as $categories_parent) :?>
										<option <?php  if($categorie_ids==$categories_parent->categorie_id){ echo"selected";} ?> value="<?php echo $categories_parent->categorie_id;?>"> <?php echo $categories_parent->categorie_name;?></option>
										 <?php endforeach; ?>
									</select> </div>
									
									
								
						
					<div class="col-lg-4" style="    text-align: center; padding-bottom: 15px;padding-top: 15px;">
			<button type="submit"  class="btn btn-w-md btn-accent">Rechecher</button> 
		
			<a href="<?=base_url();?>categories/subCategories/?filtercheck=1&keywordcategorie=N&categorie_ids=N" class="btn btn-w-md btn-danger">Réinitialiser la rechecher</a>
		</div>				
             
            </div>
			 
		

			</div>
		
	</form></div></div></div>
    <section class="panel">
      <header class="panel-heading">Sous Catégories </header>
      <table class="table table-striped border-top" id="">

              <thead>
                <tr>
                
                <th class="sub_col">Nom</th>
				 <th class="sub_col">Catégories</th>
				     <th class="sub_col" >Statut</th>
                  <th class="sub_col" >Actions</th>
                </tr>
              </thead>
              <tbody>
		  <?php foreach ($categories_list as $categorie): 
							
							        if($categorie->data_status_categorie==1){$label='label-success';$data_status='Activer';}
					            	if($categorie->data_status_categorie==0){$label='label-danger';$data_status='Désactiver';}
										$categorieParent = $this->M_categories->get_this($categorie->parent_id);
									
						?>
               <tr class="supp-<?php  echo $categorie->categorie_id;?>"> 
					
						
					   <td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $categorie->categorie_name;?> </span> </td>
					    	<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $categorieParent->categorie_name;?> </span> </td>
					    
							<td class="sub_col" ><span  style="position: relative;top: 10px;" class="span-<?php  echo $categorie->categorie_id;?> label <?php echo $label;?>"><?php echo $data_status;?></span></td>
			        
							<td class="text-center">
								<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select id="ddlCreditCardTypeTab" data-id="<?php echo $categorie->categorie_id;?>" name="ddlCreditCardTypeTab" class="form-control changesatus btn-xs">
										<option <?php  if($categorie->data_status_categorie==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($categorie->data_status_categorie==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
							<a href="<?php echo base_url().'categories/editSubCategorie/0/'.$categorie->categorie_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $categorie->categorie_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
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
			var categorie_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'categories/updatestatus/';?>",
				data: {categorie_id:categorie_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						//$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+categorie_id).empty();

						if(idsatus == 1){$( '.span-'+categorie_id ).removeClass( "label-danger label-warning" );$( '.span-'+categorie_id ).addClass( "label-success" );$('.span-'+categorie_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+categorie_id ).removeClass( "label-success label-warning" );$( '.span-'+categorie_id ).addClass( "label-danger" );$('.span-'+categorie_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	 $(".modalconfirm").click(function () {
			var categorie_id=$(this).attr('data-id');
	
		jQuery('.url').val(categorie_id);
		jQuery('#myModalConfirm').modal('show');
	
		//$(".modal-body").append(html);
		
	});
	
	$(".suppconfirm").click(function () {
			var categorie_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'categories/delete/';?>",
				data: {categorie_id:categorie_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+categorie_id ).remove();

						}  
				}
			});
			
		});

</script>