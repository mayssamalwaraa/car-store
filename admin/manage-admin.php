<?php include('partials/menu.php'); ?>
<div class="content">

    <!--main content start-->
    <div class="main-content">
        <div class="wrapper">
         <!-- <h1>Manage Admin </h1> -->
         <br>
         <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];//display session message all the time
                unset($_SESSION['add']);//remove session message 
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];//display session message all the time
                unset($_SESSION['delete']);//remove session message 
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];//display session message all the time
                unset($_SESSION['update']);//remove session message 
            }
            if(isset($_SESSION['not-found'])){
                echo $_SESSION['not-found'];//display session message all the time
                unset($_SESSION['not-found']);//remove session message 
            }
            if(isset($_SESSION['can-not-change'])){
                echo $_SESSION['can-not-change'];//display session message all the time
                unset($_SESSION['can-not-change']);//remove session message 
            }
            if(isset($_SESSION['pass-change'])){
                echo $_SESSION['pass-change'];//display session message all the time
                unset($_SESSION['pass-change']);//remove session message 
            }
            
            

           
            

         ?>
         <br><br><br>

         <!-- Button to add new admin-->
         <a href="add-admin.php" class="btn-primary">Add Admin</a>
         <br>
         <br>
         <br>
         <br>
         <p>Info of admins:</p>
         <br><br>
         <table class="tb-full">
            <tr>
                <th>S_N</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Edit</th>
                    
                
            </tr>
            <?php
            //Query to get all Admin
            $sql="SELECT * FROM admin ";
            //Execut the query
            $res=mysqli_query($conn ,$sql);
            $sn=1;

            if ($res==TRUE){
                //count the row to check if there data in database 
                $count = mysqli_num_rows($res);//Function to get all the rows in database 

                //check if we have a data in database 
                if($count>0){
                    //there are data
                    while($rows=mysqli_fetch_assoc($res)){
                        //get all the data from database
                        //while loop will always run as long as there is a data in database
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $user_name=$rows['user_name'];

                        //display the vaule into table
                        ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $user_name; ?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/change-password.php?id=<?php echo $id; ?>" class="pass-button">change password </a>
                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-update">Update  </a>
                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-delete">Delete </a>
                        </td>
                    </tr>

                        <?php
                    }
                }
                else{
                    //not found a data
                }
            }
            ?>
            
            
        </table>

        </div>
        
         
        
   
    
    </div> 
    <!--main content end-->
    </div>  


    <?php include('partials/footer.php');?>