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