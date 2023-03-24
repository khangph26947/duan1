
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
                            if(isset($_SESSION['user'])){
                                extract($_SESSION['user']);
                        ?>
                            <div class="form-group">
                            <span style="color: red;">Xin chào : <?=$user?> </span>

                             </div>
                            <div class="row mb10">
                            
                            
                            <?php if($role==1){?>
                            <li>
                                <a href="admin/index.php">Đăng nhập admin</a>
                            </li>
                            <?php } ?>

                            <li>
                                <a href="index.php?act=dangxuat">Đăng xuất</a>
                            </li>
                            </div>
                          
                        <?php

                            }else{

                            
                        ?>
<form action="index.php?act=dangnhap" method="POST"  style=" width: 550px;
                                                                         margin: auto;
                                                                         margin-top: 50px;">
                                                                         <h4>Đăng nhập tài Khoản</h4>
  <div class="form-group">
    <label for="">User</label>
    <input type="text" class="form-control" name="user" placeholder="Enter user">
    
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="pass" name="pass" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <a href="index.php?act=dangky">Đăng ký tài khoản</a>
  </div>
 
  <input type="submit" name="dangnhap" class="btn btn-primary" value="Submit"></input>
</form>
<?php } ?>


</body>
</html>
