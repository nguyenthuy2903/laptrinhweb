<?php 
session_start();
include("../../Content/ketnoi.php");
$nowdate=getdate();
$strdate=$nowdate["year"]."-".$nowdate["mon"]."-".$nowdate["mday"];
$date=date("Y-m-d", strtotime($strdate));
//Luu y:
//Them vao gio hang
$masp=$_GET["masp"];
//B1:lay lai ma hang can them
//B2: Thuc hien truy van insert vao bang Dondathang voi cac thong tin
//Ngaychonhang=ngayhientai, nguoidathang=session("username"), chedo=0

//Buoc 1-- kiểm tra gio hang co chua---sua
$sql_search_hoadon="select MaHD from HoaDon where Nguoidathang='".$_SESSION["user"]."' and Chedo=0";
$result1=$ocon->query($sql_search_hoadon);
if($result1->num_rows>0)//buoc 2
{
	$row=$result1->fetch_assoc();
	//kiem tra trong giỏ hàng đó có sản phẩm chọn chưa----------sua lai-----
	$sql_search_sp="select Dondathang.sohoadon from Chitietsanpham inner join Dondathang on Dondathang.sohoadon=Chitietsanpham.sohoadon where mahang='".$masp."' and Chedo=0 and Nguoidathang='".$_SESSION["user"]."'";
	//echo $sql_search_sp;
	$result2=$ocon->query($sql_search_sp);
	if($result2->num_rows>0)
	{
		echo "Đã tồn tại sản phẩm trong giỏ hàng";
		exit();
	}
	else
	{
		$sql_insert_sp="insert into Chitietsanpham(sohoadon,mahang) values(".$row["sohoadon"].",'".$masp. "')";
		if($ocon->query($sql_insert_sp)===TRUE)
		{
			echo "Thêm vào giỏ hàng thành công";
			header("location:../../Home.php?Banhang=0");
		}
		else
		{
			echo "Lỗi thêm chi tiet đặt hàng";
		}
	}
}
else //buoc 3
{
	//thêm đơn đặt hàng mới
	$sql_insert_dondathang="insert into Dondathang(Ngaychonhang,Nguoidathang,Chedo) values('".$date."','".$_SESSION["user"]."',0)";
	if($ocon->query($sql_insert_dondathang)===TRUE)
	{	
		//lấy lại số hóa đơn vừa thêm.
		$sql_search_hoadon="select sohoadon from Dondathang where Nguoidathang='".$_SESSION["user"]."' and Ngaychonhang='".$date."'";
		$result1=$ocon->query($sql_search_hoadon);
		$row=$result1->fetch_assoc();
		//thêm sản phẩm
		$sql_insert_sp="insert into Chitietsanpham(sohoadon,mahang) values(".$row["sohoadon"].",'".$masp. "')";

		if($ocon->query($sql_insert_sp)===TRUE)
		{
			echo "Thêm vào giỏ hàng thành công ...";
			header("location:../../Home.php?Banhang=0");
		}
		else
		{
			echo "Lỗi thêm chi tiet đặt hàng";
		}
	}
	else
	{
		echo "Lỗi thêm đơn đặt hàng";

	}

}

$ocon->close();
 ?>