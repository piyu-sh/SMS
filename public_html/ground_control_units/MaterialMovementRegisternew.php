<?php $this_page='duty_details';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Material Movement Register</title>
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
                        <strong>Material Movement Register[New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for='Material Movement Ref Code'>*Material Movement Ref Code</label></td>
                                    <td><input type='text' name='Material Movement Ref Code' maxlength="30" /></td>
									<td></td>
									<td></td>
									<td></td>
									<td><label for="Date of Movement" >*Date of Movement</label></td>
									<td><input type="text" id="Date of Movement" size="" maxlength="12"/></td>
									<td><input type="image" src="calender.jpg" width="" height="" alt="Calender Button"/></td>
								</tr>
								<tr>
									<td><label for='Movement Time'>*Movement Time</label></td>
                                    <td><input type='text' name='Movement Time' maxlength="30" /></td>
								</tr>
								<tr>
                                    <td><label for='Material Description'>*Material Description</label></td>
                                    <td> <textarea rows='1' cols='30'></textarea></td>
                                </tr>
								<tr>
									<td><label for="Returnable">Returnable</label></td>
									<td><select>
										<option>Yes</option>
										<option>No</option>
										</select></td>
								</tr>
								<tr>
									<td><label for='Location From'>*Location From</label></td>
                                    <td><input type='text' name='Location From' maxlength="50" size='40'/></td>
								</tr>
								<tr>
									<td><label for='Location To'>Location To</label></td>
                                    <td><input type='text' name='Location To' maxlength="50" size='40'/></td>
								</tr>
								<tr>
				                    <td><label for='Vehicle No'>Vehicle No</label></td>
                                    <td><input type='text' name='Vehicle No' maxlength="15" /></td>
									<td></td>
									<td></td>
									<td></td>
               						<td><label for='Agency'>Agency</label></td>
                                    <td><input type='text' name='Agency' maxlength="30"/></td>
									<td><input type="image" src="question.jpg" width="" height=""  alt="Help Button"/></td>
								</tr>
								<tr>
				                    <td><label for='Gate Pass No'>Gate Pass No</label></td>
                                    <td><input type='text' name='Gate Pass No' maxlength="15" /></td>
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
								
