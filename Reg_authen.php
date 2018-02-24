<?php
session_start();

$username=@$_REQUEST['uname'];
$password=@$_REQUEST['pass'];


$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

$sql="CREATE DATABASE IF NOT EXISTS user_reg";
mysql_query($sql,$con);
mysql_select_db('user_reg',$con);
$sql= "CREATE TABLE IF NOT EXISTS user
(
username varchar(20),
password varchar(20)
)";
mysql_query($sql,$con);

$sql="SELECT username FROM user WHERE username='$username' ";

$row= mysql_num_rows(mysql_query($sql,$con));
if($row>0)
{
$available=1;
$_SESSION['available']=$available;
header("Location: Index.php?Reg_reg");
}

else
{
$sql= "INSERT INTO user (username,password) VALUES ('$username','$password')";
mysql_query($sql,$con) or die(mysql_error());
mysql_close($con);
header("Location: Index.php?Login_login");
}
?>
