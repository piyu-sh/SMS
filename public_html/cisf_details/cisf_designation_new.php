<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include '../../includes/open_db.php';
	if(!empty($_POST))
	{
		$desig_code=$_POST["desig_code"];
		$desig_description=$_POST["desig_description"];
		$query="insert into cisf_designation(`desig_code`,`desig_description`) values('$desig_code','$desig_description')";
		$pre_id=trim($_POST["getid"]);
		if(empty($pre_id))
		{
		$result=mysql_query($query) or die(mysql_error());
		mysql_close($link);
		}
	}
	
	if(@!empty($_GET))
	{
		$desig_id = $_GET["id"];
		$query="select * from cisf_designation where `desig_id`='$desig_id' ";
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

    <body onload="document.forms[0].desig_code.focus();">
        <div id="header" <?php echo @empty($_GET)?"":'style="display:none;"'; ?>>
           <?php include_once '../../includes/menu.php';?>
			<br><br><br><br>
        </div>
        <div id="form1" <?php echo @empty($_GET)?"":'style="text-align:left;"'; ?>>
            <form id='myform' name='myform'  action=<?php echo (@empty($_GET))?"#":"cisf_designation_new.phpx"; ?> onsubmit="return saveClose()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Designation <?php echo (@empty($_GET))?'[New]':'[Edit]'; ?></strong>
                    </legend>
                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='desig_code'>*Desig Code</label>
									<input type="hidden" id="getid" name="getid" value="" />
									</td>
                                    <td><input type='text' name='desig_code' id='desig_code' maxlength="10" style="margin-left:2em;" value="<?php echo (@empty($_GET))?"":"$row[desig_code]"; ?>" /></td>
                                <tr>
                                    <td><label for='desig_description'>*Description</label></td>
                                    <td><input type='text' name='desig_description' id='desig_description' maxlength="50" style="margin-left:2em; width:17em;" value="<?php echo (@empty($_GET))?"":"$row[desig_description]"; ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
									<a href=<?php echo (@empty($_GET))?"../../cisf_details/cisf_designation_view":""; ?>><img class="s_button" src=<?php echo (@empty($_GET))?"../../img/search.png":"" ?> alt="Search" width="30" height="30" /> </a> 
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
				
				var x=document.getElementById("desig_code");
				var y=document.getElementById("desig_description");
				if ((x.value==null || x.value=="")||(y.value==null || y.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
				if(document.getElementById("getid").value)
				{
					var desig_id=document.getElementById("getid").value;
					var desig_code=desig_id+'c';
					var desig_description=desig_id+'d';
					var form1 = document.getElementById("myform");
					var values = new Array();
					for (var i=0;i<4;i++)
					{
						values[i] = form1.elements[i+1].value;
						var parameters = parameters+"&values"+i+"="+values[i];
					}
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("POST", "../../lib/edit_cisf_desig.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(parameters);
					var err = xmlhttp.responseText;
					if(err==0)
					{
						parent.document.getElementById(desig_code).textContent = values[1];
						parent.document.getElementById(desig_description).textContent = values[2];
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
