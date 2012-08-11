<?php 
	$this_page='cisf_details';
include '../../includes/check.php';

?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>CISF Detail</title>
        
		<style type="text/css">
			textarea {margin-left:2em; resize:none; overflow-y:auto; width:13em; height:4em;}
			select{float:Left;	margin-left:2em; width:12em;}
			input[type=text] {float:Left;	margin-left:2em; width:10em;}
		</style>
	</head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1" style="width:60em; height:20em;">
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
                                    <td><label for='cisf_no'>*CISF No</label></td>
									<td><input type='text' name='cisf_no' id='cisf_no' maxlength="20"/></td>
									<td><label for='name1'>*Name</label></td>
									<td><input type='text' name='name1' id='name1' maxlength="20"/></td>
								</tr>	
								<tr>
                                    <td><label for='date_of_birth'>Date of Birth</label></td>
									<td></td>
									<td><label for='gender'>*Gender</label></td>
									<td>
										<select id="gender" name="gender" style="float:Left; margin-left:2em; width:8em;">
											<option>Male</option>
											<option>Female</option>
										</select>
									</td>
                                </tr>
								<tr>
									<td><label for='designation'>*Designation</label></td>
									<td>
										<select id="desig_list" name="desig_list" style="float:Left; margin-left:2em; width:13em;">
											<?php 
												$i=0;
												while ($row = mysql_fetch_array($result1))
												{
													echo "<option id='".$i."' >".$row['desig_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
                                    <td><label for='Join_Date'>Join_Date</label></td>
									<td></td>
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
									<td><label for='Status'>Status</label></td>
                                    <td>
										<select id="status" name="status" style="float:Left; margin-left:2em; width:8em;">
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
