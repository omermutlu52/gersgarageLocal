<?php
require("includes/header.php");
// Check if the user is already logged in
if (isset($_SESSION["loginSuccess"]) && $_SESSION["loginSuccess"] === true) {
    header("location:index.php");
    $_SESSION["alert"] = "<b>WARNING!</b> You can not access the login page if you are already logged in.";
    exit;
}

//Define variables and initialize with empty values
$firstname = $lastname = $username = $email = $password = $confirmPassword = $number = $address = $status = $date = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Set values from form post method
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $number = $_POST["number"];
    $address = $_POST["address"];
    $date=date('d/m/Y');
    $status = 0;
    $login_err ='';

    if ($username) {
        $sql = "SELECT * FROM gp_customers WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows < 1) {
          if ($_POST["password"] === $_POST["confirmPassword"]) {
            // success!
            $sql = "INSERT INTO `gp_customers`
            (`username`, `password`, `firstname`, `lastname`, `email`, `number`, `address`,`status`,`date`)
            VALUES
            ('$username', '$password', '$firstname', '$lastname', '$email', '$number', '$address','$status','$date')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              $_SESSION["registered"] = "<b>SUCCESS!</b> You are registered. You can login here.";
              header("location:sign-in.php");
              exit(); 
            } 
         }else {
            // failed :(
              $login_err = "<b>WARNING!</b> Password and Confirm Password doesn't match.";
         } 
            
        }else {
          $login_err = "<b>WARNING!</b>  Username already exist.";
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
                  SIGN UP
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
        <div class="row align-items-center">
          <div class="col-md-5">
            <img
              src="assets/images/sign-up.jpg"
              class="w-100"
              alt="contact us"
            />
          </div>
          <div class="col-md-7">
            <div class="card">
              <div class="card-body">
              <?php if ($login_err != "") { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $login_err; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <form class="row g-3" method="post">
                  <div class="col-md-6">
                    <label for="firstname" class="form-label">Firstname:</label>
                    <input
                      type="text"
                      name="firstname"
                      class="form-control form-control-sm"
                      id="firstname"
                      placeholder="Type Here..."
                      value="<?php echo $firstname; ?>" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label">Lastname: </label>
                    <input
                      type="text"
                      name="lastname"
                      class="form-control form-control-sm"
                      id="lastname"
                      placeholder="Type Here..."
                      value="<?php echo $lastname; ?>" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label">Username: </label>
                    <input
                      type="text"
                      name="username"
                      class="form-control form-control-sm"
                      id="username"
                      placeholder="Type Here..."
                      value="<?php echo $username; ?>" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label"
                      >Email Address:
                    </label>
                    <input
                      type="text"
                      name="email"
                      class="form-control form-control-sm"
                      id="email"
                      placeholder="Type Here..."
                      value="<?php echo $email; ?>" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label">Password: </label>
                    <input
                      type="password"
                      name="password"
                      class="form-control form-control-sm"
                      id="password"
                      placeholder="Type Here..."
                      value="<?php echo $password; ?>" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label"
                      >Confirm Password:
                    </label>
                    <input
                      type="password"
                      name="confirmPassword"
                      class="form-control form-control-sm"
                      id="confirmPassword"
                      placeholder="Type Here..."
                      value="<?php echo $confirmPassword; ?>" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label">Number:</label>
                    <input
                      type="text"
                      name="number"
                      class="form-control form-control-sm"
                      id="number"
                      placeholder="Type Here..."
                      value="<?php echo $number; ?>" required
                    />
                  </div>
                 
                
                  <div class="col-md-6">
                    <label for="lastname" class="form-label">Address:</label>
                    <input
                      type="text"
                      name="address"
                      class="form-control form-control-sm"
                      id="address"
                      placeholder="Type Here..."
                      value="<?php echo $address; ?>" required
                    />
                  </div>
                  <div class="col-12 text-end">
                    <button type="submit" class="btn btn-sm btn-danger">
                      REGISTER ME
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

<?php include("includes/footer.php"); ?>