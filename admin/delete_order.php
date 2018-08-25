<?php
include("includes/db.php");

if(isset($_GET['delete_order'])){

$delete_id = $_GET['delete_order'];
$delete_pro = "delete from customer_orders where order_id = '$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);

if($run_delete){
	echo "<script>alert('order telah dihapus')</script>";
	echo "<script>window.open('adminpage.php?view_orders','_self')</script>";
}


}



?>
