<div class="row">
            <div class="row formtitle"><h1>DANH SÁCH TÀI KHOẢN</h1></div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                   <table>
                    <tr>
                        <th></th>
                        <th>Mã Tài Khoản</th>
                        <th>Tên Đăng Nhập</th>
                        <th>Mật Khẩu</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Role</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    $sql="select*from user order by id desc";
                    $listuser=pdo_query($sql);
                    foreach ($listuser as $user) {
                        //extrac để ta có thể lấy thẳng vào tên từng cột 
                         extract($user);
                        $xoatk="index.php?act=xoatk&id=".$id;
                       echo'
                       <tr>
                       <td><input type="checkbox"></td>
                       <td>'.$id.'</td>
                       <td>'.$user.'</td>
                       <td>'.$pass.'</td>
                       <td>'.$email.'</td>
                       <td>'.$address.'</td>
                       <td>'.$tel.'</td>

                       <td>'.$role.'</td>
                       <td> 

                           <a href="'. $xoatk.'"><input type="button" value="Xóa Tài Khoản"></a>
                       
                       </td>
                   </tr>';
                    }
                    ?>
                   </table>
                  </div>  
                
                <div class="row mb10">
                    <!-- <input type="button" value="CHỌN TẤT CẢ">
                    <input type="button" value="BỎ CHỌN TẤT CẢ">
                    <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                </div>
            </div>
        </div>
