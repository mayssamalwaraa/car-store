<?php include('partials/menu.php'); ?>
<div class="content">

<div class="main-content">
    <div class="wrapper">
    <!-- <h1>Manage Car</h1> -->
    <br>

         <!-- Button to add new admin-->
         <a href="<?php echo SITEURL;?>admin/add-newcar.php" class="btn-primary">Add new Car</a>
         <a href="<?php echo SITEURL;?>admin/manage-details-car.php" class="btn-primary">Manage Details</a>
         <br>
         <br>
         <br>
         
         <?php
        if(isset($_SESSION['sadd_new_car'])){
            echo $_SESSION['sadd_new_car'];
            unset($_SESSION['sadd_new_car']);
        }
        if(isset($_SESSION['fadd_new_car'])){
            echo $_SESSION['fadd_new_car'];
            unset($_SESSION['fadd_new_car']);
        }
        if(isset($_SESSION['delete_car'])){
            echo $_SESSION['delete_car'];
            unset($_SESSION['delete_car']);
        }
        if(isset($_SESSION['remove_image_car'])){
            echo $_SESSION['remove_image_car'];
            unset($_SESSION['remove_image_car']);
        }
        if(isset($_SESSION['delete_car_success'])){
            echo $_SESSION['delete_car_success'];
            unset($_SESSION['delete_car_success']);
        }
        if(isset($_SESSION['not-upload-car'])){
            echo $_SESSION['not-upload-car'];
            unset($_SESSION['not-upload-car']);
        }
        if(isset($_SESSION['remove_car'])){
            echo $_SESSION['remove_car'];
            unset($_SESSION['remove_car']);
        }
        if(isset($_SESSION['update-car'])){
            echo $_SESSION['update-car'];
            unset($_SESSION['update-car']);
        }
        
        ?>
         <br>
         <table class="tb-full">
            <tr>
                <th>S_N</th>
                <th>Id_c</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Available</th>
                <th>Edit</th>
                    
                
            </tr>
            <?php
            //get all the data from database
            //sql query
            $sql="SELECT * from tb_car ";
            //Execute
            $res=mysqli_query($conn,$sql);
            $sn=1;
            $count=mysqli_num_rows($res);
            if($count >0){
                while ($rows=mysqli_fetch_assoc($res)) {
                    $id=$rows['id'];
                    $title=$rows['title'];
                    $description=$rows['description'];
                    $price=$rows['price'];
                    $image_name=$rows['image_name'];
                    $available=$rows['available'];
                    ?>
                    
            <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $id;?></td>
                <td><?php echo  $title;?></td>
                <td><?php echo  $price;?></td>
                <td>
                <?php 
                if($image_name==""){
                    echo "<div class='error'>no image added</div>";
                }else{
                    ?>
                    <img src="<?php echo SITEURL?>images/car/<?php echo $image_name;?>" width="100px">
                    <?php
                }
                ?>
                </td>
                <td><?php echo  $available;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>/admin/update-car.php?id=<?php echo $id;?>" class="btn-update">Update Car </a>
                    <a href="<?php echo SITEURL;?>/admin/delete-car.php?id=<?php echo $id;?>&& image_name=<?php echo $image_name;?>" class="btn-delete">Delete Car </a>
                </td>
            </tr>

                    <?php
                    



                    
                }
            }else{
                echo "<tr><td colspan='7' class='error'> No car added</td></tr> ";
            }
            ?>
            
        </table>

    </div>

</div>
</div>



<?php include('partials/footer.php');?>