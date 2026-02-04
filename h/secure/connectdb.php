<?php
    // ปิดการแจ้งเตือนแบบ Exception (แก้ปัญหา Error 500 บน PHP รุ่นใหม่)
    mysqli_report(MYSQLI_REPORT_OFF);

    $host = "localhost";
    $user = "root";
    $pwd = "66010914005"; // ตรวจสอบรหัสผ่านให้แน่ใจว่าถูกต้อง
    $db = "4045db"; // ตรวจสอบชื่อฐานข้อมูลว่ามีอยู่จริง

    // เชื่อมต่อ และถ้าพังให้แสดงข้อความออกมาแทน Error 500
    $conn = mysqli_connect($host, $user, $pwd, $db) or die ("เชื่อมต่อฐานข้อมูลไม่ได้: " . mysqli_connect_error());
    
    mysqli_set_charset($conn, "utf8");
?>