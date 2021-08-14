<?php
require("includes/header.php");
// Check if the user is already logged in
if (isset($_SESSION["loginSuccess"]) && $_SESSION["loginSuccess"] === true) {
    header("location:index.php");
    $_SESSION["alert"] = "<b>WARNING!</b> You can not access the login page if you are already logged in.";
    exit;
}

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
                header("location:my-account.php");
                exit();
            }
        }else {
          $login_err = "<b>ERROR!</b> Username or password is incorrect.";
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
                  SIGN IN
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
              src="assets/images/sign-in.png"
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
                <?php if (isset($_SESSION["registered"])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["registered"]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>

                <form class="row g-3" method="post">
                  <div class="col-md-12">
                    <label for="username" class="form-label"
                      >Username: *</label
                    >
                    <input
                      type="text"
                      class="form-control form-control-sm"
                      name="username"
                      id="username"
                      placeholder="Type Here..."
                    />
                  </div>
                  <div class="col-md-12">
                    <label for="password" class="form-label"
                      >Password: *
                    </label>
                    <input
                      type="password"
                      class="form-control form-control-sm"
                      name="password"
                      id="password"
                      placeholder="Type Here..."
                    />
                  </div>
                  <div class="col-12 text-end">
                    <button
                        type="submit"
                        name="sign_in"
                        class="btn btn-sm btn-danger"
                    >
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
    <!-- ABOUT US CONTENT -->

<?php include("includes/footer.php"); ?>