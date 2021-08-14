<?php
require("includes/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["changeStatus"])) {
    $id = $_POST["id"];
    $status = $_POST["status"];

    $updateSQL = "UPDATE gp_booking SET 
    `status` = '$status' WHERE `id` = '$id'";


    $updateResult = mysqli_query($conn, $updateSQL);
    $_SESSION["notification"] = "SUCCES! The booking status successfully changed.";
    header("location:bookings.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addSparePart"])) {
    $id = $_POST["id"];
    $sparePart = $_POST["sparePart"];

    $updateSQL = "UPDATE gp_booking SET 
    `spare_part` = '$sparePart' WHERE `id` = '$id'";
    $updateResult = mysqli_query($conn, $updateSQL);

    $SQL = "SELECT * FROM gp_spareparts WHERE `id` = '$sparePart'";
    $result = mysqli_query($conn, $SQL);
    $row = $result->fetch_assoc();

    $stock = $row["stock"];
    $stock--;

    $updateSQL = "UPDATE gp_spareparts SET 
    `stock` = '$stock' WHERE `id` = '$sparePart'";
    $updateResult = mysqli_query($conn, $updateSQL);

    $updateResult = mysqli_query($conn, $updateSQL);
    $_SESSION["notification"] = "SUCCES! The booking status successfully changed.";
    header("location:bookings.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["assignEmploy"])) {
    echo $id = $_POST["id"];
    $employ = $_POST["employee"];
    $updateSQL = "UPDATE gp_booking SET 
    `employee` = '$employ' WHERE `id` = '$id'";
    $updateResult = mysqli_query($conn, $updateSQL);
    $_SESSION["notification"] = "SUCCESS! The booking is assigned to staff member successfully.";
    header("location:bookings.php");
}




$from;
$to;
if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["filter"]) {
    $from = $_POST["from"];
    $to = $_POST["to"];
    header("location:bookings.php?from=" . $from . "&to=" . $to . "");
}

if (isset($_GET['from']) and isset($_GET['to'])) {
    $from = $_GET['from'];
    $to = $_GET["to"];
    $staffSQL = "SELECT * FROM gp_booking WHERE date BETWEEN '$from' AND '$to'";
} else {
    $staffSQL = "SELECT * FROM gp_booking";
}
$staffResult = mysqli_query($conn, $staffSQL);
?>
<!--Container Main start-->

