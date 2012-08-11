<?php
	$mysqlusername="root";
	$mysqlpassword="";
	$link=mysql_connect("localhost",$mysqlusername,$mysqlpassword) or die("error connecting to mysql".mysql_error());
	$dbname="sms";
	mysql_select_db($dbname,$link) or die("error selecting specified database".mysql_error());
	?>