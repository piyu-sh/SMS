<?php
	$this_page='duty_details';
include '../../includes/check.php';

	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from duty_location") or die(mysql_error());

	if(!empty($_POST))
	{
		$area_code1=$_POST['area_code1'];
		$area_code2=$_POST['area_code2'];
		$area_description=$_POST['area_description'];
		$area_remarks=$_POST['area_remarks'];
		mysql_query("insert into `duty_area`(`area_code1`,`area_code2`,`area_description`,`area_remarks`) values('$area_code1','$area_code2','$area_description','$area_remarks')") or die(mysql_error());
	}
	mysql_close($link);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../styles/style.css" />
		<title>Duty Detail</title>
		
		<script type="text/javascript">
			function validateForm()
			{
				var x=document.getElementById("area_code2");
				var y=document.getElementById("area_description");
				if ((x.value==null || x.value=="")||(y.value==null || y.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
			
			function get_loc_code(str)
			{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","ret_loc_code.php?str="+str,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					document.getElementById("area_code1").value=xmlhttp.responseText;
				}
			}
		</script>
	</head>
	<body>
		<div>
			<?php include_once '../../includes/menu.php';?>
			<br /> <br /> <br /> <br />
		</div>
		<div id="form1" style="width:32em; height:20em;">
			<form id='login' action="duty_area_new.php" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Duty Area [New]</strong>
					</legend>

					<div id="tbl">
						<table>
							<tbody>
								<tr>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td><label for='loc_list'>*Location</label></td>
									<td>
										<select id="loc_list" onfocus="get_loc_code(this.value)" onchange="get_loc_code(this.value)" style="margin-left:2em; width:10em;">
											<?php 
												$i=0;
												while ($row = mysql_fetch_array($result))
												{
													echo "<option id='".$i."' >".$row['loc_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for='area_code2'>*Area Code</label></td>
									<td>
										<input type='text' name='area_code1' id="area_code1" readonly maxlength="10" style="float:Left; margin-left:2em; width:6em;" /> 
										<input type='text' name='area_code2' id="area_code2" maxlength="10" style="float:Left; margin-left:1em; width:6em;"/>
									</td>
								</tr>
								<tr>
									<td><label for='area_description'>*Description</label></td>
									<td><input type='text' name='area_description' id='area_description' maxlength="50" style="margin-left:2em; width:17em;" /></td>
								</tr>
								<tr>
									<td><label for='area_remarks'>Remarks</label></td>
									<td><textarea rows='3' cols='26' name="area_remarks" id="area_remarks" style="margin-left:2em; resize:none; overflow-y:auto;" ></textarea></td>
								</tr>
								<tr>
									<td colspan="2">
										<a href="duty_area_search.php"><img class="s_button" width=30 height=30 src="../../img/search.png" /> </a> 
										<input id="Save" type='submit' name='Save' value='Save' /> 
										<input id="Clear" type='reset' name='Clear' value='Clear' />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</fieldset>
			</form>
			<?php 
			if(!empty($_POST))
			{
				echo '<br/><br/><p style="text-align:center; font-size:1.5em; color:#0078ff;"><strong>Database updated</strong></p>';
			}
			?>
		</div>
	</body>
</html>
