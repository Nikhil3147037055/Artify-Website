
<?php

session_start();
include("connection.php");


if (isset($_POST["add"])) {


    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST ["role"];
 

    $query = "insert into register(name,email,password,roll) values ('$name','$email','$password',' $role')";

    if (mysqli_query($connection, $query)) {
       
        echo "<script> 
    alert('Register Data Successfully')
    location.assign('add_employee.php')
    </script>";
    } else {
      
        echo "<script> 
    alert('something went wrong')
    location.assign('add_employee.php')
    </script>";
    }















}


?>