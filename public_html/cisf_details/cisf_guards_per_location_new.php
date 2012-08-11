<?php 
	$this_page='cisf_details';
include '../../includes/check.php';

	include_once  'open_db.php';
	$result=mysql_query("select * from duty_point") or die(mysql_error());
	$result1=mysql_query("select * from cisf_designation") or die(mysql_error());
	
	if(!empty($_POST))
	{
		$dp_description=$_POST['dp_list'];
		$desig_description=$_POST['desig_list'];
		$no_of_persons=$_POST['no_of_persons'];
		$gpl_remarks=$_POST['gpl_remarks'];
		mysql_query("insert into `cisf_gpl` (`dp_description`,`desig_description`,`no_of_persons`,`gpl_remarks`) values ('$dp_description','$desig_description','$no_of_persons','$gpl_remarks')") or die(mysql_error());
	}
	
	mysql_close($link);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>CISF Detail</title>
        
		<style type="text/css">
			select{float:Left;	margin-left:2em; width:15em;}
		</style>
		<script type="text/javascript">
			function validateForm()
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
			}
		</script>
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?>
			<br/><br/><br/><br/>
        </div>
        <div id="form1" style="width:32em; height:20em;">
            <form id='login' action="#" method='post' onsubmit="return validateForm()" accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Guards Per Location [New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for='dp_list'>*Duty Point</label></td>
									<td>
										<select name="dp_list" id="dp_list">
											<?php 
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
									<td><input type='text' name='no_of_persons' id='no_of_persons' maxlength="20" style="float:Left; margin-left:2em; width:10em;" /></td>
								</tr>
								<tr>
									<td><label for='gpl_remarks'>*Remark</label></td>
									<td><textarea rows='3' cols='26' name="gpl_remarks" id="gpl_remarks" style="margin-left:2em; resize:none; overflow-y:auto; width:15em;" ></textarea></td>
								</tr>
                                <tr>
                                    <td colspan="2">
									<br/>
									<a href="cisf_guards_per_location_search.php"><img src="img/search.png" class="s_button" width=30 height=30/> </a>
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
