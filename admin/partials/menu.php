<?php
 include('../config/constants.php');
 //to display in all the pages 
 include('check-log.php');
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin_dashboard</title>
    <link rel="stylesheet" href="../CSS/admin.css">
    
  </head>
  <body>
    <input type="checkbox" id="check" >
    <!--head menu start -->
    <header>
      <label for="check"    >
        <img src="../images/icon/category.png" alt="" width="20px" id="sidebar" >
      </label>
      <div class="left_area">
        <h3> <span>Admin </span>Dashboard</h3>

      </div>
      <div class="right_area">
        <a href="log-out.php" class="logout_button"> logout  <img src="../images/icon/logout.png" alt="" width="20%" > </a>


      </div>


    </header>


    <!--head menu end -->
    <!--sidebar start -->
    <div class="sidebar">
      
        <img src="../images/icon/admin.png" class="profile" alt="" width="250px">
      
      <h3 class="word_admin">Admin</h3>
      <a href="index.php"> <img src="../images/icon/home.png" width="11%" ><span class="padding ">Home</span></a>
      <a href="manage-user.php"> <img src="../images/icon/user.png" width="11%" ><span class="padding">Manage User</span></a>
      <a href="manage-category.php"> <img src="../images/icon/category.png" width="11%" ><span class="padding">Manage Category</span></a>
      <a href="manage-car.php"> <img src="../images/icon/car.png" width="11%" ><span class="padding">Manage Car</span></a>
      <a href="manage-order.php"> <img src="../images/icon/order.png" width="11%" ><span class="padding">Manage Order</span></a>
      <a href="manage-admin.php"> <img src="../images/icon/admin.png" width="11%" ><span class="padding">setting</span></a>



    </div>

    <!--sidebar end -->




  </body>
</html>
