<?php include('partials/menu2.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Car</h1>
    <br>

         <!-- Button to add new admin-->
         <a href="<?php echo SITEURL;?>admin/add-newcar.php" class="btn-primary">Add new Car</a>
         <br>
         <br>
         <br>
         
         <?php
        if(isset($_SESSION['add-newcar'])){
            echo $_SESSION['add-newcar'];
            unset($_SESSION['add-newcar']);
        }
        
        ?>
         <br>
         <table class="tb-full">
            <tr>
                <th>S_N</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Action</th>
                    
                
            </tr>
            <tr>
                <td>1.</td>
                <td>Mayssam Alwaraa</td>
                <td>mayssam_alwaraa</td>
                <td>
                    <a href="#" class="btn-update">Update Admin </a>
                    <a href="#" class="btn-delete">Delete Admin </a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Mayssam Alwaraa</td>
                <td>mayssam_alwaraa</td>
                <td>
                <a href="#" class="btn-update">Update Admin </a>
                <a href="#" class="btn-delete">Delete Admin </a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Mayssam Alwaraa</td>
                <td>mayssam_alwaraa</td>
                <td>
                <a href="#" class="btn-update">Update Admin </a>
                <a href="#" class="btn-delete">Delete Admin </a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Mayssam Alwaraa</td>
                <td>mayssam_alwaraa</td>
                <td>
                <a href="#" class="btn-update">Update Admin </a>
                <a href="#" class="btn-delete">Delete Admin </a>
                </td>
            </tr>
        </table>

    </div>

</div>


<?php include('partials/footer.php');?>