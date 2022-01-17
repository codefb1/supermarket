<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-newsletters-".date('d-m-Y H:i:s').".csv");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
ID;Client;Email
<?php if( !empty($newsletters_list) ) { foreach($newsletters_list as $newsletters) :
	


?>
<?=trim($newsletters->newsletter_id);?>;?>;<?=$newsletters->client_email;?>;
<?php endforeach; } ?>
	 
