<!DOCTYPE html>

<?php
session_start();

 include("functions/functions.php"); ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="jscript/script.js"></script>
  </head>
  <body>

<div class="container">



<ul class="navigation">
<li><img src="images/home.png" alt="logo" style="width:50px;height:50px;"><a href="index.php"><br>Home</a></li>
<li></li>
<li></li>
<li><img src="images/logo.png" alt="logo" style="width:100%;height:100%;"></li>
<li><img src="images/spacer.png" alt="logo" style="width:100%;height:50px;"></li>
<form method="get" class="searchbox" action="results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Cari produk" />
<input type="submit"  name="search" value="Search" />
</form>
</ul>


<div class="sidebar">

<div class="sidebartitle">
Categories
</div>

<div class="cats">
<?php getCats(); ?>
</div>







</div>




 <div class="contentcheckout">
<div class="contentarea">
<?php cart(); ?>
<div id="shopping_cart">
  <span style="float:right; font-size:16px; padding:5px; line-height:20px; font-family: 'Calibri';">
<a href="allproducts.php" style="margin-right:250px; text-decoration:none; color:blue;">all products</a>

  <?php
if (isset($_SESSION['customer_email'])) {
  echo "<b>Welcome:</b>". $_SESSION['customer_email'] ;

}
else{
  echo "<b>Welcome Guest:</b>";
}
?>


Total Items:<?php total_items() ?>  Total Price:Rp <?php total_price(); ?>
<?php
if (isset($_SESSION['customer_email'])) {
echo "<a href='customer/my_account.php' style='color:yellow; margin-right:15px; margin-left:15px;'><img src='images/account.png' style='width:20px;height:20px;'></a>";
}
else{
echo "<a href='customer_register.php' style='color:yellow; margin-right:15px; margin-left:15px;'>register sekarang</a>";
}
?>

<a href="cart.php" style="color:yellow"><img src="images/cart.png" style="width:20px;height:20px;margin-right:15px;"></a>

<?php
if (!isset($_SESSION['customer_email'])) {
  echo "<a href='checkout.php' style='color:orange'>Login</a>";
}
else{
  echo"<a href='logout.php' style='color:orange'>Logout</a>";
}
?>

	</span>

</div>

<div class="products_box">




</div>
</div>
<?php


if(!isset($_SESSION['customer_email'])){


  include("customer_login.php");
  }
else{
  include("payment.php");
}

?>
 </div>




</div>













  </body>
</html>
