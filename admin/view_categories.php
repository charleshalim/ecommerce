
<table width="972" align="center" bgcolor="pink" border="1">

<tr align="center" bgcolor="skyblue">
	<td colspan="6"> <h1>View categories</h1></td>
	</tr>

<tr>
	<th>ID</th>
	<th>Category</th>
</tr>
<?php
include("includes/db.php");

$get_pro = "select*from categories";
$run_pro = mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
	$customer_id = $row_pro['cat_id'];
	$customer_name = $row_pro['cat_title'];

	$i++;
?>
<tr>
<td align="center"><?php echo $i;?></td>
<td align="center"><?php echo $customer_name;?></td>

<td><a href="adminpage.php?edit_categories=<?php echo $customer_id; ?>">edit</a></td>
<td><a href="delete_categories.php?delete_categories=<?php echo $customer_id; ?>">delete</a></td>
</tr>
<?php } ?>

</table>
