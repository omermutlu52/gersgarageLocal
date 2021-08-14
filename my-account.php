<?php include("includes/header.php"); ?>

<!-- BREADCRUMB -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">HOME</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            ABOUT US
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- BREADCRUMB -->

<!-- MY ACCOUNT -->
<section class="my-account">
    <div class="container">
        <div class="col-md-12">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Profile</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Bookings</button>
                    <a href="sign-out.php" class="nav-link">Sign Out</a>
                </div>
                <div class="tab-content card" id="v-pills-tabContent">
                    <div class="tab-pane card-body fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h5>Hello, <?php echo $fullname; ?>!</h5>
                        <p>From your account dashboard you can view your recent bookins and manage your profile details.</p>
                    </div>
                    <div class="tab-pane card-body fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form action="#" class="myaccount-form">
                            <div class="myaccount-form-inner">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name:</label>
                                        <input class="form-control form-control-sm" name="firstname" id="firstname" type="text" value="<?php echo $firstname; ?>" placeholder="Type Here" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name:</label>
                                        <input class="form-control form-control-sm" name="lastname" type="text" value="<?php echo $lastname; ?>" placeholder="Type Here" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Username:</label>
                                        <input class="form-control form-control-sm" type="text" value="<?php echo $username; ?>" placeholder="Type Here" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address:</label>
                                        <input class="form-control form-control-sm" type="email" value="<?php echo $email; ?>" placeholder="Type Here" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone #:</label>
                                        <input class="form-control form-control-sm" type="number" value="<?php echo $number; ?>" placeholder="Type Here" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address:</label>
                                        <input class="form-control form-control-sm" type="text" value="<?php echo $address; ?>" placeholder="Type Here" required>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane card-body fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>SR</th>
                                        <th>MY INFO</th>
                                        <th>VEHICLE</th>
                                        <th>TYPE & STATUS</th>
                                    </tr>
                                    <?php
                                    $sql = "SELECT * FROM gp_booking WHERE user_id = $userID";
                                    $result = mysqli_query($conn, $sql);
                                    $sr = 1;
                                    if ($result->num_rows > 0) {
                                        while ($bookingRow = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $sr; ?></td>
                                                <td class="text-start">
                                                    <?php echo $firstname; ?> <?php echo $lastname; ?><br>
                                                    <?php echo $email; ?><br>
                                                    <?php echo $number; ?>

                                                </td>
                                                <td class="text-start">
                                                    <?php echo $bookingRow["vehicle_make"]; ?>
                                                    <?php echo $bookingRow["vehicle_name"]; ?>
                                                    <?php echo $bookingRow["vehicle_model"]; ?><br>
                                                    License #: <?php echo $bookingRow["vehicle_lesNumber"]; ?><br>
                                                    Engine Type: <?php echo $bookingRow["vehicle_engineType"]; ?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $bookingRow["vehicle_bookingType"]; ?>
                                                    <br>
                                                    <span class="badge bg-<?php if ($bookingRow["status"] == "Unrepairable") {
                                                                                echo "danger";
                                                                            } elseif ($bookingRow["status"] == "Fixed") {
                                                                                echo "success";
                                                                            } elseif ($bookingRow["status"] == "In Service") {
                                                                                echo "warning text-dark";
                                                                            } else {
                                                                                echo "info text-dark";
                                                                            } ?>">
                                                        <?php echo $bookingRow["status"]; ?>
                                                    </span>
                                                    <br>
                                                    <?php echo $bookingRow["date"]; ?>
                                                </td>
                                            </tr>
                                            <?php $sr++; ?>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane card-body fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MY ACCOUNT -->

<?php include("includes/footer.php"); ?>