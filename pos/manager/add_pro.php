<?php
 include 'navbar.php';
 include '../include/connect.php';
 if(isset($_POST['submit'])){
   $pro_id = $_POST['pro_id'];
   $pro_name = $_POST['pro_name'];
   $pro_price = $_POST['pro_price'];
   $pro_buy = $_POST['pro_buy'];
   $pro_stock = $_POST['pro_stock'];
   $pro_stock_min = $_POST['pro_stock_min'];
   $cate_id = $_POST['cate_id'];
   $unit_id = $_POST['unit_id'];
   $pro_status = $_POST['pro_status'];
   $pro_pic = $_FILES['pro_pic']['name'];
   move_uploaded_file($_FILES['pro_pic']['tmp_name'],"../img/".$pro_pic);

   $result=$con->query("INSERT INTO product VALUES('$pro_id','$pro_name','$pro_price',
     '$pro_buy','$pro_stock','$pro_stock_min','$cate_id','$unit_id','$pro_status','$pro_pic')");



   if($result){
     header('location:product.php');
   }else{
     echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
   }
   echo $pro_id;
   echo $pro_name;
   echo $pro_price;
   echo $pro_buy;
   echo $pro_stock;
   echo $pro_stock_min;
   echo $cate_id;
   echo $unit_id;
   echo $pro_status;



 }
 ?>

 <div class="container" style="width:500px;margin: 10 auto;">
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="pro_id" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ชื่นสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="pro_name" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ราคาขาย</label>
       <div class="col-md-8">
         <input type="text" name="pro_price" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">ราคาซื้อ</label>
       <div class="col-md-8">
         <input type="text" name="pro_buy" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">สินค้สินค้าในสต็อค</label>
       <div class="col-md-8">
         <input type="text" name="pro_stock" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">สินค้สินค้าในสต็อคขั้นต่ำ</label>
       <div class="col-md-8">
         <input type="text" name="pro_stock_min" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รูปสินค้า</label>
       <div class="col-md-8">
         <input type="file" name="pro_pic" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสประเภทสินค้า</label>
       <div class="col-md-8">

         <!--<input type="text" name="cate_id" class="form-control">-->
         <?php
         $cate1=$con->query("SELECT * FROM category");
          ?>
         <select class="form-control" name="cate_id">
           <?php
            while($cate2=mysqli_fetch_array($cate1)){ ?>
              <option value="<?php echo $cate2['cate_id'] ?>"><?php echo $cate2['cate_name'] ?></option>
            <?php
            } ?>
         </select>
       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">รหัสหน่วยสินค้า</label>
       <div class="col-md-8">

         <!--<input type="text" name="unit_id" class="form-control">-->


          <select class="form-control" name="unit_id">
            <?php
             $unit1=$con->query("SELECT * FROM unit");
             while($unit2=mysqli_fetch_array($unit1)){ ?>
               <option value="<?php echo $unit2['unit_id'] ?>"><?php echo $unit2['unit_name'] ?></option>

              <?php
             }
             ?>


          </select>

       </div>
     </div>
     <div class="form-group row">
       <label class="col-md-4 col-form-label">สถานะสินค้า</label>
       <div class="col-md-8">
         <input type="text" name="pro_status" class="form-control">
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
