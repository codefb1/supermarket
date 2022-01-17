

<div class="col-sm-6">
  <h1 class="page_title">Partenaires </h1>
  <p class="text-muted">Liste des partenaires </p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'partners';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

    <a href="<?php echo base_url().'partners/add';?>"><button class="btn btn-success" id="SNE"><i class="glyphicon glyphicon-plus"></i> <span>Nouvelle partenaire </span></button></a>
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
				<th class="sub_col">Partenaire</th>
				<th class="sub_col" >Type</th>
				<th class="sub_col" >Responsable</th>
				<th class="sub_col" >Téléphone</th>
				<th class="sub_col" >Email</th>
				<th class="sub_col" >Address</th>
						<th class="sub_col">Certificat</th>
				<th class="sub_col" >Produits</th>
		
				<th class="sub_col" >Commandes</th>
				<th class="sub_col" >Statut</th>
				<th class="sub_col" >Actions</th>
                  
                </tr>
              </thead>
              <?php foreach($partners_list as $partners) :
			  
					if($partners->partener_status==1){$label='label-success';$status='Activer';}
					if($partners->partener_status==0){$label='label-danger';$status='Désactiver';}
					if($partners->partener_type==1){ $type  = "Boucherie";}
					if($partners->partener_type==2){ $type  = "Autre";}
						?>
               <tr class="supp-<?php  echo $partners->partener_id;?>"> 
			   
			    		
						<td class="sub_col" > <span class="position_text"> <?php echo $partners->partener_lastname;?> </span> </td>
						<td class="sub_col" > <span class="position_text"> <?php echo $type;?> </span> </td>
						<td class="sub_col" > <span class="position_text"> <?php echo $partners->partener_repensable;?> </span> </td>
						<td class="sub_col" > <span class="position_text"> <div>Fixe :  <?php echo $partners->partener_phone;?> </div> <div>Portable :   <?php echo $partners->partener_phone_portable;?> </div></span> </td>
                       <td class="sub_col" > <span class="position_text"> <?php echo $partners->partener_email;?> </span> </td>
					
					<td class="sub_col" > <span class="position_text"> <?php echo $partners->partener_adress.' '. $partners->partener_zip.' '. $partners->partener_city;?> </span> </td>
						<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $partners->certificat_name;?> </span> </td>
				
						<td class="sub_col" ><span  class=""><?php if($partners->partener_type==1){  ?> 
						
						<a href="<?php echo base_url().'productspartners/index/'.$partners->partener_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-eye-open"></i></button></a>
					
			          <?php } else { ?>--<?php } ?> </span></td>	
					
				<td class="sub_col" ><span  class="" ><?php if($partners->partener_type==1){  ?> 
						
						<a href="<?php echo base_url().'orders/partners/'.$partners->partener_id;?>" ><button type="button" class="btn btn-outline btn-primary"><i class="glyphicon glyphicon-eye-open"></i></button></a>
							
			          <?php } else { ?>--<?php } ?> </span></td>
					 
					<td class="sub_col" ><span  class=" icone_action span-<?php  echo $partners->partener_id;?> label <?php echo $label;?>"><?php echo $status;?></span></td>
			         
					
                 <td class="sub_col">
				
				<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
									<select  id="ddlCreditCardTypeTab" data-id="<?php echo $partners->partener_id;?>" name="ddlCreditCardTypeTab" class=" changesatus btn-xs">
										<option <?php  if($partners->partener_status==1){ echo"selected";} ?> value="1">Activer</option>
										<option <?php  if($partners->partener_status==0){ echo"selected";} ?> value="0">Désactiver</option>
									</select>
									</div>
				  
				  	<a href="<?php echo base_url().'partners/edit/0/'.$partners->partener_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
							<a  data-id="<?php  echo $partners->partener_id;?>" class="modalconfirm "  ><button type="button" class="btn btn-danger"><i class=" glyphicon glyphicon-trash"></i></button></a>
							
				   
				  
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
		var partener_id=$(this).attr('data-id');
		jQuery('.url').val(partener_id);
		jQuery('#myModalConfirm').modal('show');
	
	
		
	});
	
		$(".suppconfirm").click(function () {
			var partener_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'partners/delete/';?>",
				data: {partener_id:partener_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
							$( '.supp-'+partener_id ).remove();

						}  
				}
			});
			
		});


			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var partener_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'partners/updatestatus/';?>",
				data: {partener_id:partener_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+partener_id).empty();

						if(idsatus == 1){$( '.span-'+partener_id ).removeClass( "label-danger label-warning" );$( '.span-'+partener_id ).addClass( "label-success" );$('.span-'+partener_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+partener_id ).removeClass( "label-success label-warning" );$( '.span-'+partener_id ).addClass( "label-danger" );$('.span-'+partener_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});
	
</script>