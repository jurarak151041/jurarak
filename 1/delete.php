<?php
include 'db.php';

$id = $_GET['id'];  // รับ id จาก URL

// คำสั่งลบข้อมูล
$sql = "DELETE FROM products WHERE p_id = $id";

// สั่งให้ database ทำงาน
mysqli_query($conn, $sql);

// กลับหน้า index
header("location:index.php");
?>