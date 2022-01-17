<!-- page start-->
<div style="text-align:right;margin-bottom:10px;">
 
 <button class="btn btn-shadow btn-primary" type="button" onClick="location.href='<?php echo base_url().'index.php/customers';?>'"><i class=" icon-caret-left"></i> Liste des clients </button> <button class="btn btn-shadow btn-success" type="button" id="SNE"><i class=" icon-ok"></i> Enregistrer</button></div>
<div class="row">

  <aside class="profile-info col-lg-12">
    <section class="panel">
      <header class="panel-heading"> NOUVEAU CLIENT </header>
      <div class="panel-body bio-graph-info">
        <div id="sne-notification-error" class="alert alert-block alert-danger fade in" style="display:none;" >
          <button data-dismiss="alert" class="close close-sm" type="button"> <i class="icon-remove"></i> </button>
          <strong><i class="icon-remove"></i> Oops !</strong> Échec lors de l'enregistrement. 
        </div>
        <div id="sne-notification-success" class="alert alert-success fade in" style="display:none;">
          <button data-dismiss="alert" class="close close-sm" type="button"> <i class="icon-remove"></i> </button>
          <strong><i class="icon-ok"></i> OK !</strong> Enregistrement avec succès. 
        </div>
        <form class="form-horizontal" role="form">
        <!-- <div class="form-group">
		    <label  class="col-lg-2 control-label">Optin</label>
            <div class="col-lg-10">
            <div class="switch switch-square"data-on-label="<i class=' icon-ok'></i>" data-off-label="<i class='icon-remove'></i>">
                   <input type="checkbox" id = "F13" />
            </div>
            </div>						  
		</div>-->	
	
			<!-- <div class="form-group">
            <label  class="col-lg-2 control-label">Civilité</label>
            <div class="col-lg-10">
               <select class="form-control m-bot15" id="F1" name="F1">
                   <option value="0">Choisir ...</option>
                   <option value="M">M</option>
                   <option value="Mlle">Mlle</option>
                   <option value="Mme">Mme</option>
				</select>  
            </div>
			 </div>-->
			 	<div class="form-group">
	 <label  class="col-lg-2 control-label">Status </label>
	 <div class="col-lg-3">
	 <select class="form-control m-bot15" id="F28" name="F28">
	 <option value=""> Vous êtes</option>
			  	  <option value="1"> Particulier</option>
				  <option value="2">Professionnel</option>
				  	</select> 
	  </div>
	</div>
	<div class="form-group">
            <label  class="col-lg-2 control-label">Type du client </label>
           <div class="col-lg-3">
				<select class="form-control m-bot15" id="F14" name="F14">
                   <option value="0">Choisir le Type...</option>
                         <?php foreach ($rubriques_list as $rubrique): ?>
 				<option value="<?php echo $rubrique->rubrique_id; ?>"> <?php echo $rubrique->rubrique_wording; ?>
                    </option><?php endforeach; ?>
				</select>  
            </div>
			</div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F2" placeholder="Nom">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Prénom</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F3" placeholder="Prénom">
          	</div>
          </div>
        <!--<div class="form-group">
            <label  class="col-lg-2 control-label">Date de naissance</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F4"   >
          	</div>
          </div>-->
          <div class="form-group">
            <label  class="col-lg-2 control-label">Adresse</label>
            <div class="col-lg-10">
              <textarea id="F5" class="form-control"  name="F5"></textarea>
            </div>
          </div>
         <!-- <div class="form-group">
            <label  class="col-lg-2 control-label">Complément d'adresse</label>
            <div class="col-lg-10">
            <input type="text" class="form-control" id="F6" placeholder="Complément d'adresse">
            </div>
          </div>-->
          <div class="form-group">
            <label  class="col-lg-2 control-label">Ville</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F7" placeholder="Ville">
            </div>
          </div>
       <div class="form-group">
            <label  class="col-lg-2 control-label">Code postale</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F8" placeholder="Code postale">
           </div> 
        </div>
        <div class="form-group">
            <label  class="col-lg-2 control-label">Pays</label>
            <div class="col-lg-10">
               <select class="form-control m-bot15" id="F9" name="F9">
                   <option value="0">Choisir le pays...</option>
                   <?php foreach ($countries_list as $country): ?>
                   <option  value="<?php echo $country->country_id; ?>">
                   <?php echo $country->country_FR; ?>
                    </option><?php endforeach; ?>
               </select>  
            </div>
          </div>
         <div class="form-group">
            <label  class="col-lg-2 control-label">N°Téléphone</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F10" placeholder="N°Téléphone">
          	</div>
          </div>
         <div class="form-group">
            <label  class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F11" placeholder="Email">
          	</div>
          </div>
		  <div class="form-group">
            <label  class="col-lg-2 control-label">Entreprise</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F16" placeholder="Entreprise">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Groupe</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F17" placeholder="Groupe">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Forme juridique</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F18" placeholder="Forme juridique">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">SIRET</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F19" placeholder="SIRET">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">TVA INTRACOM</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F20" placeholder="TVA INTRACOM">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Adresse de facturation</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F21" placeholder="Adresse facturation">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Adresse de livraison</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F22" placeholder="Adresse livraison">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Site</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="F23" placeholder="Site">
          	</div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Commentaire</label>
            <div class="col-lg-10">
				<textarea rows="10" cols="30" class="form-control" id="F24" ></textarea>         
            </div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Mot de passe</label>
            <div class="col-lg-10">
              <input type="password" class="form-control" id="F12" placeholder="Mot de passe">
          	</div>
          </div>  
          	    <div class="form-group">
              <label  class="col-lg-2 control-label">Logo</label>
              <div class="col-lg-6"> <span class="field"><span id="customer_logo_up"></span></span>
                <input type="hidden" id="F27">
              </div>
            </div>	
  <aside class="profile-nav col-lg-3" style="left: 176px;">
    <section class="panel">
      <div class="user-heading round"style="background: 0;border-radius: 0; -webkit-border-radius: 0;padding: 0px;"> <a href="#" id="cl"> </a>
        <h1><span id="firstname"></span> <span id="lastname"></span></h1>
        <p id="email"></p>
      </div>
    </section>
  </aside>			
        <div class="user-heading round"style="background: 0;border-radius: 0; -webkit-border-radius: 0;padding: 0px;" > <a href="#" id="cl"> </a>
      </div>
        </form>
      </div>
    
    </section>
  </aside>
