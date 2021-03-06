<?php 
	$this_page='ground_control_units';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result1=mysql_query("select * from duty_location") or die(mysql_error());

	if(!empty($_POST))
	{
		$token_type_code=$_POST['token_type_code'];
		$description=$_POST['description'];
		$access_area=$_POST['access_area'];
		$actual_quantity=$_POST['actual_quantity'];
		$avail_quantity=$_POST['avail_quantity'];
		$remarks=$_POST['remarks'];
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		mysql_query("insert into `token_type`(`token_type_code`,`description`,`access_area`,`actual_quantity`,`avail_quantity`,`remarks`) values('$token_type_code','$description','$access_area','$actual_quantity','$avail_quantity','$remarks')") or die(mysql_error());
		}
		mysql_close($link);
	}
	
	if(@!empty($_GET))
	{
		$token_id = $_GET["id"];
		$query="select * from token_type where `token_id`='$token_id' ";
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
        <title>Token Type</title>
		<style type="text/css">
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
		</style>
    </head>

    <body onload="document.forms[0].token_type_code.focus();">
        <div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
            <?php include_once("../../includes/menu.php");?>
			<br><br><br><br>
        </div>
        <div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
            <form id='myform' name="myform" action=<?php echo (@empty($_GET))?"#":"token_type_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Token Types <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
                    </legend>

                    <div id="tbl">
                        <table >
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
									 <th></th>
                                    <th></th>
                                </tr>
								<tr>
                                    <td>
										<label for='token _type Code'>*Token Type Code</label>
										<input type="hidden" id="getid" name="getid" value="" />
									</td>
                                    <td ><input type='text' id='token_type_code' name='token_type_code' maxlength="30"  value="<?php echo (@empty($_GET))?"":"$row[token_type_code]"; ?>" /></td>
                                   	<td><label for='description'>*Description</label></td>
									<td ><input type='text' id='description' name='description' maxlength="30"  value="<?php echo (@empty($_GET))?"":"$row[description]"; ?>" /></td>
                                </tr>
								<tr>
                                    <td><label for='access_area'>*Access Area</label></td>
                                    <td ><input type='text' id='access_area' name='access_area' maxlength="30"  value="<?php echo (@empty($_GET))?"":"$row[access_area]"; ?>" /></td>
                                    <td><label for='actual_quantity'>*Actual Quantity</label></td>
									<td ><input type='text' id='actual_quantity' name='actual_quantity' maxlength="3" value="<?php echo (@empty($_GET))?"":"$row[actual_quantity]"; ?>" /></td>
                                </tr>
								<tr>
                                    <td><label for='avail_quantity'>*Avail Quantity</label></td>
                                    <td ><input type='text' id='avail_quantity' name='avail_quantity' maxlength="3"  value="<?php echo (@empty($_GET))?"":"$row[avail_quantity]"; ?>" /></td>
								</tr>
								<tr>
                                    <td><label for='remarks'> Remarks</label></td>
                                    <td colspan="3"> <textarea rows='2' cols='26' name='remarks' id='remarks' style="margin-left:2em; width:35em; resize:none; overflow-y:auto;" ><?php echo (@empty($_GET))?"":"$row[remarks]"; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
									<a href=<?php echo (@empty($_GET))?"../../ground_control_units/token_type_search":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				var p=document.getElementById("token_type_code");
				var q=document.getElementById("description");
				var r=document.getElementById("actual_quantity");
				var s=document.getElementById("avail_quantity");
				var t=document.getElementById("access_area");
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
					var token_id=document.getElementById("getid").value;
					var token_type_code=token_id+'c';
					var description=token_id+'d';
					var access_area=token_id+'aa';
					var actual_quantity=token_id+'aq';
					var avail_quantity=token_id+'avq';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<7;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_token_type.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(token_type_code).textContent = values[1]
						parent.document.getElementById(description).textContent = values[2];
						parent.document.getElementById(access_area).textContent = values[3];
						parent.document.getElementById(actual_quantity).textContent = values[4];
						parent.document.getElementById(avail_quantity).textContent = values[5];
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

								