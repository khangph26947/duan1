<div class="col-md-6 contact-right-content" style=" margin-left: 300px; margin-top:30px;">
                  <!-- left -->
              <table style="width:110%; max-width:120%;text-align:center; font-size:13px; ">
                    <tr style="border:1px solid black">
                    <th>id</th>
                  <th>mã đơn hàng</th>
                    <th>tên </th>
                  <th>tổng đơn hàng</th>
                    <th>trạng thái</th>
                    <th>hủy đơn hàng</th>
                    <th></th>
              
                    </tr>
                    <?php 
                    if(is_array($listcart)){
                    //  print_r($listcart);
                        foreach ($listcart as $bill) {
                         
                          extract($bill);
                          //var_dump($status);
                          if(strcasecmp($status,'chờ xử lý')==0){
                            $xoadh="index.php?act=xoadh&id=".$id;
                          }else{
                            $xoadh='';
                          }
                         
                          echo '
                          <tr style="border:1px solid black">
                          <td>' . $id . '</td>
                          <td>' . $madh . '</td>
                          <td>' . $name . '</td>
                         <td>' . $tongdonhang . '</td>
                           <td>' . $status . '</td>
                           <td>
                           <a href="'. $xoadh.'"><input class="mau2" type="button" value="hủy đơn"></a>
                           </td>
                           <td><a href="http://localhost/duan1/lab8/index.php?act=listcard"><button>chi tiết đơn hàng</button></a></td>
                          
                       
                          </tr>
      
                          ';
                        }
                    }
                    ?>

                   
                   
                
                      </table>
                      <div style="margin-top: 20px; width: 730px; margin-bottom: 20px; ">
                        <form action="index.php?act=mybill" method="post">
                          <input type="text" name="kyw" placeholder="mời bạn nhập mã đơn hàng..." >
                          <input type="submit" name="timkiem" value="Tìm Kiếm">
                        </form>
                      </div>
         
                 
              </div>