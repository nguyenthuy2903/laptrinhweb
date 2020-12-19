<?php
//Lấy lại ma loại sản phẩm cần xóa
include("../../content/Ketnoi.php");
$masp=$_GET["masp"];
//thực hiện kiểm tra có ràng buộc khóa ngoại không
//Xóa dữ liệu
$sql="delete from sanpham where Masp='".$masp."'";
if($ocon->query($sql)===TRUE)
{
	header("location:../../Home.php?Sanpham=0");
}
else
{
	header("location:../../Home.php?Sanpham=0&loi=3");
}
$ocon->close();
?>