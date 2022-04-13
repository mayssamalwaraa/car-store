
<?php include('front/menu.php');?>
<?php
if(isset($_GET['id-u'])){
    $id_u=$_GET['id_u'];
}
//sql query to display all the user  order 
$sql="SELECT * FROM contracts WHERE id_u='$id_u'";

// Execut 
$res = mysqli_query($conn , $sql);
$count = mysqli_num_rows($res);
if($count > 0){
    while($rows=mysqli_fetch_assoc($res)){
        $adminaccept=$rows['adminaccept'];
        

    }
    if($adminaccept==0){
        header("location:".SITEURL."syria_car.php?id_u=".$id_u);
    }
        ?>
    }
        
    <div class=" text-center "> 
        <div class="obox">

         

        </div>

        </div>

        <br>
        <br>
        <?php
    }

else{
    echo "<div class='error'>waiting for admin to confirm your order</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body align="center">
 
</body>
</html>
<?php include('front/footer.php');?>