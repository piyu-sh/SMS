<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	include_once  '../../includes/open_db.php';
	$result=mysql_query("select * from duty_location") or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>Duty Detail</title>
        
		<script type="text/javascript">
		function validateForm()
			{
				var x=document.getElementById("loc_description");
				if (x.selectedIndex==-1)
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
		</script>
	</head>

    <body>
        <div>
            <?php include_once '../../includes/menu.php';?>
			<br><br><br><br>
        </div>
        <div id="form1" >
            <form id='myform' name='myform'  action="../duty_area_search_result/" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Duty Area [Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='loc_description'>*Location</label></td>
                                    <td>
										<select name='loc_description' id='loc_description' style="margin-left:2em; width:17em;" >
											<?php 
												$i=0;
												while ($row = mysql_fetch_array($result))
												{
													echo "<option name= 'option".$i."'"." id='".$i."' >".$row['loc_description']."</option>";
													$i++;
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for='area_description'>Duty Area</label></td>
									<td><input type='text' name='area_description' id='area_description' maxlength="50" style="margin-left:2em; width:17em;" /></td>
								</tr>
                                <tr>
                                    <td colspan="2">
										<a href="../duty_area_new"><img class="s_button" width=30 height=28 src="../../img/add.png" /> </a>
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
