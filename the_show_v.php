<?php include('front/menu_visitors.php');?>
    <!-- cat  end -->

    <!-- menu car  start -->
    <section class="New_car" >
        <div class="container ">

            <!-- <h2 class="text-center">New car</h2> -->
            <?php
            $sql="SELECT * from tb_car WHERE available='Yes' ";
            //Execute
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count >0){
                while ($rows=mysqli_fetch_assoc($res)) {
                    $id2=$rows['id'];
                    $c_id=$rows['category_id'];
                    $title=$rows['title'];
                    $description=$rows['description'];
                    $price=$rows['price'];
                    $image_name=$rows['image_name'];
                    $available=$rows['available'];
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
                             <!-- details sadsadsa sadasd asdasd asdasd asd  -->
                             <br>
                             <a href="<?php echo SITEURL;?>index.php" class=" btn-sprimary">order</a>
                             <a href="<?php echo SITEURL;?>index.php" class="btn-detalis">details</a>

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