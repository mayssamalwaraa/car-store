<?php
 include('../config/constants.php');

// echo "success delete ";
if (isset($_GET['id']) AND isset($_GET['image_name'])){
    //get the value 

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

  

    if($image_name != ""){


    //remove the image :
    //1.the path of image .
    $path="../images/category/".$image_name;
    //2.remove
    $remove =unlink($path);

        

        if ($remove == false){
            //redirect to manage category page 
            $_SESSION['remove']="<div class ='error'>failed to remove </div>";
            header('location:'.SITEURL."admin/manage-category.php");
            die();

        }


    }
    //delete the data from database 
    //query

    $sql = "DELETE FROM category WHERE id =$id";

    //execut 

    $res = mysqli_query($conn ,$sql);

    //check 
    if($res == true){
        $_SESSION['delete-category']="<div class ='success'>success to delete </div>";
            header('location:'.SITEURL."admin/manage-category.php");

    }else{
        $_SESSION['delete-category']="<div class ='error'>failed to delete </div>";
            header('location:'.SITEURL."admin/manage-category.php");
    }



}else{
    //redirect to manage page
    header('location:'.SITEURL."admin/manage-page.php");

}

?>