</div>
<!-- page end-->
<script type="text/javascript">
    /*function testcheck()
{
    if (!jQuery("#F13").is(":checked")) {
        return false;
    }
    return true;
}*/
    
    
    
    
      jQuery(document).ready(function() {
        jQuery('#customer_logo_up').uploadify({
 
   'buttonText' : 'Logo',
   'width' : '140',
            'uploader':   '<?php echo base_url();?>uploadify/uploadify.swf',
            'script':     '<?php echo base_url();?>uploadify/uploadify.php',
            'cancelImg':  '<?php echo base_url();?>uploadify/cancel.png',
            'folder':    '/custumers_photo/',
   'queueID': 'fileQueue',
            'multi': false,
            'auto'   : true,
   'onComplete': function(event, queueID, fileObj, response, data) { jQuery('#cl').append('<img style="border-radius: 0%;  -webkit-border-radius: 0%; padding-left: 4px;" src='+response+'>'); var image=(fileObj.name); document.getElementById("F27").value=image; }
   
   
   
        });
   });
</script> 
<script type="text/javascript">
  jQuery("#SNE").click(function() {
  jQuery('#sne-notification-success').css("display","none");
  jQuery('#sne-notification-error').css("display","none");
  
//testcheck() ;
 if(jQuery('#F28').val()=='0') {jQuery('#F28').css('border','1px solid #B80000'); return false;}
 if(jQuery('#F14').val()=='0') {jQuery('#F14').css('border','1px solid #B80000'); return false;}
  //if(jQuery('#F1').val()=='') {jQuery('#F1').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F2').val()=='') {jQuery('#F2').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F3').val()=='') {jQuery('#F3').css('border','1px solid #B80000'); return false;}
    if(jQuery('#F5').val()=='') {jQuery('#F5').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F7').val()=='') {jQuery('#F7').css('border','1px solid #B80000'); return false;} 
  if(jQuery('#F8').val()=='') {jQuery('#F8').css('border','1px solid #B80000'); return false;}
   if(jQuery('#F9').val()=='') {jQuery('#F9').css('border','1px solid #B80000'); return false;}
    if(jQuery('#F10').val()=='') {jQuery('#F10').css('border','1px solid #B80000'); return false;}
  /*if(jQuery('#F17').val()=='') {jQuery('#17').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F18').val()=='') {jQuery('#18').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F19').val()=='') {jQuery('#19').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F20').val()=='') {jQuery('#20').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F21').val()=='') {jQuery('#21').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F22').val()=='') {jQuery('#22').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F23').val()=='') {jQuery('#F23').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F24').val()=='') {jQuery('#F24').css('border','1px solid #B80000'); return false;}
  
 */
  
  if(jQuery('#F11').val()=='') {jQuery('#F11').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F12').val()=='') {jQuery('#F12').css('border','1px solid #B80000'); return false;}
   
   //if(jQuery('#F13').val()=='') {jQuery('#F13').css('border','1px solid #B80000'); return false;}




  var F1=jQuery('#F1').val();
  var F2=jQuery('#F2').val();
  var F3=jQuery('#F3').val();
  var F4=jQuery('#F4').val();
  var F5=jQuery('#F5').val();
  var F6=jQuery('#F6').val();
  var F7=jQuery('#F7').val();
  var F8=jQuery('#F8').val();
  var F9=jQuery('#F9').val();
  var F10=jQuery('#F10').val();
  var F11=jQuery('#F11').val();
  var F12=jQuery('#F12').val();
  var F13=jQuery('#F13').val();
  var F14=jQuery('#F14').val();
  var F16=jQuery('#F16').val();
  var F17=jQuery('#F17').val();
  var F18=jQuery('#F18').val();
  var F19=jQuery('#F19').val();
  var F20=jQuery('#F20').val();
  var F21=jQuery('#F21').val();
  var F22=jQuery('#F22').val();
  var F23=jQuery('#F23').val();
  var F24=jQuery('#F24').val();
 var F27=jQuery('#F27').val();
 var F28=jQuery('#F28').val();
 // var F27;
 
  /*  if(testcheck()== true) F27='1' ;
else F27='0'*/
 
  jQuery.ajax({
   url: "<?php echo base_url().'index.php/customers/addcustomerprocess/';?>",
   data: {A:F1,B:F2,C:F3,D:F4,E:F5,F:F6,G:F7,H:F8,I:F9,J:F10,K:F11,L:F12,M:F13,N:F14,O:F17,P:F18,Q:F19,R:F20,S:F21,T:F22,U:F23,V:F24,Z:F16,PH:F27,TI:F28},
   dataType: "json",
   type: "POST",
        success: function(data) {

     if(data.result==1) {
     jQuery('#sne-notification-success').css("display","block");
     }
     if(data.result==0) {
     jQuery('#sne-notification-error').css("display","block");
     }
         }
     })
 });
  </script>