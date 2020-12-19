<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	include("../../Content/ketnoi.php");
	$sql="select sum(soluong*giaban) as sotien from chitietsanpham where sohoadon=".$_GET["shd"]." group by sohoadon";
	echo $sql;
	$result=$ocon->query($sql);
	$row=$result->fetch_assoc();
	$sotien=$row["sotien"];
	echo "<span id='sotien' style='display:none'>".$sotien."</span>";
	?>
<div class="container">
  <h2>Cổng thanh toán trực tuyến</h2>
  <p>Bạn đang sử dụng cổng thanh toán trực tuyến để thanh toán sản phẩm mua hàng</p>
  
  <p>Kích chuột tại thẻ ngân hàng sử dụng để thanh toán.</p>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
       
          <img src="../../image/the1.jpg" alt="Lights" style="width:100%" class="imgthe">
          <div class="caption">
            <p>Sử dụng thẻ Agribank</p>
          </div>
       
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
       
          <img src="../../image/the2.jpg" alt="Nature" style="width:100%" class="imgthe">
          <div class="caption">
            <p>Sử dụng thẻ OCB Bank</p>
          </div>
       
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        
          <img src="../../image/the3.jpg" alt="Fjords" style="width:100%" class="imgthe">
          <div class="caption">
            <p>Sử dụng thẻ VietTin Bank.</p>
          </div>
      
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Đăng nhập tài khoản thẻ dể thanh toán</h4>
          <div class="thumbnail">
        
          <img src="../../image/the3.jpg" alt="Fjords" style="width:30%" class= "imgtt">
          <div class="caption">
            
          </div>
      
      </div>
        </div>
        <div class="modal-body" style="">
          <form role="form" action="xlthanhtoan.php?shd=<?php $_GET['shd']; ?>" method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Số tài khoản</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Số tiền</label>
              <input type="number" class="form-control" id="money" placeholder="Enter Money">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
           <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mã OTP: </label>
              <input type="text" class="form-control" id="psw" placeholder="Enter OTP">
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Thanh toán</button>
          </form>
        </div>
        
      </div>
      
    </div>
  </div> 
  <script>
$(document).ready(function(){
  $(".imgthe").click(function(){
  	$(".imgtt").attr('src',$(this).attr('src'));
  	//alert($(this).attr('src'));
    $("#myModal").modal();

  });
  $("form").submit(function(){
  	if($("#money").val()!=$("#sotien").text())
  	{
  		return false;
  	}
  })
});
</script>
</body>
</html>