<div style="text-align: center; width:100%;"> <h2>Đăng nhập</h2></div>
  <?php
  if(isset($_GET["loi"]))
  {
	  if($_GET["loi"]==0)
	  	echo "Khong ton tai tai khoan nay ban hay nhap tai khoan khac";
	  	elseif ($_GET["loi"]==1) { 
	  	 	echo "Tai khoan cua ban da bi khoa";
	  	 }
  } ?>
  <div style="width:50%; margin-left:25%; border:solid 1px gray; border-radius: 2px; padding:5px;">
  <form action="Data/Account/xllogin.php" method="POST">
    <div class="form-group">
      <label for="email">Tên tài khoản:</label>
      <input type="text" class="form-control" id="txttk" placeholder="Enter Account" name="txttk">
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu:</label>
      <input type="password" class="form-control" id="txtmk" placeholder="Enter password" name="txtmk">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
