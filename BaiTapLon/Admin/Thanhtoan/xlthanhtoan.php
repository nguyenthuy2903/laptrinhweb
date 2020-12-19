<?php
	session_start();
	include("../../Content/ketnoi.php");
	$nowdate=getdate();
	$strdate=$nowdate["year"]."-".$nowdate["mon"]."-".$nowdate["mday"];
	$date=date("Y-m-d", strtotime($strdate));

	//lấy lại sohoadon, mahang can dat
	$sql="update Dondathang set Chedo=2, ngaythanhtoan='".$date."' where sohoadon=".$_GET["shd"];
	if($ocon->query($sql)===TRUE)
	{
		header("location:../../Home.php?Banhang=0?chedo=2");
	}
	else
	{
		echo "Loi";
	}
	$ocon->close();
?>