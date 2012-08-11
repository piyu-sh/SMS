<?php
$error['password'] = " ";
$u_empty['username'] = " ";
$p_empty['password'] = " ";
$php_self = $_SERVER['PHP_SELF'];

if (!empty($_POST)) {
	include 'includes/open_db.php';
	$myquery="select * from users";
	$myresult=mysql_query($myquery) or die("query to get data from table failed".mysql_error());
	$mynumrow=mysql_num_rows($myresult);
	mysql_close($link);
	$i=0;
	while ($myrow = mysql_fetch_array($myresult))
	{
		$user_check[$i]=$myrow["username"];
		$pass_check[$i]=$myrow["password"];
		$i++;
	}
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	if (empty($_POST['username'])) {
		$u_empty['username'] = "<span class=\"errormess\">Username must be entered</span><br/>";
	} else {
		$u_empty['username'] = " ";
	}
	if (empty($_POST['password'])) {
		$p_empty['password'] = "<span class=\"errormess\">Password must be entered</span><br/>";
	} else {
		if (!empty($_POST['username'])) {
			for($j=0;$j<$i;$j++)
			{
			if ($username == $user_check[$j]) {
				if ($password == $pass_check[$j]) {
					session_start();
					session_regenerate_id(true);
					$_SESSION['sess_id']=session_id();
					$_SESSION['username']=$username;
					header("Location: public_html/home/");
				} else {
					$error['password'] = "<span class=\"errormess\">You entered wrong Username/Password</span><br/>";

				}
			} else {
				$error['password'] = "<span class=\"errormess\">You entered wrong Username/Password</span><br/>";
			}
			}
		} else {
			$error['password'] = " ";
		}
		$p_empty['password'] = " ";
	}

} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<title>SMS</title>
<link rel="shortcut icon" type="image/icon" href="img/part1.gif" />

</head>

<body>

	<img class="center" src="img/part1.gif" alt="AAI Logo" />

	<img class="center" src="img/part2.gif" alt="About AAI" />

	<div id="form1">
		<form id='login' action="<?php echo $php_self?>" method='post'
			accept-charset='UTF-8'>


			<fieldset>
				<legend>
					<strong>Login</strong>
				</legend>

				<div id="tbl">
					<table>
						<tbody>
							<tr>
								<th></th>
								<th></th>
							</tr>
							<span class="errormess">required fields* </span>
							</tr>
							<br />
							<br />
							<tr>
								<td><label for='username'>UserName*:</label></td>
								<td><input type='text' name='username' id='username'
									maxlength="50" /></td>
							</tr>
							<tr>
								<td><br /></td>
							</tr>
							<tr>
								<td colspan="2"><?php echo $u_empty['username']?></td>
							</tr>
							<tr>
								<td><label for='password'>Password*:</label>
								</td>
								<td><input type='password' name='password' id='password'
									maxlength="50" /></td>
							</tr>
							<tr>
								<td><br /></td>
							</tr>

							<tr>
								<td colspan="2"><?php echo $p_empty['password']?>
								</td>

							</tr>
							<tr>
								<td colspan="2"><?php echo $error['password']?></td>

							</tr>
							<tr>
								<td colspan="2"><input id="submit1" type='submit' name='Submit'
									value='Submit' /></td>
							</tr>
						</tbody>
					</table>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>
