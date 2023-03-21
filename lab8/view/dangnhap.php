<form action="index.php?act=login" method="post">
    <h1  style="color:red">Đăng Nhập</h1>
  <div class="mb-3 mt-3">
    <label for="uname" class="form-label"><b>Username</b></label>
    <input type="text" class="form-control"  placeholder="Enter Username" name="user" require>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter password" name="pass" require >
  </div>
 
  <input type="submit" name="login" value="Login" class="btn btn-primary"></input>
</form>