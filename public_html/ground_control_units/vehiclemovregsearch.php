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
                        <strong>Vehicle Movement Register[Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
								    <td><label for="Vehicle" >Vehicle</label></td>
									<td><input type="radio" name="mode" value="Charged" />Charged<input type="radio" name="Mode" value="Not Charged" />Not Charged</td>
								</tr>
								<tr>
									<td><label for="Date From" >Date From</label></td>
									<td><input type="text" id="Date From" size="35" maxlength="12"/></td>
									<td><input type="image" src="calender.jpg" width="" height="" alt="Calender Button"/></td>
									<td><label for="Date to">Date To</label></td>
									<td><input type="text" id="Date To" size="25" maxlength="12"/></td>
									<td><input type="image" src="calender.jpg" width="" height="" alt="Calender Button"/></tr>
								</tr>
								<tr>
                                    <td colspan="10">
									<input type='image' src='add.png' alt='add' />
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

