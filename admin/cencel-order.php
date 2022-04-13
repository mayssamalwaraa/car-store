<?php
include('../config/constants.php');
// echo "accept";
if(isset($_GET['id'])){
    $id_o=$_GET['id'];
    // echo $id_o;
}
$status="Cancel";

// sql query 
$sql="UPDATE orderr SET
status='$status'
WHERE id_o='$id_o'";
// Execute 
$res = mysqli_query($conn , $sql);

if($res == true){
    $_SESSION['accept_order']="<div class='sucess'>success to cancel</div>";
    header('location:'.SITEURL."admin/manage-order.php");
}else{
    $_SESSION['accept_order']="<div class='error'>failed to cancel</div>";
    header('location:'.SITEURL."admin/manage-order.php");

}
?>