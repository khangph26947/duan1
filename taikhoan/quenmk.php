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
<form action="index.php?act=quenmk" method="POST"  style=" width: 550px;
                                                                         margin: auto;
                                                                         margin-top: 50px;">
                                                                         <h4>Quên mật khẩu</h4>
  
  <div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" class="btnt btn--primary" name="guiemail" value="Gửi" style="    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    border-radius:5px;">
</div>
  
</form>
<?php
    if(isset($thongbao)&&($thongbao!="")){
        echo  $thongbao ;
    }
?>
</body>
</html>