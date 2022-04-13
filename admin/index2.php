<?php include('partials/menu2.php'); ?>

    <!--main content start-->
    <div class="main-content">
        <div class="wrapper">
         <h1>DASHBORD</h1>
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
            <h1>5</h1>
            <br>
            category 

        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            category 

        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            category 

        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            category 

        </div>
        <div class="clearfix">

        </div>
        </div>
        
   
    
    </div> 
    <!--main content end--> 

    <?php include('partials/footer.php');?>