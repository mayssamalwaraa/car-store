<?php include('partials/menu2.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <?php
        if(isset($_SESSION['add-category'])){
            echo $_SESSION['add-category'];//display session message all the time
            unset($_SESSION['add-category']);//remove session message 
        }
        if(isset($_SESSION['not-upload'])){
            echo $_SESSION['not-upload'];//display session message all the time
            unset($_SESSION['not-upload']);//remove session message 
        }
        ?>

        <br><br>
        <!--to upload image or file we use enctype-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-form">
                <tr>
                    <td>
                        Title :
                    </td>
                    <td>
                        <input type="text" name="title" palceholder="Enter the title :">
                    </td>

                </tr>
                <tr>
                    <td>
                        select image :
                       
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
                        <input type="radio" name="feauter" value="yes">
                        <label for="">Yes</label>
                        <input type="radio" name="feauter" value="no">
                         <label for="">No</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Active :
                    </td>
                    <td>
                    <input type="radio" name="active" value="yes">
                        <label for="">Yes</label>
                        <input type="radio" name="active" value="no">
                         <label for="">No</label>
                    </td>
                </tr>
                <tr>
                    <td >
                    <input type="submit" name="add-category" value="add-category" class="btn-update">
                    </td>
                </tr>

            </table>
        </form>
        <?php
        if(isset($_POST['add-category'])){
            // echo "is clicked ";

            //1.get the value from the form 
            $title = $_POST['title'];

            //2.check if the radio is clicked or not 

            if(isset($_POST['feauter'])){
                $feauter = $_POST['feauter'];

            }else{
                //set the defult value
                $feauter="NO"; 

            }
            if(isset($_POST['active'])){
                $active = $_POST['active'];

            }else{
                //set the defult value
                $active="NO"; 

            }
            //check wether the image is selected or not and set the value for image name according 
            //the file is array to print it we use print_r($_FILES)

            //print_r($_FILES['image']);

            //die(); // to break the code 

            if(isset($_FILES['image']['name'])){
                //upload the file
                //to upload the image we need image name & source path & destination path 

                //get the image name 
                $image_name = $_FILES['image']['name'];

                if($image_name != "")
                {

                

                    //rename the image
                    //auto rename for image 
                    //1.get the exetension of our image (jpeg , gif...)
                    //car.jpeg ==> explode('.',car) ==> section 1 : car(name of photo) section 2: jpeg(exe)
                    //to get section 2 end(explode('.',car));
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
                        $_SESSION['not-upload']="<div class='error'> not upload the file </div>";
                        header('location:'.SITEURL."admin/add-category.php");
                        die();
                    }
              }


            }
            else
            {
                //don't up load the file and set the name to null
                $image_name=""; 

            }
            //breakkkkkkkkkkkk
            //3.sql query to insert the data to database category table
            $sql= "INSERT INTO category SET 
            title='$title',
            image_name='$image_name',
            feauter='$feauter',
            active='$active'
            ";
            //Execut the query 
            $res = mysqli_query($conn ,$sql);

            //check if it execut 
            if($res==TRUE){
                //Data inserted 
                // echo "Data inserted ";
                //Creat a variable session to display the message Admin added successfully
                $_SESSION['add-category']=" <div class='success'>Category added successfully</div>";
        
                //Redirect page to manage admin
                header("location:".SITEURL."admin/manage-category.php");
            }
            else{
                // echo "failed to inserted ";
                //Creat a variable session to display the message 
                $_SESSION['add-category']=" <div class='success'>Failed Category </div>";
        
                //Redirect page to manage admin
                header("location:".SITEURL."admin/manage-category.php");
            }
        }
        ?>

    </div>

</div>

<?php include('partials/footer.php');?>