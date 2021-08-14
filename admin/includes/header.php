<?php
require("scripts/config.php");
// Check if the user is already logged in
if (isset($_SESSION["adminLoginSuccess"]) && $_SESSION["adminLoginSuccess"] === true) {
    $loginSuccess = $_SESSION["adminLoginSuccess"];
    $adminID = $_SESSION["adminID"];
    $adminSQL = "SELECT * FROM gp_admin WHERE id = '$adminID'";
    $adminResult = $conn->query($adminSQL);
    $adminData = $adminResult->fetch_assoc();
} else {
    header("location:sign-in.php");
    exit;
}

$activePage = basename($_SERVER['PHP_SELF']);
$activePage = str_replace('.php', '', $activePage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Rubik Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet" />

    <!-- Custom Style -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- Custom Icons Font -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />

    <!-- Data Tables CSS and JS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <title>Admin Pannel</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="header_img">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bxs-user-circle'></i>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="sign-out.php">Sign Out</a></li>
            </ul>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav_logo">
                    <i class="bx bx-layer nav_logo-icon"></i>
                    <span class="nav_logo-name">GER'S GARAGE</span>
                </a>

                <div class="nav_list">
                    <a href="index.php" class="nav_link <?php if ($activePage == "index") {
                                                            echo "active";
                                                        } ?>">
                        <i class="bx bx-grid-alt nav_icon"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="customers.php" class="nav_link <?php if ($activePage == "customers") {
                                                                echo "active";
                                                            } ?>">
                        <i class="bx bx-user nav_icon"></i>
                        <span class="nav_name">Customers</span>
                    </a>
                    <a href="spare-parts.php" class="nav_link <?php if ($activePage == "spare-parts") {
                                                                    echo "active";
                                                                } ?>">
                        <i class="bx bx-wrench nav_icon"></i>
                        <span class="nav_name">Spare Parts</span>
                    </a>
                    <a href="bookings.php" class="nav_link <?php if ($activePage == "bookings") {
                                                                echo "active";
                                                            } ?>">
                        <i class="bx bx-book nav_icon"></i>
                        <span class="nav_name">Bookings</span>
                    </a>
                    <a href="staff.php" class="nav_link <?php if ($activePage == "staff") {
                                                            echo "active";
                                                        } ?>">
                        <i class="bx bxs-user-pin nav_icon"></i>
                        <span class="nav_name">Staff</span>
                    </a>
                </div>
            </div>
            <a href="sign-out.php" class="nav_link">
                <i class="bx bx-log-out nav_icon"></i>
                <span class="nav_name">Sign Out</span>
            </a>
        </nav>
    </div>