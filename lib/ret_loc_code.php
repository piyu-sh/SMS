<?php
	$str=$_GET['str'];
	include '../includes/open_db.php';
	$query2="select * from duty_location where loc_description='".$str."'";
	$result2=mysql_query($query2) or die(mysql_error());
	while($row=mysql_fetch_array($result2))
	{
		$code=$row['loc_code'];
	}
	echo $code;
	mysql_close($link);
?>