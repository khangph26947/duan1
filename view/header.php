<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Bootie Ecommerce Bootstrap Responsive Web Template | Shop :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Bootie Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
   
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="view/css/style2.css"> -->
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="view/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="view/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="view/fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="view/fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>

    <!-- mian-content -->
    <div class="main-banner inner" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="index.html"><span class="fa fa-bold" aria-hidden="true"></span>ootie</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="index.php?act=addcart">Giỏ Hàng</a></li>

                        <?php
                            if(isset($_SESSION['user'])){
                                extract($_SESSION['user']);
                        ?>

                            
                            <li style="color: white ;">
                            <label for="drop-2" class="toggle">  <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#" >Chào <?=$user?><span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                            <?php if($role==1){?>
                            <li style="list-style: none;" >
                            <a href="admin/index.php">Admin</a>
                            </li>
                            <?php } ?>
                                <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                                <li><a href="index.php?act=quenmk">Quên mật khẩu</li>
                                <li><a href="index.php?act=dangxuat">Đăng xuất</a></li>
                            </ul>
                            
                        
                            </li>

                             
                            <?php

                            }else{

                                
                        ?>
                        <li class="breadcrumb-item active" ><a style="color:white ;" href="index.php?act=dangnhap">Đăng Nhập</a></li>
                        


                        <?php  }?>
                       
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->

    </div>
