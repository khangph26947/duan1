<div class="row mb ">
    <div class="boxtrai mr ">
        <div class="row mb ">

            <div class="boxtitle">Cập Nhật Tài Khoản</div>
            <div class="row boxcontent formtaikhoan">
                <?php 
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);

                }
                
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                    <div class="row mb10">
                        Email:
                        <input type="email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="row mb10">
                        Tên Đăng Nhập :
                        <input type="text" name="user"value="<?php echo $user?>">
                    </div>
                    <div class="row mb10">
                    Mật Khẩu :
                    <input type="password" name="pass" value="<?php echo $pass ?>">
                    </div>
                    <div class="row mb10">
                        Địa Chỉ :
                        <input type="text" name="address"value="<?php echo $address ?>">
                    </div>
                    <div class="row mb10">
                        Điện Thoại :
                        <input type="text" name="tel"value="<?php echo $tel ?>">
                    </div>
                    <div class="row mb10">
                        Role :
                        <input type="text" name="role"value="<?php echo $role ?>">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" value="Cập Nhật" name="capnhat">
                        <input type="reset" value="Nhập Lại">
                    </div>
                </form>



                <h2 class="thongbao">
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }


                    ?>
                </h2>
            </div>

        </div>


    </div>

   
</div>