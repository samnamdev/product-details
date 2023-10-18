<?php
session_start();
include 'dbconnect.php';

if (isset($_POST['product_delete'])) {
    $all_id = $_POST['product_delete_id'];
   echo  $extract_id = implode(',' , $all_id);
// echo  $extract_id;
$sql= "DELETE FROM `product` WHERE id IN($extract_id)";
$result=mysqli_query($conn,$sql);

if ($result) {
    
    header('location:/product/index.php');
}
else {

    header('location:/product/index.php');
}

}


    
?>