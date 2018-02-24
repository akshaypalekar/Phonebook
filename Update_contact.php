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
</body>
</html>