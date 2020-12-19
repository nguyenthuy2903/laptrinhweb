<?php
//else
//	echo "Ket noi thanh cong <br>";
$sobg_moitrang=4;



?>

		<div id="title">
			<H1>DANH SÁCH NGƯỜI DÙNG</H1>
			<span id="tb" style="display:none;">
				
			<?php 
			
				if(isset($_GET["tb"]))
					{
						if($_GET["tb"] ==3)
							echo "Xóa thành công";
						if($_GET["tb"]==2)
							echo "Sửa thành công";
					}
				
					else echo "test";
			?>
		</span>
		<span id="loi">
			<?php
				if(isset($_GET["loi"]))
					{
						if($_GET["loi"] ==3)
							echo "Loi khi xóa ";
					}
					?>
		</span>
		</div>
		<script>
			
			if(document.getElementById("tb").innerHTML.trim()!="test")
				{
					window.alert(document.getElementById("tb").innerHTML);
					document.getElementById("tb").innerHTML="test";
		}
		</script>
		<div>
			<a href="Home.php?Loaisp=1">Thêm người dùng</a>
		</div>
		<table class="table table-bordered">
			<thead>
			<th >
				STT
			</th>
			<th >
				Tên tài khoản
			</th>
			<th >
				Mật khẩu
			</th>
			<th >
				Quyền
			</th>
			<th >
				Hoạt động
			</th>
			<th >
				Sửa/Xóa
			</th>
		</thead>
	<tbody>
	<?php
		$ts_banghi=0;
		$sql1="select * from tblnguoidung";
		$result=$ocon->query($sql1);
		$ts_banghi=$result->num_rows;
		
		$sql="select * from tblnguoidung limit ".$sobg_moitrang;
		if(isset($_GET["trang"]))
		{
			$offset=($_GET["trang"]-1)*$sobg_moitrang;
			$sql=$sql." offset ".$offset;
		}
		//thực thi truy vấn
		$result=$ocon->query($sql);
		//kiem tra kết quả trả về
		if($result->num_rows>0)
		{
			$i=1;
			
			while($row=$result->fetch_assoc())
			{
		?>
		
		<tr>
			<td >
				<?php echo $i;?>
			</td>
			<td >
				<?php echo $row["tentaikhoan"];?>
			</td>
			<td >
				<?php echo $row["matkhau"];?>
			</td>
			<td >
				<?php echo $row["quyen"];?>
			</td>
			<td >
				<?php echo $row["Hoatdong"];?>
			</td>
			<td ><a href="Home.php?Account=2&tentaikhoan=<?php echo $row['tentaikhoan']; ?>">Sửa</a>
				<a href="Data/Account/xlXoatt.php?tentaikhoan=<?php echo $row['tentaikhoan']; ?>">Xóa</a>
			</td>
		</tr>
	
		<?php
		$i++;
			}
		}
		?>
	</tbody>
</table>
		
		<div class="row" style="height: 40px; text-align: center; font-size:20px;">
			
			<ul style="list-style-type: none;">
				<?php 
				$j=1;
				
				while ( $j<=ceil($ts_banghi/$sobg_moitrang)) {
									
				?>
				<li style="float:left; margin-left: 10px;">
					<a href="Home.php?Loaisp=0&trang=<?php echo $j;?>"><?php echo $j;?></a>
						
					</li>
				<?php
					$j++;
					}
				?>
			</ul>
		
		</div>


