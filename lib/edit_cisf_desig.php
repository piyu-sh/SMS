<?php 
	$postdata = $_POST;
	$data = array();
	$i=0;
	foreach($postdata as $x)
	{
		$data[$i]=$x;
		$i++;
	}
	include '../includes/open_db.php';
	mysql_query("update `cisf_designation` set `desig_code`='$data[1]',`desig_description`='$data[2]' where `desig_id`='$data[0]'") or die(mysql_error());
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
