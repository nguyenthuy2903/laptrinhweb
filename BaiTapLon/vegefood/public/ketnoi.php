<?php
	$con=new mysqli("localhost","root","","baitl");
	if($con->connect_error)
	{
		die("loi ket noi".$con->connect_error);
	}
	
?>
