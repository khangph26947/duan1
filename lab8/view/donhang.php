  <!---->
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
          <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Đơn Hàng </li>
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
                    if ((isset($_SESSION['iddh'])) && ($_SESSION['iddh']>0)){
                    $getshowcart=getshowcart($_SESSION['iddh']);
                    if ((isset($getshowcart)) && (count($getshowcart) > 0)) {
                        echo '<table style="width:110%; max-width:120%;text-align:center; font-size:13px; ">
                    <tr style="border:1px solid black">
                    <th>stt</th>
                    <th>ténp</th>
                    <th>hinh</th>
                    <th>dongia</th>
                    <th>soluong</th>
                    <th>thanhtien</th>
              
                    </tr>

                    ';
                        $i = 0;
                        $tong = 0;

                        foreach ($getshowcart as $item) {
                            $tt = $item['soluong'] * $item['dongia'];
                            $tong += $tt;
                            echo '
                       <tr style="border:1px solid black">
                       <td>' . ($i + 1) . '</td>
                       <td>' . $item['tensp'] . '</td>
                        <td>  <img src="'.$item['img'].'"width=80></td>
                       <td>' . $item['dongia'] . '</td>
                       <td>' . $item['soluong'] . '</td>
                       <td>' . $tt . '</td>
                    
                       </tr>
                       ';
                            $i++;
                        }
                        echo '<tr>
                    <td colspan="5"></td>
                    <td>' . $tong . '</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';
                        echo '</table>';
                    }
                }else{
                    echo 'gio hang rong  <a href="index.php"> vui lòng chọn sản phẩm</a>  ';
                }

                    ?>
                 
              </div>
             
             
              <div class="col-md-4 contact-left-content" style="padding-left: 100px;">
                  <!-- right -->
                  <?php
                    if ((isset($_SESSION['iddh'])) && ($_SESSION['iddh']>0)){
                   $orderinfo=getorderinfo($_SESSION['iddh']);
                   if(count( $orderinfo)>0){
                  ?>
                 <h3>ma đơn hàng :<?php echo  $orderinfo[0]['madh'] ?></h3>
                   
                      <table>
                          <tr>
                              <td>Tên người nhận:<?php echo  $orderinfo[0]['name'] ?></td>
                          </tr>
                          <tr>
                              <td>Địa Chỉ người nhận:<?php echo  $orderinfo[0]['address'] ?></td>
                          </tr>
                          <tr>
                              <td>Email người nhận :<?php echo  $orderinfo[0]['email'] ?></td>
                          </tr>
                          <tr>
                              <td>Điện THoại Người Nhận:<?php echo  $orderinfo[0]['tel'] ?></td>
                          </tr>
                          <tr>
                              <td>PHƯƠNG THỨC THANH TOÁN <br>
                              <?php 
                              switch ($orderinfo[0]['pttt']) {
                                case '1':
                                 $txtmess="thanh toán khi nhận hàng";
                                 echo 'thanh toán khi nhận hàng';
                                    break;
                                    case '2':
                                        $txtmess="thanh toán chuyển khoản";
                                        break;
                                        case '3':
                                            $txtmess="thanh toán qua ví momo";
                                            break;
                                            case '4':
                                                $txtmess="thanh toán online";
                                                break;
                                
                                default:
                                $txtmess="quý khách chưa chọn đăng ký thanh toán";
                                    break;
                                            
                                            }
                              ?>
                                 


                              </td>

                          </tr>
                         
                      </table>
                      <?php }
                    }
                      ?>
                
              </div>

          </div>
      </div>
  </section>