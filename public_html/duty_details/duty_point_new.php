<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from duty_location") or die(mysql_error());

	if(!empty($_POST))
	{
		$area_description=$_POST['area_list'];
		$result=mysql_query("SELECT * FROM `duty_area` WHERE `area_description` = '$area_description'") or die(mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			$dp_code1=$row['area_code1'];
			$dp_code2=$row['area_code2'];
		}
		$radio1=$_POST['radio1'];
		$radio2=$_POST['radio2'];
		$radio3=$_POST['radio3'];
		$dp_code3=$_POST['dp_code2'];
		$dp_description=$_POST['dp_description'];
		$no_shifts=$_POST['no_of_shifts'];
		$shifts=$_POST['shifts'];
		$dp_remarks=$_POST['dp_remarks'];
		mysql_query("insert into `duty_point`(`dp_code1`,`dp_code2`,`dp_code3`,`dp_radio`,`dp_description`,`no_shifts`,`shifts`,`dp_remarks`) values('$dp_code1','$dp_code2','$dp_code3','$radio1-$radio2-$radio3','$dp_description','$no_shifts','$shifts','$dp_remarks')") or die(mysql_error());
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
		
		<style type="text/css">
			select{float:Left;	margin-left:2em; width:20em;}
			input[type=radio]
			{
				float:right;
				margin-right:3em;
			}
		</style>
		<script type="text/javascript">
			function validateForm()
			{
				var a=document.getElementById("dp_code2");
				var b=document.getElementById("dp_description");
				var c=document.getElementById("no_of_shifts");
				var d=document.getElementById("shifts");
				if ((a.value==null || a.value=="")||(b.value==null || b.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				if ((c.value==null || c.value=="")||(d.value==null || d.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
			
			function get_area_description(str)
			{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","../../lib/ret_area_desc.php?str="+str,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					document.getElementById("area_list").innerHTML=xmlhttp.responseText;
				}
			}
			function get_area_code(str)
			{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","../../lib/ret_area_code.php?str="+str,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					document.getElementById("dp_code").value=xmlhttp.responseText;
				}
			}
		</script>

		</head>
		<body>
			<div>
				<?php include_once '../../includes/menu.php';?>
				<br /> <br /> <br /> <br />
			</div>
			<div id="form1"  >
				<form id='myform' name='myform'  action="duty_point_new.php" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
					<fieldset>
						<legend >
							<strong>Duty Point [New]</strong>
						</legend>
						<div id="tbl" >
							<table>
								<tbody>
									<tr>
										<th></th>
										<th></th>
										<th></th>
									</tr>
									<tr>
										<td><label for='loc_list'>*Duty Location</label></td>
										<td colspan="2">
											<select id="loc_list" name="loc_list" onfocus="get_area_description(this.value)" onchange="get_area_description(this.value)">
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
										<td><label for='area_list'>*Duty Area</label></td>
										<td  colspan="2">
											<select id="area_list" name='area_list' onfocus="get_area_code(this.value)" onchange="get_area_code(this.value)" ></select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<input type='radio' name='radio1' id="radio1" value="Critical" checked="checked"/>
											<label for='radio1' style="float:left;">Critical</label>
										</td>
										<td>
											<input type='radio' name='radio1' id="radio2" value="Non Critical"  />
											<label for='radio2' style="float:left;">Non Critical</label>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<input type='radio' name='radio2' id="radio3" value="Male" checked="checked" />
											<label for='radio3' style="float:left;">Male</label>
										</td>
										<td>
											<input type='radio' name='radio2' id="radio4" value="Female"/>
											<label for='radio4'style="float:left;">Female</label>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<input type='radio' name='radio3' id="radio5" value="Armed" checked="checked" />
											<label for='radio5' style="float:left;">Armed</label>
										</td>
										<td>
											<input type='radio' name='radio3' id="radio6" value="Un Armed"/>
											<label for='radio6' style="float:left;">Un Armed</label>
										</td>
									</tr>
									<tr>
										<td><label for='dp_code2'>*DP Code</label></td>
										<td colspan="2">
											<input type='text' readonly name='dp_code' id="dp_code" maxlength="10" style="float:Left; margin-left:2em; width:7em;"/>
											<input type='text' name='dp_code2' id="dp_code2" maxlength="10" style="float:Left; margin-left:1em; width:7em;"/>
										</td>
									</tr>
									<tr>
										<td><label for='dp_description'>*Description</label></td>
										<td colspan="2"><input type='text' name='dp_description' id='dp_description' maxlength="50" style="float:Left; margin-left:2em; width:20em;"/></td>
									</tr>
									<tr>
										<td><label for='no_of_shifts'>*No of shifts</label></td>
										<td colspan="2"><input type='text' name='no_of_shifts' id='no_of_shifts' maxlength="5" style="float:Left; margin-left:2em; width:12em;" /></td>
									</tr>
									<tr>
										<td><label for='shifts'>*Shifts</label></td>
										<td colspan="2"><input type='text' name='shifts' id='shifts' maxlength="10" style="float:Left; margin-left:2em; width:12em;" /></td>
									</tr>
									<tr>
										<td><label for='dp_remarks'>Remarks</label></td>
										<td colspan="2"><textarea rows='3' cols='26' name="dp_remarks" id="dp_remarks" style="resize:none; margin-left:2em; width:20em;" ></textarea></td>
									</tr>
									<tr>
										<td colspan="3">
											<a href="duty_point_search.php"><img src="../../img/search.png" class="s_button" width=30 height=30/> </a> 
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
