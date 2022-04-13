<?php include('config/constants.php');?>
<?php
if(isset($_GET['id_c'])){
  $id_c=$_GET['id_c'];
}
if(isset($_GET['id_u'])){
  $id_u=$_GET['id_u'];
}

 $sql4= "SELECT * FROM userr WHERE id='$id_u'";
 $res2 = mysqli_query($conn ,$sql4);
 $count2=mysqli_num_rows($res2);
 if($count2 > 0){
   while($rows2=mysqli_fetch_assoc($res2)){
     $full_name=$rows2['full_name'];
     $email=$rows2['email'];
   }
 }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/login.css">
    <title></title>
  </head>
  <body>
    <div class="center">
      <h1>Order Form</h1>
      <form  method="post">
        <div class="txt_field">
          <input type="text" name="full_name" value="<?php echo $full_name;?>" required>
          <span></span>
          <label>Full name</label>

        </div>
        <div class="txt_field">
          <input type="email" name="email" value="<?php echo $email;?>" required>
          <span></span>
          <label>Email</label>

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
          <input type="text" value="translate to this number at latest 100,000 SY" >
          <span></span>
          <label>pay with syriatel</label>

        </div>
        <div class="txt_field">
          <input type="text" value="0996802996" >
          <span></span>
          <label>phone to pay :</label>

        </div>
        <input type="submit" name="ok"  value="OK">

        <div class="sing_up_link">
          do you to cencel the order? <a href="<?php echo SITEURL;?>syria_car.php?id_u=<?php echo $id_u;?>">Cencel</a>
          <br><br>

        </div>

      </form>

    </div>
    <?php
    if(isset($_POST['ok'])){
            // echo "is clicked ";

            //1.get the value from the form 
            $order_date= date("Y-m-d h:i:sa");
            $status= "in_ordered";//and cencel or accept
            $c_name=$_POST['full_name'];
            $c_email=$_POST['email'];
            $c_address=$_POST['address'];
            $c_phone=$_POST['phone'];
            $pay="Yes";// or NO
          
            //breakkkkkkkkkkkk
            //3.sql query to insert the data to database category table
            $sql= "INSERT INTO orderr SET
            id_u='$id_u',
            id_c='$id_c',
            order_date='$order_date',
            status='$status',
            c_name='$c_name',
            c_email='$c_email',
            c_address='$address',
            c_phone='$c_phone',
            pay='$pay'";
            
            //Execut the query 
            $res = mysqli_query($conn ,$sql);

            //check if it execut 
            if($res==TRUE){
                //Data inserted 
                // echo "Data inserted ";
                //Creat a variable session to display the message Admin added successfully
                $_SESSION['add-order']=" <div class='success text-center'> successfully add the order</div>";
        
                //Redirect page to manage admin
                header("location:".SITEURL."syria_car.php?id_u=".$id_u);
            }
            else{
                // echo "failed to inserted ";
                //Creat a variable session to display the message 
                $_SESSION['add-order']=" <div class='error text-center'>Failed to add order  </div>";
        
                //Redirect page to manage admin
                header("location:".SITEURL."syria_car.php?id_u=".$id_u);
            }
        }
        ?>

  </body>
</html>


