<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH Đơn Hàng</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Khách Hàng</th>
                    <th>tổng tiền</th>
                    <th>Pttt</th>
                    <th>trạng thái</th>
                  
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Sô điện thoại</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listdh as $bill) {
                    extract($bill);
                   
                    $xoadh="index.php?act=xoadh&id=".$id;
                    $updatedh="index.php?act=updatedh&id=".$id;

                    echo'
                    <tr>
                       <td><input type="checkbox"></td>
                       <td>' . $id . '</td>
                       <td>' . $madh . '</td>
                       <td>' . $name . '</td>
                       <td>' . $tongdonhang . '</td>
                       <td>' . $pttt . '</td>
                        <td>'.$status.'</td>
                       <td>' . $address . '</td>
                       <td>' . $email . '</td>
                       <td>' . $tel . '</td>
                       <td> 


                         
                           <a href="'. $xoadh.'"><input type="button" value="xóa"></a>
                           <a href="'. $updatedh.'"><input type="button" value="update"></a>
                       
                       </td>
                   </tr>';
                }
                ?>
            </table>
        </div>

       
    </div>
</div>