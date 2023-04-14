


<div class="row1 form__list">
<div class="from">
          <h2>Quản Lý Đơn hàng</h2>
      </div>
    <div class="from_list2">
                <div class="from_table">
                    <h2>Update đơn hàng</h2>
                </div>
            <div class="from_table-content">
              <form action="" method="post">
                <table>
                   <tr>
                    <th class="bluan"></th>
                    <th class="bluan">ID</th>
                    <th class="bluan">Mã Đơn Hàng</th>
                    <th class="bluan">Khách Hàng</th>
                    <th class="bluan">Tổng tiền</th>
                    <th class="bluan">Phương thức thanh toán</th>
                    <th class="bluan">Địa chỉ</th>
                    <th class="bluan">Email</th>
                    <th class="bluan">Sô điện thoại</th>
                    <th class="bluan">Hành động</th>
                </tr>
                <?php
             $billstatus=[
               'chờ xử lý',
               'đang xử lý',
               'đang giao hàng',
               'đã nhận hàng',
               'yêu cầu hủy đơn hàng',
               'đã hủy đơn',
             ];
                   extract($bill);
                $options='';
                foreach ($billstatus as $option) {
                   if(strtolower($status)==$option)
                   $options .=' <option selected value="'.$option.'">'.$option.'</option>';
                   else $options .=' <option  value="'.$option.'">'.$option.'</option>';

                }

                    echo'
                    <tr>
                       <td class="bluan1"><input type="checkbox"></td>
                       <td class="bluan1">' . $id . '</td>
                       <td class="bluan1">' . $madh . '</td>
                       <td class="bluan1">' . $name . '</td>
                       <td class="bluan1">' . $tongdonhang . '</td>
                       <td class="bluan1">' . $pttt . '</td>
                       <td class="bluan1">' . $address . '</td>
                       <td class="bluan1">' . $email . '</td>
                       <td class="bluan1">' . $tel . '</td>
                       <td class="bluan1"> 


                         
                       <select name="status" id="">
                       '.$options.'
                              
                              </select> 
                              <button class="mau3" name="update">cập nhât</butto
                       
                       </td>
                   </tr>';
                
                ?>
                </table>
                </form>
            </div>
    </div>