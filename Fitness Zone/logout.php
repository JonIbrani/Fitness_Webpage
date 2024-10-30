<?php

// Start or resume session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect user to login page or homepage after logout
header("Location: index.php"); 
exit;
?>
