<?php
session_start(); // อย่าลืมเปิด session ที่บรรทัดบนสุด
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd = $_POST['apwd'];

    // 1. ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_assoc($result)) {
        // 2. ตรวจสอบรหัสผ่านที่เข้ารหัสด้วย password_verify
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit;
        }
    }
    
    // ถ้าไม่ผ่านเงื่อนไขด้านบน ให้แจ้งเตือน
    $error_msg = "Username หรือ Password ไม่ถูกต้อง";
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - จุฬาลักษณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { max-width: 400px; margin-top: 100px; }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="card shadow-sm">
        <div class="card-body p-5">
            <h2 class="text-center mb-4">เข้าสู่ระบบหลังบ้าน</h2>
            <h6 class="text-center text-muted mb-4">จุฬาลักษณ์ ลมดา (พลอย)</h6>

            <?php if(isset($error_msg)): ?>
                <div class="alert alert-danger py-2"><?php echo $error_msg; ?></div>
            <?php endif; ?>

            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="auser" class="form-control" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="apwd" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>