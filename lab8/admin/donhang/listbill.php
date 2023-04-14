<div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý đơn hàng</h2>
      </div>
    <div class="from_list2">
                <div class="from_table">
                    <h2>Danh sách đơn hàng</h2>
                    <p>Danh sách các đơn hàng có trên hệ thống</p>
                </div>
            <div class="from_table-content">
                <table>
                <tr>
                    <th class="bluan"></th>
                    <th class="bluan">ID</th>
                    <th class="bluan">Mã Đơn Hàng</th>
                    <th class="bluan">Khách Hàng</th>
                    <th class="bluan">Tổng tiền</th>
                    <th class="bluan">Trạng thái giao hàng </th>
                    <th class="bluan">Địa chỉ</th>
                    <th class="bluan">Email</th>
                    <th class="bluan">Sô điện thoại</th>
                    <th class="bluan">Hành động</th>
                </tr>
                <?php
                foreach ($listdh as $bill) {
                    extract($bill);
                   if(strcasecmp($status,'đã hủy đơn')==0 ||strcasecmp($status,'đã nhận hàng')==0){
                    $updatedh='';
                   }else{
                   
                    $updatedh="index.php?act=updatedh&id=".$id;
                   }
                    $xoadh="index.php?act=xoadh&id=".$id;
                   

                    echo'
                    <tr>
                    <td class="bluan1"><input type="checkbox"></td>
                    <td class="bluan1">' . $id . '</td>
                    <td class="bluan1">' . $madh . '</td>
                    <td class="bluan1">' . $name . '</td>
                    <td class="bluan1">' . $tongdonhang . '</td>
                     <td class="bluan1">'.$status.'</td>
                    <td class="bluan1">' . $address . '</td>
                    <td class="bluan1">' . $email . '</td>
                    <td class="bluan1">' . $tel . '</td>
                    <td class="bluan1"> 


                         
                           <a href="'. $xoadh.'"><input class="mau1" type="button" value="xóa"></a>
                           <a href="'. $updatedh.'"><input class="mau3" type="button" value="update"></a>
                       
                       </td>
                   </tr>';
                }
                ?>
                </table>
            </div>
    </div>