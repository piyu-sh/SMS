<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';

	if(!empty($_POST))
	{
		$dp_desc=$_POST['dp_list'];
		$desig_description=explode(" ",$_POST['desig_list']);
		include_once '../../includes/open_db.php';
		$query="SELECT * FROM `cisf_gpl` WHERE `dp_description`= '$dp_desc' and (`desig_description` like '%$desig_description[0]%'";
		foreach ($desig_description as $desc)
		{
			$query=$query." or `desig_description` like '%$desc%'";
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
		<link rel="stylesheet" type="text/css" href="../../styles/view.css" />
		<title>CISF Detail</title>
		
		<script type="text/javascript">
			var x="";
			function edit(str)
			{
				var fr=document.getElementById("pop");
				fr.src="cisf_guards_per_location_new.phpx?id="+str;
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
				xmlhttp.open("GET","../../lib/del_gpl.php?values="+str1,true);
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
			<br /> <br /> <br /> <br />
		</div id="header">
		<div id="form1" >
			<iframe id="pop" src="about:blank" name="pop" scrolling="no" style="margin:0em 30em auto; width:42em; height:30em;"></iframe>
			<form id='myform' name='myform'  action="#" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Guards Per Location [Search]</strong>
					</legend>
						<table border="1" cellspacing="2">
							<tbody>
								<tr colspan="6">
									<b>Duty Point Details</b>
								</tr>
								<tr>
									<th width="30"><a><img class="s_button" src='../../img/delete.png' width=30 height=30 alt='Search' onclick="del_row()" /></th>
									<th width="400">Duty Point</th>
									<th width="400">Designation</th>
									<th width="400">No of Persons</th>
									<th width="400">Remarks</th>
									<th width="30"><a href="../cisf_guards_per_location_new"> <img class="s_button" height=30 width=30 src='../../img/add.png' alt='Add' /> </a></th>
								</tr>
								<?php 
									$i=0;
									while ($row = mysql_fetch_array($result1))
									{
										echo "<tr id=$row[gpl_id]r >";
										echo "<td><input type='checkbox' id=$row[gpl_id]b name=$row[gpl_id] onchange=\"set_check(this.id)\" /></td>";
										echo "<td id=$row[gpl_id]c >$row[dp_description]</td>";
										echo "<td id=$row[gpl_id]d >$row[desig_description]</td>";
										echo "<td id=$row[gpl_id]n >$row[no_of_persons]</td>";
										echo "<td id=$row[gpl_id]s >$row[gpl_remarks]</td>";
										echo "<td ><a href=\"#\"><img id=$row[gpl_id] class=\"s_button\" width=30 height=25 src=\"../../img/edit.png\" onclick=\"edit(this.id)\" /></a></td>";
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
