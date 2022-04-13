<?php  include('../config/constants.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="padding-bottom">Add User</h1>

        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];//display session message all the time
            unset($_SESSION['add']);//remove session message 
        }
        ?>
        <form action="" method="POST">
        <table class="table-form">
          <tr >
            <td>
                 Full Name  
            </td>
            <td>
                 <input type="text" name="full_name" placeholder="Enter your full name :">
            </td>
          </tr>
          <tr>
              <td>
                  User Name  
              </td>
              <td>
                  <input type="text" name="user_name" placeholder="Enter your user name :">
              </td>
          </tr>
          <tr>
              <td>
                  password 
              </td>
              <td>
                  <input type="password" name="password" placeholder="Enter your password:">
              </td>
          </tr>
          <tr>
              <td colspan="2">
                  <input type="submit" name="submit" value="Add User" class="btn-update">

              </td>
          </tr>
        </table>
        </form>

    </div>

</div>


<?php include('partials/footer.php');?>

<?php 
// Process the value from the form and put it in the database 

//checked if the button is clicked or not 
if(isset($_POST['submit']))
{
    // echo " Button is cliked ";
    //1. Get the value from the form
    //$variable=$_POST['name']
    $_full_name=$_POST['full_name'];
    // echo $_full_name;
    $_user_name=$_POST['user_name'];
    // echo $_user_name;
    $_password=md5($_POST['password']);// Password encryption with MD5 
    // echo $_password;

    //2.Great the SQL Query to save data in the database 

    $sql= "INSERT INTO users SET
    full_name='$_full_name',
    user_name='$_user_name',
    password='$_password'

     ";
    //  echo $sql;
    
    //3.Execut Query and save data in database

    //stack over flow 

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    //4.check whether the (Query is Executed ) data is inserted or not and display appropriate meesage

    if($res==TRUE){
        //Data inserted 
        // echo "Data inserted ";
        //Creat a variable session to display the message Admin added successfully
        $_SESSION['add']=" <div class='success'>Admin added successfully</div>";

        //Redirect page to manage admin
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else{
        // echo "failed to inserted ";
        //Creat a variable session to display the message 
        $_SESSION['add']=" Failed to add Admin ";

        //Redirect page to add admin
        header("location:".SITEURL."admin/add-admin.php");
    }
}
// else
// {
//     echo " Button is not cliked " ;  
// }
?>