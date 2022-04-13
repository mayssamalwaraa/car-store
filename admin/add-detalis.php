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
                <td>Id Car :</td>
                <td>
                    <input type="text" name="id_c" placeholder="id of car">
                </td>
            </tr>
            <tr>
                <td>Model :</td>
                <td>
                <input type="text" name="model" placeholder="model of car">
                </td>
            </tr>
            <tr>
                <td>
                    Type :
                </td>
                <td>
                    <input type="text" name="type" placeholder="type of car">
                </td>
            </tr>
            <tr>
            <td>
               Year:
            </td>
            <td>
              <input type="text" name="year" palceholder="Enter the year :">
            </td>
            </tr>
            <tr>
            <td>
               Color:
            </td>
            <td>
              <input type="text" name="color" palceholder="Enter the color :">
            </td>
            </tr>
            <tr>
            <td>
               Type of oil:
            </td>
            <td>
              <input type="text" name="type_o" palceholder="Enter the type of oil :">
            </td>
            </tr>
            <tr>
            <td>
               type of power:
            </td>
            <td>
              <input type="text" name="type_p" palceholder="Enter the type of power :">
            </td>
            </tr>
            <tr>
            <td>
               mohark:
            </td>
            <td>
              <input type="text" name="mohark" palceholder="Enter the type of mohark :">
            </td>
            </tr>
            <tr>
            <td>
               maraya:
            </td>
            <td>
              <input type="text" name="maraya" palceholder="Enter the type of maraya :">
            </td>
            </tr>
            <tr>
            <td>
               led:
            </td>
            <td>
              <input type="text" name="led" palceholder="Enter the led:">
            </td>
            </tr>
            <tr>
                <td>
                    Image-name1:
                </td>
                <td>
                    <input type="file" name="image_name1" >
                </td>

            </tr>
            <tr>
                <td>
                    Image-name2:
                </td>
                <td>
                    <input type="file" name="image_name2" >
                </td>

            </tr>
            <tr>
                <td>
                    Image-name3:
                </td>
                <td>
                    <input type="file" name="image_name3" >
                </td>

            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="add_d" value="Save" class="btn-primary">

                </td>
            </tr>
            
        </table>
    
        </form>


    </div>
</div>
</div>




<?php


if(isset($_POST['add_d'])){
    //check if add-car button is clicked
    // echo "is clicked ";
    //1. get the data from form 
    $id_c=$_POST['id_c'];
    $model=$_POST['model'];
    $type=$_POST['type'];
    $year=$_POST['year'];
    $color=$_POST['color'];
    $type_oil=$_POST['type_o'];
    $type_power=$_POST['type_p'];
    $mohark=$_POST['mohark'];
    $maraya=$_POST['maraya'];
    $led=$_POST['led'];


    //2.upload the image

    if(isset($_FILES['image_name1']['name'])){
        //is clicked
        $image_name1=$_FILES['image_name1']['name'];
        // echo $image_name;
        if($image_name1 != ""){
            // image is clicked 
            // A.rename the image
            // get the ext of image 
            $ext = end(explode('.',$image_name1));
            // echo $ext;
            $image_name1="dcar".rand(000,999).".".$ext;
            // echo $image_name;
            // B.upload the image
            //we need sorce path and destination path 
            $src = $_FILES['image_name1']['tmp_name'];
            // echo $src;
            $des = "../images/detalis/".$image_name1;
            // echo $des;
            $upload = move_uploaded_file($src,$des);
            // check the upload 
            if($upload==false){
                //failed to up load
                //redircet to page add car with error message
                $_SESSION['f_upload']="<div class='error'>failed to upload the image </div>";
                header('location:'.SITEURL.'admin/add-detalis.php');
                //end the upload
                die();
            }
        }
    }else{
        $image_name1="";
    }

    if(isset($_FILES['image_name2']['name'])){
        //is clicked
        $image_name2=$_FILES['image_name2']['name'];
        // echo $image_name;
        if($image_name2 != ""){
            // image is clicked 
            // A.rename the image
            // get the ext of image 
            $ext = end(explode('.',$image_name2));
            // echo $ext;
            $image_name2="dcar".rand(000,999).".".$ext;
            // echo $image_name;
            // B.upload the image
            //we need sorce path and destination path 
            $src = $_FILES['image_name2']['tmp_name'];
            // echo $src;
            $des = "../images/detalis/".$image_name2;
            // echo $des;
            $upload = move_uploaded_file($src,$des);
            // check the upload 
            if($upload==false){
                //failed to up load
                //redircet to page add car with error message
                $_SESSION['f_upload']="<div class='error'>failed to upload the image </div>";
                header('location:'.SITEURL.'admin/add-detalis.php');
                //end the upload
                die();
            }
        }
    }else{
        $image_name2="";
    }

    if(isset($_FILES['image_name3']['name'])){
        //is clicked
        $image_name3=$_FILES['image_name3']['name'];
        // echo $image_name;
        if($image_name3 != ""){
            // image is clicked 
            // A.rename the image
            // get the ext of image 
            $ext = end(explode('.',$image_name3));
            // echo $ext;
            $image_name3="dcar".rand(000,999).".".$ext;
            // echo $image_name;
            // B.upload the image
            //we need sorce path and destination path 
            $src = $_FILES['image_name3']['tmp_name'];
            // echo $src;
            $des = "../images/detalis/".$image_name3;
            // echo $des;
            $upload = move_uploaded_file($src,$des);
            // check the upload 
            if($upload==false){
                //failed to up load
                //redircet to page add car with error message
                $_SESSION['f_upload']="<div class='error'>failed to upload the image </div>";
                header('location:'.SITEURL.'admin/add-detalis.php');
                //end the upload
                die();
            }
        }
    }else{
        $image_name3="";
    }
    //3.insert the data into database
    //sql query for insert 
    $sql = "INSERT INTO detalis SET 
    id_c=$id_c,
    model = '$model',
    type_c='$type',
    year_c=$year,
    color='$color',
    type_oil='$type_oil',
    type_power='$type_power',
    mohark='$mohark',
    maraya='$maraya',
    led='$led',
    image1='$image_name1',
    image2='$image_name2',
    image3='$image_name3'";
    //Execute the query 
    $res = mysqli_query($conn, $sql);
    //check
    if($res==true){
        $_SESSION['add_d']="<div class='success'>success to add detalis</div>";
        header('location:'.SITEURL."admin/manage-details-car.php");
    }else{
        $_SESSION['add_d']="<div class='error'>failed to add detalis</div>";
        header('location:'.SITEURL."admin/manage-details-car.php");

    }
    //4.redirect to manage car page
}
?>

    
<?php include('partials/footer.php');?>