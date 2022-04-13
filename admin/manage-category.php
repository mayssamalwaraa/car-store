<?php include('partials/menu.php'); ?>
<div class="content">

<div class="main-content">
    <div class="wrapper">
    <!-- <h1>Manage Category</h1> -->
    <br><br>
    <?php
     if(isset($_SESSION['add-category'])){
        echo $_SESSION['add-category'];//display session message all the time
        unset($_SESSION['add-category']);//remove session message 
    }
    if(isset($_SESSION['remove'])){
        echo $_SESSION['remove'];//display session message all the time
        unset($_SESSION['remove']);//remove session message 
    }
    if(isset($_SESSION['delete-category'])){
        echo $_SESSION['delete-category'];//display session message all the time
        unset($_SESSION['delete-category']);//remove session message 
    }
    if(isset($_SESSION['no-category'])){
        echo $_SESSION['no-category'];//display session message all the time
        unset($_SESSION['no-category']);//remove session message 
    }
    if(isset($_SESSION['update-category'])){
        echo $_SESSION['update-category'];//display session message all the time
        unset($_SESSION['update-category']);//remove session message 
    }
    if(isset($_SESSION['not-upload-new-cate'])){
        echo $_SESSION['not-upload-new-cate'];//display session message all the time
        unset($_SESSION['not-upload-new-cate']);//remove session message 
    }
    ?>

    

    <br>

         <!-- Button to add new admin-->
         <a href="<?php echo SITEURL;?>/admin/add-category.php" class="btn-primary">Add category</a>
         <br>
         <br>
         <table class="tb-full">
         <tr>
                <th>S_N</th>
                <th>Title</th>
                <th>Image-name</th>
                <th>Available</th>
                <th>Edit</th>
                    
                
            </tr>
         <?php
    
    $sql = "SELECT * FROM category";

    $sn=1;

    $res = mysqli_query($conn , $sql);

    $count = mysqli_num_rows($res);

    if($count > 0){
        while($rows=mysqli_fetch_assoc($res)){
            $id=$rows['id'];
            $title=$rows['title'];
            $image_name=$rows['image_name'];
            $available=$rows['available'];
            ?>
            <tr>
                <td><?php echo $sn++;?></td>
                <td ><?php echo $title;?></td>
                <td>
                    <?php 
                    if($image_name!=""){
                        //display the image 
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="<?php echo $image_name;?>" width="100px">
                        <?php


                    }else{
                        echo "<div class='error' > no image </div>";

                    }
                
                ?>

                </td>
                <td><?php echo $available;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>" class="btn-update">Update  </a>
                    <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-delete">Delete</a>
                </td>
            </tr>
            <?php
        }

    }else{
        //we do not have a data 
        ?>
        <tr>
            <td>
                <div colspan="6" class="error"> we do not have a data for this </div>
            </td>
        </tr>
        <?php
    }
    ?>
            
            
            
        </table>

    </div>

</div>
</div>


<?php include('partials/footer.php');?>