<?php 
	$this_page='cisf_details';
include '../../includes/check.php';

	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from duty_point") or die(mysql_error());
	$result1=mysql_query("select * from cisf_designation") or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>CISF Detail</title>
        
		<style type="text/css">
			select{float:Left;	margin-left:2em; width:17em;}
		</style>
		<script type="text/javascript">
			function validateForm()
			{
				var x=document.getElementById("dp_list");
				var y=document.getElementById("desig_list");
				if ((x.selectedIndex==-1)||(y.selectedIndex==-1))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
		</script>
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?>
			<br/><br/><br/><br/>
        </div>
        <div id="form1" >
            <form id='myform' name='myform'  action="cisf_guards_per_location_search_result.php" method='post' onsubmit="return validateForm()" accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Guards Per Location [Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
								<tr>
									<td><label for='dp_list'>*Duty Point</label></td>
									<td>
										<select name="dp_list" id="dp_list">
											<?php 
												$i=0;
												while ($row = mysql_fetch_array($result))
												{
													echo "<option id='".$i."' >".$row['dp_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
                                <tr>
                                    <td><label for='desig_list'>*Designation</label></td>
									<td><input type='text' name='desig_list' id='desig_list' maxlength="50" style="margin-left:2em; width:17em;" /></td>
								</tr>
                                <tr>
                                    <td colspan="2">
									<a href="cisf_guards_per_location_new.php"><img class="s_button" src='../../img/add.png' alt='Add' width=30 height=25 />
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
