<?php $this_page='duty_details';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Activity Log</title>
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
                        <strong>Activity Log[New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for="Date" >Date</label></td>
									<td><input type="text" id="Date"  maxlength="15"/></td>
                                </tr>
								<tr>
									<td><label for="Action On" >Action On</label></td>
									<td><input type="text" id="Action On"  maxlength="" size="50"/></td>
                                </tr>
								<tr>
                                    <td><label for='Action Taken/Desc'>*Action Taken/Desc</label></td>
                                    <td> <textarea rows='5' cols='30'></textarea></td>
                                </tr>
								<tr>
				                    <td><label for='From Time'>*From Time</label></td>
                                    <td><input type='text' name='From Time' maxlength="15"/></td>
									<td><label for='To Time'>To Time</label></td>
                                    <td><input type='text' name='To Time' maxlength="15" /></td>
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



