<?php
//Kết nối cơ sở dữ liệu
$ocon=mysqli_connect("localhost","root","","qlbanhang");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//Lấy lại thông tin cần sửa
$maloai=$_POST["maloaitt"];
$tenloai=$_POST["txttenloai"];
$mota=$_POST['mota'];
//thực hiện kiểm tra có ràng buộc khóa ngoại không
//Sửa dữ dữ liệu
$sql="update loaisanpham set Tenloai='".$tenloai."', Mota='".$mota."' where Maloai='".$maloai."'";
if($ocon->query($sql)===TRUE)
{
	header("location:../../Home.php?Loaisp=0&tb=2");
}
else
{
	//header("location:Qlloaisp.php?loi=3");
	echo $sql;
}
?>