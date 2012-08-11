<?php $this_page='cisf_details';
include '../../includes/check.php';
 
 include 'check.php'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="cisf_security_personel_new.css" />
        <title>CISF Detail</title>
        
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1">
            <form id='login' action="#" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Security Personel [New]</strong>
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
                                    <td><label for='CISF_No'>*CISF No</label></td>
									<td><input type='text' name='CISF_No' id='CISF_No' maxlength="20"/></td>
									<td><label for='Name1'>*Name</label></td>
									<td><input type='text' name='Name1' id='Name1' maxlength="20"/></td>
								</tr>	
								<tr>
                                    <td><label for='Date_of_Birth'>Date of Birth</label></td>
									<td><input type='text' name='Date_of_Birth' id='Date_of_Birth' maxlength="20"/></td>
									<td><label for='Gender'>*Gender</label></td>
									<td>
										<select>
											<option>Male</option>
											<option>Female</option>
										</select>
									</td>
                                </tr>
								<tr>
									<td><label for='Designation'>*Designation</label></td>
									<td>
										<select id="Designation">
											<option>Aoc</option>
											<option></option>
										</select>
									</td>
                                    <td><label for='Join_Date'>Join_Date</label></td>
									<td><input type='text' name='Join_Date' id='Join_Date' maxlength="20"/></td>
								</tr>
								<tr>
									<td><label for='Address'>*Address</label></td>
                                    <td rowspan="2"><textarea id="Address"></textarea></td>
									<td><label for='Office_Ph'>Office Ph</label></td>
									<td><input type='text' name='Office_Ph' id='Office_Ph' maxlength="20"/></td>
								</tr>
								<tr>
                                    <td></td>
									<td><label for='Res_Ph'>Res Ph</label></td>
									<td><input type='text' name='Res_Ph' id='Res_Ph' maxlength="20"/></td>
								</tr>
								<tr>
                                    <td><label for='Fax'>Fax</label></td>
									<td><input type='text' name='Res_Ph' id='Res_Ph' maxlength="20"/></td>
									<td><label for='Email_Address'>Email Address</label></td>
									<td><input type='text' name='Email_Address' id='Email_Address' maxlength="20"/></td>
								</tr>
								<tr>
									<td><label for='Status'></label></td>
                                    <td>
										<select>
											<option>Available</option>
											<option>Not Available</option>
										</select>
									</td>
									<td><label for='Remarks'>Remarks</label></td>
                                    <td><textarea id="Remarks"></textarea></td>
								</tr>
                                <tr>
                                    <td colspan="4">
									<br/>
									<input type='image' src='img/search.png' alt='Search'/>
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
