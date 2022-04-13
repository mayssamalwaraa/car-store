<?php include('front/menu.php');?>
<?php
if(isset($_GET['id_c'])){
    $id_c=$_GET['id_c'];
}
if(isset($_GET['id_u'])){
    $id_u=$_GET['id_u'];
}
//sql query 
$sql = " SELECT * FROM detalis WHERE id_c='$id_c'";
//execute the query 
$res = mysqli_query($conn , $sql);
$count = mysqli_num_rows($res);
if($count == 1){
    while($rows = mysqli_fetch_assoc($res)){
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
        <div class="image">
        <img src="images/detalis/<?php echo $image1;?>" alt="" class="image1" width="250px">
        
        <img src="images/detalis/<?php echo $image2;?>" alt="" class="image2" width="250px">
        
        <img src="images/detalis/<?php echo $image3;?>" alt="" class="image3" width="250px">
        
        </div>
        <div class="detalis">
            <h2>Detalis : <br>  <a href="<?php echo SITEURL;?>order.php?id_c=<?php echo $id_c;?>&id_u=<?php echo $id_u;?>" class=" btn-sprimary" >order it</a> </h2>
            <p class="borderr text-center">Model: <?php echo $model;?></p>
            <p class="borderr text-center">Type: <?php echo $type_c;?></p>
            <p class="borderr text-center">Year: <?php echo $year_c;?></p>
            <p class="borderr text-center">Color: <?php echo $color;?></p>
            <p class="borderr text-center">Type oil: <?php echo $type_oil;?></p>
            <p class="borderr text-center">Type power: <?php echo $type_power;?></p>
            <p class="borderr text-center">Mohark: <?php echo $mohark;?></p>
            <p class="borderr text-center">Maraya: <?php echo $maraya;?></p>
            <p class="borderr text-center">Led: <?php echo $led;?></p>
        </div>
        <div class="clearfix">
        </div>
        <?php
    }
}

?>
<?php include('front/footer.php');?>
