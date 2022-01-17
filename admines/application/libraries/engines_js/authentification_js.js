jQuery("#CB").click(function() {
  
  jQuery('#a-notification-success').css("display","none");
  jQuery('#a-notification-error').css("display","none");
  
 
  if(jQuery('#F1').val()=='') {jQuery('#F1').css('border','1px solid #B80000'); return false;}
  if(jQuery('#F2').val()=='') {jQuery('#F2').css('border','1px solid #B80000'); return false;}
  if(jQuery('#SP').val()!='') {return false;}

  var F1=jQuery('#F1').val();
  var F2=jQuery('#F2').val();
  
  jQuery.ajax({
   url: "<?php echo base_url().'index.php/authentification/checkaccount/';?>",
   data: {A:F1,B:F2},
   dataType: "json",
   type: "POST",
        success: function(data) {
    
       if(data.result==1) {
     jQuery('#a-notification-success').css("display","block");
     }
     if(data.result==0) {
     jQuery('#a-notification-error').css("display","block");
     }
         }
     })
 });