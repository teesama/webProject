<?php
include 'navbar.php';
include '../include/connect.php';

$unit_id = $_GET['unit_id'];
echo $unit_id;

$result=$con->query("DELETE FROM unit WHERE unit_id='$unit_id'");

if($result){
  echo "<script>alert('ลบเสร็จเรียบร้อยแล้ว')</script>";
  header('location:unit.php');
}else{
  echo "<script>alert('ลบไม่ได้นะ')</script>";
}
 ?>
