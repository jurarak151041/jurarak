<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>
<h1>a.php สร้าง session</h1>

<?php
	$_SESSION['name'] = "จุฬาลักษณ์ ลมดา";
	$_SESSION['nickname'] = "พลอย";
	$_SESSION['p1'] = "โซฟา";
	$_SESSION['p2'] = "ห่วงยาง";
?>
</body>
</html>
