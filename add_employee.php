<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
include('header.php');

?>


<div style="margin-top:10%;" class="container" >
  <div class="form-container border rounded p-4 bg-light shadow-sm">
    <h2>Add New Employee</h2>
    <form action="add_emp_code.php" method="post">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Name :</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Empolye name" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Empolye email " required>
        </div>
      </div>
        <div class="row mb-3">
        <div class="col-md-6">
          <label for="password" class="form-label">Password:</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Empolye password" required>
        </div>
</div>
      

      <div class="row mb-3">
      <div class="col-md-6">
        <div class="col-md-6">
        <label for="role">Role:</label>
        <select id="role" name="role" class="form-select" required>
        <option value="" selected disabled >Select Roll</option>    
        <option value="Empolye">Empolye</option>
        </select>
        </div>
        </div>
      
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success" name="add">Add Empolye</button>
      </div>
    </form>
  </div>
</div>



<?php
include('footer.php');
?>
</body>
</html>