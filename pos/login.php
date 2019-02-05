<?php
include 'include/connect.php';
session_start(); // for check variable
if(@$_SESSION['s_username']!=""){
  echo "<script>alert('คุณ Login ไปแล้ว')</script>";
  echo "คุณล็อคอินไปแล้ว<br>";
  echo $_SESSION['s_username'];
  if($_SESSION['s_position']==1){
    echo "<script>window.location.href='manager/index.php'</script>";
  }

}


if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];


  if(($username=="")||($password=="")){
    echo "<script>alert('กรอกไม่ครบ')</script>";
  }else{
    echo "<script>alert('กรอกครบ')</script>";

    $sql="SELECT * FROM employee WHERE emp_username='$username' and emp_password='$password'";
    $result=$con->query($sql);
    $num=mysqli_num_rows($result);
    $chk_sts=mysqli_fetch_array($result);
    if($num!=0){

      $_SESSION['s_username'] = $username;
      $_SESSION['s_position'] = $chk_sts['emp_position'];

      echo $_SESSION['s_username'];
      echo $_SESSION['s_position'];

      echo "<script>alert('LOGIN Success')</script>";
      if($_SESSION['s_position']==1){
        echo "<script>window.location.href='manager/index.php'</script>";
      }

      }else{
      echo "<script>alert('Cannot LOGIN')</script>";
    }

  }

}


?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </head>
  <body style="background:#ccc;">
    <div class="container" style="margin-top:100px; width:600px;">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">Login Form</div>
        <div class="card-body">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group row">
              <label class="col-md-3 control-label">Username</label>
                <div class="col-md-6">
                  <input type="text" name="username" placeholder="username" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" name="password" placeholder="password" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-9">
                <input type="submit" name="submit" class="btn btn-success" value="sign in">
                <input type="reset" name="reset" class="btn btn-danger" value="cancel">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
