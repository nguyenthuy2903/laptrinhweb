<?php
//Kết nối cơ sở dữ liệu
$ocon=mysqli_connect("localhost","root","","qlbanhang");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//Lấy lại ma loại sản phẩm cần xóa
$maloai=$_GET["maloai"];
//thực hiện kiểm tra có ràng buộc khóa ngoại không
//Xóa dữ liệu
$sql="delete from loaisanpham where Maloai='".$maloai."'";
if($ocon->query($sql)===TRUE)
{
	header("location:Home.php?Loaisp=0&tb=3");
}
else
{
	header("location:Home.php?Loaisp=0&loi=3");
}
?>