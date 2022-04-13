<?php
include('../config/constants.php');
// echo "delete page";
//1.get the id of car 
if(isset($_GET['id'] ) && isset($_GET['image_name'])){
    //get the id and image_name
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    // echo $image_name;
    // 2.remove the image
    if($image_name != ""){
        //path of the image 
        $path="../images/car/".$image_name;
        //remove
        $remove=unlink($path);
        //check
        if($remove==false){
            $_SESSION['remove_image_car']="<div class = 'error'>failed to remove image car</div>";
             header('location:'.SITEURL."/admin/manage-car.php");
            die();

        }


    }
    //3.sql query to delete a car from database
    $sql="DELETE FROM tb_car WHERE id='$id'";

    //EXecut
    $res=mysqli_query($conn , $sql);

    //4.redirect to car page
    if($res == true){
        //success 
        $_SESSION['delete_car_success']="<div class = 'success'>success to delete</div>";
        header('location:'.SITEURL."/admin/manage-car.php");


    }else{
        //failed 
        $_SESSION['delete_car_failed']="<div class = 'error'>failed to delete car</div>";
        header('location:'.SITEURL."/admin/manage-car.php");
        

    }



}else{
    //redirect to manage-car page
    $_SESSION['delete_car']="<div class = 'error'>failed to delete</div>";
    header('location:'.SITEURL."/admin/manage-car.php");

}

?>