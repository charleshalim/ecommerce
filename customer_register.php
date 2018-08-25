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


</div>
<form action="customer_register.php" method="post" enctype="multipart/form-data">
<table align="center" width="750" style="color:black;">
  <tr align="right" >
  <td > <h1 style="font-size:25px;font-family: 'Calibri'; margin-bottom:5%;">Buat Akun</h1></td>
  </tr>

  <tr>
  <td align="right">Nama pelanggan:</td>
  <td><input type="text" name="c_name" style="margin-bottom:2%;" required/></td>
  </tr>

    <tr>
  <td align="right">Email:</td>
  <td><input type="text" name="c_email" style="margin-bottom:2%;" required/></td>
  </tr>

    <tr>
  <td align="right">Password:</td>
  <td><input type="password" name="c_pass" style= "margin-bottom:2%;" required/></td>
  </tr>



    <tr>
  <td align="right">Kota</td>
  <td><input type="text" name="c_city" style="margin-bottom:2%;" required/></td>
  </tr>

    <tr>
  <td align="right">Contact</td>
  <td><input type="text" name="c_contact"  style="margin-bottom:2%;" required/></td>
  </tr>

    <tr>
  <td align="right">Alamat Lengkap</td>
  <td><textarea cols="50" rows="5" name="c_address"  style="margin-bottom:2%;" required/></textarea></td>
  </tr>

    <tr>
  <td align="right">Foto profil(Optional)</td>
  <td><input type="file" name="c_image" style="margin-bottom:2%;" /></td>
  </tr>

    <tr align="right">

  <td><input type="submit" name="register" value="create account"style="margin-left:100%;" /></td>
  </tr>

</table>


</form>
 </div>




</div>













  </body>
</html>



<?php

if(isset($_POST['register'])){

$ip=getIp();
$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_pass = $_POST['c_pass'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
$c_country = $_POST['c_country'];
$c_city = $_POST['c_city'];
$c_contact = $_POST['c_contact'];
$c_address = $_POST['c_address'];

move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
$insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";


$run_c = mysqli_query($con,$insert_c);
$sel_cart = "select * from cart where ip_add='$ip'";
$run_cart = mysqli_query($con,$sel_cart);
$check_cart = mysqli_num_rows($run_cart);


if($check_cart==0){
  $_SESSION['customer_email']=$c_email;
  echo"<script>alert('Berhasil membuat akun')</script>";
  echo"<script>window.open('customer/my_account.php')</script>";
}

else{
    $_SESSION['customer_email']=$c_email;
  echo"<script>alert('Berhasil membuat akun')</script>";
  echo"<script>window.open('checkout.php','_self')</script>";
}

}
?>
<div class="footer">


   <h2>&copy; test</h2><br>
   <h2>test</h2>


 </div>
