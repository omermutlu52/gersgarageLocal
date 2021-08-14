<?php
ob_start();
session_start();
$_SESSION = array();
session_destroy();
session_start();
// Redirect to login page
header("location:sign-in.php");
exit;