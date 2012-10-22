<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include '../../includes/open_db.php';
	if(!empty($_POST))
	{
		$query1="select * from  cisf_shift";
		$result1=mysql_query($query1) or die("query failed <br/>".mysql_error());
		while ($row1 = mysql_fetch_array($result1)) 
		{
			if(isset($_POST[$row1['shift_id']]))
			{
				$temp=mysql_query("delete from  cisf_shift where shift_id=$row1[shift_id] ") or die(mysql_error());
			}
		}
	}
	$query="select * from cisf_shift";
	$result=mysql_query($query) or die("query failed <br/>".mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../styles/view.css" />
		<title>Duty Detail</title>.
		<script type="text/javascript">
			function edit(str)
			{
				var fr=document.getElementById("pop");
				fr.src="cisf_shifts_new.phpx?id="+str;
				fr.style.display="inline";
				document.getElementById("myform").style.visibility="hidden";
				document.getElementById("header").style.visibility="hidden";	
			}
		</script>
	</head>

	<body>
		<div id="header">
            <?php include_once '../../includes/menu.php';?>
			<br><br><br><br>
        </div>
		<div id="form1">
			<iframe id="pop" src="about:blank" name="pop" scrolling="no" style="margin:0em 35em auto; width:25em; height:21em;"></iframe>
			<form id='myform' name='myform'  action="#" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>CISF Shifts [View]</strong>
					</legend>
					<div id="tbl">
						<table border="1" cellspacing="2" >
							<tbody>
								<tr colspan="6">
								<b>CISF Shifts Details</b>
								</tr>
								<tr>
									<th width="30"><input type='image' src='../../img/delete.png' alt='Search' /></th>
									<th width="400">Shift Code</th>
									<th width="400">Description</th>
									<th width="400">From Time</th>
									<th width="400">To Time</th>
									<th width="30"><a href="../cisf_shifts_new"> <img class="s_button" src="../../img/add.png" width=30 height=30></th>
								</tr>
								<?php 
									while ($row = mysql_fetch_array($result))
									{
										echo "<tr>";
										echo "<td><input type='checkbox' name=$row[shift_id] /></td>";
										echo "<td id=$row[shift_id]c >$row[shift_code]</td>";
										echo "<td id=$row[shift_id]d >$row[description]</td>";
										echo "<td id=$row[shift_id]f >$row[from_time]</td>";
										echo "<td id=$row[shift_id]t >$row[to_time]</td>";
										echo "<td><a href=\"#\"><img id=$row[shift_id] class='s_button' src='../../img/edit.png' alt='Edit' width=30 height=30 onclick=\"edit(this.id)\" /></td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</fieldset>
			</form>
		</div>
		<?php mysql_close($link); ?>
	</body>
</html>