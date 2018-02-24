<?php
session_start();
$username=$_REQUEST['uname'];
$password=$_REQUEST['pass'];

$con=mysql_connect('localhost','root','');

mysql_select_db('user_reg',$con);

$sql="SELECT username,password FROM user WHERE username='$username' and password='$password'";

$row= mysql_num_rows(mysql_query($sql,$con));
mysql_close($con);
if(!($row>0))
{
$user_invalid=1;
$_SESSION['user_invalid']=$user_invalid;
header("Location: Index.php?Login_login");
}

else
{

$status='logged_in';
$_SESSION['user_status']=$status;
$_SESSION['username']=$username;
header("location:Index.php?Main_display");

}

 ?>