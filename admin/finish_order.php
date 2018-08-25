<?php
include("includes/db.php");


if(isset($_GET['finish_order'])){


$status = 'Selesai';

$id = $_GET['finish_order'];
$finish_order = "update customer_orders set order_status='$status' where order_id='$id'";
$run_order=mysqli_query($con,$finish_order);



if($run_order){
	echo "<script>alert('orderan telah diselesaikan')</script>";
	echo "<script>window.open('adminpage.php?view_orders','_self')</script>";
}


}



?>
