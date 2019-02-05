<?php
include '../include/connect.php';
include 'navbar.php';

$sql=$con->query("select * from inventory i, inventory_list il where i.inv_id=il.inv_id and i.inv_no = 999999");
$i = 1;
while($show=mysqli_fetch_array($sql)){
echo "ลำดับ = ".$i."<br>";
echo "inv id = ".$show['inv_id']."<br>";
echo $show['pro_id'];
$i++;
}

 ?>
