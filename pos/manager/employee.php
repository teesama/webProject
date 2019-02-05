<?php
include 'navbar.php';
include '../include/connect.php';
$result=$con->query("SELECT * FROM employee");


 ?>
<div class="container">
<a href="add_emp.php" class="btn btn-success">+เพิ่มข้อมูล</a><br><br>

  <table class="table table-striped">
    <tr style="background:#EBB129;color:#fff;">
      <th>ลำดับที่</th>
      <th>ชื่อ-นามสกุล</th>
      <th>username</th>
      <th>เบอร์โทรศัพท์</th>
      <th>อีเมล</th>
      <th>ตำแหน่ง</th>
      <th>การจัดการ</th>
    </tr>
    <?php
    $i = 1;
    while ($row=mysqli_fetch_array($result)) {

      ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['emp_name'] ?></td>
        <td><?php echo $row['emp_username'] ?></td>
        <td><?php echo $row['emp_phone'] ?></td>
        <td><?php echo $row['emp_email'] ?></td>
        <td><?php if($row['emp_position'] == 1 ){
          echo "ผู้จัดการ";
        }else if($row['emp_position'] == 2){
          echo "พนักงานคลังสินค้า";
        }else if($row['emp_position'] == 3){
          echo "พนักงานขาย";
        }else{
          echo "หาตำแหน่งไม่เจอ";
        } ?></td>
        <td>
          <a href="update_emp.php?emp_username=<?php echo $row['emp_username'] ?>" class="btn btn-outline-primary" >แก้ไข</a>
          <a href="del_emp.php?emp_username=<?php echo $row['emp_username'] ?>" class="btn btn-outline-danger">ลบ</a>
        </td>
      </tr>
    <?php } ?>
  </table>

</div>
