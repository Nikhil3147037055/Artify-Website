
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>
  <?php
  session_start();
  include("connection.php");
  include("header.php");
  ?>

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout Form</h2>
        </div>

        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Order Form</h4>
                <form class="needs-validation" novalidate action="" method="post">
                    <!-- User Details -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" name="firstName" required>
                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" required>
                            
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com">
                      
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                        
                    </div>
                    <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>Pakistan</option>
              </select>
              
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">City</label>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>Karachi</option>
                <option>Lahore</option>
                <option>Faisalabad</option>
                <option>Rawalpindi</option>
                <option>Hyderabad</option>
                <option>Peshawar</option>
                <option>Islamabad</option>
              </select>
              
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              
            </div>
          </div>
                    <h4 class="mb-3">Payment</h4>
                    <div class="d-block my-3">
                    <div class="custom-control custom-radio">
    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
    <label class="custom-control-label" for="credit">Credit card</label>
</div>

<div class="custom-control custom-radio">
    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
    <label class="custom-control-label" for="debit">Debit card</label>
</div>

<div class="custom-control custom-radio">
    <input id="cash" name="paymentMethod" type="radio" class="custom-control-input" required>
    <label class="custom-control-label" for="cash">Cash on delivery</label>
</div>
<br><br>
<div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" required>
              
              
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" required>
             
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" required>
              
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" required>
              
            </div>
          </div>
          <br>
                    <button class="btn btn-primary btn-lg btn-block" name="checkout" type="submit">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>

<script>
  
</script>
<!-- Bootstrap and Validation Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript for form validation -->
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission if the form is invalid
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

</body>
</html>
<?php
include("connection.php"); // Make sure you have your database connection set up

// Check if the checkout form is submitted
if (isset($_POST['checkout'])) {
    $user_id = $_SESSION['u_id']; // Get the user ID from the session

    // Retrieve all products in the cart for this user
    $query = "SELECT * FROM `card` WHERE `user_id` = '$user_id'";
    $result = mysqli_query($connection, $query);
    
    // Check if the cart is not empty
    if (mysqli_num_rows($result) > 0) {
        $order_success = true; // Flag for order success
        $random_number = rand(10000000, 99999999); // Generate random order number
        $random_numbers = rand(1000000000000000, 9999999999999999); // Unique order number

        // Process each product in the cart
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $quantity = $row['product_qty'];

            // Insert order into the orders table
            $insert_order_query = "INSERT INTO `orders` (order_number, unique_order_number, user_id, product_id, product_qty) 
                                   VALUES ('$random_number', '$random_numbers', '$user_id', '$product_id', '$quantity')";
            if (!mysqli_query($connection, $insert_order_query)) {
                $order_success = false; // Set flag to false if insertion fails
            }
        }

        // If the order was successfully inserted, delete items from the cart
        if ($order_success) {
            $delete_query = "DELETE FROM `card` WHERE `user_id` = '$user_id'";
            mysqli_query($connection, $delete_query); // Clear the cart
            echo "<script>
                    alert('Order placed successfully');
                    location.assign('card_info.php'); // Redirect to confirmation page
                  </script>";
        } else {
            echo "<script>
                    alert('There was an error placing your order. Please try again.');
                    location.assign('checkout.php'); // Redirect back to checkout
                  </script>";
        }
    } else {
        echo "<script>
                alert('Please add items to your cart before checking out');
                location.assign('card_table.php'); // Redirect back to cart
              </script>";
    }
}
?>



    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Example JavaScript for validation
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
