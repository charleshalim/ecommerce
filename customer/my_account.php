<!DOCTYPE html>

<?php
session_start();

 include("../functions/functions.php"); ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="jscript/script.js"></script>
  </head>
  <body>

<div class="container">





<ul class="navigation">
  <li><img src="../images/home.png" alt="logo" style="width:50px;height:50px;"><a href="../index.php"><br>Home</a></li>
  <li></li>
  <li></li>
  <li><img src="../images/logo.png" alt="logo" style="width:100%;height:100%;"></li>
  <li><img src="../images/spacer.png" alt="logo" style="width:100%;height:50px;"></li>
<form method="get" class="searchbox" action="../results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Cari produk" />
<input type="submit"  name="search" value="Search" />
</form>
</ul>



<div class="myaccountsidebarwrapper">

<div class="sidebartitle">
My account
</div>

<div class="myaccountsidebar">
<?php
$user = $_SESSION['customer_email'];
$get_img = "select * from customers where customer_email='$user'";
$run_img = mysqli_query($con,$get_img);
$row_img = mysqli_fetch_array($run_img);
$c_image = $row_img['customer_image'];
$c_name = $row_img['customer_name'];


echo "<img src='customer_images/$c_image' alt='PROFILE' width='150' height='150'/>";
?>
<li><a href="my_account.php?my_orders">My orders</a></li>
<li><a href="my_account.php?edit_account">edit account</a></li>
<li><a href="my_account.php?delete_account">delete account</a></li>
</div>





</div>




 <div class="myaccountcontent"> 
<div class="contentarea">
<?php cart(); ?>
<div id="shopping_cart">



  <span style="float:right; font-size:16px; padding:5px; line-height:20px; font-family: 'Calibri';">
<a href="../allproducts.php" style="margin-right:250px; text-decoration:none; color:blue;">all products</a>

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
echo "<a href='../customer/my_account.php' style='color:yellow; margin-right:15px; margin-left:15px;'><img src='../images/account.png' style='width:20px;height:20px;'></a>";
}
else{
echo "<a href='../customer_register.php' style='color:yellow; margin-right:15px; margin-left:15px;'>register sekarang</a>";
}
?>

<a href="../cart.php" style="color:yellow"><img src="../images/cart.png" style="width:20px;height:20px;margin-right:15px;"></a>

<?php
if (!isset($_SESSION['customer_email'])) {
  echo "<a href='../checkout.php' style='color:orange'>Login</a>";
}
else{
  echo"<a href='../logout.php' style='color:orange'>Logout</a>";
}
?>

	</span>

</div>

<div class="products_box">









</div>
</div>



<?php

if(!isset($_GET['my_orders'])){
  if(!isset($_GET['edit_account'])){
  if(!isset($_GET['change_pass'])){
    if(!isset($_GET['delete_account'])){


    echo"
<h2 style='font-size:25px;''>Welcome:  $c_name</h2><br>
    <b>klik disini untuk melihat orderan <a href='my_account.php?my_orders'>here</a></b>";


    }
  }
  }
}

?>




<?php
if(isset($_GET['edit_account'])){
  include("edit_account.php");
}

?>

<?php
if(isset($_GET['delete_account'])){
  include("delete_account.php");
}

?>

<?php

if(isset($_GET['my_orders'])){
  include("my_orders.php");
}

?>
 </div>




</div>





<div class="footer">


<h2>&copy; PT Lampion JOSS PAPER</h2><br>
<h2></h2>


</div>





  </body>
</html>
