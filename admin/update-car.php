<?php include('partials/menu.php'); ?>
<div class="content">

<div class="main-content">
    <div class="wrapper">
        <h1> Update  Car </h1>
         
        
        <?php
        //display the data into our form 
        if(isset($_GET['id'])){
            //get the id of car 
            $id=$_GET['id'];
            //sql query to get the data of car by id 
            $sql="SELECT * FROM tb_car WHERE id='$id'";
            //Execute the query 
            $res=mysqli_query($conn , $sql);
            
            $row=mysqli_fetch_assoc($res);



            $title=$row['title'];
            $description=$row['description'];
            $price=$row['price'];
            $current_image=$row['image_name'];
            $current_category=$row['category_id'];
            $available = $row['available'];
            

            //add the data to the form



        }else{
            //redirect
        }
        

        
        ?>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="table-form">
            <tr>
                <td>Title :</td>
                <td>
                    <input type="text" name="title" placeholder="title of car" value="<?php echo $title;?>">
                </td>
            </tr>
            <tr>
                <td>Description :</td>
                <td>
                    <textarea name="description"  cols="30" rows="10" placeholder="Enter your description :" value="<?php echo $description;?>"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Price :
                </td>
                <td>
                    <input type="number" name="price" min="1000" max="5000" value="<?php echo $price;?>">
                </td>
            </tr>
            <tr>
                <td>
                    current image:
                </td>
                <td>
                    <?php
                    if($current_image == ""){
                        //display message error
                        echo "<div class='error'>No images added </div>";
                    }else{
                        ?>
                        <img src="<?php echo SITEURL;?>images/car/<?php echo $current_image;?>" alt="<?php echo $title;?>" width="150px">
                        <?php
                    }
                    
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                   Select new  Image:
                </td>
                <td>
                    <input type="file" name="image_name" >
                </td>

            </tr>
            <tr>
                <td>Category :</td>
                <td>
                    <select name="category" >
                        <?php
                        //display all the category 
                        //1.sql query to display the category active from data base
                        $sql2 = "SELECT * FROM category ";
                        //Execute
                        $res2 = mysqli_query($conn , $sql2);
                        //there is data or not 
                        $count2 = mysqli_num_rows($res2);
                        if($count2 > 0){
                            //there is data
                            while($row2=mysqli_fetch_assoc($res2)){
                                //get the data of category 
                                $category_id=$row2['id'];
                                $category_title=$row2['title'];
                            
                            ?>
                            <!--we need to select the category with the id -->
                            <option <?php if($current_category == $category_id) echo"selected";?> value="<?php echo $category_id;?>" > <?php echo $category_title;?> </option>
                            <?php
                            }

                        }else{
                            //there is no data 
                            ?>
                            <option value="1">No category car  </option>
                            <?php

                        }
                        ?>
                        <!-- <option value="1">Car</option>
                        <option value="2">SUV</option> -->
                    </select>
                </td>
            </tr>
            <tr>
                <td>Available :</td>
                <td>
                    <input <?php if($available=="Yes") echo "checked";?> type="radio" name="available" value="Yes">Yes
                    <input <?php if($available=="No") echo "checked";?> type="radio" name="available" value="No">No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <!-- to get id and current image path to delete image from folder-->
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="submit" name="update_car" value="Save" class="btn-primary">

                </td>
            </tr>
            
        </table>
    
        </form>


    </div>
</div>
</div>

<?php
    if(isset($_POST['update_car'])){
        //1. get the detials from the form 
        $id2=$_POST['id'];
        $title2=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $current_image=$_POST['current_image'];
        $category=$_POST['category'];
        $available=$_POST['available'];
        
        //2.upload the new image we use files 
        if(isset($_FILES['image_name']['name'])){
            $image_name = $_FILES['image_name']['name'];
            if($image_name != ""){
                //image is availabel
                //up load the new image
                $ext = end(explode('.',$image_name));
                        
                $image_name="car".rand(000,999).'.'.$ext;
    
                //get the source path 
                $source_path = $_FILES['image_name']['tmp_name'];
    
                //pass the destination path 
                $destination = "../images/car/".$image_name;
    
                //finally up load the file
                $upload = move_uploaded_file($source_path , $destination);
    
                //check if the iamge is uploaded or not 
                //if the image not uploaded we break the process with error message 
    
                if ($upload == false){
                    $_SESSION['not-upload-car']="<div class='error'> not upload the file </div>";
                    header('location:'.SITEURL."admin/manage-car.php");
                    die();
                }
    
                //remove the old image if it availabel
                
                if($current_image != ""){
                $remove_path = "../images/car/".$current_image;
    
                $remove=unlink($remove_path);
    
                if( $remove == false){
                    $_SESSION['remove_car']="<div class='error'> not upload the file </div>";
                    header('location:'.SITEURL."admin/manage-car.php");
                    die();
                    
                }
                }
        }

        

        //4.updata the data into database
        //sql query 
        $sql3 = "UPDATE tb_car SET 
        title='$title2',
        description='$description',
        price=$price,
        image_name='$image_name',
        category_id='$category',
        available='$available'
        WHERE id='$id2'";

        //Exceute the query 
        $res3 = mysqli_query($conn , $sql3);
        //check 
        //5.redirect to the manage car page 
        if($res3 == true){
            $_SESSION['update-car']="<div class='sucess'>sucessful to update</div>";
            header('location:'.SITEURL."admin/manage-car.php");

        }else{
            $_SESSION['update-car']="<div class='sucess'>faild to update</div>";
            header('location:'.SITEURL."admin/manage-car.php");

        }

        

        


    }
}
?>
<?php include('partials/footer.php');?>