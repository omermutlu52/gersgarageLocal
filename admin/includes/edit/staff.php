<?php
//Define variables and initialize with empty values
$update_err = "";
$id =  $_GET["id"];
$checkUserSQL = "SELECT * FROM gp_staff WHERE id = '$id'";
$checkUserResult = mysqli_query($conn, $checkUserSQL);
$row = $checkUserResult->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $post = $_POST["job"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $address = $_POST["address"];

    $updateSQL = "UPDATE gp_staff SET 
    `name` = '$name',
    `post` = '$post',
    `email` = '$email',
    `number` = '$number',
    `address` = '$address' WHERE `id` = '$id'";

    $updateResult = mysqli_query($conn, $updateSQL);
    $_SESSION["notification"] = "SUCCES! The staff member information successfully updated.";
    header("location:staff.php");
}
?>


<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>ADD STAFF</h4>
                    </div>
                </div>
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
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" value="<?php echo $row["name"]; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Job:</label>
                            <input type="text" name="job" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" value="<?php echo $row["post"]; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" value="<?php echo $row["email"]; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Number:</label>
                            <input type="number" name="number" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" value="<?php echo $row["number"]; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Address:</label>
                            <textarea name="address" class="form-control form-control-sm mb-2" id="description" placeholder="Type Here"><?php echo $row["address"]; ?></textarea>
                        </div>
                        <div class="text-end mt-2">
                            <input type="submit" class="btn btn-danger btn-sm" value="UPDATE STAFF">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Container Main End-->