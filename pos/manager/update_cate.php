<?php
include 'navbar.php';
include '../include/connect.php';

$cate_id = $_GET['cate_id'];

$result=$con->query("SELECT * FROM category WHERE cate_id = '$cate_id' ");
$row=mysqli_fetch_array($result);

if(isset($_POST['submit'])){


  $cate_name=$_POST['cate_name'];
//echo "id = ".$cate_id;
//echo "name = ".$cate_name;
  $result=$con->query("UPDATE category SET cate_name='$cate_name' WHERE cate_id='$cate_id'");
  if($result){
    header('location:category.php');
  }else{
    echo "<script>alert('ไม่สามารถแก้ไขได้')</script>";
  }
}
 ?>

 <div class="container">
   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสประเภทสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="cate_id" class="form-control" value="<?php echo $row['cate_id'] ?>" disabled>
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ชื่อประเภทสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="cate_name" class="form-control" value="<?php echo $row['cate_name'] ?>">
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
