<?php include('inc/InstituteSession.php'); 

session_destroy();
header("Location: index.html");

?>