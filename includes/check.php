<?php
session_start();
if(!(isset($_SESSION['username']))||($_SESSION['sess_id']!=session_id()))
{
	header("Location: ../../lib/signout.php");
}
?>