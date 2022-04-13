<?php include('front/menu.php');?>

<?php
    //display the data into our form 
    if(isset($_GET['id_cat'])){
        //get the id of car 
        $id_cat=$_GET['id_cat'];
    }
    if(isset($_GET['id_u'])){
        $id_u=$_GET['id_u'];
    }
?>            

    <!-- menu car  start -->
    <section class="New_car" >
        <div class="container ">
            <?php
            //sql query
            $sql="SELECT * from tb_car WHERE available='Yes' ";
            //Execute
            $res=mysqli_query($conn,$sql);
            //number of row
            $count=mysqli_num_rows($res);
            if($count >0){
                //fetch the data
                while ($rows=mysqli_fetch_assoc($res)) {
                    $id_c=$rows['id'];
                    $id_ct=$rows['category_id'];
                    $title=$rows['title'];
                    $description=$rows['description'];
                    $price=$rows['price'];
                    $image_name=$rows['image_name'];
                    $available=$rows['available'];
                    if($id_ct==$id_cat){
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
                             <a href="<?php echo SITEURL;?>order.php?id_c=<?php echo $id_c;?>&id_u=<?php echo $id_u;?>" class="btn-sprimary">order</a>
                             <a href="<?php echo SITEURL;?>details-car.php?id_c=<?php echo $id_c;?>&id_u=<?php echo $id_u;?>" class="btn-detalis">details</a>

                            </div>
                    </div>
                 </div>
                    <?php
                    }
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