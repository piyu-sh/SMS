<?php 
	$this_page='ground_control_units';
	include '../../includes/check.php';
	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from token_type") or die(mysql_error());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>Token Type</title>
	</head>

    <body onload="document.forms[0].token.focus();">
        <div>
            <?php include_once("../../includes/menu.php");?><br><br><br><br>
        </div>
        <div id="form1">
             <form id='myform' name='myform'  action="../token_type_search_result/" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Token Types[Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
                                    <td><label for='token'>Token</label></td>
                                    <td ><input type='text' id="token" name='token' maxlength="30" /></td>
                                </tr>
								<tr>
									<td><label for='description'>Description</label></td>
									<td ><input type='text' id="token" name='description' maxlength="30" /></td>
                                </tr>
								<tr>
                                    <td colspan="10">
									<a href="../token_type_new"><img class="s_button" width=30 height=28 src="../../img/add.png" /> </a>
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

							
