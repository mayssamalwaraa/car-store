<?php include('front/menu_visitors.php');?>

<!-- search  start -->
<section class="search">
    <div class="container text-center">
        
        <form action="#" class="search-bar" method="POST" >
            <input type="search" name="search" placeholder="log in to search for car" class="input-search" required>
            <input type="submit" name="search" value="search" class="btn-search btn-sprimary">
        </form>

    </div>

</section>

<!-- search  end -->

<!-- catg  start -->
<section class="categories">
    <div class="container">
        
        <h2 class="text-center">EXplore Categories</h2>
        <?php
        //sql query to display 3 category from table category
            $sql = "SELECT * FROM category limit 3";
        //Execute the query
            $res = mysqli_query($conn , $sql);
        //number of row in table
            $count = mysqli_num_rows($res);
            if($count > 0){
                //fetch the data from res
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                    
        ?>
        <a href="<?php echo SITEURL;?>/Cars_v.php?id=<?php echo $id;?>">
            <div class="box-1 float-container">
                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="car1" class="image-responsive img-curve">   
            </div>
        </a>
        <?php
                }
            }else{
                //print no category
                echo "<div class='error' > no category </div>";
            }
        ?>
        <div class="clearfix"></div>

    </div>

</section>

<!-- cat  end -->

<!-- menu car  start -->
<section class="New_car" >
    <div class="container ">

        <h2 class="text-center">New car</h2>
        <?php
        //sql query to display 4 car  from table cars
        $sql2="SELECT * from tb_car WHERE available='Yes'limit 4 ";
        //Execute the query
        $res2=mysqli_query($conn,$sql2);
        //number of row in table
        $count2=mysqli_num_rows($res2);
        if($count2 >0){
            //fetch the data from res
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
                    <p class="price"><?php echo $price;?></p>
                        <div class="details">
                            <br>
                            <a href="<?php echo SITEURL;?>index.php" class=" btn-sprimary" title="log in to order">order</a>
                            
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