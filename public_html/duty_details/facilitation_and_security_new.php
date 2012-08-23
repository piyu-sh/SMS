<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	if(!empty($_POST))
	{
		include '../../includes/open_db.php';
		$facility=$_POST["facility"];
		$facility_type=$_POST["facility_type"];
		$sub_facility_type=$_POST["sub_facility_type"];
		$query="insert into duty_facilitation(`facility`,`facility_type`,`sub_facility_type`) values('$facility','$facility_type','$sub_facility_type')";
		$result=mysql_query($query) or die("query failed <br/>".mysql_error());
		mysql_close($link);
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
			function validateForm()
			{
				var x=document.getElementById("facility");
				if (x.value==null || x.value=="")
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
		</script>	
    </head>
    <body>
        <div>
            <?php include_once '../../includes/menu.php';?>
			<br /><br /><br /><br />
        </div>
        <div id="form1" >
            <form id='myform' name='myform'  action="facilitation_and_security_new.php" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Facilitation And Security [New]</strong>
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
                                    
									<td><label for='facility'>*Facility</label></td>
									<td colspan="3">
										<input type='text' name='facility' id='facility' maxlength="50" style="margin-left:1em; width:30em;"/>
										<br /><br />
									</td>
								</tr>
                                <tr>
                                    <td><label for='facility_type' style="margin:0;">*Facility Type</label></td>
									<td>
                                    	<select id="facility_type" name="facility_type" style="margin-left:1em; width:10em;">
											<option value="electrical">Electrical</option>
											<option value="water">Water</option>
										</select>
									</td>
								    <td><label for='sub_facility_type' style="margin:0;">Sub Facility Type</label></td>
									<td>
                                    	<select id="sub_facility_type" name="sub_facility_type" style="margin-left:1em; width:10em;">
											<option value="security">Security</option>
											<option value="convenience">Convenience</option>
										</select>
									</td>
								</tr>
								<tr>
                                    <td colspan="4">
										<a href="facilitation_and_security_view.php"><img class="s_button" src='../../img/search.png' alt='Search' width=30 height=30/></a>
										<input id="Save" type='submit' name='Save' value='Save' />
										<input id="Clear" type='reset' name='Clear' value='Clear' />
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
	</body>
</html>	
