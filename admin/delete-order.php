<?php
 include('../config/constants.php');

// echo "success delete ";
if (isset($_GET['id']) ){
    //get the value 

    $id = $_GET['id'];


    //query

    $sql = "DELETE FROM order WHERE id =$id";

    //execut 

    $res = mysqli_query($conn ,$sql);

    //check 
    if($res == true){
        $_SESSION['delete-category']="<div class ='success'>success to delete </div>";
            header('location:'.SITEURL."admin/manage-order.php");

    }else{
        $_SESSION['delete-category']="<div class ='error'>failed to delete </div>";
            header('location:'.SITEURL."admin/manage-order.php");
    }



}else{
    //redirect to manage page
    header('location:'.SITEURL."admin/manage-page.php");

}

?>