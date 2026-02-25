<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ร้านค้า</title>
</head>
<body>

<h2>รายการสินค้า</h2>
<a href="form.php">+ เพิ่มสินค้า</a>

<table border="1">
<tr>
<th>ID</th>
<th>ชื่อสินค้า</th>
<th>ราคา</th>
<th>ลบ</th>
</tr>

<?php
// คำสั่งดึงข้อมูล
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// วนลูปแสดงข้อมูลทีละแถว
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['p_id']; ?></td>
<td><?php echo $row['p_name']; ?></td>
<td><?php echo $row['p_price']; ?></td>
<td>
<a href="delete.php?id=<?php echo $row['p_id']; ?>">ลบ</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>