‹meta charset="utf-8">
<?php
linclude_once("connectdb.php");
$idid = $_GEl['id'];
$sql = "DELETE FROM regions WHERE r_id='{$idy}' ",
mysqli_query($conn, $sql) or die ("ลบข้อมูลไม่ได้");
echo "<script›";
echo "window.location='a.php';" echo "</script>" ;
?>
