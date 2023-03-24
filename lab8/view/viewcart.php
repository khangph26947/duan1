  <!---->
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
          <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">View cart</li>
  </ol>
  <!---->
  <section class="ab-info-main py-5">
      <div class="container py-3">
          <h3 class="tittle text-center">View Cart</h3>
          <div class="row contact-main-info mt-5">
              <div class="col-md-6 contact-right-content">
                  <!-- left -->
                  <?php

                    // echo var_dump($_SESSION['giohang']) ;
                    if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
                        echo '<table>
                    <tr>
                    <th>stt</th>
                    <th>tên sp</th>
                    <th>hinh</th>
                    <th>don gia</th>
                    <th>so luong</th>
                    <th>thanh tien</th>
                    <th>hanh dong</th>
                    </tr>

                    ';
                        $i = 0;
                        $tong = 0;

                        foreach ($_SESSION['giohang'] as $item) {
                         
                            $tt = $item['3'] * $item['4'];
                            $tong += $tt;
                            echo '
                       <tr>
                       <td>' . ($i + 1) . '</td>
                       <td>' . $item[1] . '</td>
                       <td>  <img src="'.$item[2].'"width=80></td>
                      
                       <td>' . $item[3] . '</td>
                       <td>' . $item[4] . '</td>
                       <td>' . $tt . '</td>
                       <td><a href="index.php?act=delcart&i=' . $i . '">Xóa</a></td>
                       </tr>
                       ';
                            $i++;
                        }
                        echo '<tr>
                    <td colspan="5">tổng đơn hàng</td>
                    <td>' . $tong . '</td>
                    <td></td>
                 
                    </tr>';
                        echo '</table>';
                    }

                    ?>
                  <br>
                  <a href="index.php">Tiếp Tục Mua Hàng</a> | <a href="#">Thanh Toán</a> | <a href="index.php?act=delcart">Xóa Giỏ Hàng</a>
              </div>
              <div class="col-md-4 contact-left-content">
                  <!-- right -->
                  <h3>Thông Tin Đặt hàng</h3>
                  <form action="index.php?act=thanhtoan" method="post">
                    <input type="hidden" name="tongdonhang" value="<?php echo $tong ?>">
                      <table>
               
                          <tr>
                           
                              <td><input type="text" name="name" value="<?php echo  $_SESSION['username']  ?>" placeholder="NHẬP HỌ TÊN" required></td>
                          </tr>
                          <tr>
                              <td><input type="text" name="address"  value="<?php echo  $_SESSION['address']  ?>" placeholder="NHẬP ĐỊA CHỈ" required></td>
                          </tr>
                          <tr>
                              <td><input type="text" name="email"  value="<?php echo  $_SESSION['email']  ?>"  placeholder="NHẬP EMAIL" required></td>
                          </tr>
                          <tr>
                              <td><input type="text" name="tel" placeholder="NHẬP SỐ ĐIỆN THOẠI" required></td>
                          </tr>
                          <tr>
                              <td>PHƯƠNG THỨC THANH TOÁN <br>
                                  <input type="radio" name="pttt" value="1" required> thanh toán khi nhận hàng <br>
                                  <!-- <input type="radio" name="pttt" value="2"> thanh toán chuyển khoản <br>
                                  <input type="radio" name="pttt" value="3"> thanh toán ví momo <br>
                                  <input type="radio" name="pttt" value="4"> thanh toán online <br>  -->


                              </td>

                          </tr>
                          <tr>
                              <input type="submit" name="thanhtoan" value=" Thanh Toán">
                          </tr>
                      </table>
                  </form>
              </div>

          </div>
      </div>
  </section>