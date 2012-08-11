<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	include_once  'open_db.php';
	$result=mysql_query("select * from duty_location") or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Duty Detail</title>
        
		<style type="text/css">
			select {float:Left;	margin-left:2em; width:17em;}
		</style>
		<script type="text/javascript">
			function validateForm()
			{
				var x=document.getElementById("loc_list");
				var y=document.getElementById("area_list");
				if ((x.selectedIndex==-1)||(y.selectedIndex==-1))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
			function get_area_desc(str)
			{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","ret_area_desc.php?str="+str,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				{
					document.getElementById("area_list").innerHTML=xmlhttp.responseText;
				}
			}
		</script>
	</head>

    <body>
        <div>
            <?php include_once 'menu.php';?>
			<br /> <br /> <br /> <br />
        </div>
        <div id="form1" style="width:32em; height:20em;">
            <form id='login' action="duty_point_search_result.php" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Duty Point [Search]</strong>
                    </legend>

                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='loc_list'>*Location</label></td>
                                    <td>
										<select id="loc_list" name="loc_list" onchange="get_area_desc(this.value)" onfocus="get_area_desc(this.value)" >
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
                                    <td><label for='area_list'>*Area</label></td>
                                    <td>
										<select id="area_list" name="area_list" ></select>
									</td>
								</tr>
								
								<tr>
                                    <td><label for='dp_description'>Duty Point</label></td>
                                    <td><input type='text' name='dp_description' id='dp_description' maxlength="50" style="margin-left:2em; width:17em;" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
										<a href="duty_point_new.php"><img class="s_button" src='img/add.png' alt='Add' width=30 height=28/>
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
