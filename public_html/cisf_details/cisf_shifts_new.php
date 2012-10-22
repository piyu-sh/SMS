<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	if(!empty($_POST))
	{
		$shift_code=$_POST['shift_code'];
		$description=$_POST['description'];
		$from_time=$_POST['from_time'];
		$to_time=$_POST['to_time'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `cisf_shift`(`shift_code`,`description`,`from_time`,`to_time`) values('$shift_code','$description','$from_time','$to_time')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$shift_id = $_GET["id"];
		$query="select * from cisf_shift where `shift_id`='$shift_id' ";
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

    <body onload="document.forms[0].shift_code.focus();">
        <div  id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
            <?php include_once '../../includes/menu.php';?><br><br><br><br>
        </div>
        <div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
            <form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"cisf_shift_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Shifts <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
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
										<label for='shift_code'>*Shift Code</label>
										<input type="hidden" id="getid" name="getid" value=""/>
									</td>
                                    <td><input type='text' name='shift_code' id='shift_code' maxlength="10" value="<?php echo (@empty($_GET))?"":"$row[shift_code]"; ?>"/></td>
                                <tr>
                                    <td><label for='description'>*Description</label></td>
                                    <td><input type='text' name='description' id='description' maxlength="60" value="<?php echo (@empty($_GET))?"":"$row[description]"; ?>"/></td>
                                </tr>
								<tr>
                                    <td><label for='from_time'>*From Time</label></td>
                                    <td><input type='text' name='from_time' id='from_time' maxlength="15" value="<?php echo (@empty($_GET))?"":"$row[from_time]"; ?>"/></td>
                                </tr>
								<tr>
                                    <td><label for='to_time'>*To Time</label></td>
                                    <td><input type='text' name='to_time' id='to_time' maxlength="15" value="<?php echo (@empty($_GET))?"":"$row[to_time]"; ?>"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
									<a href=<?php echo (@empty($_GET))?"../../cisf_details/cisf_shifts_view":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var p=document.getElementById("shift_code");
				var q=document.getElementById("description");
				var r=document.getElementById("from_time");
				var s=document.getElementById("to_time");
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
					var shift_id=document.getElementById("getid").value;
					var shift_code=shift_id+'c';
					var description=shift_id+'d';
					var from_time=shift_id+'f';
					var to_time=shift_id+'t';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<6;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_shift.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(shift_code).textContent = values[1];
						parent.document.getElementById(description).textContent = values[2];
						parent.document.getElementById(from_time).textContent = values[3];
						parent.document.getElementById(to_time).textContent = values[4];
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
