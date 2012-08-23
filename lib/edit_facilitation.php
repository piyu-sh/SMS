<?php 
	$values=explode("~^",$_GET['values']);
	$facility_id=$values[0];
	$facility=$values[1];
	include '../includes/open_db.php';
	mysql_query("update `duty_facilitation` set `facility`='$facility' where `facility_id`='$facility_id'") or die(mysql_error());
	$result=mysql_query("select `facility` from `duty_facilitation` where `facility_id`='$facility_id'") or die(mysql_error());
	$values1 = mysql_fetch_row($result);
	$facility=$values1[0];
	mysql_close($link);
	echo $facility;
?>