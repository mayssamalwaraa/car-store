<?php include('front/menu_visitors.php');?>

        <!--Explore start -->
        <section class="explore">
            <div class="container">
                <h2 class="text-center">
                    Explore Car 
                </h2>
                <?php
                //sql query
                $sql = "SELECT * FROM category ";
                //Execute
                $res = mysqli_query($conn , $sql);
                //number of  row 
                $count = mysqli_num_rows($res);
                if($count > 0){
                    //fetch the data
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['id'];
                        $title=$rows['title'];
                        $image_name=$rows['image_name'];
                        ?>
            <a href="<?php echo SITEURL;?>/Cars_v.php?id=<?php echo $id;?>">
            <div class="box-explore-title ">
                    <div class="box-explore">                    
                        <div class="img-car-explore float-container">
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="explore_car" class="image-responsive img-curve">   
                        </div>
                    </div>
                </div>
            </a>
            <?php
                    }
                }else{
                    echo "<div class='error' > no category </div>";
                }
            ?>
                <div class="clearfix"></div>

            </div>

        </section>
        <!--Explore end -->
        <?php include('front/footer.php');?>