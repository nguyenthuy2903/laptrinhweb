<?php

	$sql="select Masp,Tensp,Gia,dondathang.sohoadon as sohoadon, Ngaychonhang, Nguoidathang,chedo from dondathang inner join chitietsanpham on dondathang.sohoadon=chitietsanpham.sohoadon inner join sanpham on chitietsanpham.mahang=sanpham.Masp where Nguoidathang='".$_SESSION["user"]."'";

	//echo $sql;
	$result=$ocon->query($sql);
	if($result->num_rows<=0)
		exit();

?>

<div>
	<div style="color:orange; font-size:30px; text-align: center;"> 
		Giỏ hàng của bạn
	</div>
<table class="table table-bordered">
	<thead>
		
		<th> STT</th>
		<th> Sohoadon</th>
		<th> Mã hàng </th>
		<th> Tên hàng</th>
		<th> Giá hàng</th>
		<th> Số lượng</th>
		<th> Thành tiền</th>
		<th></th>

	</thead>
	<tbody>
		<?php 
		$i=0;
		while($row=$result->fetch_assoc())
		{
			$i++;
		?>
		<tr>
			
			<td>
				<?php echo $i;?>
			</td>
			<td>
				<?php 
				$sohoadon=$row["sohoadon"];
				echo $row["sohoadon"];?>
			</td>
			<td class="mahang">
				<?php echo $row["Masp"];?>
			</td>
			<td>
				<?php echo $row["Tensp"];?>
			</td>
			<td class="gia">
				<?php echo $row["Gia"];?>
			</td>
			<td>
				<select name="soluong" class="soluong">
					<script>
						for(i=1;i<100;i++)
						{
							document.write("<option value='"+i+"'>"+i+"</option>");
						}
					</script>
				</select>
			</td>
			<td>
				<input type="textbox" value="<?php echo $row['Gia'];?>" class="thanhtien" name="thanhtien" readonly="true">
				<script>
					
					$(document).ready(function()
					{				

						$(".soluong").change(function(){
							
							var sl=parseInt($(this).val());
							//alert(sl);
							var gia=parseInt($(this).parents("tr").find(".gia").text());
							//alert(gia);
							$(this).parents("tr").find(".thanhtien").val(sl*gia);
						});

					});
				</script>
			</td>
			
			<td>
				<?php 
				$chedo=$row["chedo"];
				if($row["chedo"]==1) echo "đã đặt hàng";
				else
					if ($row["chedo"]==2)
							echo "đã thanh toán";?>
				<a href="Data/Banhang/xlxoagiohang.php?masp=<?php echo $row["Masp"];?>">Xóa</a> 
				<a href="Home.php?Sanpham=2&masp=<?php echo $row["Masp"];?>">
				Chi tiết
			</a>
			</td>
		</tr>
		<?php
		}//while
		  ?>
	</tbody>
</table>
<div style="text-align:center;">
	<?php if($chedo==0)
	{?>
	<a href="Data/Banhang/xldathang.php?shd=<?php echo $shd;?>" id="dathang" class="btn btn-danger" role="button">Đặt hàng</a>
	<?php

}?>
	<?php if($chedo==1){?>
	<a href="Data/Thanhtoan/thanhtoan.php?shd=<?php echo $sohoadon;?>" id="thanhtoan" class="btn btn-danger" role="button">Thanh toán cc</a>
	<?php
}?>
	
</div>
</div>