<?php 
	$this_page='ground_control_units';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	if(!empty($_POST))
	{
		$issue_date=$_POST['issue_date'];
		$visitor_name=$_POST['visitor_name'];
		$no_of_persons=$_POST['no_of_persons'];
		$visit_place=$_POST['visit_place'];
		$purpose=$_POST['purpose'];
		$in_time=$_POST['in_time'];
		$out_time=$_POST['out_time'];
		$address_organisation_detail=$_POST['address_organisation_detail'];
		$remarks=$_POST['remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `visitor_pass`(`issue_date`,`visitor_name`,`no_of_persons`,`visit_place`,`purpose`,`in_time`,`out_time`,`address`,`remarks`) values(
		'$issue_date','$visitor_name','$no_of_persons','$visit_place','$purpose','$in_time','$out_time','$address_organisation_detail','$remarks')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$visitor_id = $_GET["id"];
		$query="select * from visitor_pass where `visitor_id`='$visitor_id' ";
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
		<title>Visitor Pass Register</title>
		<style type="text/css">
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
			textarea{float:Left; margin-left:2em; width:35.2em;}
		</style>
		
	</head>
	<body onload="document.forms[0].issue_date.focus();">
		<div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
			<?php include_once '../../includes/menu.php';?>
			<br /> <br /> <br /> <br />
		</div>
			<div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
			<form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"visitors_pass_reg_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
				<fieldset>
                    <legend>
                        <strong>Visitor Pass Register <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody border="1">
                                <tr>
                                    <th></th>
                                    <th></th>
									<th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td>
										<label for="issue_date" >*Issue Date</label>
										<input type="hidden" id="getid" name="getid" value="" />
									</td>
									<td><input type="text" id="issue_date" name="issue_date"  size="30" maxlength="12" value="<?php echo (@empty($_GET))?"":"$row[issue_date]"; ?>"/></td>
									<td><label for='visitor_name'>*Visitor Name</label></td>
                                    <td ><input type='text' name='visitor_name' id='visitor_name' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[visitor_name]"; ?>" /></td>
                                </tr>
								<tr>
									<td><label for='no_of_persons'>*No Of Persons</label></td>
									<td ><input type='text' name='no_of_persons' id='no_of_persons' value="<?php echo (@empty($_GET))?"":"$row[no_of_persons]"; ?>" /></td>
									<td><label for='visit_place'>*Visit Place</label></td>
									<td ><input type='text' name='visit_place' id='visit_place' value="<?php echo (@empty($_GET))?"":"$row[visit_place]"; ?>" /></td>
								</tr>
								<tr>
									<td><label for='purpose'>Purpose</label></td>
									<td colspan="3"><input type='text' name='purpose' id='purpose' maxlength="50" style="width:33.8em;"  value="<?php echo (@empty($_GET))?"":"$row[purpose]"; ?>" /></td>
								</tr>
								<tr>
									<td><label for='in_time'>*In Time</label></td>
									<td ><input type='text' name='in_time' id='in_time' value="<?php echo (@empty($_GET))?"":"$row[in_time]"; ?>" /></td>
									<td><label for='out_time'>Out Time</label></td>
									<td ><input type='text' name='out_time' id='out_time' value="<?php echo (@empty($_GET))?"":"$row[out_time]"; ?>" /></td>
								</tr>
								<tr>
                                    <td>
										<label for='address_organisation_detail'>Address Organisation Detail</label>
									</td>
                                    <td colspan="3"> <textarea rows='3' cols='26' id="address_organisation_detail" name="address_organisation_detail"><?php echo (@empty($_GET))?"":"$row[address]"; ?></textarea></td>
                                </tr>
								<tr>
                                    <td><label for='remarks'> Remarks</label></td>
                                    <td colspan="3"> <textarea rows='2' cols='26' id="remarks" name="remarks"><?php echo (@empty($_GET))?"":"$row[remarks]"; ?></textarea></td>
                                </tr>
                                 <tr>
                                    <td colspan="4">
										<a href=<?php echo (@empty($_GET))?"../../ground_control_units/visitors_pass_reg_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var p=document.getElementById("issue_date");
				var q=document.getElementById("visitor_name");
				var r=document.getElementById("no_of_persons");
				var s=document.getElementById("visit_place");
				var t=document.getElementById("in_time");
				if ((p.value==null || p.value=="")||(q.value==null || q.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				if (((r.value==null || r.value=="")||(s.value==null || s.value==""))||(t.value==null || t.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				
				if(document.getElementById("getid").value)
				{
					var visitor_id=document.getElementById("getid").value;
					var issue_date=visitor_id+'i';
					var visitor_name=visitor_id+'v';
					var no_of_persons=visitor_id+'n';
					var visit_place=visitor_id+'p';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<11;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_visitor_pass.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(issue_date).textContent = values[1];
						parent.document.getElementById(visitor_name).textContent = values[2];
						parent.document.getElementById(no_of_persons).textContent = values[3];
						parent.document.getElementById(visit_place).textContent = values[4];
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

								   
									
