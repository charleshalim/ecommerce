<!DOCTYPE>

<?php
include("includes/db.php");

if(isset($_GET['edit_customer'])){

$get_id = $_GET['edit_customer'];
$get_pro = "select*from customers where customer_id='$get_id'";
$run_pro = mysqli_query($con,$get_pro);


$row_pro=mysqli_fetch_array($run_pro);
	$pro_id = $row_pro['customer_id'];
	$pro_title = $row_pro['customer_name'];
	$pro_image = $row_pro['customer_email'];
	$pro_price = $row_pro['customer_pass'];





}
?>

<html>
	<head>
		<title>EDIT PRODUK</title>
		  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
	</head>

<body bgcolor="skyblue">







<form action="" method="post"  enctype="multipart/form-data">

	<table align="center " width="972" border="2" bgcolor="orange">

			<tr align="center">
				<td colspan="8"><h2><b>Ubah Customer</b></h2></td>
			</tr>

			<tr>
				<td align="right" ><b>Customer name:</b></td>
				<td><input type="text" name="customer_name" size="100" value="<?php echo $pro_title;?>" /></td>
			</tr>



			<tr>
				<td align="right"><b>Product email:</b></td>
				<td><input type="text" name="customer_email" value="<?php echo $pro_image;?>" /></td>
			</tr>

			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="text" name="customer_pass" value="<?php echo $pro_price;?>" /></td>
			</tr>


			<tr>
				<td><input type="submit" name="update_product" value="ubah" required ></td>
			</tr>

	</table>



</body>
</html>

<?php

	if(isset($_POST['update_product'])){
		$update_id=$pro_id;
		$product_title = $_POST['customer_name'];
		$product_price = $_POST['customer_email'];
		$product_image = $_POST['customer_pass'];




$update_product ="update customers set customer_name='$product_title',customer_email='$product_price',customer_pass='$product_image' where customer_id='$update_id'  ";



    $run_product = mysqli_query($con, $update_product);

    if($run_product){

    echo "<script>alert('berhasil update data customer')</script>";
    echo "<script>window.open('adminpage.php?view_customer','_self')</script>";



    }
}
?>
