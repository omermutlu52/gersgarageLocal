    <!-- FOOTER -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>GER'S GARAGE</h5>
            <p>
              Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do
              eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad
              minim veniam.
            </p>
          </div>
          <div class="col-md-4">
            <h5>QUICK LINKS</h5>
            <ul>
              <li>
                <a href="#"><i class="fas fa-angle-right"></i> Home</a>
              </li>
              <li>
                <a href="#"><i class="fas fa-angle-right"></i> About</a>
              </li>
              <li>
                <a href="#"><i class="fas fa-angle-right"></i> Booking</a>
              </li>
              <li>
                <a href="#"
                  ><i class="fas fa-angle-right"></i> Terms & Conditions</a
                >
              </li>
              <li>
                <a href="#"><i class="fas fa-angle-right"></i> Policy</a>
              </li>
              <li>
                <a href="#"><i class="fas fa-angle-right"></i> Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>LOCATION</h5>
            <p>(+00) 00000000</p>
            <p>info@example.com</p>
            <p>This is the address of Ger's Garage in Ireland</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- FOOTER -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>

    <!-- Booking Date Picker Script -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $(document).ready(function() {
          var today = new Date();
          $("#date").datepicker({
            beforeShowDay: function(date) {
        var day = date.getDay();
        return [(day != 0 ),  ''];       // Sunday exclusive 
    },
              changeMonth: true,
              changeYear: true,
              dateFormat: 'yy-mm-dd',
              minDate: today // set the minDate to the today's date
          });
      });
      </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
