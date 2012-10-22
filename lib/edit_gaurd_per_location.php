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
	mysql_query("update `cisf_gpl` set `dp_description`='$data[1]',`desig_description`='$data[2]' ,`no_of_persons`='$data[3]',`gpl_remarks`='$data[4]' where `gpl_id`='$data[0]'") or die(mysql_error());
	mysql_error();
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
