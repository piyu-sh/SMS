<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';

	if(!empty($_POST))
	{
		$desig_description=$_POST['desig_description'];
		$name1=$_POST['name1'];
		$from_join_date=$_POST['from_join_date'];
		$to_join_date=$_POST['to_join_date'];
		include_once '../../includes/open_db.php';
		$result=mysql_query("select * from cisf_sp where desig_description='$desig_description' and `name1` like '%$name1%' or `join_date` between '$from_join_date' and '$to_join_date%' ") or die(mysql_error());
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../styles/view.css" />
		<title>CISF Detail</title>
		
		<script type="text/javascript">
			var x="";
			function edit(str)
			{
				var fr=document.getElementById("pop");
				fr.src="cisf_security_personnel_new.phpx?id="+str;
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
				xmlhttp.open("GET","../../lib/del_sp.php?values="+str1,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					x="";
					var rows = xmlhttp.responseText;
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
			<iframe id="pop" src="about:blank" name="pop" scrolling="no" style="margin:0em 20em auto; width:60em; height:30em;"></iframe>
			<form id='myform' name='myform'  name='login' action="#" method='post' accept-charset='UTF-8'>
			
				<fieldset>
					<legend>
						<strong>Security Personnel Search Result</strong>
					</legend>
					<div id="tbl">
						<table border="1" cellspacing="2">
							<tbody>
								<tr colspan="6">
									<b>Security Personnel Details</b>
								</tr>
								<tr>
									<th width="30"><a><img class="s_button" width=30 height=30 src="../../img/delete.png" onclick="del_row()" /> </a></th>
									<th width="400">CISF Number</th>
									<th width="400">Person Name</th>
									<th width="400">Designation</th>
									<th width="400">Status</th>
									<th width="30"><a href="../cisf_security_personnel_new"><img class="s_button" width=30 height=30 src="../../img/add.png" /> </a></th>
								</tr>
								<?php 
									$i=0;
									while ($row = mysql_fetch_array($result))
									{
										echo "<tr id=$row[sp_id]r >";
										echo "<td><input type='checkbox' id=$row[sp_id]b name=$row[sp_id] onchange=\"set_check(this.id)\" /></td>";
										echo "<td id=$row[sp_id]c >$row[cisf_no]</td>";
										echo "<td id=$row[sp_id]n >$row[name1]</td>";
										echo "<td id=$row[sp_id]d >$row[desig_description]</td>";
										echo "<td id=$row[sp_id]s >$row[status]</td>";
										echo "<td ><a href=\"#\"><img id=$row[sp_id] class=\"s_button\" width=30 height=25 src=\"../../img/edit.png\" onclick=\"edit(this.id)\" /></a></td>";
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