<?php 


session_start();
// unset the uid and name
unset($_SESSION["uid"]);
unset($_SESSION["name"]);

header("location: index.php");

?>