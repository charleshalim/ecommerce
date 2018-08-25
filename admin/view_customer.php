
<table width="972" align="center" bgcolor="pink" border="1">

<tr align="center" bgcolor="skyblue">
	<td colspan="6"> <h1>View all customer</h1></td>
	</tr>

<tr>
	<th>ID</th>
	<th>name</th>
	<th>email</th>
	<th>Pass</th>
</tr>
<?php
include("includes/db.php");

$get_pro = "select*from customers";
$run_pro = mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
	$customer_id = $row_pro['customer_id'];
	$customer_name = $row_pro['customer_name'];
	$customer_email = $row_pro['customer_email'];
	$customer_pass = $row_pro['customer_pass'];

	$i++;
?>
<tr>
<td align="center"><?php echo $i;?></td>
<td align="center"><?php echo $customer_name;?></td>
<td align="center"><?php echo $customer_email;?></td>
<td align="center"><?php echo $customer_pass;?></td>
<td><a href="adminpage.php?edit_customer=<?php echo $customer_id; ?>">edit</a></td>
<td><a href="delete_customer.php?delete_customer=<?php echo $customer_id; ?>">delete</a></td>
</tr>
<?php } ?>

</table>
