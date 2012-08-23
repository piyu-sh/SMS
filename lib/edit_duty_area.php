<?php 
	$values=explode("~^",$_GET['values']);
	$area_id=$values[0];
	$area_code=$values[1];
	$area_desc=$values[2];
	$area_remark=$values[3];
	include '../includes/open_db.php';
	mysql_query("update `duty_area` set `area_code2`='$area_code',`area_description`='$area_desc',`area_remarks`='$area_remark' where `area_id`='$area_id' ") or die(mysql_error());
	$result1=mysql_query("select * from `duty_area` where `area_id`='$area_id' ") or die(mysql_error());
	$values1 = mysql_fetch_row($result1);
	$area_code1=$values1[1];
	$area_code2=$values1[2];
	$area_desc=$values1[3];
	$area_remarks=$values1[4];
	$pre_code=$area_code1."~^".$area_code2."~^".$area_desc."~^".$area_remarks;
	mysql_close($link);
	echo $pre_code;
?>