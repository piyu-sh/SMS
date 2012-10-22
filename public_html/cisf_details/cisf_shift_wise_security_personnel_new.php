<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result1=mysql_query("select * from cisf_sp") or die(mysql_error());
	$result2=mysql_query("select * from cisf_shift") or die(mysql_error());
	if(!empty($_POST))
	{
		$shift_date=$_POST['shift_date'];
		$shift=$_POST['shift'];
		$persons=$_POST['persons'];
		$remarks=$_POST['remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `cisf_swsp`(`shift_date`,`shift`,`persons`,`remarks`) values('$shift_date','$shift','$persons`','$remarks')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$swsp_id = $_GET["id"];
		$query="select * from cisf_swsp where `swsp_id`='$swsp_id' ";
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
        <title>CISF Detail</title>
	</head>

    <body onload="document.forms[0].shift_date.focus();">
        <div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
            <?php include_once '../../includes/menu.php';?><br><br><br><br>
        </div>
        <div id="form1"  <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
            <form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"cisf_shift_wise_security_personnel_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Shift Wise Security Personel <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
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
										<label for='shift_date'>*Shift Date</label>
										<input type="hidden" id="getid" name="getid"/>
									</td>
									<td><input type='text' name='shift_date' id='shift_date' maxlength="10" style="float:Left; margin-left:1em;" value="<?php echo (@empty($_GET))?"":"$row[shift_date]"; ?>"/></td>
									<td><label for='shift'>Shifts</label></td>
									<td>
										<select id="shift" name="shift" style="float:Left; margin-left:1em;">
											<?php
												if(!@empty($_GET))
												{
													echo "<option>".$row['shift']."</option>";
												}
												$i=0;
												while ($row2 = mysql_fetch_array($result2))
												{
													echo "<option id='".$i."' >".$row2['description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>	
								<tr>
                                    <td><label for='persons'>*Select Persons</label></td>
									<td colspan="3">
										<select id="persons" name="persons" multiple="multiple" style="float:Left; margin-left:1em; width:27.5em;">
											<?php
												if(!@empty($_GET))
												{
													echo "<option id='".$i."' >".$row['persons']."</option>";
												}
												$i=0;
												while ($row1 = mysql_fetch_array($result1))
												{
													echo "<option id='".$i."' >".$row1['name1']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for='remarks'>Remarks</label></td>
                                    <td colspan="3"><textarea id="remarks" name="remarks" style="float:Left; margin-left:1em; width:28em; resize:none;"><?php echo (@empty($_GET))?"":"$row[remarks]"; ?></textarea></td>
								</tr>
								<tr>
                                    <td colspan="4">
									<br/>
									<a href=<?php echo (@empty($_GET))?"../../cisf_details/cisf_shift_wise_security_personnel_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var p=document.getElementById("shift_date");
				var q=document.getElementById("persons");
				if ((p.value==null || p.value=="")||(q.value==null || q.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				
				if(document.getElementById("getid").value)
				{
					var swsp_id=document.getElementById("getid").value;
					var shift_date=swsp_id+'sd';
					var shift=swsp_id+'s';
					var remarks=swsp_id+'r';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<6;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_swsp.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(shift_date).textContent = values[1];
						parent.document.getElementById(shift).textContent = values[2];
						parent.document.getElementById(remarks).textContent = values[4];
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
