<?php

include('../config/constants.php');
//1. get the id of admin to delete admin 

// we pass the id in url and we will get the id by $_GET

$id = $_GET['id'];



//2.Sql query that delete admin 

$sql = " DELETE FROM users WHERE id = $id";

//Execute the query 

$res = mysqli_query($conn , $sql);

//check the execute 

if($res == true ){

    // echo "success";
    //great the seesion  to  display the message 
    $_SESSION['delete'] = "<div class='success'>success delete</div> ";
    //header to redirect to manage page
    header('location:'.SITEURL.'admin/usermanage.php');

}else{

    // echo "failed ";
    //great the seesion  to  display the message 
    $_SESSION['delete'] = "failed to  delete , try again .  ";
    //header to redirect to manage page
    header('location:'.SITEURL.'admin/usermanage.php');


}

//3.redirect to manage page with message (success ).
?>