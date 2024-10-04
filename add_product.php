<?php
include("connection.php");

if (isset($_POST['products'])) {
    $p_image = $_FILES['p_img']['name'];
    $p_size = $_FILES['p_img']['size'];
    $p_temp_name = $_FILES['p_img']['tmp_name'];
    $p_type = pathinfo($p_image, PATHINFO_EXTENSION);
    $p_destination = "products/" . $p_image;

    if ($p_size <= 20000000) { 
        if ($p_type == "jpg" || $p_type == "jpeg" || $p_type == "png") { 
            if (move_uploaded_file($p_temp_name, $p_destination)) { 
                $pro_name  = $_POST['p_name'];
                $pro_price = $_POST['p_price'];
                $_pro_qty = $_POST['p_qty'];
                $_pro_cat = $_POST['p_category'];
                $_pro_cat1 = $_POST['p_category'];  // Get category input from form
                
                // Append .php to the category for p_category_link
                $category_link = $_pro_cat1 . ".php";

                $random_numbers = rand(5, 100000); 
                $random_number = rand(2, 100); 

                // Insert data into database, using the $category_link variable
                $query = "INSERT INTO products (product_number, product_code, p_img, p_name, p_price, p_qty, p_category, p_category_link) 
                          VALUES ('$random_numbers', '$random_number', '$p_image', '$pro_name', '$pro_price', '$_pro_qty', '$_pro_cat', '$category_link')";
                
                $result = mysqli_query($connection, $query);

                if ($result) {
                    echo "<script> 
                          alert('Product uploaded successfully');
                          location.assign('add_product_form.php');
                          </script>";
                } else {
                    echo "<script> 
                          alert('Product not uploaded');
                          location.assign('add_product_form.php');
                          </script>";
                }

            } else {
                echo "<script> 
                      alert('Failed to upload the image. Please try again.');
                      </script>";
            }
        } else {
            echo "<script> 
                  alert('Only JPG, JPEG, or PNG formats are allowed');
                  </script>";
        }
    } else {
        echo "<script> 
              alert('File size exceeds the limit of 20MB');
              </script>";
    }
}

?>
