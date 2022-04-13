<?php
include('../config/constants.php');
// echo "accept";
if(isset($_GET['id_user'])){
    $id_user=$_GET['id_user'];
    // echo $id_o;
}
$status="Accept";

// sql query 
$sql="UPDATE contracts SET
adminaccept='1'
WHERE id_user='$id_user'";
// Execute 
$res = mysqli_query($conn , $sql);

if($res == true){
    $_SESSION['accept_order']="<div class='sucess'>success to accept</div>";
    header('location:'.SITEURL."admin/manage-order.php");
}else{
    $_SESSION['accept_order']="<div class='error'>failed to accept</div>";
    header('location:'.SITEURL."admin/manage-order.php");

}
$sql1="DELETE FROM contracts WHERE id_user=$id_user";
// Execute 
$res1 = mysqli_query($conn , $sql1);
?>