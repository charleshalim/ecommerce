<table width="972" align="center" bgcolor="pink" border="1">

<tr align="center" bgcolor="skyblue">
	<td colspan="6"> <h1>View all product</h1></td>
	</tr>

<tr>
	<th>NO.</th>
	<th>Title</th>
	<th>Image</th>
	<th>Price</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?php
include("includes/db.php");

$get_pro = "select*from products";
$run_pro = mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id = $row_pro['product_id'];
	$pro_title = $row_pro['product_title'];
	$pro_image = $row_pro['product_image'];
	$pro_price = $row_pro['product_price'];

	$i++;
?>
<tr>
<td align="center"><?php echo $i;?></td>
<td align="center"><?php echo $pro_title;?></td>
<td align="center"><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
<td align="center">Rp <?php echo $pro_price;?></td>
<td><a href="adminpage.php?edit_pro=<?php echo $pro_id; ?>">edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">delete</a></td>
</tr>
<?php } ?>

</table>
