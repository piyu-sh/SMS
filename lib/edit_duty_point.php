<?php 
	$values=explode("~^",$_GET['values']);
	$dp_id=$values[0];
	$dp_code=$values[1];
	$dp_desc=$values[2];
	$no_shifts=$values[3];
	$shifts=$values[4];
	$dp_remark=$values[5];
	include '../includes/open_db.php';
	mysql_query("update `duty_point` set `dp_code3`='$dp_code',`dp_description`='$dp_desc',`no_shifts`='$no_shifts',`shifts`='$shifts',`dp_remarks`='$dp_remark' where `dp_id`='$dp_id' ") or die(mysql_error());
	$result1=mysql_query("select * from `duty_point` where `dp_id`='$dp_id' ") or die(mysql_error());
	$values1 = mysql_fetch_row($result1);
	$dp_code1=$values1[1];
	$dp_code2=$values1[2];
	$dp_code3=$values1[3];
	$dp_desc=$values1[5];
	$no_shifts=$values1[6];
	$shifts=$values1[7];
	$pre_code=$dp_code1."~^".$dp_code2."~^".$dp_code3."~^".$dp_desc."~^".$no_shifts."~^".$shifts;
	mysql_close($link);
	echo $pre_code;
?>