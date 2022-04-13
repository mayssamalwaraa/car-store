<?php include('front/menu.php');?>

<?php
//get the search keyword
if(isset($_GET['search'])){
    $search = $_GET['search'];
}

if(isset($_GET['id_u'])){
    $id_u=$_GET['id_u'];
}
?>

    <!-- search-output  start -->
    <section class="search">
        <div class="container text-center">    
            <h2 class="text-white"><a href="#" class="text-white"><?php echo $search;?></a></h2>
        </div>

    </section>
    
    <!-- search  end -->

    <!-- menu car  start -->
    <section class="New_car" >
    <div class="container ">

        <?php
        //sql query to get the car on search keyword
        $sql="SELECT * FROM tb_car WHERE  title LIKE '%$search%' OR description LIKE '%$search% '";
        //Execute the query
        $res = mysqli_query($conn , $sql);
        //number of row in table
        $count = mysqli_num_rows($res);
        if($count > 0){
                //fetch the data from res
            while($rows=mysqli_fetch_assoc($res)){
                $id=$rows['id'];
                $title=$rows['title'];
                $price=$rows['price'];
                $image_name=$rows['image_name'];
                ?> 
            <div class="New-box float-container "> 
            <div class="img-new-car">
                <img src="<?php echo SITEURL;?>images/car/<?php echo $image_name;?>" alt="new car" class="image-responsive img-curve ">    
            </div>
            <div class="description ">
                <h4 class="text-new-car"><?php echo $title;?></h4> 
                <br>
                <p class="price"><?php echo $price;?> $</p>
                    <div class="details"> 
                        <br>

                    </div>

            </div>

            </div>
        <?php
                }
            }else{
                echo "<div class='error' > no category </div>";
            }

        ?>
        <div class="clearfix"></div>

    </div>

</section>

<?php include('front/footer.php');?>