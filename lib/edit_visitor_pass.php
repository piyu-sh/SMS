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
	mysql_query("update `visitor_pass` set `issue_date`='$data[1]',`visitor_name`='$data[2]',`no_of_persons`='$data[3]',`visit_place`='$data[4]',`purpose`='$data[5]',`in_time`='$data[6]',`out_time`='$data[7]',`address`='$data[8]',`remarks`='$data[9]' where `visitor_id`='$data[0]' ") or die(mysql_error());
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
