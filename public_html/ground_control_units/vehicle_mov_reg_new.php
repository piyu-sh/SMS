<?php
	$this_page='ground_control_units';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	if(!empty($_POST))
	{
		$reg_no=$_POST['reg_no'];
		$driver_name=$_POST['driver_name'];
		$license_number=$_POST['license_number'];
		$license_particulars=$_POST['license_particulars'];
		$permit_no=$_POST['permit_no'];
		$particulars=$_POST['particulars'];
		$in_time=$_POST['in_time'];
		$out_time=$_POST['out_time'];
		$remarks=$_POST['remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `vehicle_mov`(`reg_no`,`driver_name`,`license_number`,`license_particulars`,`permit_no`,`particulars`,`in_time`,`out_time`,`remarks`) values(
		'$reg_no','$driver_name','$license_number','$license_particulars','$permit_no','$particulars','$in_time','$out_time','$remarks')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$vehicle_id = $_GET["id"];
		$query="select * from vehicle_mov where `vehicle_id`='$vehicle_id' ";
		$result=mysql_query($query) or die("query failed <br/>".mysql_error());
		$row=mysql_fetch_array($result);
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../styles/style.css" />
		<title>Vehicle Movement Register</title>
		<style type="text/css">
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
			textarea{float:Left; margin-left:2em; width:35.2em;}
		</style>
		
	</head>
	<body onload="document.forms[0].reg_no.focus();">
		<div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
			<?php include_once '../../includes/menu.php';?>
			<br /> <br /> <br /> <br />
		</div>
			<div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
			<form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"vehicle_mov_reg_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Vehicle Movement Register[New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>.
									 <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td>
									<label for="reg_no" >*Registration No</label>
									<input type="hidden" id="getid" name="getid" value="" />
									</td>
									<td><input type="text" id="reg_no" name="reg_no"  maxlength="10" value="<?php echo (@empty($_GET))?"":"$row[reg_no]"; ?>"/></td>
                                  	<td><label for='drivers_name'>*Driver Name</label></td>
                                    <td><input type='text' name='driver_name' id="driver_name" maxlength="20"  value="<?php echo (@empty($_GET))?"":"$row[driver_name]"; ?>" /></td>
								</tr>
								<tr>
								    <td><label for="license_number" >License Number</label></td>
									<td><input type="text" id="license_number" name="license_number" maxlength="10"  value="<?php echo (@empty($_GET))?"":"$row[license_number]"; ?>" /></td>
                                </tr>
								<tr>
                                    <td><label for='license_particulars'>License Particulars(Details)</label></td>
                                    <td colspan="3"> <input type='text' name='license_particulars' id='license_particulars' maxlength="60" style="width:33em;"  value="<?php echo (@empty($_GET))?"":"$row[license_particulars]"; ?>" /> </td>
                                </tr>
								<tr>
				                    <td><label for='permit_no'>*Permit No</label></td>
                                    <td><input type='text' name='permit_no' id="permit_no" maxlength="20"  value="<?php echo (@empty($_GET))?"":"$row[permit_no]"; ?>" /></td>
									<td><label for='particulars'>Particulars</label></td>
                                    <td><input type='text' name='particulars' id="particulars" maxlength="20"  value="<?php echo (@empty($_GET))?"":"$row[particulars]"; ?>" /></td>
								</tr>
								<tr>
				                    <td><label for='in_time'>*In Time</label></td>
                                    <td><input type='text' name='in_time' id='in_time'  value="<?php echo (@empty($_GET))?"":"$row[in_time]"; ?>" /></td>
									<td><label for='out_time'>Out Time</label></td>
                                    <td><input type='text' name='out_time' id="out_time"  value="<?php echo (@empty($_GET))?"":"$row[out_time]"; ?>" /></td>
								</tr>
								<tr>
                                    <td><label for='remarks'> Remarks</label></td>
                                    <td colspan="3"> <textarea rows='2' cols='26' id="remarks"  name="remarks" style="width:33.8em;" ><?php echo (@empty($_GET))?"":"$row[remarks]"; ?></textarea></td>
                                </tr>
								<tr>
                                     <td colspan="4">
										<a href=<?php echo (@empty($_GET))?"../../ground_control_units/vehicle_mov_reg_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var p=document.getElementById("reg_no");
				var q=document.getElementById("driver_name");
				var r=document.getElementById("permit_no");
				var s=document.getElementById("in_time");
				if ((p.value==null || p.value=="")||(q.value==null || q.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				if ((r.value==null || r.value=="")||(s.value==null || s.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				
				if(document.getElementById("getid").value)
				{
					var vehicle_id=document.getElementById("getid").value;
					var reg_no=vehicle_id+'r';
					var in_time=vehicle_id+'i';
					var out_time=vehicle_id+'o';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<10;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_vehicle_mov.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(reg_no).textContent = values[1];
						parent.document.getElementById(in_time).textContent = values[7];
						parent.document.getElementById(out_time).textContent = values[8];
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


