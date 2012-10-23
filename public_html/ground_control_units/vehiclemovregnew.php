<?php $this_page='duty_details';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Vehicle Movement Register</title>
        <link rel="shortcut icon" type="image/icon" href="part1.gif" />
    </head>

    <body>
        <div>
            <?php include_once("home.php");?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='login' action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Vehicle Movement Register[New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for="Registration No" >*Registration No</label></td>
									<td><input type="text" id="Registration No"  maxlength="15"/></td>
                                    <td></td>
									<td></td>
									<td></td>
									<td><label for='Drivers Name'>*Driver Name</label></td>
                                    <td><input type='text' name='Driver Name' maxlength="30" /></td>
								</tr>
								<tr>
								    <td><label for="Vehicle" >Vehicle</label></td>
									<td><input type="radio" name="mode" value="Charged" />Charged<input type="radio" name="Mode" value="Not Charged" />Not Charged</td>
								</tr>
								<tr>
								    <td><label for="License number" >License number</label></td>
									<td><input type="text" id="License number"  maxlength="15"/></td>
                                </tr>
								<tr>
                                    <td><label for='License Particulars'>License Particulars(details)</label></td>
                                    <td> <textarea rows='1' cols='26'></textarea></td>
                                </tr>
								<tr>
				                    <td><label for='Permit No'>*Permit No</label></td>
                                    <td><input type='text' name='Permit No' maxlength="30"/></td>
									<td></td>
									<td></td>
									<td></td>
									<td><label for='Particulars'>Particulars</label></td>
                                    <td><input type='text' name='Particulars' maxlength="30" /></td>
								</tr>
								<tr>
				                    <td><label for='In Time'>*In Time</label></td>
                                    <td><input type='text' name='In Time' maxlength="30"/></td>
									<td></td>
									<td></td>
									<td></td>
									<td><label for='Out Time'>Out Time</label></td>
                                    <td><input type='text' name='Out Time' maxlength="30" /></td>
								</tr>
								<tr>
                                    <td><label for='Remarks'> Remarks</label></td>
                                    <td> <textarea rows='2' cols='26'></textarea></td>
                                </tr>
								<tr>
                                    <td colspan="10">
									<input type='image' src='Search.png' alt='search' />
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


