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
	mysql_query("update `cisf_sp` set `cisf_no`='$data[1]',`name1`='$data[2]',`gender`='$data[4]',`date_of_birth`='$data[3]',`desig_description`='$data[5]',`join_date`='$data[6]',`address`='$data[7]',`res_ph`='$data[9]',`office_ph`='$data[8]',`fax`='$data[10]',`email_address`='$data[11]',`status`='$data[12]',`remarks`='$data[13]' where `sp_id`='$data[0]' ") or die(mysql_error());
	mysql_error();
	$err = mysql_errno();
	echo $err;
	mysql_close($link);
	
?>
	
