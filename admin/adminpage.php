<?php

session_start();
if(!$_SESSION['auth'])
{
	header('location:index.php');
}



 ?>
<!DOCTYPE>

<html>
	<head>
		<title>Admin panel</title>


		<link rel="stylesheet"  href="css/style.css">
		</head>



<body>
<div class="main_wrapper">

<div id="header">
<p><img src="../images/admin_login.gif" height="100" width="200">Welcome Admin.</p>
</div>


<div class="sidebar">
<h2 style="text-align:center; font-size:25px;">Manage content</h2>
<a href="adminpage.php?insert_product">Insert Product</a><br>
<a href="adminpage.php?view_product">View Product</a>
<a href="adminpage.php?view_customer">View Customer</a>
<a href="adminpage.php?insert_categories">tambah kategori</a>
<a href="adminpage.php?view_categories">lihat kategori</a>
<a href="adminpage.php?view_orders">lihat orderan</a>
<a href="adminpage.php?view_ordered">lihat pesanan barang</a>
<a href='logout.php' style='color:black'>Logout</a>
</div>


<div class="content">
<!-- <h2 style="color:red; text-align:center;"> <?php echo $_GET['logged_in']; ?></h2> -->


<?php
if(isset($_GET['insert_product'])){
	include("insert_product.php");
}

if(isset($_GET['view_product'])){
	include("view_product.php");
}

if(isset($_GET['edit_pro'])){
	include("edit_pro.php");
}

if(isset($_GET['view_customer'])){
	include("view_customer.php");
}


if(isset($_GET['edit_customer'])){
	include("edit_customer.php");
}

if(isset($_GET['insert_categories'])){
	include("insert_categories.php");
}

if(isset($_GET['view_categories'])){
	include("view_categories.php");
}

if(isset($_GET['edit_categories'])){
	include("edit_categories.php");
}

if(isset($_GET['view_orders'])){
	include("view_orders.php");
}

if(isset($_GET['finish_order'])){
	include("finish_order.php");
}

if(isset($_GET['delete_order'])){
	include("delete_order.php");
}

if(isset($_GET['view_ordered'])){
	include("view_ordered.php");
}

?>
</div>
