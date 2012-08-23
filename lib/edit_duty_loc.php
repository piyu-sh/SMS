<?php 
	$values=explode("~^",$_GET['values']);
	$loc_id=$values[0];
	$loc_code=$values[1];
	$loc_desc=$values[2];
	include '../includes/open_db.php';
	mysql_query("update `duty_location` set `loc_code`='$loc_code',`loc_description`='$loc_desc' where `loc_id`='$loc_id'") or die(mysql_error());
	$result=mysql_query("select * from `duty_location` where `loc_id`='$loc_id'") or die(mysql_error());
	$values1 = mysql_fetch_row($result);
	$loc_code=$values1[1];
	$loc_desc=$values1[2];
	$loc_remarks=$values1[3];
	$pre_code=$loc_code."~^".$loc_desc;
	mysql_close($link);
	echo $pre_code;
?>