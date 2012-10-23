<?php $this_page='duty_details';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Token Register</title>
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
                        <strong>Token Register[Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
                                    <td><label for='Agency Code'>Agency Code</label></td>
                                    <td><input type='text' name='Agency Code' maxlength="30" /></td>
									<td><input type="image" src="question.jpg" width="" height=""  alt="Help Button"/></td>
                                </tr>
								<tr>
									<td><label for="Valid from Date" >Valid From Date</label></td>
									<td><input type="text" id="Valid fDate" size="20" maxlength="12"/></td>
									<td><input type="image" src="calender.jpg" width="" height="" alt="Calender Button"/></td>
									<td><label for="Valid to Date" >Valid To Date</label></td>
									<td><input type="text" id="Valid tDate" size="12" maxlength="12"/></td>
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



