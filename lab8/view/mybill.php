<div class="col-md-6 contact-right-content">
                  <!-- left -->
              <table style="width:110%; max-width:120%;text-align:center; font-size:13px; ">
                    <tr style="border:1px solid black">
                    <th>id</th>
                  <th>mã đơn hàng</th>
                    <th>tên </th>
                  <th>tổng đơn hàng</th>
                    <th>trạng thái</th>
              
                    </tr>
                    <?php 
                    if(is_array($listcart)){
                        foreach ($listcart as $bill) {
                          extract($bill);
                          echo '
                          <tr style="border:1px solid black">
                          <td>' . $id . '</td>
                          <td>' . $madh . '</td>
                          <td>' . $name . '</td>
                         <td>' . $tongdonhang . '</td>
                           <td>' . $status . '</td>
                          
                       
                          </tr>
      
                          ';
                        }
                    }
                    ?>

                   
                   
                
                      </table>
         
                 
              </div>