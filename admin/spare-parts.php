<?php
require("includes/header.php");
$sPartsSQL = "SELECT * FROM gp_spareparts";
$sPartsResult = mysqli_query($conn, $sPartsSQL);
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
                                <h4><b>SPARE PARTS</b></h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="add.php?type=spare-part" class="btn btn-sm btn-danger">NEW SPARE PART</a>
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
                                    <th>Description:</th>
                                    <th>Stock:</th>
                                    <th>Price:</th>
                                    <th>Action:</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($sPartsResult->num_rows > 0) {
                                        while ($sPartsRow = $sPartsResult->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $sr; ?></td>
                                                <td><?php echo $sPartsRow["name"]; ?></td>
                                                <td><?php echo substr($sPartsRow["description"], 0, 50); ?>...</td>
                                                <td><?php echo $sPartsRow["stock"]; ?></td>
                                                <td><?php echo $sPartsRow["price"]; ?></td>
                                                <td>
                                                    <a href="edit.php?type=spare-part&id=<?php echo $sPartsRow["id"]; ?>" type="button" class="btn btn-warning btn-sm me-2">
                                                        <i class='bx bx-edit'></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $sPartsRow["id"]; ?>">
                                                        <i class='bx bxs-basket'></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $sPartsRow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRMATION</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure? Do you want to delete
                                                                <?php echo $sPartsRow["name"]; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="delete.php?type=spare-part&id=<?php echo $sPartsRow["id"]; ?>" class="btn btn-sm btn-danger">DELETE SPARE PART</a>
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