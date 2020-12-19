<!DOCTYPE html>
<html>
<head>
	<title>	
	</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php include("../layout/link.php");
    require("../public/ketnoi.php"); ?>
</head>
<body>
  <div class="hero-wrap hero-bread>
     <img src="../images/bg_1.jpg" width="1400px" height="500px">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span>Quản lý danh mục sản phẩm</span></p>
            <h1 class="mb-0 bread">Quản lý danh mục sản phẩm</h1>
          </div>
        </div>
      </div>
     
    </div>
    <section class="ftco-section ftco-category ftco-no-pt">
      <div class="container">
        <div class="row">

	<table class="table table-bordered" >
    <thead>
      <tr>
      
        <th>STT</th>
        <th>Hình ảnh</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Mã loại</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Mô tả</th>
         <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
    <?php
    //require("../public/Connect.php");
    $sql="select * from sanpham";
    $result=$con->query($sql);
    $i=1;
    while($row=$result->fetch_assoc())
    {
    ?>
   
      <tr>
        <td><?php echo $i;?></td>
        <td><img src="../images/<?php echo $row['Hinhanh'];?>" alt="Colorlib Template" width="100" height="100"></td>
        <td><?php echo $row['Masp'];?></td>
        
        <td><?php echo $row['Tensp'];?></td>
        <td><?php echo $row['Maloai'];?></td>
        <td><?php echo $row['Dongia'];?></td>
        <td><?php echo $row['Soluong'];?></td>
        <td><?php echo $row['Mota'];?></td>
        <td> <a type="button" class="btn btn-info" href="Edit_Category.php?Masp=<?php echo $row['Masp'];?>">Sửa</a>
        <a type="button" class="btn btn-warning" href="xldel.php?Masp=<?php echo $row['Masp'];?>">Xóa</a></td>
  
      </tr>
      <?php 
     $i++;
     }?>
    </tbody>
  </table>
  <a type="button" class="btn btn-danger" href="Add_Category.php">Thêm</a>
  <a type="button" class="btn btn-danger" href="timkiem_category.php?">Tìm kiếm</a>
</div>
</div>
</section>
</body>
</html>