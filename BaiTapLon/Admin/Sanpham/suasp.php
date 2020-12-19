<?php
    if(isset($_GET["loi"]))
    {
      if($_GET["loi"]==2)
        echo "Lỗi thêm sản phẩm. Dữ lieu bi trung lặp";
      else
        echo "Lỗi nào đó";
    }
  ?>
  <div style="  width:70%;
      margin-left: 15%;
      ">
    <span style="text-align: center;"><H2>Sửa thông tin  sản phẩm</H2></span>

<?php
//lay ma loai san pham can sua
$masp=$_GET["masp"];
$sql="select * from sanpham where Masp='".$masp."'";
$result=$ocon->query($sql);
if($result->num_rows>0)
{
  $row=$result->fetch_assoc();
?>

	
		<!-- bổ sung enctype cho thẻ form-->
	<form name="frmthem" method="post" action="Data/sanpham/xlthemsp.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="maloai">Mã sản phẩm:</label>
    <input type="text" class="form-control" name="masp" value="<?php echo $row['Masp'];?>">
  </div>
  <div class="form-group">
    <label for="tenloai">Tên sản phẩm:</label>
    <input type="text" class="form-control" name="tensp" value="<?php echo $row['Tensp'];?>">
  </div>
  <div class="form-group">
    <label for="tenloai">Hình ảnh minh họa:</label>
    <input type="file" class="form-control" name="image">
  </div>
   <div class="form-group">
   	 <label for="tenloai">Mã loại sản phẩm:</label>
   <select name="maloai">
  
   		<option value="<?php echo $row['Maloai'];?>"><?php echo $row["Tenloai"];?></option>
  
   </select>
  </div>
 
  <button type="submit" class="btn btn-default">Submit</button>
</form>
 <?php
}?>
	</div>
