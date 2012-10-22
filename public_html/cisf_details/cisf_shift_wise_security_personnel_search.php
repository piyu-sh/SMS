<?php 
	$this_page='cisf_details';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from cisf_swsp") or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>CISF Detail</title>
        <style type="text/css">
			input[type=text] {float:Left;	margin-left:1em; width:6em;}
		</style>
		<script type="text/javascript">
			function validateForm()
			{
				var x=document.getElementById("shift");
				if ((x.selectedIndex==-1))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
		</script>
    </head>

    <body onload="document.forms[0].from_date.focus();">
        <div>
            <?php include_once '../../includes/menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='myform' name='myform'  action="../cisf_shift_wise_security_personnel_search_result/" 	onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Shift Wise Security Personnel [Search]</strong>
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
                                   <td><label for='from_date'>From Date</label></td>
                                   <td><input type='text' name='from_date' id='from_date' maxlength="20"/></td>
								   <td><label for='to_date'>To Date</label></td>
                                   <td><input type='text' name='to_date' id='to_date' maxlength="20"/></td>
								</tr>
								<tr>
                                    <td><label for='shift'>*Shifts</label></td>
                                    <td colspan="3">
										<select id="shift" name="shift" style="float:Left; margin-left:1em; width:23em;">
											<?php 
												$i=0;
												while ($row = mysql_fetch_array($result))
												{
													echo "<option name= 'option".$i."'"." id='".$i."' >".$row['shift']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
								    <td colspan="4">
									<a href="../cisf_shift_wise_security_personnel_new"><img class="s_button" width=30 height=28 src="../../img/add.png" /> </a>
                                    <input id="Search" type='submit' name='Search' value='Search' />
                                    <input id="Clear" type='reset' name='Clear' value='Clear' />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </form>
        </div>
	</body>
</html>	
