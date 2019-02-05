<?php
include 'navbar.php';
include '../include/connect.php';
$pro_id = $_GET['pro_id'];
$result=$con->query("SELECT * FROM product WHERE pro_id = '$pro_id'");


$row=mysqli_fetch_array($result);

echo $row['pro_name'];

if(isset($_POST['submit'])){
  $pro_id1 = $_POST['pro_id'];
  $pro_name = $_POST['pro_name'];
  $pro_price = $_POST['pro_price'];
  $pro_buy = $_POST['pro_buy'];
  $pro_stock = $_POST['pro_stock'];
  $pro_stock_min = $_POST['pro_stock_min'];
  $cate_id = $_POST['cate_id'];
  $unit_id = $_POST['unit_id'];
  $pro_status = $_POST['pro_status'];



//UPDATE product SET pro_name='ไม่บอก',pro_price='500.00',pro_buy='230.00',pro_stock='300.00',pro_stock_min='120',cate_id='201',unit_id='301',pro_status='พร้อมขาย' WHERE pro_id='pro_01'


  $result=$con->query("UPDATE product SET pro_name='$pro_name',pro_price='$pro_price',pro_buy='$pro_buy',pro_stock='$pro_stock',pro_stock_min='$pro_stock_min',cate_id='$cate_id',unit_id='$unit_id',pro_status='$pro_status' WHERE pro_id='$pro_id'");

  if($result){
    header('location:product.php');
  }else{
    echo "<script>alert('ไม่สามารถแก้ไขได้')</script>";
  }
}
 ?>
 <div class="container" style="width:500px;margin: 10 auto;">
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="pro_id" class="form-control" value="<?php echo $row['pro_id']; ?>" disabled>
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ชื่นสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name']; ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ราคาขาย</label>
       <div class="col-md-8">
         <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'];?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ราคาซื้อ</label>
       <div class="col-md-8">
         <input type="text" name="pro_buy" class="form-control" value="<?php echo $row['pro_buy']; ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">สินค้สินค้าในสต็อค</label>
       <div class="col-md-8">
         <input type="text" name="pro_stock" class="form-control" value="<?php echo $row['pro_stock']; ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">สินค้สินค้าในสต็อคขั้นต่ำ</label>
       <div class="col-md-8">
         <input type="text" name="pro_stock_min" class="form-control" value="<?php echo $row['pro_stock_min']; ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสประเภทสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="cate_id" class="form-control" value="<?php echo $row['cate_id']; ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสหน่วยสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="unit_id" class="form-control" value="<?php echo $row['unit_id']; ?>">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">สถานะสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="pro_status" class="form-control" value="<?php echo $row['pro_status']; ?>">
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
