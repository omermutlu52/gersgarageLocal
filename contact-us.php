<?php include("includes/header.php"); ?>

    <!-- BREADCRUMB -->
    <section class="breadcrumb-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">HOME</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  CONTACT US
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- BREADCRUMB -->

    <!-- ABOUT US CONTENT -->
    <section class="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4">
            <img
              src="assets/images/contact-us.png"
              class="w-100"
              alt="contact us"
            />
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h3>Contact Us:</h3>
                <form class="row g-3">
                  <div class="col-md-6">
                    <label for="firstname" class="form-label"
                      >Your Name: *</label
                    >
                    <input
                      type="text"
                      class="form-control form-control-sm"
                      id="firstname"
                      placeholder="Type Here..."
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastname" class="form-label"
                      >Your Email: *
                    </label>
                    <input
                      type="text"
                      class="form-control form-control-sm"
                      id="lastname"
                      placeholder="Type Here..."
                    />
                  </div>
                  <div class="col-md-12">
                    <label for="lastname" class="form-label"
                      >Your Message: *
                    </label>
                    <textarea
                      name=""
                      class="form-control form-control-sm"
                      id=""
                      rows="5"
                      placeholder="Type Here..."
                    ></textarea>
                  </div>
                  <div class="col-12 text-end">
                    <button type="submit" class="btn btn-sm btn-danger">SEND MESSAGE</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ABOUT US CONTENT -->

<?php include("includes/footer.php"); ?>