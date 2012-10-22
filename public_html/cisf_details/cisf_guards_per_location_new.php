<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from duty_point") or die(mysql_error());
	$result1=mysql_query("select * from cisf_designation") or die(mysql_error());
	
	if(!empty($_POST))
	{
		$dp_description=$_POST['dp_list'];
		$desig_description=$_POST['desig_list'];
		$no_of_persons=$_POST['no_of_persons'];
		$gpl_remarks=$_POST['gpl_remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `cisf_gpl` (`dp_description`,`desig_description`,`no_of_persons`,`gpl_remarks`) values ('$dp_description','$desig_description','$no_of_persons','$gpl_remarks')") or die(mysql_error());
		}
	}
	if(@!empty($_GET))
	{
		$gpl_id = $_GET["id"];
		$query="select * from cisf_gpl where `gpl_id`='$gpl_id' ";
		$result2=mysql_query($query) or die("query failed <br/>".mysql_error());
		$row2=mysql_fetch_array($result2);
	}
	
	mysql_close($link);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>CISF Detail</title>
        
		<style type="text/css">
			select{float:Left;	margin-left:2em; width:15em;}
		</style>
		
    </head>

    <body onload="document.forms[0].no_of_persons.focus();">
        <div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
            <?php include_once '../../includes/menu.php';?>
			<br/><br/><br/><br/>
        </div>
        <div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
            <form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"duty_area_new.phpx"; ?> method='post' onsubmit="return saveClose()" accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Guards Per Location <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
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
										<label for='dp_list'>*Duty Point</label>
										<input type="hidden" id="getid" name="getid" value="" />
									</td>
									<td>
										<select name="dp_list" id="dp_list">
											<?php 
												if(!@empty($_GET))
												{
													echo "<option id='".$i."' >".$row2['dp_description']."</option>";
												}
												$i=0;
												while ($row = mysql_fetch_array($result))
												{
													echo "<option id='".$i."' >".$row['dp_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
                                <tr>
                                    <td><label for='desig_list'>*Designation</label></td>
									<td>
										<select id="desig_list" name="desig_list" >
											<?php 
												if(!@empty($_GET))
												{
													echo "<option id='".$i."' >".$row2['desig_description']."</option>";
												}
												$i=0;
												while ($row = mysql_fetch_array($result1))
												{
													echo "<option id='".$i."' >".$row['desig_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
                                    <td><label for='no_of_persons'>*No of Persons</label></td>
									<td><input type='text' name='no_of_persons' id='no_of_persons' maxlength="20" style="float:Left; margin-left:2em; width:10em;" value="<?php echo (@empty($_GET))?"":"$row2[no_of_persons]"; ?>" /></td>
								</tr>
								<tr>
									<td><label for='gpl_remarks'>*Remark</label></td>
									<td><textarea rows='3' cols='26' name="gpl_remarks" id="gpl_remarks" style="margin-left:2em; resize:none; overflow-y:auto; width:15em;" ><?php echo (@empty($_GET))?"":"$row2[gpl_remarks]"; ?></textarea></td>
								</tr>
                                <tr>
                                    <td colspan="2">
									<br/>
									<a href=<?php echo (@empty($_GET))?"../../cisf_details/cisf_guards_per_location_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var a=document.getElementById("dp_list");
				var b=document.getElementById("desig_list");
				var c=document.getElementById("no_of_persons");
				var d=document.getElementById("gpl_remarks");
				if ((a.selectedIndex==-1)||(b.selectedIndex==-1))
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
					var gpl_id=document.getElementById("getid").value;
					var dp_description=gpl_id+'c';
					var desig_description=gpl_id+'d';
					var no_of_persons=gpl_id+'n';
					var gpl_remarks=gpl_id+'s';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<6;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_gaurd_per_location.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(dp_description).textContent = values[1];
						parent.document.getElementById(desig_description).textContent = values[2];
						parent.document.getElementById(no_of_persons).textContent = values[3];
						parent.document.getElementById(gpl_remarks).textContent = values[4];
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
