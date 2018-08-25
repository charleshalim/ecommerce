
<table width="800" align="center" bgcolor="pink" border="1">

<tr align="center" bgcolor="skyblue">
	<td colspan="6"> <h1>View orders</h1></td>
	</tr>

<tr>
	<th>Nomor Order</th>
	<th>Total harga</th>
	<th>Tanggal Order</th>
	<th>status</th>
</tr>
<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$user'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$get_orders = "select*from customer_orders";
$run_orders = mysqli_query($con,$get_orders);
$i=0;
while($row_orders=mysqli_fetch_array($run_orders)){
	$invoice = $row_orders['invoice_no'];
	$harga = $row_orders['total_harga'];
	$tanggal_order = $row_orders['tanggal_order'];
	$order_status = $row_orders['order_status'];

	$i++;
?>
<tr>

<td align="center"><?php echo $invoice;?></td>
<td align="center">Rp <?php echo $harga;?></td>
<td align="center"><?php echo $tanggal_order;?></td>
<td align="center"><?php echo $order_status;?></td>
</tr>
<?php } ?>

</table>

<img src="../images/BCA-pay.png" style="width:220px;height:80px;padding:10px;margin-left:35%;">
<p style="margin-left:7%; ">
(PEMBAYARAN): pembayaran dapat dilakukan dengan melakukan transfer ke rek bank bca dengan no. "1234567" atas nama "PT.Lampion joss paper medan" dengan membuat berita sesuai "no.order"
</p>
<p style="margin-left:7%;">
(setelah pembayaran silahkan menunggu konfirmasi admin paling lama 24 jam)
</p>
