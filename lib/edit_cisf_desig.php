<?php 
	$values=explode("~^",$_GET['values']);	
	$desig_id=$values[0];
	$desig_code=$values[1];
	$desig_desc=$values[2];
	include 'open_db.php';
	mysql_query("update `cisf_designation` set `desig_code`='$desig_code',`desig_description`='$desig_desc' where `desig_id`='$desig_id'") or die(mysql_error());
	$result=mysql_query("select * from `cisf_designation` where `desig_id`='$desig_id'") or die(mysql_error());
	$values1 = mysql_fetch_row($result);
	$desig_code=$values1[1];
	$desig_desc=$values1[2];
	$pre_code=$desig_code."~^".$desig_desc;
	mysql_close($link);
	echo $pre_code;
?>