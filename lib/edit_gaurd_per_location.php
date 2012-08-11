<?php 
	$values=explode("~^",$_GET['values']);
	$gpl_id=$values[0];
	$no_of_persons=$values[1];
	$remark=$values[2];
	include 'open_db.php';
	mysql_query("update `cisf_gpl` set `no_of_persons`='$no_of_persons',`gpl_remarks`='$remark' where `gpl_id`='$gpl_id' ") or die(mysql_error());
	$result1=mysql_query("select `no_of_persons`,`gpl_remarks` from `cisf_gpl` where `gpl_id`='$gpl_id' ") or die(mysql_error());
	$values1 = mysql_fetch_row($result1);
	$no_of_persons=$values1[0];
	$remark=$values1[1];
	$pre_code=$no_of_persons."~^".$remark;
	mysql_close($link);
	echo $pre_code;
?>