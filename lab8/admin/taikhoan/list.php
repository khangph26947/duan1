

<div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý Tài khoản</h2>
      </div>
    <div class="from_list2">
                <div class="from_table">
                    <h2>Danh sách Tài khoản</h2>
                    <p>Danh sách các tài khoản có trên hệ thống</p>
                </div>
            <div class="from_table-content">
                <table>
                    <tr>
                        <th class="bluan3"></th>
                        <th class="bluan3">Mã tài khoản</th>
                        <th class="bluan3">Tên Đăng nhập</th>
                        <th class="bluan3">Mật khẩu </th>
                        <th class="bluan3">Email</th>
                        <th class="bluan3">Địa chỉ</th>
                        <th class="bluan3">Vai trò</th>
                        <th class="bluan3">Hành động</th>
                    </tr>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                      
                        $xoatk="index.php?act=xoatk&id=".$id;
                       echo'
                       <tr>
                       <td class="bluan1"><input type="checkbox"></td>
                       <td class="bluan1">'.$id.'</td>
                       <td class="bluan1">'.$user.'</td>
                       <td class="bluan1">'.$pass.'</td>
                       <td class="bluan1">'.$email.'</td>
                       <td class="bluan1">'.$address.'</td>
                   
                       <td class="bluan1">'.$role.'</td>
                       <td class="bluan1"> 
                     
                           <a href="'. $xoatk.'"><input class="mau2" type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                    }
                    ?>
                </table>
            </div>
    </div>