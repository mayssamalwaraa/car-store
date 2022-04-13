<?php include('partials/menu.php'); ?>
<div class="content">

<div clas="main-content">
    <div class="wrapper">
        <h1>Change  password </h1>
        <br><br>

        <?php
        //get the id from url 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        ?>
        <form action="" method="POST">
            <table class="table-form">
                <tr>
                    <td>
                        Current password :
                    </td>
                    <td>
                        <input type="password" name="current_password" placeholder="current_password ">
                    </td>
                </tr>
                <tr>
                    <td>
                        New password :
                    </td>
                    <td>
                        <input type="password" name="new_password" placeholder="new_password ">
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm password :
                    </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="conifrm_password ">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="change" value="change" class="btn-update">

                    </td>
                </tr>

            </table>
        </form>


    </div>

</div>
</div>

<?php

if(isset($_POST['change'])) 
{
    //to get data from form we use POST and from url we use GET 
    // 1. get the details form the form 
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);


    //2. correct admin with id and password

    $sql = "SELECT * FROM admin WHERE id = '$id' AND password='$current_password'";
    //execut the query 

    $res =mysqli_query($conn , $sql);

    if($res == true )
    {
        $count = mysqli_num_rows($res);

        if($count ==1 ){

            if($new_password == $confirm_password){
                //change the password 
                //  echo "password change";

                // sql query to change the password 
                $sql2= "UPDATE admin SET 
                password = '$new_password'
                WHERE id = '$id' ";

                //execut the query 
                $res2 = mysqli_query($conn , $sql2);

                //check

                if($res2 == true ){
            $_SESSION['pass-change']="<div class='success' > password change successfully   </div>";
            header('location:'.SITEURL."admin/manage-admin.php");

                }else{
            $_SESSION['pass-change']="<div class='success' > password not change  </div>";
            header('location:'.SITEURL."admin/manage-admin.php");

                }

            }else{
                //redirect to home page 
            $_SESSION['can-not-change']="<div class='success' > try again to change the password  </div>";
            header('location:'.SITEURL."admin/manage-admin.php");

            }

        }else{
            // if the hacker change the id from the url . 
            $_SESSION['not-found']="<div class='success' > try again  </div>";
            header('location:'.SITEURL."admin/manage-admin.php");
        }
    }

    //3. new password and confirm password is true 

    //4. if all the above is true make the change 
}

?>

<?php include('partials/footer.php');?>