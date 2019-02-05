<?php
include '../include/connect.php';
include 'navbar.php';

if(isset($_POST['confirm'])){
  $inv_no = $_POST['inv_no'];
  $inv_from = $_POST['inv_from'];
  $inv_note = $_POST['inv_note'];
  $username =$_SESSION['s_username'];
  $date=date('Y-m-d'); // phpmyadmin  ต้องการวันที่แบบนี้
  if($inv_no==""||$inv_from==""){
    echo "<script>
            alert('กรุณากรอกข้อมูลให้ครบถ้วน');
          </script>";
  }else{
    $sql = "INSERT INTO inventory VALUES ('','$inv_no','$username','$inv_from','','$date','$inv_note')";
    $result=$con->query($sql);
    if($result){
      echo "<script>
              window.location.href='add_inventory.php';
              alert('บันทึกข้อมูลสำเร็จ');
            </script>";
    }else{
      echo "<script>
              alert('บันทึกข้อมูลไม่ได้');
            </script>";
    }
  }


}

 ?>
<div class="container">
  <div class="card border-primary mb-3" style="max-width: 1200px;">
    <div class="card-header" style="text-align:center;">คลังสินค้า</div>
    <div class="card-body text-primary">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="form-group row">
          <label class="col-md-3 col-form-label">เลขที่ใบเสร็จ</label>
          <div class="col-md-9">
              <input type="text" name="inv_no" class="form-control" value="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label">ซื้อมาจาก</label>
          <div class="col-md-9">
              <input type="text" name="inv_from" class="form-control" value="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label">หมายเหตุ</label>
          <div class="col-md-9">
              <input type="text" name="inv_note" class="form-control" value="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label"></label>
          <div class="col-md-9">
              <input type="submit" name="confirm" class="btn btn-outline-primary" value="ยืนยัน">
          </div>
        </div>
      </form>

      <table class="table table-striped">
        <tr>
          <th>ลำดับ</th>
          <th>เลชที่ใบเสร็จ</th>
          <th>ผู้บันทึก</th>
          <th>ยอดรวม</th>
          <th>วันที่</th>
          <th>ดูรายละเอียด</th>
        </tr>

        <?php
        $i = 1;
        $sql2 = "SELECT * FROM inventory,employee WHERE inventory.emp_username=employee.emp_username";
        $result2=$con->query($sql2);
        while($row=mysqli_fetch_array($result2)){ ?>
          <tr>
          <?php
            echo "<td>".$i."</td>";
            echo "<td>".$row['inv_no']."</td>";
            echo "<td>".$row['emp_username']."</td>";
            echo "<td>".$row['inv_total']."</td>";
            echo "<td>".$row['inv_date']."</td>"; ?>
            <td> <a class="btn btn-warning" href="inventory_detail.php?inv_id=<?php echo $row['inv_id']; ?>">แก้ไข </a></td>
              <?php

          ?>
        </tr>
        <?php $i++; } ?>
      </table>
    </div> <!-- close card body -->

  </div> <!-- close card headder -->


</div>
