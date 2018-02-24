<?php
session_start();
if(isset($_SESSION['user_status']))
{
unset($_SESSION['user_status']);
unset($_SESSION['username']);
}

header("location: Index.php?Login_login");
?>