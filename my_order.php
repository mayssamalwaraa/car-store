
<?php include('front/menu.php');?>

<?php
if(isset($_GET['id-u'])){
    $id_u=$_GET['id_u'];
}
 $adminaccept=5;
$sql2="SELECT * FROM contracts WHERE id_user='$id_u'";

// Execut 
$res2 = mysqli_query($conn , $sql2);
$count2 = mysqli_num_rows($res2);

if($count2 > 0){
    while($rows1=mysqli_fetch_assoc($res2)){
        $adminaccept=$rows1['adminaccept'];    
    }
}

//sql query to display all the user  order 
$sql="SELECT * FROM orderr WHERE id_u='$id_u'";

// Execut 
$res = mysqli_query($conn , $sql);
$count = mysqli_num_rows($res);
if($adminaccept==1 or $adminaccept==5){
if($count > 0){
    while($rows=mysqli_fetch_assoc($res)){
        $order_date=$rows['order_date'];
        $status=$rows['status'];
        $id_car=$rows['id_c'];

    }
        ?>
        <?php
        $sql1="SELECT * FROM tb_car WHERE id='$id_car'";
        $res1 = mysqli_query($conn , $sql1);
        $count1 = mysqli_num_rows($res1);
        while($rows1=mysqli_fetch_assoc($res1)){
            $title=$rows1['title'];
            
    }
        ?>
    <div class=" text-center "> 
        <div class="obox">

          <p class="font"> The state of your order is :  <?php echo "<span class='success_o'>$status</span>"; ?></p>   
          <p class="font"> You order it in : <?php echo "<span class='date'>$order_date</span>";?></p> 
           <p class="font"> car name :  <?php echo "<span class='success_o'>$title</span>"; ?></p>
            <a href="<?php echo SITEURL;?>complete.php?id_c=<?php echo $id_car;?>&id_u=<?php echo $id_u;?>" class=" btn-sprimary">complete the purchase</a>
            <a  href="<?php echo SITEURL;?>installment_payment.php?id_u=<?php echo $id_u;?>"><input type="submit" name="installement_payement"  value="installment_payment" class="btn-detalis"></a>

        </div>

        </div>

        <br>
        <br>
        <?php
    }

else{
    echo "<div class='error'>No order </div>";
}
}
else{
  echo "<div class='error'>waiting for admin confirm</div>";
}
?>

<?php include('front/footer.php');?>