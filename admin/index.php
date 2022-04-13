<?php include('partials/menu.php'); ?>

<div class="content">


    

    <!--main content start-->
    <div class="main-content">
        <div class="wrapper">
         <!-- <h1>DASHBORD</h1> -->
         <br><br>
         <?php
            if(isset($_SESSION['log-in'])){
                echo $_SESSION['log-in'];
                unset($_SESSION['log-in']);
            }
            ?>
            <br><br>

        </div>
         <div class="col-4 text-center">
            
            <?php
            $sql="SELECT * FROM userr";
            $res=mysqli_query($conn , $sql);
            $count=mysqli_num_rows($res)
            ?>
            <h1><?php echo $count;?></h1>
            <br>
            User 

        </div>
        <div class="col-4 text-center">
        <?php
            $sql="SELECT * FROM category";
            $res=mysqli_query($conn , $sql);
            $count=mysqli_num_rows($res)
            ?>
            <h1><?php echo $count;?></h1>
            
            <br>
            Categories 

        </div>
        <div class="col-4 text-center">
        <?php
            $sql="SELECT * FROM tb_car";
            $res=mysqli_query($conn , $sql);
            $count=mysqli_num_rows($res)
            ?>
            <h1><?php echo $count;?></h1>
            
            <br>
             Car

        </div>
        <div class="col-4 text-center">
        <?php
            $sql="SELECT * FROM orderr";
            $res=mysqli_query($conn , $sql);
            $count=mysqli_num_rows($res)
            ?>
            <h1><?php echo $count;?></h1>
           
            <br>
            Orders 

        </div>
        <div class="clearfix">

        </div>
        </div>
        
   
    
    </div> 
    <!--main content end--> 
    </div>

    <?php include('partials/footer.php');?>