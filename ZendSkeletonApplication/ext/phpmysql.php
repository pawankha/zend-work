<?php
$con = mysql_connect("localhost","root","we3XGXwq8");
if (!$con)
{
 die('Could not connect: ' . mysql_error());
}
else
{
 echo "Congrats! connection established successfully";
}
mysql_close($con);
?>
