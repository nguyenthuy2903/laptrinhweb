
	<?php
		if(isset($_GET["loi"]))
		{
			if($_GET["loi"]==2)
				echo "Lỗi thêm sản phẩm. Dữ lieu bi trung lặp";
			else
				echo "Lỗi nào đó";
		}
	?>
	<div style="	width:70%;
			margin-left: 15%;
			">
		<span style="text-align: center;"><H2>Sửa thông tin loại sản phẩm</H2></span>
<?php
//lay ma loai san pham can sua
$maloai=$_GET["maloai"];
$sql="select * from loaisanpham where Maloai='".$maloai."'";
$result=$ocon->query($sql);
if($result->num_rows>0)
{
	$row=$result->fetch_assoc();
?>
	<form name="frmsua" method="post" action="Data\Loaisp\xlsualoaisp.php">
  <div class="form-group">
    <label for="maloai">Mã loại:</label>
    <input type="text" class="form-control" name="maloaitt"
    value="<?php echo $row['Maloai']; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="tenloai">Tên loại:</label>
    <input type="text" class="form-control" name="txttenloai"
    value="<?php echo $row['Tenloai']; ?>">
  </div>
   <div class="form-group">
    <label for="mota">Mô tả:</label>
    <input type="text" class="form-control" name="mota" value="<?php echo $row['Mota']; ?>">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
}
//dong ket noi
$ocon->close();
?>
	</div>
