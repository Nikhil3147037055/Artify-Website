<?php

include("connection.php");

$id = $_GET['deleteid'];

$query = "DELETE FROM products WHERE p_id = '$id'";

if(mysqli_query($connection,$query))
{
   echo "<script>
   alert('Delete data Successfully')
    location.assign('veiw_product.php')
   </script>";
}

else
{
    echo "<script>
    alert('Not a data Delete')
     location.assign('veiw_categaries_tables.php')
    </script>";  
}


?>