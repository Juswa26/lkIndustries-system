<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    session_start();
    include("../../includes/db.php");
    
    if(isset($_POST['upload']))
    {
       
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="../uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

         echo "ProductName: $ProductName<br>";
        echo "desc: $desc<br>";
        echo "price: $price<br>";
        echo "category: $category<br>";
        echo "name: $name<br>";
        echo "temp: $temp<br>";
        echo "image: $image<br>";
        echo "finalImage: $finalImage<br>";

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($con,"INSERT INTO product
         (cpart_name,cpart_img,cpart_price,cpart_desc,cat_code) 
         VALUES ('$ProductName','$image',$price,'$desc','$category')");
 
         if(!$insert)
         {
             echo mysqli_error($con);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>