<?php $this_page='cisf_details';
include '../../includes/check.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>Duty Detail</title>
        
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='login' action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>CISF Security Personel [Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='Personnel'>Personnel</label></td>
                                    <td>
										<select>
											<option>Current Security Personnel</option>
											<option></option>
										</select>
									</td>
								</tr>
								
								 <tr>
                                    <td><label for='Area'>Designation</label></td>
                                    <td>
										<select>
											<option>Assistant Commandant</option>
											<option></option>
										</select>
									</td>
								</tr>
								
								<tr>
                                    <td><label for='Duty_Points'>Person Name</label></td>
                                    <td><input type='text' name='Duty Points' id='Duty_Point' maxlength="20"/></td>
                                </tr>
								<tr>
                                    <td><label for='From_Join_Date'>From Join Date</label></td>
                                    <td><input type='text' name='From_Join_Date' id='From_Join_Date' maxlength="20"/></td>
                                </tr>
								<tr>
                                    <td><label for='To_Join_Date'>To Join Date</label></td>
                                    <td><input type='text' name='To_Join_Date' id='To_Join_Date' maxlength="20"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
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
