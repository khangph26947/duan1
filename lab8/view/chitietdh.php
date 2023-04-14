

<div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý đơn hàng</h2>
      </div>
    <div class="from_list">
            <div class="from_flex">
                <div class="from_table">
                    <h2>Danh sách đơn hàng</h2>
                    <!-- <p>Danh sách các sản phẩm có trên hệ thống</p> -->
                </div>
                <!-- <div class="from_table--btn">
                     <a href="index.php?act=addsp"><input class="btn--s btn_primary" type="button" value="NHẬP THÊM"></a> 
                </div> -->
            </div>
            <form action="index.php?act=listcard" method="post">

    <input hidden type="text" name="kyw" id="">
        <select name="madh">
            <option value="0" selected>Tat Ca</option>
            <?php
             foreach ($listcart as $bill) {
                extract($bill);
                echo '<option value="' . $id . '">' . $madh . '</option>';
            }
            ?>

        </select>
    <input type="submit" name="listok" value="Go">
    </form>
            <div class="from_table-content">
                <table>
                    <tr>
                        <th class=bluan></th>
                       
                        <th class=bluan>Tên Sản Phẩm</th>
                        <th class=bluan>Hình</th>
                        <th class=bluan>Giá</th> 
                      
                    </tr>
                    <?php
                foreach ($listcard as $card) {
                    extract($card);
                    // $suasp = "index.php?act=suasp&id=" . $id;
                    // $xoasp = "index.php?act=xoasp&id=" . $id;
                    $hinhpath = "./upload./" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "no photo";
                    }

                    echo '
                       <tr>
                       <td class="bluan2"><input type="checkbox"></td>
                       <td hidden class="bluan2" >' . $id . '</td>
                       <td class="bluan2">' . $tensp . '</td>
                       <td class="bluan2">' .  $hinh . '</td>
                       <td class="bluan2">' . $dongia . '</td>
                       
                   
                      
                   </tr>';
                }
                ?>
                </table>
            </div>
    </div>