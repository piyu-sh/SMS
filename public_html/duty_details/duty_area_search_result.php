<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	if(!empty($_POST))
	{
		$loc_description=$_POST['loc_description'];
		$area_description=explode(" ",$_POST['area_description']);
		include_once '../../includes/open_db.h';
		$result=mysql_query("select loc_code from duty_location where loc_description='$loc_description'") or die(mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			$loc_code=$row['loc_code'];
		}
		$query="SELECT area_id,area_code1,area_code2,area_description,loc_description FROM `duty_area`,`duty_location` WHERE `loc_description`='$loc_description' and `area_code1` = '$loc_code' and(`area_description` like '%$area_description[0]%'";
		foreach ($area_description as $desc)
		{
			$query=$query." or `area_description` like '%$desc%'";
		}
		$query=$query.")";
		$result1=mysql_query($query) or die(mysql_error());
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../styles/style.css" />
		<title>Duty Detail</title>
		
		<script type="text/javascript">
			var x="";
			function edit(str)
			{
				var code=prompt("Enter new Area Code (max 10 characters)");
				var desc=prompt("Enter new Area Description (max 50 characters)");
				var remark=prompt("Enter new Area Remarks(max 50 characters)");
				if(code && desc)
				{
					var code_id=str+'c';
					var desc_id=str+'d';
					var loc_des=str+'l';
					var values=str+"~^"+code+"~^"+desc+"~^"+remark;
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","edit_duty_area.php?values="+values,true);
					xmlhttp.send();
					xmlhttp.onreadystatechange=function()
					{
						var pre_code1=xmlhttp.responseText;
						code1= pre_code1.split("~^");
						code2=code1[0]+"-"+code1[1];
						document.getElementById(code_id).textContent=code2;
						document.getElementById(desc_id).textContent=code1[2];
					}
				}
			}

			function set_check(str)
			{
				if(str)
				{
					if(document.getElementById(str).checked)
					{
						x=x+"_"+str;
					}
				}
				else
				{
					str="_"+str;
					x=x.replace(str,"");
				}
				return x;
			}

			function del_row()
			{
				var str1=set_check("");
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","del_duty_area.php?values="+str1,true);
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
		<div>
			<?php include_once '../../includes/menu.php';?>
			<br> <br> <br> <br>
		</div>
		<div id="form1" style="width:60em;" >
			<form id='login' name='login' action="#" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Duty Area Search Result</strong>
					</legend>
					<div id="tbl">
						<table border="1" cellspacing="2">
							<tbody>
								<tr colspan="5">
									<b>Duty Area Details</b>
								</tr>
								<tr>
									<th width="30"><a><img class="s_button" width=30 height=30 src="../../img/delete.png" onclick="del_row()" /> </a></th>
									<th width="400">Area Code</th>
									<th width="400">Area Description</th>
									<th width="400">Location</th>
									<th width="30"><a href="duty_area_new.php"><img class="s_button" width=30 height=30 src="../../img/add.png" /> </a></th>
								</tr>
								<?php 
									$i=0;
									while ($row = mysql_fetch_array($result1))
									{
										echo "<tr id=$row[area_id]r >";
										echo "<td><input type='checkbox' id=$row[area_id]b name=$row[area_id] onchange=\"set_check(this.id)\" /></td>";
										echo "<td id=$row[area_id]c >$row[area_code1]-$row[area_code2]</td>";
										echo "<td id=$row[area_id]d >$row[area_description]</td>";
										echo "<td id=$row[area_id]l >$row[loc_description]</td>";
										echo "<td ><a href=\"#\"><img id=$row[area_id] class=\"s_button\" width=30 height=25 src=\"../../img/edit.png\" onclick=\"edit(this.id)\" /></a></td>";
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
	</body>
</html>