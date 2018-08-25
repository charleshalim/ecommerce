<!DOCTYPE>

<?php
include("includes/db.php")

?>

<html>
	<head>
		<title>Inserting categories</title>

	</head>

<body bgcolor="skyblue">







<form action="insert_categories.php" method="post"  enctype="multipart/form-data">

	<table align="center " width="972" border="2" bgcolor="orange">

			<tr align="center">
				<td colspan="8"><h2><b>Tambah Kategori</b></h2></td>
			</tr>

			<tr>
				<td align="right" ><b>Nama kategori baru:</b></td>
				<td><input type="text" name="category" size="25" required /></td>
			</tr>


			<tr>
				<td><input type="submit" name="insert_post" value="Add category" required ></td>
			</tr>

	</table>



</body>
</html>

<?php

	if(isset($_POST['insert_post'])){
		$categories = $_POST['category'];




$insert_product ="insert into categories (cat_title) values ('$categories')";



echo    $insert_pro = mysqli_query($con, $insert_product);

if($insert_pro){

echo "<script>alert('berhasil tambah categories')</script>";
echo "<script>window.open('adminpage.php?view_categories','_self')</script>";



}
}
?>
