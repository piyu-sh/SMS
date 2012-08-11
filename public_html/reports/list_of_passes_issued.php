<?php $this_page="reports"; 
 include 'check.php'; 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="list_of_passes_issued.css" />
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
                        <strong>List of Passes Issued</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='Agency'>Agency</label></td>
									<td><input type='text' name='Agency' id='Agency' maxlength="50" /><a href="#"><img src="img/question.jpg" alt="search" width="25" height="25" /></a></td>
								</tr>	
                                <tr>
                                    <td><label for='Type_of_Pic'>Type of Pic</label></td>
									<td>
									<select name='Type_of_Pic'>
										<option>#</option>
										<option>#</option>
										<option>#</option>
										<option>#</option>
									<select/>
									</td>
                                </tr>
                                <tr>
									<td><label for='Category'>Category</label></td>
									<td>
									<select name='Category'>
										<option>#</option>
										<option>#</option>
										<option>#</option>
										<option>#</option>
									<select/>
									</td>
                                </tr>
								<tr>
									<td><label for='Valid_From'>Valid From</label></td>
									<td><input type='text' name='Valid_From' id='Valid_From' maxlength="50" /><a href="#"><img src="img/calendar.jpg" alt="calendar" width="25" height="25" /></a></td>
								</tr>
								<tr>
									<td><label for='Valid_To'>Valid To</label></td>
									<td><input type='text' name='Valid_To' id='Valid_To' maxlength="50" /><a href="#"><img src="img/calendar.jpg" alt="calendar" width="25" height="25" /></a></td>
								</tr>
								<tr>
									<td><label for='Invalid_PICs'>Invalid PICs</label></td>
									<td><input type="checkbox"  name="Invalid_PICs"/></td>
								</tr>
								<tr>
									<td><label for='Summary'>Summary</label></td>
									<td><input type="checkbox" name="Summary"/></td>
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
