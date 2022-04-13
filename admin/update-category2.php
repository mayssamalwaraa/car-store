<?php include('partials/menu2.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br> <br>

        <?php
        //to prevent the hacker from log to page from url 
        if(isset($_GET['id'])){
            //get the data 
            $id = $_GET['id'];

            //sql query 
            $sql = "SELECT * FROM category WHERE id = $id";

            //execute
            $res = mysqli_query($conn , $sql);
            //check 

            $count = mysqli_num_rows($res);

            if($count == 1 ){
                $rows = mysqli_fetch_assoc($res);

                $id=$rows['id'];
                $title=$rows['title'];
                $current_name= $rows['image_name'];
                $feauter=$rows['feauter'];
                $active = $rows['active'];

            }

        }else{
            $_SESSION['no-category'] = " <div class =' error'>no category found </div>";
            header('location:'.SITEURL."admin/manage-category.php");
        }
        ?>
        <!--to upload image or file we use enctype-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-form">
                <tr>
                    <td>
                        Title :
                    </td>
                    <td>
                        <input type="text" name="title" palceholder="Enter the title :" value="<?php echo $title;?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        current image :
                       
                    </td>
                    <td>
                     <?php
                     if($current_name != ""){
                         ?>
                         <img src="<?php echo SITEURL;?>images/category/<?php echo $current_name;?>" alt="" width="150px">
                         <?php

                     }else{
                         echo "not found";

                     }
                     ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        new image :
                       
                    </td>
                    <td>
                    <input type="file" name="image">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Feauter :
                    </td>
                    <td>
                        <input <?php if($feauter=="yes") echo "checked";?> type="radio" name="feauter" value="yes">
                        <label for="">Yes</label>
                        <input <?php if($feauter=="no") echo "checked";?> type="radio" name="feauter" value="no">
                         <label for="">No</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Active :
                    </td>
                    <td>
                    <input <?php if($active=="yes") echo "checked";?> type="radio" name="active" value="yes">
                        <label for="">Yes</label>
                    <input <?php if($active == "no" ) echo "checked";?> type="radio" name="active" value="no">
                        <label for="">No</label>
                    </td>
                </tr>
                <tr>
                    <td >
                    <input type="hidden" name="current-name" value=<?php echo $current_name;?>>
                    <input type="hidden" name="id" value=<?php echo $id;?>>
                    <input type="submit" name="update-category" value="update-category" class="btn-update">
                    </td>
                </tr>

            </table>
        </form>

    </div>

</div>
<?php
 if(isset($_POST['update-category'])){
    //  echo "is selected";
    $title = $_POST['title'];
    $current_image =$_POST['current-image'];
    $id =$_POST['id'];
    $feauter = $_POST['feauter'];
    $active = $_POST['active'];

    //check the image if it selected 
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];

        if($image_name != ""){
            //image is availabel
            //up load the new image
            $ext = end(explode('.',$image_name));
                    
            $image_name="car-category".rand(000,999).'.'.$ext;

            //get the source path 
            $source_path = $_FILES['image']['tmp_name'];

            //pass the destination path 
            $destination = "../images/category/".$image_name;

            //finally up load the file
            $upload = move_uploaded_file($source_path , $destination);

            //check if the iamge is uploaded or not 
            //if the image not uploaded we break the process with error message 

            if ($upload == false){
                $_SESSION['not-upload-new-cate']="<div class='error'> not upload the file </div>";
                header('location:'.SITEURL."admin/manage-category.php");
                die();
            }

            //remove the old image if it availabel
            
            if($current_name != ""){
            $remove_path = "../images/category/".$current_name;

            $remove=unlink($remove_path);

            if( $remove == false){
                $_SESSION['remove']="<div class='error'> not upload the file </div>";
                header('location:'.SITEURL."admin/manage-category.php");
                die();
                
            }
            }
            


        }else{
            $image_name=$current_name;

        }

    }else{
        $image_name=$current_name;
    }

    //sql query 
    $sql2 = "UPDATE category SET
    title='$title',
    image_name='$image_name',
    feauter='$feauter',
    active='$active'
    WHERE id = $id
    ";
    //result
    $res = mysqli_query($conn , $sql2);
    //check 
    if(res == true){
        $_SESSION['update-category']="<div class='sucess'>sucessful to update</div>";
        header('location:'.SITEURL."admin/manage-category.php");

    }else{
        $_SESSION['update-category']="<div class='sucess'>faild to update</div>";
        header('location:'.SITEURL."admin/manage-category.php");

    }
 }
?>

<?php include('partials/footer.php');?>
