<style>

.boxcenter{
    width:40%;
    margin:0 auto;
}
.row{
   margin-left: 30px;
    width: 100%;
    text-align: center;
}
.mb{
    margin-bottom:20px;
    
}

.mb10{
    margin-bottom:10px;
    
}
.mr{
    margin-right: 2%;
}

.boxtitle{
    color: #333;
    padding: 10px;
    background-color: #eee;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border: 1px #ccc solid;
  
}
.boxcontent{
    border-left: 1px #ccc solid;
    border-right: 1px #ccc solid;
    border-bottom: 1px #ccc solid;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    min-height: 200px;
    padding: 20px;
}
.boxcontent2{
    border-left: 1px #ccc solid;
    border-right: 1px #ccc solid;
   

    background-color: #eee;
}
.formtaikhoan{
    line-height: 150%;
}
.formtaikhoan input[type="text"],
.formtaikhoan input[type="email"],
.formtaikhoan input[type="password"],
.formcontent input[type="text"]{
    width: 100%;
    border: 1px #ccc solid;
    padding: 5px 10px;
    border-radius: 5px;
}
.formtaikhoan input[type="password"]{
    width: 100%;
    border: 1px #ccc solid;
    padding:5px 10px;
    border-radius: 5px;
}
.formtaikhoan input[type="checkbox"]{

    border: 1px #ccc solid;
   

}
.formtaikhoan input[type="submit"],
.formcontent input[type="submit"],
.formcontent input[type="reset"],
.formtaikhoan input[type="reset"],
.formcontent input[type="button"]{

border-radius: 5px;
padding: 5px 10px;
background-color: white;
border: 1px solid #ccc;
}
.formtaikhoan input[type="submit"]:hover,
.formcontent input[type="submit"]:hover,
.formcontent input[type="reset"]:hover,
.formtaikhoan input[type="reset"]:hover,
.formcontent input[type="button"]:hover{


background-color: #ccc;

}
.formtaikhoan li a{
    color: teal;
    text-decoration: none;
}
.formtaikhoan li a:hover{
    color: #600;
    text-decoration: underline;
}

  

  




</style>

<div class="row mb ">
    <div class="boxtrai mr ">
    <div class="row mb ">
   
   
    <div class="row boxcontent formtaikhoan"> <br>
   <form class="row" action="index.php?act=dangky" method="post">
   <div class="boxtitle">Đăng Ký Thành Viên</div> <br>
   <div class="row mb10">
    Email:
    <input type="email" name="email" >
   </div>
   
   <div class="row mb10">
    Tên Tài Khoản :
    <input type="text" name="user" >
    </div>
    <div class="row mb10">
        Mật Khẩu :
    <input type="password" name="pass" >
    </div>
    <div class="row mb10">
    Địa Chỉ:
    <input type="text" name="address" >
   </div>
    <div class="row mb10">
    <input type="submit" value="đăng Ký" name="dangky">
    <input type="reset" value="Nhập Lại">
    </div>
   </form>
  
 
 
   <h2 class="thongbao">
   <?php 
   if(isset($thongbao)&&($thongbao!="")){
    echo $thongbao;
   }
  
  
   ?>
    </h2>
    </div>
   
</div>


    </div>

  

</div>