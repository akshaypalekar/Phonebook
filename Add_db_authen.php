<?php
session_start();

$fname=@$_REQUEST['fname'];
$lname=@$_REQUEST['lname'];
$num=@$_REQUEST['num'];


$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

$sql="CREATE DATABASE IF NOT EXISTS user_reg";
mysql_query($sql,$con);
mysql_select_db('user_reg',$con);
$sql= "CREATE TABLE IF NOT EXISTS contact
(
username varchar(20),
first_name varchar(20),
last_name varchar(20),
contact_no bigint(10)
)";
mysql_query($sql,$con);

$sql= "INSERT INTO `user_reg`.`contact` (`username`, `first_name`, `last_name`, `contact_no`) 
VALUES ('$username','$fname', '$lname','$num');";
mysql_query($sql,$con);
mysql_close($con);
header("Location: Index.php?Main_display");

?>
