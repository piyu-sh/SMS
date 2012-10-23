<?php 
	$postdata = $_POST;
	$data = array();
	$i=0;
	foreach($postdata as $x)
	{
		$data[$i]=$x;
		$i++;
	}
	include '../includes/open_db.php';
	mysql_query("update `token_type` set `token_type_code`='$data[1]',`description`='$data[2]',`access_area`='$data[3]',`actual_quantity`='$data[4]',`avail_quantity`='$data[5]',`remarks`='$data[6]' where `token_id`='$data[0]' ") or die(mysql_error());
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
