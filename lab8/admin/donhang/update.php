<div class="row">
    <div class="row formtitle">
        <h1>update Đơn Hàng</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formdsloai">
            <form action="" method="post">
            <table>
              
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Khách Hàng</th>
                    <th>tổng tiền</th>
                    <th>Phương Thức Thanh Toán</th>
                  
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Sô điện thoại</th>
                    <th></th>
                </tr>
                <?php
              $billstatus=[
                'chờ xử lý',
                'đang giao hàng',
                'đã nhận hàng',
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
                       <td><input type="checkbox"></td>
                       <td>' . $id . '</td>
                       <td>' . $madh . '</td>
                       <td>' . $name . '</td>
                       <td>' . $tongdonhang . '</td>
                       <td>' . $pttt . '</td>
                  
                       <td>' . $address . '</td>
                       <td>' . $email . '</td>
                       <td>' . $tel . '</td>
                       <td> 


                         
                         <select name="status" id="">
                  '.$options.'
                         
                         </select> 
                         <button name="update">cập nhât</button>
                       
                       </td>
                   </tr>';
                
                ?>
            </table>
            </form>
        </div>

       
    </div>
</div>