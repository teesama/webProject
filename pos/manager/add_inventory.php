<?php
include '../include/connect.php';
include 'navbar.php';
$ck1 =mysqli_fetch_array($con->query("select MAX(inv_id)as id from inventory"));
if(isset($_POST['add'])){
  @$id = $_POST['id'];
  @$num = $_POST['num'];
  @$total = $_POST['total'];
  if($id==""||$num==""||$total==""){
    echo "<script>
            alert('กรุณากรอกข้อมูลให้ครบถ้วน');
          </script>";
  }else{
    $chk_id=mysqli_num_rows($con->query("select * from product where pro_id='$id'"));
    if($chk_id!=1){
      echo "<script>
            alert('รหัสสินค้าไม่ถูกต้อง');
            </script>";
    }else{
      echo "ckid = ".$ck1['id'];
      //$chk_prod=mysqli_num_rows($con->query("select * from inventory_list where inv_id=$ck1['id'] and pro_id='$id'"));
      //$chk_prod=mysql_num_rows($con->query("select * from inventory_list where inv_id='$ck1['id']' and pro_id='$id'"));

      $chk_prod = mysqli_num_rows($con->query("select * from inventory_list where inv_id='$ck1[id]' and pro_id='$id'"));

      if($chk_prod!=0){
        echo "<script>
              alert('คุณเพิ่มรายการนี้ไปแล้ว');
              </script>";
      }else{
        $price = $total / $num;
        $con->query("insert into inventory_list values('$ck1[id]','$id','$price','$num','$total');");

        echo "<script>
              window.location.href='add_inventory.php';
              </script>";

      }

      }
    }
}
//------------------------------



//------------------------------


if(isset($_POST['done'])){
  $f = mysqli_fetch_array($con->query("select SUM(inv_num)as num,SUM(inv_total)as total from inventory_list where inv_id='$ck1[id]'"));
  $con->query("update inventory set inv_total='$f[total]' where inv_id = '$ck1[id]'");
  $sql = $con->query("select * from inventory_list where inv_id = '$ck1[id]'");
  while($r=mysqli_fetch_array($sql)){
    $r1 = mysqli_fetch_array($con->query("select * from product where pro_id='$r[pro_id]'"));
    if($r1['pro_buy']==0){
      $con->query("update product set pro_stock=pro_stock+'$r[inv_num]',pro_buy=pro_buy+'$r[inv_price]' where pro_id='$r[pro_id]'");
    }else{
      $con->query("update product set pro_stock=pro_stock+'$r[inv_num]',pro_buy=(pro_buy+'$r[inv_price]')/2 where pro_id='$r[pro_id]'");
    }
  }
  unset($_SESSION['inv_no']);
  echo "<script>
        window.location.href='inventory.php';
      </script>";
}
 ?>

 <div class="container">
   <div class="card border-success mb-3">
     <div class="card-header" style="text-align:center;">เพิ่มสินค้าเข้าสต๊อค</div>
     <div class="card-body">
       <form action="<?php $_SERVER['PHP_SELF']?>" method="post" style="max-width:500px;">

         <div class="form-group row">
           <label class="col-md-3 col-form-label">รหัสสินค้า</label>
           <div class="col-md-9">
             <input type="text" name="id" class="form-control">
           </div>
         </div>
         <div class="form-group row">
           <label class="col-md-3 col-form-label">จำนวน</label>
           <div class="col-md-9">
             <input type="text" name="num" class="form-control">
           </div>
         </div>
         <div class="form-group row">
           <label class="col-md-3 col-form-label">ราคารวม</label>
           <div class="col-md-9">
             <input type="text" name="total" class="form-control">
           </div>
         </div>
         <div class="form-group row">
           <label class="col-md-3 col-form-label"></label>
           <div class="col-md-9">
             <input type="submit" class="btn btn-outline-danger" name="add" value="เพิ่ม">
             <input type="submit" class="btn btn-outline-info" name="done" value="ยืนยัน">
             <input type="submit" class="btn btn-outline-warning" name="cancle" value="ยกเลิก">
           </div>
         </div>
       </form>

       <table class="table table-striped">
         <tr>
           <th>ลำดับ</th>
           <th>รหัส</th>
           <th>สินค้า</th>
           <th>ราคา</th>
           <th>จำนวน</th>
           <th>หน่วย</th>
           <th>รวม</th>
           <th>จัดการ</th>
         </tr>

         <?php
         $i = 1;
         //$sql2 = "SELECT * FROM inventory_list,product,unit WHERE inventory_list.pro_id=product.pro_id and product.unit_id=unit.unit_id";

         //$result2=$con->query($sql2);
         $sql = $con->query("select * from inventory_list i,product p,unit u where i.pro_id=p.pro_id and p.unit_id=u.unit_id and i.inv_id='$ck1[id]'");
                 while($r=mysqli_fetch_array($sql)){

        // while($row=mysqli_fetch_array($result2)){ ?>
           <tr>
           <?php
             echo "<td>".$i."</td>";
             echo "<td>".$r['inv_id']."</td>";
             echo "<td>".$r['pro_name']."</td>";
             echo "<td>".$r['inv_price']."</td>";
             echo "<td>".$r['inv_num']."</td>";
             echo "<td>".$r['unit_name']."</td>";
             echo "<td>".$r['inv_total']."</td>";
             echo "<td><a href='' class='btn btn-warning'>แก้ไข</a></td>";
             $i++;
           ?>
         </tr>
         <?php } ?>
       </table>
     </div>
   </div>
 </div>
