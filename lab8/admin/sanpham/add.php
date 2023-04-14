
<div class="row1 form__list">
      <div class="from">
          <h2>Thêm mới sản phẩm</h2>
      </div>
      <div class="from_list">
                    <div class="from_conten">
                        <h2 class="gachchan">Form thông tin sản phẩm mới</h2>
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="from_conten-item">
                  <label for="">Danh mục</label><br>
                  <select name="iddm">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>
        
                  </select>
            </div>
                        <div class="from_conten-item">
                            <label for="">Tên sản phẩm</label><br>
                            <input type="text" name="tensp" placeholder="Nhập vào tên sản phẩm">
                        </div>
                        <div class="from_conten-item">
                            <label for="">Giá sản phẩm</label><br>
                            <input type="text" name="giasp" placeholder="Nhập vào giá sản phẩm">
                        </div>
                        <div class="from_conten-item">
                            <label for="">Hình ảnh sản phẩm</label><br>
                            <input type="file" name="hinh">
                        </div>
                        <div class="from_conten-item">
                            <label for="">Mô tả sản phẩm</label><br>
                            <textarea name="mota"  cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="from__btn">
                    <input class="btn btn_primary" type="submit" name="themmoi" value="THÊM MỚI">
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
  
  