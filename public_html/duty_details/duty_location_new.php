<?php 
	$this_page='duty_details';
	include '../../includes/check.php';
	include '../../includes/open_db.php';
	if(!empty($_POST))
	{
		$loc_code=$_POST["loc_code"];
		$loc_description=$_POST["loc_description"];
		$loc_remarks=$_POST["loc_remarks"];
		$pre_id=trim($_POST["getid"]);	
		if(empty($pre_id))
		{
			$query="insert into duty_location(`loc_code`,`loc_description`,`loc_remarks`) values('$loc_code','$loc_description','$loc_remarks')";
			$result=mysql_query($query) or die(mysql_error());
		}
		mysql_close($link);
	}
	if(@!empty($_GET))
	{
		$loc_id = $_GET["id"];
		$query="select * from duty_location where `loc_id`='$loc_id' ";
		$result=mysql_query($query) or die("query failed <br/>".mysql_error());
		$row=mysql_fetch_array($result);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset=utf-8 " />
		<link rel="stylesheet" type="text/css" href="../../styles/style.css" />
		<title>Duty Detail</title>
	</head>

	<body onload="document.forms[0].loc_code.focus();">
		<div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
			<?php include_once '../../includes/menu.php';?>
			<br /> <br /> <br /> <br />
		</div>
		<div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
			<form name='myform' id="myform"	action=<?php echo (@empty($_GET))?"#":"duty_location_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Duty Location <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
					</legend>
					<div id="tbl">
						<table>
							<tbody>
								<tr>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td><label for='loc_code'>*Loc Code</label></td>
									<td><input type="hidden" id="getid" name="getid" value="" />
									<input type='text' id="loc_code" name='loc_code' maxlength="10" style="margin-left: 2em;" value="<?php echo (@empty($_GET))?"":"$row[loc_code]"; ?>"  /></td>
								</tr>
								<tr>
									<td><label for='loc_description'>*Description</label></td>
									<td><input type='text' id="loc_description"	name='loc_description' maxlength="50" style="margin-left: 2em; width: 17em;" value="<?php echo (@empty($_GET))?"":"$row[loc_description]"; ?>"  /></td>
								</tr>
								<tr>
									<td><label for='loc_remarks'> Remarks</label></td>
									<td>
										<textarea id="loc_remarks" name="loc_remarks" rows='3' cols='26' style="margin-left: 2em; resize: none; width: 17em; overflow-y: auto;"><?php echo (@empty($_GET))?"":"$row[loc_remarks]"; ?></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<a href=<?php echo (@empty($_GET))?"../../duty_details/duty_area_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
										<input type='submit' name='Save' value='Save' /> 
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
				var x=document.getElementById("loc_code");
				var y=document.getElementById("loc_description");
				var flag = "1";
				if ((x.value==null || x.value=="")||(y.value==null || y.value==""))
				{
					alert("Feilds marked * are mandatory");
					flag = "0";
					return false;
				}
				
				if(document.getElementById("getid").value)
				{
					var loc_id=document.getElementById("getid").value;
					var loc_code=loc_id+'c';
					var loc_description=loc_id+'d';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<4;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_duty_loc.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(loc_code).textContent = values[1];
						parent.document.getElementById(loc_description).textContent = values[2];
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
