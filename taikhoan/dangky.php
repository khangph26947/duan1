<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<form action="index.php?act=dangky" method="POST"  style=" width: 550px;
                                                                         margin: auto;
                                                                         margin-top: 50px;">
                                                                         <h4>Đăng ký tài khoản</h4>
  <div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="">User</label>
    <input type="text" class="form-control" name="user" placeholder="Enter user">
    
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="pass" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="">Address</label>
    <input type="text" name="address" class="form-control" placeholder="Address">
  </div>
  <div class="form-group">
    <label for="">Telephone</label>
    <input type="text" name="tel" class="form-control" placeholder="Telephone">
  </div>
  <input type="submit" name="dangky" class="btn btn-primary" value="Submit"></input>
</form>
<?php
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }
?>
</body>
</html>