<?php
include('../config/constants.php');
// echo "delete page";
//1.get the id of car 
if(isset($_GET['id'] ) && isset($_GET['image1']) && isset($_GET['image2']) && isset($_GET['image3'])){
    //get the id and image_name
    $id=$_GET['id'];
    $image1=$_GET['image1'];
    $image2=$_GET['image2'];
    $image3=$_GET['image3'];
    // echo $image_name;
    // 2.remove the image
    if($image1 != ""){
        //path of the image 
        $path="../images/detalis/".$image1;
        //remove
        $remove=unlink($path);
        //check
        if($remove==false){
            $_SESSION['remove_image_car']="<div class = 'error'>failed to remove image car</div>";
             header('location:'.SITEURL."admin/manage-detalis-car.php");
            die();

        }


    }
    if($image2 != ""){
        //path of the image 
        $path="../images/detalis/".$image2;
        //remove
        $remove=unlink($path);
        //check
        if($remove==false){
            $_SESSION['remove_image_car']="<div class = 'error'>failed to remove image car</div>";
             header('location:'.SITEURL."admin/manage-detalis-car.php");
            die();

        }


    }
    if($image3 != ""){
        //path of the image 
        $path="../images/detalis/".$image3;
        //remove
        $remove=unlink($path);
        //check
        if($remove==false){
            $_SESSION['remove_image_car']="<div class = 'error'>failed to remove image car</div>";
             header('location:'.SITEURL."admin/manage-detalis-car.php");
            die();

        }


    }
    //3.sql query to delete a car from database
    $sql="DELETE FROM detalis WHERE id='$id'";

    //EXecut
    $res=mysqli_query($conn , $sql);

    //4.redirect to car page
    if($res == true){
        //success 
        $_SESSION['delete_detalis']="<div class = 'success'>success to delete</div>";
        header('location:'.SITEURL."admin/manage-details-car.php");


    }else{
        //failed 
        $_SESSION['delete_detalis']="<div class = 'error'>failed to delete car</div>";
        header('location:'.SITEURL."admin/manage-details-car.php");
        

    }



}else{
    //redirect to manage-car page
    $_SESSION['delete_car']="<div class = 'error'>failed to delete</div>";
    header('location:'.SITEURL."/admin/manage-car.php");

}

?>