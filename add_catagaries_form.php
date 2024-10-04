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
<form action="add_categaries.php" method="post" enctype="multipart/form-data">
    <h1 class="text-center my-5">Add Categaries Form</h1>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Catagaries Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Category Name" name="cat_name">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Catagaries Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="catagaries image" name="cat_file">
  </div>
 
  
    <div class="container">
    <button type="submit" class="btn btn-primary w-25" name="categaries">Add Categaries</button>
  </div>
</form>
</div>
<?php

include("footer.php");
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>