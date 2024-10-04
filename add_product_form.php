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
?>

<div class="container">
<form action="add_product.php" method="post" enctype="multipart/form-data">
    <h1 class="text-center my-5">Add Product Form</h1>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Product Name" name="p_name">
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Product image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Category Name" name="p_img">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Price" name="p_price">
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Product QTY</label>
    <input type="number"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Qty" name="p_qty">
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Category</label>
    <?php
    include("connection.php");
    
        $query = "select * from categaries";

        $result = mysqli_query($connection,$query);

        if(mysqli_num_rows($result))
        {

      ?>
    <select name="p_category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php
         while($rows = mysqli_fetch_assoc($result))
       {

       
    ?>
    <option value="<?php echo $rows['c_name']?>"><?php echo $rows['c_name']?></option>
<?php

}
    ?>
    </select>
<?php
        }
  ?>
  </div>

    <div class="container">
    <button type="submit" class="btn btn-primary w-25" name="products">Add Products</button>
  </div>
</form>
</div>
<?php


include("footer.php");
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>