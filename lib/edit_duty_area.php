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
	mysql_query("update `duty_area` set `area_code1`='$data[2]',`area_code2`='$data[3]',`area_description`='$data[4]',`area_remarks`='$data[5]' where `area_id`='$data[0]' ") or die(mysql_error());
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
