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
          <div class="row contact-main-info mt-5" style="display: flex;justify-content: center;">
              <div style="border:1px bl ;"></div>
              <div class="col-md-6 contact-right-content">
                  <!-- left -->
                  <?php

                    // echo var_dump($_SESSION['giohang']) ;
                    if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
                        echo '
                        <table style="width:110%; max-width:120%;text-align:center; font-size:13px;">
                        <thead style="height: 52px;">
                    <tr>
                    <th scope="col">stt</th>
                    <th scope="col">tên sp</th>
                    <th scope="col">hinh</th>
                    <th scope="col">don gia</th>
                    <th scope="col">so luong</th>
                    <th scope="col">màu sắc</th>
                    <th scope="col">thanh tien</th>
                    <th scope="col">hanh dong</th>
                    </tr>
                    </thead>

                    ';
                        $i = 0;
                        $tong = 0;

                        foreach ($_SESSION['giohang'] as $item) {

                            $tt = $item['3'] * $item['4'];
                            $tong += $tt;
                            echo '
                       <tr style="border:1px solid black">
                       <td>' . ($i + 1) . '</td>
                       <td>' . $item[1] . '</td>
                       <td>  <img src="./upload./' . $item[2] . '"width=80></td>
                      
                       <td>' . $item[3] . '</td>
                       <td>' . $item[4] . '</td>
                       <td>' . $item[5] . '</td>
                       <td>' . $tt . '</td>
                       <td> <button type="button" class="btn btn-primary" style="border-radius:20px;">
                       <a href="index.php?act=delcart&i=' . $i . '"  style="color:white;">Xóa</a>

                       </button></td>
                       </tr>
               
                       ';
                            $i++;
                        }
                        echo '<tr>
                        <td colspan="2" style="padding-left:37px;">Tổng đơn hàng</td>
                        <td colspan="7 " style = "padding-left: 227px;">' . $tong . '</td>
                        <td></td>
                     
                        </tr>';
                        echo '</table>';
                    }

                    ?>
                  <br>
                  <div>
                      <button type="button" class="btn btn-primary">
                          <a href="index.php" style="color:white; font-size: 15px;">Tiếp Tục Mua Hàng</a>

                      </button>
                      <button type="button" class="btn btn-primary">
                          <a href="index.php?act=delcart" style="color:white; font-size: 15px;">Xóa Giỏ Hàng</a>


                      </button>

                  </div>
                  <!-- 
                  <br>
                  <a href="index.php">Tiếp Tục Mua Hàng</a> | <a href="#">Thanh Toán</a> | <a href="index.php?act=delcart">Xóa Giỏ Hàng</a> -->
              </div>

              <?php
                //    if(isset($_POST['thanhtoan'])){
                //     //lấy dữ liệu

                //    // $name=$_POST['name'];
                //     // $email=$_POST['email'];
                //     // $address=$_POST['address'];
                //     // $tel=$_POST['tel'];
                //     // $pttt=$_POST['pttt'];
                //     $errors = [];
                //     if (empty($_POST['name'])) {
                //         $errors['name'] = "Trường này không được để trống";
                //     }else {
                //         if(strlen($_POST['name'])<5){
                //             $errors['name']='họ tên phải lớn hơn 5 ký tự';
                //         }
                //     }
                //     if(empty($errors)){
                //         echo 'validate thành công';
                //     }else{
                //         echo 'có lỗi';
                //     }

                //     echo '<pre>';
                //     print_r($errors);
                //     echo '</pre>';

                // }
                ?>
              <div class="col-md-4 contact-left-content" style="padding-left: 100px;">
                  <!-- right -->

                  <h3>Thông Tin Đặt hàng</h3>
                  <form action="index.php?act=thanhtoan" method="post">
                      <input type="hidden" name="tongdonhang" value="<?php echo $tong ?>">
                      <table>
                          <?php
                            if (isset($_SESSION['username']) && ($_SESSION['address']) && ($_SESSION['email'])) {
                                $name =  $_SESSION['username'];
                                $address =   $_SESSION['address'];
                                $email =  $_SESSION['email'];
                            } else {
                                $name = "";
                                $address = "";
                                $email = "";
                            }
                            ?>



                          <div class="form-group row">
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" required value="<?= $name ?>" name="name" placeholder="Nhập tên">

                              </div>

                          </div>
                          <div class="form-group row">
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" required value="<?= $address ?>" name="address" placeholder="Nhập địa chỉ">
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-10">

                                  <input type="text" class="form-control"  value="<?= $email ?>" name="email" placeholder="Nhập email"  
                                  pattern="^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})$" oninvalid="this.setCustomValidity('Vui lòng nhập gmail')"
                                     onchange="this.setCustomValidity('')" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-10">

                                  <input type="text" class="form-control"  name="tel" placeholder="Nhập số điện thoại"
                                  pattern="^(84|0[35789])[0-9]{8}$" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')"
                                     onchange="this.setCustomValidity('')" required>
                              </div>
                          </div>

                          <div class="row">
                              <h6 style="margin-bottom: 10px; margin-left:10px;">Phương thức thanh toán</h6>
                              <div class="col-sm-10">
                                  <div class="form-check" style="margin-bottom:10px;">
                                      <input class="form-check-input" type="radio" name="pttt" value="1">
                                      <label class="form-check-label" for="pttt">
                                          Thanh toán khi nhận hàng
                                      </label>
                                  </div>


                              </div>
                          </div>
                          <tr>
                              <input class="btn btn-primary" type="submit" name="thanhtoan" value=" Thanh Toán">
                          </tr>
                          <!-- <tr>
                              <td>PHƯƠNG THỨC THANH TOÁN <br>
                                  <input type="radio" name="pttt" value="1" required> thanh toán khi nhận hàng <br>
                                   <input type="radio" name="pttt" value="2"> thanh toán chuyển khoản <br>
                                  <input type="radio" name="pttt" value="3"> thanh toán ví momo <br>
                                  <input type="radio" name="pttt" value="4"> thanh toán online <br>  -->


                          </td>

                          </tr>


                      </table>
                  </form>

              </div>

          </div>
      </div>
  </section>
  <!-- <input type="text" class="form-control" id="number" name="phone" value="<?= $phone ?? '' ?>"
   pattern="^(84|0[35789])[0-9]{8}$" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')"
    onchange="this.setCustomValidity('')" required> -->