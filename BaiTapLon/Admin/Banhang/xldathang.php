<?php
	session_start();
	include("../../Content/ketnoi.php");
	$nowdate=getdate();
	$strdate=$nowdate["year"]."-".$nowdate["mon"]."-".$nowdate["mday"];
	$date=date("Y-m-d", strtotime($strdate));
	//lấy lại sohoadon, mahang can dat
	$sql="update Dondathang set Chedo=1, ngaydathang='".$date."' where Nguoidathang='".$_SESSION["user"]."' and Chedo=0";
	//set gia và so luong

	if($ocon->query($sql)===TRUE)
	{
		$sql2="update Chitietsanpham set Chitietsanpham.giaban=Sanpham.gia, Chitietsanpham.soluong=1 from Sanpham where sohoadon= ".$_GET["shd"];
		if($ocon->query($sql2)===TRUE)
		{
		header("location:../../Home.php?Banhang=0?chedo=1");
		}
		else
			echo "lỗi";

	}
	else
	{
		echo "Loi";
	}
	$ocon->close();
?>