<?php
require("scripts/config.php");

// Check if the user is already logged in
if (isset($_SESSION["adminLoginSuccess"]) && $_SESSION["adminLoginSuccess"] === true) {
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

        $sql = "SELECT * FROM gp_admin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows == 1) {
            $db_username = $row["username"];
            $db_password = $row["password"];

            if ($db_username == $username and $db_password == $password) {
                $_SESSION["adminLoginSuccess"] = true;
                $_SESSION["adminID"] = $row["id"];
                $_SESSION["alert"] = "<b>SUCCESS!</b> You are logged in.";
                header("location:index.php");
                exit();
            } else {
                $login_err = "<b>ERROR!</b> Username or password is incorrect.";
            }
        }
    }
}
$login_err;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Rubik Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet" />

    <!-- Custom Style -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <title>Sign In</title>
</head>

<body>

    <!-- SIGN IN -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sign-in">
                    <form method="post">

                        <div class="card">
                            <div class="card-body">

                                <?php if (isset($_SESSION["alert"])) { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <?php echo $_SESSION["alert"]; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php unset($_SESSION["alert"]); ?>
                                <?php } ?>
                                <?php if ($login_err !== "") { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <?php echo $login_err; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($username_err !== "") { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo $username_err; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <?php if ($password_err !== "") { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo $password_err; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Email address</label>
                                    <input type="text" name="username" class="form-control form-control-sm" id="username" placeholder="Typer Here" value="<?php echo $username; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="Typer Here" value="<?php echo $password; ?>">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-danger btn-sm">SIGN IN</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SIGN IN -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>