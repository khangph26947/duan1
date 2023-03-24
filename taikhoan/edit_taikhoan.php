
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
<?php 
             if(isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                extract($_SESSION['user']);
             }

           ?>
<form action="index.php?act=edit_taikhoan" method="POST"  style=" width: 550px;
                                                                         margin: auto;
                                                                         margin-top: 50px;">
                                                                         <h4>Cập nhật tài khoản</h4>
  <div class="form-group">
  <label for="">User</label>
  <input type="text" class="form-control" name="user" placeholder="Enter user" value="<?=$user ?>">

  </div>
  <div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?=$email ?>">
    
  </div>
  
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="pass" class="form-control" placeholder="Password" value="<?=$pass ?>">
  </div>
  <div class="form-group">
    <label for="">Address</label>
    <input type="text" name="address" class="form-control" placeholder="Address" value="<?=$address ?>">
  </div>
  <div class="form-group">
    <label for="">Telephone</label>
    <input type="text" name="tel" class="form-control" placeholder="Address" value="<?=$tel ?>">
  </div>
  
  <div class="form-group">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="Cập nhật" name="capnhat" style="    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    border-radius:5px;">
    
</div>
</form>
<?php
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }
?>
</body>
</html>