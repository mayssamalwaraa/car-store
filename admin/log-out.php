<?php
//for SITEURL 
 include('../config/constants.php');
//1.destroy the seesion 
session_destroy();//unset for session['user']

//2.redirect to log in page 
header('location:'.SITEURL."admin/log-in.php");


?>