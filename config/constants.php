<?php

//start session
session_start();


//create a constant to store non repeating values (the value is the same in multi pages not different)
//constants define as uppercase define('CONSTANT','value')
//when we change the value we change it only here . 
define('SITEURL','http://localhost/car-show/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','car-show');

//3.Execut Query and save data in database
        //true query       false query   
        //database connection $conn    
    // $conn = mysqli_connect('localhost','username','password') or die(my_sqli_error());
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(my_sqli_error());

    // $db_select =mysqli_select_db($conn,'DBNAME') or die(my_sqli_error()); //selecting the Database
    $db_select =mysqli_select_db($conn,DB_NAME) or die(my_sqli_error());
?>