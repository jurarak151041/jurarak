<?php
	session_start();
	if(empty($_SESSION['aid'])) {
		echo"Access Denied" ;
		echo"<meta http-equiv='refresh' content='4; url=index.php'>";
		exit;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>

<h1>เข้าสู่ระบบหลังบ้าน - จุฬาลักษณ์</h1>

<?php echo "แอดมิน: ". $_SESSION['a_name']; ?> <br>

<ul>
	<a href="products.php"><li>จัดการสินค้า</li></a>
	<a href="products.php"><li>จัดการออเดอร์</li></a>
	<a href="products.php"><li>จัดการลูกค้า</li></a>
	<a href="products.php"><li>ออกจากระบบ</li></a>
</ul>
</body>
</html>
