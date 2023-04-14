<div class="row1 form__list">
      <div class="from">
          <h2>Thêm mới danh mục sản phẩm</h2>
      </div>
      <div class="from_list">
                <form action="index.php?act=adddm" method="post">
                    <div class="from_conten">
                        <h2 class="gachchan">Form thêm thông tin danh mục sản phẩm mới</h2>
                        <div class="from_conten-item">
                            <label for="">Tên danh mục</label><br>
                            <input type="text" name="tenloai" placeholder="Nhập vào tên danh mục" required>
                        </div>
                    </div>
                    <div class="from__btn">
                    <input class="btn btn_primary" type="submit" name="themmoi" value="THÊM MỚI">
                              <input class="btn btn_sam" type="reset" value="NHẬP LẠI">
                            <a href="index.php?act=listdm"><input class="btn btn_nhat" type="button" value="DANH SÁCH"></a> 
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