<?php
 include 'navbar.php';
 include '../include/connect.php';
 if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $password=$_POST['password'];
   $name=$_POST['name'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $position=$_POST['position'];
   $emp_pic = $_FILES['emp_pic']['name'];

   move_uploaded_file($_FILES['emp_pic']['tmp_name'],"../img/".$emp_pic);
   $result=$con->query("INSERT INTO employee VALUES('$username','$password','$name','$phone','$email','$emp_pic','$position')");
   if($result){
     header('location:employee.php');
   }else{
     echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
   }
   echo $username;
   echo $password;
   echo $name;
   echo $phone;
   echo $email;
   echo $position;


 }
 ?>

 <div class="container" style="width:500px;margin: 10 auto;">
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
     <div class="form-group row">
       <label class="col-md-4 col-form-label">username</label>
       <div class="col-md-8">
         <input type="text" name="username" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">password</label>
       <div class="col-md-8">
         <input type="password" name="password" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">name</label>
       <div class="col-md-8">
         <input type="text" name="name" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">phone</label>
       <div class="col-md-8">
         <input type="text" name="phone" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">email</label>
       <div class="col-md-8">
         <input type="email" name="email" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">picture</label>
       <div class="col-md-8">
         <input type="file" name="emp_pic" class="form-control">
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
         <input type="submit" name="submit" value="Submit" class="btn btn-info">
       </div>
     </div>
   </form>

 </div>
