<!DOCTYPE html>
<?php

session_start();

if(isset($_REQUEST['Main_display']))
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<?php include 'Header.php'; ?>
</script>

</head>
<body>
</br></br></br>
<center>
<div style="font-family:verdana;padding:10px;border-radius:10px;border:2px solid blue;background-color:#E9E9E9;width:700px;height:500px;opacity:0.9">
Contact Details</br>
<a href="Index.php?Add_contact">Add Contact</a>
<?php
$uname=@$_SESSION['username'];

$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

mysql_select_db('phonebook',$con);
$sql="SELECT * FROM contact WHERE username='$uname' ";
$result = mysql_query($sql);

echo "<table border='1'>"; 
echo "<tr><th>First Name</th><th>Last Name</th><th>Contact No.</th></tr>";  
while($row = @mysql_fetch_array($result))
{   
echo "<tr><td>" . $row['first_name'] . "</td><td>". $row['last_name']. " </td><td>" . $row['contact_no'] . "</td><td><a href='Index.php?Update_contact&name=" . $row['first_name'] . "' >Update Contact</a></td><td><a href='Index.php?Delete_contact&fname=" . $row['first_name'] . "' >Delete Contact</a></td></tr>";  
}

echo "</table>"; 

mysql_close($con); 


?>
<a href="Index.php?Main_logout">Logout</a>
</div>

</center>
</body>
</html>
<?php
}

else if(isset($_REQUEST['Reg_reg']))
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<?php include 'Header.php'; ?>
</head>
<script type="text/javascript">
function validate()
	{
		var pass=document.getElementById('pass').value;
		var cpass=document.getElementById('cpass').value;
		var username=document.getElementById('uname').value;
		if(pass)
		{
		if (pass.length<7)
		{
		
			document.getElementById('pass').value ="";
			alert("Password Must be greater than 6 Characters.!");
		}
		
		if (cpass)
	    {
		if(pass!=cpass)
		{
			document.getElementById('pass').value ="";
			document.getElementById('cpass').value ="";
			alert("Passwords do not Match!");
		
		}
		}
		}
	}
</script>
<body>
</br></br></br>
<center>
<div style="font-family:verdana;padding:10px;border-radius:10px;border:2px solid blue;background-color:#E9E9E9;width:500px;height:180px;opacity:0.9">
<span style="float:right"><a href="Index.php?Login_login">Go Back</a></span></br><hr>
<form action="Index.php?Reg_authen" method="post">
<table>
<tr><td>Username</td><td><input type="text" name="uname" id="uname" required></td></tr>
<tr><td>Password</td><td><input type="password" name="pass" id="pass" placeholder="Set Password" onblur="javascript:validate()" required></td></tr>
<tr><td>Confirm Password</td><td><input type="password" name="cpass" id="cpass" placeholder="Retype Password" onblur="javascript:validate()" required></td></tr>
</table></br>
<center><input type="submit" value="Register"></center>
</form>
<font color="red">
<?php 

$available=@$_SESSION['available'];
if($available)
{
echo "Username Not Available. Kindly try another Username";
}
if(isset($_SESSION['available']))
unset($_SESSION['available']);
?>
</font>
</div>
</center>
</body>
</html>
<?php
}

else if(isset($_REQUEST['Login_authen']))
{
$username=$_REQUEST['uname'];
$password=$_REQUEST['pass'];

$con=mysql_connect('localhost','root','');

mysql_select_db('phonebook',$con);

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

}

else if(isset($_REQUEST['Reg_authen']))
{

$username=@$_REQUEST['uname'];
$password=@$_REQUEST['pass'];


$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

$sql="CREATE DATABASE IF NOT EXISTS phonebook";
mysql_query($sql,$con);
mysql_select_db('phonebook',$con);
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


}

else if(isset($_REQUEST['Update_db_authen']))
{


$fname=@$_REQUEST['fname'];
$lname=@$_REQUEST['lname'];
$num=@$_REQUEST['num'];
$uname=@$_SESSION['username'];
$name=$_SESSION['name'];
$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

mysql_select_db('phonebook',$con);

$sql="UPDATE contact SET first_name='$fname', last_name='$lname', contact_no='$num' WHERE first_name='$name'";

mysql_query($sql,$con);

mysql_close($con);
header("Location: Index.php?Main_display");



}

