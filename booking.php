<?php
require("includes/header.php");
$vehicle_make;
$vehicle_name;
$vehicle_model;
$vehicle_lesNumber;
$vehicle_engineType;
$vehicle_bookingType;
$description;
$date;
$date_err;

// Check if the user is already logged in
if (isset($_SESSION["loginSuccess"]) && $_SESSION["loginSuccess"] === true) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set values from form post method
    $user_id = $userID;
    $vehicle_make = $_POST["vehicle_make"];
    $vehicle_name = $_POST["vehicle_name"];
    $vehicle_model = $_POST["vehicle_model"];
    $vehicle_lesNumber = $_POST["vehicle_lesNumber"];
    $vehicle_engineType = $_POST["vehicle_engineType"];
    $vehicle_bookingType = $_POST["vehicle_bookingType"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $vehicle_type= $_POST["vehicle_type"];
    $price = "";
    if ($vehicle_bookingType == "Annual Service") {
      $price = 200;
    } elseif ($vehicle_bookingType == "Major Service") {
      $price = 600;
    } elseif ($vehicle_bookingType == "Major Repair") {
      $price = 400;
    } 
    else {
      $price = 150;
    }

    if (isset($date)) {
      $sql = "SELECT * FROM gp_booking WHERE NOT `vehicle_bookingType` = 'Major Service' AND `date` = '$date'";
      $result = mysqli_query($conn, $sql);
      $bookings = $result->num_rows;            // Not Major service booking row

      $majorBookingSQL = "SELECT * FROM gp_booking WHERE `vehicle_bookingType` = 'Major Service' AND  `date` = '$date'";
      $majorBookingresult = mysqli_query($conn, $majorBookingSQL);
      $majorBooking = $majorBookingresult->num_rows;
      $majorBooking = $majorBooking * 2;             // Major Service booking row counts twice  
      $checkBooking = $bookings + $majorBooking;     // Total booking 

      if ($checkBooking > 9) {                       // Check if the booking more than 9   
        $date_err = "We already have a lot of booking on this date, please change the date.";    // error message
      } else {                                      // else user can make booking 
        $sql = "INSERT INTO `gp_booking`
                (`user_id`,
                `vehicle_make`,
                `vehicle_name`,
                `vehicle_model`,
                `vehicle_lesNumber`,
                `vehicle_engineType`,
                `vehicle_bookingType`,
                `price`,
                `description`,
                `date`,
                `status`,
                `vehicle_type`)
                VALUES
                ('$user_id',
                '$vehicle_make',
                '$vehicle_name',
                '$vehicle_model',
                '$vehicle_lesNumber',
                '$vehicle_engineType',
                '$vehicle_bookingType',
                '$price',
                '$description',
                '$date',
                'Booked',
                '$vehicle_type')";

        $result = mysqli_query($conn, $sql);
        $_SESSION["notification"] = "<i class='fa fa-check-circle' aria-hidden='true'></i> <b>SUCCESS!</b> Your booking is successfully submitted. You will get a call and email as soon as possible.";
        header("location:booking.php");
        exit();
      }
    }
  }
