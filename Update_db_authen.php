<?php
session_start();

$fname=@$_REQUEST['fname'];
$lname=@$_REQUEST['lname'];
$num=@$_REQUEST['num'];
$uname=@$_SESSION['username'];
$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

mysql_select_db('user_reg',$con);

$sql="UPDATE contact SET first_name='$fname', last_name='$lname', contact_no='$num' WHERE username='$uname'";

mysql_query($sql,$con);

mysql_close($con);
header("Location: Index.php?Main_display");

?>
