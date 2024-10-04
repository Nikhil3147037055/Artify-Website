<?php
 session_start();
include("connection.php");

if(isset($_POST['categaries']))
{

   $c_file =  $_FILES['cat_file']['name'];
   $c_size =  $_FILES['cat_file']['size'];
   $c_tmp_name = $_FILES['cat_file']['tmp_name'];
   $c_type = pathinfo($c_file,PATHINFO_EXTENSION);
   $c_destination = "category/".$c_file;
   

   if($c_size <= 2000000){

      if($c_type == "jpg" || $c_type == "jpeg" || $c_type == "png")
      {
            
            //Move File TO Destination
            if(move_uploaded_file($c_tmp_name,$c_destination))
            {
                  
               $c_name = $_POST['cat_name'];
               $query = mysqli_query($connection,"INSERT INTO categaries (c_name,c_image)VALUES('$c_name','$c_file')");

               if($query){
                  echo "<script>
                     alert('Category Added Successfully')
                     location.assign('add_catagaries_form.php')  
                  </script>";      
                  }
               }
            }else{
               echo "<script>
            alert('Failed To Upload')
            location.assign('add_catagaries_form.php')  
           </script>";      
            }
      }
      
      else{
         echo "<script>
           alert('Please Upload Less Than 2MB Image')
            location.assign('add_catagaries_form.php')  
           </script>";   
      }
    }
    
    //else{
   //    echo "<script>
   //         alert('Please Upload Less Than 2MB Image')
   //         location.assign('add_catagaries_form.php') 
   //         </script>";
   // }

?>