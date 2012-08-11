<?php $this_page='cisf_details';
include '../../includes/check.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>CISF Detail</title>
        
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='login' action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Shifts [New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='Shift_Code'>Shift Code</label></td>
                                    <td><input type='text' name='Shift_Code' id='Shift_Code' maxlength="6"/></td>
                                <tr>
                                    <td><label for='Description'>*Description</label></td>
                                    <td><input type='text' name='Description' id='Description' maxlength="20"/></td>
                                </tr>
								<tr>
                                    <td><label for='From_Time'>*From Time</label></td>
                                    <td><input type='text' name='From_Time' id='From_Time' maxlength="20"/></td>
                                </tr>
								<tr>
                                    <td><label for='To_Time'>*To Time</label></td>
                                    <td><input type='text' name='To_Time' id='To_Time' maxlength="20"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
									<input type='image' src='../../img/search.png' alt='Search' />
                                    <input id="Save" type='submit' name='Save' value='Save' />
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
