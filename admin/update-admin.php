<?php include('partials/menu.php'); ?>
<div class="content">
<div class='main-content'>
    <div class='wrapper'>
        <h1>Update Admin </h1>
        <br><br>

        <?php
        //get the id 

        $id=$_GET['id'];

        //sql query to display the details of admin

        $sql = "SELECT * FROM admin WHERE id=$id";

        //Execut the query 

        $res = mysqli_query($conn , $sql);

        if($res == true ){
            //one admin

            $count = mysqli_num_rows($res);
            if($count == 1 ){
                //get the details of the admin 

                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $user_name = $row['user_name'];
            }
        }else{
            //redirect to manage page 

            header('location:'.SITEURL."admin/manage-admin.php");
        }


        ?>
        <form action="" method="POST">

            <table class="table-form">
                <tr>
                    <td>
                        Full name :
                    </td>
                    <td>
                        <input type="text" name="full_name" value=<?php echo $full_name; ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        User name :
                    </td>
                    <td>
                        <input type="text" name="user_name" value=<?php echo $user_name; ?>>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="update-admin" value="update-admin" class="btn-update">

                    </td>
                </tr>

            </table>
        </form>

    </div>

</div>
</div>

<?php
    // check if the button is clicked 
    if(isset($_POST['update-admin']))
    {
        // echo "yyyyyyyyyesssssssss";
        //get the data from  the form by POST['name']

        $id=$_POST['id'];
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];

        //sql query to update the field 

        $sql = "UPDATE admin SET 
        full_name = '$full_name',
        user_name = '$user_name'
        WHERE id = '$id' ";

        //Execute the query 

        $res = mysqli_query($conn , $sql );

        if ($res == true )
        {
            //great the seesion  to  display the message 
            $_SESSION['update'] = "<div class='success'>success update</div> ";
            //header to redirect to manage page
            header('location:'.SITEURL.'admin/manage-admin.php');

        }
        else
        {
            //great the seesion  to  display the message 
            $_SESSION['update'] = "<div class='success'>failed to update </div> ";
            //header to redirect to manage page
            header('location:'.SITEURL.'admin/manage-admin.php');

        }

    }
?>

<?php include('partials/footer.php');?>