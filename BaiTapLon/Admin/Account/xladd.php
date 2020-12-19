<?php 
//Kết nối cơ sở dữ liệu
$ocon=mysqli_connect("localhost","root","","vegefood");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//lấy dữ liệu từ trang Themsp về
$ID=$_POST["ID"];
$usename=$_POST["usename"];
$password=$_POST["password"];
$email=$_POST["email"];
$hoten=$_POST["hoten"];
$diachi=$_POST["diachi"];
$dienthoai=$_POST["dienthoai"];
$chucvu=$_POST["chucvu"];
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
         move_uploaded_file($file_tmp,"../assets/img/".$file_name);
        // echo "Thành công!!!";
		 $sql_ktr="select * from taikhoan where password ='".$password."' or ID ='".$ID."' or usename='".$usename."'";
		//echo $sql_ktr;
		$result=$ocon->query($sql_ktr);
		if($result->num_rows>0)
		{
			//echo $result->num_rows;
			header("location:frm_them.php?error=trungkhoa");
			echo " Đã có tài khoản này";
		}
		else
		{
			//nếu không trùng mới tiến hành thêm
			$sql="insert into taikhoan values('".$ID."','".$usename."','".$password."','".$email."','".$hoten."','".$diachi."','".$dienthoai."','".$chucvu."',now(),now(),'".$file_name."')";
			//echo $sql;
			echo $sql;
			if($ocon->query($sql)===TRUE)
			{
				//echo "Thêm dữ liệu thành công";
				header("location:List_taikhoan.php");
			}
			else
			{
				header("location:frm_them.php?error=caulenhsai");
			}
      	}
      }
      else{
         print_r($errors);

      }
   }
//kiểm tra xem dữ liệu thêm vào có trùng trong cơ sở dữ liệu không


?>