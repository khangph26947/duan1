

<div class="row1 form__list">
      <div class="from">
          <h2>Quản Lý sản phẩm</h2>
      </div>
    <div class="from_list">
            <div class="from_flex">
                <div class="from_table">
                    <h2>Danh sách sản phẩm</h2>
                    <p>Danh sách các sản phẩm có trên hệ thống</p>
                </div>
                <div class="from_table--btn">
                     <a href="index.php?act=addsp"><input class="btn--s btn_primary" type="button" value="NHẬP THÊM"></a> 
                </div>
            </div>
            <form action="index.php?act=listsp" method="post">

    <input type="text" name="kyw" id="">
        <select name="iddm">
            <option value="0" selected>Tat Ca</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>

        </select>
    <input type="submit" name="listok" value="Go">
    </form>
            <div class="from_table-content">
                <table>
                    <tr>
                        <th class=bluan></th>
                        <th class=bluan>Mã Loại</th>
                        <th class=bluan>Tên Sản Phẩm</th>
                        <th class=bluan>Hình</th>
                        <th class=bluan>Giá</th> 
                        <th class=bluan>Hành động</th>
                    </tr>
                    <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=" . $id;
                    $xoasp = "index.php?act=xoasp&id=" . $id;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "no photo";
                    }

                    echo '
                       <tr>
                       <td class="bluan2"><input type="checkbox"></td>
                       <td class="bluan2">' . $id . '</td>
                       <td class="bluan2">' . $name . '</td>
                       <td class="bluan2">' . $hinh . '</td>
                       <td class="bluan2">' . $price . '</td>
                   
                       <td class="bluan1"> 
                       <a href="' . $suasp . '"><input class="mau1" type="button" value="sửa"></a>

                           <a href="' . $xoasp . '"><input class="mau2" type="button" value="xóa"></a>
                       
                       </td>
                   </tr>';
                }
                ?>
                </table>
            </div>
    </div>