else if(isset($_REQUEST['Update_contact']))
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<?php include 'Header.php'; ?>
</head>
<body>
</br></br></br>
<center>
<div style="font-family:verdana;padding:10px;border-radius:10px;border:2px solid blue;background-color:#E9E9E9;width:500px;height:190px;opacity:0.9">
<span style="float:right"><a href="Index.php?Main_display">Back to List</a></span></br><hr>
<font size="6">Edit Contact</font>
<form action="Index.php?Update_db_authen" method="post">
<table>
<tr><td>First Name</td><td><input type="text" name="fname" id="fname" required></td></tr>
<tr><td>Last Name</td><td><input type="text" name="lname" id="lname" required></td></tr>
<tr><td>Contact Number</td><td><input type="number" name="num" id="num" required></td></tr>
</table>
<center><input type="submit" value="Update"></center>
</form>
</div>
</center>
<?php
$name=$_REQUEST['name'];
$_SESSION['name']=$name;
?>
</body>
</html>
<?php
}

else if(isset($_REQUEST['Delete_contact']))
{

$fname=@$_REQUEST['fname'];
$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}
mysql_select_db('phonebook',$con);
$sql="DELETE FROM  `phonebook`.`contact` WHERE  `contact`.`first_name` =  '$fname'";
mysql_query($sql,$con);

mysql_close($con);
header("Location:Index.php?Main_display");



}

else if(isset($_REQUEST['Main_logout']))
{
if(isset($_SESSION['user_status']))
{
unset($_SESSION['user_status']);
unset($_SESSION['username']);
unset($_SESSION['name']);
}

header("location: Index.php?Login_login");

}

else if(isset($_REQUEST['Add_contact']))
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<?php include 'Header.php'; ?>
<script type="text/javascript">
function validate()
	{
		var num=document.getElementById('num').value;
		if(num)
		{
		if (num.length<10 || num.length>10 )
		{
		
			document.getElementById('num').value ="";
			alert("Mobile Number must be 10 Digits");
		}
		}
	}
</script>
</head>
<body>
</br></br></br>
<center>
<div style="font-family:verdana;padding:10px;border-radius:10px;border:2px solid blue;background-color:#E9E9E9;width:500px;height:190px;opacity:0.9">
<span style="float:right"><a href="Index.php?Main_display">Back to List</a></span></br><hr>
<font size="6">Add Contact</font>
<form action="Index.php?Add_db_authen" method="post">
<table>
<tr><td>First Name</td><td><input type="text" name="fname" id="fname" required></td></tr>
<tr><td>Last Name</td><td><input type="text" name="lname" id="lname" required></td></tr>
<tr><td>Contact Number</td><td><input type="number" name="num" id="num" onblur="javascript:validate()" required></td></tr>
</table>
<center><input type="submit" value="Insert"></center>
</form>
</div>
</center>
</body>
</html>
<?php
}
else if(isset($_REQUEST['Add_db_authen']))
{

$username=@$_SESSION['username'];
$fname=@$_REQUEST['fname'];
$lname=@$_REQUEST['lname'];
$num=@$_REQUEST['num'];


$con=mysql_connect('localhost','root','');
if(!$con)
{
die("connection not established");
}

$sql="CREATE DATABASE IF NOT EXISTS phonebook";
mysql_query($sql,$con);
mysql_select_db('phonebook',$con);
$sql= "CREATE TABLE IF NOT EXISTS contact
(
username varchar(20),
first_name varchar(20),
last_name varchar(20),
contact_no bigint(10)
)";
mysql_query($sql,$con);

$sql= "INSERT INTO `phonebook`.`contact` (`username`, `first_name`, `last_name`, `contact_no`) 
VALUES ('$username','$fname', '$lname','$num')";
mysql_query($sql,$con);
mysql_close($con);
header("Location: Index.php?Main_display");

}

else 
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<?php include 'Header.php'; ?>
</head>
<body>
</br></br></br>
<center>
<div style="font-family:verdana;padding:10px;border-radius:10px;border:2px solid blue;background-color:#E9E9E9;width:500px;height:150px;opacity:0.9">
<form action="Index.php?Login_authen" method="post">
<table>
<tr><td>Username</td><td><input type="text" name="uname" id="uname" required></td></tr>
<tr><td>Password</td><td><input type="password" name="pass" id="pass" required></td></tr>
</table>
<center><input type="submit" value="Sign In"></br>
<hr>
Not a Member Yet?</br>
<a href="Index.php?Reg_reg">Sign Up</a></center>
</form>
<font color="red">
<?php 

$user_invalid=@$_SESSION['user_invalid'];
if($user_invalid)
{
echo "Incorrect Username/Password.";
}
if(isset($_SESSION['user_invalid']))
unset($_SESSION['user_invalid']);
?>
</font>
</div>
</center>
</body>
</html>
<?php

}



?>