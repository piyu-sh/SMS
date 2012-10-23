<?php 
	$this_page='ground_control_units';
	include '../../includes/check.php';

	if(!empty($_POST))
	{
		$in_time=$_POST['in_time'];
		$out_time=$_POST['out_time'];
		include_once '../../includes/open_db.php';
		$result=mysql_query("select * from vehicle_mov where in_time='$in_time' and out_time='$out_time'") or die(mysql_error());
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../styles/view.css" />
		<title>Duty Detail</title>
		
		<script type="text/javascript">
			var x="";
			function edit(str)
			{
				var fr=document.getElementById("pop");
				fr.src="vehicle_mov_reg_new.phpx?id="+str;
				fr.style.display="inline";
				document.getElementById("myform").style.visibility="hidden";	
				document.getElementById("header").style.visibility="hidden";	
			}
			
			function set_check(str)
			{
				if(str)
				{
					if(document.getElementById(str).checked)
					{
						x=x+"_"+str;
					}
					else
					{
						str="_"+str;
						x=x.replace(str,"");
					}
				}
				return x;
			}

			function del_row()
			{
				var str1=set_check("");
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","../../lib/del_vehicle_mov.php?values="+str1,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					x="";
					var rows=xmlhttp.responseText;
					rows=rows.split("_");
					for(var i=1;i<rows.length;i++)
					{	
						rows[i]=rows[i]+"r";
						if(document.getElementById(rows[i]))
						{
							var j=document.getElementById(rows[i]);
							j.parentNode.removeChild(j);
						}
					}
				}

			}	
		</script>
	</head>

	<body>
		<div id="header">
			<?php include_once '../../includes/menu.php';?>
			<br> <br> <br> <br>
		</div>
		<div id="form1">
			<iframe id="pop" src="about:blank" name="pop" scrolling="no" style="margin:0em 16em auto; width:60em; height:28em;"></iframe>
			<form id='myform' name='myform'  name='login' action="#" method='post' accept-charset='UTF-8'>
			
				<fieldset>
					<legend>
						<strong>Vehicle Movement Register Search Result</strong>
					</legend>
					<div id="tbl">
						<table border="1" cellspacing="2">
							<tbody>
								<tr colspan="5">
									<b>Vehicle Movement Register Details</b>
								</tr>
								<tr>
									<th width="30"><a><img class="s_button" width=30 height=30 src="../../img/delete.png" onclick="del_row()" /> </a></th>
									<th width="400">Registration Number</th>
									<th width="400">In Time</th>
									<th width="400">Out Time</th>
									<th width="30"><a href="../vehicle_mov_reg_new"> <img class="s_button" src="../../img/add.png" width="30"	height="30"></th>
								</tr>
								<?php 
									$i=0;
									while ($row = mysql_fetch_array($result))
									{
										echo "<tr id=$row[vehicle_id]r >";
										echo "<td><input type='checkbox' id=$row[vehicle_id]b name=$row[vehicle_id] onchange=\"set_check(this.id)\" /></td>";
										echo "<td id=$row[vehicle_id]r >$row[reg_no]</td>";
										echo "<td id=$row[vehicle_id]i >$row[in_time]</td>";
										echo "<td id=$row[vehicle_id]o >$row[out_time]</td>";
										echo "<td ><a href=\"#\"><img id=$row[vehicle_id] class=\"s_button\" width=30 height=25 src=\"../../img/edit.png\" onclick=\"edit(this.id)\" /></a></td>";
										echo "</tr>";
										$i++;
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