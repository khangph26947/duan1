       <div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý Bình luận</h2>
      </div>
    <div class="from_list">
                <div class="from_table">
                    <h2>Danh sách bình luận</h2>
                    <p>Danh sách binh luận có trên hệ thống</p>
                </div>
            <div class="from_table-content">
                <table>
                    <tr>
                        <th class="bluan"></th>
                        <th class="bluan">ID</th>
                        <th class="bluan">Tên bình luận</th>
                        <th class="bluan">Nội dung bình luận</th>
                        <th class="bluan">Iduser</th>
                        <th class="bluan">Idpro</th>
                        <th class="bluan">Ngày bình luận</th>
                        <th class="bluan">Hành động</th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        //extrac để ta có thể lấy thẳng vào tên từng cột 
                         extract($binhluan);
                        $suabl="index.php?act=suabl&id=".$id;
                        $xoabl="index.php?act=xoabl&id=".$id;
                       echo'
                       <tr>
                       <td class="bluan1"><input type="checkbox"></td>
                       <td class="bluan1">'.$id.'</td>
                       <td class="bluan1">'.$name.'</td>
                       <td class="bluan1">'.$noidung.'</td>
                       <td class="bluan1">'.$iduser.'</td>
                       <td class="bluan1">'.$idpro.'</td>
                       <td class="bluan1">'.$ngaybinhluan.'</td>
                       <td class="bluan1"> 


                           <a href="'. $xoabl.'"><input class="mau2" type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                    }
                    ?>
                </table>
            </div>
    </div>