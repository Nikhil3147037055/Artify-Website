<?php

include("connection.php");

$id = $_GET['orderid'];

$query = "DELETE FROM orders WHERE order_id = '$id'";

if(mysqli_query($connection,$query))
{
   echo "<script>
   alert('Order Cancle Successfully')
    location.assign('card_info.php')
   </script>";
}

else
{
    echo "<script>
    alert('Not a Order Cancle')
     location.assign('card_info.php')
    </script>";  
}



?>