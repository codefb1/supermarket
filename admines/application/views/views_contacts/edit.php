	<div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-primary" type="button"onClick="location.href='<?php echo base_url().'contacts';?>'"><i class=" fa fa-reply"></i>  Contacts</button>

 </div>

<div class="row">

  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Informations</div>
      <div class="panel-body">
        <form data-parsley-validate="" novalidate=""id="submitpage"  method="POST" action="#">
		

					
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Date d'envoi : <?php echo date_fr($contact->contact_created);?> </label>
              </div>
             
            </div>
         
            </div>
			   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Nom : <?php echo $contact->contact_lastname;?> </label>
              </div>
             
            </div>
         
            </div>
			 <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Sujet : <?php echo $contact->contact_subject;?> </label>
              </div>
             
            </div>
         
            </div>
        	   <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Email : <?php echo $contact->contact_email;?> </label>
              </div>
             
            </div>
         
            </div>
              
        	   <div class="form-group hidden">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Sujet : <?php echo $contact->contact_subject;?> </label>
              </div>
             
            </div>
         
            </div>
                      <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <label class="" for="F1">Message : <?php echo $contact->contact_message;?> </label>
              </div>
             
            </div>
         
            </div>    	 
              </br> </br>
        </form>
	
     
    </div>
  </div>
</div>
