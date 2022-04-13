<?php include('partials/menu.php'); ?>
<div class="content">
<div class="main-content">
    <div class="wrapper">
        <h1> Add New Car </h1>
        <?php
        if(isset($_SESSION['f_upload'])){
            echo $_SESSION['f_upload'];
            unset($_SESSION['f_upload']);
        }
        
        ?>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="table-form">
            <tr>
                <td>Title :</td>
                <td>
                    <input type="text" name="title" placeholder="title of car">
                </td>
            </tr>
            <tr>
                <td>Description :</td>
                <td>
                    <textarea name="description"  cols="30" rows="10" placeholder="Enter your description :"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Price :
                </td>
                <td>
                    <input type="number" name="price" min="1000" max="5000">
                </td>
            </tr>
            <tr>
                <td>
                    Image-name:
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
                        $sql = "SELECT * FROM category ";
                        //Execute
                        $res = mysqli_query($conn , $sql);
                        //there is data or not 
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            //there is data
                            while($row=mysqli_fetch_assoc($res)){
                                //get the data of category 
                                $id=$row['id'];
                                $title=$row['title'];
                            
                            ?>
                            <option value="<?php echo $id;?>"><?php echo $title;?></option>
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
                    <input type="radio" name="available" value="Yes">Yes
                    <input type="radio" name="available" value="No">No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="addncar" value="Save" class="btn-primary">

                </td>
            </tr>
            
        </table>
    
        </form>


    </div>
</div>
</div>




<?php


if(isset($_POST['addncar'])){
    //check if add-car button is clicked
    // echo "is clicked ";
    //1. get the data from form 
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    if(isset($_POST['available'])){
        $available=$_POST['available'];
    }else{
        $available="No";
    }

    //2.upload the image

    if(isset($_FILES['image_name']['name'])){
        //is clicked
        $image_name=$_FILES['image_name']['name'];
        // echo $image_name;
        if($image_name != ""){
            // image is clicked 
            // A.rename the image
            // get the ext of image 
            $ext = end(explode('.',$image_name));
            // echo $ext;
            $image_name="newcar".rand(000,999).".".$ext;
            // echo $image_name;
            // B.upload the image
            //we need sorce path and destination path 
            $src = $_FILES['image_name']['tmp_name'];
            // echo $src;
            $des = "../images/car/".$image_name;
            // echo $des;
            $upload = move_uploaded_file($src,$des);
            // check the upload 
            if($upload==false){
                //failed to up load
                //redircet to page add car with error message
                $_SESSION['f_upload']="<div class='error'>failed to upload the image </div>";
                header('location:'.SITEURL.'admin/add-newcar.php');
                //end the upload
                die();
            }
        }
    }else{
        $image_name="";
    }
    //3.insert the data into database
    //sql query for insert 
    $sql2 = "INSERT INTO tb_car SET 
    title='$title',
    description = '$description',
    price=$price,
    category_id='$category',
    image_name='$image_name',
    available='$available'";
    //Execute the query 
    $res = mysqli_query($conn, $sql2);
    //check
    if($res==true){
        $_SESSION['sadd_new_car']="<div class='success'>success to add car</div>";
        header('location:'.SITEURL."admin/manage-car.php");
    }else{
        $_SESSION['fadd_new_car']="<div class='error'>failed to add car</div>";
        header('location:'.SITEURL."admin/manage-car.php");

    }
    //4.redirect to manage car page
}
?>

    
<?php include('partials/footer.php');?>