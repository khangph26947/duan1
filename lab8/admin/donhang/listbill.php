<div class="row">
            <div class="row formtitle"><h1>DANH SÁCH Đơn Hàng</h1></div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                   <table>
                    <tr>
                        <th></th>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Tồng Đơn Hàng</th>
                        <th>Tình Trạng Đơn Hàng</th>
                        <th>Thao Tác</th>
                   
                        <th>Vai Trò</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk="index.php?act=suatk&id=".$id;
                        $xoatk="index.php?act=xoatk&id=".$id;
                       echo'
                       <tr>
                       <td><input type="checkbox"></td>
                       <td>'.$id.'</td>
                       <td>'.$user.'</td>
                       <td>'.$pass.'</td>
                       <td>'.$email.'</td>
                       <td>'.$address.'</td>
                   
                       <td>'.$role.'</td>
                       <td> 
                       <a href="'. $suatk.'"><input type="button" value="sửa"></a>

                           <a href="'. $xoatk.'"><input type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                    }
                    ?>
                   </table>
                  </div>  
                
                <div class="row mb10">
                   
                   <a href=""><input type="button" value="NHẬP THÊM"></a> 
                </div>
            </div>
        </div>