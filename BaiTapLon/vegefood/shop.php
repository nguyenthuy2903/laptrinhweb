
 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>fresh shop - Bài tập lớn lập trình web</title>
    <?php include("layout/link.php"); 
    require("public/ketnoi.php");?>
  </head>
   <body>
    <?php include("layout/header.php"); ?>
    <!-- END nav -->
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Sản phẩm</span></p>
            <h1 class="mb-0 bread">Sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<?php $sql="Select * from loaisanpham";
                $result=$con->query($sql);
        
               if($result->num_rows>0)
               {
               while($row=$result->fetch_assoc())
               {
              ?>
               <li ><a href="Home.php?product=0&maloai=<?php  echo $row['Maloai']; ?>"><?php echo $row["Tenloai"]; ?> </a></li>
               <?php
               }//end_while
               } //end if

               ?>
    				</ul>
    			</div>
    		</div>
             
                        <?php
                          if(isset($_GET["product"]))
                             {
                                 if ($_GET["product"]=="1")
                                        include("customer/product/product_detail.php");
                                 if ($_GET["product"]=="0")
                                        include("customer/product/product_info.php");
                            }
                          else
                          {
                            include("customer/product/product_info.php");
                          } 
                        ?>
                   
    		
    </section>
<?php include("layout/footer.php") ?>	
   
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>