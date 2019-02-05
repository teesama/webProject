<?php
include 'navbar.php';
include '../include/connect.php';

$pro_id = $_GET['pro_id'];
echo $pro_id;

$result=$con->query("DELETE FROM product WHERE pro_id='$pro_id'");

if($result){
  echo "<script>alert('ลบเสร็จเรียบร้อยแล้ว')</script>";
  header('location:product.php');
}else{
  echo "<script>alert('ลบไม่ได้นะ')</script>";
}
 ?>
