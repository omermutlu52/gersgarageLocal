<?php
require("scripts/config.php");

$id = $_GET["id"];
$type = $_GET["type"];

if ($type == "spare-part") {
    $sql = "DELETE FROM gp_spareparts WHERE id = '$id'";
    $conn->query($sql);
    $_SESSION["notification"] = "SUCCESS! The spare part successfully deleted.";
    header("location:spare-parts.php");
} elseif ($type == "staff") {
    $sql = "DELETE FROM gp_staff WHERE id = '$id'";
    $conn->query($sql);
    $_SESSION["notification"] = "SUCCESS! The staff successfully deleted.";
    header("location:staff.php");
}
