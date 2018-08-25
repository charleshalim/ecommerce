
<table width="972" align="center" bgcolor="pink" border="1">

<tr align="center" bgcolor="skyblue">
	<td colspan="6"> <h1>Barang yang dipesan</h1></td>
	</tr>

<tr>
  <th>customer ID</th>
  <th>Nomor Order</th>
	<th>product ID</th>
	<th>qty</th>

</tr>
<?php
include("includes/db.php");



$get_orders = "select*from order_products";
$run_orders = mysqli_query($con,$get_orders);
$i=0;
while($row_orders=mysqli_fetch_array($run_orders)){
  $order_id = $row_orders['customer_id'];
  $customer_id = $row_orders['invoice_no'];
	$invoice = $row_orders['product_id'];
	$harga = $row_orders['qty'];
	$i++;
?>

<tr>
<td align="center"><?php echo $order_id;?></td>
<td align="center"><?php echo $customer_id;?></td>
<td align="center"><?php echo $invoice;?></td>
<td align="center"><?php echo $harga;?></td>


</tr>

<?php } ?>

</table>
