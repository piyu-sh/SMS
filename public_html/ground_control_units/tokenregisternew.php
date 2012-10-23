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
                        <strong>Token Register[New]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for="Issued Date" >*Issued Date</label></td>
									<td><input type="text" id="Issued Date" size="35" maxlength="12"/></td>
									<td><input type="image" src="calender.jpg" width="" height="" alt="Calender Button"/></td>
                                    <td></td>
									<td></td>
									<td></td>
									<td><label for='Issue Time'>*Issue Time</label></td>
                                    <td><input type='text' name='Issue Time' maxlength="30" /></td>
								</tr>
								<tr>
				                    <td><label for='Agency'>*Agency</label></td>
                                    <td><input type='text' name='Agency' maxlength="30"size="35"/></td>
									<td><input type="image" src="question.jpg" width="" height=""  alt="Help Button"/></td>
                                    <td></td>
									<td></td>
									<td></td>
									<td><label for='Area Of Operation'>*Area Of Operation</label></td>
                                    <td><input type='text' name='Area Of Operation' maxlength="30" /></td>
								</tr>
								<tr>
								    <td><label for='Work Details'>Work Details</label></td>
                                    <td><input type='text' name='Work Details' maxlength="30" size="35"/></td>
								</tr>
								<tr>
				                    <td><label for='Agency'>*Agency</label></td>
                                    <td><input type='text' name='Agency' maxlength="30"/></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><label for='Area Of Operation'>*Area Of Operation</label></td>
                                    <td><input type='text' name='Area Of Operation' maxlength="30" /></td>
								</tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr>
									<td><label for="Photo">Photo Path</label></td>
									<td><input type="text" id="PIC" maxlength=""/></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><input type="submit" value="Browse"/></td>
								</tr>
								<tr>
									<td><label for="Authorised By AAI">Authorised By AAI</label></td>
									<td><select>
										<option>Yes</option>
										<option>No</option>
										</select></td>
								</tr>
								<tr>
                                    <td><label for='Remarks'> Remarks</label></td>
                                    <td> <textarea rows='2' cols='26'></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
					<div id="tbl">
                        <table border="1">
                            <tbody>
							<tr>
							    <th>S no.</th>
							    <th>*Worker Name</th>
							    <th>Address</th>
								<th colspan="2">*Token type</th>
								<th>*Token no.</th>
								<th>*In Time</th>
								<th>Out Time</th>
								<th colspan="2"><input type='image' src='Search.png' alt='Search' /></th>
						    </tr>
							<tr>
								<td>1</td>
								<td><input type="text" id="Worker Name" maxlength=""/></td>
								<td><input type="text" id="Address" maxlength=""/></td>
								<td><input type="text" id="Token Type" size="5"/></td><td><input type='image' src='question.jpg' alt='Search' /></td>
								<td><input type="text" id="Token no" size="8"/></td>
								<td><input type="text" id="In Time" size="5"/></td>
								<td><input type="text" id="Out Time" size="5"/></td>
								<td><input type='image' src='correct.jpg' alt='correct' /></td><td><input type='image' src='wrong.jpg' alt='wrong' /></td>
						    </tr>
							</tbody>
						</table>
					</div>	
                </fieldset>
            </form>
        </div>
		
	</body>
</html>	



                                    
								