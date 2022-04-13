<?php include('../config/constants.php');?>
<html>
    <head>
        <title>log-in car-show system </title>
        <!-- <link rel="stylesheet" href="../CSS/admin.css"> -->
        <link rel="stylesheet" href="../CSS/login.css">

    </head>
    <body>
        <div class="login">
            
            <!--login start -->
            <div class="center">
      <h1>Login</h1>
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
      <form  method="post">
        <div class="txt_field">
          <input type="text" name="user_name" required>
          <span></span>
          <label>User name</label>

        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>

        </div>
        <input type="submit" name="log-in"  value="Login">
        

      </form>

    </div>
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
                header('location:'.SITEURL."admin/");

            }else{
                //not avaiable ==> stay in the same page
                $_SESSION['log-in']="<div class=' error text-center '>failed to  log-in </div>";
                header('location:'.SITEURL."admin/log-in.php");

            }
        }
        ?>

        
    </body>
</html>