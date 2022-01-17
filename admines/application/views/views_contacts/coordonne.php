<div class="row">
   <section class="panel">
	  <aside class="profile-nav col-lg-12">
		  <div class="panel-body">
          <div class="title">     	   	<header class="panel-heading">Gestion des Coordonnées</header></div>
       	  
        </div> 
		

           <div class="panel-body">
		   	  
		  
		  
		  
		  
            <div class="row m-a-0">
			
              <div class="col-lg-12">
				<?php if(@$this->uri->segment(3) == 1) { ?>
					<div class="alert alert-success"> <i class="zmdi zmdi-check"></i> Mise à jour réussie</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 2) { ?>
					<div class="alert alert-danger"> <i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Mise à jour échouée !</div>
					<?php } ?>
					<?php if(@$this->uri->segment(3) == 99) { ?>
					<div class="alert alert-warning"> <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Données erronées, merci de vérifier vos entrées !</div>
					<?php } ?>	
			
					 
				  	  
				  
				  	   <form class="form-horizontal" id="submitpage" role="form" method="POST" action="<?=base_url().'contacts/coordonne';?>">

		  <div class="form-group">
                   <label  class="col-sm-12 control-label bold"> Page  contact</label>
				   
				   <textarea class="form-control" id="page_contact" name="page_contact"  ><?php echo $settings->page_contact;?></textarea>
					
				   
				   </div>
				   
		
				  <div class="form-group">
                   <label  class="col-sm-12 control-label bold">  Block  footer contact</label>
				   
				   <textarea class="form-control" id="block_contact" name="block_contact"  ><?php echo $settings->block_contact;?></textarea>
					
				   
				   </div>
				   
				   
				  	
				  <div class="form-group" >
				   
  <input type="hidden" class="form-control" name="setting_id" id="setting_id" value="1">
						
</form>
			   </div>
			<button  class="btn btn-success pull-right "><i class="fa fa-check"></i> Mettre à jour</button>		    
              
			 </div>
            </div>
	
          </div>

</aside>		</section>   </div> 

	  <script type="text/javascript">
	   jQuery(document).ready(function() {

   	 CKEDITOR.replace('page_contact');
	 CKEDITOR.replace('block_contact');

 });
 
 
$(document).ready(function () {
	$(".btn-success").click(function () {

$( "#submitpage" ).submit();
});

});
	
</script>



 
    