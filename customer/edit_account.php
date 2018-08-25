<?php



$user = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$user'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);

$c_id= $row_customer['customer_id'];
$name = $row_customer['customer_name'];
$email = $row_customer['customer_email'];
$pass = $row_customer['customer_pass'];
$image = $row_customer['customer_image'];
$country = $row_customer['customer_country'];
$city = $row_customer['customer_city'];
$contact = $row_customer['customer_contact'];
$address = $row_customer['customer_address'];
?>

<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="750">
  <tr align="right">
  <td> <h1 style="font-size:25px; margin-bottom:5%;">Ubah data akun</h1></td>
  </tr>

  <tr>
  <td align="right"> Nama Pelanggan:</td>
  <td><input type="text" name="c_name" style="margin-bottom:2.5%;" value="<?php echo $name ?>" required/></td>
  </tr>

    <tr>
  <td align="right"> Email:</td>
  <td><input type="text" name="c_email" style="margin-bottom:2.5%;"value="<?php echo $email ?>" required/></td>
  </tr>

    <tr>
  <td align="right">Password:</td>
  <td><input type="password" name="c_pass" style="margin-bottom:2.5%;"value="<?php echo $pass ?>" required/></td>
  </tr>



    <tr>
  <td align="right">kota</td>
  <td><input type="text" name="c_city" style="margin-bottom:2.5%;"value="<?php echo $city ?>" required/></td>
  </tr>

    <tr>
  <td align="right">Contact</td>
  <td><input type="text" name="c_contact"style="margin-bottom:2.5%;" value="<?php echo $contact ?>" required/></td>
  </tr>

    <tr>
  <td align="right">alamat</td>
  <td><input type="text" name="c_address"style="margin-bottom:2.5%;" value="<?php echo $address ?>" required/></td>
  </tr>

    <tr>
  <td align="right">Image</td>
  <td><input type="file" name="c_image" style="margin-bottom:2.5%;"required/><img src="customer_images/<?php echo $image; ?>" width="50" height="50"> </td>
  </tr>

    <tr align="right">

  <td><input type="submit" name="update" value="update account" style="margin-left:100%;"/></td>
  </tr>

</table>


</form>




<?php

if(isset($_POST['update'])){

$ip=getIp();

$customer_id = $c_id;
$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_pass = $_POST['c_pass'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
$c_city = $_POST['c_city'];
$c_contact = $_POST['c_contact'];
$c_address = $_POST['c_address'];

move_uploaded_file($c_image_tmp, "customer_images/$c_image");

$update_c="update customers set customer_name='$c_name',customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city', customer_contact='$c_contact' , customer_address='$c_address', customer_image='$c_image' where customer_id='$customer_id' ";


$run_update = mysqli_query($con,$update_c);

if($run_update){
  echo"<script>alert('akun telah di update')</script>";
  echo"<script>windows.open('my_account.php','_self')</script>";
}

}
?>
