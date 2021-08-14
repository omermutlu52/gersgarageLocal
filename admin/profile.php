<?php
include("includes/header.php");
//Define variables and initialize with empty values
$update_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $adminData["id"];
    $username = $_POST["username"];
    $password = trim($_POST["password"]);
    $fullname = trim($_POST["fullname"]);
    $post = trim($_POST["post"]);
    $email = trim($_POST["email"]);
    $bio = trim($_POST["bio"]);

    // Check if username already exist
    if ($username) {
        $checkUserSQL = "SELECT * FROM gp_admin WHERE username = '$username'";
        $checkUserResult = mysqli_query($conn, $checkUserSQL);
        if (mysqli_num_rows($checkUserResult) > 1) {
            echo $update_err = "<b>ERROR!</b> Username already exist.";
        } else {
            $username = $username;
            $updateSQL = "UPDATE gp_admin SET 
                username = '$username',
                password = '$password',
                fullname = '$fullname',
                post = '$post',
                email = '$email',
                bio = '$bio'
                WHERE id = '$id'";
            $updateResult = mysqli_query($conn, $updateSQL);
            header("location:profile.php");
        }
    }
}

?>

<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container-fluid">
        <?php if (isset($_SESSION["alert"])) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION["alert"]; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION["alert"]); ?>
        <?php } ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>PROFILE</h4>
                            </div>
                        </div>
                        <div class="text-center">
                            <img src="assets/images/noThumbnail.jpg" class="card-img-top myProfile mb-3" alt="no photo">
                        </div>
                        <h5 class="card-title text-center"><?php echo $adminData["fullname"]; ?></h5>
                        <p class="card-text text-center"><?php echo $adminData["post"]; ?></p>
                        <p class="text-center"><?php echo $adminData["bio"]; ?></p>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>UPDATE PROFILE</h4>
                            </div>
                        </div>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Username:</label>
                                    <input type="text" name="username" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" value="<?php echo $adminData["username"]; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock" class="form-label">Password:</label>
                                    <input type="password" name="password" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" value="<?php echo $adminData["password"]; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock" class="form-label">Full Name:</label>
                                    <input type="text" name="fullname" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" value="<?php echo $adminData["fullname"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Job:</label>
                                    <input type="text" name="post" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" value="<?php echo $adminData["post"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="stock" class="form-label">Email:</label>
                                    <input type="email" name="email" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" value="<?php echo $adminData["email"]; ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Bio:</label>
                                    <textarea name="bio" class="form-control form-control-sm mb-2" id="description" placeholder="Type Here"><?php echo $adminData["bio"]; ?></textarea>
                                </div>
                                <div class="text-end mt-2">
                                    <input type="submit" class="btn btn-danger btn-sm" value="UPDATE PROFILE">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Container Main end-->
<?php include("includes/footer.php"); ?>