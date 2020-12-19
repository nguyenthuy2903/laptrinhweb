<div style="width:100%; text-align: right;">
		<a href="Home.php?Sanpham=1">Add Product</a>
	</div>
	<div id="contentttsp">
		
		<?php
		//tinh tong so ban ghi
		$tongsobanghi=0;
		$s_bghimoitrang=4;
		$sqltongso="select * from sanpham";
		if(isset($_GET['maloai']))
			$sqltongso.=" where Maloai='".$_GET['maloai']."'";
		if(isset($_GET['txtsearch']))//tim kiem
		{
			$sqltongso.=" where Tensp like '%".$_GET['txtsearch']."%'";
		}
		$result1=$ocon->query($sqltongso);
		$tongsobanghi=$result1->num_rows;
		//hienthi
		$sql="select * from sanpham";
		if(isset($_GET['maloai']))//phan theo loai
		{
			$sql.=" where Maloai='".$_GET['maloai']."'";
		}
		if(isset($_GET['txtsearch']))//tim kiem
		{
			$sql.=" where Tensp like '%".$_GET['txtsearch']."%'";
		}
		
		$sql.=" limit ".$s_bghimoitrang;//gioi han so ban ghi tren moi trang
		if(isset($_GET['trang']))
			$sql.=" OFFSET ".($_GET['trang']-1)*$s_bghimoitrang;
		//thực thi truy vấn

		$result=$ocon->query($sql);

		//kiem tra kết quả trả về
		if($result->num_rows>0)
		{
			$i=0;
			while($row=$result->fetch_assoc())
			{

			 if($i%3==0) echo "<div class='row'>";
			 ?>
			<div class="col">
				<img src="image/<?php echo $row['Hinhanh'];?>" class="img">
				<?php echo "<br>".$row['Tensp']."<br>".$row['Gia'];?>
				<a href="Home.php?Sanpham=2&masp=<?php echo $row['Masp'];?>">Chi tiết</a>
			</div>
		<?php if($i%3==2)
			echo "</div>";
			$i=$i+1;
			}//endwhile
		}//endif
		?>
	</div>
	<div id="phantrang" style="text-align: center; width:40%; margin-left:30%; ">
		<ul>
			<?php
			$i=1;
			while($i<=ceil($tongsobanghi/$s_bghimoitrang))
			{?>
				<li style="float:left; list-style-type: none;"><a style="display:block; padding:10px; border:solid 1px orange; " href=
				"Home.php?Sanpham=0&trang=<?php echo $i;
				if(isset($_GET['maloai']))
				echo "&maloai=".$_GET['maloai'];
				//tim kiem
				if(isset($_GET['txtsearch']))
					echo "&txtsearch=".$_GET['txtsearch'];

				?>"><?php echo $i;?></a></li>
			<?php
				$i++;
			}
			?>
		</ul>
	</div>
	

