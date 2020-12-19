
	
	<?php
		$sql="select * from sanpham where Masp='".$_GET['masp']."'";
		$result=$ocon->query($sql);
		$row=$result->fetch_assoc();
	?>
	<div id="contentctsp">
		<div id="anh" style="width:30%; float:left; height: 100%; border-right:solid 1px lightgray; text-align: center;">
			<img src="image/<?php echo $row['Hinhanh'];?>"  style="width:85%; height: auto;">
		</div>
		<div id="tt" style="width:70%;float:left; height:auto;">
			<div id="row" style="width:100%; height:80px; border-bottom:solid 1px lightgreen;  " >
				<div style="font-size:25px;">
				 Tên sản phẩm:
					<?php echo $row['Tensp'];?>
				</div>
				
				Đánh giá: <i class="glyphicon glyphicon-star" style="color:red;"></i><i class="glyphicon glyphicon-star" style="color:red;"></i>
				<i class="glyphicon glyphicon-star" style="color:red;"></i>
				<i class="glyphicon glyphicon-star" style="color:red;"></i>
				<i class="glyphicon glyphicon-star" style="color:red;"></i>

			</div>
			<div id="row" style="font-size:18px;">
				 Giá:
				
					<?php echo $row['Gia'];?>
				
			</div>
			<div id="row" style="font-size:18px;">
				 Số lượng còn:<?php echo $row['Soluong'];?>sfd
				
			</div>
			<a class="btn btn-success" href="Home.php?Sanpham=3&masp=<?php echo $row['Masp'];?>">Sửa sản phẩm </a> 
			<a href="Data/Sanpham/xlxoasp.php?masp=<?php echo $row['Masp'];?>" class="btn btn-danger">Xóa sản phẩm</a>
			<a href="Data/Banhang/xlthemgiohang.php?masp=<?php echo $row['Masp'];?>" class="btn btn-primary" ">Thêm vào giỏ</a>
		</div>
	</div>
