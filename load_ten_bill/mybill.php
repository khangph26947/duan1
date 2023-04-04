<div  class="col-md-6 contact-right-content" style="margin: auto; margin-top: 30px; margin-bottom: 40px;">

<form action="index.php?act=bill" method="POST" class="d-flex">
      <input type="text"  placeholder="Tìm kiếm" name="kyw"  style="background-color: white;
                                                                  border-radius: 56px;
                                                                  height: 30px;
                                                                  border: 1px solid #070606;">
      <input  type="submit" name="timkiem"  value="Tìm kiếm" style="margin-left: 10px;
                                                                    width: 80px;
                                                                    height: 30px;
                                                                    font-size: 8px;
                                                                    border-radius: 15px;
                                                                    justify-content: center;
                                                                    display: flex;"></input>
</form>
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
                       $listcart=getbill();

                    
                        foreach ($listcart as $bill) {
                          extract($bill);
                          echo '
                          <tr style="border-bottom: solid 1px #7c7c7c;">
                          <td>' . $id . '</td>
                          <td>' . $madh . '</td>
                          <td>' . $name . '</td>
                           <td>' . $tongdonhang . '</td>
                           <td>' . $status . '</td>
                          
                       
                          </tr>
      
                          ';
                          
                        }
                    ?>

                   
                   
                
                      </table>
         
                 
              </div>
