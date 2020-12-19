<?php
//xay dung cau lenh sql
$sql="select * from Loaisanpham";
//thuc thi truy van
$result=$ocon->query($sql);
?>

	<?php
		if(isset($_GET["loi"]))
		{
			if($_GET["loi"]==2)
				echo "Lỗi thêm sản phẩm. Dữ lieu bi trung lặp";
			else
				echo "Lỗi nào đó";
		}
	?>
	<div id="contentthemsp" style="width:60%: margin-left:20%;">
		<span style="text-align: center;"><H1>Thêm sản phẩm</H1></span>
		<!-- bổ sung enctype cho thẻ form-->
	<form name="frmthem" method="post" action="Data/sanpham/xlthemsp.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="maloai">Mã sản phẩm:</label>
    <input type="text" class="form-control" name="masp">
  </div>
  <div class="form-group">
    <label for="tenloai">Tên sản phẩm:</label>
    <input type="text" class="form-control" name="tensp">
  </div>
  <div class="form-group">
    <label for="tenloai">Đơn giá:</label>
    <input type="text" class="form-control" name="gia">
  </div>
   <div class="form-group">
    <label for="tenloai">Số lượng:</label>
    <input type="text" class="form-control" name="sl">
  </div>
  <div class="form-group">
    <label for="tenloai">Hình ảnh minh họa:</label>
    <input type="file" class="form-control" name="image">
  </div>
   <div class="form-group">
   	 <label for="tenloai">Mã loại sản phẩm:</label>
   <select name="maloai">
   	<?php while ($row=$result->fetch_assoc()) {?>
   		<option value="<?php echo $row["Maloai"];?>"><?php echo $row["Tenloai"];?></option>
   	<?php }?>
   </select>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
	</div>
