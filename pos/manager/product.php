<?php
include 'navbar.php';
include '../include/connect.php';
$result=$con->query("SELECT * FROM product,category,unit
WHERE product.unit_id=unit.unit_id
and product.cate_id=category.cate_id");




 ?>
<div class="container-fluid" style="margin-top:10px;">
<a href="add_pro.php" class="btn btn-success">+เพิ่มสินค้า</a>
<a href="unit.php" class="btn btn-danger">+เพิ่มหน่วยสินค้า</a>
<a href="category.php" class="btn btn-info">+เพิ่มประเภทสินค้า</a><br><br>

  <table class="table table-striped">
    <tr style="background:#EBB129;color:#fff;">
      <th>ลำดับที่</th>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>รูปสินค้า</th>
      <th>ราคาขาย</th>
      <th>ราคาซื้อ</th>
      <th>สินค้าในสต็อค</th>
      <th>สินค้าในสต็อคขั้นต่ำ</th>
      <!-- up -->
      <th>รหัสประเภทสินค้า</th>
      <th>รหัสหน่วยสินค้า</th>
      <th>สถานะสินค้า</th>
      <th>การจัดการ</th>
    </tr>
    <?php
    $i = 1;
    while ($row=mysqli_fetch_array($result)) {

      ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['pro_id'] ?></td>
        <td><?php echo $row['pro_name'] ?></td>

        <?php
        if(trim($row['pro_pic']) != ""){
        $images = $row['pro_pic'];
        $new_images = "Thumbnail_".$images;
        //กำหนดคงามสูงของรูปใหม่ สำหรับความกว้างไม่ต้องกำหนดครับ
        // เพราะโปรแกรมจะทำการคำรวณความกว้างให้พอดีกับขนาดของรูปที่ได้ทำการ Resize
        $height=100;

          $size=GetimageSize("../img/".$images);
          $width=round($height*$size[0]/$size[1]);
          $images_orig = ImageCreateFromJPEG("../img/".$images);
          $photoX = ImagesX($images_orig);
          $photoY = ImagesY($images_orig);
          $images_fin = ImageCreateTrueColor($width, $height);
          ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
          ImageJPEG($images_fin,"../img/".$new_images); // ชื่อไฟล์ใหม่
          ImageDestroy($images_orig);
          ImageDestroy($images_fin);?>
          <td> <img src="../img/<?php echo $new_images; ?>" alt=""></td>
          <?php
        }else{
          ?>
          <td style="color:red;">*ไม่มีรูปภาพ <img src="../img/<?php echo $row['pro_pic']; ?>" alt=""></td>
          <?php
        }
        ?>

        <td><?php echo $row['pro_price'] ?></td>
        <td><?php echo $row['pro_buy'] ?></td>
        <td><?php echo $row['pro_stock'] ?></td>
        <td><?php echo $row['pro_stock_min'] ?></td>
        <td><?php echo $row['cate_name'] ?></td>
        <td><?php echo $row['unit_name'] ?></td>
        <td><?php echo $row['pro_status'] ?></td>
        <td>
          <a href="update_pro.php?pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-outline-primary" >แก้ไข</a>
          <a href="del_pro.php?pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-outline-danger">ลบ</a>
        </td>
      </tr>
    <?php } ?>
  </table>

</div>
