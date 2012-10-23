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
        <title>Visitor Pass Register</title>
		<style type="text/css">
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
		</style>
        <script type="text/javascript">
		function validateForm()
			{
				var r=document.getElementById("visit_place");
				var s=document.getElementById("date_from");
				var t=document.getElementById("date_to");
				if (((r.value==null || r.value=="")||(s.value==null || s.value==""))||(t.value==null || t.value==""))
				{
					alert("Feilds cannot be left blank");
					return false;
				}
			}
		</script>
	</head>

    <body onload="document.forms[0].visit_place.focus();">
        <div>
            <?php include_once("../../includes/menu.php");?><br><br><br><br>
        </div>
        <div id="form1">
             <form id='myform' name='myform'  action="../visitors_pass_reg_search_result/" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Visitor Pass Register [Search]</strong>
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
                                    <td><label for='visit_place'>Visit Place</label></td>
                                    <td colspan="3"><input type='text' name='visit_place' id='visit_place' maxlength="30" style="width:29.7em;"/></td>
                                </tr>
								<tr>
									<td><label for="date_from" >Date From</label></td>
									<td><input type="text" id="date_from" name="date_from"  value="mm/dd/yyyy"/></td>
									<td><label for="date_to" >Date To</label></td>
									<td><input type="text" id="date_to" name="date_to" value="mm/dd/yyyy" /></td>
								</tr>
								<tr>
                                    <td colspan="4">
									<a href="../visitors_pass_reg_new"><img class="s_button" width=30 height=28 src="../../img/add.png" /> </a>
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



