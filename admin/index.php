<?php include("includes/header.php"); ?>

<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Dashboard</h4>
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
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <i class="bx bx-user bg-success iconStyle"></i>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Total Customers</h5>
                        <span class="badge bg-success"><?php echo numberOfRecords($conn, "gp_customers"); ?> CUSTOMERS</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <i class="bx bx-wrench bg-danger iconStyle"></i>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Spare Parts</h5>
                        <span class="badge bg-danger"><?php echo numberOfRecords($conn, "gp_spareparts"); ?> SPARE PARTS</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <i class="bx bx-book bg-warning iconStyle"></i>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Bookings</h5>
                        <span class="badge bg-warning"><?php echo numberOfRecords($conn, "gp_booking"); ?> BOOKINGS</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <i class="bx bxs-user-pin bg-info iconStyle"></i>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Staff</h5>
                        <span class="badge bg-info"><?php echo numberOfRecords($conn, "gp_staff"); ?> STAFF</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Container Main end-->
<?php include("includes/footer.php"); ?>