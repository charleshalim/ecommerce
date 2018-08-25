<?php

include("functions/functions.php");



if (isset($_GET['c_id'])) {


  $customer_id = $_GET['c_id'];
  $ip = getIp();
  $total = 0;


  $sel_price = "select * from cart where ip_add='$ip'";
  $run_price = mysqli_query($con, $sel_price);
  $status = 'Pending';
  $invoice_no = mt_rand();
  $count_pro = mysqli_num_rows($run_price);




	$sel_price = "select * from cart where ip_add='$ip'";
	$run_price = mysqli_query($con, $sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		$pro_id = $p_price['p_id'];

		$pro_price = "select * from products where product_id='$pro_id'";
		$run_pro_price = mysqli_query($con,$pro_price);
		while ($pp_price = mysqli_fetch_array($run_pro_price)){
			$product_price =array( $pp_price['product_price']);
			$values = array_sum($product_price);
			$total += $values;

		}
	}





$get_cart = "select * from cart";
$run_cart = mysqli_query($con, $get_cart);
$get_qty = mysqli_fetch_array($run_cart);
$qty = $get_qty['qty'];



if($qty==0){

  $qty=1;

  $sub_total = $total;

}

  else {

    $qty=$qty;
    $sub_total = 0;
    $sub_total = $total*$qty;

  }

 $insert_order = "insert into customer_orders (customer_id,total_harga,invoice_no,total_products,tanggal_order,order_status) values
                                                ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";

  $run_order = mysqli_query($con, $insert_order);

  echo "<script>alert('Order berhasil , silahkan melakukan pembayaran, terima kasih!')</script>";
  echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

  $empty_cart = "delete from cart where ip_add='$ip'";
  $run_empty = mysqli_query($con, $empty_cart);

 $insert_into_pending_orders = "insert into order_products (customer_id,invoice_no,product_id,qty) values
                                                            ('$customer_id','$invoice_no','$pro_id','$qty')";

  $run_pending_orders = mysqli_query($con,$insert_into_pending_orders);



}




 ?>
