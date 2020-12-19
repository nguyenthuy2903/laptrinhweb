<div id="content">
<?php 
for($i=0;$i<45;$i++){ 
	if($i%4==0)
	{
		echo "<div class='row'>";
	}
	echo "<div class='product'>";
	echo "<img src='image/anh1.jpg'>";
	echo "<div class='text py-3 pb-4 px-3 text-center'>
    						<h3><a>Tên sản phẩm</a></h3>";
	echo "<div class='d-flex'>
    							<div class='pricing'>
		    						<p class='price'><span>$120.00</span></p>
		    					</div>
	    					</div>";
	 echo "<div class='bottom-area d-flex px-3'>
	    						<div class='m-auto d-flex'>
	    							<a href='#'' class='add-to-cart d-flex justify-content-center align-items-center text-center'>
	    								<span><i class='ion-ios-menu'></i></span>
	    							</a>
	    							<a href='#' class='buy-now d-flex justify-content-center align-items-center mx-1'>
	    								<span><i class='ion-ios-cart'></i></span>
	    							</a>
	    							<a href='#'' class='heart d-flex justify-content-center align-items-center'>
	    								<span><i class='ion-ios-heart'></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>";
	
	if($i%4==3)
		{
		echo "</div>";
		}
	}
?>
</div>



