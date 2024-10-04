<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
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

	
	<!--===============================================================================================-->
	<style>
		/* .hei{
			height: 500px;

		} */
/* .gg{
	padding-top: 50px;
	padding-left: 50px;
	padding-right: 50px;
	padding-bottom: 50px;
} */
.flex-col-l-m {
    display: flex;
    flex-direction: column;  
    align-items: center;     
    justify-content: center; 
}

.layer-slick1 {
    margin-bottom: 20px;

};

.flex-col-l-m {
    display: flex;
    flex-direction: column;  
    align-items: center;      
}

.text-center {
    text-align: center;     
}

</style>

</head>
<?php
session_start();

// if(!isset($_SESSION['email']))
// {
// 	header("location:index.php");
// }

// echo $_SESSION['name'];
?>

<body class="animsition">



	<?php
	include("header.php");
	?>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1" 
                style="
                background-image: url(images/All_Products/banner/banner_3.jpg);  
                height: 100vh; /* Full viewport height */
                background-size: cover; /* Cover entire area while maintaining aspect ratio */
                background-position: center; /* Centers the image */
                background-repeat: no-repeat; /* Prevents the image from repeating */
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;">
                
                <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                        <span class="ltext-101 cl2 respon2">
                            Stationery That Makes a Statement
                        </span>
                    </div>
                    
                    <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            NEW SEASON
                        </h2>
                    </div>
                    
                    <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                        <a href="Stationary.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1" 
                style="
                background-image: url(images/All_Products/banner/banner_2.jpg);  
                height: 100vh; /* Full viewport height */
                background-size: cover; /* Cover entire area while maintaining aspect ratio */
                background-position: center; /* Centers the image */
                background-repeat: no-repeat; /* Prevents the image from repeating */
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;">
                
                <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                        <span class="ltext-101 cl2 respon2">
                            Unleash Your Glow, Embrace
                        </span>
                    </div>
                    
                    <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            Your Beauty
                        </h2>
                    </div>
                    
                    <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                        <a href="Beauty_Products.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1" 
                style="
                background-image: url(images/All_Products/banner/banner_1.jpg);  
                height: 100vh; /* Full viewport height */
                background-size: cover; /* Cover entire area while maintaining aspect ratio */
                background-position: center; /* Centers the image */
                background-repeat: no-repeat; /* Prevents the image from repeating */
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;">
                
                <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                        <span class="ltext-101 cl2 respon2">
                            Color Your World, Define Your Beauty
                        </span>
                    </div>
                    
                    <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            NEW SEASON
                        </h2>
                    </div>
                    
                    <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                        <a href="Stationary.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


	<!-- Banner -->


	<div class="sec-banner bg0 p-t-80 p-b-50">

	<?php
	include("connection.php");

	// Query to fetch categories from the database
	$query = "select * from categaries";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0) {
	?>
		<div class="container">
			<div class="row">
				<?php
				// Initialize counter for categories displayed
				$category_count = 0;

				while ($rows = mysqli_fetch_assoc($result)) {
					// Limit the number of displayed categories to 3
					if ($category_count < 3) {
				?>
					<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
						<!-- Block1 -->
						<div class="block1 wrap-pic-w">
							<img src="../admin_panel/category/<?php echo $rows['c_image'] ?>" alt="IMG-BANNER">

							<!-- Use the link stored in the database for each category -->
							<a href="<?php echo $rows['c_link'] ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
								<div class="block1-txt-child1 flex-col-l">
									<span class="block1-name ltext-102 trans-04 p-b-8">
										<?php echo $rows['c_name'] ?>
									</span>
									<span class="block1-info stext-102 trans-04">
										New Arrive
									</span>
								</div>

								<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl0 trans-09">
										Shop Now
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php
					}
					// Increment the counter after each category is displayed
					$category_count++;
				}
				?>
			</div>
		</div>
	<?php
	}
	?>
</div>
<section class="sec-relate-product bg0 p-t-10 p-b-105">

		<?php
		include("connection.php");
		?>

		<!-- Product -->
	

			<div class="container">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5">
					Latest Product
					</h3>
				</div>



				<br><br><br><br>
				
				
	<?php
include("connection.php");

// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);

// Query to get products for the current category
$query = "SELECT * FROM products WHERE p_category_link = '$current_page'";

$result = mysqli_query($connection, $query);
?>


            <div class="row isotope-grid">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                            <!-- Block2 -->
                            <div class="block2 ">
                                <div class="block2-pic hov-img0 ">

                                    <img src="../admin_panel/products/<?php echo $rows['p_img'] ?>" alt="IMG-PRODUCT" style="height:350px;">

                                    <a href="product_detail.php?product_detail_id=<?php echo $rows['p_id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                        View Product
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <h6><?php echo $rows['p_name']; ?></h6>
                                        </a>

                                        <span class="stext-105 cl3">
                                            <p><?php echo $rows['p_price']; ?></p>
                                        </span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No products found for this category.</p>";
                }
                ?>
				

				
            </div>

       
</section>

	  <?php
include("footer.php")
 ?>
	


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