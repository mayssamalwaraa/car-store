<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/login.css">
    <title></title>
  </head>
  <body>
    <div class="center">
      <h1>Login SYRIA CAR</h1>
      <?php
      if(isset($_SESSION['add_user'])){
        echo $_SESSION['add_user'];//display session message all the time
        unset($_SESSION['add_user']);//remove session message 
    }
    if(isset($_SESSION['flog-in-user'])){
      echo $_SESSION['flog-in-user'];//display session message all the time
      unset($_SESSION['flog-in-user']);//remove session message 
  }
      ?>
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
        <input type="submit" name="login"  value="Login">
        <?php
        if (isset($_POST['login'])){
            //1.get the data admin from the form

            $user_name = $_POST['user_name'];
            $password  = md5($_POST['password']);

            //2.sql query to check  wether the admin is exsits or not 

            $sql = "SELECT * FROM userr WHERE user_name='$user_name' AND password = '$password'";

            //3.Execut the query 

            $res = mysqli_query($conn , $sql );

            //the admin is exsits when the sql query return one row 

            $count = mysqli_num_rows($res);

            if($count == 1 ){
              $rows2=mysqli_fetch_assoc($res);
              
              $id_u=$rows2['id'];
              
              
              ?>
              <?php
                //avaible go to home setting page 
                $_SESSION['slog-in-user']=" <div class=' success text-center paddingleft '>success to  log-in </div> ";
                // $_SESSION['user'] = $user_name;//to check if the user is log in or not
                header('location:'.SITEURL."syria_car.php?id_u=".$id_u);

            }else{
                //not avaiable ==> stay in the same page
                $_SESSION['flog-in-user']="<div class=' error text-center '>failed to  log-in </div>";
                header('location:'.SITEURL."index.php");

            }
        }
        ?>
        <div class="sing_up_link">
          Not a member? <a href="Users/add-user.php">singup</a>
          <br><br>

          OR <br> <br>Take a <a href="car_show_for_visitors.php">tour!</a> 

        </div>

      </form>

    </div>

  </body>
</html>
