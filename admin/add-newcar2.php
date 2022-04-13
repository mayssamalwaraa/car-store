<?php include('partials/menu2.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add New Car </h1>
        <?php
        if(isset($_SESSION['field-upload'])){
            echo $_SESSION['field-upload'];
            unset($_SESSION['field-upload']);
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
                    <input type="file" name="image-name" >
                </td>

            </tr>
            <tr>
                <td>Category :</td>
                <td>
                    <select name="category" >
                        <?php
                        //display all the category 
                        //1.sql query to display the category active from data base
                        $sql = "SELECT * FROM category WHERE active='Yes'";
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
                            }
                            ?>
                            <option value="<?php echo $id;?>"><?php echo $title;?></option>
                            <?php

                        }else{
                            //there is no data 
                            ?>
                            <option value="1">No category car  </option>
                            <?php

                        }
                        ?>
                        <option value="1">Car</option>
                        <option value="2">SUV</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Feauter :</td>
                <td>
                    <input type="radio" name="feauter" value="yes">YES
                    <input type="radio" name="feauter" value="no">NO
                </td>
            </tr>
            <tr>
                <td>Active :</td>
                <td>
                    <input type="radio" name="active" value="yes">YES
                    <input type="radio" name="active" value="no">NO 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="addncar" vaule="Add car" class="btn-primary">

                </td>
            </tr>
            
        </table>
    
        </form>


    </div>
</div>

<?php
if(isset($_POST['addncar'])){
    //the button is clicked 
    // echo "the button is clicked ";

    //1.get the data from the data base 
    $title = $_POST['title'];
    $description=$_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    //check the feauter and the active 
    if(isset($_POST['feauter'])){
        $feauter = $_POST['feauter'];
    }else{
        $feauter = "NO";

    }
    if(isset($_POST['active'])){
        $active = $_POST['active'];
    }else{
        $active = "NO";

    }

    //2.upload the image
    //check wether the image is selected or not and upload it only if it selected
    if(isset($_FILES['image-name']['name'])){
        //get the details of selected image 
        $image_name =  $_FILES['image-name']['name'];
       

        if($image_name != ""){
            //upload the image 
            //to up load the image we need two things source and the destination of image

            //A.rename the image 
            $ext =end(explode('.',$image_name));//image.jpeg ==> image jpeg

            //creat name the image 
            $image_name = "car".rand(000,999).".".$ext;


            //1.the source of the image 
            $src = $_FILES['image-name']['tmp_name'];
            //2.the destination to upload the image
            $des = "../images/car/".$image_name;
            //upload the image
            $upload = move_uploaded_file($src,$des);
            //check if the process is false
            if($upload == false){
                $_SESSION['field-upload']="<div class='error'>Field to up load the image</div>";
                header('location:'.SITEURL.'admin/add-newcar.php');
                //stop the process 
                die();
            }
        }
    }

    //3.insert the data into the database
    //sql query
    $sql2="INSERT INTO 'new-car' WHERE
    title='$title',
    description='$description',
    price=$price,
    image_name='$image_name',
    feauter='$feauter',
    active='$active'
    ";
    echo $sql2;

    // //Execute 
    // $res2 = mysqli_query($conn, $sql2);

    // //check 
    // if ($res2 == TRUE){
    //     $_SESSION['add-newcar']="<div class='success'>success to add car</div>";
    //     header('location:'.SITEURL.'admin/manage-car.php');

    // }else{
    //     $_SESSION['add-newcar']="<div class='error'> failed to add car</div>";
    //     header('location:'.SITEURL.'admin/manage-car.php');

    // }



    //4.redirect to manage car page

}

?>


    
<?php include('partials/footer.php');?>