<?php 
//Kết nối cơ sở dữ liệu
$ocon=mysqli_connect("localhost","root","","qlbanhang");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//lấy dữ liệu từ trang Themloaisp về
$tenloai=$_POST["tenloai"];
$maloai=$_POST["maloai"];
$mota=$_POST["mota"];
//kiểm tra xem dữ liệu thêm vào có trùng trong cơ sở dữ liệu không
$sql_ktr="select * from loaisanpham where Maloai like '%".$maloai."%' or Tenloai like '%".$tenloai."%'";
echo $sql_ktr;
$result=$ocon->query($sql_ktr);
if($result->num_rows>0)
{
	//echo $result->num_rows;
	header("location:Themloaisp.php?loi=2");
}
else{
	//nếu không trùng mới tiến hành thêm
	$sql="insert into loaisanpham(Maloai,Tenloai,Mota) values('".$maloai."','".$tenloai."','".$mota."')";
	//echo $sql;
	if($ocon->query($sql)===TRUE)
	{
		//echo "Thêm dữ liệu thành công";
		header("location:../../Home.php?Loaisp=0");
	}
	else
	{
		header("location:../../Home.php?Loaisp=0&loi=1");
	}
}
?>