<div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý danh mục</h2>
      </div>
    <div class="from_list">
            <div class="from_flex">
                <div class="from_table">
                    <h2>Danh sách danh mục</h2>
                    <p>Danh sách các danh mục sản phẩm có trên hệ thống</p>
                </div>
                <div class="from_table--btn">
                     <a href="index.php?act=adddm"><input class="btn--s btn_primary" type="button" value="NHẬP THÊM"></a> 
                </div>
            </div>
            <div class="from_table-content">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        //extrac để ta có thể lấy thẳng vào tên từng cột 
                         extract($danhmuc);
                        $suadm="index.php?act=suadm&id=".$id;
                        $xoadm="index.php?act=xoadm&id=".$id;
                       echo'
                       <tr>
                       <td><input type="checkbox"></td>
                       <td>'.$id.'</td>
                       <td>'.$name.'</td>
                       <td> 
                       <a href="'. $suadm.'"><input class="mau1" type="button" value="sửa"></a>

                           <a href="'. $xoadm.'"><input class="mau2" type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                    }
                    ?>
                </table>
            </div>
    </div>