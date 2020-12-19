<?php 
//Kết nối cơ sở dữ liệu
$ocon=mysqli_connect("localhost","root","","qlbanhang");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//lấy dữ liệu từ trang Themsp về
$tensp=$_POST["tensp"];
$maloai=$_POST["maloai"];
$masp=$_POST["masp"];
$gia=$_POST["gia"];
$sl=$_POST["sl"];

 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
      }
      
      if($file_size > 2097152){
         $errors[]='Kích cỡ file nên là 2 MB';
      }
      
      if(empty($errors)==true)
      {
         move_uploaded_file($file_tmp,"../../Image/".$file_name);
        // echo "Thành công!!!";
		 $sql_ktr="select * from sanpham where Masp like '%".$masp."%' or Tensp like '%".$tensp."%'";
		//echo $sql_ktr;
		$result=$ocon->query($sql_ktr);
		if($result->num_rows>0)
		{
			//echo $result->num_rows;
			header("location:../../Home.php?Sanpham=1&loi=2");
		}
		else
		{
			//nếu không trùng mới tiến hành thêm
			$sql="insert into sanpham(Masp,Tensp,Maloai,Hinhanh, Gia, Soluong) values('".$masp."','".$tensp."','".$maloai."','".$file_name."',".$gia.",".$sl.")";
			//echo $sql;
			if($ocon->query($sql)===TRUE)
			{
				//echo "Thêm dữ liệu thành công";
				header("location:../../Home.php?Sanpham=0");
			}
			else
			{
				header("location:T../../Home.php?Sanpham=1&loi=1");
			}
      	}
      }
      else{
         print_r($errors);

      }
   }
//kiểm tra xem dữ liệu thêm vào có trùng trong cơ sở dữ liệu không


?>