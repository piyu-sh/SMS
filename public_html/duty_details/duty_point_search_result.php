<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	if(!empty($_POST))
	{
		$loc_desc=$_POST['loc_list'];
		$area_desc=$_POST['area_list'];
		$dp_description=explode(" ",$_POST['dp_description']);
		include_once 'open_db.php';
		$result=mysql_query("select area_code2 from duty_area where area_description='$area_desc' ") or die(mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			$area_code=$row['area_code2'];
		}
		$query="SELECT dp_id,dp_code1,dp_code2,dp_code3,dp_description,no_shifts,shifts FROM `duty_point` WHERE `dp_code2`='$area_code' and (`dp_description` like '%$dp_description[0]%'";
		foreach ($dp_description as $desc)
		{
			$query=$query." or `dp_description` like '%$desc%'";
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
		<link rel="stylesheet" type="text/css" href="view.css" />
		<title>Duty Detail</title>
		
		<script type="text/javascript">
			var x="";
			function edit(str)
			{
				var code=prompt("Enter new Duty Point Code (max 10 characters)");
				var desc=prompt("Enter new Duty Point Description (max 50 characters)");
				var no_shifts=prompt("Enter new No. of Shifts");
				var shifts=prompt("Enter new Shifts (max 10 characters)");
				var remark=prompt("Enter new Remarks (max 250 characters)");
				if(code && desc && no_shifts && shifts)
				{
					var code_id=str+'c';
					var desc_id=str+'d';
					var no_id=str+'n';
					var shift_id=str+'s';
					var values=str+"~^"+code+"~^"+desc+"~^"+no_shifts+"~^"+shifts+"~^"+remark;
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","edit_duty_point.php?values="+values,true);
					xmlhttp.send();
					xmlhttp.onreadystatechange=function()
					{
						var pre_code1=xmlhttp.responseText;
						code1= pre_code1.split("~^");
						code2=code1[0]+"-"+code1[1]+"-"+code1[2];
						document.getElementById(code_id).textContent=code2;
						document.getElementById(desc_id).textContent=code1[3];
						document.getElementById(no_id).textContent=code1[4];
						document.getElementById(shift_id).textContent=code1[5];
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
				xmlhttp.open("GET","del_duty_point.php?values="+str1,true);
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
			<?php include_once 'menu.php';?>
			<br /> <br /> <br /> <br />
		</div>
		<div id="form1" style="width:60em;" >
			<form id='login' action="#" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Duty Point [Search]</strong>
					</legend>
						<table border="1" cellspacing="2">
							<tbody>
								<tr colspan="6">
									<b>Duty Point Details</b>
								</tr>
								<tr>
									<th width="30"><a><img class="s_button" src='img/delete.png' width=30 height=30 alt='Search' onclick="del_row()" /></th>
									<th width="400">DP Code</th>
									<th width="400">Duty Point Description</th>
									<th width="400">No of Shifts</th>
									<th width="400">Shifts</th>
									<th width="30"><a href="duty_point_new.php"> <img class="s_button" height=30 width=30 src='img/add.png' alt='Add' /> </a></th>
								</tr>
								<?php 
									$i=0;
									while ($row = mysql_fetch_array($result1))
									{
										echo "<tr id=$row[dp_id]r >";
										echo "<td><input type='checkbox' id=$row[dp_id]b name=$row[dp_id] onchange=\"set_check(this.id)\" /></td>";
										echo "<td id=$row[dp_id]c >$row[dp_code1]-$row[dp_code2]-$row[dp_code3]</td>";
										echo "<td id=$row[dp_id]d >$row[dp_description]</td>";
										echo "<td id=$row[dp_id]n >$row[no_shifts]</td>";
										echo "<td id=$row[dp_id]s >$row[shifts]</td>";
										echo "<td ><a href=\"#\"><img id=$row[dp_id] class=\"s_button\" width=30 height=25 src=\"img/edit.png\" onclick=\"edit(this.id)\" /></a></td>";
										echo "</tr>";
										$i++;
									}
								?>
							</tbody>
						</table>
				</fieldset>
			</form>
		</div>
	</body>
</html>
