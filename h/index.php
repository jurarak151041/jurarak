<?php
session_start();
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd = $_POST['apwd'];

    $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_assoc($result)) {
        // ตรวจสอบรหัสผ่าน
        // เงื่อนไข 1: เช็คแบบเข้ารหัส (Password Hash)
        // เงื่อนไข 2: เช็คแบบข้อความธรรมดา (เผื่อข้อมูลเก่ายังไม่ได้แปลง)
        if (password_verify($pwd, $data['a_password']) || $pwd === $data['a_password']) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit;
        }
    }
    $error_msg = "Username หรือ Password ไม่ถูกต้อง";
}
?>