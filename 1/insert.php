<?php
include 'db.php';  // เรียกไฟล์เชื่อม database

$p_name = $_POST['p_name'];     // รับค่าจากฟอร์ม
$p_price = $_POST['p_price'];   // รับค่าจากฟอร์ม

// คำสั่ง SQL เพิ่มข้อมูล
$sql = "INSERT INTO products (p_name, p_price) 
        VALUES ('$p_name', '$p_price')";

// สั่งให้ database ทำงาน
mysqli_query($conn, $sql);

// กลับไปหน้าแสดงสินค้า
header("location:index.php");
?>