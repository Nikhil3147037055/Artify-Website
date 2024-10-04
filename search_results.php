<?php
include "connection.php";


$products = [];


if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($connection, $_GET['search']);
    
  
    $query = "SELECT p_name, p_img, p_price FROM products WHERE p_name LIKE '%$searchTerm%'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           
            $row['p_img'] = '../admin_panel/products/' . $row['p_img'];
            $products[] = $row; 
        }
    }

  
    echo json_encode($products);
} else {
  
    echo json_encode([]);
}
?>
