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
	mysql_query("update `vehicle_mov` set `reg_no`='$data[1]',`driver_name`='$data[2]',`license_number`='$data[3]',`license_particulars`='$data[4]',`permit_no`='$data[5]',`particulars`='$data[6]',`in_time`='$data[7]',`out_time`='$data[8]',`remarks`='$data[9]' where `vehicle_id`='$data[0]' ") or die(mysql_error());
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
