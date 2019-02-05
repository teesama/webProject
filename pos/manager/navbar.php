<?php
  session_start();

  if(@$_SESSION['s_position'] != 1){
    echo "<script>alert('คุณไม่ใช้ผู้จัดการ กรุณา login ใหม่')
          window.location.href='../login.php';
          </script>";
  }
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/mycss.css">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body style="background-image: url('../img/BG2.png');">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="#">POS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employee.php">การจัดการพนักงาน</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php">การจัดการสินค้า</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="inventory.php">การจัดการคลังสินค้า</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sale.php">ขายสินค้า</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="report.php">รายงาน</a>
              </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
              <li class="nav-item">
                <?php
                include '../include/connect.php';
                  $user = $_SESSION['s_username'];
                  $emp_pic=mysqli_fetch_array($con->query("SELECT * FROM employee WHERE emp_username='$user'"));

                 ?>
                <a class="nav-link" href="">
                  <img src="../img/<?php echo $emp_pic['emp_pic'] ?>" style="border-radius:50%;height:3em;margin-top:-10px;" alt="avatar">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="" href="">
                  <?php echo $_SESSION['s_username']; ?>
                </a>

              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-danger" href="../logout.php">logout</a>
              </li>

            </ul>

          </div>
        </nav>
  </body>
</html>
