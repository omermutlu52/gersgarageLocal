<?php
require("includes/header.php");
$cusSQL = "SELECT * FROM gp_customers";
$cusResult = mysqli_query($conn, $cusSQL);
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
                                <h4><b>CUSTOMERS</b></h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-primary">
                                    <th>ID:</th>
                                    <th>Username:</th>
                                    <th>Password:</th>
                                    <th>Full Name:</th>
                                    <th>Email:</th>
                                    <th>Number:</th>
                                    <th>Address:</th>
                                    <th>Status:</th>
                                    <th>Action:</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($cusResult->num_rows > 0) {
                                        while ($cusRow = $cusResult->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $sr; ?></td>
                                                <td><?php echo $cusRow["username"]; ?></td>
                                                <td><?php echo $cusRow["password"]; ?></td>
                                                <td><?php echo $cusRow["firstname"]; ?> <?php echo $cusRow["lastname"]; ?></td>
                                                <td><?php echo $cusRow["email"]; ?></td>
                                                <td><?php echo $cusRow["number"]; ?></td>
                                                <td><?php echo $cusRow["address"]; ?></td>
                                                <td class="text-center"><?php echo check_status($cusRow["status"]); ?></td>
                                                <td class="text-center">
                                                    <a href="#" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $sr; ?>">
                                                        <i class='bx bx-block'></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $sr; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure? Do you want to change the status for
                                                                <?php echo $cusRow["username"]; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="change-status.php?id=<?php echo $cusRow["id"]; ?>&status=<?php echo $cusRow["status"]; ?>" class="btn btn-sm btn-danger">CHANGE STATUS</a>
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