<?php
include("includes/db.php");

if(isset($_GET['delete_categories'])){

$delete_id = $_GET['delete_categories'];
$delete_pro = "delete from categories where cat_id = '$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);

if($run_delete){
	echo "<script>alert('category dihapus')</script>";
	echo "<script>window.open('adminpage.php?view_categories','_self')</script>";
}


}



?>
