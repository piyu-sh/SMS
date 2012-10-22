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
	mysql_query("update `duty_point` set `dp_code1`='$data[3]',`dp_code2`='$data[4]',`dp_code3`='$data[5]',`dp_description`='$data[6]',`no_shifts`='$data[7]',`shifts`='$data[8]',`dp_remarks`='$data[9]' where `dp_id`='$data[0]' ") or die(mysql_error());
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
?>