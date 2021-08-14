<?php
require("admin/scripts/config.php");
if (isset($_SESSION["loginSuccess"]) && $_SESSION["loginSuccess"] === true) {
    $loginSuccess = $_SESSION["loginSuccess"];
    $userID = $_SESSION["userID"];
    $userSQL = "SELECT * FROM gp_customers WHERE id = '$userID'";
    $userResult = $conn->query($userSQL);
    $userData = $userResult->fetch_assoc();
    $username = $userData["username"];
    $firstname = $userData["firstname"];
    $lastname = $userData["lastname"];
    $fullname = $firstname . " " . $lastname;
    $email = $userData["email"];
    $number = $userData["number"];
    $address = $userData["address"];
} else {
    $loginSuccess = false;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- Custom Responsive CSS -->
    <link href="assets/css/responsive.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css"
      integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni"
      crossorigin="anonymous"
    />

    <!-- Rubik Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <!-- Booking Date Style -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css"
        type="text/css" media="all">

    <title>GER'S GARAGE</title>
  </head>
  <body>
    <!-- HEADER  -->
    <header>
      <!-- TOP BAR  -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul>
                <li>
                  <a href="tel:123456789">Call Us: 00000000</a>
                </li>
                <li>
                  <a href="mailto:info@gergarage">Email: info@gergarage</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- TOP BAR  -->

      <!-- NAV BAR  -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
        <div class="container">
          <a class="navbar-brand" href="index.php">GER'S GARAGE</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"
                  >HOME</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="booking.php">BOOKING</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact-us.php">CONTACT US</a>
              </li>
              <?php if ($loginSuccess) { ?>
              <li class="nav-item">
                <a class="nav-link" href="sign-out.php">SIGN OUT</a>
              </li>
              <?php } ?>
            </ul>
            <div class="d-flex">
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0 user-register-login">
              <?php if (!$loginSuccess) { ?>
                <li class="nav-item">
                  <a class="nav-link btn btn-danger me-2" href="sign-up.php"
                    >SIGN UP</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-outline-danger" href="sign-in.php"
                    >SIGN IN</a
                  >
                </li>
                <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link btn btn-danger" href="my-account.php"
                    >MY ACCOUNT</a
                  >
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- NAV BAR  -->
    </header>
    <!-- HEADER  -->