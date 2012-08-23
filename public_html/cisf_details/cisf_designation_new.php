<?php 
	$this_page='cisf_details';
include '../../includes/check.php';

	if(!empty($_POST))
	{
		include '../../includes/open_db.php';
		$desig_code=$_POST["desig_code"];
		$desig_description=$_POST["desig_description"];
		$query="insert into cisf_designation(`desig_code`,`desig_description`) values('$desig_code','$desig_description')";
		$result=mysql_query($query) or die(mysql_error());
		mysql_close($link);

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/style.css" />
        <title>CISF Detail</title>
        
		<script type="text/javascript">
			function validateForm()
			{
				var x=document.getElementById("desig_code");
				var y=document.getElementById("desig_description");
				if ((x.value==null || x.value=="")||(y.value==null || y.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
		</script>
    </head>

    <body>
        <div>
            <?php include_once 'menu.php';?><br><br><br><br>
        </div>
        <div id="form1" >
            <form id='myform' name='myform'  action="#" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
                <fieldset>
                    <legend>
                        <strong>Designation [New]</strong>
                    </legend>
                    <div id="tbl">
                        <table>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><label for='desig_code'>*Desig Code</label></td>
                                    <td><input type='text' name='desig_code' id='desig_code' maxlength="10" style="margin-left:2em;"/></td>
                                <tr>
                                    <td><label for='desig_description'>*Description</label></td>
                                    <td><input type='text' name='desig_description' id='desig_description' maxlength="50" style="margin-left:2em; width:17em;"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
									<a href="cisf_designation_view.php"><img class="s_button" src="../../img/search.png" alt="Search" width="30" height="30" /> </a>
                                    <input id="Save" type='submit' name='Save' value='Save' />
                                    <input id="Clear" type='reset' name='Clear' value='Clear' />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </form>
			<?php 
			if(!empty($_POST))
			{
				echo '<br/><br/><p style="text-align:center; font-size:1.5em; color:#0078ff;"><strong>Database updated</strong></p>';
			}
			?>
        </div>
	</body>
</html>	
