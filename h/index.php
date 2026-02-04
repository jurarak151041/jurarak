<?php
session_start(); // สำคัญ: ต้องมี session_start ทุกครั้งที่ใช้ $_SESSION
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd = $_POST['apwd'];

    // 1. ใช้ Prepared Statement ป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        
        // 2. ตรวจสอบรหัสผ่านที่เข้ารหัสด้วย password_verify
        // หมายเหตุ: รหัสใน DB ต้องเก็บด้วยฟังก์ชัน password_hash()
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit;
        } else {
            $error = "รหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error = "ไม่พบชื่อผู้ใช้งานนี้";
    }
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
        .login-card { max-width: 400px; border: none; border-radius: 15px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row min-vh-100 align-items-center justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card login-card shadow-lg">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4 fw-bold text-primary">เข้าสู่ระบบหลังบ้าน</h3>
                    <p class="text-center text-muted mb-4 small">ผู้ดูแลระบบ: จุฬาลักษณ์</p>

                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger py-2 small text-center"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" autofocus required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="Submit" class="btn btn-primary py-2 fw-bold">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center mt-4 text-muted small">© 2024 จุฬาลักษณ์ ลมดา (พลอย)</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>