<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
    ?>

    <form action="code.php" method="POST">
        <input type="hidden" name="p_id">
    </form>

    <?php
    include("connection.php");

    $id = $_SESSION['u_id'];
    
    $query = "SELECT products.p_name, products.p_img, products.p_price, card.*
              FROM products 
              JOIN card ON card.product_id = products.p_id
              WHERE card.user_id = '$id'";
    $grandTotal  = 0;
    
    $result = mysqli_query($connection, $query);
    ?>

    <div class="container">
        <br><br><br><br><br><br><br>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <td>Product Image</td>
                        <td>Product Name</td>
                        <td>Product Price</td>
                        <td>Product Qty</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $total = $rows['p_price'] * $rows['product_qty'];
                        $grandTotal += $total;
                    ?>
                        <tr>
                            <td>
                                <img src="../admin_panel/products/<?php echo $rows['p_img']?>" alt="" style="height:100px;">
                            </td>
                            <td><?php echo $rows['p_name']; ?></td>		
                            <td><?php echo $rows['p_price']; ?></td>		
                            <td>
                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="<?php echo $rows['product_qty']; ?>">
                            </td>
                            <td>
                                <a href="delete.php?deleteid=<?php echo $rows['card_id']; ?>" class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="col-sm-10 col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">Cart Totals</h4>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">Total:</span>
                        </div>
                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2"><?php echo $grandTotal; ?></span>
                        </div>
                    </div>
                    <form action="code.php" method="POST">
                        <input type="hidden" name="p_id" value="<?php echo $rows['p_id']?>">
                        <input type="hidden" name="statuss" value="<?php echo $rows['status']?>">
                        <input class="mtext-104 cl3 txt-center num-product" type="hidden" name="num-product" value="1">
                        <br>
                        
                    </form>
					<button onclick="lo()" type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15">
                            Checkout
                        </button>
                </div>
            </div>
        <?php else: ?>
            <!-- Display this section if the cart is empty -->
            <div class="text-center">
                <h2 class="ltext-202 cl2 p-t-19 p-b-43 respon1">There are no items in this cart</h2>
                <a href="index.php" class="btn btn-primary">CONTINUE SHOPPING</a>
            </div>
        <?php endif; ?>
    </div>
<br><br><br><br><br><br><br><br>
    <?php 
    include("footer.php");
    ?>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <script>
    function lo() {
        location.replace("checkout.php");
    }
    </script>
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
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>
