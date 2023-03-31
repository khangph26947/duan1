<div class="col-md-6 contact-right-content">
                  <!-- left -->
              <table style="width:110%; max-width:120%;text-align:center; font-size:13px; ">
                    <tr style="border:1px solid black">
                  <th>mã đơn hàng</th>
                    <th>tên sản phẩm</th>
                    <th>images</th>
                    <th>đơn giá</th>
                    <th>số lượng </th>
                    <th>màu sắc</th>
                    <th>thành tiền</th>
                    <th>trạng thái</th>
              
                    </tr>
                    <?php 
                    if(is_array($listcart)){
                        foreach ($listcart as $bill) {
                          extract($bill);
                          echo '
                          <tr style="border:1px solid black">
                          <td>bill-' . $id . '</td>
                          <td>' . $tensp . '</td>
                           <td><img src="./upload./'.$img.'" alt="" style="width: 50px;"></td>
                           <td>' . $soluong . '</td>
                           <td>' . $dongia . '</td>
                           <td>' . $value . '</td>
                           <td>' . $dongia*$soluong . '</td>
                           <td>' . $status . '</td>
                          
                       
                          </tr>
      
                          ';
                        }
                    }
                    ?>

                   
                   
                
                      </table>
         
                 
              </div>