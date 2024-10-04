<?php 
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <style>
 
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: auto;
        }
        .product-card h2 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-card p {
            font-size: 16px;
            color: #555;
        }
        /* Styling for the search results dropdown */
        .search-results {
            background-color: white;
            border: 1px solid #ccc;
            max-height: 300px;
            overflow-y: auto;
            position: absolute;
            width: 100%;
            z-index: 1000;
        }
        .search-results .product-card {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
        }
        .search-results img {
            width: 50px;
            margin-right: 10px;
        }
        .search-results .product-name {
            font-size: 16px;
        }
    </style>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
    <!-- Header -->
    <header>
        <div class="container-menu-desktop">
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over Rs:5000
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <?php 
                        if(isset($_SESSION['name'])) {
                            ?>
                            <a href="logout.php" class="flex-c-m trans-04 p-lr-25">Logout</a>
                            <?php 
                        } else {
                            ?>
                            <a href="register.php" class="flex-c-m trans-04 p-lr-25">Create Account</a>
                            <a href="login.php" class="flex-c-m trans-04 p-lr-25">Login</a>
                            <?php 
                        }
                        ?>
                        <a href="index.php" class="flex-c-m trans-04 p-lr-25">
                            <?php echo "Hi " . $_SESSION['name']?>
                        </a>
                        <a href="card_info.php" class="flex-c-m trans-04 p-lr-25">My Orders</a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop ">
                <nav class="limiter-menu-desktop container">
                    <!-- Logo desktop -->        
                    <a href="index.php" class="logo" style="height: 270%;">
                        <img src="images/logo.png" alt="IMG-LOGO" >
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about_us.php">About</a></li>
                            <li><a href="contact_us.php">Contact</a></li>
                            <li class="active-menu label1" data-label1="hot">
                                <a href="index.php">Category</a>
                                <ul class="sub-menu">
                                    <li><a href="Stationary.php">Stationary</a></li>
                                    <li><a href="Greeting_card.php">Greeting Cards</a></li>
                                    <li><a href="Dolls.php">Dolls</a></li>
                                    <li><a href="Hand_Bags.php">Hand Bags</a></li>
                                    <li><a href="Wallests.php">Wallests</a></li>
                                    <li><a href="Beauty_Products.php">Beauty Products</a></li>
                                </ul>
                            </li>
                            <li><a href="feedback.php">Feedback</a></li>
                            <li><a href="faq.php">Help & FAQs</a></li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        <?php
                        $id = $_SESSION['u_id'];
                        ?>
                        <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" onclick="card()" data-notify="
                        <?php 
                        $query= mysqli_query($connection, "select count(user_id) AS count from card where user_id = '$id'");
                        $convert = mysqli_fetch_array($query);
                        echo $convert['count'];
                        ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Search Modal -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <!-- Search Form -->
                <form class="wrap-search-header flex-w p-l-15" id="search-form" action="index.php" method="GET">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" id="search-input" placeholder="Search..." autocomplete="off">
                </form>

                <!-- Search Results Dropdown -->
                <div class="search-results" id="search-results"></div>
            </div>
        </div>
       <script>
        function card()
        {
            location.replace("card_table.php")
        }
       </script>

        <script>
            document.getElementById('search-input').addEventListener('input', function() {
                var query = this.value;

                if (query.length > 0) {
                    // Make an AJAX request to search_results.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'search_results.php?search=' + query, true);
                    xhr.onload = function() {
                        if (this.status === 200) {
                            var results = JSON.parse(this.responseText);
                            var output = '';

                            if (results.length > 0) {
                                results.forEach(function(product) {
                                    output += `
                                        <div class="product-card">
                                            <img src="../admin_panel/products/${product.p_img}" alt="${product.p_name}">
                                            <div>
                                                <p class="product-name">${product.p_name}</p>
                                                <p>Price: Rs ${product.p_price}</p>
                                            </div>
                                        </div>
                                    `;
                                });
                            } else {
                                output = '<p>No products found.</p>';
                            }

                            document.getElementById('search-results').innerHTML = output;
                        }
                    };
                    xhr.send();
                } else {
                    document.getElementById('search-results').innerHTML = '';
                }
            });
        </script>
    </header>

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
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/slick/slick.min.js"></script>
		<script src="js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/parallax100/parallax100.js"></script>
		<script>
			$('.parallax100').parallax100();
		</script>
		<!--===============================================================================================-->
		<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
		<script>
			$('.gallery-lb').each(function() { // the containers for all your galleries
				$(this).magnificPopup({
					delegate: 'a', // the selector for gallery item
					type: 'image',
					gallery: {
						enabled: true
					},
					mainClass: 'mfp-fade'
				});
			});
		</script>
		<!--===============================================================================================-->
		<script src="vendor/isotope/isotope.pkgd.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/sweetalert/sweetalert.min.js"></script>
		<script>
			$('.js-addwish-b2').on('click', function(e) {
				e.preventDefault();
			});

			$('.js-addwish-b2').each(function() {
				var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
				$(this).on('click', function() {
					swal(nameProduct, "is added to wishlist !", "success");

					$(this).addClass('js-addedwish-b2');
					$(this).off('click');
				});
			});

			$('.js-addwish-detail').each(function() {
				var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

				$(this).on('click', function() {
					swal(nameProduct, "is added to wishlist !", "success");

					$(this).addClass('js-addedwish-detail');
					$(this).off('click');
				});
			});

			/*---------------------------------------------*/

			$('.js-addcart-detail').each(function() {
				var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
				$(this).on('click', function() {
					swal(nameProduct, "is added to cart !", "success");
				});
			});
		</script>
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
