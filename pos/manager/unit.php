<?php
include 'navbar.php';
include '../include/connect.php';

$result=$con->query("SELECT * FROM unit");


 ?>
<div class="container" style="margin-top:10px;">
  <a href="add_unit.php" class="btn btn-danger">+เพิ่มหน่วยสินค้า</a><br><br>
  <table class="table table-striped">
    <tr style="background:#EBB129;color:#fff;">
      <th>ลำดับที่</th>
      <th>รหัสหน่วยสินค้า</th>
      <th>ชื่อหน่วยสินค้า</th>
      <th>การจัดการ</th>
    </tr>
    <?php
    $i = 1;
    while ($row=mysqli_fetch_array($result)) {

      ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['unit_id'] ?></td>
        <td><?php echo $row['unit_name'] ?></td>
        <td>
          <a href="update_unit.php?unit_id=<?php echo $row['unit_id'] ?>" class="btn btn-outline-primary" >แก้ไข</a>
          <a href="del_unit.php?unit_id=<?php echo $row['unit_id'] ?>" class="btn btn-outline-danger">ลบ</a>
        </td>
      </tr>
    <?php } ?>
  </table>

</div>
