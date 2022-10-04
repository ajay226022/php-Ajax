<?php   
session_start(); 
session_unset();
session_destroy(); 
header("location:/login.php"); //to redirect back to "index.php" after logging out

?>