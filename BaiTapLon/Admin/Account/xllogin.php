<?php
//ketnoicsdl
$ocon=mysqli_connect("localhost","root","","qlbanhang");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//lay du dang nhap ve
$user=$_POST["txttk"];
$pass=$_POST["txtmk"];
//kiem tra trong csdl co tai do khong
$sql="select * from tblnguoidung where tentaikhoan='".$user."' and matkhau='".$pass."'";
echo $sql;

$result=$ocon->query($sql);
if($result->num_rows>0)
{
	$row=$result->fetch_assoc();
	//hoatdong=0-dang bi khoa
	if($row["Hoatdong"]==0)
		header("location:../../Home.php?Account=0&loi=1");
	else
	{
		//hoatdong=1
		session_start();
		$_SESSION["user"]=$user;
		$_SESSION["quyen"]=$row["quyen"];
		header("location:../../Home.php");
	}
		
}
else
{
	//Khong ton tai tai khoan hay mat khau nay
	header("location:../../Home.php?Account=0&loi=0");
}

?>