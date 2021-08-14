<?php
//Define variables and initialize with empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id =  $_GET["id"];
    $name = $_POST["name"];
    $stock = $_POST["stock"];
    $price=$_POST["price"];
    $description = $_POST["description"];

    $sql = "INSERT INTO gp_spareparts 
    (`name`, `description`, `stock`,`price`) VALUES
    ('$name', '$description', '$stock','$price')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    $_SESSION["notification"] = "SUCCESS! New spare part added successfully.";
    header("location:spare-parts.php");
}

?>


<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>ADD SPARE PART</h4>
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
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control form-control-sm mb-2" id="name" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-4">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="text" name="stock" class="form-control form-control-sm mb-2" id="stock" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-4">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" name="price" class="form-control form-control-sm mb-2" id="price" placeholder="Type Here" required>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" class="form-control form-control-sm mb-2" id="description" placeholder="Type Here"></textarea>
                        </div>
                        <div class="text-end mt-2">
                            <input type="submit" class="btn btn-danger btn-sm" value="ADD SPARE PART">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Container Main End-->