<?php include('config/constants.php');?>
<?php
if(isset($_GET['id_u'])){
    $id_u=$_GET['id_u'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="car show for a new car ">
    <link rel="stylesheet" href="CSS/master.css">
    
    <!-- <link rel="stylesheet" href="CSS/login.css"> -->
    <title>Car_show</title>
</head>
<body>
    <!-- navgation  start -->
    <nav>
        <div class="container">
            <div class="logo">
                <img src="images/mess.png" alt="" class="image-responsive">

            </div>
            <div class="main_menu">
                <ul>
                    <li> <a href="<?php echo SITEURL;?>syria_car.php?id_u=<?php echo $id_u;?>">Home |</a></li>
                    <li> <a href="<?php echo SITEURL;?>categories.php?id_u=<?php echo $id_u;?>">Categories |</a></li>
                    <li><a href="<?php echo SITEURL;?>the_show.php?id_u=<?php echo $id_u;?>">Cars |</a></li>
                    <li> <a href="<?php echo SITEURL;?>my_order.php?id_u=<?php echo $id_u;?>">MY Order |</a></li>
                    
                </ul>

            </div>
            <div class="logg">
                <a href="<?php echo SITEURL;?>Users/log-out.php" class="login_button">log-out</a>

            </div>
            <div class="clear">

            </div>

        </div>

    </nav>

    <!-- navgation  end -->