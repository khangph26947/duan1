<div class="col-md-6 contact-right-content" style="margin: auto; margin-top: 30px; margin-bottom: 40px;">
      <!-- left -->
                  <table style="width:110%; max-width:120%;text-align:center; font-size:13px; ">
                        <thead style="height: 52px;">
                    <tr >
                    <th scope="col">ID</th>
                    <th scope="col">MÃ ĐƠN HÀNG</th>
                    <th scope="col">TÊN KHÁCH HÀNG</th>
                    <th scope="col">GIÁ TIỀN</th>
                    <th scope="col">TRẠNG THÁI ĐƠN HÀNG</th>
                    
                    
                    </tr>
                    </thead>
                    <div >
                    
                      </div>
                    <?php 
                    
                        foreach ($load_bill as $timbill) {
                          
                          echo '
                          <tr style="border-bottom: solid 1px #7c7c7c;">
                          <td>' . $timbill['id'] . '</td>
                          <td>' . $timbill['madh'] . '</td>
                          <td>' . $timbill['name'] . '</td>
                           <td>' . $timbill['tongdonhang'] . '</td>
                           <td>' . $timbill['status'] . '</td>
                          
                       
                          </tr>
      
                          ';
                          
                        
                    }
                    ?>

                   
                   
                
                      </table>
         
                 
              </div>