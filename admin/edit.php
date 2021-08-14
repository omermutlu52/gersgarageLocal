<?php
require("includes/header.php");
$type = $_GET["type"];
if ($type == "spare-part") {
    include("includes/edit/spare-part.php");
} elseif ($type == "staff") {
    include("includes/edit/staff.php");
}
require("includes/footer.php");
