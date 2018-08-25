<div>
<?php

include("includes/db.php");

	$total = 0;
	global $con;
	$ip = getIp();


	$get_customer = "select * from customers where customer_ip='$ip'";
	$run_customer = mysqli_query($con, $get_customer);
	$customer = mysqli_fetch_array($run_customer);
	$customer_id = $customer['customer_id'];



	$sel_price = "select * from cart where ip_add='$ip'";
	$run_price = mysqli_query($con, $sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		$pro_id = $p_price['p_id'];

		$pro_price = "select * from products where product_id='$pro_id'";
		$run_pro_price = mysqli_query($con,$pro_price);
		while ($pp_price = mysqli_fetch_array($run_pro_price)){
			$product_price =array( $pp_price['product_price']);
			$product_name = $pp_price['product_title'];
			$values = array_sum($product_price);
			$total += $values;
		}
	}


?>
<h2 align="center" style="margin-bottom:5%;"> metode pembayaran:</h2>
<a href="order.php?c_id=<?php echo $customer_id ?>" style="margin-left:44%;"> tranfer rekening</a>


</div>
