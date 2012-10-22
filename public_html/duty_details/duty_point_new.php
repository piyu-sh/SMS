<?php 
	$this_page='duty_details';
	include '../../includes/check.php';

	include_once  '../../includes/open_db.php';
	$result1=mysql_query("select * from duty_location") or die(mysql_error());

	if(!empty($_POST))
	{
		$dp_code1=$_POST['dp_code1'];
		$dp_code2=$_POST['dp_code2'];
		$dp_code3=$_POST['dp_code3'];
		$dp_description=$_POST['dp_description'];
		$no_shifts=$_POST['no_of_shifts'];
		$shifts=$_POST['shifts'];
		$dp_remarks=$_POST['dp_remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `duty_point`(`dp_code1`,`dp_code2`,`dp_code3`,`dp_description`,`no_shifts`,`shifts`,`dp_remarks`) values('$dp_code1','$dp_code2','$dp_code3','$dp_description','$no_shifts','$shifts','$dp_remarks')") or die(mysql_error());
		}
	}
	
	if(@!empty($_GET))
	{
		$dp_id = $_GET["id"];
		$query="select * from duty_point where `dp_id`='$dp_id' ";
		$result=mysql_query($query) or die("query failed <br/>".mysql_error());
		$row=mysql_fetch_array($result);
		$loc_code=$row['dp_code1'];
		$area_code=$row['dp_code2'];
		$result2=mysql_query("select * from duty_location where `loc_code`='$loc_code' ")or die("query failed <br/>".mysql_error());
		$row2=mysql_fetch_array($result2);
		$result3=mysql_query("select * from duty_area where `area_code2`='$area_code' and `area_code1`='$loc_code' ")or die("query failed <br/>".mysql_error());
		$row3=mysql_fetch_array($result3);
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
					var code = xmlhttp.responseText;
					var values = code.split("~^");
					document.getElementById("dp_code1").value= values[0];
					document.getElementById("dp_code2").value= values[1];
				}
			}
		</script>

		</head>
		<body onload="document.forms[0].dp_code3.focus();">
			<div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
				<?php include_once '../../includes/menu.php';?>
				<br /> <br /> <br /> <br />
			</div>
			<div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?> >
				<form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"duty_point_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
					<fieldset>
						<legend >
							<strong>Duty Point <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
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
										<td><label for='loc_list'>*Duty Location</label>
											<input type="hidden" id="getid" name="getid" value="" />
										</td>
										<td colspan="2">
											<select id="loc_list" name="loc_list" onfocus="get_area_description(this.value)" onchange="get_area_description(this.value)">
											<?php 
												if(!@empty($_GET))
												{
													echo "<option id='".$i."' >".$row2['loc_description']."</option>";
												}
												$i=0;
												while ($row1 = mysql_fetch_array($result1))
												{
													echo "<option id='".$i."' >".$row1['loc_description']."</option>";
													$i++;
												}
											?>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for='area_list'>*Duty Area</label></td>
										<td  colspan="2">
											<select id="area_list" name='area_list' onfocus="get_area_code(this.value)" onchange="get_area_code(this.value)" >
											<?php 
												if(!@empty($_GET))
												{
													echo "<option id='".$i."' >".$row3['area_description']."</option>";
												}
											?>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for='dp_code2'>*DP Code</label></td>
										<td colspan="2">
											<input type='text' readonly name='dp_code1' id="dp_code1" maxlength="10" style="float:Left; margin-left:2em; width:3.5em;" value="<?php echo (@empty($_GET))?"":"$row[dp_code1]"; ?>"/>
											<input type='text' readonly name='dp_code2' id="dp_code2" maxlength="10" style="float:Left; width:3.5em;" value="<?php echo (@empty($_GET))?"":"$row[dp_code2]"; ?>"/>
											<input type='text' name='dp_code3' id="dp_code3" maxlength="10" style="float:Left; margin-left:1em; width:7em;" value="<?php echo (@empty($_GET))?"":"$row[dp_code3]"; ?>" />
										</td>
									</tr>
									<tr>
										<td><label for='dp_description'>*Description</label></td>
										<td colspan="2"><input type='text' name='dp_description' id='dp_description' maxlength="50" style="float:Left; margin-left:2em; width:20em;" value="<?php echo (@empty($_GET))?"":"$row[dp_description]"; ?>" /></td>
									</tr>
									<tr>
										<td><label for='no_of_shifts'>*No of shifts</label></td>
										<td colspan="2"><input type='text' name='no_of_shifts' id='no_of_shifts' maxlength="5" style="float:Left; margin-left:2em; width:12em;" value="<?php echo (@empty($_GET))?"":"$row[no_shifts]"; ?>"/></td>
									</tr>
									<tr>
										<td><label for='shifts'>*Shifts</label></td>
										<td colspan="2"><input type='text' name='shifts' id='shifts' maxlength="10" style="float:Left; margin-left:2em; width:12em;" value="<?php echo (@empty($_GET))?"":"$row[shifts]"; ?>" /></td>
									</tr>
									<tr>
										<td><label for='dp_remarks'>Remarks</label></td>
										<td colspan="2"><textarea rows='3' cols='26' name="dp_remarks" id="dp_remarks" style="resize:none; margin-left:2em; width:20em;" ><?php echo (@empty($_GET))?"":"$row[dp_remarks]"; ?></textarea></td>
									</tr>
									<tr>
										<td colspan="3">
											<a href=<?php echo (@empty($_GET))?"../../duty_details/duty_point_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a>
											<input id="Save" type='submit' name='Save' value='Save' /> 
											<input type=<?php echo (@empty($_GET))?"reset":"button";?> name='Clear' value=<?php echo (@empty($_GET))?"Clear":"Close";?> onClick=<?php echo (@empty($_GET))?"":"popClose()";?> />
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
		<script type="text/javascript">
			document.getElementById("getid").value="<?php echo @empty($_GET)?"":$_GET['id']; ?>";
			function saveClose()
			{
				var a=document.getElementById("dp_code3");
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
				
				if(document.getElementById("getid").value)
				{
					var dp_id=document.getElementById("getid").value;
					var dp_code=dp_id+'c';
					var dp_description=dp_id+'d';
					var no_shifts=dp_id+'n';
					var shifts=dp_id+'s';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<10;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_duty_point.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(dp_code).textContent = values[3]+"-"+values[4]+"-"+values[5];
						parent.document.getElementById(dp_description).textContent = values[6];
						parent.document.getElementById(no_shifts).textContent = values[7];
						parent.document.getElementById(shifts).textContent = values[8];
						popClose();
					}
					else
					alert(err);
					popClose();
				}	
				
			}
		
			function popClose()
			{
				parent.document.getElementById("pop").style.display="none";
				parent.document.getElementById("myform").style.visibility="visible";	
				parent.document.getElementById("header").style.visibility="visible";	
			}
		</script>
	</body>
</html>
