<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<?php
        include("header.php");

        include("connection.php");

        $query = "select * from products";

       $result = mysqli_query($connection,$query);

       if(mysqli_num_rows($result) > 0)
       {
         
       

?>
<div class="container">
        <h1 class="text-center my-5">Veiw Products Data</h1>

    <table class="table table-bordered text-center">
        
        <thead>
        <td>Product_ID</td>
            <td>Product_Image</td>
            <td>Product_Name</td>
            <td>Product_Price</td>
            <td>Product_Qty</td>
            <td>Product_Category</td>
            <td>Product_Number</td>
            <td>Product_Code</td>
            <td colspan="2"></td>
        </thead>
        
        <tbody>

        <?php
          while($rows = mysqli_fetch_assoc($result))
          {

          
        ?>
            <tr>
            <td><?php echo $rows['p_id']; ?></td>
            <td>
            <img style="width:150px; height:100px;" src="products/<?php echo $rows['p_img']; ?>" alt="">

            </td>
            <td><?php echo $rows['p_name']; ?></td>
            <td><?php echo $rows['p_price']; ?></td>
            <td><?php echo $rows['p_qty']; ?></td>
            <td><?php echo $rows['p_category']; ?></td>
            <td><?php echo $rows['product_number']; ?></td>
            <td><?php echo $rows['product_code']; ?></td>



            <td>
                
                <a href="product_delete.php?deleteid=<?php echo $rows['p_id']; ?>" class="btn btn-danger">DELETE</a>
            </td>

            </tr>
      
   
        </tbody>
<?php
          }
?>
    </table>
</div>
<?php
       }  
?>
    <?php
    include("footer.php")
    ?>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>