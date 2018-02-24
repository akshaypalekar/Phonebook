<!DOCTYPE html>
<?php
session_start();
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