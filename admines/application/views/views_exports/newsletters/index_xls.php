<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=export-newsletters-".date('d-m-Y H:i:s').".xls");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
?>
<table>
	<thead>
	  <tr  border="1">
	  <th align="left">ID</th>
		
		<th align="center">Email</th>
		
	
	  </tr>
    </thead>
	<?php if( !empty($newsletters_list) ) { foreach($newsletters_list as $newsletters) : ?>
	  <tr border="1">
	<td align="center"><?=$newsletters->newsletter_id;?></td>

	
		<td align="center"><?= $newsletters->client_email;?></td>
	  

	  </tr>
	<?php endforeach; } ?>
	 
</table>