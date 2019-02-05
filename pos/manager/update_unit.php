<?php
include 'navbar.php';
include '../include/connect.php';

$unit_id = $_GET['unit_id'];

$result=$con->query("SELECT * FROM unit WHERE unit_id = '$unit_id' ");
$row=mysqli_fetch_array($result);

if(isset($_POST['submit'])){


  $unit_name=$_POST['unit_name'];
//echo "id = ".$cate_id;
//echo "name = ".$cate_name;
  $result=$con->query("UPDATE unit SET unit_name='$unit_name' WHERE unit_id='$unit_id'");
  if($result){
    header('location:unit.php');
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
         <input type="text" name="unit_id" class="form-control" value="<?php echo $row['unit_id'] ?>" disabled>
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ชื่อประเภทสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="unit_name" class="form-control" value="<?php echo $row['unit_name'] ?>">
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
