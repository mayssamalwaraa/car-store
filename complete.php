<?php include('config/constants.php');?>
<?php

    $id_u=$_GET['id_u'];
?>
<?php

    $id_c=$_GET['id_c'];
?>
 <?php
  $sql4= "SELECT * FROM userr WHERE id='$id_u'";
  $res2 = mysqli_query($conn ,$sql4);
  $count2=mysqli_num_rows($res2);
  if($count2 > 0){
    while($rows2=mysqli_fetch_assoc($res2)){
      $full_name=$rows2['full_name'];
    }
  }
        $sql1="SELECT * FROM tb_car WHERE id='$id_c'";
        $res1 = mysqli_query($conn , $sql1);
        $count1 = mysqli_num_rows($res1);
        while($rows1=mysqli_fetch_assoc($res1)){
            $title=$rows1['title'];
            $price=$rows1['price'];
            
    }
    $installment=$price/24;
        ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title></title>
  <link rel="stylesheet" href="CSS/login.css">
  <html lang="en" dir="ltr">
</head>
<body>

  <div class="center">
  
<br>



      <h3 align="center">contract of sale</h3>
      <h4>the first team will sell to secound team <?php echo $title ?> at a price <?php echo $price ?> </h4>
      <form  method="post">
        <div class="txt_field">
          <input type="text" name="full_name" value= <?php echo $full_name;?> required>
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
          <input type="text" value="translate to this number at latest 100,000 SY" >
          <span></span>
          <label>pay with syriatel</label>

        </div>
        <div class="txt_field">
          <input type="text" value="0996802996" >
          <span></span>
          <label>phone payer</label>

        </div>
        </div>
        
          <input type="submit" name="buy"  value="buyers signature">
          <input type="radio" name="install" value="cash" >
          
          <label>cash</label>
          <input type="radio" name="install" value="installment" >
          
          <label>installment</label>
          <p></p>
        

        <input type="submit" name="ok"  value="OK">

        <div class="sing_up_link">
          do you to cencel the order? <a href="<?php echo SITEURL;?>syria_car.php?">Cencel</a>
          <br><br>



        </div>

      </form>

    </div>


    <?php
    if(isset($_POST['ok'])){
            // echo "is clicked ";

            //1.get the value from the form 
            $c_name=$_POST['full_name'];
            $c_email=$_POST['email'];
            $c_address=$_POST['address'];
            $c_phone=$_POST['phone'];
            $sql2="DELETE FROM orderr WHERE id_u='id_u' & id_c='id_c'";
            $res2 = mysqli_query($conn , $sql2);
            $ddd=$_POST['install'];

            if($ddd=="cash"){
              $bv=true;
              
            }
            else{
              $bv=false;
            }
            //breakkkkkkkkkkkk
            //3.sql query to insert the data to database category table
            $sql= "INSERT INTO contracts SET
            id_user='$id_u',
            id_car='$id_c',
            full_name='$c_name',
            email='$c_email',
            address='$address',
            phone='$c_phone',
          cash='$bv',
          adminaccept='0'";

            
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
            
        $sql1="DELETE FROM orderr where id_u=$id_u";
        $res1 = mysqli_query($conn , $sql1);
        $count1 = mysqli_num_rows($res1);
        while($rows1=mysqli_fetch_assoc($res1)){
            $title=$rows1['title'];
            $price=$rows1['price'];

            
    }
     if($ddd=="installment"){
        $sql3="INSERT INTO insnum  SET 
           id_u='$id_u',
            id_c='$id_c',
            installment='$installment',
            nummber='3'
        ";
        $res3 = mysqli_query($conn , $sql3);
        }
      }
        ?>
</body>
</html>