?>

  <!-- BREADCRUMB -->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">HOME</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                BOOKING
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- BREADCRUMB -->

  <!-- ABOUT US CONTENT -->
  <section class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <ol class="list-group list-group-numbered">
            <li class="
                  list-group-item
                  d-flex
                  justify-content-between
                  align-items-start
                ">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Name:</div>
                <?php echo $firstname. " ".$lastname ; ?>
              </div>
            </li>
            <li class="
                  list-group-item
                  d-flex
                  justify-content-between
                  align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Email Address:</div>
                <?php echo $email; ?>
              </div>
            </li>
            <li class="
                  list-group-item
                  d-flex
                  justify-content-between
                  align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Number:</div>
                <?php echo $number; ?>
              </div>
            </li>
            <li class="
                  list-group-item
                  d-flex
                  justify-content-between
                  align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Address:</div>
                <?php echo $address; ?>
              </div>
            </li>
          </ol>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-body">

              <?php if (isset($_SESSION["notification"])) { ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 25px;" role="alert">
                      <?php echo $_SESSION["notification"]; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php unset($_SESSION["notification"]); ?>
              <?php if (isset($date_err)) { ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 25px;" role="alert">
                      <?php echo $date_err; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
              <?php } ?>

              <form class="row g-3" method="POST">
              <div class="col-md-4">
                  <label for="vehicle_make" class="form-label">
                    Vehicle Make *:
                  </label>
                  <select id="vehicle_make" name="vehicle_make" class="form-select form-select-sm"  required>
                    <option value="<?php if ($vehicle_make != "") {
                                      $vehicle_make = Null;
                                      echo $vehicle_make;
                                    } ?>">
                      <?php if ($vehicle_make != "") {
                        echo $vehicle_make;
                      } else {
                        echo "Choose";
                      } ?>
                    </option>
                    <option value="Alfa Romeo">Alfa Romeo</option>
                    <option value="Audi">Audi</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Citroen">Citroen</option>
                    <option value="Dacia">Dacia</option>
                    <option value="Daihatsu">Daihatsu</option>
                    <option value="Ford">Ford</option>
                    <option value="HSV">HSV</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Isuzu">Isuzu</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Jetta">Jetta</option>
                    <option value="Kia">Kia</option>
                    <option value="Lada">Lada</option>
                    <option value="Land Rover">Land Rover</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Mazda">Mazda</option>
                    <option value="McLaren">McLaren</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Mini">Mini</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Renault">Renault</option>
                    <option value="Seat">Seat</option>
                    <option value="Skoda">Skoda</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Other">Other</option>
                  </select>
                </div> 
                <div class="col-md-4">
                  <label for="vehicle_type" class="form-label">
                    Vehicle Type *: 
                  </label>
                  <select id="vehicle_type" name="vehicle_type" class="form-select form-select-sm" required>
                    <option value="<?php if ($vehicle_type != "") {
                                      $vehicle_type = Null;
                                      echo $vehicle_type;
                                    } ?>">
                      <?php if ($vehicle_type != "") {
                        echo $vehicle_type;
                      } else {
                        echo  "Choose";
                      } ?>
                    </option>
                    <option value="Car">Car</option>
                    <option value="Small Van">Small Van</option>
                    <option value="Small Bus">Small Bus</option>
                    <option value="Motorbike">Motorbike</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="lastname" class="form-label">Vehicle Name: *
                  </label>
                  <input type="text" name="vehicle_name" class="form-control form-control-sm" id="lastname" placeholder="For Example: ES 350 Sports" value="<?php echo $vehicle_name; ?>" required />
                </div>
                <div class="col-6">
                  <label for="email" class="form-label">
                    Vehicle Model: *
                  </label>
                  <input type="text" name="vehicle_model" class="form-control form-control-sm" id="vehicle_model" placeholder="For Example: 2021" value="<?php echo $vehicle_model; ?>" required />
                </div>
                <div class="col-6">
                  <label for="email" class="form-label">
                    Vehicle License Number: *
                  </label>
                  <input type="text" name="vehicle_lesNumber" class="form-control form-control-sm" id="vehicle_lesNumber" placeholder="Type Here..." value="<?php echo $vehicle_lesNumber; ?>" required />
                </div>
                <div class="col-md-4">
                  <label for="vehicle_engineType" class="form-label">
                    Vehicle Engine Type: *
                  </label>
                  <select id="vehicle_engineType" name="vehicle_engineType" class="form-select form-select-sm" required>
                    <option value="<?php if ($vehicle_engineType != "") {
                                      $vehicle_engineType = Null;
                                      echo $vehicle_engineType;
                                    } ?>">
                      <?php if ($vehicle_engineType != "") {
                        echo $vehicle_engineType;
                      } else {
                        echo "Choose";
                      } ?>
                    </option>
                    <option value="Diesel">Diesel</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Hybrid">Hybrid</option>
                    <option value="Electric">Electric</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">
                    Booking Type: *
                  </label>
                  <select id="vehicle_bookingType" name="vehicle_bookingType" class="form-select form-select-sm" required>
                    <option value="<?php if ($vehicle_bookingType != "") {
                                      echo $vehicle_bookingType;
                                    } else {
                                      $vehicle_bookingType = Null;
                                      echo $vehicle_bookingType;
                                    } ?>">
                      <?php if ($vehicle_bookingType != "") {
                        echo $vehicle_bookingType;
                      } else {
                        echo "Choose";
                      } ?>
                    </option>
                    <option value="Annual Service">Annual Service</option>
                    <option value="Major Service">Major Service</option>
                    <option value="Repair / Fault">
                      Repair / Fault
                    </option>
                    <option value="Major Repair">
                      Major Repair
                    </option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="date" class="form-label">
                    Date: *
                  </label>
                  <input type="text" name="date" class="form-control form-control-sm" id="date" value="<?php echo $date; ?>" required />
                </div>
                <div class="col-md-12">
                  <label for="description" class="form-label">
                    Description:
                  </label>
                  <textarea name="description" class="form-control form-control-sm" id="description"><?php echo $description; ?></textarea>

                </div>
                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-sm btn-danger">
                    CONFIRM BOOKING
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ABOUT US CONTENT -->
<?php } else {
  //Define variables and initialize with empty values
  $username = $password = "";
  $username_err = $password_err = $login_err = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
      $username_err = "<b>WARNING!</b> Please, enter username.";
    } else {
      $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
      $password_err = "<b>WARNING!</b> Please, enter password.";
    } else {
      $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {

      $sql = "SELECT * FROM gp_customers WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $row = $result->fetch_assoc();
      if ($result->num_rows == 1) {
        $db_username = $row["username"];
        $db_password = $row["password"];

        if ($db_username == $username && $db_password == $password) {
          $_SESSION["loginSuccess"] = true;
          $_SESSION["userID"] = $row["id"];
          header("location:booking.php");
          exit();
        } else {
          $login_err = "<b>ERROR!</b> Username or password is incorrect.";
        }
      }
    }
  }

?>
  <!-- BREADCRUMB -->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">HOME</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                BOOKING
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- BREADCRUMB -->

  <!-- SIGN IN CONTENT -->
  <section class="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <img src="assets/images/sign-in.png" class="w-100" alt="contact us" />
        </div>
        <div class="col-md-7">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <b>NOTIFICATION!</b> Login first for your vehicle repair booking.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <form class="row g-3" method="post">
                <div class="col-md-12">
                  <label for="username" class="form-label">Username: *</label>
                  <input type="text" class="form-control form-control-sm" name="username" id="username" placeholder="Type Here..." />
                </div>
                <div class="col-md-12">
                  <label for="password" class="form-label">Password: *
                  </label>
                  <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Type Here..." />
                </div>
                <div class="col-12 text-end">
                  <button type="submit" name="sign_in" class="btn btn-sm btn-danger">
                    SIGN IN
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- SIGN IN CONTENT -->
<?php } ?>
<?php include("includes/footer.php"); ?>