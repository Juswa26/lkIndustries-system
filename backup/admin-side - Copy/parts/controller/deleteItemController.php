<?php

   session_start();
    include("../../includes/db.php");
    
    $p_id=$_POST['record'];
    $query="DELETE FROM car_parts where cpart_id='$p_id'";

    $data=mysqli_query($con,$query);

    if($data){
        echo"Product Item Deletion Successful";
    }
    else{
        echo"Not able to delete";
    }
    
?>