<div class="height-100 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h4><b>BOOKINGS</b></h4>
                            </div>
                        </div>
                        <form method="post">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <input name="from" type="date" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <input name="to" type="date" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <input name="filter" type="submit" class="btn btn-sm btn-danger pull-right w-100" value="FILTER">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php if (isset($_SESSION["notification"])) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo $_SESSION["notification"]; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION["notification"]); ?>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-success table-striped" id="myTable">
                                <thead class="text-primary">
                                    <th>SR:</th>
                                    <th>Customer:</th>
                                    <th>Vehicle:</th>
                                    <th>Booking:</th>
                                    <th>Date:</th>
                                    <th>Spare Parts:</th>
                                    <th>Employee:</th>
                                    <th>Status:</th>
                                    <th>Action:</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($staffResult->num_rows > 0) {
                                        while ($bookingRow = $staffResult->fetch_assoc()) {
                                            $userID = $bookingRow["user_id"];
                                            $userSQL = "SELECT * FROM gp_customers WHERE id = '$userID' ORDER BY id DESC";
                                            $userResult = $conn->query($userSQL);
                                            $userData = $userResult->fetch_assoc();
                                    ?>
                                            <tr>
                                                <td><?php echo $sr; ?></td>
                                                <td>
                                                    <?php echo $userData["firstname"]; ?> <?php echo $userData["lastname"]; ?><br>
                                                    Email: <?php echo $userData["email"]; ?><br>
                                                    Phone #: <?php echo $userData["number"]; ?><br>
                                                </td>
                                                <td><b><?php echo $bookingRow["vehicle_make"]; ?>
                                                        <?php echo $bookingRow["vehicle_name"]; ?>
                                                        <?php echo $bookingRow["vehicle_model"]; ?></b><br>
                                                    License #: <?php echo $bookingRow["vehicle_lesNumber"]; ?><br>
                                                    Engine Type: <?php echo $bookingRow["vehicle_engineType"]; ?>
                                                </td>
                                                <td>
                                                    Price: <?php echo $bookingRow["price"]; ?> EUROS<br>
                                                    Service Type: <?php echo $bookingRow["vehicle_bookingType"]; ?><br>
                                                    <b>Decription:</b>
                                                    <?php echo substr($bookingRow["description"], 0, 30); ?>..
                                                </td>
                                                <td>
                                                    <?php echo $bookingRow["date"]; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $sparePartID = $bookingRow["spare_part"];
                                                    $SQL = "SELECT * FROM gp_spareparts WHERE id IN ($sparePartID)";
                                                    $result = mysqli_query($conn, $SQL);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <?php echo $row["name"]; ?><br>
                                                    <?php }
                                                    } ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    $sparePartID = $bookingRow["employee"];
                                                    $SQL = "SELECT * FROM gp_staff WHERE id IN ($sparePartID) ";
                                                    $result = mysqli_query($conn, $SQL);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <?php echo $row["name"]; ?><br>
                                                    <?php }
                                                    } ?>
                                                </td>
                                                
                                                <td>
                                                    <span class="badge bg-<?php if ($bookingRow["status"] == "Unrepairable") {
                                                                                echo "danger";
                                                                            } elseif ($bookingRow["status"] == "Fixed") {
                                                                                echo "primary";
                                                                            } elseif ($bookingRow["status"] == "In Service") {
                                                                                echo "warning text-dark";
                                                                            } else {
                                                                                echo "success";
                                                                            } ?>"><?php echo $bookingRow["status"]; ?>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#addSparePart<?php echo $bookingRow["id"]; ?>">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </a>
                                                    <a href="#" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#assignEmploy<?php echo $bookingRow["id"]; ?>">
                                                        <i class='bx bxs-user-plus'></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#changeStatusModal<?php echo $bookingRow["id"]; ?>">
                                                        <i class='bx bxs-doughnut-chart'></i>
                                                    </a>
                                                    <a href="#" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $bookingRow["id"]; ?>">
                                                        <i class='bx bx-list-check'></i>
                                                    </a>
                                                    <a href="../pdf/files/invoice.php?id=<?php echo $bookingRow["id"]; ?>" target="_blank" class="btn btn-primary btn-sm">
                                                        <i class='bx bxs-printer'></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="addSparePart<?php echo $bookingRow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">BOOKING DETAILS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group bmd-form-group">
                                                                            <input type="text" name="id" value="<?php echo $bookingRow["id"]; ?>" style="display: none;">
                                                                            <select name="sparePart" class="form-control form-control-sm">
                                                                                <?php
                                                                                $SQL = "SELECT * FROM gp_spareparts WHERE stock > 0";
                                                                                $result = mysqli_query($conn, $SQL);
                                                                                if ($result->num_rows > 0) {
                                                                                    while ($row = $result->fetch_assoc()) {
                                                                                ?>
                                                                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                                                                <?php }
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer p-0 m-0">
                                                                    <input type="submit" name="addSparePart" class="btn btn-sm btn-danger pull-right mt-2 me-0" value="ADD SPARE PART">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                            

                                            <div class="modal fade" id="assignEmploy<?php echo $bookingRow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">BOOKING DETAILS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group bmd-form-group">
                                                                            <input type="text" name="id" value="<?php echo $bookingRow["id"]; ?>" style="display: none;">
                                                                            <select name="employee" class="form-control form-control-sm">
                                                                                <?php
                                                                                $SQL = "SELECT * FROM gp_staff ";
                                                                                $result = mysqli_query($conn, $SQL);
                                                                                if ($result->num_rows > 0) {
                                                                                    while ($row = $result->fetch_assoc()) {
                                                                                ?>
                                                                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                                                                <?php }
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer p-0 m-0">
                                                                    <input type="submit" name="assignEmploy" class="btn btn-sm btn-danger pull-right mt-2 me-0" value="ADD STAFF">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $bookingRow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">BOOKING DETAILS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                <li>User: <?php echo $userData["firstname"]; ?>
                                                                    <?php echo $userData["lastname"]; ?><br>
                                                                </li>
                                                                <li>Email: <?php echo $userData["email"]; ?></li>
                                                                <li>Number: <?php echo $userData["number"]; ?></li>
                                                                <li>Vehicle: <?php echo $bookingRow["vehicle_make"]; ?>
                                                                    <?php echo $bookingRow["vehicle_name"]; ?>
                                                                    <?php echo $bookingRow["vehicle_model"]; ?></li>
                                                                <li>Vehicle Type: <?php echo $bookingRow["vehicle_type"]; ?></li>
                                                                <li>License #: <?php echo $bookingRow["vehicle_lesNumber"]; ?></li>
                                                                <li>Engine Type: <?php echo $bookingRow["vehicle_engineType"]; ?>
                                                                </li>
                                                                <li>Booking Type: <?php echo $bookingRow["vehicle_bookingType"]; ?>
                                                                </li>
                                                            </ul>
                                                            <strong>Description:</strong>
                                                            <p><?php echo $bookingRow["description"]; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal -->
                                            <div class="modal fade" id="changeStatusModal<?php echo $bookingRow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">BOOKING DETAILS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group bmd-form-group">
                                                                            <input type="text" name="id" value="<?php echo $bookingRow["id"]; ?>" style="display: none;">
                                                                            <select name="status" class="form-control form-control-sm">
                                                                                <option value="Booked">Booked</option>
                                                                                <option value="In Service">In Service</option>
                                                                                <option value="Fixed">Fixed</option>
                                                                                <option value="Collected">Collected</option>
                                                                                <option value="Unrepairable">Unrepairable</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer p-0 m-0">
                                                                    <input type="submit" name="changeStatus" class="btn btn-sm btn-danger pull-right mt-2 me-0" value="CHANGE STATUS">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                            $sr++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Container Main end-->
<?php include("includes/footer.php"); ?>