<?php
	$str=$_GET['str'];
	include 'open_db.php';
	$query2="select * from duty_area where area_description='$str'";
	$result2=mysql_query($query2) or die(mysql_error());
	while($row=mysql_fetch_array($result2))
	{
		$code=$row['area_code1']."-".$row['area_code2'];
	}
	echo $code;
	mysql_close($link);
?>