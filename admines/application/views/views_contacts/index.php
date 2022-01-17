<div class="col-sm-6">
  <h1 class="page_title">Contacts</h1>
  <p class="text-muted">Liste des contacts</p>
</div>
<div class="col-sm-6 text-right">
  <div class="pull-right">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'contacts';?>'"><i class=" glyphicon glyphicon-refresh"></i> Recharger</button>

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
            <table class="table info_table table-hover" id="accounts_table">
              <thead>
              
                <tr>
            
				  <th class="sub_col">Nom</th>
				     <th class="sub_col" >Email</th>
					  <th class="sub_col" >Date d'envoi</th>
                  <th class="sub_col" >Actions</th>
                  <th></th>
                </tr>
              </thead>
              <?php foreach($contacts_list as $contacts) :?>
               <tr class="supp-<?php  echo $contacts->contact_id;?>"> 
			    			<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $contacts->contact_lastname;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo $contacts->contact_email;?> </span> </td>
					<td class="sub_col" > <span style="position: relative;top:5px;"> <?php echo date_fr($contacts->contact_created);?> </span> </td>
                 <td class="sub_col">
				
				
				  
				  	<a href="<?php echo base_url().'contacts/edit/0/'.$contacts->contact_id;?>"><button type="button" class="btn btn-outline btn-success"><i class="glyphicon glyphicon-pencil"></i></button></a>
						
				   
				  
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

	

