

<div class="col-sm-6">
  <h1 class="page_title">Newsletters</h1>
  <p class="text-muted">Liste des newsletters</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'newsletters';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

    <a href="<?php echo base_url().'newsletters/search';?>"><button class="btn btn-shadow btn-primary" id="SNE"><i class="fa fa-search"> </i> <span>Recherche</span></button></a>
  </div>
</div>

<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	  <div class="row" style="padding-bottom: 10px;">
	    <div class="card-block card bg-white">
			  <form class="form-horizontal" id="submitexport" role="form" method="POST" action="<?=base_url().'exports/exportnewsletters';?>">
				   	<?php if($this->input->get('error') == 999) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>
					
						<div class="alert alert-warning alert_date"  style="display:none"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Merci de sélectionner une date ou choisir un intervalle. </div>
					
				
				  	 
                 <div class="form-group">
				       <label class="col-sm-2 control-label bold">Date</label>
                    <div class="col-sm-2">
                      <select class="form-control date_selected" name="date_selected">
					    <option value="">Choisir une date </option>
										<option value="1">Aujourd'hui</option>
										<option value="2">Cette semaine</option>
										<option value="3">Le mois en cours</option>
										<option value="4"> Les 3 derniers mois</option>
										<option value="5">  Cette année </option>
					
				 
                      </select>
                    </div>
				  
				    
                    <label class="col-sm-1 control-label bold">Date : du </label>
                    <div class="col-sm-2">
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control date_debut" id="date" name="date_debut" placeholder="MM/DD/YYYY" type="date"/>
       </div>
                    </div>
					 <label class="col-sm-1 control-label bold" style="text-align: center;"> au </label>
					         <div class="col-sm-2">   
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
		
		   
        <input class="form-control date_fin" id="date" name="date_fin" placeholder="MM/DD/YYYY" type="date"/>
       </div>
	   
	
                    </div>
					
                  </div>
				  
				    	   <div class="form-group">
            	     <label class="col-sm-2 control-label bold">Format</label>
                    <div class="col-sm-1">
                      <select class="form-control" name="format">
					  
                  
                      <option value="2">XLS</option>
					    <option value="3">CSV</option>
                
                      </select>
                    </div>
					 
                 </div>
				 
				  </form>
				   <div class="row" style="text-align: left;">
				    <div class="col-sm-4">  </div>
				    <div class="col-sm-4">  <button  class="btn btn-success pull-left export"><i class="fa fa-file-excel-o"> </i> Exporter</button></div>
						    <div class="col-sm-4">  </div>
					 </div>
					  </div>
	  </div>
        <div class="panel panel-default">
         
          <div class="table-responsive">
            <table class="table info_table table-hover" id="news_table">
               <thead>
                <tr>
                  <th class="sub_col">Id</th>
				   
                  <th class="sub_col">Email </th>
			  
				    <th style="text-align: center;" >Date</th>
				
				  
             
                </tr>
              </thead>
              <tbody>
			  <?php foreach ($newsletters_list as $newsletters): 
							
		?>
               <tr class="supp-<?php  echo $newsletters->newsletter_id;?>"> 
							
			    			<td class="sub_col" > <span style="position: relative;top:5px;font-size: 13px;"> <?php  echo $newsletters->newsletter_id;?> </span> </td>
						
						
							<td class="sub_col" > <span style="position: relative;top:5px;font-size: 13px;"> <?php  echo $newsletters->client_email;?> </span> </td>
						
							<td class="sub_col" > <span style="position: relative;top:5px;font-size: 13px;"> <?php  echo $newsletters->newsletter_created;?> </span> </td>
						
						
						
				
				
			            	
						
					
						</tr>
						<?php endforeach; ?>
              </tbody>
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

	

<script type="text/javascript">
$(document).ready(function () {
	
	$(".export").click(function () {

var date_selected  =jQuery('.date_selected').val();
var date_debut  =jQuery('.date_debut').val();
var date_fin  =jQuery('.date_fin').val();

if(!date_selected && !date_debut && !date_fin){

	jQuery('.alert_date').css("display", "block");

}else {
	$( "#submitexport" ).submit();
	
	}
});

});
$(document).ready(function () {
 $(".modalconfirm").click(function () {
			var customers_id=$(this).attr('data-id');
	
		jQuery('.url').val(customers_id);
		jQuery('#myModalConfirm').modal('show');
	
		//$(".modal-body").append(html);
		
	});
	
	$(".suppconfirm").click(function () {
			var customers_id = $("#url").val();
			jQuery.ajax({
				url: "<?php echo base_url().'customers/delete/';?>",
				data: {customer_id:customers_id},
				dataType: "json",
				type: "POST",  
				success: function(data) { 
					if(data.result ==1) {
							jQuery('#myModalConfirm').modal('hide');

						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						
							$( '.supp-'+customers_id ).remove();

						}  
				}
			});
			
		});

			$( ".changesatus" ).change(function() {
			var idsatus= $(this).val();
			var customers_id=$(this).attr('data-id');
			jQuery.ajax({
				url: "<?php echo base_url().'customers/updatestatus/';?>",
				data: {customer_id:customers_id,idsatus:idsatus},
				dataType: "json",
				type: "POST", 
				success: function(data) { 
					if(data.result ==1) {
						jQuery(document).ready(function(){
							
							$('.msg').show(0).delay(7000).hide(200);
						});					
						$('html, body').animate({scrollTop:0}, 'slow');
						$('.span-'+customers_id).empty();
						if(idsatus == 1){$( '.span-'+customers_id ).removeClass( "label-danger label-warning" );$( '.span-'+customers_id ).addClass( "label-success" );$('.span-'+customers_id).append('Activer'); }
						if(idsatus == 0){$( '.span-'+customers_id ).removeClass( "label-success label-warning" );$( '.span-'+customers_id ).addClass( "label-danger" );$('.span-'+customers_id).append('Désactiver'); }
						
						
						
						} 
				}    
			});
		});
});

</script>