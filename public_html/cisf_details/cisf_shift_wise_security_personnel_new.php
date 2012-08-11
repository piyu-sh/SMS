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
                        <strong>Security Personel [New]</strong>
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
                                    <td><label for='Shift_Date'>*Shift Date</label></td>
									<td><input type='text' name='Shift_Date' id='Shift_Date' maxlength="10"/></td>
									<td><label for='Shifts'>Shifts</label></td>
									<td>
										<select>
											<option>General Shifts</option>
											<option></option>
										</select>
									</td>
								</tr>	
								<tr>
                                    <td><label for='Select_Persons'>*Select Persons</label></td>
									<td colspan="3"><textarea id="Select_Persons"></textarea></td>
								</tr>
								<tr>
									<td><label for='Remarks'>Remarks</label></td>
                                    <td colspan="3"><textarea id="Remarks"></textarea></td>
								</tr>
								<tr>
                                    <td colspan="4">
									<br/>
									<input type='image' src='../../img/search.png' alt='Search'/>
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
