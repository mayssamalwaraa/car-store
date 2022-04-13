<?php include('../config/constants.php');?>
<html>
    <head>
        <title>log-in car-show system </title>
        <link rel="stylesheet" href="../CSS/admin.css">

    </head>
    <body>

        <div class="login">
            <a href="admin-log-in.php">login as admin</a>
            <a href="log-in.php">login as a customer</a>
            <a href="index.html">Home</a>
            <h1 class="text-center" >Login</h1>
            <br><br>
            <?php
            if(isset($_SESSION['log-in'])){
                echo $_SESSION['log-in'];
                unset($_SESSION['log-in']);
            }
            if(isset($_SESSION['no-user-log'])){
                echo $_SESSION['no-user-log'];
                unset($_SESSION['no-user-log']);
            }
            ?>
            <br><br>
            <!--login start -->
            <form action="" method="POST" class="text-center">
                <label for="" class="bold">User name :</label><br><br>
                <input type="text" name="user_name" placeholder="Enter user name :"><br><br>
                <label for="" class="bold">password :</label><br><br>
                <input type="password" name="password" placeholder="Enter password :"><br><br>
                <input type="submit" name="log-in" value="log-in" class="btn-primary"><br>
                
            </form>
             <!--login end  -->
        </div>
        <?php
        if (isset($_POST['log-in'])){
            //1.get the data admin from the form

            $user_name = $_POST['user_name'];
            $password  = md5($_POST['password']);

            //2.sql query to check  wether the admin is exsits or not 

            $sql = "SELECT * FROM admin WHERE user_name='$user_name' AND password = '$password'";

            //3.Execut the query 

            $res = mysqli_query($conn , $sql );

            //the admin is exsits when the sql query return one row 

            $count = mysqli_num_rows($res);

            if($count == 1 ){
                //avaible go to home setting page 
                $_SESSION['log-in']="<div class='success'>success log-in </div>";
                $_SESSION['user'] = $user_name;//to check if the user is log in or not
                header("Location:manage-admin.php");

            }else{
                //not avaiable ==> stay in the same page
                $_SESSION['log-in']="<div class=' error text-center '>failed to  log-in </div>";
                //header('location:admin/log-in.php);

            }
        }
        ?>

        
    </body>
</html>