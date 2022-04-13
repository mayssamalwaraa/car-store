<?php include('config/constants.php');?>
<?php
    $id_u=$_GET['id_u'];
?>
<?php
$sql2="SELECT * FROM contracts WHERE id_user='$id_u'";

// Execut 
$res2 = mysqli_query($conn , $sql2);
$count2 = mysqli_num_rows($res2);

if($count2 > 0){
    while($rows1=mysqli_fetch_assoc($res2)){
        $adminaccept=$rows1['adminaccept'];    
    }
}


if($adminaccept==1 or $adminaccept==5){
        $sql7="SELECT * FROM insnum WHERE id_u='$id_u'";
        $res7 = mysqli_query($conn , $sql7);
        $count7 = mysqli_num_rows($res7);
        
        while($rows1=mysqli_fetch_assoc($res7)){
            $installment=$rows1['installment'];
            $nummber=$rows1['nummber'];
            
    }
  if($count7>0){
  }
  else{
    header("location:".SITEURL."my_order.php?id_u=".$id_u);
  }
}
else{
  header("location:".SITEURL."my_order.php?id_u=".$id_u);
}
        ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="CSS/login.css">
    </head>
    <body>
        <div class="center">
  
<br>



      <h3 align="center">installment</h3>
        you should pay <?php echo  $nummber-1 ?> times
      <form  method="post">
        <div class="txt_field">
          <input type="text" name="full_name" required>
          <span></span>
          <label>Full name</label>

        </div>
        
        <div class="txt_field">
          <input type="text" name="address" required>
          <span></span>
          <label>Address</label>

        </div>
        <div class="txt_field">
          <input type="text" name="phone" >
          <span></span>
          <label>phone</label>

        <div class="txt_field">
          <input type="text" value="you should bay <?php echo  $installment ?> s.p" >
          <span></span>
          <label>pay with syriatel</label>

        </div>
        <div class="txt_field">
          <input type="text" value="" >
          <span></span>
          <label>phone payer</label>

        </div>
        </div>
          
          <p></p>
        
        <!-- <div class="txt_field">
          <input  type="password" required>
          <span></span>
          <label>Password</label>

        </div> -->
        <input type="submit" name="ok"  value="OK">

        <div class="sing_up_link">
          do you want to cencel the order? <a href="<?php echo SITEURL;?>syria_car.php?">Cencel</a>
          <br><br>

          <!-- OR <br> <br>Take a <a href="#">tour!</a> -->

        </div>

      </form>
      <?php
      if(isset($_POST['ok'])){
        $nn=$nummber-1;
        
        $sql6 = "UPDATE insnum SET 
        nummber = '$nn'
        WHERE id_u= '$id_u' ";
        $res6 = mysqli_query($conn , $sql6);
        
     if($nn==1){

        $sql1="DELETE FROM insnum where id_u=$id_u";
        $res1 = mysqli_query($conn , $sql1);
     }
     header("location:".SITEURL."syria_car.php?id_u=".$id_u);
      }
      ?>
        
    </div>
    </body>
    </html>