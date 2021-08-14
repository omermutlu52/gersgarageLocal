<?php
//Define variables and initialize with empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $job = $_POST["job"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $address = $_POST["address"];
    $date = date('Y-m-d');

    $sql = "INSERT INTO gp_staff 
    (`name`, `post`, `email`, `number`, `address`, `joining_date`) VALUES
    ('$name', '$job', '$email', '$number', '$address', '$date')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    $_SESSION["notification"] = "SUCCESS! New staff member added successfully.";
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
                            <input type="text" name="name" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Job:</label>
                            <input type="text" name="job" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Number:</label>
                            <input type="number" name="number" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Address:</label>
                            <textarea name="address" class="form-control form-control-sm mb-2" id="description" placeholder="Type Here"></textarea>
                        </div>
                        <div class="text-end mt-2">
                            <input type="submit" class="btn btn-danger btn-sm" value="ADD STAFF">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Container Main End-->