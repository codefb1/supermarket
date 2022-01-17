

<div class="col-sm-6">
  <h1 class="page_title">Newsletters</h1>
  <p class="text-muted">Liste des newsletters</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'newsletters/search';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

    <a href="<?php echo base_url().'newsletters';?>"><button class="btn btn-shadow btn-primary" id="SNE"> <span>Liste des newsletters</span></button></a>
  </div>
</div>

<div class="page_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
	  <div class="row" style="padding-bottom: 10px;">
	    <div class="card-block card bg-white">
				  <form class="form-horizontal" id="submitsearch" role="form" method="POST" action="<?=base_url().'newsletters/search';?>">
				     <input class="form-control " id="search" name="search"  type="hidden" value="1"/>

				<?php if($this->input->get('error') == 999) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>
					
						<div class="alert alert-warning alert_date"  style="display:none"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Merci de sélectionner une date ou choisir un intervalle. </div>
					  	   <div class="form-group">
                    <label class="col-sm-2 control-label bold" >Email</label>
                    <div class="col-sm-8">
                 <input class="form-control " id="customer_email" name="newsletter_email_search" placeholder="E-mail" type="text"  value="<?php  echo $newsletter_email_search;?>"/>
                    </div>
                 </div>
				 
				   	 
				
				  	
                 <div class="form-group">
				       <label class="col-sm-2 control-label bold">Date</label>
                    <div class="col-sm-2">
                      <select class="form-control date_selected_customer" name="date_selected_newsletter">
					    <option value="">Choisir une date </option>
										<option value="1" <?php if($date_selected_newsletter == 1)echo "selected";?>>Aujourd'hui</option>
										<option value="2" <?php if($date_selected_newsletter == 2)echo "selected";?>>Cette semaine</option>
										<option value="3" <?php if($date_selected_newsletter == 3)echo "selected";?> >Le mois en cours</option>
										<option value="4" <?php if($date_selected_newsletter == 4)echo "selected";?>> Les 3 derniers mois</option>
										<option value="5" <?php if($date_selected_newsletter == 5)echo "selected";?>>  Cette année </option>
					
				 
                      </select>
                    </div>
				  
				    
                    <label class="col-sm-1 control-label bold hidden ">Date : du </label>
                    <div class="col-sm-2 hidden">
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control " id="date" name="date_debut_newsletter" placeholder="MM/DD/YYYY" type="date" value="<?php  echo $date_debut_newsletter;?>"/>
       </div>
                    </div>
					 <label class="col-sm-1 control-label bold hidden" style="text-align: center;"> au </label>
					         <div class="col-sm-2 hidden">   
                      <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
		
		   
        <input class="form-control " id="date" name="date_fin_newsletter" placeholder="MM/DD/YYYY" type="date"  value="<?php  echo $date_fin_newsletter;?>"/>
       </div>
	  </div>
					
                  </div>
				  </form>
				   <div class="row" style="text-align: left;">
				    <div class="col-sm-4">  </div>
				    <div class="col-sm-4">   <button  class="btn btn-success pull-left search btn-danger"><i class="fa fa-search"> </i> Recherche</button></div>
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
	
	$(".search").click(function () {


	
		$( "#submitsearch" ).submit();
});

});
	
	
</script>