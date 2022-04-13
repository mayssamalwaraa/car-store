<?php include('partials/menu.php'); ?>

<div class="content">

<div class="main-content">
    <div class="wrapper">
    <!-- <h1>Manage Order</h1> -->
    <br>

         <!-- Button to add new admin-->
         <!-- <a href="#" class="btn-primary">Add Order</a> -->
         
         <?php 
     if(isset($_SESSION['cencel'])){
        echo $_SESSION['cencel'];//display session message all the time
        unset($_SESSION['cencel']);//remove session message 
    }
    if(isset($_SESSION['accept_order'])){
        echo $_SESSION['accept_order'];//display session message all the time
        unset($_SESSION['accept_order']);//remove session message 
    }
    ?>
         <br>
         <br>
         <table class="tb-full">
            <tr>
                <th>full_name</th>
                <th>email</th>
                <th>adress</th>
                
                    
                
            </tr>
            <?php
            //Query to get all Admin
            $sql="SELECT * FROM contracts ";
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
                        $full_name=$rows['full_name'];
                        $email=$rows['email'];
                        $address=$rows['address'];
                        $id_user=$rows['id_user'];
                        


                        //display the vaule into table
                        ?>
                        <tr>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $address;?></td>
                            
                            <td>
                                <!-- <a href="#" class="btn-update">Update Admin </a> -->
                                <a href="<?php echo SITEURL;?>admin/accept-order.php?id_user=<?php echo $id_user;?>" class="btn-update">Accept </a>
                                <a href="<?php echo SITEURL;?>admin/cencel-order.php?id=<?php echo $id_user;?>" class="btn-delete">Cancel </a>
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
</div>


<?php include('partials/footer.php');?>