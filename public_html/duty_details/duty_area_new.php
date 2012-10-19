<?php
	$this_page='duty_details';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result1=mysql_query("select * from duty_location") or die(mysql_error());

	if(!empty($_POST))
	{
		$area_code1=$_POST['area_code1'];
		$area_code2=$_POST['area_code2'];
		$area_description=$_POST['area_description'];
		$area_remarks=$_POST['area_remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `duty_area`(`area_code1`,`area_code2`,`area_description`,`area_remarks`) values('$area_code1','$area_code2','$area_description','$area_remarks')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$area_id = $_GET["id"];
		$query="select * from duty_area where `area_id`='$area_id' ";
		$result=mysql_query($query) or die("query failed <br/>".mysql_error());
		$row=mysql_fetch_array($result);
		$loc_code=$row['area_code1'];
		$result2=mysql_query("select * from duty_location where `loc_code`='$loc_code' ")or die("query failed <br/>".mysql_error());
		$row2=mysql_fetch_array($result2);
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
			
			
			function get_loc_code(str)
			{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","../../lib/ret_loc_code.php?str="+str,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					document.getElementById("area_code1").value=xmlhttp.responseText;
				}
			}
		</script>
	</head>
	<body>
		<div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
			<?php include_once '../../includes/menu.php';?>
			<br /> <br /> <br /> <br />
		</div>
		<div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
			<form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"duty_area_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Duty Area <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
					</legend>

					<div id="tbl">
						<table>
							<tbody>
								<tr>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td>
										<label for='loc_list'>*Location</label>
										<input type="hidden" id="getid" name="getid" value="" />
									</td>
									<td>
										<select id="loc_list" onfocus="get_loc_code(this.value)" onchange="get_loc_code(this.value)" style="margin-left:2em; width:10em;" >
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
									<td><label for='area_code2'>*Area Code</label></td>
									<td>
										<input type='text' name='area_code1' id="area_code1" readonly maxlength="10" style="float:Left; margin-left:2em; width:6em;" value="<?php echo (@empty($_GET))?"":"$row[area_code1]"; ?>" /> 
										<input type='text' name='area_code2' id="area_code2" maxlength="10" style="float:Left; margin-left:1em; width:6em;" value="<?php echo (@empty($_GET))?"":"$row[area_code2]"; ?>"/>
									</td>
								</tr>
								<tr>
									<td><label for='area_description'>*Description</label></td>
									<td><input type='text' name='area_description' id='area_description' maxlength="50" style="margin-left:2em; width:17em;" value="<?php echo (@empty($_GET))?"":"$row[area_description]"; ?>" /></td>
								</tr>
								<tr>
									<td><label for='area_remarks'>Remarks</label></td>
									<td><textarea rows='3' cols='26' name="area_remarks" id="area_remarks" style="margin-left:2em; resize:none; overflow-y:auto;"><?php echo (@empty($_GET))?"":"$row[area_remarks]"; ?></textarea></td>
								</tr>
								<tr>
									<td colspan="2">
										<a href=<?php echo (@empty($_GET))?"../../duty_details/duty_area_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var x=document.getElementById("area_code2");
				var y=document.getElementById("area_description");
				if ((x.value==null || x.value=="")||(y.value==null || y.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				
				if(document.getElementById("getid").value)
				{
					var area_id=document.getElementById("getid").value;
					var area_code=area_id+'c';
					var area_description=area_id+'d';
					var location=area_id+'l';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<6;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_duty_area.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(area_code).textContent = values[2]+"-"+values[3];
						parent.document.getElementById(area_description).textContent = values[4];
						parent.document.getElementById(location).textContent = values[0];
						parent.document.getElementById("pop").style.display="none";
						parent.document.getElementById("myform").style.visibility="visible";
					}
					else
					alert(err);
					parent.document.getElementById("pop").style.display="none";
					parent.document.getElementById("myform").style.visibility="visible";	
				}	
				
			}
		
			function popClose()
			{
				parent.document.getElementById("pop").style.display="none";
				parent.document.getElementById("myform").style.visibility="visible";	
			}
		</script>
	</body>
</html>
