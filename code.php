    <?php

    session_start();

    include("connection.php");

    if (isset($_POST['register'])) {

      $username = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];


      $query = "INSERT INTO register(name,email,password,roll) VALUES ('$username','$email','$password','user')";

      if (mysqli_query($connection, $query)) {
        echo "<script> 
            alert('Register data Successfully')
            location.assign('login.php')
          </script>";
      } else {
        echo "<script> 
    alert('Not a  Register')
    location.assign('register.php')
  </script>";
      }
    }


    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      $query = "SELECT * FROM register WHERE email = '$email' and password = '$password'";
  
      if ($run = mysqli_query($connection, $query)) {
  
          $converted = mysqli_fetch_assoc($run);
  
          $_SESSION['name'] = $converted['name'];
          $_SESSION['email'] = $converted['email'];
          
          if ($converted['roll'] == "admin") {
              echo "<script>
                      alert('Admin Login successfully');
                      location.assign('../admin_panel/admin_panel.php');
                    </script>";
          } elseif ($converted['roll'] == " Empolye") {
             
              echo "<script>
                      alert('Employee Login successfully');
                      location.assign('../empoly_panel/empoly_panel.php');
                    </script>";
          } else {
              $_SESSION['u_id'] = $converted['id'];
              echo "<script>
                      alert('User Login successfully');
                      location.assign('index.php');
                    </script>";
          }
      } else {
          echo "<script>
                  alert('Login failed');
                  location.assign('register.php');
                </script>";
      }
  }
  


    if (isset($_POST['AddtoCard'])) {
      $u_id = $_SESSION['u_id'];
      $p_id = $_POST['p_id'];
      $p_qty = $_POST['num-product'];


      $query = "INSERT INTO  card (user_id,product_id,product_qty) Value ('$u_id','$p_id','$p_qty')";

      if (mysqli_query($connection, $query)) {
        echo "<script>
       alert('card data successfully added')
       location.assign('card_table.php')
       </script>";
      } else {
        echo "<script>
   alert('Not a data added')
   location.assign('card_table.php')
   </script>";
      }
    }




    
    if (isset($_POST['checkout'])) {
      $u_id = $_SESSION['u_id'];
      $p_id = $_POST['p_id'];
      $p_qty = $_POST['p_qty'];
      $random_number = rand(8, 100000000);
      $random_numbers = rand(16, 10000000000000000);


      $query = "select * from card where user_id = '$u_id'";

      $result = mysqli_query($connection, $query);

      if (mysqli_num_rows($result) > 0) {

        while ($converted = mysqli_fetch_assoc($result)) {
          $res = mysqli_query($connection, "INSERT INTO orders (order_number,unique_order_number,user_id,product_id,product_qty) Value ('$random_number','$random_numbers','$u_id','" . $converted['product_id'] . "','" . $converted['product_qty'] . "')");
        }

        echo "<script>
      alert('Order Added Successfully')
      location.assign('card_info.php')
     </script>";
      } else {
        echo "<script>
      alert('try again')
      location.assign('checkout.php')
     </script>";
      }
    }

  

    if (isset($_POST['update_status'])) {
      $u_id = $_POST['user_id'];
      $p_id = $_POST['p_id'];
       $status = $_POST['status'];

       $query = "UPDATE orders SET status = '$status' WHERE product_id = '$p_id';";
      $result = mysqli_query($connection,$query);
      if ($result) {
        echo "<script>
            alert('status upadte successfully')
           location.assign('../admin_panel/view_orders.php')
         </script>";
      }

      else
      {
        echo "<script>
        alert('try again')
        location.assign('../admin_panel/view_orders.php')
       </script>";
      }
    }

      if (isset($_POST['status_Update'])) {
      $u_id = $_POST['user_id'];
      $p_id = $_POST['p_id'];
       $status = $_POST['status'];

       $query = "UPDATE orders SET status = '$status' WHERE product_id = '$p_id';";
      $result = mysqli_query($connection,$query);
      if ($result) {
        echo "<script>
            alert('status upadte successfully by employe')
           location.assign('../empoly_panel/Delivery_report.php')
         </script>";
      }

      else
      {
        echo "<script>
        alert('try again by employe')
location.assign('../empoly_panel/Delivery_report.php')
       </script>";
      }

    }

    

    include "connection.php"; 
    
    if (isset($_GET['search'])) {
        $searchTerm = mysqli_real_escape_string($connection, $_GET['search']);
    
       
        $query = "SELECT DISTINCT p_name, p_img, p_price FROM products WHERE p_name LIKE '%$searchTerm%'";
        $result = mysqli_query($connection, $query);
    
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="product-grid">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-card">';
                echo '<img src="../admin_panel/products/' . $row['p_img'] . '" alt="' . $row['p_name'] . '" />';
                echo '<h2>' . $row['p_name'] . '</h2>';
                echo '<p>Price: Rs ' . $row['p_price'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>No products found matching your search.</p>';
        }
    }
    
    

    

    ?>