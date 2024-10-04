<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <?php
    session_start();
    include("header.php");

    include("connection.php");

    // Function to display orders or no-orders message
    function displayOrderMessage($userId, $connection) {
        $query = "SELECT `products`.`p_name`,`products`.`p_img`,`products`.`p_price`, `orders`.*
                  FROM `products`
                  JOIN `orders` ON `orders`.`product_id` = `products`.`p_id`
                  WHERE orders.user_id = '$userId'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            // If there are orders, display the invoice data
            echo '<h1 class="ltext-106 cl5 my-5">Invoice Data</h1>';
            echo '<table class="table table-bordered text-center">
                    <thead>
                        <td>Product_image</td>
                        <td>Product_name</td>
                        <td>Product_Price</td>
                        <td>product_qty</td>
                        <td>Total</td>
                        <td colspan="1">Status</td>
                        <td colspan="2">Action</td>
                    </thead>
                    <tbody>';

            $grandTotal = 0;
            while ($rows = mysqli_fetch_assoc($result)) {
                $total = $rows['p_price'] * $rows['product_qty'];
                $grandTotal += $total;
                echo '<tr>
                        <td><img src="../admin_panel/products/' . $rows['p_img'] . '" alt="" style="height:100px;"></td>
                        <td>' . $rows['p_name'] . '</td>
                        <td>' . $rows['p_price'] . '</td>
                        <td><input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="' . $rows['product_qty'] . '"></td>
                        <td>' . $total . '</td>
                        <td>' . ($rows['status'] == 0 ? 'Pending' : 'Deliver') . '</td>
                        <td><a href="order_cancle.php?orderid=' . $rows['order_id'] . '" class="btn btn-danger">Order Cancel</a></td>
                      </tr>';
            }
            echo '</tbody></table>';
        } else {
            // If there are no orders, display the message and button
            echo '<h1 class="ltext-106 cl5 my-5">Invoice Data</h1>
                  <div class="text-center">
                      <h1 class="ltext-202 cl2 p-t-19 p-b-43 respon1">There are no orders placed yet.</h1>
                      <a href="index.php" class="btn btn-primary">CONTINUE SHOPPING</a>
                  </div> <br><br><br><br>';
				  
        }
    }

    $id = $_SESSION['u_id'];  // Get the user ID
    ?>

    <div class="container">
        <br><br><br><br>

        <?php
        // Call the function to display orders or the no-orders message
        displayOrderMessage($id, $connection);
        ?>

    </div>

    <?php include("footer.php"); ?>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
