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
	mysql_query("update `cisf_shift` set `shift_code`='$data[1]',`description`='$data[2]',`from_time`='$data[3]',`to_time`='$data[4]' where `shift_id`='$data[0]' ") or die(mysql_error());
	mysql_error();
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
