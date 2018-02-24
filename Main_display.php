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

mysql_select_db('user_reg',$con);
$sql="SELECT * FROM contact WHERE username='$uname' ";
$result = mysql_query($sql);

echo "<table border='1'>"; 
echo "<tr><th>First Name</th><th>Last Name</th><th>Contact No.</th></tr>";  
while($row = mysql_fetch_array($result)){   
echo "<tr><td>" . $row['first_name'] . "</td><td>". $row['last_name']. " </td><td>" . $row['contact_no'] . "</td><td><a href='Index.php?Update_contact' >Update Contact</a></td><td><a href='Index.php?Delete_contact?fname=" . $row['first_name'] . "' >Delete Contact</a></td></tr>";  
}

echo "</table>"; 

mysql_close($con); 


?>
<a href="Index.php?Main_logout">Logout</a>
</div>

</center>
</body>
</html>