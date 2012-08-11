<?php 
$values=str_replace("b","",$_GET['values']);
$values1=explode("_",$values);
include_once 'open_db.php';
 foreach($values1 as $x=>$y)
{
	if($y)
	{
		mysql_query("delete from `duty_area` where `area_id`='$y'") or die(mysql_error());
	}
} 
mysql_close($link);
echo $values;

?>