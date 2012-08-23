<?php
	$str=$_GET['str'];
	include '../includes/open_db.php';
	$result1=mysql_query("select loc_code from duty_location where loc_description='$str'") or die(mysql_error()); 
	while ($row = mysql_fetch_array($result1))
	{
		$loc_code=$row['loc_code'];
	}
	$result2=mysql_query("select area_description from duty_area where area_code1 like '$loc_code' ") or die(mysql_error());
	$i=0;
	while($row1=mysql_fetch_array($result2))
	{
		$a_desc[$i]=$row1['area_description'];
		$i++;
	}
	$j=0;
	while ($j<$i) 
	{	
		echo "<option>";
		echo $a_desc[$j];
		echo "</option>";
		$j++;
	}
	mysql_close($link);
?>