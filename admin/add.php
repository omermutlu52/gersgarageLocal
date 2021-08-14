<?php
require("includes/header.php");
$type = $_GET["type"];
if ($type == "spare-part") {
    include("includes/add/spare-part.php");
} elseif ($type == "staff") {
    include("includes/add/staff.php");
}
require("includes/footer.php");
