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
	mysql_query("update `cisf_swsp` set `shift_date`='$data[1]',`shift`='$data[2]',`persons`='$data[3]',`remarks`='$data[4]' where `swsp_id`='$data[0]' ") or die(mysql_error());
	mysql_error();
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
