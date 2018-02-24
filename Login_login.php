<!DOCTYPE html>
<?php
session_start();
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
