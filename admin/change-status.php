<?php
require("scripts/config.php");
$id = $_GET["id"];
$status = $_GET["status"];

if ($status == 0) {
    $status = 1;
} elseif ($status == 1) {
    $status = 0;
}

$updateSQL = "UPDATE gp_customers SET `status` = '$status' WHERE `id` = '$id'";
$updateResult = mysqli_query($conn, $updateSQL);
$_SESSION["notification"] = "SUCCESS! User status successfuly changed. ";
header("location:customers.php");
exit();
