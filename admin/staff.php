<?php
require("includes/header.php");
$staffSQL = "SELECT * FROM gp_staff";
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
                            <div class="col-md-6 mb-3">
                                <h4><b>STAFF</b></h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="add.php?type=staff" class="btn btn-sm btn-danger">NEW STAFF</a>
                            </div>
                        </div>
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
                                    <th>ID:</th>
                                    <th>Name:</th>
                                    <th>Post:</th>
                                    <th>Email:</th>
                                    <th>Number:</th>
                                    <th>Address:</th>
                                    <th>Date Joining:</th>
                                    <th>Action:</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($staffResult->num_rows > 0) {
                                        while ($staffRow = $staffResult->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $sr; ?></td>
                                                <td><?php echo $staffRow["name"]; ?></td>
                                                <td><?php echo $staffRow["post"]; ?></td>
                                                <td><?php echo $staffRow["email"]; ?></td>
                                                <td><?php echo $staffRow["number"]; ?></td>
                                                <td><?php echo $staffRow["address"]; ?></td>
                                                <td><?php echo $staffRow["joining_date"]; ?></td>
                                                <td>
                                                    <a href="edit.php?type=staff&id=<?php echo $staffRow["id"]; ?>" type="button" class="btn btn-sm btn-warning me-2">
                                                        <i class='bx bx-edit'></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $staffRow["id"]; ?>">
                                                        <i class='bx bxs-basket'></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $staffRow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confrmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure? Do you want to remove
                                                                <?php echo $staffRow["name"]; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="delete.php?type=staff&id=<?php echo $staffRow["id"]; ?>" class="btn btn-sm btn-danger">Yes</a>
                                                        </div>
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