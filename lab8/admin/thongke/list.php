


<div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý thống kê</h2>
      </div>
    <div class="from_list">
            <div class="from_flex">
                <div class="from_table">
                    <h2>Danh sách Thống kê</h2>
                    <p>Danh sách các thống kê có trên hệ thống</p>
                </div>
                <div class="from_table--btn">
                     <a href="index.php?act=bieudo"><input class="btn--s btn_primary" type="button" value="Xem biểu đồ"></a> 
                </div>
            </div>
            <div class="from_table-content">
                <table>
                    <tr>
                        <th class="bluan">MÃ DANH MỤC</th>
                        <th class="bluan">TÊN DANH MỤC</th>
                        <th class="bluan">SỐ LƯỢNG</th>
                        <th class="bluan">GIÁ CAO NHẤT</th>
                        <th class="bluan">GIÁ THẤP NHẤT</th>
                        <th class="bluan">GIÁ TRUNG BÌNH</th>
                        <th class="bluan"></th>
                    </tr>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        
                       echo'
                       <tr>

                       <td class="bluan1">'.$madm.'</td>
                       <td class="bluan1">'.$tendm.'</td>
                       <td class="bluan1">'.$countsp.'</td>
                       <td class="bluan1">'.$maxprice.'</td>
                       <td class="bluan1">'.$minprice.'</td>
                       <td class="bluan1">'.$avgprice.'</td>
                       
                   </tr>';
                    }
                    ?>
                </table>
            </div>
    </div>