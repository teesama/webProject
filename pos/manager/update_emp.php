<?php
include 'navbar.php';
include '../include/connect.php';
$username = $_GET['emp_username'];
$result=$con->query("SELECT * FROM employee WHERE emp_username = '$username' ");
$row=mysqli_fetch_array($result);

if(isset($_POST['submit'])){
  $password=$_POST['password'];
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $position=$_POST['position'];
  $result=$con->query("UPDATE employee SET emp_password='$password',emp_name='$name',emp_phone='$phone',emp_email='$email',emp_position='$position' WHERE emp_username='$username'");
  if($result){
    header('location:employee.php');
  }else{
    echo "<script>alert('ไม่สามารถแก้ไขได้')</script>";
  }
}
 ?>
 <div class="container">
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
     <div class="form-group row">
       <label class="col-md-4 col-form-label">username</label>
       <div class="col-md-8">
         <input type="text" name="username" class="form-control" value="<?php echo $row['emp_username'] ?>" disabled>
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">password</label>
       <div class="col-md-8">
         <input type="text" name="password" class="form-control" value="<?php echo $row['emp_password'] ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">name</label>
       <div class="col-md-8">
         <input type="text" name="name" class="form-control" value="<?php echo $row['emp_name'] ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">phone</label>
       <div class="col-md-8">
         <input type="text" name="phone" class="form-control" value="<?php echo $row['emp_phone'] ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">email</label>
       <div class="col-md-8">
         <input type="email" name="email" class="form-control" value="<?php echo $row['emp_email'] ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">position</label>
       <div class="col-md-8">
         <select class="form-control" name="position">
           <option value="1">ผู้จัดการ</option>
           <option value="2">พนักงานคลังสินค้า</option>
           <option value="3">พนักงานขาย</option>
         </select>
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label"></label>
       <div class="col-md-8">
         <input type="submit" name="submit" value="Update" class="btn btn-info">
       </div>
     </div>
   </form>

 </div>
