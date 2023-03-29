<div class="row">
            <div class="row formtitle"><h1>DANH SÁCH BÌNH LUẬN</h1></div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                   <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Tên bình luận</th>
                        <th>Nội dung bình luận</th>
                        <th>Iduser</th>
                        <th>Idpro</th>
                        <th>Ngày bình luận</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        //extrac để ta có thể lấy thẳng vào tên từng cột 
                         extract($binhluan);
                        $suabl="index.php?act=suabl&id=".$id;
                        $xoabl="index.php?act=xoabl&id=".$id;
                       echo'
                       <tr>
                       <td><input type="checkbox"></td>
                       <td>'.$id.'</td>
                       <td>'.$name.'</td>
                       <td>'.$noidung.'</td>
                       <td>'.$iduser.'</td>
                       <td>'.$idpro.'</td>
                       <td>'.$ngaybinhluan.'</td>
                       <td> 


                           <a href="'. $xoabl.'"><input type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                    }
                    ?>
                   </table>
                  </div>  
                
                <div class="row mb10">
                    <!-- <input type="button" value="CHỌN TẤT CẢ">
                    <input type="button" value="BỎ CHỌN TẤT CẢ">
                    <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                </div>
            </div>
        </div>