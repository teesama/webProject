<?php
include '../include/connect.php';
include 'navbar.php';

if(isset($_POST['submit'])){
  $cate_name = $_POST['cate_name'];

  $result=$con->query("INSERT INTO category VALUES('','$cate_name')");
  if($result){
    header('location:category.php');
  }else{
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
  }
}

 ?>


<div class="container" style="width:500px;margin: 10 auto;">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="form-group row">
      <label class="col-md-4 col-form-label">ชื่อประเภทสินค้า</label>
      <div class="col-md-8">
        <input type="text" name="cate_name" class="form-control" >
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
