<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result1=mysql_query("select * from cisf_designation") or die(mysql_error());

	if(!empty($_POST))
	{
		$cisf_no=$_POST['cisf_no'];
		$name1=$_POST['name1'];
		$gender=$_POST['gender'];
		$date_of_birth=$_POST['date_of_birth'];
		$desig_description=$_POST['desig_description'];
		$join_date=$_POST['join_date'];
		$address=$_POST['address'];
		$res_ph=$_POST['res_ph'];
		$office_ph=$_POST['office_ph'];
		$fax=$_POST['fax'];
		$email_address=$_POST['email_address'];
		$status=$_POST['status'];
		$remarks=$_POST['remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `cisf_sp`(`cisf_no`,`name1`,`gender`,`date_of_birth`,`desig_description`,`join_date`,`address`,`res_ph`,`office_ph`,`fax`,`email_address`,`status`,`remarks`) values('$cisf_no','$name1','$gender','$date_of_birth','$desig_description','$join_date','$address','$res_ph','$office_ph','$fax','$email_address','$status','$remarks')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$sp_id = $_GET["id"];
		$query="select * from cisf_sp where `sp_id`='$sp_id' ";
		$result=mysql_query($query) or die("query failed <br/>".mysql_error());
		$row=mysql_fetch_array($result);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>CISF Detail</title>
        
		<style type="text/css">
			textarea {margin-left:2em; resize:none; overflow-y:auto; width:13em; height:4em;}
			select{float:Left;	margin-left:2em; width:12em;}
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
		</style>
	</head>

    <body onload="document.forms[0].cisf_no.focus();">
        <div  id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
            <?php include_once '../../includes/menu.php';?>
			<br><br><br><br>
        </div>
        <div id="form1"  <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
            <form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"cisf_security_personnel_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Security Personnel <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
									<th></th>
									<th></th>
                                </tr>
                                <tr>
                                    <td>
										<label for='cisf_no'>*CISF No</label>
										<input type="hidden" id="getid" name="getid"/>
									</td>
									<td><input type='text' name="cisf_no" id="cisf_no" maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[cisf_no]"; ?>"/></td>
									<td><label for='name1'>*Name</label></td>
									<td><input type='text' name='name1' id='name1' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[name1]"; ?>"/></td>
								</tr>	
								<tr>
                                    <td><label for='date_of_birth'>Date of Birth</label></td>
									<td><input type='text' name='date_of_birth' id='date_of_birth' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[date_of_birth]"; ?>"/></td>
									<td><label for='gender'>*Gender</label></td>
									<td>
										<select id="gender" name="gender" style="float:Left; margin-left:2em; width:8em;">
											<?php
												if(!@empty($_GET))
												{
													echo "<option>".$row['gender']."</option>";
												}
												echo"<option>Male</option>";
												echo"<option>Female</option>";
											?>
										</select>
									</td>
                                </tr>
								<tr>
									<td><label for='desig_description'>*Designation</label></td>
									<td>
										<select id="desig_description" name="desig_description" style="float:Left; margin-left:2em; width:13em;">
											<?php 
												if(!@empty($_GET))
												{
													echo "<option>".$row['desig_description']."</option>";
												}
												$i=0;
												while ($row1 = mysql_fetch_array($result1))
												{
													echo "<option id='".$i."' >".$row1['desig_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
                                    <td><label for='Join_Date'>Join_Date</label></td>
									<td><input type='text' name='join_date' id='join_date' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[join_date]"; ?>"/></td>
								</tr>
								<tr>
									<td><label for='address'>*Address</label></td>
                                    <td rowspan="2"><textarea name="address" id="address"><?php echo (@empty($_GET))?"":"$row[address]"; ?></textarea></td>
									<td><label for='office_ph'>Office Ph</label></td>
									<td><input type='text' name='office_ph' id='office_ph' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[office_ph]"; ?>"/></td>
								</tr>
								<tr>
                                    <td></td>
									<td><label for='res_ph'>Res Ph</label></td>
									<td><input type='text' name='res_ph' id='res_ph' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[res_ph]"; ?>"/></td>
								</tr>
								<tr>
                                    <td><label for='fax'>Fax</label></td>
									<td><input type='text' name='fax' id='fax' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[fax]"; ?>"/></td>
									<td><label for='email_address'>Email Address</label></td>
									<td><input type='text' name='email_address' id='email_address' maxlength="20" value="<?php echo (@empty($_GET))?"":"$row[email_address]"; ?>"/></td>
								</tr>
								<tr>
									<td><label for='status'>Status</label></td>
                                    <td>
										<select id="status" name="status" style="float:Left; margin-left:2em; width:8em;">
											<?php
												if(!@empty($_GET))
												{
													echo "<option id='".$i."' >".$row['status']."</option>";
												}
											?>
											<option>Available</option>
											<option>Not Available</option>
										</select>
									</td>
									<td><label for='remarks'>Remarks</label></td>
                                    <td><textarea name="remarks" id="remarks"><?php echo (@empty($_GET))?"":"$row[remarks]"; ?></textarea></td>
								</tr>
                                <tr>
                                    <td colspan="4">
									<br/>
									<a href=<?php echo (@empty($_GET))?"../../cisf_details/cisf_security_personnel_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var p=document.getElementById("cisf_no");
				var q=document.getElementById("name1");
				var r=document.getElementById("gender");
				var s=document.getElementById("desig_description");
				var t=document.getElementById("address");
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
					var sp_id=document.getElementById("getid").value;
					var cisf_no=sp_id+'c';
					var name1=sp_id+'n';
					var desig_description=sp_id+'d';
					var status=sp_id+'s';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<15;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_sp.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(cisf_no).textContent = values[1];
						parent.document.getElementById(name1).textContent = values[2];
						parent.document.getElementById(desig_description).textContent = values[5];
						parent.document.getElementById(status).textContent = values[12];
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
