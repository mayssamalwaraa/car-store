<?php include('partials/menu.php'); ?>
<div class="content">

<div class="main-content">
    <div class="wrapper">
    <!-- <h1>Manage Car</h1> -->

    <br>
    <a href="<?php echo SITEURL;?>/admin/add-detalis.php" class="btn-primary">Add detalis car</a>
        <?php 
                if(isset($_SESSION['add_d'])){
                    echo $_SESSION['add_d'];
                    unset($_SESSION['add_d']);
                } 
                if(isset($_SESSION['delete_detalis'])){
                    echo $_SESSION['delete_detalis'];
                    unset($_SESSION['delete_detalis']);
                }
                if(isset($_SESSION['remove_image_car'])){
                    echo $_SESSION['remove_image_car'];
                    unset($_SESSION['remove_image_car']);
                }
        ?>
         <br>
         <table class="tb-full">
            <tr>
                <th>S_N</th>
                <th>Id_c</th>
                <th>Model</th>
                <th>Type</th>
                <th>Year</th>
                <th>Color</th>
                <th>Type oil</th>
                <th>Type power</th>
                <th>Moharek</th>
                <th>Maraya</th>
                <th>Led</th>
                <th>Image1</th>
                <th>Image2</th>
                <th>Image3</th>
                    
                
            </tr>
            <?php
            //get all the data from database
            //sql query
            $sql="SELECT * FROM detalis";
            //Execute
            $res=mysqli_query($conn,$sql);
            $sn=1; 
            $count = mysqli_num_rows($res);
            if($count > 0){
                while ($rows=mysqli_fetch_assoc($res)) {
                    $id=$rows['id'];
                    $id_c=$rows['id_c'];
                    $model=$rows['model'];
                    $type_c=$rows['type_c'];
                    $year_c=$rows['year_c'];
                    $color=$rows['color'];
                    $type_oil=$rows['type_oil'];
                    $type_power=$rows['type_power'];
                    $mohark=$rows['mohark'];
                    $maraya=$rows['maraya'];
                    $led=$rows['led'];
                    $image1=$rows['image1'];
                    $image2=$rows['image2'];
                    $image3=$rows['image3'];
                    ?>
                    
            <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $id_c;?></td>
                <td><?php echo  $model;?></td>
                <td><?php echo  $type_c;?></td>
                <td><?php echo  $year_c;?></td>
                <td><?php echo  $color;?></td>
                <td><?php echo  $type_oil;?></td>
                <td><?php echo  $type_power;?></td>
                <td><?php echo  $mohark;?></td>
                <td><?php echo  $maraya;?></td>
                <td><?php echo  $led;?></td>
                <td>
                <?php 
                if($image1==""){
                    echo "<div class='error'>no image added</div>";
                }else{
                    ?>
                    <img src="<?php echo SITEURL?>images/detalis/<?php echo $image1;?>" width="100px">
                    <?php
                }
                if($image2==""){
                    echo "<div class='error'>no image added</div>";
                }else{
                    ?>
                    <img src="<?php echo SITEURL?>images/detalis/<?php echo $image2;?>" width="100px">
                    <?php
                }
                if($image3==""){
                    echo "<div class='error'>no image added</div>";
                }else{
                    ?>
                    <img src="<?php echo SITEURL?>images/detalis/<?php echo $image3;?>" width="100px">
                    <?php
                }
                ?>
                </td>
                <td>
                    
                    <a href="<?php echo SITEURL;?>admin/delete-detalis.php?id=<?php echo $id;?>&& image1=<?php echo $image1;?>&& image2=<?php echo $image2;?>&& image3=<?php echo $image3;?>" class="btn-delete">Delete </a>
                </td>
            </tr>

                    <?php    
                }
            }else{
                echo "<tr><td colspan='14' class='error'> No car added</td></tr> ";
            }
            ?>
            
        </table>

    </div>

</div>
</div>



<?php include('partials/footer.php');?>