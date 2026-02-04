<?php
	include_once("checklogin.php"); // แก้ชื่อไฟล์ให้ถูกต้อง (ลบ _ ออก)
?>
<!doctype html>
<html>
...
<body>

<h1>เข้าสู่ระบบหลังบ้าน - จุฬาลักษณ์</h1>

<?php echo "แอดมิน: ". $_SESSION['aname']; ?> <br> 

<ul>
    <li><a href="products.php">จัดการสินค้า</a></li>
	<li><a href="orders.php">จัดการออเดอร์</a></li>
	<li><a href="customers.php">จัดการลูกค้า</a></li>
	<li><a href="logout.php">ออกจากระบบ</a></li>
</ul>
</body>
</html>