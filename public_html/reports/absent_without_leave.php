<?php $this_page='reports';
include '../../includes/check.php';
 
 include 'check.php'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="absent_without_leave.css" />
        <title>Reports</title>
        
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='login' action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend align="center" >
                        <strong>Absent Without Leave[Report]</strong>
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
                                    <td><label for='From_Date'>*From Date</label></td>
									<td><input type='text' name='From_Date' id='From_Date' maxlength="50" /><a href="#"><img src="img/calendar.jpg" alt="calendar" width="25" height="25" /></a></td>
						                                                  
						            <td><label for='To_Date'>*To Date</label></td>
									<td><input type='text' name='To_Date' id='To_Date' maxlength="50" /><a href="#"><img src="img/calendar.jpg" alt="calendar" width="25" height="25" /></a></td>
								</tr>	
								<tr>
									<td><label for='Name_of_person'>Name of person</label></td>
									<td><input type='text' name='Name_of_person' id='Name_of_person' maxlength="50" /><a href="#"><img src="img/question.jpg" alt="search" width="25" height="25" /></a></td>
								</tr>
																					
                                <tr>
                                    <td colspan="4">
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
