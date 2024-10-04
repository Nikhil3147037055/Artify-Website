
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<form action="../website/code.php" method="POST">
	<input type="hidden" name="p_id" style="color:black;">

<?php
        include("header.php");

        include("connection.php");

        //$id = $_SESSION['u_id'];

        $query = "SELECT `products`.`p_name`,`products`.`p_img`,`products`.`p_qty`,`products`.`p_price`,`card`.*
FROM `products` 
	JOIN `card` ON `card`.`product_id` = `products`.`p_id`";    
    $grandtotal= 0;

       $result = mysqli_query($connection,$query);

       if(mysqli_num_rows($result) > 0)
       {
         
       

?>
<div class="container">
        <h1 class="text-center my-5">Veiw Cards</h1>
`
    <table class="table table-bordered text-center">        
        <thead>
            <td>User id</td>
            <td>Product Image</td>
            <td>Product Name</td>
            <td>Product Qty</td>
            <td>Product Price</td>
            <td>Total</td>
            <td colspan="2">Action</td>
        </thead>
        
        <tbody>

        <?php
        $total= 0;
          while($rows = mysqli_fetch_assoc($result))
          {

            $total = $rows['p_price'] * $rows['p_qty'];

            $grandtotal += $total;
          
        ?>
            <tr>
            <td><?php echo $rows['user_id']; ?></td>
            
            <td> 
             <img style="width:150px; height:100px;" src="products/<?php echo $rows['p_img']; ?>" alt="">
            </td>
        <td>
            <?php echo $rows['p_name']; ?>
        </td>
        <td>
            <?php echo $rows['product_qty']; ?>
        </td>

        <td>
            <?php echo $rows['p_price']; ?>
        </td>

        <td>
            <?php echo $grandtotal; ?>
        </td>
            

            <td>
                <a href='card_update.php?id=<?php echo $rows['card_id']; ?>' class="btn btn-success">UPDATE</a>
            
                
            
                <a href="card_delete.php?deleteid=<?php echo $rows['card_id']; ?>" class="btn btn-danger">DELETE</a>
            </td>

            </tr>
      
   
        </tbody>
<?php
          }
?>
    </table>
</div>
</form>
<?php
       }  
?>
    <?php
    include("footer.php")
    ?>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>