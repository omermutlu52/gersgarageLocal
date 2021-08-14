<?php
ob_start();
session_start();
$_SESSION = array();
session_destroy();
session_start();

$_SESSION["alert"] = "<b>SUCCESS!</b> You are logged out.";
// Redirect to login page
header("location:sign-in.php");
exit;
