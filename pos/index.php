<?php

$images = "37054917_1429707823839894_4800569755163426816_n.jpg";
$new_images = "Thumbnail_".$images;
//กำหนดคงามสูงของรูปใหม่ สำหรับความกว้างไม่ต้องกำหนดครับ
// เพราะโปรแกรมจะทำการคำรวณความกว้างให้พอดีกับขนาดของรูปที่ได้ทำการ Resize
$height=100;
$size=GetimageSize("img/".$images);
$width=round($height*$size[0]/$size[1]);
$images_orig = ImageCreateFromJPEG("img/".$images);
$photoX = ImagesX($images_orig);
$photoY = ImagesY($images_orig);
$images_fin = ImageCreateTrueColor($width, $height);
ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
ImageJPEG($images_fin,"img/".$new_images); // ชื่อไฟล์ใหม่
ImageDestroy($images_orig);
ImageDestroy($images_fin);
?>
รูป 1 <?php echo $images;?>
<img src="img/<?php echo $images;?>" alt="">
รูป 2
<img src="img/<?php echo $new_images?>" alt="">
