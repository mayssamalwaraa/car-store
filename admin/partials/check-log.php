<?php
//access control 
// for SITEURL we will not include the file constants.php because we include this file(check-login ) in menu.php and the constant.php is included in the menu.php 

// to not access to the index.php file from the url without log-in 

if(!isset($_SESSION['user'])){
    //not a user but a hacker 

    $_SESSION['no-user-log']="<div class = 'error'> not a user log-in </div>";
    header('location:'.SITEURL."admin/log-in.php");
}

?>