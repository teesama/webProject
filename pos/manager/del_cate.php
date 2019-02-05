<?php
include 'navbar.php';
include '../include/connect.php';

$cate_id = $_GET['cate_id'];
echo $cate_id;

$result=$con->query("DELETE FROM category WHERE cate_id='$cate_id'");

if($result){
  echo "<script>alert('ลบเสร็จเรียบร้อยแล้ว')</script>";
  header('location:category.php');
}else{
  echo "<script>alert('ลบไม่ได้นะ')</script>";
}
 ?>
