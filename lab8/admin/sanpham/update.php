<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>






<div class="row1 form__list">
      <div class="from">
          <h2>CẬP NHẬT LOẠI HÀNG HÓA</h2>
      </div>
      <div class="from_list">
                    <div class="from_conten">
                        <h2 class="gachchan">Form sửa thông tin sản phẩm </h2>
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="from_conten-item">
            <select name="iddm">
            <option> value="0" selected>Tat Ca</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                //extract($danhmuc);
                if($iddm==$danhmuc['id']){
                    echo '<option value='.$danhmuc['id'].' selected>'.$danhmuc['name'].'</option>'; 
                    }else{
                        echo '<option value='.$danhmuc['id'].'>'.$danhmuc['name'].'</option>'; 
                    }      
            }
            ?>

        </select>
          </div>
                        <div class="from_conten-item">
                            <label for="">Tên sản phẩm</label><br>
                            <input type="text" name="tensp" placeholder="Nhập vào tên sản phẩm" value="<?=$name?>">
                        </div>
                        <div class="from_conten-item">
                            <label for="">Giá sản phẩm</label><br>
                            <input type="text" name="giasp" placeholder="Nhập vào giá sản phẩm" value="<?php echo $price ?>">
                        </div>
                        <div class="from_conten-item">
                            <label for="">Hình ảnh sản phẩm</label><br>
                            <input type="file" name="hinh">
                            <?php echo $hinh ?>
                        </div>
                        <div class="from_conten-item">
                            <label for="">Mô tả sản phẩm</label><br>
                            <textarea name="mota" cols="30" rows="10"><?=$mota ?></textarea>
                        </div>
                    </div>
                    <div class="from__btn">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input class="btn btn_primary" type="submit" name="capnhat" value="CẬP NHẬT">
                              <input class="btn btn_sam" type="reset" value="NHẬP LẠI">
                            <a href="index.php?act=listsp"><input class="btn btn_nhat" type="button" value="DANH SÁCH"></a> 
                    </div>
                    <div class="thongbao">
                      <?php 
                              if(isset($thongbao)&&($thongbao!=""))
                              echo $thongbao;
                              ?>
                  </form>
                     </div>
      </div>
</div>
  