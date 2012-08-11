<?php
	$str=$_GET['str'];
	include 'open_db.php';
	$query2="select * from duty_location where loc_description='".$str."'";
	$result2=mysql_query($query2) or die(mysql_error());
	var_export(mysql_fetch_array($result2));
	mysql_close($link);
?>