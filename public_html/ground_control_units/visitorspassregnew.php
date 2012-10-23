<?php $this_page='duty_details';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Visitor Pass Register</title>
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
                        <strong>Visitor Pass Register[New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for="Issue Date" >*Issue Date</label></td>
									<td><input type="text" id="Issue Date" size="30" maxlength="12" value="mm/dd/yyyy"/></td>
									<td><input type="image" src="calender.jpg" width="" height="" alt="Calender Button"/></td>
									<td></td>
									<td><label for='Visitor Name'>*Visitor Name</label></td>
                                    <td ><input type='text' name='Visitor Name' maxlength="" /></td>
                                </tr>
								<tr>
								<td><label for='No Of Persons'>*No Of Persons</label></td>
                                <td ><input type='text' name='No Of Persons' maxlength="" /></td>
								<td></td>
								<td></td>
								<td><label for='Visit Place'>*Visit Place</label></td>
                                <td ><input type='text' name='Visit Place' maxlength="" /></td>
								</tr>
								<tr>
								<td><label for='Purpose'>Purpose</label></td>
                                <td ><input type='text' name='Purpose' maxlength="30" /></td>
								</tr>
								<tr>
								<td><label for='In Time'>*In Time</label></td>
                                <td ><input type='text' name='In Time' maxlength="" /></td>
								<td></td>
								<td></td>
								<td><label for='Out Time'>Out Time</label></td>
                                <td ><input type='text' name='Out Time' maxlength="" /></td>
								</tr>
								<tr></tr><tr></tr>
								<tr>
                                    <td><label for='Address Organisation Detail'>Address Organisation Detail(of visitors)</label></td>
                                    <td> <textarea rows='3' cols='26' ></textarea></td>
                                </tr>
								<tr></tr><tr></tr>
								<tr>
                                    <td><label for='Remarks'> Remarks</label></td>
                                    <td> <textarea rows='2' cols='26' ></textarea></td>
                                </tr>
                                 <tr>
                                    <td colspan="10">
									<input type='image' src='search.png' alt='Search' />
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

								   
									
