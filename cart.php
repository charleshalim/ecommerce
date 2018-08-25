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
<script>
for (var i = 0; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].className = 'active';
    }
}
</script>


<div class="sidebar">

<div class="sidebartitle">
Categories
</div>

<div class="cats">
<?php getCats(); ?>
</div>







</div>




 <div class="content">
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
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="700px" bgcolor="">
<tr align="center">
  <td colspan="5" ><h2 style="margin-bottom:8%;">Update your cart or checkout</h2></td>
</tr>
<tr align="center">
  <th>Remove</th>
  <th>Products</th>
  <th>Quantity</th>
  <th>Total Price</th>
</tr>



<?php

  $total = 0;
  global $con;
  $ip = getIp();
  $sel_price = "select * from cart where ip_add='$ip'";
  $run_price = mysqli_query($con, $sel_price);
  while($p_price=mysqli_fetch_array($run_price)){
    $pro_id = $p_price['p_id'];

    $pro_price = "select * from products where product_id='$pro_id'";
    $run_pro_price = mysqli_query($con,$pro_price);
    while ($pp_price = mysqli_fetch_array($run_pro_price)){
      $product_price =array( $pp_price['product_price']);
      $product_title = $pp_price['product_title'];
      $product_image = $pp_price['product_image'];
      $single_price = $pp_price['product_price'];
      $values = array_sum($product_price);
      $total += $values;


?>


<tr align="center">
  <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
  <td><?php echo $product_title; ?><br>
    <img src="admin/product_images/<?php echo $product_image;?>" width="60" height="60"/>
  </td>

  <?php
  if(isset($_POST['update_qty'])){

    $qty = $_POST['qty'];

    $update_qty = "update cart set qty ='$qty'";
    $run_qty = mysqli_query($con,$update_qty);

    $_SESSION['qty']=$qty;


    $total = $total*$qty;

    echo "<td><input type='text' size='4' name='qty' value='$qty'?></td>";

  }

  else {
    echo "<td><input type='text' size='4' name='qty' value='1'?></td>";
  }
  ?>
  <td><?php echo "Rp".$single_price?></td>
</tr>


<?php }} ?>

<tr align="right">
  <td colspan="4"><b>Sub Total:</b></td>
  <td colspan="4"><?php echo "Rp".$total;?>
</tr>

<tr align="center" >
  <td colspan="1"><input type="submit" name="update_cart" value="Remove item"></td>
  <td colspan="1"><input type="submit" name="update_qty" value="Update qty"></td>
  <td><input type="submit" name="continue" value="Continue Shopping"></td>
  <td><a href="checkout.php" style="text-decoration:none; color:black; background-color:gray; padding:1.5px; border:1px solid black;">checkout</a></td>
</tr>
</table>

</form>
<?php


  global $con;
  $ip = getIp();

if (isset($_POST['update_cart'])) {
  foreach ($_POST['remove'] as $remove_id) {

    $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";

    $run_delete = mysqli_query($con, $delete_product);
    if ($run_delete) {
      echo "<script>window.open('cart.php','_self')</script>";
    }
  }
}

if(isset($_POST['continue'])){
  echo"<script>window.open('index.php','_self')</script>";
}
?>
 </div>




</div>







<div class="footer">


   <h2>&copy; test</h2><br>
   <h2>test</h2>

</div>





  </body>
</html>
