
<table width="972" align="center" bgcolor="pink" border="1">

<tr align="center" bgcolor="skyblue">
	<td colspan="6"> <h1>View orders</h1></td>
	</tr>

<tr>
  <th>Order ID</th>
  <th>Customer ID</th>
	<th>Nomor Order</th>
	<th>Total harga</th>
	<th>Tanggal Order</th>
	<th>status</th>
</tr>
<?php
include("includes/db.php");



$get_orders = "select*from customer_orders";
$run_orders = mysqli_query($con,$get_orders);
$i=0;
while($row_orders=mysqli_fetch_array($run_orders)){
  $order_id = $row_orders['order_id'];
  $customer_id = $row_orders['customer_id'];
	$invoice = $row_orders['invoice_no'];
	$harga = $row_orders['total_harga'];
	$tanggal_order = $row_orders['tanggal_order'];
	$order_status = $row_orders['order_status'];

	$i++;
?>

<tr>
<td align="center"><?php echo $order_id;?></td>
<td align="center"><?php echo $customer_id;?></td>
<td align="center"><?php echo $invoice;?></td>
<td align="center">Rp <?php echo $harga;?></td>
<td align="center"><?php echo $tanggal_order;?></td>
<td align="center"><?php echo $order_status;?></td>
<td><a href="adminpage.php?finish_order=<?php echo $order_id; ?>">Selesaikan order</a></td>
<td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">delete order</a></td>
</tr>

<?php } ?>

</table>
