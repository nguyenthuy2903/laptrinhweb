<?php 
	  $sbmoitrang=1;
	  $sql="Select * from sanpham";
	  if (isset($_GET["masp"]))
	  	$sql.= " where Masp='".$_GET["masp"]."'";
	  $sql.=" LIMIT $sbmoitrang";
	  if(isset($_GET["trang"]))
	  {
	  	$offset=$sbmoitrang*($_GET['trang']-1);
	  	$sql.=" OFFSET $offset";
	  }
	  
	  $result=$con->query($sql);
	  $i=0;
	 if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{ //for->while
	if($i%4==0)
	{
?>
	<div class="row">
<?php 
	}//end if
?>
	<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $row['Hinhanh'];?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $row["Tensp"];?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span><?php echo $row["Dongia"];?></span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
<!--link chi tiết sản phẩm-->	    <div class="m-auto d-flex">
	    							<a href="shop.php?product=1&masp=<?php echo $row['Masp']?>&maloai=<?php echo $row['Maloai']?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
<?php
	if($i%4==3)
	{
?>
</div> <!--div đóng của row-->

<?php 
	}//end if
	$i++;
}//end while
}//if_num_row
?>


		<!--Tinh duoc so trang-->
		<?php 
			$sqlsum="Select * from sanpham";
	  		if (isset($_GET["masp"]))
	  			$sqlsum.= " where Masp='".$_GET["masp"]."'";
	  		$result=$con->query($sqlsum);
	  		$tongsb=$result->num_rows;
	  		$tongsotrang=ceil($tongsb/$sbmoitrang);
	  		?>
	  		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <?php
	  		$j=1;
	  		while($j<=$tongsotrang)
	  		{
	  			$str= "<a href='shop.php?product=0";
	  			if(isset($_GET["masp"]))
	  			{
	  				$str.="&masp=".$_GET["masp"];
	  			}
	  			$str.="&trang=".$j."'>".$j."<a> ";
	  			?>
                <li class="active"><span><?php echo $str ?></span></li>
	  		<?php $j++;
	  		}
	  		?>
	  		</ul>
            </div>
          </div>
        </div>
		