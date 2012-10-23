<?php 
	$this_page='ground_control_units';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>Vehicle Movement Register</title>
		<style type="text/css">
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
		</style>
		<script type="text/javascript">
		function validateForm()
			{
				var s=document.getElementById("in_time");
				var t=document.getElementById("out_time");
				if ((s.value==null || s.value=="")||(t.value==null || t.value==""))
				{
					alert("Feilds cannot be left blank");
					return false;
				}
			}
		</script>
	</head>

   <body onload="document.forms[0].in_time.focus();">
        <div>
            <?php include_once("../../includes/menu.php");?><br><br><br><br>
        </div>
        <div id="form1">
             <form id='myform' name='myform'  action="../vehicle_mov_reg_search_result/" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Vehicle Movement Register[Search]</strong>
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
									<td><label for="in_time" >In Time</label></td>
									<td><input type="text" id="in_time" name="in_time" size="35" maxlength="12"/></td>
									<td><label for="out_time">Out Time</label></td>
									<td><input type="text" id="out_time" name="out_time" size="25" maxlength="12"/></td>
								</tr>
								<tr>
                                    <td colspan="4">
									<a href="../vehicle_mov_reg_new"><img class="s_button" width=30 height=28 src="../../img/add.png" /> </a>
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

