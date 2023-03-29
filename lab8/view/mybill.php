<div class="col-md-6 contact-right-content">
                  <!-- left -->
              <table style="width:110%; max-width:120%;text-align:center; font-size:13px; ">
                    <tr style="border:1px solid black">
                  <th>mã đơn hàng</th>
                    <th>ténp</th>
                    <th>hinh</th>
                    <th>dongia</th>
                    <th>soluong</th>
                    <th>màu sắc</th>
                    <th>thanhtien</th>
              
                    </tr>
                    <?php 
                    if(is_array($listcart)){
                        foreach ($listcart as $bill) {
                          extract($bill);
                          echo '
                          <tr style="border:1px solid black">
                          <td>' . $bill['id'] . '</td>
                          <td>' . $bill['madh'] . '</td>
                           <td>'.$bill['tongdonhang'].'</td>
                          
                       
                          </tr>
      
                          ';
                        }
                    }
                    ?>

                   
                   
                
                      </table>
         
                 
              </div>