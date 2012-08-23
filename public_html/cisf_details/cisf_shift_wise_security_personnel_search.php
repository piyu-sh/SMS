<?php $this_page='cisf_details';
include '../../includes/check.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>Cis Detail</title>
        
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='myform' name='myform'  action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>CISF Shift Wise Security Personnel [Search]</strong>
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
                                   <td><label for='From_Date'>From Date</label></td>
                                   <td><input type='text' name='From_Date' id='From_Date' maxlength="20"/></td>
								   <td><label for='To Date'>To Date</label></td>
                                   <td><input type='text' name='To Date' id='To Date' maxlength="20"/></td>
								</tr>
								<tr>
                                    <td><label for='Shifts'>Shifts</label></td>
                                    <td colspan="3">
										<select id="Shifts">
											<option>General Shift</option>
											<option></option>
										</select>
									</td>
								</tr>
								<tr>
								    <td colspan="4">
									<input type='image' src='../../img/add.png' alt='Search' />
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
