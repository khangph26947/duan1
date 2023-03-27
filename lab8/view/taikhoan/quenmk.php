<!-- <div class="row mb ">
    <div class="boxtrai mr ">
    <div class="row mb ">
   
    <div class="boxtitle">Quên Mật Khẩu</div>
    <div class="row boxcontent formtaikhoan">
   <form action="index.php?act=quenmk" method="post">
   <div class="row mb10">
    Email:
    <input type="email" name="email" >
   </div>
    <div class="row mb10">
    <input type="submit" value="Gửi" name="guiemail">
    <input type="reset" value="Nhập Lại">
    </div>
   </form>
  
 
 
   <h2 class="thongbao">
   <?php 
   if(isset($thongbao)&&($thongbao!="")){
    echo $thongbao;
   }
  
  
   ?>
    </h2>
    </div>
   
</div>


    </div>

   
</div> -->
<form action="index.php?act=quenmk" method="post">
  <!-- Email input -->
  <div class="form-outline mb-4">
    
    <label class="form-label" for="form2Example1">Email address</label> <br>
    <input type="email" name="email" id="form2Example1" class="form-control" />
  </div>

  

 
  <!-- Submit button -->
  <input type="submit" name="guiemail" value="Sing in" class="btn btn-primary btn-block mb-4"></input>

  <!-- Register buttons -->
  <?php 
   if(isset($thongbao)&&($thongbao!="")){
    echo $thongbao;
   }
  
  
   ?>
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
