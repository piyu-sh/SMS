<?php
session_start();
$_SESSION=array();
session_regenerate_id(true);
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,$params["path"],$params["domain"],$params["secure"],$params["httponly"]);
session_destroy();
session_write_close();
header("Location: ../");
?>