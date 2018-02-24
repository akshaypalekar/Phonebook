<?php
session_start();

$fname=@$_REQUEST['fname'];

$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}
mysql_select_db('user_reg',$con);
$sql="DELETE FROM  `user_reg`.`contact` WHERE  `contact`.`first_name` =  '$fname'";
mysql_query($sql,$con);

mysql_close($con);
header("Location:Index.php?Main_display");

?>