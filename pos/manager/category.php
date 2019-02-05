<?php
include 'navbar.php';
include '../include/connect.php';

$result=$con->query("SELECT * FROM category");


 ?>
<div class="container" style="margin-top:10px;">
  <a href="add_cate.php" class="btn btn-danger">+เพิ่มประเภทสินค้า</a><br><br>
  <table class="table table-striped">
    <tr style="background:#EBB129;color:#fff;">
      <th>ลำดับที่</th>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>การจัดการ</th>
    </tr>
    <?php
    $i = 1;
    while ($row=mysqli_fetch_array($result)) {

      ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['cate_id'] ?></td>
        <td><?php echo $row['cate_name'] ?></td>
        <td>
          <a href="update_cate.php?cate_id=<?php echo $row['cate_id'] ?>" class="btn btn-outline-primary" >แก้ไข</a>
          <a href="del_cate.php?cate_id=<?php echo $row['cate_id'] ?>" class="btn btn-outline-danger">ลบ</a>
        </td>
      </tr>
    <?php } ?>
  </table>

</div>
