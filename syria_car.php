<?php include('front/menu.php');?>
<?php
if(isset($_GET['id_u'])){
    $id_u=$_GET['id_u'];
}
?>
    <!-- search  start -->
    <section class="search">
        <div class="container text-center">
            
            <form action="<?php echo SITEURL;?>car-on-search.php" class="search-bar">
                <input type="search" name="search" placeholder="search for a car" class="input-search">
                <input type="submit" name="search1" value="search" class="btn-search btn-sprimary">
                <input type="hidden" name="id_u" value= "<?php echo $id_u;?>" class="btn-search btn-sprimary">

            </form>

        </div>

    </section>
    
    <!-- search  end -->

    <!-- catg  start -->
    <section class="categories">
        <div class="container">
        <!-- log-in-user -->
        <?php 
      if(isset($_SESSION['slog-in-user'])){
        echo $_SESSION['slog-in-user'];
        unset($_SESSION['slog-in-user']);//display session message all the time
    
    }
    if(isset($_SESSION['add-order'])){
        echo $_SESSION['add-order'];
        unset($_SESSION['add-order']);//display session message all the time
    
    }
      ?>
            
            <h2 class="text-center">Categories</h2>
            <?php
                $sql = "SELECT * FROM category limit 3";
            
                $res = mysqli_query($conn , $sql);
            
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['id'];
                        $title=$rows['title'];
                        $image_name=$rows['image_name'];
                        ?>
            <a href="<?php echo SITEURL;?>Cars.php?id_cat=<?php echo $id;?>&id_u=<?php echo $id_u;?>">
                <div class="box-1 float-container">
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="car1" class="image-responsive img-curve">
                    
                    
                </div>
            </a>
                        

        <?php
                    }
                }else{
                    echo "<div class='error' > no category </div>";
                }

            ?>



            <div class="clearfix">

            </div>

        </div>

    </section>
    
    <!-- cat  end -->

    <!-- menu car  start -->
    <section class="New_car" >
        <div class="container ">

            <h2 class="text-center">New car</h2>
            <?php
            $sql2="SELECT * from tb_car WHERE available='Yes' limit 4";
            //Execute
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if($count2 >0){
                while ($rows2=mysqli_fetch_assoc($res2)) {
                    $id=$rows2['id'];
                    $title=$rows2['title'];
                    $description=$rows2['description'];
                    $price=$rows2['price'];
                    $image_name=$rows2['image_name'];
                    $available=$rows2['available'];
                    ?>
                    <div class="New-box float-container "> 
                    <div class="img-new-car">
                        <img src="<?php echo SITEURL;?>images/car/<?php echo $image_name;?>" alt="new car" class="image-responsive img-curve ">    
                    </div>

                    <div class="description ">
                      <h4 class="text-new-car"><?php echo $title;?></h4> 
                      <br>
                      <p class="price"><?php echo $price;?>M</p>
                         <div class="details">
                             
                             <br>
                             
                             <a href="<?php echo SITEURL;?>order.php?id_c=<?php echo $id;?>&id_u=<?php echo $id_u;?>" class=" btn-sprimary" >order</a>
                             <a href="<?php echo SITEURL;?>details-car.php?id_c=<?php echo $id;?>&id_u=<?php echo $id_u;?>" class="btn-detalis">details</a>
            
                            </div>

                    </div>

                 </div>

        <?php
                }
            }else{
                echo "<div class='error'> No car </div>  ";

            }
                                
        ?>
            <div class="clearfix"></div>

        </div>

    </section>
    
    <!--  menu car  end -->

<?php include('front/footer.php');?>