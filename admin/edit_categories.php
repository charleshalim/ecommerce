<!DOCTYPE>

<?php
include("includes/db.php");

if(isset($_GET['edit_categories'])){

$get_id = $_GET['edit_categories'];
$get_pro = "select*from categories where cat_id='$get_id'";
$run_pro = mysqli_query($con,$get_pro);


$row_pro=mysqli_fetch_array($run_pro);
	$pro_id = $row_pro['cat_id'];
	$pro_title = $row_pro['cat_title'];






}
?>

<html>
	<head>
		<title>EDIT KATEGORI</title>

	</head>

<body bgcolor="skyblue">







<form action="" method="post"  enctype="multipart/form-data">

	<table align="center " width="972" border="2" bgcolor="orange">

			<tr align="center">
				<td colspan="8"><h2><b>Ubah kategori</b></h2></td>
			</tr>

			<tr>
				<td align="right" ><b>category name:</b></td>
				<td><input type="text" name="category_name" size="100" value="<?php echo $pro_title;?>" /></td>
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
		$product_title = $_POST['category_name'];





$update_product ="update categories set cat_title='$product_title' where cat_id='$update_id'";



    $run_product = mysqli_query($con, $update_product);

    if($run_product){

    echo "<script>alert('berhasil update category')</script>";
    echo "<script>window.open('adminpage.php?view_categories','_self')</script>";



    }
}
?>
