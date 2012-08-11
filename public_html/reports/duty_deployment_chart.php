<?php $this_page="reports"; 
 include 'check.php'; 

include 'check.php';?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>Reports</title>
        
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='login' action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend align="center">
                        <strong>Duty Deployment Chart[Report]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='Location'>*Location</label></td>
									<td>
									<select name='Location'>
										<option>#</option>
										<option>#</option>
										<option>#</option>
										<option>#</option>
									<select/>
									</td>
                                <tr>
                                    <td><label for='Shift'>*Shift</label></td>
									<td>
									<select name='Shift'>
										<option>#</option>
										<option>#</option>
										<option>#</option>
										<option>#</option>
									<select/>
									</td>
                                </tr>
								<tr>
									<td><label for='Shift_Date'>*Shift Date</label></td>
									<td><input type='text' name='Shift_Date' id='Shift_Date' maxlength="50" /><a href="#"><img src="img/calendar.jpg" alt="calendar" width="25" height="25" /></a></td>
								</tr>
                                <tr>
                                    <td colspan="2">
									<input id="OK" type='submit' name='OK' value='OK' />
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
