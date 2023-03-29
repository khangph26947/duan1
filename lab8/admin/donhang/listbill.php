<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH Đơn Hàng</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>Mã Đơn Hàng</th>
                    <th>Khách Hàng</th>
                    <th>Số lượng hàng</th>
                    <th>Tình Trạng Đơn Hàng</th>
                    <th>Thao Tác</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Sô điện thoại</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listdh as $bill) {
                    extract($bill);
                   
                    $xoadh="index.php?act=xoadh&id=".$id;

                    echo'
                    <tr>
                       <td><input type="checkbox"></td>
                       <td>' . $id . '</td>
                       <td>' . $madh . '</td>
                       <td>' . $tongdonhang . '</td>
                       <td>' . $pttt . '</td>
                       <td>' . $name . '</td>
                       <td>' . $address . '</td>
                       <td>' . $email . '</td>
                       <td>' . $tel . '</td>
                       <td> 


                         
                           <a href="'. $xoadh.'"><input type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                }
                ?>
            </table>
        </div>

       
    </div>
</div>