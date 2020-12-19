<?php 
session_start();
include("../../Content/ketnoi.php");
$masp=$_GET["masp"];
$sql="delete from chitietsanpham where mahang='".$masp."'";
if($ocon->query($sql)===TRUE)
{
	header("location:../../Home.php?Banhang=0");
}
else
{
	header("location:../../Home.php?Banhang=0&loi=3");
}
$ocon->close();
?>