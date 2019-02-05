<?php
include 'navbar.php';
include '../include/connect.php';

$username = $_GET['emp_username'];
echo $username;

$result=$con->query("DELETE FROM employee WHERE emp_username='$username'");

if($result){
  echo "<script>alert('ลบเสร็จเรียบร้อยแล้ว')</script>";
  header('location:employee.php');
}else{
  echo "<script>alert('ลบไม่ได้นะ')</script>";
}
 ?>
