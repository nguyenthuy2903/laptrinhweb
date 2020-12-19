
	<?php
		if(isset($_GET["loi"]))
		{
			if($_GET["loi"]==2)
				echo "Lỗi thêm sản phẩm. Dữ lieu bi trung lặp";
			else
				echo "Lỗi nào đó";
		}
	?>
	<div style="width:70%;
			margin-left: 15%;
			">"
		<span style="text-align: center;"><H1>Thêm loại sản phẩm</H1></span>
	<form name="frmthem" method="post" action="Data\Loaisp\xlthemloaisp.php">
  <div class="form-group">
    <label for="maloai">Mã loại:</label>
    <input type="text" class="form-control" name="maloai">
  </div>
  <div class="form-group">
    <label for="tenloai">Tên loại:</label>
    <input type="text" class="form-control" name="tenloai">
  </div>
   <div class="form-group">
    <label for="mota">Mô tả:</label>
    <input type="text" class="form-control" name="mota">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
	</div>

