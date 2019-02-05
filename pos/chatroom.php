<?php
include 'include/connect.php';
if(isset($_GET['cht_id'])){
  $cht_id = $_GET['cht_id'];
  echo "you click = ".$cht_id;

  $result3=$con->query("DELETE FROM tb_chat WHERE cht_id = '$cht_id'");
}
$result=$con->query("SELECT * FROM tb_chat ORDER BY cht_id DESC LIMIT 0,10");

if(isset($_POST['submit'])){

  function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
  }
  $strDate = date("Y-m-d H:i:s");
  $strDate2 = DateThai($strDate);
  //echo "ThaiCreate.Com Time now : ".DateThai($strDate);
  //echo "<br>".$strDate;



  $name = $_POST['chtName'];
  $mes = $_POST['chtMes'];
  $nextWeek = date('Y-m-d');
  $result2=$con->query("INSERT INTO tb_chat VALUES('','$name','$mes','$strDate2')");
  $result=$con->query("SELECT * FROM tb_chat ORDER BY cht_id DESC LIMIT 0,10");
}


 ?>
 <?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/mycss.css">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
        <header>
          ChatRoom
        </header>
        <div class="col-md-12 shouts">
          <ul>
            <?php
            while ($row=mysqli_fetch_array($result)) { ?>
             <li>
               <?php
               echo $row['cht_time']." | ".$row['emp_username']." : ".$row['cht_mes'];
                ?>
                <a href="chatroom.php?cht_id=<?php echo $row['cht_id'] ?>" name="delMes" style="border-radius:25px;" class="btn btn-outline-danger">ลบ</a>
             </li>
           <?php } ?>
          </ul>
        </div>
        <div class="col-md-12 in_shouts">
          <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
              <!--<div class="input-group col-md-6">
                <input type="text" name="name" class="form-control col-md-3" name="name" value="กะละมัง" disabled>
                <input type="text" name="mes" class="form-control" placeholder="Recipient's username">
                <div class="input-group-append">
                  <button name="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">SEND</button>
                </div>
              </div>-->
              <input type="text" name="chtName" placeholder="กรอกชื่อ">
              <input type="text" name="chtMes" placeholder="กรอกข้อความ">
              <input type="submit" name="submit" value="กดส่งข้อความ">
          </form>
        </div>

  </body>
</html>
