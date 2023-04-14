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
          <div class="row contact-main-info mt-5" style="display: flex;
                                                        justify-content: center;"       >
              <div class="col-md-6 contact-right-content">
                  <!-- left -->
                  <?php

                    // echo var_dump($_SESSION['giohang']) ;
                    if ((isset($_SESSION['iddh'])) && ($_SESSION['iddh']>0)){
                    $getshowcart=getshowcart($_SESSION['iddh']);
                    if ((isset($getshowcart)) && (count($getshowcart) > 0)) {
                        echo '
                    <table style="width:110%; max-width:120%;text-align:center; font-size:13px;">
                    <thead>
                    <tr style="border-top: solid 1px #aca6a6;
                    border-bottom: solid 1.2px #8e8e8e;">
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Màu sắc</th>
                    <th scope="col" >Thành tiền</th>
               
                    </tr>
                    </thead>
                    ';
                        $i = 0;
                        $tong = 0;

                        foreach ($getshowcart as $item) {
                            $tt = $item['soluong'] * $item['dongia'];
                            $tong += $tt;
                            echo '
                       <tr>
                       <td>' . ($i + 1) . '</td>
                       <td>' . $item['tensp'] . '</td>
                        <td>  <img src="./upload./'.$item['img'].'"width=80></td>
                       <td>' . $item['dongia'] . '</td>
                       <td>' . $item['soluong'] . '</td>
                       <td>' . $item['value'] . '</td>
                       <td>' . $tt . '</td>
                     
                    
                       </tr>
                       ';
                            $i++;
                        }
                        echo '<tr style="border-bottom: 1px solid #d6c3c3; border-top: 1px solid #c9b9b9;">
                        <td colspan="2" ">Tổng đơn hàng</td>
                        <td colspan="7 " style = "text-align:end;    padding-right: 19px;">' . $tong . '</td>
                        <td></td>
                     
                        </tr>';
                        echo '</table>';
                    }else{
                        echo 'gio hang rong  <a href="index.php"> vui lòng chọn sản phẩm</a>';
                    };
                    
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
                 <h3 style="font-size: 21px;">Mã đơn hàng :<?php echo  $orderinfo[0]['madh'] ?></h3>
                   
                      <table>
                          <tr>
                              <td>Tên người nhận : <?php echo  $orderinfo[0]['name'] ?></td>
                          </tr>
                          <tr>
                              <td>Địa Chỉ người nhận : <?php echo  $orderinfo[0]['address'] ?></td>
                          </tr>
                          <tr>
                              <td>Email người nhận : <?php echo  $orderinfo[0]['email'] ?></td>
                          </tr>
                          <tr>
                              <td>Điện THoại Người Nhận : <?php echo  $orderinfo[0]['tel'] ?></td>
                          </tr>
                          <tr>
                              <td>PHƯƠNG THỨC THANH TOÁN : <br>
                              <?php 
                              switch ($orderinfo[0]['pttt']) {
                                case '1':
                                 $txtmess="Thanh toán khi nhận hàng";
                                 echo 'Thanh toán khi nhận hàng';
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
                              <tr>
                              <td>tinh trang don hang : <?php echo  $orderinfo[0]['status'] ?></td>
                          </tr>

                          </tr>
                         
                      </table>
                      <?php }
                    }
                      ?>
                
              </div>

          </div>
      </div>
  </section>