<?php
//ktra xem có là một mảng hay không
if(is_array($dm)){
    extract($dm);
}
?>




    <div class="row1 form__list">
      <div class="from">
          <h2>Cập nhật danh mục sản phẩm</h2>
      </div>
      <div class="from_list1">
                <form action="index.php?act=updatedm" method="post">
                    <div class="from_conten">
                        <h2>Form thêm thông tin danh mục sản phẩm mới</h2>
                        <div class="from_conten-item">
                            <label for="">Mã loại</label><br>
                            <input type="text" name="maloai" disabled>
                        </div>
                        <div class="from_conten-item">
                            <label for="">Tên danh mục</label><br>
                            <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name ; ?>">
                        </div>
                    </div>
                    <div class="from__btn">
                    <input class="btn btn_primary" type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id ; ?>">
                              <input class="btn btn_primary" name="capnhat" type="submit" value="Chỉnh sửa">
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